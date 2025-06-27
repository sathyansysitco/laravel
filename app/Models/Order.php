<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'address', 'total','user_id'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}

