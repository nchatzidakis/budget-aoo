@csrf

<x-form.text-input
    name="incomeSource"
    placeholder="i.e. Salary or Dividends"
    value="{{ $income->incomeSource ?? null }}"
    label="Income Source" />

<x-form.number-input
    name="transactionAmount"
    value="{{ $income->transactionAmount ?? 0 }}"
    label="Amount in cents"
    inputmode="numeric"
    step="0.01" />

<x-form.radio-button-input
    name="account_id"
    value="{{ $income->account_id ?? null }}"
    label="Account"
    :values='collect($accounts)->mapWithKeys(fn($account) => [$account->id => "{$account->name} ({$account->institution})"])->toArray()' />

<x-form.text-input
    name="notes"
    placeholder="i.e. Project A final payment"
    value="{{ $income->notes ?? null }}"
    label="Notes" />

<x-form.date-input
    name="paid_at"
    value="{{ isset($income) ? $income->paid_at->format('Y-m-d') : now()->format('Y-m-d') }}"
    label="Payment Date" />

<x-form.submit-button-wide />

