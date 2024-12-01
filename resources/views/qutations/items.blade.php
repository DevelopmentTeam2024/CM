<div class="bg-white dark:bg-black p-4 rounded shadow-sm">
    <form action="{{ url('qutations/' . $qutation->order->id . '/' . $qutation->id) }}" method="POST">
        @csrf
        @method('PUT')
        @if ($qutation->status != 'Quotation')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="4" class="text-center h3 text-danger">{{ __('Create Workorder') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="col-lg-1">{{ __('Serial') }}: </th>
                        <td class="col-lg-6">
                            <input type="text" name="workorder_number" id="workorder_number"
                                value="{{ old('workorder_number', $workorder_number) }}" class="form-control" readonly>
                        </td>
                        <th class="col-lg-1">{{ __('Priority') }}: </th>
                        <td class="col-lg-4">
                            @php
                                $list = [
                                    App\Enum\PriorityEnum::Normal,
                                    App\Enum\PriorityEnum::Urgent,
                                    App\Enum\PriorityEnum::Emergency,
                                ];
                            @endphp
                            @foreach ($list as $item)
                                <div class="form-check form-check-inline">
                                    <span class="badge rounded-pill" style="background-color: {{ $item->color() }};">
                                        <input class="form-check-input" type="radio" name="priority"
                                            id="priority_{{ $item->value }}" value="{{ $item->value }}"
                                            @if ($item->value == $order->status->priority->value) checked @endif>
                                        <label class="form-check-label" for="priority_{{ $item->value }}">
                                            <i class="fa fa-{{ $item->icon() }}"></i>
                                            {{ $item->value }}
                                        </label>
                                    </span>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>{{ __('Remarks') }}: </th>
                        <td colspan="3">
                            <input type="text" name="remarks" id="remarks" value="{{ old('remarks') }}"
                                class="form-control">
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr />
        @endif
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
                @php
                    $totPrice = 0;
                @endphp
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
                        <td>G{{ $item->group_code }}</td>
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
                            {{ $item->status }}
                            @isset($item->workorder->workorder_number)
                                #{{ $item->workorder->workorder_number }}
                            @endisset
                        </td>
                    </tr>
                    @php
                        $totPrice += $item->total_price;
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7" class="text-end">{{ __('Quotation Total Price') }}: </td>
                    <td><strong>{{ number_format($totPrice) }}</strong></td>
                    <td colspan="2">
                        @if ($qutation->status != 'Quotation')
                            <button type="submit" class="btn btn-success float-end">
                                <i class="fa fa-plus"></i>
                                {{ __('Create Workorder') }}
                            </button>
                        @endif
                    </td>
                </tr>
            </tfoot>
        </table>

    </form>
</div>
@push('extra_js')
    <script>
        // jQuery to handle Select All / Deselect All
        $('#select-all').on('click', function() {
            $('.select-item').prop('checked', this.checked);
        });

        // If any individual checkbox is unchecked, uncheck the 'Select All' checkbox
        $('.select-item').on('change', function() {
            if ($('.select-item:checked').length === $('.select-item').length) {
                $('#select-all').prop('checked', true);
            } else {
                $('#select-all').prop('checked', false);
            }
        });
    </script>
@endpush
