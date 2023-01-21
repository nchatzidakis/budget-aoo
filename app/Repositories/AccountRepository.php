<?php

namespace App\Repositories;


use App\Models\Account;

class AccountRepository
{

    static function allByRecent()
    {
        return Account::orderByDesc('updated_at')->get();
    }
}
