<?php

namespace App\Repositories;

use App\Http\Resources\AuthorCollection;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ReviewCollection;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Review;
use Psy\Readline\Hoa\Console;

class BookRepository
{


   //in sắp xép theo chiết xuất,giá
   public function getBookSale($request)
   {
      $query = Book::getDetail()->supPrice('desc');
      if ($limit = $request->input('limit')) {
      };
      if ($sort = $request->input('sort')) {
         $query->price($sort);
      } else {
         $query->price('asc');
      }
      if ($category = $request->input('category')) {
         $query->where('category.id', $category);
      }
      if ($author = $request->input('author')) {
         $query->where('author.id', $author);
      }
      if ($star = $request->input('star')) {
         $query->havingRaw('COALESCE(AVG(CAST(review.rating_start as INT)), 0) >= ?', [$star]);
      }
      $query = $query->paginate($limit);
      $query = new BookCollection($query);
      return response()->json(['book' => $query], 200);
   }

   public function getRecommend($request)
   {
      $query = Book::getDetail()->avgStarts()->price('asc')->paginate(8);
      $query = new BookCollection($query);
      return response()->json(['book' => $query], 200);
   }
   //phổ biến: tổng số reviews và giá
   public function getPopular($request)
   {
      $query = Book::getDetail()->countStars()->price('asc');
      if ($limit = $request->input('limit')) {
      };

      if ($category = $request->input('category')) {
         $query->where('category.id', $category);
      }
      if ($author = $request->input('author')) {
         $query->where('author.id', $author);
      }
      if ($star = $request->input('star')) {
         $query->havingRaw('COALESCE(AVG(CAST(review.rating_start as INT)), 0) >= ?', [$star]);
      }
      $query = $query->paginate($limit);
      $query = new BookCollection($query);
      return response()->json(['book' => $query], 200);
   }
   //tất cả sách theo giá 
   public function getBooksAll($request)
   {
      $query = Book::getDetail();
      if ($limit = $request->input('limit')) {
      };
      if ($sort = $request->input('sort')) {
         $query->price($sort);
      } else {
         $query->price('asc');
      }
      if ($category = $request->input('category')) {
         $query->where('category.id', $category);
      }
      if ($author = $request->input('author')) {
         $query->where('author.id', $author);
      }
      if ($star = $request->input('star')) {
         $query->havingRaw('COALESCE(AVG(CAST(review.rating_start as INT)), 0) >= ?', [$star]);
      }
      $query = $query->paginate($limit);
      $query = new BookCollection($query);
      return response()->json(['book' => $query], 200);
   }
   public function getBookDetails($id)
    {
    $book = Book::getDetail()->findOrFail($id);
    $book = new BookResource($book);  
    return response()->json([
        'book'=>$book
    ],200) ;
    } 
    public function getAuthorCategory()
    {
    $category = Category::category()->get();
    $category = new CategoryCollection($category);  
    $author = Author::author()->get();
    $author = new AuthorCollection($author);  
    return response()->json([ 
      'category'=>$category,
      'author'=>$author
    ],200) ;
    } 
}
