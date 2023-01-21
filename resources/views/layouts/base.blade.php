<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}?{{ date('YmdHis') }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ url(mix('js/app.js')) }}?{{ date('YmdHis') }}" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <span class="ml-3 text-xl">TALL Budget App</span>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">

                @auth
                    @if (tenant())
                        <a
                            href="{{ route('expense.index', tenant()) }}"
                            class="whitespace-nowrap mr-3 text-indigo-600">
                            Expenses
                        </a>
                        <a
                            href="{{ route('bill.index', tenant()) }}"
                            class="whitespace-nowrap mr-3 text-indigo-600">
                            Bills
                        </a>
                        <a
                            href="{{ route('income.index', tenant()) }}"
                            class="whitespace-nowrap mr-3 text-indigo-600">
                            Incomes
                        </a>
                        <a
                            href="{{ route('account.index', tenant()) }}"
                            class="whitespace-nowrap mr-3 text-indigo-600">
                            Accounts
                        </a>
                        <a
                            href="{{ route('transfer.index', tenant()) }}"
                            class="whitespace-nowrap mr-3 text-indigo-600">
                            Transfers
                        </a>
                        <a
                            href="{{ route('category.index', tenant()) }}"
                            class="whitespace-nowrap mr-3 text-indigo-600">
                            Categories
                        </a>
                        <a
                            href="{{ route('tenant.index') }}"
                            class="whitespace-nowrap mr-3 text-indigo-600">
                            Verticals
                        </a>
                    @endif
                    <a
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="whitespace-nowrap mr-3 text-red-600">
                        Log out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('auth.social.google.login') }}"
                        class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">
                        <i class="fa-brands fa-google text-lg py-2 mr-3"></i> Login
                    </a>
                @endauth
            </nav>
        </div>
    </header>

    @yield('body')

    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-4 mx-auto flex items-center sm:flex-row flex-col">
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">
                © 2022-2023 |
                TALL Laravel Budget App |
                Powered by
                <a href="https://github.com/nchatzidakis/tall-budget-app"
                   target="_blank">
                    nchatzidakis
                </a>
            </p>
        </div>
    </footer>

    @livewireScripts
    <script src="https://kit.fontawesome.com/aa216dbfe8.js" crossorigin="anonymous"></script>
</body>
</html>
