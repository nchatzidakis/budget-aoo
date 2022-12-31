@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Expenses') }}</x-slot:title>
        <p>
            <a href="{{ route('expense.create', tenant()) }}"
               class="bg-green-500 text-white rounded px-3 py-1 mt-2 text-sm">
                {{ __('Create Expense') }}
            </a>
        </p>
    </x-theme.layout.card>
@endsection
