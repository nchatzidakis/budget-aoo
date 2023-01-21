<?php

namespace App\Repositories;

use App\Models\Account;

class AccountRepository
{
    public static function allByRecent()
    {
        return Account::orderByDesc('updated_at')->get();
    }
}
