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
                'book.book_price',
                'book.book_cover_photo',
                'author.author_name',
                'category.category_name',
                'discount.discount_price',
                'discount.discount_start_date',
                'discount.discount_end_date'
            )
            ->selectRaw(
                'COALESCE(AVG(CAST(rating_start as INT)), 0)  as avg_stars,
                CASE
            WHEN (discount.discount_end_date IS NULL AND DATE(NOW()) >= discount_start_date) THEN  discount.discount_price
            WHEN (discount.discount_end_date IS NOT NULL AND ( DATE(NOW()) >= discount.discount_start_date AND DATE(NOW()) <= discount.discount_end_date ) ) THEN discount.discount_price
            ELSE book.book_price
            END as final_price,
            COUNT(CAST(rating_start as INT)) as count_review,
            CASE
            WHEN (discount.discount_end_date IS NULL AND DATE(NOW()) >= discount.discount_start_date) THEN book.book_price - discount.discount_price
            WHEN (discount.discount_end_date IS NOT NULL AND ( DATE(NOW()) >= discount.discount_start_date AND DATE(NOW()) <= discount.discount_end_date ) ) THEN book.book_price - discount.discount_price
            ELSE 0
            END as sub_price'
            )
            ->groupBy(
                'book.id',
                'discount.id',
                'author.id',
                'review.book_id',
                'category.id',
                'final_price'
            );
    }
    //giảm dần theo chiết khấu
    public function scopeSupPrice($query, $sort)
    {
        return $query->orderBy('sub_price', $sort);
    }

    //tăng dần theo giá thực
    public function scopePrice($query, $priceF)
    {
        return $query->orderBy('final_price', $priceF);
    }
    public function scopeAvgStarts($query)
    {
        return $query->orderBy('avg_stars', 'desc');
    }
    public function scopeCountReview($query)
    {
        return $query->orderBy('count_review', 'desc');
    }
}
