<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\TransferStoreRequest;
use App\Http\Requests\Tenant\TransferUpdateRequest;
use App\Models\Transfer;
use App\Repositories\AccountRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TransferController extends Controller
{
    public function index(): View
    {
        return view('tenant.transfer.index', [
            'transfers' => Transfer::all(),
        ]);
    }

    public function create(): View
    {
        return view('tenant.transfer.create', [
            'accounts' => AccountRepository::allByRecent(),
        ]);
    }

    public function store(TransferStoreRequest $request): RedirectResponse
    {
        $input = request()->all();
        $input['transactionAmount'] = request('transactionAmount') / 100;
        //TODO iphone is not working with decimal in form correctly
        $transfer = Transfer::create($input);

        // TBD transfer it to Service
        $transfer->sourceAccount->currentBalance -= $input['transactionAmount'];
        $transfer->sourceAccount->save();
        $transfer->destinationAccount->currentBalance += $input['transactionAmount'];
        $transfer->destinationAccount->save();

        return redirect()->route('transfer.index', tenant());
    }

    public function edit(Transfer $transfer): View
    {
        return view('tenant.transfer.edit', [
            'transfer' => $transfer,
            'accounts' => AccountRepository::allByRecent(),
        ]);
    }

    public function update(TransferUpdateRequest $request, Transfer $transfer): RedirectResponse
    {
        $input = request()->all();
        $input['transactionAmount'] = request('transactionAmount') / 100;
        //TODO iphone is not working with decimal in form correctly

        // TBD transfer it to Service
        $transfer->sourceAccount->currentBalance += $transfer->transactionAmount;
        $transfer->sourceAccount->currentBalance -= $input['transactionAmount'];
        $transfer->sourceAccount->save();

        $transfer->destinationAccount->currentBalance -= $transfer->transactionAmount;
        $transfer->destinationAccount->currentBalance += $input['transactionAmount'];
        $transfer->destinationAccount->save();

        $transfer->update($input);

        return redirect()->route('transfer.index', tenant());
    }

    public function destroy(Transfer $transfer): RedirectResponse
    {
        $transfer->sourceAccount->currentBalance += $transfer->transactionAmount;
        $transfer->sourceAccount->save();
        $transfer->destinationAccount->currentBalance -= $transfer->transactionAmount;
        $transfer->destinationAccount->save();

        $transfer->delete();

        return redirect()->route('transfer.index', tenant());
    }
}
