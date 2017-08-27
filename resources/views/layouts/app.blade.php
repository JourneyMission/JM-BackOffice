<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Styles -->
    <!-- Bootstrap core CSS -->

    <!-- Custom fonts for this template -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="{{ asset('js/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="AdminMenu">
    
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
              <a class="nav-link" href="/home">
                  <i ><img src = "{{ asset('img/icon/dashboard.png') }}"></i>
                  <span class="nav-link-text">
                    Dashboard </span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Checkpoint">
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseCheckpoint" data-parent="#AdminMenu">
                <i><img src = "{{ asset('img/icon/map-pin-marked.png') }}"></i>
                  <span class="nav-link-text">
                    Checkpoint </span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseCheckpoint">
              <li>
                <a href="/CategoryCheckpoints">Checkpoint Category</a>
              </li>
              <li>
                <a href="/Checkpoints">Checkpoint</a>
              </li>
            </ul>
          </li>
         <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Mission">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMission" data-parent="#AdminMenu">
               <i ><img src = "{{ asset('img/icon/mission.png') }}"></i>
                  <span class="nav-link-text">
                    Mission </span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseMission">
              <li>
                <a href="/CategoryMissions">Mission Category</a>
              </li>
              <li>
                <a href="/Missions">Mission</a>
              </li>
            </ul>
          </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Badge">
              <a class="nav-link" href="/Badges">
                  <i><img src = "{{ asset('img/icon/star-button.png') }}"></i>
                  <span class="nav-link-text">
                    Badge </span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Badge">
              <a class="nav-link" href="/Profiles">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span class="nav-link-text">
                    User </span>
                </a>
            </li>
          </ul>
        
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i class="fa fa-fw fa-sign-out"></i>
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
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
    <canvas id="myPieChart" width="100%" height="100" style="display: none;"></canvas>
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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
