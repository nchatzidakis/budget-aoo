@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Please select a bank') }}</x-slot:title>
        <div class="flex flex-wrap">
            @foreach ($institutions as $institution)
                <a href="{{ route('nordigen.create', [
                            tenant(),
                            'institution_id' => $institution['id'],
                            'institution_name' => $institution['name'],
                            'account_id' => $account->id,
                            ]) }}"
                class="w-1/6 p-2 mb-4">
                    <img src="{{ $institution['logo'] }}" alt="{{ $institution['name'] }}" style="width: 100%; height: 150px" />
                    <span class="w-full text-center">{{ $institution['name'] }}</span>
                </a>
            @endforeach
        </div>
    </x-theme.layout.card>
@endsection
