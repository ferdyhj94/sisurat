@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Memo</div>
                  @if(Session::has('message'))
                    <div class="alert alert-danger">
                        <strong>{{ Session::get('message')}}</strong>
                       </div> @endif
                <div class="panel-body">
                  <div class="table-responsive">
                   <table class="table table-bordered">
                    <tr>
                      <th>No.</th>
                      <th>Nomor Memo</th>
                      <th>Nama Pengirim</th>
                      <th>Isi Memo</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                    <?php $no=1;
                  ?>
                  @foreach($memo as $data)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$data->no_memo}}</td>
                      <td>{{$data->nama}}</td>
                      <td><?php echo substr($data->isi_memo,0,50); ?></td>
                      <td>{{$data->status}} </td>
                      <td><a href="{{url('detail')}}" class="btn btn-primary">Detail</a>
                        <a href="editmemo/{{$data->id_memo}} " class="btn btn-warning">Edit</a>
                        <a href="delmemo/{{$data->id_memo}}" class="btn btn-danger">Hapus</a>
                        
                        <a href="tbhsurat/{{$data->id_memo}}" class="btn btn-primary">Tambah Surat</a>
                        
                      </td>
                      
                    </tr>
                    @endforeach
                   </table>
                   
                     
                </div>
                {{$memo->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
