<x-app-layout>
    <x-slot name="header">{{ __('Inquiries') }}</x-slot>

    <div id="mainContainer">
        <div id="subContainer">
            <div class="row bg-white dark:bg-black my-1">
                <div class="col-lg-12">
                    @include('orders.partials.filter')
                </div>
            </div>
            <div class="row bg-white dark:bg-black my-1">
                @include('orders.list')
            </div>

        </div>
    </div>
    @include('orders.partials.refresh')
</x-app-layout>
