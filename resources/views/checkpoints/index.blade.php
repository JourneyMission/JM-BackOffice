@extends('layouts.app')

@section('content')
   <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="home">Dashboard</a>&nbsp;
          </li>
          <li class="Checkpoints"> / Manage Checkpoints</li>
        </ol>

        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <span class="align-middle">
            <div class="float-left">
              <h4>
              <i class="fa fa-table"></i>
              The score of traveler
              </h4>
            </div>

            <div class="float-right">
              <a href="Checkpoints/store">
              <button type="button" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> New Checkpoint</button>
              </a>
            </div>
            </span>
          </div>
          <div class="card-body">
            <div class="table-responsive">
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
                
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td><font color="red">Red</font></td>
                    <td>3</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>2011/04/25</td>
                    <td>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
@endsection
