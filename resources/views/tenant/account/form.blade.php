@csrf
<div class="w-full">
    <label for="name" class="block text-sm font-medium text-gray-700">
        {{ __('Name') }}
    </label>
    <div class="mt-1 flex rounded-md">
        <input type="text"
               name="name"
               id="name"
               class="w-full rounded-md border-gray-300"
               placeholder="{{ __('i.e. Savings') }}"
               value="{{ old('name') ?? $account->name ?? null }}"/>
    </div>
    @error('name')
    <div class="w-full">
        <small class="text-red-600">{{ $message }}</small>
    </div>
    @enderror
</div>
<div class="w-full">
    <label for="institution" class="block text-sm font-medium text-gray-700">
        {{ __('Institution') }}
    </label>
    <div class="mt-1 flex rounded-md">
        <input type="text"
               name="institution"
               id="institution"
               class="w-full rounded-md border-gray-300"
               placeholder="{{ __('i.e. Alpha Bank') }}"
               value="{{ old('institution') ?? $account->institution ?? null }}"/>
    </div>
    @error('institution')
    <div class="w-full">
        <small class="text-red-600">{{ $message }}</small>
    </div>
    @enderror
</div>
<div class="w-full">
    <label for="type" class="block text-sm font-medium text-gray-700">
        {{ __('Type') }}
    </label>
    <div class="mt-1 flex rounded-md">
        <select name="type"
                id="type"
                class="w-full rounded-md border-gray-300">
            @foreach (config('custom.account.type') as $key=>$value)
                <option @if ((old('type') ?? $account->type ?? null) == $key)selected="selected"
                        @endif
                        value="{{ $key }}">
                    {{ __($value) }}
                </option>
            @endforeach
        </select>
    </div>
    @error('type')
    <div class="w-full">
        <small class="text-red-600">{{ $message }}</small>
    </div>
    @enderror
</div>
<div class="w-full">
    <label for="currency" class="block text-sm font-medium text-gray-700">
        {{ __('Currency') }}
    </label>
    <div class="mt-1 flex rounded-md">
        <select name="currency"
                id="currency"
                class="w-full rounded-md border-gray-300">
            @foreach (config('custom.app.currency') as $key=>$value)
                <option @if ((old('currency') ?? $account->currency ?? null) == $key)selected="selected"
                        @endif value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
    @error('currency')
    <div class="w-full">
        <small class="text-red-600">{{ $message }}</small>
    </div>
    @enderror
</div>
<div class="w-full">
    <label for="initialBalance" class="block text-sm font-medium text-gray-700">
        {{ __('Initial Balance') }}
    </label>
    <div class="mt-1 flex rounded-md">
        <input type="number"
               step="0.01"
               name="initialBalance"
               id="initialBalance"
               class="w-full rounded-md border-gray-300"
               placeholder="{{ __('i.e. 515 or -100') }}"
               value="{{ old('initialBalance') ?? $account->initialBalance ?? 0 }}"/>
    </div>
    @error('initialBalance')
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
