<?php

declare(strict_types=1);

namespace App\Http\Filters\V1;

use App\Http\Filters\QueryFilter;

class BookFilter extends QueryFilter
{
    public function title($value)
    {
        return $this->builder->where('title', 'like', "%$value%");
    }

    public function author($value)
    {
        return $this->builder->whereHas('author', function ($query) use ($value) {
            $query->where('firstname', 'like', "%$value%")
                ->orWhere('lastname', 'like', "%$value%");
        });
    }
}