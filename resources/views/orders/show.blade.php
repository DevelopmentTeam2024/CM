<x-app-layout>
    <x-slot name="header">
        <a href="{{ url('inquiries') }}">{{ __('Inquiries') }}</a> / {{ $order->serial_number }}
    </x-slot>
    <div id="mainContainer">
        <div id="subContainer">
            <div class="row mb-3">
                @php
                    $cols = 12;
                    $showQuotationUpload = false;
                    $showQuotationDetails = false;
                    if (
                        $order->title == 'Quotation' &&
                        in_array($order->status->status->value, ['Finished', 'Closed'])
                    ) {
                        $forQutation = true;
                        if ($order->qutations->count() > 0) {
                            $showQuotationDetails = true;
                            $cols -= 4;
                        } else {
                            $showQuotationUpload = true;
                            $cols -= 4;
                        }
                    }

                    $showEditForm = false;
                    if ($options['current_status']['can_edit']) {
                        $showEditForm = true;
                        $cols -= 4;
                    }

                @endphp
                <div class="col-lg-{{ $cols }}">
                    @include('orders.partials.details')
                </div>
                @if ($showEditForm)
                    <div class="col-lg-4">
                        @include('orders.partials.status')
                    </div>
                @endif

                @if ($showQuotationUpload)
                    <div class="col-lg-4">
                        @include('qutations.create')
                    </div>
                @endif

                @if ($showQuotationDetails)
                    @php
                        $qutation = $order->qutations->first();
                    @endphp
                    <div class="col-lg-4">
                        @include('qutations.details')
                    </div>
                @endif
            </div>
            @if (isset($forQutation) &&
                    $order->qutations->count() > 0 &&
                    $order->qutations->sortByDesc('id')->first()->status != 'Quotation')
                @php
                    $qut = $order->qutations->sortByDesc('id')->first();
                @endphp
                <div class="row mb-3">
                    <div class="col-lg-12 text-center">
                        <a href="{{ url('qutations/' . $order->id . '/' . $qut->id) }}"
                            class="btn btn-success btn-block">
                            <i class="fa fa-folder-open"></i>
                            {{ $qut->status }} #{{ $qut->qutation_number }}
                        </a>
                    </div>
                </div>
            @else
                <div class="row mb-3">
                    @include('orders.partials.tsr')
                    @if (count($options['actions']) > 0 && !isset($options['actions']['Action']))
                        <div class="col-lg-6">
                            @include('orders.partials.actions')
                        </div>
                    @endif
                </div>
                <div class="row mb-3">
                    <div class="col-lg-12">
                        @include('orders.partials.transactions')
                    </div>
                </div>
            @endif
        </div>
    </div>
    @include('orders.partials.refresh')
</x-app-layout>
