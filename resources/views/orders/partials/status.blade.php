<div class="bg-white dark:bg-black p-4 rounded shadow-sm">
    <form action="{{ url('inquiries/' . $order->id . '/current_status') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('POST')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="2" class="text-center">{{ __('Update') }}</th>
                </tr>
            </thead>
            <tbody>

                @if ($options['current_status']['set_priority'])
                    <tr>
                        <th>{{ __('Priority') }}</th>
                        <td>
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
                @endif

                @if ($options['current_status']['set_expected_date'])
                    <tr>
                        <th>{{ __('Expected Date') }}</th>
                        <td>
                            <input type="date" name="expected_date" id="expected_date"
                                value="{{ $order->status->expected_date }}" class="form-control">
                        </td>
                    </tr>
                @endif

                @if ($options['current_status']['set_expected_minutes'])
                    <tr>
                        <th>{{ __('Expected Time') }}<br /><small class="text-danger">( {{ __('in minutes') }}
                                )</small></th>
                        <td>
                            <input type="number" name="expected_minutes" id="expected_minutes"
                                value="{{ $order->status->expected_minutes }}" class="form-control">
                        </td>
                    </tr>
                @endif

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i>
                            {{ __('Save') }}
                        </button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</div>
