<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{__("Appointment Manager")}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/fSelect.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('css/admin/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('css/admin/Ionicons/css/ionicons.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('css/admin/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/admin/AdminLTE.min.css') }}">
  <!-- AdminL.TE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('css/admin/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery.ui.timepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery-ui-1.10.0.custom.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery.comiseo.daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('css/summernote.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <meta name="csrf-token" content="{{ csrf_token() }}">


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div id="app" class="wrapper">
{{-- Header Section Starts --}}
  @include('layouts.afterlogin.header')
{{-- Header Section Ends --}}
    @include('layouts.afterlogin.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  <!-- /.content-wrapper -->
 {{-- Footer Section Starts --}}
    @include('layouts.afterlogin.footer')
 {{-- Footer Section Ends --}}
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
  var route_url="{{URL('/')}}";
</script>
<!-- jQuery 3 -->
<script src="{{ asset('js/admin/jquery.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('js/admin/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/admin/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/admin/adminlte.min.js') }}"></script>
<script src="{{ asset('js/admin/fSelect.js') }}"></script>
<script src="{{ asset('js/admin/jquery-ui.js') }}"></script>
<script src="{{ asset('js/admin/jquery.ui.core.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.ui.timepicker.js') }}"></script>
<script src="{{ asset('js/admin/jquery.comiseo.daterangepicker.js') }}"></script>
<script src="{{ asset('js/admin/moment.js') }}"></script>
<script src="{{ asset('js/admin/summernote.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
<!-- Summernote lang JS files -->
<script src="{{asset('lang/summernote-ar-AR.js')}}"></script>
<script src="{{asset('lang/summernote-bg-BG.js')}}"></script>
<script src="{{asset('lang/summernote-ca-ES.js')}}"></script>
<script src="{{asset('lang/summernote-cs-CZ.js')}}"></script>
<script src="{{asset('lang/summernote-da-DK.js')}}"></script>
<script src="{{asset('lang/summernote-de-DE.js')}}"></script>
<script src="{{asset('lang/summernote-el-GR.js')}}"></script>
<script src="{{asset('lang/summernote-es-ES.js')}}"></script>
<script src="{{asset('lang/summernote-es-EU.js')}}"></script>
<script src="{{asset('lang/summernote-fa-IR.js')}}"></script>
<script src="{{asset('lang/summernote-fi-FI.js')}}"></script>
<script src="{{asset('lang/summernote-fr-FR.js')}}"></script>
<script src="{{asset('lang/summernote-gl-ES.js')}}"></script>
<script src="{{asset('lang/summernote-he-IL.js')}}"></script>
<script src="{{asset('lang/summernote-hr-HR.js')}}"></script>
<script src="{{asset('lang/summernote-hu-HU.js')}}"></script>
<script src="{{asset('lang/summernote-id-ID.js')}}"></script>
<script src="{{asset('lang/summernote-it-IT.js')}}"></script>
<script src="{{asset('lang/summernote-ja-JP.js')}}"></script>
<script src="{{asset('lang/summernote-ko-KR.js')}}"></script>
<script src="{{asset('lang/summernote-lt-LT.js')}}"></script>
<script src="{{asset('lang/summernote-lt-LV.js')}}"></script>
<script src="{{asset('lang/summernote-mn-MN.js')}}"></script>
<script src="{{asset('lang/summernote-nb-NO.js')}}"></script>
<script src="{{asset('lang/summernote-nl-NL.js')}}"></script>
<script src="{{asset('lang/summernote-pl-PL.js')}}"></script>
<script src="{{asset('lang/summernote-pt-BR.js')}}"></script>
<script src="{{asset('lang/summernote-pt-PT.js')}}"></script>
<script src="{{asset('lang/summernote-ro-RO.js')}}"></script>
<script src="{{asset('lang/summernote-ru-RU.js')}}"></script>
<script src="{{asset('lang/summernote-sk-SK.js')}}"></script>
<script src="{{asset('lang/summernote-sl-SI.js')}}"></script>
<script src="{{asset('lang/summernote-sr-RS.js')}}"></script>
<script src="{{asset('lang/summernote-sr-RS-Latin.js')}}"></script>
<script src="{{asset('lang/summernote-sv-SE.js')}}"></script>
<script src="{{asset('lang/summernote-ta-IN.js')}}"></script>
<script src="{{asset('lang/summernote-th-TH.js')}}"></script>
<script src="{{asset('lang/summernote-tr-TR.js')}}"></script>
<script src="{{asset('lang/summernote-uk-UA.js')}}"></script>
<script src="{{asset('lang/summernote-uz-UZ.js')}}"></script>
<script src="{{asset('lang/summernote-vi-VN.js')}}"></script>
<script src="{{asset('lang/summernote-zh-CN.js')}}"></script>
<script src="{{asset('lang/summernote-zh-TW.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('js/admin/jquery.canvasjs.min.js') }}"></script>
<script src="{{ asset('js/admin/custom.js') }}"></script>
<!-- page script -->
<script>

</script>
</body>
</html>

