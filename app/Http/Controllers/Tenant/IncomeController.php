<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\ExpenseStoreRequest;
use App\Http\Requests\Tenant\ExpenseUpdateRequest;
use App\Http\Requests\Tenant\IncomeStoreRequest;
use App\Http\Requests\Tenant\IncomeUpdateRequest;
use App\Models\Account;
use App\Models\Category;
use App\Models\Expense;
use App\Models\Income;
use App\Repositories\AccountRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IncomeController extends Controller
{
    public function index(): View
    {
        // TODO Datatable with livewire or other async
        $incomes = Income::orderByDesc('paid_at')->limit(100)->get();
        return view('tenant.income.index', [
            'incomes' => $incomes,
        ]);
    }

    public function create(): View
    {
        return view('tenant.income.create', [
            'accounts' => AccountRepository::allByRecent(),
        ]);
    }

    public function store(IncomeStoreRequest $request): RedirectResponse
    {
        $input = request()->all();
        $input['transactionAmount'] = request('transactionAmount') / 100;
        //TODO iphone is not working with decimal in form correctly
        $income = Income::create($input);

        // TBD transfer it to Service
        $income->account->currentBalance = $income->account->currentBalance + $input['transactionAmount'];
        $income->account->save();

        return redirect()->route('income.index', tenant());
    }

    public function edit(int $id): View
    {
        return view('tenant.income.edit', [
            'income' => Income::find($id),
            'accounts' => AccountRepository::allByRecent(),
        ]);
    }

    public function update(IncomeUpdateRequest $request, int $id): RedirectResponse
    {
        $input = request()->all();
        $input['transactionAmount'] = request('transactionAmount') / 100;

        $income = Income::find($id);

        $income->account->currentBalance = $income->account->currentBalance - $income->transactionAmount + $input['transactionAmount'];
        $income->account->save();

        $income->update($input);

        return redirect()->route('income.index', tenant());
    }

    public function destroy(int $id): RedirectResponse
    {
        $income = Income::find($id);

        $income->account->currentBalance = $income->account->currentBalance - $income->transactionAmount;
        $income->account->save();

        $income->delete();

        return redirect()->route('income.index', tenant());
    }
}
