@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <!-- Icon Cards -->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <a href="missionlist.html">
            <div class="card text-white bg-primary o-hidden ">
              <div class="card-body">
                <div class="card-body-icon">
                  <img src="{{ asset('img/icon/mission.png') }}">
                </div>
                <div class="mr-5">
                  Mission
                  <h1><span class="label label-default">{{$data['MissionCount']}}</span></h1>
                </div>
              </div>
            </div>
          </a>
          <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#mission">View Detail ></button>
          <div id="mission" class="collapse">
            <ul class="list-group">
              <li class="list-group-item">
                <b>Mission Category</b>
              </li>

              @foreach($data['MissionCategory'] as $MissionCategory)
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm-8">{{$MissionCategory->Category_Mission_Name}}</div>
                  <div class="col-sm-4"><span>{{$MissionCategory->COUNT}}</span></div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <a href="checkpointlist.html" class="">
            <div class="card text-white bg-warning o-hidden ">
              <div class="card-body">
                <div class="card-body-icon">
                  <img src="{{ asset('img/icon/placeholder.png') }}">
                </div>
                <div class="mr-5">
                  Checkpoint
                  <h1><span class="label label-default">{{$data['CheckpointCount']}}</span></h1>
                </div>
              </div>

            </div>
          </a>
          <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#checkpoint">View Detail ></button>
          <div id="checkpoint" class="collapse">
            <ul class="list-group">
              <li class="list-group-item">
                <b>Checkpoint Category</b>
              </li>
              @foreach($data['CheckpointCategory'] as $CheckpointCategory)
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm-8">{{$CheckpointCategory->Category_Checkpoint_Name}}</div>
                  <div class="col-sm-4"><span>{{$CheckpointCategory->COUNT}}</span></div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <a href="badgelist.html">
            <div class="card text-white bg-success o-hidden">
              <div class="card-body">
                <div class="card-body-icon">
                  <img src="{{ asset('img/icon/badge-with-a-star.png')}}">
                </div>
                <div class="mr-5">
                  Badge
                  <h1><span class="label label-default">{{$data['BadgeCount']}}</span></h1>
                </div>
              </div>

            </div>
          </a>

        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <a href="userlist.html">
            <div class="card text-white bg-danger o-hidden">
              <div class="card-body">
                <div class="card-body-icon">
                  <img src="{{ asset('img/icon/profile.png') }}">
                </div>
                <div class="mr-5">
                  User
                  <h1><span class="label label-default">{{$data['ProfileCount']}}</span></h1>
                </div>
              </div>

            </div>
          </a>
          <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#user">View Detail ></button>
          <div id="user" class="collapse">
            <ul class="list-group">
              <li class="list-group-item">
                <b>Team</b>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm-8">Bear Team</div>
                  <div class="col-sm-4"><span>{{$data['bear']}}</span></div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm-8">Fox Team</div>
                  <div class="col-sm-4"><span>{{$data['fox']}}</span></div>
                </div>
              </li>

            </ul>
          </div>
        </div>
      </div>

      <div class="row">

        <div class="col-lg-8">

          <!-- Area Chart Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-area-chart"></i> User joined mission
            </div>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">
              Updated now at {{date("Y/m/d H:i")}}
            </div>
          </div>

          <!-- Example Bar Chart Card -->
          <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bar-chart"></i> Joined Mission Category
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12 my-auto">
                    <canvas id="myBarChart1" width="100" height="50"></canvas>
                  </div>
                  <div class="col-sm-12 text-center my-auto">
                    <div class="h4 mb-0 text-primary">{{$data['JoinCount']}} times</div>
                    <div class="small text-muted">Amount of Joined Mission</div>
  
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">
                Updated now at {{date("Y/m/d H:i")}}
              </div>
            </div>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Checked in Checkpoint Category
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12 my-auto">
                  <canvas id="myBarChart2" width="100" height="50"></canvas>
                </div>
                <div class="col-sm-12 text-center my-auto">
                  <div class="h4 mb-0 text-primary">{{$data['CheckinCount']}} times</div>
                  <div class="small text-muted">Checked in Checkpoint</div>

                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">
              Updated now at {{date("Y/m/d H:i")}}
            </div>
          </div>
          
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Get Badge
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12 my-auto">
                  <canvas id="myBarChart3" width="100" height="50"></canvas>
                </div>
                <div class="col-sm-12 text-center my-auto">
                  <div class="h4 mb-0 text-primary">{{$data['ProfileBadgeCount']}} times</div>
                  <div class="small text-muted">Get Badge</div>

                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">
              Updated now at {{date("Y/m/d H:i")}}
            </div>
          </div>

          <!-- Card Columns Example Social Feed -->



          <!-- /Card Columns -->

        </div>

        <div class="col-lg-4">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bell fa-fw"></i> Notifications
            </div>
            <div class="panel-body">
              <div class="list-group">
                <a href="#" class="list-group-item">
                                      <i class="fa fa-comment fa-fw"></i> New Mission
                                      <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                      </span>
                                  </a>
                <a href="#" class="list-group-item">
                                      <i class="fa fa-twitter fa-fw"></i> New Checkpoint
                                      <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                      </span>
                                  </a>
                <a href="#" class="list-group-item">
                                      <i class="fa fa-envelope fa-fw"></i> New Badge
                                      <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                      </span>
                                  </a>
                <a href="#" class="list-group-item">
                                      <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                      <span class="pull-right text-muted small"><em>11:32 AM</em>
                                      </span>
                                  </a>
                <a href="#" class="list-group-item">
                                      <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                      <span class="pull-right text-muted small"><em>11:13 AM</em>
                                      </span>
                                  </a>
                <a href="#" class="list-group-item">
                                      <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                      <span class="pull-right text-muted small"><em>10:57 AM</em>
                                      </span>
                                  </a>


              </div>
              <!-- /.list-group -->
              <a href="#" class="btn btn-default btn-block">View All Alerts</a>
            </div>
            <div class="card-footer small text-muted">
              Updated now at {{date("Y/m/d H:i")}}
            </div>
          </div>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-calendar"></i> Activity
            </div>
            <div class="list-group list-group-flush small">
              <a href="#" class="list-group-item list-group-item-action">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <strong>Thidarat Luangprasert</strong> create a new mission.
                    <div class="text-muted smaller">Today at 5:43 PM - 5m ago</div>
                  </div>
                </div>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <strong>Songrit Keardphol</strong> delete <strong>Wat Yai Chai Mongkol</strong> checkpoint.
                    <div class="text-muted smaller">Today at 4:37 PM - 1hr ago</div>
                  </div>
                </div>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <strong>Natchaya Seehawong</strong> edit a photo to <strong>Satorini</strong> checkpoint.
                    <div class="text-muted smaller">Today at 4:31 PM - 1hr ago</div>
                  </div>
                </div>
              </a>

              <a href="#" class="list-group-item list-group-item-action">
                            View all activity...
                          </a>
            </div>
            <div class="card-footer small text-muted">
              Updated now at {{date("Y/m/d H:i")}}
            </div>
          </div>



          <!-- Example Pie Chart Card -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Team Score
            </div>
            <div class="card-body">
              <canvas id="myPieChart" width="100%" height="100"></canvas>
            </div>
            <div class="card-footer small text-muted">
              Updated now at {{date("Y/m/d H:i")}}
            </div>
          </div>
          <!-- Example Notifications Card -->

        </div>
        
      </div>






    </div>
    <!-- /.container-fluid -->

  </div>
