<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author_id', 'image'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public static function findBookById($id)
    {
        return static::where('id', $id)->first();
    }

}
