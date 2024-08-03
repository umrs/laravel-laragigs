<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 */
class Listing extends Model
{
    use HasFactory;

    public function scopeFilterTag(Builder $query, ?string $tag)
    {
        if ($tag) {
            $tag = mb_strtolower($tag);
            $query->where('tags', 'like', "%$tag%");
        }
    }

    public function scopeFilterSearch(Builder $query, ?string $search)
    {
        if ($search) {
            $search = mb_strtolower($search);
            $query
                ->whereRaw('title ILIKE ?', "%$search%")
                ->orWhereRaw('description ILIKE ?', "%$search%");
        }
    }
}