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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/insuratps') }}" file="true"  enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('no_memo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">No Memo</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="no_memo" value="{{$memo->no_memo}}">

                                @if ($errors->has('no_memo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_memo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('no_surat') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nomor Surat</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="no_surat">

                                @if ($errors->has('no_surat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_surat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('judul_surat') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Judul Surat</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="judul_surat">

                                @if ($errors->has('judul_surat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul_surat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      <div class="form-group{{ $errors->has('surat') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Surat</label>

                            <div class="col-md-6">
                                    <input type="file" name="surat" id="surat">

                                @if ($errors->has('surat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surat') }}</strong>
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
