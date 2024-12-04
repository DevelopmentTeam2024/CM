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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <link href="{{ asset('assets/vendor/summernote/summernote-bs5.min.css') }}" rel="stylesheet" />

    <style type="text/css">
        .form-check .badge .form-check-input {
            float: right;
            margin-left: 1em;
        }
    </style>
    @stack('extra_css')
</head>

<body>
    <div style="display: none !important;">
        <audio id="alertSound" src="{{ asset('assets/mp3/alert.mp3') }}" preload="auto"></audio>
        <audio id="refreshSound" src="{{ asset('assets/mp3/refresh.mp3') }}" preload="auto"></audio>
    </div>
    <div class="content">
        @include('layouts.navigation')



        <!-- Page Heading -->
        @isset($header)
            <div class="bg-dark text-light text-lead mb-3 px-5 py-2">
                {{ $header }}
            </div>
        @endisset

        @if (Session::has('success'))
            <div class="container my-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="container my-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <!-- Page Content -->
        <div class="container-fluid">
            {{ $slot }}
        </div>
    </div>
    <div id="Footer" class="mt-3">
        <div class="container-fluid">
            <hr />
            <div class="col-lg-12">
                <p class="text-center text-dark">{{ __('Copyrights Reserved') }}</p>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/4b9a25c721.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/vendor/DataTables-bs5-jq3/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/summernote/summernote-bs5.min.js') }}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        function runDataTable() {
            $('#dTbl').DataTable({
                stateSave: true
            });
            // $('textarea').summernote();
            forceEnglishWriting();
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

        function forceEnglishWriting() {
            // $('input[type="text"], textarea, input[type="password"], input[type="search"]').on('keypress', function(event) {
            //     // Get the character code
            //     var charCode = event.which;

            //     // Allow English letters (A-Z, a-z), space (32), numbers (0-9), and basic punctuation (,.!@)
            //     if (
            //         (charCode >= 65 && charCode <= 90) || // Uppercase letters
            //         (charCode >= 97 && charCode <= 122) || // Lowercase letters
            //         (charCode >= 48 && charCode <= 57) || // Numbers
            //         charCode == 32 || // Space
            //         charCode == 44 || charCode == 46 || // , .
            //         charCode == 33 || charCode == 64 // ! @
            //     ) {
            //         return true;
            //     }

            //     // Prevent non-English characters
            //     return false;
            // });
            return true;
        }

        $(document).ready(function() {
            runDataTable();
            forceEnglishWriting();
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

            // FILENAMES CHECK

            $('form').on('submit', function(e) {
                // Clear previous error messages
                let errMessage = "";

                // Get the list of files
                var files = $('input[name="file[]"]').get(0).files;

                // Check if files are selected
                if (files.length === 0) {
                    errMessage += " \r\nPlease select at least one file.";
                }

                // Iterate through each file for validation
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var filename = file.name;
                    var nameWithoutExt = filename.substring(0, filename.lastIndexOf('.'));

                    // Validate filename length
                    if (nameWithoutExt.length > 50) {
                        errMessage += "\r\nThe filename '" + filename +
                            "' is too long. Please keep it under 50 characters.";
                    }

                    // Validate against special characters
                    var invalidChars = /[^A-Za-z0-9_-]/;
                    if (invalidChars.test(nameWithoutExt)) {
                        errMessage += "\r\nThe filename '" + filename +
                            "' contains invalid characters. Only letters, numbers, underscores, and hyphens are allowed.";
                    }
                }

                // If there are errors, show the error message and prevent form submission
                if (errMessage !== "") {
                    alert(errMessage);
                    e.preventDefault();
                    return false;
                }

                // If no errors, allow form to submit
                return true;
            });

        });
    </script>

    @stack('extra_js')

</body>

</html>
