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

                            <a href="{{ route('category.edit', [tenant(), $category->id]) }}" class="text-sm text-yellow-500 border border-yellow-500 rounded px-2 py-1 mx-2 mb-2 whitespace-nowrap">
                                <i class="fa-solid fa-pen-to-square"></i>
                                {{ __('Edit') }}
                            </a>
                            @if (!$category->children->count())
                                <form method="post" action="{{ route('category.destroy', [tenant(), $category->id]) }}" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="block-inline text-sm text-red-600 border border-red-600 rounded px-2 py-1 mx-2 mb-2 whitespace-nowrap">
                                        <i class="fa-solid fa-trash"></i>
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            @endif
                        </a>
                        @if ($category->children->count())
                            <ul>
                                @foreach ($category->children as $child)
                                    <li>
                                        <a href="#">
                                            - - {{ $child->name }}
                                        </a>

                                        <a href="{{ route('category.edit', [tenant(), $child->id]) }}" class="text-sm text-yellow-500 border border-yellow-500 rounded px-2 py-1 mx-2 mb-2 whitespace-nowrap">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            {{ __('Edit') }}
                                        </a>
                                        @if (!$child->expenses->count())
                                            <form method="post" action="{{ route('category.destroy', [tenant(), $child->id]) }}" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="block-inline text-sm text-red-600 border border-red-600 rounded px-2 py-1 mx-2 mb-2 whitespace-nowrap">
                                                    <i class="fa-solid fa-trash"></i>
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        @endif
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
