<div class="bg-white dark:bg-black p-4 rounded shadow-sm">
    @foreach ($options['actions'] as $action)
        @php
            $status = App\Enum\StatusEnum::fromString($action['status']);
        @endphp
        <button class="btn btn-primary mx-2 actionBtn" style="background-color: {{ $status->color() }};"
            value="{{ $action['action'] }}">
            <i class="fa fa-{{ $status->icon() }}"></i>
            {{ $action['action'] }}
        </button>
    @endforeach
    <hr />
    <div id="actionContainer"></div>
</div>
@push('extra_js')
    <script>
        $(document).ready(function() {
            $('.actionBtn').click(function(e) {
                e.preventDefault();
                $('.actionBtn.btn-success').removeClass('btn-success').addClass('btn-primary');
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-success');
                let action = $(this).val();
                let url = "{{ url('inquiries/' . $order->id) }}" + "/" + action;
                $('#actionContainer').load(url, function(response, status,
                    xhr) {
                    if (status == "success") {
                        runDataTable();
                        $('#refreshSound')[0].play();
                    } else if (status == "error") {
                        console.error("not loaded: " + xhr.status + " " + xhr
                            .statusText);
                    }
                });

            });
        });
    </script>
@endpush
