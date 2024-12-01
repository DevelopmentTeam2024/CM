<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Communication Manager</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="{{ asset('assets/vendor/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/vendor/DataTables-bs5-jq3/datatables.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/vendor/summernote/summernote-bs5.min.css') }}" rel="stylesheet" />

    {{-- <style>
        body {
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            padding-top: 56px;
            /* To avoid overlapping with the navbar */
        }

        .content {
            margin-left: 250px;
            /* Width of sidebar */
            padding: 20px;
        }
    </style> --}}
</head>

<body>
    <div class="content">
        @include('layouts.navigation')

        <div class="container-fluid bg-light text-dark mt-4">

            <!-- Page Heading -->
            @isset($header)
                <div class="border rounded border-dark bg-dark text-light text-lead my-3">
                    <h2>
                        {{ $header }}
                    </h2>
                </div>
            @endisset

            <!-- Page Content -->
            <main>
                @if (Session::has('success'))
                    <div class="container my-3">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                <div class="text-center">
                    <button class="btn btn-danger m-5" id="notifyBtn"
                        style="display: none;">{{ __('Enable Notifications') }}</button>
                </div>
                {{ $slot }}
            </main>

        </div>
    </div>


    <script src="{{ asset('assets/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/DataTables-bs5-jq3/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/summernote/summernote-bs5.min.js') }}"></script>
    <script>
        function runDataTable() {
            $('#dTbl').DataTable({
                stateSave: true
            });
            $('textarea').summernote();
        }

        function sendNotification(title, body, icon = '{{ asset('assets/newDesign/images/logo.png') }}') {
            // Check if notifications are granted
            if (Notification.permission === 'granted') {
                // Create and show the notification
                new Notification(title, {
                    body: body,
                    icon: icon
                });
            } else {
                console.log('Notification permission not granted.');
            }
        }

        $(document).ready(function() {
            runDataTable();
            if (Notification.permission !== 'granted') {
                // Show the button if notifications are not granted
                $('#notifyBtn').show();
            }

            // Handle button click event to request notification permission
            $('#notifyBtn').click(function() {
                Notification.requestPermission().then(function(permission) {
                    if (permission === 'granted') {
                        alert('Notifications enabled!');
                        // Hide the button after permission is granted
                        $('#notifyBtn').hide();
                    } else {
                        alert('Notification permission denied.');
                    }
                });
            });
        });
    </script>
</body>

</html>
