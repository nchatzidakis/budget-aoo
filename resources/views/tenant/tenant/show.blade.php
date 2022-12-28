@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ tenant()->name }}</x-slot:title>

        <p>
            {{ __('This will be the dashboard for the vertical.') }}
        </p>

        <a href="{{ route('account.create', tenant()) }}" class="bg-green-500 text-white rounded px-3 py-1 mt-2 text-sm">
            {{ __('Create Account.') }}
        </a>
    </x-theme.layout.card>
@endsection
