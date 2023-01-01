<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'parent_id',
        'position',
        'name',
        'type',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }
}
