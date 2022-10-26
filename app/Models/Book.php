<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\Readline\Hoa\Console;

class Book extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'book';
    public $fillable = [
        'category_id',
        'author_id',
        'book_title',
        'book_summary',
        'book_price',
        'book_cover_photo',

    ];


    public function scopeGetDetail($query)
    {
        
        return $query
            ->leftJoin('author', 'author.id', '=', 'book.author_id')
            ->leftJoin('category', 'category.id', '=', 'book.category_id')
            ->leftJoin('discount', 'discount.book_id', '=', 'book.id')
            ->leftJoin('review', 'review.book_id', '=', 'book.id')
            ->select(
                'book.id',
                'book.book_title',
                'book.book_summary',
                'book.book_price',
                'book.book_cover_photo',
                'author.author_name',
                'category.category_name',
                'discount.discount_price',
                'discount.discount_start_date',
                'discount.discount_end_date'
            )
            ->groupBy(
                'book.id',
                'discount.id',
                'author.id',
                'review.book_id',
                'category.id'
            );
    }
  
    //giảm dần theo chiết khấu
    public function scopeSupPrice($query, $sort)
    {
        return $query->orderByRaw('CASE
        WHEN (discount.discount_end_date IS NULL AND DATE(NOW()) >= discount.discount_start_date) AND discount.discount_start_date IS NOT NULL THEN book.book_price - discount.discount_price
        WHEN (discount.discount_end_date IS NOT NULL AND ( DATE(NOW()) >= discount.discount_start_date AND DATE(NOW()) <= discount.discount_end_date ) ) AND discount.discount_start_date IS NOT NULL THEN book.book_price - discount.discount_price
        ELSE 0
        END '.$sort);
    }

    //tăng dần theo giá thực
    public function scopePrice($query, $priceF)
    {
        return $query->orderByRaw('CASE
        WHEN (discount.discount_end_date IS NULL AND DATE(NOW()) >= discount_start_date) AND discount.discount_start_date IS NOT NULL THEN  discount.discount_price
        WHEN (discount.discount_end_date IS NOT NULL AND ( DATE(NOW()) >= discount.discount_start_date AND DATE(NOW()) <= discount.discount_end_date ) ) AND discount.discount_start_date IS NOT NULL THEN discount.discount_price
        ELSE book.book_price
        END ' . $priceF);
    }
    public function scopeAvgStarts($query)
    {
        return $query->orderByRaw('COALESCE(AVG(CAST(rating_start as INT)), 0) desc');
    }
    public function scopeCountStars($query)
    {
        return $query->orderByRaw('COUNT(CAST(rating_start as INT)) desc');
    }
    
}
