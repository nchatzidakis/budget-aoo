@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Transfers') }}</x-slot:title>

        <x-form.button-wide
            route="{{ route('transfer.create', tenant()) }}"
            color="green">
            {{ __('Create Transfer') }}
        </x-form.button-wide>

        @foreach($transfers as $transfer)
            <div class="w-full py-1 mb-1 border-1 border-b">
                <a href="{{ route('transfer.edit', [tenant(), $transfer->id]) }}">
                    <span class="font-light">
                        [{{ $transfer->sourceAccount->institution }} {{ $transfer->sourceAccount->name }}]
                        >
                        [{{ $transfer->destinationAccount->institution }} {{ $transfer->destinationAccount->name }}]
                    </span>
                    <span class="font-bold float-right">
                        {{ $transfer->transactionAmount }} &euro;
                    </span>
                    <br />
                    <span class="text-sm">
                        {{ $transfer->transferred_at->format('Y-m-d') }}
                    </span>
                </a>
            </div>
        @endforeach
    </x-theme.layout.card>
@endsection
