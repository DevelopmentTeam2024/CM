<x-app-layout>
    <x-slot name="header">
        {{ __('Workorders') }}
    </x-slot>
    <div id="mainContainer">
        <div id="subContainer">
            <div class="row mb-3">
                <div class="col-lg-12">
                    <div class="bg-white dark:bg-black p-4 rounded shadow-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('Ser.') }}</th>
                                    <th>{{ __('WorkOrder N.') }}</th>
                                    <th>{{ __('SalesOrder N.') }}</th>
                                    <th>{{ __('Inquiry N.') }}</th>
                                    <th>{{ __('Sales Rep.') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Expected Date') }}</th>
                                    <th>{{ __('Last Modified') }}</th>
                                    <th>{{ __('Controllers') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($workorders as $workorder)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $workorder->workorder_number }}</td>
                                        <td>{{ $workorder->qutation->qutation_number }}</td>
                                        <td>{{ $workorder->qutation->order->serial_number }}</td>
                                        <td>{{ $workorder->qutation->order->user->name }}</td>
                                        <td>{{ $workorder->status }}</td>
                                        <td>{{ $workorder->expected_date?->format('Y-m-d') }}</td>
                                        <td>{{ $workorder->updated_at->format('Y-m-d H:i') }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
