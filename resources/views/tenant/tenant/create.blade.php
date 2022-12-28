@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Create Vertical') }}</x-slot:title>

        <form action="{{ route('tenant.store') }}" method="POST">
            @csrf
            <div class="w-full">
                <label for="company-website" class="block text-sm font-medium text-gray-700">
                    {{ __('Name') }}
                </label>
                <div class="mt-1 flex rounded-md">
                    <input type="text"
                           name="name"
                           id="name"
                           class="w-full rounded-md border-gray-300"
                           placeholder="{{ __('i.e. Home or My Business') }}" />

                </div>
            </div>

            @error('name')
            <div class="w-full">
                <small class="text-red-600">{{ $message }}</small>
            </div>
            @enderror

            <div class="w-full text-right mt-4">
                <input type="submit" class=" justify-center rounded-md shadow-sm px-3 py-1 bg-green-500 text-white hover:bg-green-50"
                       value="{{ __('Save') }}">
            </div>
        </form>
    </x-theme.layout.card>
@endsection
