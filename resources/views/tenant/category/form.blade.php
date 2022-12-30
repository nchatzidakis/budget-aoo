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
               placeholder="{{ __('i.e. Grocery') }}"
               value="{{ old('name') ?? $category->name ?? null }}"/>
    </div>
    @error('name')
    <div class="w-full">
        <small class="text-red-600">{{ $message }}</small>
    </div>
    @enderror
</div>
<div class="w-full">
    <label for="position" class="block text-sm font-medium text-gray-700">
        {{ __('position') }}
    </label>
    <div class="mt-1 flex rounded-md">
        <input type="number"
               name="position"
               id="position"
               class="w-full rounded-md border-gray-300"
               value="{{ old('position') ?? $category->position ?? 1 }}"/>
    </div>
    @error('position')
    <div class="w-full">
        <small class="text-red-600">{{ $message }}</small>
    </div>
    @enderror
</div>
<div class="w-full">
    <label for="parent_id" class="block text-sm font-medium text-gray-700">
        {{ __('Parent') }}
    </label>
    <div class="mt-1 flex rounded-md">
        <select name="parent_id"
                id="parent_id"
                class="w-full rounded-md border-gray-300">
            <option></option>
            @foreach ($categories as $item)
                <option @if ((old('parent_id') ?? $category->parent_id ?? null) == $item->id)selected="selected"
                        @endif
                        value="{{ $item->id }}">
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>
    @error('parent_id')
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
