@extends('layouts.login')

@section('content')
<div id="fb-root"></div>

<div class="card card-register mx-auto mt-5">
        <div class="card-header">
            {{ config('app.name') }} - BackOffice
        </div>
        <div class="card-body text-center">

            <img src="{{ asset('img/icon.png')}}" class="img-fluid" width="250px" alt="{{ config('app.name') }} Logo"/>
            <br />
            <br />
            <br />
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                <div class="form-group">
                    
                        <a href="redirect">
                            <button type="button" onclick="location.href = 'redirect';" class="btn btn-primary">
                            Login With Facebook
                            </button>
                        </a>
                </div>
            </form>
        </div>
      </div>

@endsection
