@php
    use App\Enum\StatusEnum;
    if (
        Auth::user()->role->value == 'Admin' ||
        (Auth::user()->department->value == 'Technical Office' &&
            (Auth::user()->role->value == 'Manager' ||
                Auth::user()->role->value == 'General Supervisor' ||
                Auth::user()->role->value == 'Supervisor'))
    ) {
        $users = \App\Models\User::where([
            'department' => 'Technical Office',
        ])->get();
    }

    // $statusColors = [
    //     'Submitted' => '#FFA500', // Orange: Waiting for action
    //     'Approved' => '#008000', // Green: Approved or successful
    //     'Refused' => '#FF0000', // Red: Rejected or failed
    //     'Assigned' => '#1E90FF', // Blue: Assigned to someone (in progress)
    //     'Accepted' => '#32CD32', // Lime Green: Accepted or acknowledged
    //     'Forwarded' => '#FFD700', // Gold: Forwarded (pending next action)
    //     'Clarified' => '#00CED1', // Dark Turquoise: Clarified or clear
    //     'Finished' => '#4682B4', // Steel Blue: Completed, but calm
    //     'Returned' => '#FF4500', // Orange Red: Sent back (needs attention)
    //     'Closed' => '#808080', // Grey: Closed or no further action
    //     'Canceled' => '#000000', // Black: Canceled or terminated
    // ];

    $checkers = [];

    // $toStatuses = ['Accepted', 'Assigned', 'Returned'];
    $userCounters = [];

    foreach ($orders as $order) {
        if (isset($counters[$order->status->status->value])) {
            $counters[$order->status->status->value]++;
        } else {
            $counters[$order->status->status->value] = 1;
        }

        if (isset($users)) {
            foreach ($users as $user) {
                if ($order->status->status->group() == 'Working' || $order->status->status->group() == 'Preparation') {
                    if (!isset($userCounters[$user->id])) {
                        $userCounters[$user->id] = 0;
                    }
                    foreach ($order->statuses as $status) {
                        if ($status->checker?->id == $user->id) {
                            $userCounters[$user->id]++;
                        }
                    }
                }
            }
            $checkers['users'] = $userCounters;
        }

        $checkers['counters'] = $counters;
    }
    $checkersText = json_encode($checkers);
@endphp
<span id="checkersContainer" style="display: none !important;">{{ $checkersText }}</span>
@if ($showAllBtn)
    <a href="{{ url('inquiries') }}" class="btn btn-primary mx-2 my-2">
        Retrun to All
    </a>
@endif
@isset($counters)
    @foreach ($counters as $status => $counter)
        @php
            $st = StatusEnum::fromString($status);
        @endphp
        <a href="{{ url('inquiries') }}?status={{ $status }}" class="btn mx-2 my-2 text-light"
            style="background-color: {{ $st->color() }} !important;">
            <i class="fa fa-{{ $st->icon() }}"></i>
            {{ $status }}
            <span class="badge rounded-pill bg-info float-end mx-2">{{ $counter }}</span>
        </a>
    @endforeach
@endisset

@isset($users)
    <br />
    <hr />
    @if (request()->has('user'))
        @php
            $user_id = request()->get('user');
            $user = \App\Models\User::find($user_id);
        @endphp
        <a href="#" class="btn btn-warning mx-2 my-2 ">
            <i class="fa fa-user-tie"></i>
            {{ $user->name }}
            @isset($userCounters[$user->id])
                <span class="badge bg-dark float-end rounded-pill mx-2">{{ $userCounters[$user->id] }}</span>
            @endisset
        </a>
    @else
        @foreach ($users as $user)
            <a href="{{ url('inquiries') }}?user={{ $user->id }}" class="btn btn-info mx-2 my-2 ">
                <i class="fa fa-user-tie"></i>
                {{ $user->name }}
                @isset($userCounters[$user->id])
                    <span class="badge bg-dark float-end rounded-pill mx-2">{{ $userCounters[$user->id] }}</span>
                @endisset
            </a>
        @endforeach
    @endif
@endisset
