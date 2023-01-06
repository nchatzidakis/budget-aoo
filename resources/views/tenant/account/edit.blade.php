@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>
            {{ __('Update Account') }}
            <x-form.back-button route="{{ route('account.index', tenant()) }}"/>
        </x-slot:title>

        <form action="{{ route('account.update', [tenant(), $account->id]) }}" method="POST">
            @method('PUT')
            @include('tenant.account.form')
        </form>
    </x-theme.layout.card>
@endsection
