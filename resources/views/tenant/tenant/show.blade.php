@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ tenant()->name }}</x-slot:title>
    </x-theme.layout.card>
@endsection
