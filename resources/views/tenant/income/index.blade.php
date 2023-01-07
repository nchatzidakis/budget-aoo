@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Incomes') }}</x-slot:title>

        <x-form.button-wide
            route="{{ route('income.create', tenant()) }}"
            color="green">
            {{ __('Create Income') }}
        </x-form.button-wide>

        @foreach($incomes as $income)
            <div class="w-full py-1 mb-1 border-1 border-b">
                <a href="{{ route('income.edit', [tenant(), $income->id]) }}">
                    <span class="font-light">
                        {{ $income->incomeSource }} {{ $income->notes }}
                    </span>
                    <span class="font-bold float-right">
                        {{ $income->transactionAmount }} &euro;
                    </span>
                    <br />
                    <span class="text-sm">
                    {{ $income->paid_at->format('Y-m-d') }}
                    </span>
                    <span class="text-sm float-right">
                        {{ $income->account->name }} ({{ $income->account->institution }})
                    </span>
                </a>
            </div>
        @endforeach
    </x-theme.layout.card>
@endsection
