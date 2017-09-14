@extends('layouts.app')

@section('content')
<div class="content-wrapper">
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
  @if(isset($checkpoint))

  {!! Form::open(['method' => 'PATCH', 'action' => ['CheckpointsController@update','id'=>$checkpoint->id],'class'=>'form-horizontal','files' => true ]) !!}

  @else

  {!! Form::open(['method' => 'POST', 'action' => ['CheckpointsController@store'],'class'=>'form-horizontal','files' => true]) !!}

  @endif
  <div class="container-fluid">

    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Dashboard</a>&nbsp;
          </li>
          <li class="breadcrumb-item">
            <a href="/Checkpoints">Checkpoint Management</a>&nbsp;
          </li>
          <li class="breadcrumb-item">New Checkpoint</li>
        </ol>
    <div class="row">
      <div class="col-sm-6">
        <ol class="breadcrumb-info">
          <li class="breadcrumb-text">
            Checkpoint Infomation
          </li>

        </ol>
        <div class="form-group">
          <label class="control-label col-sm-6 div1">Checkpoint Name :</label>
          <div class="col-sm-6 div2">
            <input type="text" class="form-control" name="Checkpoint_Name" placeholder="Enter Checkpoint name" required value="{{(isset($checkpoint)? $checkpoint->Checkpoint_Name : '')}}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-6 div1">Checkpoint Description :</label>
          <div class="col-sm-6 div2">
            <textarea class="form-control" name="Checkpoint_Description" placeholder="Enter Checkpoint description" required>{{(isset($checkpoint)? $checkpoint->Checkpoint_Description : '')}}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-6 div1">Checkpoint Picture :</label>
          <div class="col-sm-6 input-group image-preview">
            @if(isset($checkpoint))
                @foreach($checkpoint->checkpointPhoto as $Photo)
                <input type="text" class="form-control image-preview-filename" name="image-preview" disabled="disabled" value="{{$Photo->Checkpoint_Photo}}"/>
                @endforeach
                @else
                <input type="text" class="form-control image-preview-filename" name="image-preview" disabled="disabled">
                @endif
            
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
                @if(isset($checkpoint))
                @else
                <input type="file" accept="image/png, image/jpeg, image/gif" name="Checkpoint_Photo" />
                @endif
                
                <!-- rename it -->
              </div>
            </span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-6 div1">Checkpoint Province :</label>
          <div class="col-sm-6 div2">
            <select class="form-control" name="Provience_ID">
              @foreach($proviences as $provience)
              <option Value="{{$provience->id}}" {{(isset($checkpoint) && $checkpoint->Provience_ID == $provience->id ? 'selected' : '')}}>{{$provience->Provience_Name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-6 div1">Checkpoint Category :</label>
          <div class="col-sm-6 div2">
            <select class="form-control" name="Category_Checkpoint_ID">
              @foreach($categoryCheckpoint as $category)
              <option Value="{{$category->id}}" {{(isset($checkpoint) && $checkpoint->Category_Checkpoint_ID == $category->id ? 'selected' : '')}}>{{$category->Category_Checkpoint_Name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <br><br><br><br><br>
        <ol class="breadcrumb-info">
          <li class="breadcrumb-text">
            Checkpoint Score
          </li>
        </ol>
        <div class="form-group">
          <label class="control-label col-sm-6 div1">Checkpoint Score :</label>
          <div class="col-sm-3 div2">
            <input type="number" class="form-control" name="Checkpoint_Score" placeholder="Score" required value="{{(isset($checkpoint)? $checkpoint->Checkpoint_Score : '')}}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-6 div1">Checkpoint Special Score :</label>
          <div class="col-sm-3 div2">
            <input type="number" class="form-control" name="Checkpoint_SpeacialScore" placeholder="Score" required value="{{(isset($checkpoint)? $checkpoint->Checkpoint_SpeacialScore : '')}}">
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb-info">
          <li class="breadcrumb-text">
            Checkpoint Location
          </li>
        </ol>
        <div class="form-group">
          <label class="control-label col-sm-12">Checkpoint Latitude :</label>
          <div class="col-sm-5 div2">
            <input type="text" class="form-control" name="Checkpoint_Latitude" placeholder="Enter Latitude" required value="{{(isset($checkpoint)? $checkpoint->Checkpoint_Latitude : '')}}">
          </div>
          <label class="control-label col-sm-1 div3">Delta</label>
          <div class="col-sm-5 div2">
            <input type="text" class="form-control" name="Checkpoint_LatitudeDelta" placeholder="Enter Latitude Delta" required value="{{(isset($checkpoint)? $checkpoint->Checkpoint_LatitudeDelta : '')}}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-12">Checkpoint Longitude :</label>
          <div class="col-sm-5 div2">
            <input type="text" class="form-control" name="Checkpoint_Longtitude" placeholder="Enter Longitude" required value="{{(isset($checkpoint)? $checkpoint->Checkpoint_Longtitude : '')}}">
          </div>
          <label class="control-label col-sm-1 div3">Delta</label>
          <div class="col-sm-5 div2">
            <input type="text" class="form-control" name="Checkpoint_LongtitudeDelta" placeholder="Enter Longitude Delta" required value="{{(isset($checkpoint)? $checkpoint->Checkpoint_LongtitudeDelta : '')}}">
          </div>
        </div>
        <br><br>
        <ol class="breadcrumb-info">
          <li class="breadcrumb-text">
            Checkpoint Date/Time
          </li>

        </ol>
        <div class="form-group">
          <label class="control-label col-sm-12">Checkpoint Date :</label>
          <div class="col-sm-5 div2">
            <input type="date" class="form-control" name="Checkpoint_StartDate" placeholder="Enter Start" value="{{(isset($checkpoint)? $checkpoint->Checkpoint_StartDate : '')}}">
          </div>
          <label class="control-label col-sm-1 div3">to</label>
          <div class="col-sm-5 div2">
            <input type="date" class="form-control" name="Checkpoint_EndDate" placeholder="Enter End" value="{{(isset($checkpoint)? $checkpoint->Checkpoint_EndDate : '')}}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-12">Checkpoint Time :</label>
          <div class="col-sm-5 div2">
            <input type="time" class="form-control" name="Checkpoint_StartTime" placeholder="Enter Start" value="{{(isset($checkpoint)? $checkpoint->Checkpoint_StartTime : '')}}">
          </div>
          <label class="control-label col-sm-1 div3">to</label>
          <div class="col-sm-5 div2">
            <input type="time" class="form-control" name="Checkpoint_EndTime" placeholder="Enter End" value="{{(isset($checkpoint)? $checkpoint->Checkpoint_EndTime : '')}}">
          </div>
        </div>

      </div>
    </div>
    <div class="breadcrumb-save">
      @if(isset($checkpoint))
      <a href="/Checkpoints"><button type="button" class="btn btn-warning divsave">Cancel</button></a>
      <button type="submit" class="btn btn-success">Update Checkpoint</button>
      @else
      <button type="reset" class="btn btn-warning divsave">Reset</button>
      <button type="submit" class="btn btn-success">New Checkpoint</button>
      @endif
    </div>
  </div>
  {!! Form::close() !!}
  <!-- /.container-fluid -->

</div>
@endsection
@section('jsfooter')
<script>
  $(document).on('click', '#close-preview', function () {
    $('.image-preview').popover('hide');
      // Hover befor close the preview
      $('.image-preview').hover(
        function () {
          $('.image-preview').popover('show');
        },
        function () {
          $('.image-preview').popover('hide');
        }
        );
    });

  $(function () {
      // Create the close button
      var closebtn = $('<button/>', {
        type: "button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
      });
      closebtn.attr("class", "close pull-right");
      // Set the popover default content
      $('.image-preview').popover({
        trigger: 'manual',
        html: true,
        title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
        content: "There's no image",
        placement: 'bottom'
      });
      // Clear event
      $('.image-preview-clear').click(function () {
        $('.image-preview').attr("data-content", "").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse");
      });
      // Create the preview image
      $(".image-preview-input input:file").change(function () {
        var img = $('<img/>', {
          id: 'dynamic',
          width: 250,
          height: 200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
          $(".image-preview-input-title").text("Change");
          $(".image-preview-clear").show();
          $(".image-preview-filename").val(file.name);
          img.attr('src', e.target.result);
          $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
      });
    });
  </script>
  @endsection
