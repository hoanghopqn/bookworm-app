<?php

namespace App\Repositories;

use App\Http\Resources\BookResource;
use App\Http\Resources\ReviewCollection;
use App\Http\Resources\ReviewResource;
use App\Models\Book;
use App\Models\Review;
use Psy\Readline\Hoa\Console;

class ReviewRepository
{
    public function getReviewDetails( $id)
    {
        $query = Review::reviewDetails()->where('book_id', $id)->get(); 
        $review = new ReviewCollection($query);
        return response()->json([
            'review' => $review
        ], 200);
    }
}
