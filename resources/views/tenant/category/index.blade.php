@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Categories') }}</x-slot:title>
        <p>
            <ul>
                @foreach ($categories as $category)
                    <li>
                        <a href="#">
                            - {{ $category->name }}
                        </a>
                        @if ($category->children->count())
                            <ul>
                                @foreach ($category->children as $child)
                                    <li>
                                        <a href="#">
                                            - - {{ $child->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('category.create', tenant()) }}"
               class="bg-green-500 text-white rounded px-3 py-1 mt-2 text-sm">
                {{ __('Create category') }}
            </a>
        </p>
    </x-theme.layout.card>
@endsection
