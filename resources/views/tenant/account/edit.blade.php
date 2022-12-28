@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Create Vertical') }}</x-slot:title>

        <form action="{{ route('account.update', tenant(), $account->id) }}" method="POST">
            @include('tenant.account.form')
        </form>
    </x-theme.layout.card>
@endsection
