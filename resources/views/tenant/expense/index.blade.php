@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Expenses') }}</x-slot:title>
        <table class="table-auto">
            <thead>
                <tr>
                    <th>{{ __('Category')  }}</th>
                    <th>{{ __('Amount')  }} / {{ __('Account')  }}</th>
                    <th>{{ __('Paid at')  }}</th>
                    <th>{{ __('Actions')  }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
                    <tr>
                        <td>{{ $expense->category->name }}</td>
                        <td>{{ $expense->transactionAmount }} &euro; <br /> {{ $expense->account->name }} ({{ $expense->account->institution }})</td>
                        <td>{{ $expense->paid_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('expense.edit', [tenant(), $expense->id]) }}" class="text-sm text-yellow-500 border border-yellow-500 rounded px-2 py-1 mx-2 mb-2 whitespace-nowrap">
                                <i class="fa-solid fa-pen-to-square"></i>
                                {{ __('Edit') }}
                            </a>
                            <form method="post" action="{{ route('expense.destroy', [tenant(), $expense->id]) }}" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="block-inline text-sm text-red-600 border border-red-600 rounded px-2 py-1 mx-2 mb-2 whitespace-nowrap">
                                    <i class="fa-solid fa-trash"></i>
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>
            <a href="{{ route('expense.create', tenant()) }}"
               class="bg-green-500 text-white rounded px-3 py-1 mt-2 text-sm">
                {{ __('Create Expense') }}
            </a>
        </p>
    </x-theme.layout.card>
@endsection
