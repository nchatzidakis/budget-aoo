@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Create Income') }}</x-slot:title>

        <form action="{{ route('income.store', tenant()) }}" method="POST">
            @include('tenant.income.form')
        </form>
    </x-theme.layout.card>
@endsection
