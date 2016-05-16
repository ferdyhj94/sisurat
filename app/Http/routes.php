<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	if(Auth::user()){
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
    	}    	else{
    return Redirect::to('login');
}
});

Route::get('home', 'HomeController@index');
Route::post('login','LoginController@loginps');
Route::post('reg','LoginController@registerps');
Route::post('reguser','LoginController@registeruser');

Route::get('memo',function(){
	if(Auth::user()){
	if(Auth::user()->hak_akses == 'admin')
    		{
    			return Redirect::to('memo');
    			
    		}
    		elseif(Auth::user()->hak_akses == 'siswa')
    		{
    			return Redirect::to('memo');
    			
    		}
    	}
    	else{
    		return Redirect::to('login');
       	}
});
Route::get('login',function(){
	return view('auth.login');
});
Route::get('regsiswa',function(){
if(Auth::user()){
	if(Auth::user()->hak_akses == 'admin')
    		{
    			return Redirect::to('regsiswa');
    			
    		}elseif(Auth::user()->hak_akses == 'wali_kls'||'kepsek')
    		{
    			return Redirect::to('regsiswa');
    		}
    	}    
    		else{
    return Redirect::to('login');
}
});


Route::get('dashboardadm',function(){
return view('dashboardadm');
});

Route::get('dashboardsiswa',function(){
return view('dashboardsiswa');
});

Route::get('dashboardguru',function(){
return view('dashboardguru');
});
Route::post('inmemo','ManagedData@inmemo');
Route::get('editmemo/{id}','ManagedData@editmemo');
Route::post('editmemops','ManagedData@editmemops');
Route::get('delmemo/{id}','ManagedData@delmemo');
Route::get('delmemosiswa/{id}','ManagedData@delmemosiswa');

Route::get('tbhsurat/{id}','ManagedData@tbhsurat');
Route::post('insuratps','ManagedData@insuratps');
Route::get('editsurat/{id}','ManagedData@editsurat');
Route::post('editsurat','ManagedData@editsurat');
Route::get('delsurat/{id}','ManagedData@delsurat');


Route::get('listguru','ManagedData@listguru');
Route::get('listsiswa','ManagedData@listsiswa');
Route::get('listuser','ManagedData@listuser');
Route::get('listsurat','ManagedData@listsurat');
Route::get('listmemo','ManagedData@listmemo');
Route::get('listmemosiswa','ManagedData@listmemosiswa');
Route::get('reguser',function(){

	return view('reguser');

});

Route::get('logout','LoginController@logout');

Route::get('tbhmemo',function(){
    return view('tbhmemo');
});




