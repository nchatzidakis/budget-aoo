<?php

namespace App\Services;

use App\Models\Account;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class NordigenService
{
    protected string $access_token;

    public function __construct()
    {
        $response = $this->getToken();
        $this->access_token = $response['access'];
    }

    public function getToken(): array|\Exception
    {
        $response = Http::post(config('services.nordigen.endpoint').'token/new/', [
            'secret_id' => config('services.nordigen.secret_id'),
            'secret_key' => config('services.nordigen.secret_key'),
        ]);

        if (! $response->successful()) {
            return throw new \Exception('Failed to get token.');
        }

        return $response->json();
    }

    public function getInstitutions(string $country): array
    {
        $response = Http::withToken($this->access_token)
            ->get(config('services.nordigen.endpoint').'institutions', [
                'country' => $country,
            ]);

        if (! $response->successful()) {
            return throw new \Exception('Failed to get institutions.');
        }

        return $response->json();
    }

    public function createEnduserAgreement(string $institution_id): array
    {
        $response = Http::withToken($this->access_token)
            ->post(config('services.nordigen.endpoint').'agreements/enduser/', [
                'institution_id' => $institution_id,
                'max_historical_days' => '365',
                'access_valid_for_days' => '90',
                'access_scope' => ['balances', 'details', 'transactions'],
            ]);

        if (! $response->successful()) {
            return throw new \Exception('Failed to get institutions.'.$response->status());
        }

        return $response->json();
    }

    public function createRequisitions(array $agreement, Account $account): array
    {
        $response = Http::withToken($this->access_token)
            ->post(config('services.nordigen.endpoint').'requisitions/', [
                'institution_id' => $agreement['institution_id'],
                'redirect' => route('nordigen.callback', tenant()),
                'reference' => $account->id,
                'agreement' => $agreement['id'],
                'user_language' => 'EN',
            ]);

        return $response->json();
    }

    public function getRequisitions(array $requisition): array
    {
        $response = Http::withToken($this->access_token)
            ->get(config('services.nordigen.endpoint').'requisitions/'.$requisition['id'].'/');

        return $response->json();
    }

    public function getAccountTransactions(array $accounts): array
    {
        $response = Http::withToken($this->access_token)
            ->get(config('services.nordigen.endpoint').'accounts/'.$accounts['accounts'][0].'/transactions/');

        return $response->json();
    }

    public function getAccountDetails(array $accounts): array
    {
        $response = Http::withToken($this->access_token)
            ->get(config('services.nordigen.endpoint').'accounts/'.$accounts['accounts'][0].'/details/');

        return $response->json();
    }

    public function getAccountBalances(array $accounts): array
    {
        $response = Http::withToken($this->access_token)
            ->get(config('services.nordigen.endpoint').'accounts/'.$accounts['accounts'][0].'/balances/');

        return $response->json();
    }
}
