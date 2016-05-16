<?php

namespace App\Http\Controllers;
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\Admin;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\DatabaseManager;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Response;
use DB;
use App\User;
use Input;
use Redirect;
use Crypt;
use Auth;
use View;
use Activity;

class ManagedData extends Controller
{
    

    public function listguru(){
    	$data = DB::table('wali_kelas')->paginate(10);

    	return view('listguru')->with('guru',$data);
    }

      public function listsiswa(){
    	$data = DB::table('siswa')->paginate(25);

    	return view('listsiswa')->with('siswa',$data);
    }

      public function listadmin(){
    	$data = DB::table('admin')->paginate(10);

    	return view('listadm')->with('admin',$data);
    }

      public function listsurat(){
    	$data = DB::table('surat')->paginate(50);

    	return view('listsurat')->with('surat',$data);
    }

    public function listmemo(){


        $data = DB::table('memo')
        ->join('siswa','nama_pengirim','=','nis')
        ->select('memo.id_memo','memo.no_memo','siswa.nama','memo.isi_memo','memo.status')
        ->paginate(50);
        //$isCetak = Auth::user()->hak_akses!='wali_kls'||'kepsek';
        return view('listmemo')->with('memo',$data);

    }

    
    public function listmemosiswa(){
     $userdata=Auth::user()->username;    
        $data = DB::table('memo')
                ->join('user','nama_pengirim','=','username')
                ->select('*')
                ->where('username','=',$userdata)
                ->paginate(50);

        return view('listmemosiswa')->with('memo',$data);
    }

    public function editmemo($id)
    {
        $data = DB::table('memo')->where('id_memo','=',$id)->first();
        return view('editmemo')->with('memo',$data);
    }

    public function editmemops()
    {
        
        $data = array(
            'status'=>Input::get('status'),
            );

        DB::table('memo')->where('id_memo','=',Input::get('id_memo'))->update($data);
        return Redirect::to('listmemo')->with('message','Berhasil mengubah status memo');
    }

    public function inmemo()
    {       
        
        $data=array(
            'no_memo'=>rand(1111,99999),
            'nama_pengirim'=>Input::get('nama'),
            'isi_memo'=>Input::get('isi_memo'),
            'status'=>'pending'
            );

        DB::table('memo')->insert($data);
        return Redirect::to('listmemosiswa')->with('message','Berhasil memambahkan memo, silahkan tunggu konfirmasi dari Kepala Sekolah/Wali Murid');
    }

        public function tbhsurat($id)
    {
        $data = DB::table('memo')->where('id_memo','=',$id)->first();
        return view('tbhsurat')->with('memo',$data);
    }


        public function insuratps()
    {   
        $surat = Input::file('surat');
        // $filename = date('Y-m-d').".".$surat->getClientOriginalExtension();
        // $fileExtension = $surat->getClientORiginalName();
        // $surat->move(public_path().'/file/'.$fileExtension);
        $destinationPath = public_path().'/file/';
       // $fileExtension = $surat->getClientOriginalExtension();
        $filename = $surat->getClientOriginalName();
        $path = $surat->getRealPath();
        $surat->move($destinationPath,$filename);
        
        $data=array(
            'no_memo'=>Input::get('no_memo'),
            'no_surat'=>Input::get('no_surat'),
            'judul_surat'=>Input::get('judul_surat'),
            'surat'=>$filename,
            'url'=>$surat
            );          
            DB::table('surat')->insert($data);
        return redirect::to('listsurat')->with('message','berhasil menambahkan surat');
        
    }

    public function delmemo($id)
    {
        DB::table('memo')->where('id_memo','=',$id)->delete();

        return Redirect::to('listmemo')->with('message','Berhasil menghapus memo!');
    }

    public function delsurat($id)
    {
        DB::table('surat')->where('id_surat','=',$id)->delete();

        return Redirect::to('listsurat')->with('message','Berhasil menghapus surat!');
    }

    public function delmemosiswa($id)
    {
        DB::table('memo')->where('id_memo','=',$id)->delete();

        return Redirect::to('listmemosiswa')->with('message','Berhasil menghapus memo!');
    }




}
