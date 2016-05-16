@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Guru</div>
                  @if(Session::has('message'))
                    <div class="alert alert-danger">
                        <strong>{{ Session::get('message')}}</strong>
                       </div> @endif
                <div class="panel-body">
                  <a class="btn btn-primary" href="{{url('tbhmemo')}} "><i class="glyphicon glyphicon-plus">Memo baru</i></a>
                  @if($surat==null)
                  <div class="table-responsive">
                   <table class="table table-bordered">
                    <tr>
                      <th>No.</th>
                      <th>Surat</th>
                      <th>Tanggal Buat</th>
                      <th>Aksi</th>
                    </tr>
                    <?php $no=1;
                  ?>
                  @foreach($surat as $data)
                    <tr>
                      <td>Tidak ada data</td>
                    </tr>
                   </table>
                   @endforeach
                </div>
                @else
                <a class="btn btn-primary" href="{{url('tbhsurat')}} "><i class="glyphicon glyphicon-plus">Surat baru</i></a>
                <div class="table-responsive">
                   <table class="table table-bordered">
                    <tr>
                      <th>No.</th>
                      <th>Nomor Memo</th>
                      <th>Nomor Surat</th>
                      <th>Judul Surat</th>
                      <th>File</th>
                      <th>Aksi</th>
                    </tr>
                    <?php $no=1;
                  ?>
                  @foreach($surat as $data)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$data->no_memo}}</td>
                      <td>{{$data->no_surat}}</td>
                      <td>{{$data->judul_surat}}</td>
                      <td>{{$data->surat}}</td>
                      <td><a href="{{ asset('/file/'  . $data->surat) }}" target="_blank" ><button class="btn btn-default"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"> Download file</span></button></a> </td>
                    </tr>
                    @endforeach
                     
                     @endif   
                   </table>
                      

                </div>
{{$surat->render()}}  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
