<x-app-layout>
    <x-slot name="header">{{ __('Qutations') }}</x-slot>

    <div class="row bg-white dark:bg-black my-1">
        @include('orders.list')
    </div>

</x-app-layout>
