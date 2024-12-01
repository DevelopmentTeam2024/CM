<x-app-layout>
    <x-slot name="header">
        <a href="{{ url('qutations') }}">{{ __('Qutations') }}</a> /
        <a href="{{ url('qutations/' . $qutation->order->id) }}">{{ $qutation->order->serial_number }}</a> /
        {{ $qutation->qutation_number }}
    </x-slot>
    <div id="mainContainer">
        <div id="subContainer">
            <div class="row mb-3">
                <div class="col-lg-8">
                    @php
                        $order = $qutation->order;
                        $forQutation = true;
                    @endphp
                    @include('orders.partials.details')
                </div>
                <div class="col-lg-4">
                    @include('qutations.details')
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-12">
                    @include('qutations.items')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
