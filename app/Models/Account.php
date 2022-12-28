<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Account extends Model
{
    protected $fillable = [
        'name',
        'institution',
        'type',
        'currency',
        'initialBalance',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function tenants(): BelongsToMany
    {
        return $this->belongsToMany(Tenant::class);
    }

}
