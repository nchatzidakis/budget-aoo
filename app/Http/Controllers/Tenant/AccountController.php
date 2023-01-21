<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\AccountStoreRequest;
use App\Http\Requests\Tenant\AccountUpdateRequest;
use App\Models\Account;
use App\Repositories\AccountRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function index(): View
    {
        return view('tenant.account.index', [
            'accounts' => AccountRepository::allByRecent(),
        ]);
    }

    public function create(): View
    {
        return view('tenant.account.create');
    }

    public function store(AccountStoreRequest $request): RedirectResponse
    {
        $input = request()->all();
        $input['currentBalance'] = $input['initialBalance'];
        Account::create($input);

        return redirect()->route('account.index', tenant());
    }

    public function edit(Account $account): View
    {
        return view('tenant.account.edit', [
            'account' => $account,
        ]);
    }

    public function update(AccountUpdateRequest $request, Account $account): RedirectResponse
    {
        $input = request()->all();

        $oldInitialBalance = $account->initialBalance;
        $newInitialBalance = $input['initialBalance'];
        $initialBalanceDiff = $newInitialBalance - $oldInitialBalance;
        $input['currentBalance'] = $account->currentBalance + $initialBalanceDiff;

        $account->update($input);

        return redirect()->route('account.index', tenant());
    }

    public function destroy(): RedirectResponse
    {
        //
    }
}
