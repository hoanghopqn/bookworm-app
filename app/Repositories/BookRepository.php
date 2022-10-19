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
    public function getPriceHighLow($request) {
        // return 'test';
        $query = Book::query();
    $limit = $request->input('limit');
    $Sort = $request->input('Sort');
    $book = $query->when($Sort,function ($query, $Sort){
        $query->orderBy('sub_price',$Sort);
    });
  return new BookCollection($book->getPriceHighLow()->paginate($limit));
    }
    public function getFilterCategory($request) {
        // return 'test';
        $query = Book::query();
        $limit = $request->input('limit');
        $Sort = $request->input('Sort');
        $book = $query->when($Sort,function ($query, $Sort){
            $query->where('category.category_name', '=', $Sort);
        });
      return new BookCollection($book->getFilterCategory()->paginate($limit));
    }
    public function getFilterAuthor($request) {
        // return 'test';
        $query = Book::query();
        $limit = $request->input('limit');
        $Sort = $request->input('Sort');
        $book = $query->when($Sort,function ($query, $Sort){
            $query->where('author.author_name', '=', $Sort);
        });
      return new BookCollection($book->getFilterAuthor()->paginate($limit));
    }
    public function getFilterRatingReview($request) {
        // return 'test';
        $query = Book::query();
        $limit = $request->input('limit');
        $Sort = $request->input('Sort');
        $book = $query->when($Sort,function ($query, $Sort){
            $query->havingRaw('avg(review.rating_start) >= ?',[$Sort]);
        });
      return new BookCollection($book->getFilterRatingReview()->paginate($limit));
    }
}