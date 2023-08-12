@extends('layouts.app')

@section('content')
    <x-theme.layout.card>
        <x-slot:title>{{ __('Complete') }}</x-slot:title>
        <table>
            <tr>
                <th>{{ __('transactionId') }}</th>
                <th>{{ __('bookingDate') }}</th>
                <th>{{ __('valueDate') }}</th>
                <th>{{ __('amount') }}</th>
                <th>{{ __('currency') }}</th>
                <th>{{ __('remittanceInformationUnstructured') }}</th>
                <th>{{ __('proprietaryBankTransactionCode') }}</th>
                <th>{{ __('internalTransactionId') }}</th>
            </tr>
            @foreach ($transactions['booked'] as $transaction)
                <tr>
                    <td>{{ $transaction['transactionId'] }}</td>
                    <td>{{ $transaction['bookingDate'] }}</td>
                    <td>{{ $transaction['valueDate'] }}</td>
                    <td>{{ $transaction['transactionAmount']['amount'] }}</td>
                    <td>{{ $transaction['transactionAmount']['currency'] }}</td>
                    <td>{{ $transaction['additionalInformation'] ?? '-' }}</td>
                    <td>{{ $transaction['internalTransactionId'] }}</td>
                </tr>
            @endforeach
        </table>
    </x-theme.layout.card>
    <x-theme.layout.card>
        <x-slot:title>{{ __('Pending') }}</x-slot:title>
        <table>
            <tr>
                <th>{{ __('transactionId') }}</th>
                <th>{{ __('bookingDate') }}</th>
                <th>{{ __('valueDate') }}</th>
                <th>{{ __('amount') }}</th>
                <th>{{ __('currency') }}</th>
                <th>{{ __('remittanceInformationUnstructured') }}</th>
                <th>{{ __('proprietaryBankTransactionCode') }}</th>
                <th>{{ __('internalTransactionId') }}</th>
            </tr>
            @foreach ($transactions['pending'] as $transaction)
                <tr>
                    <td>{{ $transaction['transactionId'] }}</td>
                    <td>{{ $transaction['bookingDate'] }}</td>
                    <td>{{ $transaction['valueDate'] }}</td>
                    <td>{{ $transaction['transactionAmount']['amount'] }}</td>
                    <td>{{ $transaction['transactionAmount']['currency'] }}</td>
                    <td>{{ $transaction['remittanceInformationUnstructured'] }}</td>
                    <td>{{ $transaction['proprietaryBankTransactionCode'] }}</td>
                    <td>{{ $transaction['internalTransactionId'] }}</td>
                </tr>
            @endforeach
        </table>
    </x-theme.layout.card>
@endsection
