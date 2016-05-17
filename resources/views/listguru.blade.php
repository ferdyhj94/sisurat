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
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Wali Kelas</th>
                      <th>Status</th>
                      <th>No Telp</th>
                      <th>Aksi</th>
                    </tr>
                    <?php $no=1;
                  ?>
                  @foreach($guru as $data)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$data->nip}}</td>
                      <td>{{$data->nama}} </td>
                      <td>{{$data->alamat}} </td>
                      <td>{{$data->wali_kelas}} </td>
                      <td>{{$data->status}} </td>
                      <td>{{$data->no_telp}} </td>
                    </tr>
                   </table>
                   @endforeach
                     {{$guru->render()}}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
