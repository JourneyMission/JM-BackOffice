@extends('layouts.app')

@section('content')
   <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Dashboard</a>&nbsp;
          </li>
          <li class="breadcrumb-item"> Manage Mission</li>
        </ol>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (isset($message))
            <div class="alert alert-success alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{$message}}
            </div>
        @endif
        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <span class="align-middle">
            <div class="float-left">
              <h4>
              <i class="fa fa-table"></i>
              Mission
              </h4>
            </div>
            </span>
            <div class="float-right">
                <a href="/Missions/0/edit">
                <button type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> New</button>
                </a>
            </div>

            </span>
          </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              @if(isset($missions))
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Provience</th>
                    <th>Category</th>
                    <th>Score</th>
                    <th>Last Update</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                  
                 <?php 
                    $missions= json_decode($missions);
                  ?>
                <tbody>
                @foreach ($missions as $mission)
                  <tr>
                    <td> {{$mission->id }}</td>
                    <td>{{ $mission->Mission_Name }}</td>
                    <td>{{ $mission->provience->Provience_Name }}</td>
                    <td>{{ $mission->category_mission->Category_Mission_Name }}</td>
                    <td>{{ $mission->Mission_Score }}</td>
                    <td>{{ $mission->updated_at }}</td>
                    <td>
                      <a href="/Missions/{{ $mission->id }}/edit">
                      <span class="badge badge-info">
                        <i class="fa fa-search" aria-hidden="true"></i> view</a>
                      </span>
                      <a href="/Missions/{{ $mission->id }}/edit">
                      <span class="badge badge-warning">
                        <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                      </span>
                      <a href="#" onclick="if(confirm('ยืนยันการลบข้อมูล {{ $mission->Mission_Name }} ') == true){
                            document.getElementById('Delete-form{{$mission->id}}').submit();
                        }">
                     <span class="badge badge-danger"> 
                        <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                      </span>
                      {!! Form::open(['method' => 'DELETE', 'action' => ['MissionsController@destroy','id'=>$mission->id],'style' => 'display: none;','id' => 'Delete-form'.$mission->id]) !!}
                      {!! Form::close() !!}
                      
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
                <h3 class="text-center">No Data in Database</h3>
              @endif
            </div>
          </div>
          <div class="card-footer small text-muted">
            
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
@endsection
