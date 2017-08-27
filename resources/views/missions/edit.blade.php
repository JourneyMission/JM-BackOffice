@extends('layouts.app')

@section('content')
   <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Create Mission</a>
        </li>
        <li class="breadcrumb-item active" id="mission_name">Mission Name</li>
      </ol>
    </div> 
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <form class="form-horizontal">
            <div class="form-group">
              <label class="control-label col-sm-10">Mission name :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="mission_name" placeholder="Enter Mission name">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-10">Category :</label>
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-4">
                    <label><input type="checkbox"> Category1</label></div>
                  <div class="col-sm-4">
                    <label><input type="checkbox"> Category2</label></div>
                  <div class="col-sm-4">
                    <label><input type="checkbox"> Category3</label></div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                      <label><input type="checkbox"> Category4</label></div>
                    <div class="col-sm-4">
                      <label><input type="checkbox"> Category5</label></div>
                    <div class="col-sm-4">
                      <label><input type="checkbox"> Category6</label></div>
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-10">Description :</label>
              <div class="col-sm-10">
                <textarea type="text" class="form-control" id="mission_description" placeholder="Enter Description"></textarea>
              </div>
            </div>
            
            <div class="form-group">
              <div class="row">
                <div class="col-sm-4">
                  <label class="control-label col-sm-10">Start :</label>
                </div>
                <div class="col-sm-4">
                  <label class="control-label col-sm-10">Finish :</label>
                </div>
              </div>
              <div class="row">
                  <div class="col-sm-4" style="margin-left:3%">
                      <select class="form-control" id="sel1">
                          <option>Bangkok</option>
                          <option>Chiangmai</option>
                          <option>Rachaburi</option>
                          <option>Lampang</option>
                        </select>
                  </div>
                  <div class="col-sm-4">
                      <select class="form-control" id="sel1">
                          <option>Maehongson</option>
                          <option>Suratthani </option>
                          <option>Chiangmai</option>
                          <option>Bangkok</option>
                        </select>
                  </div>
                </div>
            </div>
      
          </form>
        </div>

        <div class="col-sm-6">
          <form class="form-horizontal">
            <div class="form-group">
              
              <label class="control-label col-sm-6">Upload Map :</label>
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
                <label class="control-label col-sm-6" >Upload icon :</label>
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
                  <label class="control-label col-sm-10">Add Checkpoint :</label>
                  <div class="container">
                      <div class="row">
                        <input type="hidden" name="count" value="1" />
                            <div class="control-group col-sm-12" id="fields">
              
                                <div class="controls" id="profs"> 
                                    <form class="input-append">
                                        <div id="field">
                                                <input autocomplete="off"  id="field1" name="prof1" type="text" class="form-control" placeholder="Checkpoint..." data-items="8"/>                                        

                                                <button id="b1" class="btn add-more " type="button">+</button>
                                        </div>
                                    </form>
                                <br>
                                <small>Press + to add another form field :)</small>
                                </div>
                            </div>
                      </div>
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
