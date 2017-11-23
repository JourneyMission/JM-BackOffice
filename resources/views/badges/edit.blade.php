@extends('layouts.app')

@section('content')
<div class="content-wrapper">

  @if(isset($badge))

  {!! Form::open(['method' => 'PATCH', 'action' => ['BadgesController@update','id'=>$badge->id],'class'=>'form-horizontal','files' => true ]) !!}

  @else

  {!! Form::open(['method' => 'POST', 'action' => ['BadgesController@store'],'class'=>'form-horizontal','files' => true]) !!}

  @endif
  <div class="container-fluid">
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
    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Dashboard</a>&nbsp;
          </li>
          <li class="breadcrumb-item">
            <a href="/Badges">Badge Management</a>&nbsp;
          </li>
          <li class="breadcrumb-item">New Badge</li>
        </ol>
    <div class="row">
      <div class="col-sm-6">
        <form class="form-horizontal">
          <ol class="breadcrumb-info">
            <li class="breadcrumb-text">
              Badge Infomation
            </li>

          </ol>
          <div class="form-group">
            <label class="control-label col-sm-6 div1">Badge Name :</label>
            <div class="col-sm-6 div2">
              <input type="text" class="form-control" name="Badge_Name" placeholder="Enter Badge name" required value="{{(isset($badge)? $badge->Badge_Name : '')}}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-6 div1">Badge Description :</label>
            <div class="col-sm-6 div2">
              <textarea class="form-control" name="Badge_Description" placeholder="Enter Badge description" required>{{(isset($badge)? $badge->Badge_Description : '')}}</textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-6 div1">Badge Picture :</label>
            <div class="col-sm-6 input-group image-preview">
              @if(isset($badge))
                <input type="text" class="form-control image-preview-filename" name="image-preview" disabled="disabled" value="{{$badge->Badge_Photo}}" />
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
                  <input type="file" accept="image/png, image/jpeg" name="Badge_Photo" value="{{(isset($badge)? $badge->Badge_Photo : '')}}" />
                  <!-- rename it -->
                </div>
              </span>
            </div>
          </div>
          <div>
              <label class=" col-sm-6 div1"></label>
              <div class="col-sm-6 div2">
                <span style="color:gray">.png/.jpg 100*100px</span>
              </div>
            </div>
          <div class="form-group">
            <label class="control-label col-sm-6 div1">Badge Rank :</label>
            <div class="col-sm-6 div2">
              <select class="form-control" name="Badge_Rank">
                <option value="1" {{(isset($badge) && $badge->Badge_Rank == 1 ? 'selected' : '')}} >1</option>
                <option value="2" {{(isset($badge) && $badge->Badge_Rank == 2 ? 'selected' : '')}} >2</option>
                <option value="3" {{(isset($badge) && $badge->Badge_Rank == 3 ? 'selected' : '')}} >3</option>
                <option value="4" {{(isset($badge) && $badge->Badge_Rank == 4 ? 'selected' : '')}} >4</option>
                <option value="5" {{(isset($badge) && $badge->Badge_Rank == 5 ? 'selected' : '')}} >5</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-6 div1">Badge Status :</label>
            <div class="col-sm-3 div2">
              <input type="checkbox" name="Badge_Status" data-toggle="toggle" data-on="Enable" data-off="Disable" data-onstyle="success" data-offstyle="danger" {{(isset($badge) && $badge->Badge_Status == 1 ? 'checked' : '')}}>
            </div>
          </div>
      </div>
      <div class="col-sm-6">
          <ol class="breadcrumb-info">
            <li class="breadcrumb-text">
              Badge Date/Time
            </li>

          </ol>
          <div class="form-group">
            <label class="control-label col-sm-12">Badge Date :</label>
            <div class="col-sm-5 div2">
              <input type="date" class="form-control" name="Badge_StartDate" placeholder="Enter Start" required value="{{(isset($badge)? $badge->Badge_StartDate : '')}}">
            </div>
            <label class="control-label col-sm-1 div3">to</label>
            <div class="col-sm-5 div2">
              <input type="date" class="form-control" name="Badge_EndDate" placeholder="Enter End" required  value="{{(isset($badge)? $badge->Badge_EndDate : '')}}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-12">Badge Time :</label>
            <div class="col-sm-5 div2">
              <input type="time" class="form-control" name="Badge_StartTime" placeholder="Enter Start" required value="{{(isset($badge)? $badge->Badge_StartTime : '')}}">
            </div>
            <label class="control-label col-sm-1 div3">to</label>
            <div class="col-sm-5 div2">
              <input type="time" class="form-control" name="Badge_EndTime" placeholder="Enter End" required value="{{(isset($badge)? $badge->Badge_EndTime : '')}}">
            </div>
          </div>
          <br><br>
          <ol class="breadcrumb-info">
            <li class="breadcrumb-text">
              Badge Condition
            </li>

          </ol>
        <div class="form-group row">
          <label class="control-label col-sm-4 div2">Badge Province :</label>
          <div class="col-sm-4 div2">
            <select class="form-control" name="Badge_Provience_ID">
              @foreach($proviences as $provience)
              <option Value="{{$provience->id}}" {{(isset($badge) && $badge->Badge_Provience_ID == $provience->id ? 'selected' : '')}}>{{$provience->Provience_Name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-3 div1">
            <input type="number" class="form-control" name="Badge_Provience_Count" placeholder="Times" value="{{(isset($badge)? $badge->Badge_Provience_Count : '')}}">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-4 div2">Badge Checkpoint :</label>
          <div class="col-sm-4 div2">
            <select class="form-control" name="Badge_Category_Checkpoint">
              @foreach($categoryCheckpoint as $category)
              <option Value="{{$category->id}}" {{(isset($badge) && $badge->Badge_Category_Checkpoint == $category->id ? 'selected' : '')}}>{{$category->Category_Checkpoint_Name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-3 div1">
            <input type="number" class="form-control" name="Badge_Category_Checkpoint_Count" placeholder="Times" value="{{(isset($badge)? $badge->Badge_Category_Checkpoint_Count : '')}}">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-4 div2">Badge Mission :</label>
          <div class="col-sm-4 div2">
            <select class="form-control" name="Badge_Category_Mission">
              @foreach($categoryMission as $category)
              <option Value="{{$category->id}}" {{(isset($badge) && ($badge->Badge_Category_Mission == $category->id) ? 'selected' : '')}}>{{$category->Category_Mission_Name}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-sm-3 div1">
            <input type="number" class="form-control" name="Badge_Category_Mission_Count" placeholder="Times" value="{{(isset($badge)? $badge->Badge_Category_Mission_Count : '')}}">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-4 div2">Badge Region :</label>
          <div class="col-sm-4 div2">
            <select class="form-control" name="Badge_Region_ID">
              @foreach($regions as $region)
              <option Value="{{$region->id}}" {{(isset($badge) && $badge->Badge_Region_ID == $region->id ? 'selected' : '')}}>{{$region->Region_Name}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-sm-3 div1">
            <input type="number" class="form-control" name="Badge_Region_Count" placeholder="Times" value="{{(isset($badge)? $badge->Badge_Region_Count : '')}}">
          </div>
        </div>

  {!! Form::close() !!}
      </div>
    </div>
  <div class="breadcrumb-save">
    @if(isset($badge))
    <a href="/Badges"><button type="button" class="btn btn-warning divsave">Cancel</button></a>
    <button type="submit" class="btn btn-success">Update Badge</button>
    @else
    <button type="reset" class="btn btn-warning divsave">Reset</button>
    <button type="submit" class="btn btn-success">New Badge</button>
    @endif
  </div>
  </div>
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
        @if(isset($badge))
        content: "<img src='{{URL::to('/storage/badge'.$badge->Badge_Photo)}}'' width=100 height=100 />",
        @else
        content: "There's no image",
        @endif
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
  @if(isset($badge))
    $(document).ready(function () {
      $('.image-preview').hover(
        function () {
          $('.image-preview').popover('show');
        },
        function () {
          $('.image-preview').popover('hide');
        }
        );
    });
  @endif
  </script>
  @endsection
