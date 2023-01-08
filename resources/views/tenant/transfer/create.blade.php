@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Create Transfer') }}</x-slot:title>

        <form action="{{ route('transfer.store', tenant()) }}" method="POST">
            @include('tenant.transfer.form')
        </form>
    </x-theme.layout.card>
@endsection
