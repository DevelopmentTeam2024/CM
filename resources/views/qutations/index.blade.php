<x-app-layout>
    <x-slot name="header">
        <a href="{{ url('qutations') }}">{{ __('Qutations') }}</a> / {{ $order->serial_number }}
    </x-slot>
    <div id="mainContainer">
        <div id="subContainer">
            <div class="row mb-3">
                <div class="col-lg-8">
                    @include('orders.partials.details')
                </div>
                <div class="col-lg-4">
                    @include('qutations.create')
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-12">
                    @include('qutations.list')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
