@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Update Category') }}</x-slot:title>

        <form action="{{ route('category.update', [tenant(), $category->id]) }}" method="POST">
            @method('PUT')
            @include('tenant.category.form')
        </form>

        <form method="post" action="{{ route('category.destroy', [tenant(), $category->id]) }}" class="inline-block">
            @csrf
            @method('DELETE')
            <button class="block-inline text-sm text-red-600 border border-red-600 rounded px-2 py-1 mx-2 mb-2 whitespace-nowrap">
                <i class="fa-solid fa-trash"></i>
                {{ __('Delete') }}
            </button>
        </form>
    </x-theme.layout.card>


@endsection
