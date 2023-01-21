<div class="{{ $wrapperCss ?? 'w-full' }}">
    <label for="{{ $id ?? $name }}" class="block text-sm font-medium text-gray-700">
        {{ __($label) }}
    </label>
    <div class="mt-1 rounded-md">
        @foreach ($values as $vKey=>$vValue)
            <label for="{{ $name }}-{{ $vKey}}"
                   class="inline-block rounded-sm px-2 py-2 mr-2 mb-2 bg-gray-500 text-white whitespace-nowrap">
                {{ $vValue }})
                <input type="radio"
                       value="{{ $vKey }}"
                       name="{{ $name }}"
                       id="{{ $name }}-{{ $vKey }}"
                       @if ((old($name) ?? $value) == $vKey)checked="checked" @endif
                />
            </label>
        @endforeach
    </div>

    @error($name)
    <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>
