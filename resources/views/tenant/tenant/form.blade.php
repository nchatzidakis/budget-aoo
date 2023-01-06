@csrf

<x-form.text-input
    name="name"
    placeholder="i.e. Home or My Business"
    value="{{ $tenant->name ?? null }}"
    label="Name" />

<x-form.submit-button-wide />
