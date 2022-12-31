@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Create Expense') }}</x-slot:title>

        <form action="{{ route('expense.store', tenant()) }}" method="POST">
            @include('tenant.expense.form')
        </form>
    </x-theme.layout.card>
@endsection
