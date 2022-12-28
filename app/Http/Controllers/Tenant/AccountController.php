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
        Account::create(request()->all());
        return redirect()->route('account.index', tenant());
    }

    public function edit(): View
    {
        return view('tenant.account.create');
    }

    public function update(AccountUpdateRequest $request): Redirect
    {
        return view('tenant.account.create');
    }

    public function destroy(): Redirect
    {
        return view('tenant.account.create');
    }
}
