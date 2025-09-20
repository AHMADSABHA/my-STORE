<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceTopupRequest extends Model
{
    //use HasFactory;

    protected $casts = [
        'added_to_balance' => 'boolean',
    ];

    protected $fillable = [
        'user_id',
        'payment_link',
        'currency',
        'amount',
        'payment_receipt',
        'phone',
        'notes',
        'status',
        'added_to_balance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
