@extends('layouts.base')

@section('body')
    <div class="flex flex-col">
        <div class="m-4 p-4 bg-gray-50 w-full text-right">
            @auth
                @if (tenant())
                    <a
                        href="{{ route('tenant.index') }}"
                        class="whitespace-nowrap inline-flex px-3 py-1 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600">
                        Verticals
                    </a>
                    <a
                        href="{{ route('account.index', tenant()) }}"
                        class="whitespace-nowrap inline-flex px-3 py-1 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600">
                        Accounts
                    </a>
                    <a
                        href="{{ route('category.index', tenant()) }}"
                        class="whitespace-nowrap inline-flex px-3 py-1 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600">
                        Categories
                    </a>
                @else
                @endif
                <a
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="whitespace-nowrap inline-flex px-3 py-1 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600">
                    Log out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endauth
        </div>

        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
