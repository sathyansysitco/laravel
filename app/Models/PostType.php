<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class, 'type_id');
    }
}
