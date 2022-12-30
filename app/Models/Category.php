<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    function parent()
    {
        return $this->belongsTo(Category::class);
    }
}
