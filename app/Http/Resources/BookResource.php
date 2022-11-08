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

        return [
            'id' => $this->id,
            'book_title' => $this->book_title,
            'book_summary' => $this->book_summary,
            'book_price' => $this->book_price,
            'book_cover_photo' => $this->book_cover_photo,
            'discount_price' => $this->discount_price,
            'author_name' => $this->author_name,
            'category_name' => $this->category_name,
            'category_id'=>$this->category_id,
            'author_id'=>$this->author_id,
            'discount_start_date'=> $this->discount_start_date,
            'discount_end_date'=> $this->discount_end_date,
            'sub_price'  => $sub_price,
            'final_price' => $final_price
        ];
    }
}
