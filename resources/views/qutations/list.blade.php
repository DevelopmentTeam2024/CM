<div class="bg-white dark:bg-black p-4 rounded shadow-sm">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('Ser.') }}</th>
                <th>{{ __('Qutation Number') }}</th>
                <th>{{ __('Qutation Groups') }}</th>
                <th>{{ __('Qutation Items') }}</th>
                <th>{{ __('Total Price') }}</th>
                <th>{{ __('Discount Percentage') }}</th>
                <th>{{ __('Discount Value') }}</th>
                <th>{{ __('Net Price') }}</th>
                <th>{{ __('VAT Percentage') }}</th>
                <th>{{ __('VAT Value') }}</th>
                <th>{{ __('Sell Price') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Controllers') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->qutations as $qutation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><x-number number="{{ $qutation->qutation_number }}" /></td>
                    <td><strong>{{ $qutation->items()->distinct('group_code')->count('group_code') }}</strong></td>
                    <td><strong>{{ $qutation->items->count() }}</strong></td>
                    <td><strong>{{ number_format($qutation->total_price, 2) }}</strong></td>
                    <td><strong>{{ number_format($qutation->discount_percentage, 2) }}%</strong></td>
                    <td><strong>{{ number_format($qutation->discount_value, 2) }}</strong></td>
                    <td><strong>{{ number_format($qutation->net_price, 2) }}</strong></td>
                    <td><strong>{{ number_format($qutation->vat_percentage, 2) }}%</strong></td>
                    <td><strong>{{ number_format($qutation->vat_value, 2) }}</strong></td>
                    <td><strong>{{ number_format($qutation->final_price, 2) }}</strong></td>
                    <td>
                        <span class="badge bg-success rounded-pill">
                            <i class="fa fa-receipt"></i> {{ $qutation->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ url('qutations/' . $order->id . '/' . $qutation->id) }}" class="btn btn-info">
                            <i class="fa fa-folder-open"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
