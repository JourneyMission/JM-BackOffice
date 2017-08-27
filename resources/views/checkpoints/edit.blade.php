@extends('layouts.app')

@section('content')
   <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Dashboard</a>&nbsp;
          </li>
          <li class="breadcrumb-item">
            <a href="/Checkpoints">Manage Checkpoints</a>&nbsp;
          </li>
          <li class="breadcrumb-item"> Create Checkpoints</li>
        </ol>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <form class="form-horizontal">
            <div class="form-group">
              <label class="control-label col-sm-10">Checkpoint name :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="checkpoint_name" placeholder="Enter Checkpoint name" name="Checkpoint_Name">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-10">Category :</label>
              <div class="col-sm-10">
                <div class="row">
                  @foreach($categoryCheckpoint as $category)
                  <div class="col-sm-4">
                    <label><input type="checkbox" name="Checkpoint_Category" Value="{{$category->id}}"> {{$category->Category_Checkpoint_Name}}</label>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-10">Description :</label>
              <div class="col-sm-10">
                <textarea type="text" class="form-control" id="checkpoin_desc" placeholder="Enter Description"></textarea>
              </div>
            </div>
          </form>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
              <label class="control-label"> Region :</label>
                <select class="custom-select">
                  <option value="1" selected>East</option>
                  <option value="2">North</option>
                  <option value="3">South</option>
                  <option value="4">West</option>
                </select>
            </div>
            <div class="form-group">
              <label class="control-label"> Score :</label>
                <select class="custom-select">
                  <option value="1" selected>East</option>
                  <option value="2">North</option>
                  <option value="3">South</option>
                  <option value="4">West</option>
                </select>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-6">Checkpoint picture :</label>
              <div class="input-group image-preview">

                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                                  <!-- image-preview-clear button -->
                                  <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                      <span class="glyphicon glyphicon-remove"></span> Clear
                </button>
                <!-- image-preview-input -->
                <div class="btn btn-default image-preview-input">
                  <span class="glyphicon glyphicon-folder-open"></span>
                  <span class="image-preview-input-title">Browse</span>
                  <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview" />
                  <!-- rename it -->
                </div>
                </span>
              </div>
            </div>
            <div class="form-group">
              
              <div class="col-sm-12" style="text-align: right">
                  <button type="button" class="btn btn-success">Create</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
