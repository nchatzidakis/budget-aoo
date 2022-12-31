@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Please select a bank') }}</x-slot:title>
        <p>
            @foreach ($institutions as $institution)
                <a href="{{ route('openbank.create', [
                            tenant(),
                            'institution_id' => $institution['id'],
                            'institution_name' => $institution['name'],
                            'account_id' => $account->id,
                            ]) }}"
                class="w-1/6 inline-flex">
                    <img src="{{ $institution['logo'] }}" alt="{{ $institution['name'] }}" />
                </a>
            @endforeach
        </p>
    </x-theme.layout.card>
@endsection
