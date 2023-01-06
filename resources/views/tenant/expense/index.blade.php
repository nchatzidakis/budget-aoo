@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Expenses') }}</x-slot:title>

        <x-form.button-wide
            route="{{ route('expense.create', tenant()) }}"
            color="green">
            {{ __('Create Expense') }}
        </x-form.button-wide>

        @foreach($expenses as $expense)
            <div class="w-full py-1 mb-1 border-1 border-b">
                <a href="{{ route('expense.edit', [tenant(), $expense->id]) }}">
                    <span class="font-light">
                        {{ $expense->category->parent->name }} {{ $expense->category->name }}
                    </span>
                    <span class="font-bold float-right">
                        {{ $expense->transactionAmount }} &euro;
                    </span>
                    <br />
                    <span class="text-sm">
                    {{ $expense->paid_at->format('Y-m-d') }}
                    </span>
                    <span class="text-sm float-right">
                        {{ $expense->account->name }} ({{ $expense->account->institution }})
                    </span>
                </a>
            </div>
        @endforeach
    </x-theme.layout.card>
@endsection
