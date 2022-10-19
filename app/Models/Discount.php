<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'discount';

    public function Book()
    {
        return $this->belongsTo(Book::class);
    }
    public $fillable = [
        'book_id',
        'discount_start_date',
        'discount_end_date', 
        'discount_price'
    ];
}
