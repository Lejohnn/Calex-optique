<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
        <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
        <meta name="author" content="PIXINVENT">
        <title>Dashboard Calex Optic</title>
        <link rel="apple-touch-icon" href="{{asset('backend/images/ico/apple-icon-120.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/images/ico/favicon.ico')}}">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/vendors.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/weather-icons/climacons.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backend/fonts/meteocons/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/charts/morris.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/charts/chartist.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/charts/chartist-plugin-tooltip.css')}}">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('backend/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backend/css/bootstrap-extended.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backend/css/colors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backend/css/components.css')}}">
        <!-- END: Theme CSS-->

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('backend/css/core/menu/menu-types/vertical-menu-modern.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backend/css/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backend/fonts/simple-line-icons/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backend/css/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backend/css/pages/timeline.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('backend/css/pages/dashboard-ecommerce.css')}}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('backend/css/style.css')}}">
        <!-- END: Custom CSS-->

    </head>
<!-- END: Head-->

<!-- BEGIN: Body-->

    <body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">


                @include('.partial.navbar')
                @include('.partial.main_menu')


                <!-- BEGIN: Content-->

                <!-- start content -->
                 @yield('contenu');
                <!-- end content -->
{{--
                <div class="sidenav-overlay"></div>
                <div class="drag-target"></div> --}}

                @include('.partial.footer')


                @section('script')
                    <script src="{{ asset('js/custom.js') }}"></script>
                    <!-- BEGIN: Vendor JS-->
                    <script src="{{asset('backend/vendors/js/vendors.min.js')}}"></script>
                    <!-- BEGIN Vendor JS-->

                    <!-- BEGIN: Page Vendor JS-->
                    <script src="{{asset('backend/vendors/js/charts/chart.min.js')}}"></script>
                    <script src="{{asset('backend/vendors/js/charts/chartist.min.js')}}"></script>
                    <script src="{{asset('backend/vendors/js/charts/chartist-plugin-tooltip.min.js')}}"></script>
                    <script src="{{asset('backend/vendors/js/charts/raphael-min.js')}}"></script>
                    <script src="{{asset('backend/vendors/js/charts/morris.min.js')}}"></script>
                    <script src="{{asset('backend/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}"></script>
                    <script src="{{asset('backend/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}"></script>
                    <script src="{{asset('backend/data/jvector/visitor-data.js')}}"></script>
                    <script src="{{asset('backend/vendors/js/timeline/horizontal-timeline.js')}}"></script>
                    <!-- END: Page Vendor JS-->

                    <!-- BEGIN: Theme JS-->
                    <script src="{{asset('backend/js/core/app-menu.js')}}"></script>
                    <script src="{{asset('backend/js/core/app.js')}}"></script>
                    <!-- END: Theme JS-->

                    <!-- BEGIN: Page JS-->
                    <script src="{{asset('backend/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
                    <!-- END: Page JS-->

                    <!-- BEGIN: Page Vendor JS-->
                    <script src="{{asset('backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>
                    <!-- END: Page Vendor JS-->

                    <!-- BEGIN: Page JS-->
                    <script src="{{asset('backend/js/scripts/pages/hospital-patients-list.js')}}"></script>
                    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
                    <!-- END: Page JS-->
                @endsection

    </body>
        <!-- END: Body-->

</html>

