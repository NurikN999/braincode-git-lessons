<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /** @use HasFactory<\Database\Factories\AuthorFactory> */
    use HasFactory, HasUuids;

    protected $fillable = [
        'firstname',
        'lastname'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
