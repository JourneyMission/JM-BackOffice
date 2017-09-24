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
@if(isset($mission))

{!! Form::open(['method' => 'PATCH', 'action' => ['MissionsController@update','id'=>$mission->id],'class'=>'form-horizontal','files'=>true ]) !!}

@else

{!! Form::open(['method' => 'POST', 'action' => ['MissionsController@store'],'class'=>'form-horizontal','files'=>true ]) !!}

@endif
<div class="container-fluid">

  <!-- Breadcrumbs -->
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home">Dashboard</a>&nbsp;
          </li>
          <li class="breadcrumb-item">
            <a href="/Missions">Mission Management</a>&nbsp;
          </li>
          <li class="breadcrumb-item">New Mission</li>
        </ol>
  <div class="row">
    <div class="col-sm-6">
      <form class="form-horizontal">
        <ol class="breadcrumb-info">
          <li class="breadcrumb-text">
            Mission Infomation
          </li>

        </ol>
        <div class="form-group">
          <label class="control-label col-sm-6 div1">Mission Name :</label>
          <div class="col-sm-6 div2">
            <input type="text" class="form-control" name="Mission_Name" placeholder="Enter Mission name" required value="{{(isset($mission)? $mission->Mission_Name : '')}}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-6 div1">Mission Description :</label>
          <div class="col-sm-6 div2">
            <textarea class="form-control" name="Mission_Description" placeholder="Enter Mission description" required> {{(isset($mission)? $mission->Mission_Description : '')}}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-6 div1">Mission Icon :</label>
          <div class="col-sm-6 input-group icon-preview">
            @if(isset($mission))
                <input type="text" class="form-control icon-preview-filename" name="icon-preview" disabled="disabled" value="{{$mission->Mission_Icon}}" />
                @else
                <input type="text" class="form-control icon-preview-filename" name="icon-preview" disabled="disabled">
                @endif
            <!-- don't give a name === doesn't send on POST/GET -->
            <span class="input-group-btn">
              <!-- icon-preview-clear button -->
              <button type="button" class="btn btn-default icon-preview-clear" style="display:none;">
                <span class="glyphicon glyphicon-remove"></span> Clear
              </button>
              <!-- icon-preview-input -->
              <div class="btn btn-default icon-preview-input">
                <span class="glyphicon glyphicon-folder-open"></span>
                <span class="icon-preview-input-title">Browse</span>
                <input type="file" accept="image/png, image/jpeg, image/gif" name="Mission_Icon" value="{{(isset($mission)? $mission->Mission_Icon : '')}}" />
                <!-- rename it -->
              </div>
            </span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-6 div1">Mission Picture :</label>
          <div class="col-sm-6 input-group image-preview">
            @if(isset($mission))
                <input type="text" class="form-control image-preview-filename" name="image-preview" disabled="disabled" value="{{$mission->Mission_Photo}}" />
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
                <input type="file" accept="image/png, image/jpeg, image/gif" name="Mission_Photo" value="{{(isset($mission)? $mission->Mission_Photo : '')}}" />
                <!-- rename it -->
              </div>
            </span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-6 div1">Mission Category :</label>
          <div class="col-sm-6 div2">
            <select class="form-control" name="Category_Mission_ID">
              @foreach($categoryMission as $category)
              <option Value="{{$category->id}}" {{(isset($mission) && $mission->Category_Mission_ID == $category->id ? 'selected' : '')}}>{{$category->Category_Mission_Name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-6 div1">Mission Score :</label>
          <div class="col-sm-3 div2">
            <input type="number" class="form-control" name="Mission_Score" placeholder="Score" required value="{{(isset($mission)? $mission->Mission_Score : '')}}">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-6 div1">Mission Status :</label>
          <div class="col-sm-3 div2">
            <input type="checkbox" name="Mission_Status" data-toggle="toggle" data-on="Enable" data-off="Disable" data-onstyle="success" data-offstyle="danger" {{(isset($mission) && $mission->Mission_Status == 1 ? 'checked' : '')}}>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb-info">
          <li class="breadcrumb-text">
            Mission Location
          </li>
        </ol>
        <div class="form-group">
          <label class="control-label col-sm-4 div2">Mission Region :</label>
          <div class="col-sm-6 div2">
            <select class="form-control" name="Region_ID">
              @foreach($regions as $region)
              <option Value="{{$region->id}}" {{(isset($mission) && $mission->Region_ID == $region->id ? 'selected' : '')}}>{{$region->Region_Name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-12">Mission Location :</label>
          <div class="col-sm-5 div2">
            <!--<input type="text" class="form-control" name="Mission_Source" placeholder="Enter Source" required>-->
            <select class="form-control" name="Mission_Source">
              @foreach($proviences as $provience)
              <option Value="{{$provience->id}}" {{(isset($mission) && $mission->Mission_Source == $provience->id ? 'selected' : '')}}>{{$provience->Provience_Name}}</option>
              @endforeach
            </select>
          </div>
          <label class="control-label col-sm-1 div3">to</label>
          <div class="col-sm-5 div2">
            <!--<input type="text" class="form-control" name="Mission_Destination" placeholder="Enter Desination" required>-->
            <select class="form-control" name="Mission_Destination">
              @foreach($proviences as $provience)
              <option Value="{{$provience->id}}" {{(isset($mission) && $mission->Mission_Destination == $provience->id ? 'selected' : '')}}>{{$provience->Provience_Name}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <br><br>
        <ol class="breadcrumb-info">
          <li class="breadcrumb-text">
            Checkpoint of Mission
          </li>

        </ol>
        <div class="form-group">
          <div class="control-group" id="fields">
            <label class="control-label col-sm-12" for="MissionCheckpointOrder">Add Checkpoint : </label>
            <input type="hidden" name="CheckpointCount" id="count" value="1" />
            <div class="controls col-sm-12">
              <div class="entry input-group col-xs-3" >
                <input class="form-control" type="text" placeholder="Checkpoint Name" name="MissionCheckpointOrder" id="field1"/>
                <span class="input-group-btn">
                  <button class="add-more btn btn-success btn-add" type="button" id="addme"><span class="fa fa-plus"></span></button>
                </span>
              </div>
            </div>
          </div>
        </div>

  {!! Form::close() !!}
    </div>
  </div>
  <div class="breadcrumb-save">
    @if(isset($mission))
    <a href="/Checkpoints"><button type="button" class="btn btn-warning divsave">Cancel</button></a>
    <button type="submit" class="btn btn-success">Update Mission</button>
    @else
    <button type="reset" class="btn btn-warning divsave">Reset</button>
    <button type="submit" class="btn btn-success">New Mission</button>
    @endif
  </div>
</div>
<!-- /.container-fluid -->

</div>
@endsection
@section('jsfooter')
<script>

  $(document).on('click', '#close-preview', function () {
    $('.icon-preview').popover('hide');
      // Hover befor close the preview
      $('.icon-preview').hover(
        function () {
          $('.icon-preview').popover('show');
        },
        function () {
          $('.icon-preview').popover('hide');
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
      $('.icon-preview').popover({
        trigger: 'manual',
        html: true,
        title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
        @if(isset($mission))
        content: "<img src='{{URL::to('/storage/mission/icon/'.$mission->Mission_Icon)}}'' width=250 height=200 />",
        @else
        content: "There's no image",
        @endif
        placement: 'bottom'
      });
      // Clear event
      $('.icon-preview-clear').click(function () {
        $('.icon-preview').attr("data-content", "").popover('hide');
        $('.icon-preview-filename').val("");
        $('.icon-preview-clear').hide();
        $('.icon-preview-input input:file').val("");
        $(".icon-preview-input-title").text("Browse");
      });
      // Create the preview image
      $(".icon-preview-input input:file").change(function () {
        var img = $('<img/>', {
          id: 'dynamic',
          width: 250,
          height: 200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
          $(".icon-preview-input-title").text("Change");
          $(".icon-preview-clear").show();
          $(".icon-preview-filename").val(file.name);
          img.attr('src', e.target.result);
          $(".icon-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
      });
    });
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
        @if(isset($mission))
        content: "<img src='{{URL::to('/storage/mission/photo/'.$mission->Mission_Photo)}}'' width=250 height=200 />",
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
  var options = {
    url: "{{url('/api/Checkpoints')}}",
    getValue: "Checkpoint_Name",
    list: {
      match: {
        enabled: true
      }
    },
  };
  $(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
      if (next > 9) {
        alert("Checkpoint must be less than 10");
      }else{
            e.preventDefault();
      var addto = "#field" + next;
      var addRemove = "#field" + (next);
      next = next + 1;
      var newIn = '<input class="form-control" type="text" placeholder="Checkpoint Name" name="MissionCheckpointOrder' + next + '" autocomplete="off" id="field' + next + '" />';
      var newInput = $(newIn);
      var removeBtn = '<span class="input-group-btn"><button id="remove' + (next - 1) + '" class="btn btn-danger btn-add remove-me" type="button"><span class="fa fa-minus"></span></button></span>';
      var removeButton = $(removeBtn);
      $(addto).after(newInput);
      $(addRemove).after(removeButton);
      $("#field" + next).attr('data-source',$(addto).attr('data-source'));
      $("#count").val(next);  
      $('.remove-me').click(function(e){
        e.preventDefault();
        var fieldNum = this.id.charAt(this.id.length-1);
        var fieldID = "#field" + fieldNum;
        $(this).remove();
        $(fieldID).remove();
      });
      $("#field" + next).easyAutocomplete(options);
      }
    });
  
  $("#field1").easyAutocomplete(options);
  @if(isset($mission))
      $('.icon-preview').hover(
        function () {
          $('.icon-preview').popover('show');
        },
        function () {
          $('.icon-preview').popover('hide');
        }
        );
      $('.image-preview').hover(
        function () {
          $('.image-preview').popover('show');
        },
        function () {
          $('.image-preview').popover('hide');
        }
        );
    @if(isset($mission->Checkpoint))
      var flag = 1;
      @foreach($mission->Checkpoint as $checkpoint)
       $(".add-more").click(); 
       $("#field"+flag).val("{{$checkpoint->Checkpoint->Checkpoint_Name}}");
       flag++;
      @endforeach
    @endif
  @endif

    });
</script>
@endsection
