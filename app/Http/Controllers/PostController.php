<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\PostType;


class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::where('user_id', auth()->id());

        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $posts = $query->latest()->paginate(5);

        if ($request->ajax()) {
            return view('posts.partials.table', compact('posts'))->render();
        }

        return view('posts.index', compact('posts'));
    }



    public function create()
    {
        $types = PostType::all();

        return view('posts.create',compact('types'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'type_id' => 'required|exists:post_types,id',
        ]);

        $data = $request->only(['title', 'content', 'type_id']);
        $imageNames = [];
        $files = $request->file('images');

        if (!empty($files) && is_array($files)) {
            foreach ($files as $file) {
                if ($file->isValid()) {
                    // foreach ($request->file('images') as $file) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads'), $filename);
                    $imageNames[] = $filename;
                }
            }
        }
        // $data = $request->only(['title', 'content']);
        $data['user_id'] = auth()->id(); // link post to current user
        $data['images'] = $imageNames;

        Post::create($data);
        return redirect()->route('posts.index')->with('success', 'Post created with multiple images.');
    }


    public function edit(Post $post)
    {
        $types = PostType::all();

        return view('posts.edit', compact('post','types'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'type_id' => 'required|exists:post_types,id',
        ]);

        $data = $request->only(['title', 'content', 'type_id']);
        // Preserve old images
        $imageNames = $post->images ?? [];

        $files = $request->file('images');

        if (!empty($files) && is_array($files)) {
            foreach ($files as $file) {
                if ($file && $file->isValid()) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads'), $filename);
                    $imageNames[] = $filename;
                }
            }
        }

        $data['images'] = $imageNames;

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully with new images.');
    }



    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = Post::where('user_id', auth()->id());

            if ($request->has('term') && $request->term != '') {
                $search = $request->term;
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            }

            $posts = $query->latest()->get();

            return response()->json([
                'html' => view('posts.partials.list', compact('posts'))->render()
            ]);
        }
    }





    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

}
