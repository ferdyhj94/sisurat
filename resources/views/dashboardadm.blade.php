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
                    <a href="{{url('listguru')}}" class="btn btn-default">Daftar Guru</a><br>
                    <a href="{{url('listsiswa')}}" class="btn btn-default">Daftar Siswa</a><br>
                    <a href="{{url('listadm')}}" class="btn btn-default">Daftar Admin</a><br>
                    <a href="{{url('listsurat')}}" class="btn btn-default">Daftar Surat</a><br>
                    <a href="{{url('listmemo')}}" class="btn btn-default">Daftar Memo</a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
