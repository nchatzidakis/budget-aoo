@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Create Bill') }}</x-slot:title>

        <form action="{{ route('bill.store', tenant()) }}" method="POST">
            @include('tenant.bill.form')
        </form>
    </x-theme.layout.card>
@endsection
