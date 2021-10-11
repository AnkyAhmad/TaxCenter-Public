<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'products_id',
        'transaction_details_id',
        'users_id',
        'stars',
        'review',
        'photo',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'products_id',  'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
