<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="{{ asset('admin_dashboad/images/favicon_1.ico') }}">

    <title>Moltran - Responsive Admin Dashboard Template</title>

    <!-- Base Css Files -->
    <link href="{{ asset('admin_dashboad/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Font Icons -->
    <link href="{{ asset('admin_dashboad/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_dashboad/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_dashboad/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

    <!-- animate css -->
    <link href="{{ asset('admin_dashboad/css/animate.css') }}" rel="stylesheet" />

    <!-- Waves-effect -->
    <link href="{{ asset('admin_dashboad/css/waves-effect.css') }}" rel="stylesheet">
    <!-- DataTables -->
    <link href="{{ asset('admin_dashboad/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- sweet alerts -->
    <link href="{{ asset('admin_dashboad/assets/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet">

    <!-- Custom Files -->
    <link href="{{ asset('admin_dashboad/css/helper.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboad/css/style.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


    <script src="{{ asset('admin_dashboad/js/modernizr.min.js') }}"></script>

</head>

<body class="fixed-left">
    @yield('content')

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{ asset('admin_dashboad/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_dashboad/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_dashboad/js/waves.js') }}"></script>
    <script src="{{ asset('admin_dashboad/js/wow.min.js') }}"></script>
    <script src="{{ asset('admin_dashboad/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_dashboad/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('admin_dashboad/assets/chat/moment-2.2.1.js') }}"></script>
    <script src="{{ asset('admin_dashboad/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('admin_dashboad/assets/jquery-detectmobile/detect.js') }}"></script>
    <script src="{{ asset('admin_dashboad/assets/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('admin_dashboad/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('admin_dashboad/assets/jquery-blockui/jquery.blockUI.js') }}"></script>

    <!-- sweet alerts -->
    <script src="{{ asset('admin_dashboad/assets/jquery-blockui/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('admin_dashboad/assets/sweet-alert/sweet-alert.init.js') }}"></script>

    <!-- flot Chart -->
    <script src="{{ asset('admin_dashboad/assets/flot-chart/jquery.flot.js') }}  "></script>
    <script src="{{ asset('admin_dashboad/assets/flot-chart/jquery.flot.time.js') }}  "></script>
    <script src="{{ asset('admin_dashboad/assets/flot-chart/jquery.flot.tooltip.min.js') }}  "></script>
    <script src="{{ asset('admin_dashboad/assets/flot-chart/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin_dashboad/assets/flot-chart/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('admin_dashboad/assets/flot-chart/jquery.flot.selection.js') }}"></script>
    <script src="{{ asset('admin_dashboad/assets/flot-chart/jquery.flot.stack.js') }}  "></script>
    <script src="{{ asset('admin_dashboad/assets/flot-chart/jquery.flot.crosshair.js') }}  "></script>

    <!-- Counter-up -->
    <script src="{{ asset('admin_dashboad/assets/counterup/waypoints.min.js') }}   " type="text/javascript"></script>
    <script src="{{ asset('admin_dashboad/assets/counterup/jquery.counterup.min.js') }}   " type="text/javascript">
    </script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('admin_dashboad/js/jquery.app.js') }}"></script>

    <!-- Dashboard -->
    <script src="{{ asset('admin_dashboad/js/jquery.dashboard.js') }}"></script>

    <!-- Chat -->
    <script src="{{ asset('admin_dashboad/js/jquery.chat.js') }}"></script>

    <!-- Todo -->
    <script src="{{ asset('admin_dashboad/js/jquery.todo.js') }}"></script>

    <script type="text/javascript">
        /* ==============================================
                                                                                Counter Up
                                                                            =============================================== */
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
        });
    </script>
    <script src="{{ asset('admin_dashboad/assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_dashboad/assets/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('admin_dashboad/js/tableHTMLExport.js') }}"></script>
    @yield('footer_script')

</body>

</html>
