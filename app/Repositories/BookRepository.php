<?php

namespace App\Repositories;

use App\Http\Resources\BookCollection;
use App\Models\Book;
use Psy\Readline\Hoa\Console;

class BookRepository
{
    public function getBookSale($request) {
        // return 'test';
        $query = Book::query();
        $limit = $request->input('limit');
        
         if($category = $request->input('category')){
            $query->where('category_name', $category);
         }
         if($author = $request->input('author')){
            $query->where('author_name', $author);
         }
         if($startsss = $request->input('startsss')){
            $query->whereRaw('COALESCE(AVG(CAST(rating_start as INT)), 0) >= ?', [$startsss]);
         }
      return new BookCollection($query->getBookSale()->paginate($limit));
    }
    public function getRecommnad($request) {
        // return 'test';
        $query = Book::query();
        $price = $query
                ->avg('price')
                ->join('review', 'review.book_id', '=', 'book.id');
        $limit = $request->input('limit');
        
         if($category = $request->input('category')){
            $query->where('category_name', $category);
         }
         if($author = $request->input('author')){
            $query->where('author_name', $author);
         }
         if($startsss = $request->input('startsss')){
            $query->where($price,'>=', $startsss);
         }
      return new BookCollection($query->getRecommnad()->paginate($limit));
    }

    public function getBookShop() {
        // return 'test';
        return Book::getBookShop()->paginate(12);
    }
    public function getAllBook($request) {
    // return 'test';
    $query = Book::query();
    $limit = $request->input('limit');
    if ($Sort = $request->input('Sort')) {
        $query->orderBy('discount_price',$Sort);
        $query->orderBy('book_price',$Sort);
    }  
    if($category = $request->input('category')){
        $query->where('category_name', $category);
     }
     if($author = $request->input('author')){
        $query->where('author_name', $author);
     }
     if($startsss = $request->input('startsss')){
        $query->where('startsss','>=', $startsss);
     }
  return new BookCollection($query->getAllBook()->paginate($limit));
}
public function getSortSale( $request) {
    // return 'test';
    $query = Book::query();
        $limit = $request->input('limit');
        
         if($category = $request->input('category')){
            $query->where('category_name', $category);
         }
         if($author = $request->input('author')){
            $query->where('author_name', $author);
         }
         if($startsss = $request->input('startsss')){
            $query->whereRaw('COALESCE(AVG(CAST(rating_start as INT)), 0) >= ?', [$startsss]);
         }
      return new BookCollection($query->getSortSale()->paginate($limit));
}
    public function getPopula($request) {
        // return 'test';
        $query = Book::query();
        $limit = $request->input('limit');
        
         if($category = $request->input('category')){
            $query->where('category_name', $category);
         }
         if($author = $request->input('author')){
            $query->where('author_name', $author);
         }
         if($startsss = $request->input('startsss')){
            $query->whereRaw('COALESCE(AVG(CAST(rating_start as INT)), 0) >= ?', [$startsss]);
         }
      return new BookCollection($query->getPopula()->paginate($limit));
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
   
}