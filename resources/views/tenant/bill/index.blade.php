@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Bills') }}</x-slot:title>

        <x-form.button-wide
            route="{{ route('bill.create', tenant()) }}"
            color="green">
            {{ __('Create Bill') }}
        </x-form.button-wide>

        @foreach($bills as $bill)
            <div class="w-full py-1 mb-1 border-1 border-b">
                <a href="{{ route('bill.edit', [tenant(), $bill->id]) }}">
                    <span class="font-light">
                        {{ $bill->category->parent->name }} {{ $bill->category->name }}
                    </span>
                    <span class="font-bold float-right">
                        {{ $bill->transactionAmount }} &euro;
                    </span>
                    <br />
                    <span class="text-sm">
                        <span class="text-green-800">{{ $bill->paid_at?->format('Y-m-d') }}</span>
                        /
                        <span class="text-red-900">{{ $bill->expires_at->format('Y-m-d') }}</span>
                    </span>
                    @if ($bill->account)
                        <span class="text-sm float-right">
                            {{ $bill->account->name }} ({{ $bill->account->institution }})
                        </span>
                    @endif
                </a>
            </div>
        @endforeach
    </x-theme.layout.card>
@endsection
