<?php

namespace App\Http\Controllers;

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


class LoginController extends Controller
{
        public function loginps(Admin $adminval)
    {
    	if(Auth::attempt(['username'=>Input::get('username'),'password'=>Input::get('password')]))
    	{
    		if(Auth::user()->hak_akses == 'admin')
    		{
    			return Redirect::to('home');
    			
    		}elseif(Auth::user()->hak_akses == 'wali_kls'||'kepsek')
    		{
    			return Redirect::to('home');
    		}
    		elseif(Auth::user()->hak_akses == 'siswa')
    		{
    			return Redirect::to('home');
    			
    		}
    	
    }else
    {
    	return Redirect::to('login')->with('message','Username/password salah coba lagi!!');
    }
}

 public function registerps()
    {
        $data=['nis'=> Input::get('nis'),
        'nama'=> Input::get('nama'),
        'kelas'=> Input::get('kelas'),
        'status'=>Input::get('status'),
        'alamat'=> Input::get('alamat'),
        'no_telp'=> Input::get('no_telp')
        ];
        DB::table('siswa')->insert($data);
        return Redirect::to('/login')->with('message','berhasil mendaftar');
    }

    public function registeruser()
    {
        $data=['username'=> Input::get('username'),
        'password'=> bcrypt(Input::get('password')),
        'hak_akses'=> Input::get('hak_akses')
       
        ];
        DB::table('user')->insert($data);
        return Redirect::to('/login')->with('message','berhasil mendaftar');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('login')->with('message','Berhasil logout');
    }

    
}
