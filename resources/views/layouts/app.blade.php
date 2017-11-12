<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="shortcut icon"  type="image/gif" href="{{ asset('img/icon/logo.png') }}" />
  
  <link href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
  <!-- Styles -->
  <!-- Bootstrap core CSS -->

  <!-- Custom fonts for this template -->
  <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- Plugin CSS -->
  <link href="{{ asset('js/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/bootstrap-toggle.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/easy-autocomplete.css') }}" rel="stylesheet" />

  <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet" />
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ asset('img/icon/logo.png') }}">
      {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="AdminMenu">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/home">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text"> Dashboard </span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Checkpoint">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseCheckpoint" data-parent="#AdminMenu">
            <i class="fa fa-dot-circle-o"></i>
            <span class="nav-link-text"> Checkpoint </span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseCheckpoint">
            <li>
              <a href="/Checkpoints/0/edit"> <i class="fa fa-plus"></i> New Checkpoint</a>
            </li>
            <li>
              <a href="/Checkpoints"> <i class="fa fa-list-alt"></i> Checkpoint List</a>
            </li>
            <li>
              <a href="/CategoryCheckpoints/"> <i class="fa fa-list-alt"></i> Checkpoint Category List</a>
            </li>
          </ul>
        </li>
        <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Mission">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMission" data-parent="#AdminMenu">
            <i class="fa fa-flag"></i>
            <span class="nav-link-text"> Mission </span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMission">
            <li>
              <a href="/Missions/0/edit"> <i class="fa fa-plus"></i> New Mission</a>
            </li>
            <li>
              <a href="/Missions"><i class="fa fa-list-alt"></i> Mission List</a>
            </li>
            <li>
              <a href="/CategoryMissions"><i class="fa fa-list-alt"></i> Mission Category List</a>
            </li>
          </ul>
        </li>
        <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Badge">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseBadge" data-parent="#AdminMenu">
            <i class="fa fa-star"></i>
            <span class="nav-link-text"> Badge </span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseBadge">
            <li>
              <a href="/Badges/0/edit"> <i class="fa fa-plus"></i> New Badge</a>
            </li>
            <li>
              <a href="/Badges"><i class="fa fa-list-alt"></i> Badge List</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User">
          <a class="nav-link" href="/Profiles">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span class="nav-link-text"> User </span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">       
        
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>
            Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    @yield('content')
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright &copy; Your Website 2017</small>
        </div>
      </div>
    </footer>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper/popper.min.js') }}"></script>
    <script src="{{ asset('css/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('js/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/datatables/dataTables.bootstrap4.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/sb-admin.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easy-autocomplete.js') }}"></script>
    <script type="text/javascript">
      $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
      });
    </script>
    @yield('jsfooter')
  </body>
  </html>
