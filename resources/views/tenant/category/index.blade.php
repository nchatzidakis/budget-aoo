@extends('layouts.app')

@section('content')

    <x-theme.page-header
        h1="{{ __('Categories') }}"
        h2="{{ __('Here you can manage the categories.') }}"
    />

        <div class="w-5/6 mx-auto mt-5">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-700 uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 ">
                            {{ __('Category') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ now()->format('Y') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ now()->subMonths(5)->format('Y m') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ now()->subMonths(4)->format('Y m') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ now()->subMonths(3)->format('Y m') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ now()->subMonths(2)->format('Y m') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ now()->subMonth()->format('Y m') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ now()->format('Y m') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr class="border-b border-gray-200">
                        <th scope="row" class="pl-2 pr-1 py-2 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                            <a href="{{ route('category.edit', [tenant(), $category->id]) }}" class="whitespace-nowrap">
                                {{ $category->name }}
                            </a>
                        </th>
                        <td class="px-1"></td>
                        <td class="px-1"></td>
                        <td class="px-1"></td>
                        <td class="px-1"></td>
                        <td class="px-1"></td>
                        <td class="px-1"></td>
                        <td class="px-1"></td>
                    </tr>

                    @if ($category->children->count())
                        @foreach ($category->children as $child)
                            <tr class="border-b border-gray-200">
                                <th scope="row" class="pl-4 pr-1 py-2 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                                    <a href="{{ route('category.edit', [tenant(), $child->id]) }}" class="whitespace-nowrap">
                                        {{ $child->name }}
                                    </a>
                                </th>
                                <td class="px-1">
                                    {{ $child->expenses->whereBetween('paid_at', [now()->startOfYear(), now()->endOfYear()])->sum('transactionAmount') }} &euro;
                                </td>
                                <td class="px-1">
                                    {{ $child->expenses->whereBetween('paid_at', [now()->subMonths(5)->startOfMonth(), now()->subMonths(5)->endOfMonth()])->sum('transactionAmount') }} &euro;
                                </td>
                                <td class="px-1">
                                    {{ $child->expenses->whereBetween('paid_at', [now()->subMonths(4)->startOfMonth(), now()->subMonths(4)->endOfMonth()])->sum('transactionAmount') }} &euro;
                                </td>
                                <td class="px-1">
                                    {{ $child->expenses->whereBetween('paid_at', [now()->subMonths(3)->startOfMonth(), now()->subMonths(3)->endOfMonth()])->sum('transactionAmount') }} &euro;
                                </td>
                                <td class="px-1">
                                    {{ $child->expenses->whereBetween('paid_at', [now()->subMonths(2)->startOfMonth(), now()->subMonths(2)->endOfMonth()])->sum('transactionAmount') }} &euro;
                                </td>
                                <td class="px-1">
                                    {{ $child->expenses->whereBetween('paid_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()])->sum('transactionAmount') }} &euro;
                                </td>
                                <td class="px-1">
                                    {{ $child->expenses->whereBetween('paid_at', [now()->startOfMonth(), now()->endOfMonth()])->sum('transactionAmount') }} &euro;
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>


    <div class="w-5/6 mx-auto mt-5">
        <x-form.button-wide
            route="{{ route('category.create', tenant()) }}"
            color="green">
            {{ __('Create category') }}
        </x-form.button-wide>
    </div>

@endsection
