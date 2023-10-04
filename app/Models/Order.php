<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['book_id', 'customer_name', 'customer_email', 'order_datetime'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
