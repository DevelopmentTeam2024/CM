<div class="bg-white dark:bg-black p-4 rounded shadow-sm">
    <h3>{{ __('Transactions') }}</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('Ser.') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Priority') }}</th>
                <th>{{ __('Created By') }}</th>
                <th>{{ __('Created At') }}</th>
                <th>{{ __('Expected Date') }}</th>
                <th>{{ __('Expected Duration') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->statuses as $status)
                <tr>
                    <td
                        @if (isset($status->notes) && $status->files->count() > 0) rowspan="3" 
                        @elseif (isset($status->notes) || $status->files->count() > 0) rowspan="2" 
                        @else rowspan="1" @endif>
                        {{ $loop->iteration }}</td>
                    <td style="background-color: {{ $status->status->color() }};">
                        <i class="fa fa-{{ $status->status->icon() }}"></i>
                        {{ ucfirst($status->status->value) }}
                    </td>
                    <td style="background-color: {{ $status->priority->color() }};">
                        <i class="fa fa-{{ $status->priority->icon() }}"></i>
                        {{ ucfirst($status->priority->value) }}
                    </td>

                    <td>
                        {{ $status->user->code }}. {{ $status->user->name }}</td>
                    <td>{{ $status->created_at->format('Y-m-d') }} [
                        {{ $status->created_at->diffForHumans() }} ]</td>
                    <td>{{ $status->expected_date?->format('Y-m-d') }}</td>
                    <td>{{ $status->expected_minutes }}</td>
                </tr>
                @isset($status->notes)
                    <tr>
                        <th>{{ __('Notes') }}</th>
                        <td colspan="5">{!! nl2br($status->notes) !!}</td>
                    </tr>
                    @if (Str::lower($status->notes) == 'rejected')
                        <tr>
                            <th>{{ __('Reasons Of Rejected') }}</th>
                            <td colspan="5">
                                @php
                                    $reasons = collect(explode(',', $status->reasons ?? ''))->filter()->map(fn($reason) => trim($reason));
                                @endphp
                                @if ($reasons->isNotEmpty())
                                    <ul>
                                        @foreach ($reasons as $reason)
                                            <li>{{ $reason }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    {{ __('No reasons specified.') }}
                                @endif
                            </td>
                        </tr>
                    @endif
                @endisset
                @if ($status->files->count() > 0)
                    <tr>
                        <th>{{ __('Attachments') }}</th>
                        <td colspan="5">
                            @foreach ($status->files as $file)
                                <a href="{{ asset($file->path) }}" download="{{ $file->filename }}"
                                    class="btn btn-secondary">
                                    {{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}.{{ $file->file_ext }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
<span id="checkersContainer" style="display: none !important;">{{ $status->id }}</span>
