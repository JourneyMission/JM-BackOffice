@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Create Badge</a>
        </li>
        <li class="breadcrumb-item active" id="badge_name">Badge Name</li>
      </ol>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <form class="form-horizontal">
            <div class="form-group">
              <label class="control-label col-sm-10">Badge name :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="badge_name" placeholder="Enter badge name">
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-4">
                  <label class="control-label col-sm-10">Badge Rank :</label>
                </div>
                <div class="col-sm-4">
                  <select class="form-control" id="sel1">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                        </select>
                </div>
              </div>

            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-sm-4">
                    <label class="control-label col-sm-10">Category :</label>
                  </div>
                  <div class="col-sm-4">
                    <select class="form-control" id="sel1">
                            <option>Category1</option>
                            <option>Category2</option>
                            <option>Category3</option>
                            <option>Category4</option>
                          </select>
                  </div>
                </div>
  
              </div>
              <div class="form-group">
                  <div class="row">
                    <div class="col-sm-4">
                      <label class="control-label col-sm-12">Start Date/Time :</label>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-group row">
                            
                            <div class="col-10">
                              <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                            </div>
                          </div>
                    </div>
                  </div>
    
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-sm-4">
                        <label class="control-label col-sm-12">End Date/Time :</label>
                      </div>
                      <div class="col-sm-7">
                          <div class="form-group row">
                              
                              <div class="col-10">
                                <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                              </div>
                            </div>
                      </div>
                    </div>
      
                  </div>
                  <div class="form-group">
                      <div class="row">
                      <div class="col-sm-4">
                          <label class="control-label col-sm-12">Status :</label>
                        </div>
                    <div class="col-sm-4">
                        <input type="checkbox" checked data-toggle="toggle" data-on="Enable" data-off="Disable" data-onstyle="success" data-offstyle="danger">
                    </div>
                  </div>
                </div>
                 

                  
            

            

          </form>
        </div>

        <div class="col-sm-6">
          <form class="form-horizontal">
              <div class="form-group">
                  
                  <label class="control-label col-sm-6">Before get badge :</label>
                  <div class="input-group image-preview">
                      
                        <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                        <span class="input-group-btn">
                            <!-- image-preview-clear button -->
                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                <span class="glyphicon glyphicon-remove"></span> Clear
                            </button>
                            <!-- image-preview-input -->
                            <div class="btn btn-default image-preview-input">
                                <span class="glyphicon glyphicon-folder-open"></span>
                                <span class="image-preview-input-title">Browse</span>
                                <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                            </div>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-6" >Get badge :</label>
                    <div class="input-group image-preview">
                        
                          <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                          <span class="input-group-btn">
                              <!-- image-preview-clear button -->
                              <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                  <span class="glyphicon glyphicon-remove"></span> Clear
                              </button>
                              <!-- image-preview-input -->
                              <div class="btn btn-default image-preview-input">
                                  <span class="glyphicon glyphicon-folder-open"></span>
                                  <span class="image-preview-input-title">Browse</span>
                                  <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                              </div>
                          </span>
                      </div>
                  </div> 
            
       
            <div class="form-group">

              <div class="col-sm-12" style="text-align: right">
                <button type="button" class="btn btn-success" >Create</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>


  </div>

@endsection
