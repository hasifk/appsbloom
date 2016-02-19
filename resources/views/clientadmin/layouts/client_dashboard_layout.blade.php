<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Client Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="{{asset('assets/clientassets/bootstrap/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="{{asset('assets/clientassets/css/font-awesome.min.css')}}">
        <!-- Ionicons --> -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{asset('assets/clientassets/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('assets/clientassets/dist/css/AdminLTE.min.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{asset('assets/clientassets/dist/css/skins/_all-skins.min.css')}}">

        <link rel="stylesheet" href="{{asset('assets/clientassets/plugins/daterangepicker/daterangepicker-bs3.css')}}">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <link rel="stylesheet" href="{{asset('assets/clientassets/css/custom.css')}}">
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="{{asset('assets/clientassets/plugins/jQuery/jquery-2.2.0.min.js')}}"></script>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="{{asset('assets/clientassets/bootstrap/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="{{asset('assets/clientassets/css/font-awesome.min.css')}}">
        <!-- Ionicons --> -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{asset('assets/clientassets/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('assets/clientassets/dist/css/AdminLTE.min.css')}}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{asset('assets/clientassets/dist/css/skins/_all-skins.min.css')}}">

        <link rel="stylesheet" href="{{asset('assets/clientassets/plugins/daterangepicker/daterangepicker-bs3.css')}}">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="{{asset('assets/clientassets/plugins/jQuery/jquery-2.2.0.min.js')}}"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

                @include('clientadmin.layouts.dashboard_header')
                <!-- Left side column. contains the logo and sidebar -->
                @include('clientadmin.layouts.dashboard_left_sidebar')

                <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
<!--                    <h1>
                        Dashboard
                        <small>Version 2.0</small>
                    </h1>-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                    <!-- Main content -->
                    @yield('content')
                </div><!-- /.content-wrapper -->

                @include('clientadmin.layouts.dashboard_footer')
                @include('clientadmin.layouts.dashboard_right_sidebar')


            </div><!-- ./wrapper -->

            <!-- jQuery 2.1.4 -->
            <script src="{{asset('assets/clientassets/js/custom.js')}}"></script>
            <!-- Bootstrap 3.3.5 -->
            <script src="{{asset('assets/clientassets/bootstrap/js/bootstrap.min.js')}}"></script>
            <!-- FastClick -->
            <script src="{{asset('assets/clientassets/plugins/fastclick/fastclick.min.js')}}"></script>
            <!-- AdminLTE App -->
            <script src="{{asset('assets/clientassets/dist/js/app.min.js')}}"></script>
            <!-- Sparkline -->

            <script src="{{asset('assets/clientassets/dist/js/demo.js')}}"></script>
            <script src="{{asset('assets/clientassets/plugins/ckeditor/ckeditor.js')}}"></script>

            <script src="{{asset('assets/clientassets/plugins/select2/select2.full.min.js')}}"></script>
            <!-- InputMask -->
            <script src="{{asset('assets/clientassets/plugins/input-mask/jquery.inputmask.js')}}"></script>
            <script src="{{asset('assets/clientassets/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
            <script src="{{asset('assets/clientassets/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
            <script src="{{asset('assets/clientassets/plugins/daterangepicker/moment.min.js')}}"></script>
            <script src="{{asset('assets/clientassets/plugins/daterangepicker/daterangepicker.js')}}"></script>
            <script src="{{asset('assets/clientassets/js/custom_script.js')}}"></script>
            <script src="{{asset('assets/clientassets/js/Chart.Core.js')}}"></script>
            <script src="{{asset('assets/clientassets/js/Chart.Doughnut.js')}}"></script>
            <script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
        );
    });
            </script>
</body>
</html>
