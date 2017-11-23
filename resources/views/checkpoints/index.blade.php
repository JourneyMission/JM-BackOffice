@extends('layouts.app')

@section('content')
   <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Dashboard</a>&nbsp;
          </li>
          <li class="breadcrumb-item">Checkpoint Management</li>
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
            <p class="h4"><i class="fa fa-dot-circle-o" ></i> Checkpoint Management</p>
            </div>
            </span>
            <div class="float-right">
                <a href="/Checkpoints/0/edit">
                <button type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> New</button>
                </a>
            </div>

            </span>
          </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              @if(isset($checkpoints))
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

                    $checkpoints= json_decode($checkpoints);
                  ?>
                <tbody>
                @foreach ($checkpoints as $checkpoint)
                  <tr>
                    <td> {{$checkpoint->id }}</td>
                    <td>{{ $checkpoint->Checkpoint_Name }}</td>
                    <td>
                    @if(isset($checkpoint->provience->Provience_Name))
                      {{ $checkpoint->provience->Provience_Name}}
                    @else
                      <span class="badge badge-danger">No Data!</span>
                    @endif
                    </td>
                    </td>
                    <td>
                    @if(isset($checkpoint->category_checkpoint->Category_Checkpoint_Name))
                      {{ $checkpoint->category_checkpoint->Category_Checkpoint_Name}}
                    @else
                      <span class="badge badge-danger">No Data!</span>
                    @endif</td>
                    <td>{{ $checkpoint->Checkpoint_Score }}</td>
                    <td>{{ $checkpoint->updated_at }}</td>
                    <td>
                      <a href="/Checkpoints/{{ $checkpoint->id }}/edit">
                      <span class="badge badge-warning">
                        <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                      </span>
                      </a>
                      <a href="#" onclick="if(confirm('Are you sure to delete {{ $checkpoint->Checkpoint_Name }} ') == true){
                            document.getElementById('Delete-form{{$checkpoint->id}}').submit();
                        }">
                     <span class="badge badge-danger"> 
                        <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                      </span>
                      {!! Form::open(['method' => 'DELETE', 'action' => ['CheckpointsController@destroy','id'=>$checkpoint->id],'style' => 'display: none;','id' => 'Delete-form'.$checkpoint->id]) !!}
                      {!! Form::close() !!}
                      </a>
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
