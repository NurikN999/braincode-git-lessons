<?php

namespace App\Models;

use App\Http\Filters\V1\BookFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory, HasUuids;

    protected $fillable = [
        'title',
        'author_id',
        'published_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_books');
    }

    public function scopeFilter(Builder $builder, BookFilter $filter)
    {
        return $filter->apply($builder);
    }
}
