@csrf

<div class="mb-6">
    <label for="transactionAmount" class="block text-sm font-medium text-gray-700">
        {{ __('Amount') }}
    </label>
    <div class="mt-1 flex rounded-md">
        <input type="number"
               name="transactionAmount"
               id="transactionAmount"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
               step="0.01"
               value="{{ old('transactionAmount') ?? $expense->transactionAmount ?? null }}"/>
    </div>
    @error('transactionAmount')
    <div class="w-full">
        <small class="text-red-600">{{ $message }}</small>
    </div>
    @enderror
</div>

<div class="mb-6">
    <p class="block text-sm font-medium text-gray-700 mb-2">
        Account
    </p>
    @foreach ($accounts as $account)
        <label for="account-{{ $account->id }}"
               class="inline-block rounded-sm px-2 py-2 mr-2 mb-2 bg-gray-500 text-white whitespace-nowrap">
            {{ $account->name }}
            <input type="radio"
                   value="{{ $account->id }}"
                   name="account_id"
                   id="account-{{ $account->id }}"
                   @if ((old('account_id') ?? $expense->account_id ?? null) == $account->id)checked="checked" @endif
            />
        </label>
    @endforeach
    @error('account_id')
    <div class="w-full">
        <small class="text-red-600">{{ $message }}</small>
    </div>
    @enderror
</div>

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
                       @if ((old('category_id') ?? $expense->category_id ?? null) == $subCategory->id)checked="checked" @endif
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

<div class="mb-6">
    <label for="notes" class="block text-sm font-medium text-gray-700">
        {{ __('Notes') }}
    </label>
    <div class="mt-1 flex rounded-md">
        <input type="text"
               name="notes"
               id="notes"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
               placeholder="{{ __('i.e. Milk') }}"
               value="{{ old('notes') ?? $account->notes ?? null }}"/>
    </div>
    @error('notes')
    <div class="w-full">
        <small class="text-red-600">{{ $message }}</small>
    </div>
    @enderror
</div>

<div class="mb-6">
    <label for="paid_at" class="block text-sm font-medium text-gray-700">
        {{ __('Payment Date') }}
    </label>
    <div class="mt-1 flex rounded-md">
        <input type="date"
               name="paid_at"
               id="paid_at"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
               step="0.01"
               value="{{ old('paid_at') ?? $expense->paid_at ?? now()->format('Y-m-d') }}"/>
    </div>
    @error('paid_at')
    <div class="w-full">
        <small class="text-red-600">{{ $message }}</small>
    </div>
    @enderror
</div>

<input type="submit"
       class="w-full title-font font-medium text-xl text-white px-4 py-2 rounded-lg bg-green-500"
       value="{{ __('Save') }}" />

