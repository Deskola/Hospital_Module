<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kenyatta National Hospital</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->

  <link rel="stylesheet" href="/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  {{-- link icon --}}
  <link rel="shortcut icon" href="/dist/img/Logo.jpg">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>

    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i>Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> Messages
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-sign-out mr-2"></i> Logout
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="/dist/img/Logo.jpg"  class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Kenyatta National Hospital</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="/dashboard" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>

          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-graduation-cap"></i>
              <p>
                Personal Infomation
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/patients/create" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Patient</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/patients" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View Patients</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="/printStudentDetails" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Print Details</p>
                </a>
              </li> -->
            </ul>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
              Medical History
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/addMedicalHist" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/viewTeachers" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/printTeachersDetails" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Print Details</p>
                </a>
              </li>
            </ul>
          </li> -->
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-building"></i>
              <p>
              Family Medical History
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/addFamilyHist" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/viewClass" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/printClassDetails" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Print Details</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Medication History
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/medicationInfo/create" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/medicationInfo" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/printSubjectDetails" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Print Details</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-file-text-o"></i>
              <p>
                Treatment History
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/addTreatmentHist" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/exams/" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/addResults" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Lab Results</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/examRanking" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View Rank</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/printExamDetails" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Print Details</p>
                </a>
              </li>
            </ul>
          </li> -->
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Medical Directives
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/addFees" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Fees</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/feeDetails" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Fee Details</p>
                </a>
              </li> -->
              
      <!-- /.sidebar-menu -->
    </div> -->
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->



    <!-- /.content-header -->
    <div class="container-fluid">
      @include('inc.messages')
      @yield('content')
    </div>

<!-- ./wrapper -->
<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
{{-- chartjs      --}}
<script src="/plugins/chart.js/Chart.bundle.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
</body>
</html>
