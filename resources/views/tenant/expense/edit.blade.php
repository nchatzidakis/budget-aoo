@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Create Expense') }}</x-slot:title>

        <form action="{{ route('expense.update', [tenant(), $expense->id]) }}" method="POST">
            @method('PUT')
            @include('tenant.expense.form')
        </form>
    </x-theme.layout.card>
@endsection
