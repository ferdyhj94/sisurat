@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Memo</div>
                @if(Session::has('message'))
                <div class="alert alert-danger">
                        <strong>{{ Session::get('message')}}</strong>
                        @endif</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/inmemo') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama" value="{{Auth::user()->username}}">

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('isi_memo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Isi Memo</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="isi_memo"></textarea>

                                @if ($errors->has('isi_memo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('isi_memo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Submit
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
