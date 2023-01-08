<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transfer extends Model
{
    protected $fillable = [
        'source_account_id',
        'destination_account_id',
        'transactionAmount',
        'notes',
        'meta',
        'transferred_at',
    ];

    protected $casts = [
        'meta' => 'array',
        'transferred_at' => 'datetime',
    ];

    function sourceAccount(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    function destinationAccount(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
