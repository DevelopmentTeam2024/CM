@if ($qutation->status != 'Quotation')
    <div class="bg-white dark:bg-black p-4 rounded shadow-sm">
        <form action="{{ url('qutations/' . $qutation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="4" class="text-center h3 text-danger">{{ __('Create Workorder') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4">
                            @include('quotations.items-list')
                        </td>
                    </tr>
                    <tr>
                        <th class="col-lg-1">{{ __('Serial') }}: </th>
                        <td class="col-lg-7">
                            <input type="text" name="workorder_number" id="workorder_number"
                                value="{{ old('workorder_number', $workorder_number) }}" class="form-control" readonly>
                        </td>
                        <th class="col-lg-1">{{ __('Priority') }}: </th>
                        <td class="col-lg-3">
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
                        <td colspan="2">
                            <input type="text" name="remarks" id="remarks" value="{{ old('remarks') }}"
                                class="form-control">
                        </td>
                        <td>
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-plus"></i>
                                {{ __('Create Workorder') }}
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
@endif
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
