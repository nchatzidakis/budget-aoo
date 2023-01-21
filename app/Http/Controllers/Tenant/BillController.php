<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\BillStoreRequest;
use App\Http\Requests\Tenant\BillUpdateRequest;
use App\Models\Bill;
use App\Models\Category;
use App\Repositories\AccountRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BillController extends Controller
{
    public function index(): View
    {
        // TODO Datatable with livewire or other async
        $bills = Bill::orderByDesc('expires_at')->limit(100)->get();

        return view('tenant.bill.index', [
            'bills' => $bills,
        ]);
    }

    public function create(): View
    {
        return view('tenant.bill.create', [
            'accounts' => AccountRepository::allByRecent(),
            'categories' => Category::orderBy('position')->whereNull('parent_id')->get(),
        ]);
    }

    public function store(BillStoreRequest $request): RedirectResponse
    {
        $input = request()->all();
        $input['transactionAmount'] = request('transactionAmount') / 100;
        //TODO iphone is not working with decimal in form correctly
        $bill = Bill::create($input);

        // TBD if a bill is paid we should create an expense at the same time

        return redirect()->route('bill.index', tenant());
    }

    public function edit(Bill $bill): View
    {
        if ($bill->paid_at) {
            abort(403);
        }

        return view('tenant.bill.edit', [
            'bill' => $bill,
            'accounts' => AccountRepository::allByRecent(),
            'categories' => Category::orderBy('position')->whereNull('parent_id')->get(),
        ]);
    }

    public function update(BillUpdateRequest $request, Bill $bill): RedirectResponse
    {
        $input = request()->all();
        $input['transactionAmount'] = request('transactionAmount') / 100;

        $bill->update($input);

        return redirect()->route('bill.index', tenant());
    }

    public function destroy(Bill $bill): RedirectResponse
    {
        $bill->delete();

        return redirect()->route('bill.index', tenant());
    }
}
