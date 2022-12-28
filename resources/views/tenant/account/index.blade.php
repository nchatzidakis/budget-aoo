@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Accounts') }}</x-slot:title>
        <p>
            @foreach ($accounts as $account)
                <a href="{{ route('account.show', [tenant(), $account]) }}"
                   class="bg-indigo-600 text-white rounded px-3 py-1 mt-2 text-sm">
                    {{ $account->name }}
                </a>
            @endforeach
            <a href="{{ route('account.create', tenant()) }}"
               class="bg-green-500 text-white rounded px-3 py-1 mt-2 text-sm">
                {{ __('Create Account') }}
            </a>
        </p>
    </x-theme.layout.card>
@endsection
