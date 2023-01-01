@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Update Category') }}</x-slot:title>

        <form action="{{ route('category.update', [tenant(), $category->id]) }}" method="POST">
            @method('PUT')
            @include('tenant.category.form')
        </form>
    </x-theme.layout.card>
@endsection
