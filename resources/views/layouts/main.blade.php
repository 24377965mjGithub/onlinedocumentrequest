<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Online Document Request</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ url('design/template/vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ url('design/template/vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ url('design/template/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ url('design/template/vendors/typicons/typicons.css') }}">
        <link rel="stylesheet" href="{{ url('design/template/vendors/simple-line-icons/css/simple-line-icons.css') }}">
        <link rel="stylesheet" href="{{ url('design/template/vendors/css/vendor.bundle.base.css') }}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ url('design/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ url('design/template/js/select.dataTables.min.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ url('design/template/css/vertical-layout-light/style.css') }}">
        <link rel="stylesheet" href="{{ url('custom/custom.css') }}">
    </head>
    <body>

        @yield('content')

        <script src="{{ url('design/template/vendors/js/vendor.bundle.base.js') }}"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <script src="{{ url('design/template/vendors/chart.js/Chart.min.js') }}"></script>
      <script src="{{ url('design/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
      <script src="{{ url('design/template/vendors/progressbar.js/progressbar.min.js') }}"></script>

      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="{{ url('design/template/js/off-canvas.js') }}"></script>
      <script src="{{ url('design/template/js/hoverable-collapse.js') }}"></script>
      <script src="{{ url('design/template/js/template.js') }}"></script>
      <script src="{{ url('design/template/js/settings.js') }}"></script>
      <script src="{{ url('design/template/js/todolist.js') }}"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <script src="{{ url('design/template/js/dashboard.js') }}"></script>
      <script src="{{ url('design/template/js/Chart.roundedBarCharts.js') }}"></script>
    </body>
</html>
