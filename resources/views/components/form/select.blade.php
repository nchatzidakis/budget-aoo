<div class="{{ $wrapperCss ?? 'w-full' }}">
    <label for="{{ $id ?? $name }}" class="block text-sm font-medium text-gray-700">
        {{ __($label) }}
    </label>
    <div class="mt-1 flex rounded-md">
        <select
            name="{{ $name }}"
            id="{{ $id ?? $name }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
            @foreach ($values as $vKey=>$vValue)
                <option
                    @if ((old($name) ?? $value) == $vKey)selected="selected"@endif
                    value="{{ $vKey }}"
                >
                    {{ $vValue }}
                </option>
            @endforeach
        </select>
    </div>

    @error($name)
        <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>
