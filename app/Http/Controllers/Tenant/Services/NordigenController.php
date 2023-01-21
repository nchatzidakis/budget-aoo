<?php

namespace App\Http\Controllers\Tenant\Services;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Services\NordigenService;
use Illuminate\Http\Request;

class NordigenController extends Controller
{
    public function index()
    {
        $service = new NordigenService();
        $account = Account::find(request('account_id'));

        return view('tenant.openbank.index', [
            'institutions' => $service->getInstitutions('GR'),
            'account' => $account,
        ]);
    }

    public function create()
    {
//        $account = Account::create([
//            'name' => request('institution_name'),
//            'type' => 'bankAccountChecking',
//            'currency' => 'EUR',
//            'institution' => request('institution_name'),
//            'initialBalance' => 0,
//        ]);
        $account = Account::findOrFail(request('account_id'));

        $service = new NordigenService();
        $agreement = $service->createEnduserAgreement(request('institution_id'));
        $requisition = $service->createRequisitions($agreement, $account);

        $account->meta = [
            'id' => request('institution_id'),
            'agreement' => $agreement,
            'requisition' => $requisition,
        ];
        $account->save();

        return redirect($requisition['link']);
    }

    public function store()
    {
        return redirect()->route('openbank.show', [tenant(), request('ref')]);
    }

    public function show($id)
    {
        $account = Account::find($id);
        $service = new NordigenService();
        $accounts = $service->getRequisitions($account->meta['requisition']);

//        dd(
//            $service->getAccountDetails($accounts),
//            $service->getAccountBalances($accounts)
//        );
        $transactions = $service->getAccountTransactions($accounts);

        return view('tenant.openbank.show', [
            'transactions' => $transactions['transactions'],
        ]);
    }
}
