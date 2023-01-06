@csrf

<x-form.text-input
    name="name"
    placeholder="i.e. Savings"
    value="{{ $account->name ?? null }}"
    label="Name" />

<x-form.text-input
    name="institution"
    placeholder="i.e. Alpha Bank"
    value="{{ $account->institution ?? null }}"
    label="Institution" />

<x-form.select
    name="type"
    value="{{ $account->type ?? null }}"
    label="Type"
    :values="config('custom.account.type')" />

<x-form.select
    name="currency"
    value="{{ $account->currency ?? null }}"
    label="Currency"
    :values="config('custom.app.currency')" />

<x-form.number-input
    name="initialBalance"
    placeholder="i.e. 515 or -100"
    value="{{ $account->initialBalance ?? 0 }}"
    label="Initial Balance"
    step="0.01" />

<x-form.submit-button-wide />
