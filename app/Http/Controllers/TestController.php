<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        // $users = User::where('firstname', 'Test')->get();

        // foreach ($users as $user) {
        //     dump($user->firstname . ' ' . $user->lastname);
        // }

        // $users = User::all();

        // $user = User::where('firstname', 'Test')
        //     ->where('lastname', 'Nurkamal')
        //     ->first();

        // $users = $users->diff([$user]);

        // dd($users);
        // first 
        // $user->update([
        //     'firstname' => 'Bakhytbek'
        // ]);

        // second
        // $user->firstname = 'Test';
        // $user->save();

        // 1
        // $books = Book::with('author')->get()->toArray();
        // dd($books->author->full_name);

        // 2
        // $books = Book::all();

        // foreach ($books as $book) {
        //     dd($book->author->firstname);
        // }
    }
}
