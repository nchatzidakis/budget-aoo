@extends('layouts.base')

@section('body')
    <div class="flex flex-col">
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
