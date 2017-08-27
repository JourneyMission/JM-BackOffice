@extends('layouts.app')

@section('content')
   <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="home">Dashboard</a>&nbsp;
          </li>
          <li class="Profiles"> / Manage Profiles</li>
        </ol>
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
              User Profiles
              </h4>
            </div>
<!--
            <div class="float-right">
              <a href="Profiles/create">
              <button type="button" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> New Checkpoint</button>
              </a>
            </div>
-->
            </span>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              @if(isset($profile))
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Team</th>
                    <th>Role</th>
                    <th>Last Login</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> {{ $profile->id }}</td>
                    <td>{{ $profile->Profile_Name }}</td>
                    <td>{{ $profile->Profile_Email }}</td>
                    @if ($profile->Profile_Team == NULL)
                        <td>No Data !</td>
                    @elseif ($profile->Profile_Team = 1)
                        <td><font color="red">ทีมสีแดง</font></td>
                    @else
                        <td><font color="blue">ทีมสีเขียว</font></td>
                    @endif
                    @if ($profile->Profile_Role == 1)
                        <td>Admin</td>
                    @endif
                    <td>{{ $profile->updated_at }}</td>
                    <td>
                      <a href="/Profiles/{{ $profile->id }}">
                      <span class="badge badge-success"> 
                        <i class="fa fa-search" aria-hidden="true"></i> View</a>
                      </span>
                      <a href="/Profiles/{{ $profile->id }}/edit">
                      <span class="badge badge-warning">
                        <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                      </span>
                      <a href="#" onclick="if(confirm('ยืนยันการลบข้อมูล {{ $profile->Profile_Name }} ') == true){
                            document.getElementById('Delete-form').submit();
                        }">
                     <span class="badge badge-danger"> 
                        <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                      </span>
                      {!! Form::open(['method' => 'DELETE', 'action' => ['ProfilesController@destroy',$profile->id],'style' => 'display: none;','id' => 'Delete-form']) !!}
                      {!! Form::close() !!}
                      
                    </td>
                  </tr>
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
