<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authorsBook = [
            'Joanne' => [
                [
                    'title' => 'Harry Potter and Wisdom Stone',
                    'published_at' => '12-12-1997'
                ],
                [
                    'title' => 'Гарри Поттер и Дары Смерти',
                    'published_at' => '01-01-2007'
                ]
            ],
            'Herbert' => [
                [
                   'title' => 'Война Миров',
                   'published_at' => '12-12-1898' 
                ]
            ]
        ]; 
        
        foreach ($authorsBook as $authorFirstname => $books) {
            $author = Author::where('firstname', $authorFirstname)->first();

            foreach( $books as $book ) {
                Book::create(array_merge(
                    $book,
                    [
                        'author_id' => $author->id
                    ]
                ));
            }
        }
    }
}
