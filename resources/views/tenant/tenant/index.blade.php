@extends('layouts.app')

@section('content')
    @if ($tenants->count())
        <x-theme.layout.card>
            <x-slot:title>{{ __('Please select Vertical') }}</x-slot:title>
            <p class="">
                @foreach ($tenants as $tenant)
                    <a href="{{ route('tenant.show', $tenant) }}" class="bg-indigo-600 text-white rounded px-3 py-1 mr-2 text-sm">
                        {{ $tenant->name }}
                    </a>
                @endforeach
                <a href="{{ route('tenant.create') }}" class="bg-green-500 text-white rounded px-3 py-1 mr-2 text-sm">
                    <i class="fa-solid fa-plus"></i> {{ __('Create') }}
                </a>
            </p>
        </x-theme.layout.card>
    @endif

    @if (!$tenants->count())
        <x-theme.layout.card>
            <x-slot:title>{{ __('No Vertical found!') }}</x-slot:title>

            <p>
                {{ __('In order to continue please create a vertical, i.e. Home or Business.') }}
            </p>
            <a href="{{ route('tenant.create') }}" class="bg-green-500 text-white rounded px-3 py-1 mr-2 text-sm">
                <i class="fa-solid fa-plus"></i> {{ __('Create Vertical') }}
            </a>
        </x-theme.layout.card>
    @endif
@endsection
