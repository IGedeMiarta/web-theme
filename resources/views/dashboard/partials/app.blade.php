<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('fav.png') }}">
    <title>{{ $title ?? '' }} - {{ env('APP_NAME') }}</title>
    <!-- page css -->

    <!-- Core css -->
    <link href="{{ asset('app') }}/assets/css/app.min.css" rel="stylesheet">

    @stack('style')

</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            @include('dashboard.partials.topbar')
            <!-- Header END -->

            @include('dashboard.partials.sidebar')

            <!-- Page Container START -->
            <div class="page-container">

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">{{ $title ?? '' }}</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{ url('/dahboard') }}" class="breadcrumb-item"><i
                                        class="anticon anticon-home m-r-5"></i>Home</a>
                                @if ($title != 'Dashboard')
                                    <span class="breadcrumb-item active">{{ $title ?? '' }}</span>
                                @endif
                            </nav>
                        </div>
                    </div>
                    <!-- Content goes Here -->
                    @yield('content')

                </div>
                <!-- Content Wrapper END -->


                @include('dashboard.partials.footer')

            </div>
            <!-- Page Container END -->




        </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="{{ asset('app') }}/assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="{{ asset('app') }}/assets/js/app.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to add commas as a separator to the input value
            function addCommas(input) {
                return input.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            // Function to remove commas from the input value
            function removeCommas(input) {
                return input.replace(/,/g, '');
            }

            // Event listener for input changes
            $('.inpNumber').on('input', function() {
                // Get the input value without commas
                var inputValue = removeCommas($(this).val());

                // Add commas to the input value
                var formattedValue = addCommas(inputValue);

                // Set the formatted value back to the input
                $(this).val(formattedValue);
            });
        });
    </script>
    @stack('script')

</body>

</html>
