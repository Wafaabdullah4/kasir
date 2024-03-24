<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ asset('dashboard/build/assets/img/apple-icon.png') }}./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{ asset('dashboard/build/assets/img/favicon.png') }}"" />
    <title>Argon Dashboard 2 Tailwind by Creative Tim</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('dashboard/build/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/build/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{ asset('dashboard/assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />
</head>

<body>

    @include('layouts.shared.sidebar')

</body>
<!-- plugin for charts  -->
<script src="{{ asset('dashboard/build/assets/js/plugins/chartjs.min.js') }}" async></script>
<!-- plugin for scrollbar  -->
<script src="{{ asset('dashboard/build/assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
<!-- main script file  -->
<script src="{{ asset('dashboard/build/assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>

</html>
