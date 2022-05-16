<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags', 'logo'];

    public function scopeFilter(Builder $query, array $filters)
    {
        if (array_key_exists('tag', $filters)) {
            $tag = request('tag');
            return $query->where('tags', 'LIKE', "%$tag%");
        }

        if (array_key_exists('search', $filters)) {
            $search = request('search');
            return $query
                ->where('title', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%")
                ->orWhere('tags', 'LIKE', "%$search%");
        }

        return $query;
    }
}
