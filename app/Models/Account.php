<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'name',
        'institution',
        'type',
        'currency',
        'initialBalance',
        'currentBalance',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];
}
