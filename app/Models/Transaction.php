<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'transfer_id',
        'expense_id',
        'account_id',
        'transactionId',
        'transactionAmount',
        'notes',
        'meta',
        'paid_at',
    ];

    protected $casts = [
        'meta' => 'array',
        'paid_at' => 'datetime',
    ];

    function transfer(): BelongsTo
    {
        return $this->belongsTo(Transfer::class);
    }

    function expense(): BelongsTo
    {
        return $this->belongsTo(Expense::class);
    }

    function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
