@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

      <div class="container-fluid" 
      style="height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;">
          <div >

            <img src="{{ asset('img/icon.png')}}" class="img-fluid" width="250px" alt="{{ config('app.name') }} Logo"/>
            <br />
            <br />
            <br />
            Welcome to Journey Mission Back Office
        </div>
      </div>
@endsection
@section('chart')
    <script src="{{ asset('js/chart.js/Chart.min.js') }}"></script>
@endsection

