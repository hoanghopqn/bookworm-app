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
    public function getReviewDetails($request,$id)
    {
    $book = Book::getDetail()->findOrFail($id);
    $book = new BookResource($book);
    $review = Review::reviewDetails()->where('book_id',$id);
    if ($star = $request->input('star')) {
        $review->where('rating_start', $star);
     }
        $review = $review->get();
    $review = new ReviewCollection($review);
    return response()->json([
        'book'=>$book,
        'review'=>$review
    ],200) ;
    }
}
