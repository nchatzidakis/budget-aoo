@csrf

<x-form.number-input
    name="transactionAmount"
    value="{{ isset($bill) ? $bill->transactionAmount*100 : 0 }}"
    label="Amount in cents"
    inputmode="numeric" />

<x-form.radio-button-input
    name="account_id"
    value="{{ $bill->account_id ?? null }}"
    label="Account"
    :values='collect($accounts)->mapWithKeys(fn($account) => [$account->id => "{$account->name} ({$account->institution})"])->toArray()' />

<div class="mb-6">
    <p class="block text-sm font-medium text-gray-700">{{ __('Category') }}</p>
    @foreach ($categories as $category)
        <p class="block text-sm font-medium text-gray-700 mb-1 mt-1">{{ $category->name }}</p>
        @foreach ($category->children as $subCategory)
            <label for="category-{{ $subCategory->id }}"
                   class="inline-block rounded-sm px-2 py-2 mr-2 mb-2 bg-gray-500 text-white whitespace-nowrap">
                {{ $subCategory->name }}
                <input type="radio"
                       value="{{ $subCategory->id }}"
                       name="category_id"
                       id="category-{{ $subCategory->id }}"
                       @if ((old('category_id') ?? $bill->category_id ?? null) == $subCategory->id)checked="checked" @endif
                />
            </label>
        @endforeach
    @endforeach
    @error('category_id')
    <div class="w-full">
        <small class="text-red-600">{{ $message }}</small>
    </div>
    @enderror
</div>

<x-form.text-input
    name="notes"
    placeholder="i.e. Project A final payment"
    value="{{ $bill->notes ?? null }}"
    label="Notes" />

<x-form.date-input
    name="expires_at"
    value="{{ isset($bill) ? $bill->expires_at?->format('Y-m-d') : now()->format('Y-m-d') }}"
    label="Due Date" />

<x-form.date-input
    name="paid_at"
    value="{{ isset($bill) ? $bill->paid_at?->format('Y-m-d') : null }}"
    label="Payment Date" />

<x-form.submit-button-wide />

