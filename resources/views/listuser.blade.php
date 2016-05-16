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
                  <div class="table-responsive">
                   <table class="table table-bordered">
                    <tr>
                      <th>No.</th>
                      <th>Username</th>
                      <th>Hak Akses</th>
                      <th>Terakhir Login</th>
                      <th>Aksi</th>
                    </tr>
                    <?php $no=1;
                  ?>
                  @foreach($siswa as $data)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$data->nis}}</td>
                      <td>{{$data->nama}} </td>
                      <td>{{$data->kelas}} </td>
                      <td>{{$data->status}} </td>
                      <td>{{$data->alamat}} </td>
                      <td>{{$data->no_telp}} </td>
                    </tr>
                   </table>
                   @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
