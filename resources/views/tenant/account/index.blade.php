@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ __('Accounts') }}</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ __('Here you can manage your accounts, like Bank Accounts, Credit Cards etc.') }}</p>
            </div>
            <div class="flex flex-wrap -m-4 text-center">

                @foreach ($accounts as $account)
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-200 px-2 py-6 rounded-lg">
                            <p class="leading-relaxed mt-3">
                                <a href="{{ route('account.show', [tenant(), $account]) }}" class="title-font font-medium text-2xl text-gray-900">
                                    {{ $account->name }}
                                </a>
                            </p>
                            <p class="title-font text-xl">
                                {{ $account->institution }}
                            </p>
                            <p class="title-font text-2xl {{ $account->currentBalance >= 0 ? 'text-green-500' : 'text-red-500' }}">
                                {{ $account->currentBalance }} &euro;
                            </p>
                            <p class="leading-relaxed mt-3">
                                <a href="{{ route('tenant.edit', tenant()) }}" class="block-inline text-sm text-yellow-500 border border-yellow-500 rounded px-2 py-1 mx-2 mb-2 whitespace-nowrap">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    {{ __('Edit') }}
                                </a>
                                @if (!(isset($account->meta['requisition']['status']) && $account->meta['requisition']['status'] == 'CR'))
                                    <a href="{{ route('openbank.index', [tenant(), 'account_id' => $account->id]) }}" class="block-inline text-sm text-gray-500 border border-gray-500 rounded px-2 py-1 mx-2 mb-2 whitespace-nowrap">
                                        <i class="fa-solid fa-building-columns"></i>
                                        {{ __('Connect') }}
                                    </a>
                                @else
                                    <a href="{{ route('openbank.show', [tenant(), 'id' => $account->id]) }}" class="block-inline text-sm text-indigo-500 border border-indigo-500 rounded px-2 py-1 mx-2 mb-2 whitespace-nowrap">
                                        <i class="fa-solid fa-table"></i>
                                        {{ __('Transactions') }}
                                    </a>
                                @endif
                                <a class="block-inline text-sm text-red-600 border border-red-600 rounded px-2 py-1 mx-2 mb-2 whitespace-nowrap">
                                    <i class="fa-solid fa-trash"></i>
                                    {{ __('Delete') }}
                                </a>
                            </p>
                        </div>
                    </div>
                @endforeach
                <div class="p-4 w-full">
                    <a href="{{ route('account.create', tenant()) }}" class="title-font font-medium text-3xl text-white">
                        <div class="border-2 border-green-600 px-4 py-6 rounded-lg bg-green-500">
                            <i class="fa-solid fa-plus text-white"></i> {{ __('Create') }}
                        </div>
                    </a>
                </div>
            </div>
    </section>
@endsection
