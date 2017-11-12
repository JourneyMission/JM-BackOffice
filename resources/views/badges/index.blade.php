@extends('layouts.app')

@section('content')
   <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Dashboard</a>&nbsp;
          </li>
          <li class="breadcrumb-item">Badge Management</li>
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
              Badge
              </h4>
            </div>
            </span>
            <div class="float-right">
                <a href="/Badges/0/edit">
                <button type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> New</button>
                </a>
            </div>

            </span>
          </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              @if(isset($badges))
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Last Update</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                  
                 <?php 
                    $badges= json_decode($badges);
                  ?>
                <tbody>
                @foreach ($badges as $badge)
                
                  <tr>
                    <td> {{$badge->id }}</td>
                    <td>{{ $badge->Badge_Name }}</td>
                    <td>{{ $badge->Badge_Description }}</td>
                    @if($badge->Badge_Status == 1)
                    <td>Enabled</td>
                    @else
                    <td>Disable</td>
                    @endif
                    <td>{{ $badge->updated_at }}</td>
                    <td>
                      <a href="/Badges/{{ $badge->id }}/edit">
                      <span class="badge badge-info">
                        <i class="fa fa-search" aria-hidden="true"></i> view</a>
                      </span>
                      <a href="/Badges/{{ $badge->id }}/edit">
                      <span class="badge badge-warning">
                        <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                      </span>
                      <a href="#" onclick="if(confirm('ยืนยันการลบข้อมูล {{ $badge->Badge_Name }} ') == true){
                            document.getElementById('Delete-form{{$badge->id}}').submit();
                        }">
                     <span class="badge badge-danger"> 
                        <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                      </span>
                      {!! Form::open(['method' => 'DELETE', 'action' => ['BadgesController@destroy','id'=>$badge->id],'style' => 'display: none;','id' => 'Delete-form'.$badge->id]) !!}
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
