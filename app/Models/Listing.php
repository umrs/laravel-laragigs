<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create($attributes)
 * @method static latest()
 * @method static paginate()
 */
class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'tags',
        'company',
        'location',
        'email',
        'website',
        'description',
        'logo',
        'user_id',
    ];

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}