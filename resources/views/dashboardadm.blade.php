@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                  @if(Session::has('message'))
                    <div class="alert alert-danger">
                        <strong>{{ Session::get('message')}}</strong>
                       </div> @endif
                <div class="panel-body">
                    You are logged in {{Auth::user()->username}} !<br>
                    <img src="{{$user->foto}}" alt="..." class="img-circle">
                    <br>
                   <label>Username</label>
                   <input type="text" class="form-control" value="{{$user->username}} " disabled>
                   <br>
                   <label>Hak Akses</label>
                   <input type="text" class="form-control" value="{{$user->hak_akses}} " disabled>
                   <br>
                   <label>Last Login</label>
                   <input type="text" class="form-control" value="{{$user->updated_at}} " disabled>
                   <br>
                <a href="{{url('editprofiladm')}}" class="btn btn-primary">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
