<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Review; 

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $countstar1 = Review::where('book_id', $this->id)->where('rating_start', 1)->count('rating_start');
        $countstar2 = Review::where('book_id', $this->id)->where('rating_start', 2)->count('rating_start');
        $countstar3 = Review::where('book_id', $this->id)->where('rating_start', 3)->count('rating_start');
        $countstar4 = Review::where('book_id', $this->id)->where('rating_start', 4)->count('rating_start');
        $countstar5 = Review::where('book_id', $this->id)->where('rating_start', 5)->count('rating_start');
        $count_star = Review::where('book_id', $this->id)->count('rating_start');
        if ($count_star == 0) {
            $AR = 0;
            $avg_star =0;
        } else {

            $avg_star = Review::where('book_id', $this->id)->avg('rating_start');
            $AR = (1 * $countstar1 + 2 * $countstar2 + 3 * $countstar3 + 4 * $countstar4 + 5 * $countstar5) / ($countstar1 + $countstar2 + $countstar3 + $countstar4 + $countstar5);
        } 
        return [ 
            'id'=> $this->id,
            'book_id' => $this->book_id,
            'review_title' => $this->review_title,
            'review_details' => $this->review_details,
            'review_date' => $this->review_date,
            'rating_start' => $this->rating_start,
            'avg_stars' => $avg_star, 
            'count_star' => $count_star,
            'count1star' => $countstar1,
            'count2star' => $countstar2,
            'count3star' => $countstar3,
            'count4star' => $countstar4,
            'count5star' => $countstar5,
            'AR' => $AR
        ];
        // return parent::toArray($request);
    }
}
