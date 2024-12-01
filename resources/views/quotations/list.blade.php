<div class="bg-white dark:bg-black p-4 rounded shadow-sm">
    <table class="table table-striped">
        <thead>
            <tr>
                <th rowspan="2">{{ __('Ser.') }}</th>
                <th colspan="6">{{ __('Quotation Details') }}</th>
                <th colspan="4">{{ __('Inquiry Details') }}</th>
            </tr>
            <tr>
                <th>{{ __('Number') }}</th>
                <th>{{ __('Products') }}</th>
                <th>{{ __('Items') }}</th>
                <th>{{ __('Total Price') }}</th>
                <th>{{ __('Sell Price') }}</th>
                <th>{{ __('Status') }}</th>

                <th>{{ __('Number') }}</th>
                <th>{{ __('Customer') }}</th>
                <th>{{ __('User') }}</th>
                <th>{{ __('Status') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($res as $rec)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td><x-number number="{{ $rec->qutation_number }}" /></td>
                    <td><strong>{{ $rec->items()->distinct('group_code')->count('group_code') }}</strong></td>
                    <td><strong>{{ $rec->items->count() }}</strong></td>
                    <td><strong>{{ number_format($rec->total_price, 2) }}</strong></td>
                    <td><strong>{{ number_format($rec->final_price, 2) }}</strong></td>
                    <td>
                        <a href="{{ url('qutations/' . $rec->id) }}" class="btn btn-success">
                            <i class="fa fa-receipt"></i> {{ $rec->status }}
                        </a>
                    </td>

                    <td><x-number number="{{ $rec->order->serial_number }}" /></td>
                    <td>
                        <i class="fa fa-building-user"></i>
                        {{ App\Services\UserService::getCustomer($rec->order->customer_name) }}
                    </td>
                    <td>
                        <i class="fa fa-user-tie"></i>
                        {{ $rec->order->user->name }}
                    </td>
                    <td>
                        <a href="{{ url('inquiries/' . $rec->order->id) }}" class="btn text-light"
                            style="background-color: {{ $rec->order->status->status->color() }};">
                            <i class="fa fa-{{ $rec->order->status->status->icon() }}"></i>
                            {{ ucfirst($rec->order->status->status->value) }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
