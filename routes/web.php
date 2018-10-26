<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Get Blade View
Route::get('content', function(){
	return view('pages.content');
});

//MODEL
Route::get('addhocsinh', function(){
	//$data = App\pakModel::find(11)->delete();
	// $user->name = "anh";
	// $user->age = "24";
	// $user -> save();
	// echo "Da them du lieu";
	$data = New App\hocsinh();
	$data->name = str_random(10);
	$data->age = rand(20,30);
	$data->id_giaovien = rand(1,10);
	$data->save();
	echo "Đã thêm data";
});
Route::get('add-data-hoc-sinh/{num}', 'pakController@addDataHocSinh');
//ADD user
Route::get('add-user/{name}/{pass}/{admin}', 'pakController@addUser');
Route::get('lien-ket-hoc-sinh', function(){
	$data = App\hocsinh::find(2)->idGiaovien;
	echo $data;
});

// DANG NHAP NGUOI DUNG  +++ Auth  +++
Route::get('dangnhap', function(){
	if(!Auth::check()){
		return view('admin.login');
	}
	else echo "Ban da dang nhap roi ma oi";
});
Route::post('login','User@handlingLogin')->name('login');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'], function(){
	Route::get('/home','Home@getData')->name('admin-home');
	Route::get('dangxuat', 'User@logout')->name('logout');

	//ROUTE SAN PHAM
	Route::get('san-pham','Sanpham@getData')->name('san-pham');
	Route::post('add-sp','Sanpham@addData')->name('add-sp');
	Route::post('edit-sp','Sanpham@editData')->name('edit-sp');

	// NHAP VAO
	Route::get('nhap-vao', 'Nhapvao@getData')->name('nhap-vao');
	Route::post('add-nhap-vao','Nhapvao@addData')->name('add-nhap-vao');
	Route::post('edit-nhap-vao','Nhapvao@editData')->name('edit-nhap-vao');
	Route::post('del-nhap-vao', 'Nhapvao@delData')->name('del-nhap-vao');


	// XUAT RA
	Route::get('xuat-ra','Xuatra@getData')->name('xuat-ra');
   Route::post('add-xuat-ra','Xuatra@addData')->name('add-xuat-ra');
   Route::post('edit-xuat-ra','Xuatra@editData')->name('edit-xuat-ra');
   Route::post('del-xuat-ra', 'Xuatra@delData')->name('del-xuat-ra');


	// ROUTE DON VI
	Route::get('don-vi','Donvi@getData')->name('don-vi');
	Route::post('add-dv','Donvi@addData')->name('add-dv');

	// XÓA NỢ
	Route::post('delete-no', 'Ajax@deleteNo')->name('delete-no');



	Route::group(['prefix'=>'ajax'], function(){
		Route::post('get-san-pham', 'Ajax@getSanpham');
		Route::post('get-gia-nhap-vao', 'Ajax@getGianhapvao')->name('get-gia-nhap-vao');
      	Route::post('get-gia-xuat-ra', 'Ajax@getGiaxuatra')->name('get-gia-xuat-ra');
      	Route::post('get-thong-ke', 'Ajax@getThongke')->name('get-thong-ke');
	});

	Route::get('test','Ajax@test');
});

Route::get('test', 'Ajax@test');
