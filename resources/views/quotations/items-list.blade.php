<table class="table table-striped" @if ($qutation->status != 'Qutation') id="dTbl" @endif>
    <thead>
        <tr>
            @if ($qutation->status != 'Quotation')
                <th data-orderable="false">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="select-all">
                    </div>
                </th>
            @endif
            <th data-orderable="false">{{ __('Line') }}</th>
            <th data-orderable="false">{{ __('Group') }}</th>
            <th data-orderable="false">{{ __('Product') }}</th>
            <th data-orderable="false">{{ __('Description') }}</th>
            <th data-orderable="false">{{ __('Unit Price') }}</th>
            <th data-orderable="false">{{ __('Quantity') }}</th>
            <th data-orderable="false">{{ __('Total Price') }}</th>
            <th data-orderable="false">{{ __('Remarks') }}</th>
            <th data-orderable="false">{{ __('Status') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($qutation->items->sortBy('line_number') as $item)
            <tr>
                @if ($qutation->status != 'Quotation')
                    <td>
                        @if ($item->status == 'Pending')
                            <div class="form-check">
                                <input class="form-check-input select-item" type="checkbox"
                                    name="items[{{ $item->id }}]" value="{{ $item->id }}"
                                    id="item{{ $item->id }}">
                            </div>
                        @endif
                    </td>
                @endif
                <td>{{ $item->line_number }}</td>
                <td>{{ \App\Enum\ProductsEnum::getItemFromDescription($item->description) ?? 'G' . $item->group_code }}
                </td>
                <td>{{ $item->product_code }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ number_format($item->unit_price, 2) }}</td>
                @if ($qutation->status != 'Quotation' && $item->status == 'Pending')
                    <td>
                        <input type="number" name="quantity[{{ $item->id }}]"
                            value="{{ old('quantity[' . $item->id . ']', $item->quantity) }}"
                            max="{{ $item->quantity }}" id="quantity{{ $item->id }}" class="form-control"
                            required>
                    </td>
                @else
                    <td>{{ number_format($item->quantity, 2) }}</td>
                @endif
                <td>{{ number_format($item->total_price, 2) }}</td>
                <td>{{ $item->remarks }}</td>
                <td>
                    @isset($item->workorder->workorder_number)
                        <a href="{{ url('workorders/' . $item->workorder->id . '/' . $item->id) }}"
                            class="btn btn-success">
                            #{{ $item->workorder->workorder_number }}
                        </a>
                    @else
                        {{ $item->status }}
                    @endisset
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
