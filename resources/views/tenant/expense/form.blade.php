@csrf

<div class="w-full">
    <label for="transactionAmount" class="block text-sm font-medium text-gray-700">
        {{ __('Amount') }}
    </label>
    <div class="mt-1 flex rounded-md">
        <input type="number"
               name="transactionAmount"
               id="transactionAmount"
               class="w-full rounded-md border-gray-300"
               step="0.01"
               value="{{ old('transactionAmount') ?? $expense->transactionAmount ?? null }}"/>
    </div>
    @error('transactionAmount')
    <div class="w-full">
        <small class="text-red-600">{{ $message }}</small>
    </div>
    @enderror
</div>

<div class="w-full">
    @foreach ($accounts as $account)
        <label for="account-{{ $account->id }}"
               class="justify-center rounded-md shadow-sm px-3 py-1 bg-indigo-600 text-white">
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

<div class="w-full">
    @foreach ($categories as $category)
        <h3>{{ $category->name }}</h3>
        @foreach ($category->children as $subCategory)
            <label for="category-{{ $subCategory->id }}"
                   class="justify-center rounded-md shadow-sm px-3 py-1 bg-indigo-600 text-white">
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

<div class="w-full">
    <label for="notes" class="block text-sm font-medium text-gray-700">
        {{ __('Notes') }}
    </label>
    <div class="mt-1 flex rounded-md">
        <input type="text"
               name="notes"
               id="notes"
               class="w-full rounded-md border-gray-300"
               placeholder="{{ __('i.e. Milk') }}"
               value="{{ old('notes') ?? $account->notes ?? null }}"/>
    </div>
    @error('notes')
    <div class="w-full">
        <small class="text-red-600">{{ $message }}</small>
    </div>
    @enderror
</div>

<div class="w-full">
    <label for="paid_at" class="block text-sm font-medium text-gray-700">
        {{ __('Payment Date') }}
    </label>
    <div class="mt-1 flex rounded-md">
        <input type="date"
               name="paid_at"
               id="paid_at"
               class="w-full rounded-md border-gray-300"
               step="0.01"
               value="{{ old('paid_at') ?? $expense->paid_at ?? now()->format('Y-m-d') }}"/>
    </div>
    @error('paid_at')
    <div class="w-full">
        <small class="text-red-600">{{ $message }}</small>
    </div>
    @enderror
</div>

<div class="w-full text-right mt-4">
    <input type="submit"
           class=" justify-center rounded-md shadow-sm px-3 py-1 bg-green-500 text-white hover:bg-green-50"
           value="{{ __('Save') }}">
</div>

