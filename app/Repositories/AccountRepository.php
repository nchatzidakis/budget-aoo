<?php

namespace App\Repositories;

use App\Models\Account;
use Illuminate\Support\Collection;

class AccountRepository
{
    public static function all(): Collection
    {
        return Account::orderByDesc('institution')->get();
    }
    public static function allByRecent(): Collection
    {
        return Account::orderByDesc('updated_at')->get();
    }
}
