<div class="bg-white dark:bg-black p-4 rounded shadow-sm">
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="6" class="text-center">
                    {{ __('Inquiry') }}
                    #<x-number number="{{ $order->serial_number }} " />
                    <span class="badge rounded-pill mx-3"
                        style="background-color: {{ $order->status->status->color() }} !important;">
                        <i class="fa fa-{{ $order->status->status->icon() }}"></i>
                        {{ $order->status->status->value }}
                    </span>
                    @if ($order->status->status->group() == 'Working')
                        <br />
                        <hr />
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuenow="{{ $ended['Percentage'] }}" aria-valuemin="0" aria-valuemax="100"
                                style="width: {{ $ended['Percentage'] }}%">
                                {{ $ended['Percentage'] }}%
                            </div>
                        </div>
                    @endif
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ __('Customer') }}:</th>
                <td colspan="5">{{ App\Services\UserService::getCustomer($order->customer_name) }}</td>
            </tr>
            @isset($order->project->project_name)
            <tr>
                <th scope="row">{{ __('Project') }}:</th>
                <td colspan="5">{{ $order->project->project_name }}</td>
            </tr>
            @endisset
            <tr>
                <th scope="row">{{ __('Sub Project') }}:</th>
                <td colspan="5">{{ $order->project_name }}</td>
            </tr>
            <tr>
                <th scope="row">{{ __('Products') }}:</th>
                <td colspan="5">{!! \App\Enum\ProductsEnum::getDetails($order->product_code, '<br>') !!}</td>
            </tr>
            <tr>
                <th scope="row">{{ __('TSR Type') }}:</th>
                <td colspan="5">{{ App\Repo\OrdersRepo::getTitle($order->title) }}</td>
            </tr>
            <tr>
                <th scope="row">{{ __('Description') }}:</th>
                <td colspan="5">{!! nl2br($order->description) !!}</td>
            </tr>
            <tr>
                <th scope="row">{{ __('Attachments') }}:</th>
                @isset($forQutation)
                    <td colspan="5">
                        @php
                            $filesCounter = 1;
                        @endphp
                        @foreach ($order->files as $file)
                        <a href="{{ asset($file->path) }}" download="{{ $file->filename }}">
                                {{ str_pad($filesCounter, 3, '0', STR_PAD_LEFT) }}. {{ $file->filename }}
                            </a>
                            <br>
                            @php
                                $filesCounter++;
                            @endphp
                        @endforeach

                        @foreach ($order->statuses as $status)
                            @foreach ($status->files as $file)
                            <a href="{{ asset($file->path) }}" download="{{ $file->filename }}">
                                {{ str_pad($filesCounter, 3, '0', STR_PAD_LEFT) }}. {{ $file->filename }}
                            </a>
                            <br>
                                @php
                                    $filesCounter++;
                                @endphp
                            @endforeach
                        @endforeach
                    </td>
                @else
                    <td colspan="5">
                        @foreach ($order->files as $file)
                            <a href="{{ asset($file->path) }}" download="{{ $file->filename }}">
                                {{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}. {{ $file->filename }}
                            </a>
                            <br>
                        @endforeach
                    </td>
                @endisset
            </tr>
            @if ($order->user)
                <tr>
                    <th scope="row">{{ __('Created By') }}:</th>
                    <td>{{ $order->user->code }}. {{ $order->user->name }}</td>
                    <th scope="row">{{ __('Role') }}:</th>
                    <td>{{ $order->user->role->value }}</td>
                    <th scope="row">{{ __('Department') }}:</th>
                    <td>{{ $order->user->department->value }}</td>
                </tr>
            @endif
            <tr>
                <th scope="row">{{ __('Created At') }}:</th>
                <td>{{ $order->created_at->format('Y-m-d H:i') }} [ {{ $order->created_at->diffForHumans() }} ]</td>
                <th scope="row">{{ __('Last Update') }}:</th>
                <td>{{ $order->status->updated_at->format('Y-m-d H:i') }} [
                    {{ $order->status->updated_at->diffForHumans() }} ]</td>
                <th scope="row">{{ __('Duration') }}:</th>
                <td>
                    {{ $order->status->updated_at->diffForHumans($order->created_at) }}
                </td>
            </tr>
            @isset($forQutation)
                <tr>
                    <td colspan="6">
                        <div class="alert alert-info text-center">
                            {{ __('This TSR Inquiry For Quotation') }}
                        </div>
                    </td>
                </tr>
            @else
                @isset($order->status->expected_date)
                    <tr>
                        <th scope="row">{{ __('Expected Date') }}:</th>
                        <td colspan="3">{{ $order->status->expected_date->format('Y-m-d') }}</td>
                        <th scope="row">{{ __('Remain') }}:</th>
                        <td>{{ $order->status->expected_date->addDay()->diffForHumans() }}</td>
                    </tr>
                @endisset
            @endisset
        </tbody>
    </table>
</div>
