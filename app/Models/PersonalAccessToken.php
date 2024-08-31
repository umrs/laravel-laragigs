<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccessToken extends Model
{
    use HasFactory;

    public function scopeOwner(Builder $query): void
    {
        $query->where('tokenable_id', auth()->user()?->id ?? -1);
    }
}
