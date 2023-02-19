@csrf

<x-form.number-input
    name="transactionAmount"
    value="{{ isset($transfer) ? $transfer->transactionAmount*100 :  0 }}"
    label="Amount in cents"
    inputmode="numeric" />

<x-form.radio-button-input
    name="source_account_id"
    value="{{ $transfer->source_account_id ?? null }}"
    label="Source Account"
    :values='collect($accounts)->mapWithKeys(fn($account) => [$account->id => "{$account->name} ({$account->institution})"])->toArray()' />

<x-form.radio-button-input
    name="destination_account_id"
    value="{{ $transfer->destination_account_id ?? null }}"
    label="Destination Account"
    :values='collect($accounts)->mapWithKeys(fn($account) => [$account->id => "{$account->name} ({$account->institution})"])->toArray()' />

<x-form.text-input
    name="notes"
    placeholder="i.e. Project A final payment"
    value="{{ $transfer->notes ?? null }}"
    label="Notes" />

<x-form.date-input
    name="transferred_at"
    value="{{ isset($transfer) ? $transfer->transferred_at->format('Y-m-d') : now()->format('Y-m-d') }}"
    label="Transfer Date" />

<x-form.submit-button-wide />
