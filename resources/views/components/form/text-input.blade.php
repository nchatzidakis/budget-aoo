<div class="{{ $wrapperCss ?? 'w-full' }}">
    <label for="{{ $id ?? $name }}" class="block text-sm font-medium text-gray-700">
        {{ __($label) }}
    </label>
    <div class="mt-1 flex rounded-md">
        <input type="text"
               name="{{ $name }}"
               id="{{ $id ?? $name }}"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
               value="{{ old($name) ?? $value }}"
               placeholder="{{ __($placeholder) }}" />

    </div>

    @error($name)
        <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>
