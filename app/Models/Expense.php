<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    protected $fillable = [
        'category_id',
        'account_id',
        'transactionAmount',
        'notes',
        'meta',
        'paid_at',
    ];

    protected $casts = [
        'meta' => 'array',
        'paid_at' => 'datetime',
    ];

    function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
