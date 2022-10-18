<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    public function getBook() {
        return 'test';
        // return Book::all();
    }
}