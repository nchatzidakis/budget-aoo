@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Verticals</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Verticals are the sections you would like to work with. For example, you can add a vertican for your Home budget, and another for your Business. Each one works separately.</p>
            </div>
            <div class="flex flex-wrap -m-4 text-center">

                @foreach ($tenants as $tenant)
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <i class="fa-solid fa-puzzle-piece text-5xl"></i>
                            <p class="leading-relaxed mt-3">
                                <a href="{{ route('tenant.show', $tenant) }}" class="title-font font-medium text-3xl text-gray-900">
                                    {{ $tenant->name }}
                                </a>
                            </p>
                            <p class="leading-relaxed mt-3">
                                <a href="{{ route('tenant.edit', $tenant) }}" class="text-sm text-yellow-500 border border-yellow-500 rounded px-2 py-1 mx-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    {{ __('Edit') }}
                                </a>
                                <a class="text-sm text-red-600 border border-red-600 rounded px-2 py-1 mx-2">
                                    <i class="fa-solid fa-trash"></i>
                                    {{ __('Permanently Delete') }}
                                </a>
                            </p>
                        </div>
                    </div>
                @endforeach
                <div class="p-4 w-full">
                    <a href="{{ route('tenant.create') }}" class="title-font font-medium text-3xl text-white">
                        <div class="border-2 border-green-600 px-4 py-6 rounded-lg bg-green-500">
                                <i class="fa-solid fa-plus text-white"></i> {{ __('Create') }}
                        </div>
                    </a>
                </div>
        </div>
    </section>
@endsection
