@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Create Category') }}</x-slot:title>

        <form action="{{ route('category.store', tenant()) }}" method="POST">
            @include('tenant.category.form')
        </form>
    </x-theme.layout.card>
@endsection
