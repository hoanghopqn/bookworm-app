<?php

namespace App\Repositories;

use App\Http\Resources\BookCollection;
use App\Models\Book;
use Psy\Readline\Hoa\Console;

class BookRepository
{
   public function getBookSale($request)
   {
      // return 'test';
      $query = Book::query();
      $limit = $request->input('limit');

      if ($category = $request->input('category')) {
         $query->where('category.id', $category);
      }
      if ($author = $request->input('author')) {
         $query->where('author.id', $author);
      }
      if ($start = $request->input('start')) {
         $query->havingRaw('COALESCE(AVG(CAST(rating_start as INT)), 0) >= ?', [$start]);
      }

      return $query->getBookSale()->paginate($limit);
   }

   public function getRecommnad()
   {

      return Book::getRecommnad()->paginate(8);
   }

   public function getPopular()
   {
      return Book::getPopular()->paginate(8);
   }

   public function getAllBook($request)
   {
      // return 'test';
      $query = Book::query();
      $limit = $request->input('limit');
      if ($Sort = $request->input('Sort')) {
         $query->orderBy('discount_price', $Sort);
         $query->orderBy('book_price', $Sort);
      }
      if ($category = $request->input('category')) {
         $query->where('category.id', $category);
      }
      if ($author = $request->input('author')) {
         $query->where('author.id', $author);
      }
      if ($start = $request->input('start')) {
         $query->havingRaw('COALESCE(AVG(CAST(rating_start as INT)), 0) >= ?', [$start]);
      }

      return $query->getAllBook()->paginate($limit);
   }

   public function getSortSale($request)
   {
      // return 'test';
      $query = Book::query();
      $limit = $request->input('limit');

      if ($category = $request->input('category')) {
         $query->where('category.id', $category);
      }
      if ($author = $request->input('author')) {
         $query->where('author.id', $author);
      }
      if ($startsss = $request->input('startsss')) {
         $query->whereRaw('COALESCE(AVG(CAST(rating_start as INT)), 0) >= ?', [$startsss]);
      }

      return $query->getSortSale()->paginate($limit);
   }

   public function getPopula($request)
   {
      // return 'test';
      $query = Book::query();
      $limit = $request->input('limit');

      if ($category = $request->input('category')) {
         $query->where('category.id', $category);
      }
      if ($author = $request->input('author')) {
         $query->where('author.id', $author);
      }
      if ($startsss = $request->input('startsss')) {
         $query->whereRaw('COALESCE(AVG(CAST(rating_start as INT)), 0) >= ?', [$startsss]);
      }

      return $query->getPopula()->paginate($limit);
   }

   public function getPriceHighLow($request)
   {
      // return 'test';
      $query = Book::query();
      $limit = $request->input('limit');
      if ($category = $request->input('category')) {
         $query->where('category.id', $category);
      }
      if ($author = $request->input('author')) {
         $query->where('author.id', $author);
      }
      if ($start = $request->input('start')) {
         $query->whereRaw('COALESCE(AVG(CAST(rating_start as INT)), 0) >= ?', [$start]);
      }

      return $query->getPriceHighLow()->paginate($limit);
   }
}
