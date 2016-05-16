@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                @if(Session::has('message'))
                <div class="alert alert-danger">
                        <strong>{{ Session::get('message')}}</strong>
                        @endif</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/reg') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('nis') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">NIS</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nis">

                                @if ($errors->has('nis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama">

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kelas') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Kelas</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kelas" >

                                @if ($errors->has('kelas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kelas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                               <select class="form-control" id="hak_akses" name="hak_akses">
                                    <option value="User">User </option>  
                                    <option value="Admin">Admin </option>
                              </select>

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="alamat">

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                               <div class="form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">No Telp</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="no_telp">

                                @if ($errors->has('no_telp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_telp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
