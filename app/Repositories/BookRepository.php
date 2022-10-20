<?php

namespace App\Repositories;

use App\Http\Resources\BookCollection;
use App\Models\Book;
use Psy\Readline\Hoa\Console;

class BookRepository
{
    public function rutGon($query,$request)
    {
        if ($category = $request->input('category')) {
            $query->where('category.id', $category);
         }
         if ($author = $request->input('author')) {
            $query->where('author.id', $author);
         }
         if ($startsss = $request->input('startsss')) {
            $query->havingRaw('COALESCE(AVG(CAST(rating_start as INT)), 0) >= ?', [$startsss]);
         }
    }
   public function getBookSale($request)
   {
      // return 'test';
      $query = Book::getDetail();
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
      return $query->supPrice()->price()->paginate($limit);
   }

   public function getRecommend($request)
   {
      $query = Book::getDetail();
      $limit = $request->input('limit');
      $query->orderBy('start', 'desc')->price();
      return $query->paginate($limit);
   }

   public function getPopular($request)
   {
      $query = Book::getDetail();
      $limit = $request->input('limit');
      $query->orderByRaw('count(CAST(rating_start as INT)) desc ')->getPopular()->price();
      return $query->paginate($limit);
   }

   public function getBooksAll($request)
   {
      // return 'test';
      $query = Book::getDetail();
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

      return $query->getBooksAll()->paginate($limit);
   }
   
   public function getSortSale($request)
   {
      $query = Book::getDetail();
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

      return $query->getSortSale()->paginate($limit);
     
   }

   public function getPopula($request)
   {
      // $query = Book::query();
      // $limit = $request->input('limit');

      // if ($category = $request->input('category')) {
      //    $query->where('category.id', $category);
      // }
      // if ($author = $request->input('author')) {
      //    $query->where('author.id', $author);
      // }
      // if ($startsss = $request->input('startsss')) {
      //    $query->havingRaw('COALESCE(AVG(CAST(rating_start as INT)), 0) >= ?', [$startsss]);
      // }

      // return $query->getPopula()->paginate($limit);
      $query = Book::getDetail();
      $limit = $request->input('limit');
      $query->starts();
      if ($category = $request->input('category')) {
         $query->where('category.id', $category);
      }
      if ($author = $request->input('author')) {
         $query->where('author.id', $author);
      }
      if ($start = $request->input('start')) {
         $query->havingRaw('COALESCE(AVG(CAST(rating_start as INT)), 0) >= ?', [$start]);
      }
   
      return $query->paginate($limit);
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
         $query->havingRaw('COALESCE(AVG(CAST(rating_start as INT)), 0) >= ?', [$start]);
      }

      return $query->getPriceHighLow()->paginate($limit);
   }
}
