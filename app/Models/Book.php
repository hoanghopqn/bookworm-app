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

    public function scopeGetBookSale($query)
    {
        return $query
            ->selectRaw(
                '
        book_title,
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
         then book.book_price - discount.discount_price
        when discount.discount_end_date is null and discount.discount_start_date <= now()
         then (book.book_price - discount.discount_price)
        when discount.discount_end_date is null and discount.discount_start_date > now()
         then book.book_price
        end as sub_price,
        COALESCE(AVG(CAST(rating_start as INT)), 0)  as startsss '
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
    public function scopeGetRecommnad($query)
    {
        return $query
            ->selectRaw(
                '
        
                book_title,
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
                 then book.book_price - discount.discount_price
                when discount.discount_end_date is null and discount.discount_start_date <= now()
                 then (book.book_price - discount.discount_price)
                when discount.discount_end_date is null and discount.discount_start_date > now()
                 then book.book_price
                end as sub_price,
                COALESCE(AVG(CAST(rating_start as INT)), 0)  as startsss '
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
            ->orderBy('sub_price', 'asc');
    }

    public function scopeGetAllBook($query)
    {
        return $query
            ->selectRaw(
                '
        
                book_title,
                book_price,
                discount.discount_price,
                book_cover_photo,
                discount.discount_start_date,
                discount.discount_end_date,
                author.author_name,
                category.category_name,
                COALESCE(AVG(CAST(rating_start as INT)), 0)  as startsss '
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
        category.category_name')
            ->orderBy('discount_price', 'asc')
            ->orderBy('book_price', 'asc');
    }
    public function scopeGetSortSale($query)
    {
        return $query
            ->selectRaw(
                '
        book_title,
        book_price,
        author.author_name,
        book_cover_photo '
            )
            ->join('author', 'author.id', '=', 'book.author_id')
            ->join('discount', 'discount.book_id', '=', 'book.id')
            ->orderBy('discount.discount_price', 'desc');
    }

    public function scopeGetPopula($query)
    {
        return $query
            ->selectRaw(
                '
        book_title,
        book_price,
        author.author_name,
        book_cover_photo '
            )
            ->join('author', 'author.id', '=', 'book.author_id')
            ->join('review', 'review.book_id', '=', 'book.id')
            ->groupByRaw('book_title,book_price,author.author_name,book_cover_photo')
            ->orderByRaw('count(review.rating_start) desc');
    }

    public function scopeGetPriceHighLow($query)
    {
        return $query
            ->selectRaw(
                '
        book_title,
        book_price,
        author.author_name,
        book_cover_photo ,
        case
        when discount.discount_start_date > now()  then book.book_price
        when discount.discount_end_date < now()  then  book.book_price
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

    public function scopeGetFilterCategory($query)
    {
        return $query
            ->selectRaw(
                '
        book_title,
        book_price,
        author.author_name,
        book_cover_photo '
            )
            ->join('author', 'author.id', '=', 'book.author_id')
            ->join('category', 'category.id', '=', 'book.category_id')
            ->join('discount', 'discount.book_id', '=', 'book.id')
            ->where('category.category_name', '=', 'herman');
    }

    public function scopeGetFilterAuthor($query)
    {
        return $query
            ->selectRaw(
                '
        book_title,
        book_price,
        author.author_name,
        book_cover_photo '
            )
            ->join('author', 'author.id', '=', 'book.author_id')
            ->where('author.author_name', '=', 'Dr. Fredrick Hauck');
    }

    public function scopeGetFilterRatingReview($query)
    {
        return $query
            ->selectRaw(
                '
        book_title,
        book_price,
        author.author_name,
        book_cover_photo, avg(review.rating_start) as startsss '
            )
            ->join('author', 'author.id', '=', 'book.author_id')
            ->join('review', 'review.book_id', '=', 'book.id')
            ->groupByRaw('book_title, book_price, author.author_name, book_cover_photo')
            ->orderByRaw('avg(review.rating_start) asc');
    }
}
