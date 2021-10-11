<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'inscurance_price',
        'shipping_price',
        'total_price',
        'transaction_status',
        'code',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'users_id',  'id');
    }
    public function transactiondetail(){
        return $this->hasMany(TransactionDetail::class, 'id', 'transactions_id');
    }
}
