<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Filters\V1\BookFilter;
use App\Models\Book;

class BookService
{
    public function getAllBooks(BookFilter $filter)
    {
        $book = Book::query();

        if ($filter) {
            $book->filter($filter);
        }

        return $book->get();
    }

    public function storeBook(array $data): Book
    {
        $book = Book::create($data);

        return $book;
    }

    public function updateBook(Book $book, array $data): Book
    {
        $book->update($data);

        return $book;
    }

    public function delete(Book $book): void
    {
        $book->delete();
    }
}