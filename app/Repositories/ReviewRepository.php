<?php

namespace App\Repositories;

use App\Http\Resources\ReviewCollection;
use App\Models\Review;
use Psy\Readline\Hoa\Console;

class ReviewRepository
{
    public function getReviewDetails()
    {
    return Review::where('book_id', 81)->orderBy('review_date', 'asc')->paginate(8);

    }
}
