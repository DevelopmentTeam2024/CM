<div class="row bg-white dark:bg-black my-1">
    @php
        $totalOrders = App\Models\Order::all()->count();
        $totalCounter = $orders->count();

        $groups = ['Canceled', 'Preparation', 'Working', 'Finished'];
        $CanceledCounter = 0;
        $PreparationCounter = 0;
        $WorkingCounter = 0;
        $FinishedCounter = 0;

        // $finishedStatuses = ['Finished', 'Closed'];
        // $canceledStatuses = ['Refused', 'Canceled'];

        // $finishedCounter = 0;
        // $canceledCounter = 0;
        // $inprogressCounter = 0;

        if ($totalCounter > 0) {
            foreach ($orders as $order) {
                foreach ($groups as $group) {
                    $counterName = $group . 'Counter';
                    if ($order->status->status->group() == $group) {
                        $$counterName++;
                        break;
                    }
                }
                // if (in_array($order->status->status->value, $finishedStatuses)) {
                //     $finishedCounter++;
                // } elseif (in_array($order->status->status->value, $canceledStatuses)) {
                //     $canceledCounter++;
                // } else {
                //     $inprogressCounter++;
                // }
            }

            $CanceledPercentage = round($CanceledCounter / $totalCounter, 4) * 100;
            $PreparationPercentage = round($PreparationCounter / $totalCounter, 4) * 100;
            $WorkingPercentage = round($WorkingCounter / $totalCounter, 4) * 100;
            $FinishedPercentage = round($FinishedCounter / $totalCounter, 4) * 100;

            // $finishedPercentage = round($finishedCounter / $totalCounter, 4) * 100;
            // $canceledPercentage = round($canceledCounter / $totalCounter, 4) * 100;
            // $inprogressPercentage = round($inprogressCounter / $totalCounter, 4) * 100;
        }
    @endphp
    @if ($totalCounter > 0)
        <div class="col-lg-6">
            <div>
                <h4>{{ __('Finished & Closed') }}: <strong>{{ $FinishedCounter }} (
                        {{ $FinishedPercentage }}% )</strong></h4>
                <div class="progress">
                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar"
                        aria-valuenow="{{ $FinishedPercentage }}" aria-valuemin="0" aria-valuemax="100"
                        style="width: {{ $FinishedPercentage }}%">
                        {{ $FinishedPercentage }}%</div>
                </div>
            </div>

            <div>
                <h4>{{ __('Inprogress') }}: <strong>{{ $WorkingCounter }} (
                        {{ $WorkingPercentage }}% )</strong></h4>
                <div class="progress">
                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                        aria-valuenow="{{ $WorkingPercentage }}" aria-valuemin="0" aria-valuemax="100"
                        style="width: {{ $WorkingPercentage }}%">
                        {{ $WorkingPercentage }}%</div>
                </div>
            </div>

            <div>
                <h4>{{ __('Preparation') }}: <strong>{{ $PreparationCounter }} (
                        {{ $PreparationPercentage }}% )</strong></h4>
                <div class="progress">
                    <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar"
                        aria-valuenow="{{ $PreparationPercentage }}" aria-valuemin="0" aria-valuemax="100"
                        style="width: {{ $PreparationPercentage }}%">
                        {{ $PreparationPercentage }}%</div>
                </div>
            </div>

            <div>
                <h4>{{ __('Refused & Canceled') }}: <strong>{{ $CanceledCounter }} (
                        {{ $CanceledPercentage }}% )</strong></h4>
                <div class="progress">
                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar"
                        aria-valuenow="{{ $CanceledPercentage }}" aria-valuemin="0" aria-valuemax="100"
                        style="width: {{ $CanceledPercentage }}%">
                        {{ $CanceledPercentage }}%</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div id="piechart" style="width: 100%; height: auto; min-height: 500px;"></div>
            @push('extra_js')
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                            ['Status', 'Count'],
                            ['Finished & Closed', {{ $FinishedCounter }}],
                            ['Inprogress', {{ $WorkingCounter }}],
                            ['Preparation', {{ $PreparationCounter }}],
                            ['Refused & Canceled', {{ $CanceledCounter }}]
                        ]);

                        var options = {
                            title: 'TSR Report',
                            is3D: true,
                            pieSliceText: 'value',
                            colors: ['#198754', '#0dcaf0', '#ffc107', '#dc3545']
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                        chart.draw(data, options);
                    }
                </script>
            @endpush
        </div>
    @endif
</div>
