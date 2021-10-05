<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> 
    @auth
      @if (auth()->user()->type == 1)
       Admin Dashboard
      @elseif(auth()->user()->type == 2)
       Agent Dashboard
       @elseif(auth()->user()->type == 3)
       Sub-admin Dashboard
       @else
        {{auth()->user()->name}}
     
      @endif
    @endauth
  </title>
  <link  rel="icon" href="{{ asset('public/frontEnd') }}/assets/images/logo/amaronlineschool.png" type="image/x-icon" >
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/plugins/daterangepicker/daterangepicker.css">
   <link href="https://fonts.maateen.me/mukti/font.css" rel="stylesheet">

  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/plugins/jqvmap/jqvmap.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
 <link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/dist/css/adminlte.min.css">
<link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/dist/css/adminlte.min.css">
{{-- flat-icon --}}
<link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/flat-icon/font/flaticon.css">
<link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/flat-icon/font1/flaticon.css">
<link rel="stylesheet" href="{{ asset('public/backEnd') }}/assets/toastr/toastr.min.css">
@stack('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">




    @yield('content')







  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="{{url('dashboard')}}">MMIT SOFT LTD</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('public/backEnd') }}/assets/plugins/jquery/jquery.min.js"></script>
{{-- <script src="{{ asset('public/backEnd') }}/assets/toastr/jquery.min.js"></script> --}}
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/backEnd') }}/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/backEnd') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('public/backEnd') }}/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('public/backEnd') }}/assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('public/backEnd') }}/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('public/backEnd') }}/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('public/backEnd') }}/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('public/backEnd') }}/assets/plugins/moment/moment.min.js"></script>
<script src="{{ asset('public/backEnd') }}/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/backEnd') }}/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('public/backEnd') }}/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('public/backEnd') }}/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/backEnd') }}/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('public/backEnd') }}/assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/backEnd') }}/assets/dist/js/demo.js"></script>
<script src="{{ asset('public/backEnd') }}/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('public/backEnd') }}/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="{{ asset('public/backEnd') }}/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('public/backEnd') }}/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('public/backEnd') }}/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="{{ asset('public/backEnd') }}/assets/dist/js/select.min.js"></script>
<script src="{{ asset('public/backEnd') }}/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('public/backEnd') }}/assets/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="{{ asset('public/backEnd') }}/assets/dist/js/validation.js"></script>
<script src="{{ asset('public/backEnd') }}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('public/backEnd') }}/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('public/backEnd') }}/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('public/backEnd') }}/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('public/backEnd') }}/assets/toastr/toastr.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@stack('script')
{!! Toastr::message() !!}
</body>
</html>
    