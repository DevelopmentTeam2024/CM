<x-app-layout>
    <x-slot name="header">
        {{ __('Quotations') }}
    </x-slot>
    <div id="mainContainer">
        <div id="subContainer">
            <div class="row mb-3">
                <div class="col-lg-12">
                    @include('quotations.list')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
