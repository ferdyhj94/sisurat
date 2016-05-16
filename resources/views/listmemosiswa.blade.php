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
                  <a class="btn btn-primary" href="{{url('tbhmemo')}} "><i class="glyphicon glyphicon-plus">Memo baru</i></a>
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
                      <td>{{$data->nama_pengirim}}</td>
                      <td><?php echo substr($data->isi_memo,0,50); ?></td>
                      <td>{{$data->status}} </td>
                      <td><a href="{{url('detail')}}" class="btn btn-primary">Detail</a>
                        <a href="delmemosiswa/{{$data->id_memo}} " class="btn btn-danger">Hapus</a>
                   <!--       <button type="button" data-memo-id="{{ $data->id_memo }}" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#confirmDelete"><i class="fa fa-trash"></i>Hapus</button> -->
                        </td>
                    </tr>
                    @endforeach
                   </table>
                   
                     
                </div>
                {{$memo->render()}}

              <!--   <div class="modal-body">
    <p>Are you sure you want to delete <span id="pName"></span>?</p>
</div> -->
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
