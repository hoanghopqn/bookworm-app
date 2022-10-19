<?php

namespace App\Repositories;

use App\Http\Resources\BookCollection;
use App\Models\Book;

class BookRepository
{
    public function getBookSale() {
        // return 'test';
        return Book::getBookSale()->paginate(10);
    }
    public function getRecommnad() {
        // return 'test';
        return Book::getRecommnad()->paginate(8);
    }

    public function getBookShop() {
        // return 'test';
        return Book::getBookShop()->paginate(12);
    }
    public function getAllBook($request) {
    // return 'test';
    $query = Book::query();
    $limit = $request->input('limit');
    // if ($Sort = $request->input('Sort')) {
    //     $query->orderBy('discount_price',$Sort);
    //     $query->orderBy('book_price',$Sort);
    // }   
    $Sort = $request->input('Sort');
    $book = $query->when($Sort,function ($query, $Sort){
        $query->orderBy('discount_price',$Sort);
        $query->orderBy('book_price',$Sort);
    });
  return new BookCollection($book->getAllBook()->paginate($limit));
}
public function getSortSale() {
    // return 'test';
    return Book::getSortSale()->paginate(12);
}
    public function getPopula() {
        // return 'test';
        return Book::getPopula()->paginate(12);
    }
    public function getPriceHighLow() {
        // return 'test';
        return Book::getPriceHighLow()->paginate(12);
    }
    public function getPriceLowHigh() {
        // return 'test';
        return Book::getPriceLowHigh()->paginate(12);
    }
    public function getFilterCategory() {
        // return 'test';
        return Book::getFilterCategory()->paginate(12);
    }
    public function getFilterAuthor() {
        // return 'test';
        return Book::getFilterAuthor()->paginate(12);
    }
    public function getFilterRatingReview() {
        // return 'test';
        return Book::getFilterRatingReview()->paginate(12);
    }
}