@endsection
@section('jsfooter')
<script src="{{ asset('js/chart/Chart.min.js') }}"></script>
<script src="{{ asset('js/sb-admin.min.js') }}"></script>
<script type="text/javascript">
  var ctx = document.getElementById("myAreaChart"),
    myLineChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: [
            @foreach($data['JoinedMissionUser'] as $label)
              "{{$label->DATE}}",
            @endforeach
            ],
            datasets: [{
                label: "Joined Mission",
                lineTension: .3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 20,
                pointBorderWidth: 2,
                data: [
            @foreach($data['JoinedMissionUser'] as $Value)
              "{{$Value->COUNT}}",
            @endforeach
            ]
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: "date"
                    },
                    gridLines: {
                        display: !1
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 7,
                        maxTicksLimit: 5
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)"
                    }
                }]
            },
            legend: {
                display: !1
            }
        }
    }),
    ctx = document.getElementById("myBarChart1"),
    myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [
            @foreach($data['JoinedMissionUser'] as $label)
              "{{$label->DATE}}",
            @endforeach
            ],
            datasets: [{
                label: "Joined Mission",
                backgroundColor: "rgba(2,117,216,1)",
                borderColor: "rgba(2,117,216,1)",
                data: [
            @foreach($data['JoinedMissionUser'] as $Value)
              "{{$Value->COUNT}}",
            @endforeach
            ]
            }]
        },
        
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: "month"
                    },
                    gridLines: {
                        display: !1
                    },
                    ticks: {
                        maxTicksLimit: 6
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 10,
                        maxTicksLimit: 5
                    },
                    gridLines: {
                        display: !0
                    }
                }]
            },
            legend: {
                display: !1
            }
        }
    }),
    ctx = document.getElementById("myBarChart2"),
    myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [
            @foreach($data['CheckedinCheckpointCategory'] as $label)
              "{{$label->DATE}}",
            @endforeach
            ],
            datasets: [{
                label: "Checked in Checkpoint",
                backgroundColor: "rgba(255,215,0,1)",
                borderColor: "rgba(255,215,0,1)",
                data: [
            @foreach($data['CheckedinCheckpointCategory'] as $Value)
              "{{$Value->COUNT}}",
            @endforeach
            ]
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: "month"
                    },
                    gridLines: {
                        display: !1
                    },
                    ticks: {
                        maxTicksLimit: 20
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 10,
                        maxTicksLimit: 20
                    },
                    gridLines: {
                        display: !0
                    }
                }]
            },
            legend: {
                display: !1
            }
        }
    }),
    ctx = document.getElementById("myBarChart3"),
    myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [
            @foreach($data['GetBadge'] as $label)
              "{{$label->DATE}}",
            @endforeach
            ],
            datasets: [{
                label: "Get Badge",
                backgroundColor: "rgba(34,139,34,1)",
                borderColor: "rgba(34,139,34,1)",
                data: [
            @foreach($data['GetBadge'] as $Value)
              "{{$Value->COUNT}}",
            @endforeach
            ]
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: "month"
                    },
                    gridLines: {
                        display: !1
                    },
                    ticks: {
                        maxTicksLimit: 100
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 10,
                        maxTicksLimit: 100
                    },
                    gridLines: {
                        display: !0
                    }
                }]
            },
            legend: {
                display: !1
            }
        }
    }),
    ctx = document.getElementById("myPieChart"),
    myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: ["Fox", "Bear"],
            datasets: [{
                data: [{{$data['fox']}}, {{$data['bear']}}],
                backgroundColor: ["#FF8C00", "#8B4513"]
            }]
        }
    });
</script>
@endsection

