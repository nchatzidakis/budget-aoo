<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\AccountStoreRequest;
use App\Http\Requests\Panel\AccountUpdateRequest;
use App\Models\Account;
use App\Services\NordigenService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function index(): View
    {
        return view('tenant.account.index', [
            'accounts' => Account::all(),
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

    public function edit($id): View
    {
        return view('tenant.account.edit', [
            'account' => Account::findOrFail($id),
        ]);
    }

    public function update(AccountUpdateRequest $request, $id): RedirectResponse
    {
        $input = request()->all();
        $account = Account::findOrFail($id);

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
