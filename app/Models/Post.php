<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
protected $fillable = ['title', 'content', 'images', 'user_id', 'type_id'];
protected $casts = [
    'images' => 'array',
];

public function user()
{
    return $this->belongsTo(User::class);
}
public function type()
{
    return $this->belongsTo(PostType::class, 'type_id');
}

    //
}
