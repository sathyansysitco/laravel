<?php
namespace App\Http\Controllers\API;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostAPIController extends Controller
{
    public function index()
    {
        return response()->json(Post::all());
    }

    public function store(Request $request)
    {
        $post = Post::create($request->only(['title', 'content']));
        return response()->json($post, 201);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->only(['title', 'content']));
        return response()->json($post);
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return response()->json(['message' => 'Post deleted']);
    }
}
