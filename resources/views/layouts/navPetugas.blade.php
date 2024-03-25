<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ asset('dashboard/build/assets/img/apple-icon.png') }}./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{ asset('spider.jpg') }}" />
    <title>Spider Shop</title>
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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<!-- Menghubungkan CSS -->
<link href="{{ asset('dashboard/build/assets/css/argon-dashboard-tailwind.css') }}" rel="stylesheet">

<!-- Menghubungkan JavaScript -->
<script src="{{ asset('dashboard/build/assets/js/argon-dashboard-tailwind.js') }}"></script>


</head>

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    @include('layouts.shared.sidebar')

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        @include('layouts.shared.navbar')
        @yield('content')
    </main>

    <div class="w-full px-6 py-6 mx-auto">

    </div>
        <!-- table 1 -->
</body>
<!-- plugin for charts  -->
<script src="{{ asset('dashboard/build/assets/js/plugins/chartjs.min.js') }}" async></script>
<!-- plugin for scrollbar  -->
<script src="{{ asset('dashboard/build/assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
<!-- main script file  -->
<script src="{{ asset('dashboard/build/assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>

</html>
