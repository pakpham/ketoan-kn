<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;

class Sanpham extends Controller
{
    public function getData(){
    	$san_pham = App\Sanpham::get();
    	$san_pham = $san_pham->reverse(); // Reverse data of array
    
    	$don_vi = App\Donvi::get();
    	return view ('admin.table-sp',['san_pham'=>$san_pham,'don_vi'=>$don_vi]);	
    }

    
    public function addData(Request $request){
    	$data = New App\Sanpham;
    	$data->ten = $request->ten;
    	$data->gia_nhap_vao = $request->gia_nhap_vao;
    	$data->gia_xuat_ra  = $request->gia_xuat_ra;
    	$data->id_don_vi = $request->id_don_vi;
        $data->ghi_chu = $request->ghi_chu;
        $data->id_user = Auth::user()->id;
    	$data -> save();
        $result = "Đã nhập thành công sản phẩm: $data->ten" ;

        $don_vi = App\Donvi::get();
        $san_pham = App\Sanpham::get()->reverse();
    	return view('admin.table-sp',['result'=>$result,'san_pham'=>$san_pham,'don_vi'=>$don_vi]);
    }

    public function editData(Request $request){
        //var_dump($request->toArray());
        $san_pham = App\Sanpham::where('id',$request->id)->update(['gia_nhap_vao'=>$request->gia_nhap_vao, 'gia_xuat_ra'=>$request->gia_xuat_ra]);

        $ten_sp = App\Sanpham::find($request->id)->ten;
        $result = "Cập nhật thành công sản phẩm: $ten_sp"  ;

        $don_vi = App\Donvi::get();
        $san_pham = App\Sanpham::get()->reverse();
        return view('admin.table-sp',['result'=>$result,'san_pham'=>$san_pham,'don_vi'=>$don_vi]);
    }
}
