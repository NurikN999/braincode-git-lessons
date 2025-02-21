<?php

namespace App\Http\Controllers\Api;

use App\Contracts\PaymentInterface;
use App\Http\Controllers\Controller;
use App\Http\Filters\V1\BookFilter;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(
        private BookService $bookService
    )
    {
        
    }

    public function index(BookFilter $filter)
    {
        return $this->successResponse(
            message: 'Books retrieved successfully', 
            data: $this->bookService->getAllBooks($filter), 
            code: 200
        );
    }

    public function show(Book $book)
    {
        return $this->successResponse(
            message: 'Book retrieved successfully',
            data: new BookResource($book),
            code: 200
        );
    }

    public function update(Book $book, UpdateBookRequest $request)
    {
        $book = $this->bookService->updateBook(
            $book, 
            $request->validated()
        );

        return $this->successResponse(
            message: 'Book updated successfully',
            data: new BookResource($book),
            code: 201
        );
    }

    public function delete(Book $book)
    {
        $this->bookService->delete($book);

        return $this->successResponse(
            message: 'Book deleted successfully',
            data: [],
            code: 204
        );
    }
}
