@extends('layouts.app')

@section('content')


    <x-theme.layout.card>
        <x-slot:title>
            {{ __('Create Vertical') }}
            <x-form.back-button route="{{ route('tenant.index') }}"/>
        </x-slot:title>

        <form action="{{ route('tenant.store') }}" method="POST">
            @include('tenant.tenant.form')
        </form>
    </x-theme.layout.card>
@endsection
