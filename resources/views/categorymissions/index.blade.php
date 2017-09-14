@extends('layouts.app')

@section('content')
   <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Dashboard</a>&nbsp;
          </li>
          <li class="breadcrumb-item"> Manage Mission Categories</li>
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
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong>  {{session('message')}}
            </div>
        @endif
        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <span class="align-middle">
            <div class="float-left">
              <h4>
              <i class="fa fa-table"></i>
              Mission Categories
              </h4>
            </div>

            <div class="float-right">
              @if(isset($categoryMission))
             
             {!! Form::open(['method' => 'PATCH', 'action' => ['CategoryMissionsController@update','id'=>$categoryMission->id],'class'=>'form-inline' ]) !!}
              
                <label class="sr-only" for="CategoryMissionsInput">Category</label>
                <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="CategoryMissionsInput" name="Category_Mission_Name" placeholder="New Category.." value="{{$categoryMission->Category_Mission_Name}}" autofocus required>
                <button type="submit" class="btn btn-warning">Update</button>&nbsp;
                <a href="/CategoryMissions">
                <button type="button" class="btn btn-danger">Cancel</button>
                </a>
              @else
              {!! Form::open(['method' => 'POST', 'action' => ['CategoryMissionsController@store'],'class'=>'form-inline' ]) !!}
               <label class="sr-only" for="CategoryMissionpointsInput">Category</label>
                <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="CategoryMissionpointsInput" name="Category_Mission_Name" placeholder="New Category.." required>
                <button type="submit" class="btn btn-primary">New</button>

              @endif
              {!! Form::close() !!}
            </div>

            </span>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              @if(isset($categoryMissions))
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Last Update</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                  
                 <?php 
                    $categoryMissions= json_decode($categoryMissions);
                    //dd($categoryMissions);
                  ?>
                <tbody>
                @foreach ($categoryMissions as $categoryMission)
                  <tr>
                    <td> {{ $categoryMission->id }}</td>
                    <td>{{ $categoryMission->Category_Mission_Name }}</td>
                    <td>{{ $categoryMission->updated_at }}</td>
                    <td>
                      <a href="/CategoryMissions/{{ $categoryMission->id }}/edit">
                      <span class="badge badge-warning">
                        <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                      </span>
                      <a href="#" onclick="if(confirm('ยืนยันการลบข้อมูล {{ $categoryMission->Category_Mission_Name }} ') == true){
                            document.getElementById('Delete-form{{$categoryMission->id}}').submit();
                        }">
                     <span class="badge badge-danger"> 
                        <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                      </span>
                      {!! Form::open(['method' => 'DELETE', 'action' => ['CategoryMissionsController@destroy','id'=>$categoryMission->id],'style' => 'display: none;','id' => 'Delete-form'.$categoryMission->id]) !!}
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
