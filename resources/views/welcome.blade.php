@extends('layouts.app')

@section('content')
    <h1 class="w-1/2 mx-auto text-center text-indigo-600 text-3xl mt-12">
        {{ __('TALL Budget App') }}
    </h1>
    <h2 class="w-1/2 mx-auto text-center text-gray-500">
        {{ __('Please login or register to continue!') }}
    </h2>

    <a href="{{ route('auth.social.google.login') }}"
       class="w-1/6 text-center mx-auto mt-4 whitespace-nowrap px-3 py-1 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600">
        <i class="fa-brands fa-google text-5xl py-2"></i>
        <br />
        Sign in with Google
    </a>

@endsection
