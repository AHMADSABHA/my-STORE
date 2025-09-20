<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // علاقة الطلب بالمستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'address',
        'city',
        'country',
        'phone',
        'email',
        'notes',
        'total',
        'shipping',
        'status',
    ];
      public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
