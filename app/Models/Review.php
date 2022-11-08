<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'review';
    public $fillable = [
        'id',
        'book_id',
        'review_title',
        'review_details',
        'review_date',
        'rating_start'
    ];

    public function scopeReviewDetails($query)
    {
        return $query
            ->select(
                'id',
                'book_id',
                'review_title',
                'review_details',
                'rating_start',
                'review_date'
            ) ;
    }
    public function scopeReviewDate($query)
    {
        return $query->orderBy('review_date ','desc');
    }
}
