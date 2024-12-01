<div class="col-lg-12">
    <table id="dTbl" class="table table-striped" data-page-length="50" data-order="[[ 0, &quot;desc&quot; ]]">
        <thead>
            <tr>
                <th data-orderable="false" colspan="3">{{ __('TSR Details') }}</th>
                <th data-orderable="false" colspan="2">{{ __('Latest Update') }}</th>
                @if ($showControllers)
                    <th data-orderable="false" rowspan="2" class="col-lg-1">
                        @if (auth()->user()->role->value == 'Admin' ||
                                auth()->user()->department->value == 'Sales' ||
                                (auth()->user()->department->value == 'Technical Office' && auth()->user()->role->value == 'Manager'))
                            <a href="{{ url('inquiries/create') }}" class="btn btn-success">
                                <i class="fa fa-plus"></i>
                            </a>
                        @else
                            {{ __('Actions') }}
                        @endif
                    </th>
                @endif
            </tr>
            <tr>
                <th class="col-lg-1">{{ __('Ser.') }}</th>
                <th data-orderable="false" class="col-lg-4">{{ __('Details') }}</th>
                <th data-orderable="false">{{ __('TSR') }}</th>
                <th class="col-lg-2">{{ __('Modified') }}</th>
                @isset($forQutation)
                    <th data-orderable="false" class="col-lg-2">{{ __('Qutations') }}</th>
                @else
                    <th class="col-lg-2">{{ __('Status') }}</th>
                @endisset

            </tr>
        </thead>
        <tbody>
            @isset($orders)
                @foreach ($orders as $order)
                    <tr>
                        <td data-order="{{ $order->status->created_at }}" data-search="{{ $order->serial_number }}">
                            <x-number number="{{ $order->serial_number }}" /><br />
                            <span class="badge rounded-pill m-2 p-2"
                                style="background-color: {{ $order->status->priority->color() }};">
                                <i class="fa fa-{{ $order->status->priority->icon() }}"></i>
                                {{ $order->status->priority->value }}
                            </span>
                        </td>
                        <td>
                            <i class="fa fa-building-user"></i>
                            {{ App\Services\UserService::getCustomer($order->customer_name) }}<br />
                            <i class="fa fa-diagram-project"></i>
                            {{ $order->project_name }}<br />
                            <i class="fa fa-diagram-project"></i>
                            {{ $order->project->project_name ?? 'No Project Assigned' }}<br />
                            <i class="fa fa-boxes-packing"></i>
                            {{ \App\Enum\ProductsEnum::getDetails($order->product_code) }}

                        </td>
                        <td>
                            <i class="fa fa-square-check"></i>
                            {{ App\Repo\OrdersRepo::getTitle($order->title) }}<br />
                            <i class="fa fa-user-tie"></i>
                            {{ $order->user->name }}
                        </td>
                        <td>
                            <i class="fa fa-calendar"></i>
                            {{ $order->status->created_at->format('Y-m-d') }}
                            <br />
                            <i class="fa fa-clock"></i>
                            {{ $order->status->created_at->format('H:i') }}<br />
                            <i class="fa fa-user-tie"></i>
                            {{ $order->status->user->name }}
                        </td>
                        @isset($forQutation)
                            <td>
                                <a href="{{ url('qutations/' . $order->id) }}" class="btn btn-info">
                                    <i class="fa fa-receipt"></i>
                                    {{ __('Qutations') }}
                                    <span
                                        class="badge bg-success rounded-pill float-end">{{ $order->qutations->count() }}</span>
                                </a>
                            </td>
                        @else
                            <td data-order="{{ $order->status->status->rank() }}">
                                <a href="{{ url('inquiries/' . $order->id) }}" class="btn text-light"
                                    style="background-color: {{ $order->status->status->color() }};">
                                    <i class="fa fa-{{ $order->status->status->icon() }}"></i>
                                    {{ ucfirst($order->status->status->value) }}
                                    @if ($order->status->checker)
                                        <br />
                                        <i class="fa fa-user-tie"></i>
                                        {{ $order->status->checker->name }}
                                    @endif
                                </a>
                            </td>
                        @endisset
                        @if ($showControllers)
                            <td>
                                @if (auth()->user()->role->value == 'Admin' ||
                                        (auth()->user()->department->value == 'Sales' &&
                                            auth()->user()->role->value == 'Manager' &&
                                            in_array($order->status->status->value, ['Submitted', 'Refused'])))
                                    <form action="{{ url('inquiries/' . $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url('inquiries/' . $order->id) }}" class="btn btn-success">
                                            <i class="fa fa-folder-open"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                                    </form>
                                @else
                                    <a href="{{ url('inquiries/' . $order->id) }}" class="btn btn-success">
                                        <i class="fa fa-folder-open"></i>
                                    </a>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            @endisset
        </tbody>
    </table>
</div>
