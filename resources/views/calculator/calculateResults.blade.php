<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calculate') }}
        </h2>
    </x-slot>

<div class="container">
    <h1>Asset Finance Calculator Results</h1>

    @if ($monthlyPayment)
        <p>Monthly Payment: {{ number_format($monthlyPayment, 2) }}</p>
    @endif

    @if ($totalInterest)
        <p>Total Interest Paid: {{ number_format($totalInterest, 2) }}</p>
    @endif

    @if ($totalCost)
        <p>Total Cost of Ownership: {{ number_format($totalCost, 2) }}</p>
    @endif
</div>
</x-app-layout>
