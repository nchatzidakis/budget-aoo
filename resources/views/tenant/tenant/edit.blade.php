@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>
            {{ __('Edit Vertical') }}
            <x-form.back-button route="{{ route('tenant.index') }}"/>
        </x-slot:title>

        <form action="{{ route('tenant.update', $tenant->id) }}" method="POST">
            @method('PUT')
            @include('tenant.tenant.form')
        </form>
    </x-theme.layout.card>
@endsection
