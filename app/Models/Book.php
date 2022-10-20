<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
                'COALESCE(AVG(CAST(rating_start as INT)), 0)  as start'
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
    public function scopeSupPrice($query)
    {
        return $query->orderByRaw('CASE
        WHEN (discount.discount_end_date IS NULL AND DATE(NOW()) >= discount.discount_start_date) THEN book.book_price - discount.discount_price
        WHEN (discount.discount_end_date IS NOT NULL AND ( DATE(NOW()) >= discount.discount_start_date AND DATE(NOW()) <= discount.discount_end_date ) ) THEN book.book_price - discount.discount_price
        ELSE 0
        END DESC ');
    }
    
    //tăng dần theo giá thực
    public function scopePrice($query)
    {
        return $query->orderByRaw('CASE
        WHEN (discount.discount_end_date IS NULL AND DATE(NOW()) >= discount_start_date) THEN  discount.discount_price
        WHEN (discount.discount_end_date IS NOT NULL AND ( DATE(NOW()) >= discount.discount_start_date AND DATE(NOW()) <= discount.discount_end_date ) ) THEN discount.discount_price
        ELSE book.book_price
        END asc');
    }
    public function scopeStarts($query)
    {
        return $query->orderByRaw('count(review.rating_start) desc');
    }
    public function scopeGetRecommend($query)
    {
        return $query
            ->orderBy('start', 'desc')
            ->orderByRaw('CASE
        WHEN (discount.discount_end_date IS NULL AND DATE(NOW()) >= discount_start_date) THEN  discount.discount_price
        WHEN (discount.discount_end_date IS NOT NULL AND ( DATE(NOW()) >= discount.discount_start_date AND DATE(NOW()) <= discount.discount_end_date ) ) THEN discount.discount_price
        ELSE book.book_price
        END asc');
    }
    public function scopeGetPopular($query)
    {
        return $query
            ->orderByRaw('count(CAST(review.rating_start as INT)) desc ');
    }
    public function scopeGetBooksAll($query)
    {
        return $query
            ->orderBy('discount_price', 'asc')
            ->orderBy('book_price', 'asc');
    }

   
    // public function scopeGetSortSale($query)
    // {
    //     return $query
    //         ->orderByRaw('CASE
    //     WHEN (discount.discount_end_date IS NULL AND DATE(NOW()) >= discount.discount_start_date) THEN book.book_price - discount.discount_price
    //     WHEN (discount.discount_end_date IS NOT NULL AND ( DATE(NOW()) >= discount.discount_start_date AND DATE(NOW()) <= discount.discount_end_date ) ) THEN book.book_price - discount.discount_price
    //     ELSE 0
    //     END DESC')
    //         ->orderBy('book.book_price', 'desc');
    // }
    public function scopeGetPopula($query)
    {
        return $query->selectRaw(
            'book_title,
                                  book_price,
                                  author.author_name,
                                  book_cover_photo,count(review.rating_start) '
        )
            ->join('author', 'author.id', '=', 'book.author_id')
            ->join('review', 'review.book_id', '=', 'book.id')
            ->groupByRaw('book_title,book_price,author.author_name,book_cover_photo')
            ->orderByRaw('count(review.rating_start) desc');
    }

    public function scopeGetPriceHighLow($query)
    {
        return $query->selectRaw(
            'book_title,
                                  book_price,
                                  author.author_name,
                                  book_cover_photo,
                                case
                                  when discount.discount_start_date > now() 
                                       then book.book_price
                                  when discount.discount_end_date < now()  
                                       then  book.book_price
                                  when discount.discount_start_date <= now() and discount.discount_end_date >= now()
                                       then discount.discount_price
                                  when discount.discount_end_date is null and discount.discount_start_date <= now()
                                       then discount.discount_price
                                  when discount.discount_end_date is null and discount.discount_start_date > now()
                                       then book.book_price
                                  end as sub_price'
        )
            ->join('author', 'author.id', '=', 'book.author_id')
            ->join('category', 'category.id', '=', 'book.category_id')
            ->join('discount', 'discount.book_id', '=', 'book.id')
            ->join('review', 'review.book_id', '=', 'book.id')
            ->groupByRaw('book_title,
                                   book_price,
                                   discount.discount_price,
                                   book_cover_photo,
                                   discount.discount_start_date,
                                   discount.discount_end_date,
                                   author.author_name,
                                   category.category_name,
                                   sub_price')
            ->orderBy('sub_price', 'desc');
    }

    public function scopeBookDetails($query)
    {
        return $query->selectRaw(
            ' book_title,
                                       book_price,
                                       discount.discount_price,
                                       book_cover_photo,
                                       discount.discount_start_date,
                                       discount.discount_end_date,
                                       author.author_name,
                                       category.category_name,
                                       case
                                            when discount.discount_start_date > now()  then book.book_price
                                            when discount.discount_end_date < now()  then  book.book_price
                                            when discount.discount_start_date <= now() and discount.discount_end_date >= now()
                                                 then discount.discount_price
                                            when discount.discount_end_date is null and discount.discount_start_date <= now()
                                                 then discount.discount_price
                                            when discount.discount_end_date is null and discount.discount_start_date > now()
                                                 then book.book_price
                                        end as sub_price,
                                        count(CAST(rating_start as INT)) '
        )
            ->leftJoin('author', 'author.id', '=', 'book.author_id')
            ->leftJoin('category', 'category.id', '=', 'book.category_id')
            ->leftJoin('discount', 'discount.book_id', '=', 'book.id')
            ->leftJoin('review', 'review.book_id', '=', 'book.id');
    }
}
