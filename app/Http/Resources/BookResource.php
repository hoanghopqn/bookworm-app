<?php

namespace App\Http\Resources;


use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Mockery\Generator\StringManipulation\Pass\AvoidMethodClashPass;

class BookResource extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function avg_Star($avg_Star)
    {
        $avg_Stars = Review::AVG('star')->where('book_id', $avg_Star);
        return $avg_Stars;
    }
    public function toArray($request)
    {

        $sub_price = 0;
        $final_price = $this->book_price;
        if (is_null($this->discount_end_date)) {
            if (date('Y-m-d') >= $this->discount_start_date and !is_null($this->discount_start_date)) {

                $final_price = $this->discount_price;
                $sub_price =round($this->book_price - $this->discount_price, 2);
            }
        } else {
            if (date('Y-m-d') >= $this->discount_start_date and date('Y-m-d') <= $this->discount_end_date and !is_null($this->discount_start_date)) {
                $final_price = $this->discount_price;
                $sub_price =round($this->book_price - $this->discount_price, 2);
            }
        } 
         
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
            'book_id' => $this->id,
            'book_title' => $this->book_title,
            'book_summary' => $this->book_summary,
            'book_price' => $this->book_price,
            'book_cover_photo' => $this->book_cover_photo,
            'discount_price' => $this->discount_price,
            'author_name' => $this->author_name,
            'category_name' => $this->category_name,
            'discount_start_date'=> $this->discount_start_date,
            'discount_end_date'=> $this->discount_end_date,
            'sub_price'  => $sub_price,
            'avg_stars' => $avg_star,
            'final_price' => $final_price,
            'count_star' => $count_star,
            'count 1 star' => $countstar1,
            'count 2 star' => $countstar2,
            'count 3 star' => $countstar3,
            'count 4 star' => $countstar4,
            'count 5 star' => $countstar5,
            'AR' => $AR
        ];
    }
}
