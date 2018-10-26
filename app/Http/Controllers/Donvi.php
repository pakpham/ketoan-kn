<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App;

class Donvi extends Controller
{
    public function getData(){
    	$don_vi = App\Donvi::get();
    	$don_vi = $don_vi->reverse();
    	return view('admin.table-dv',['don_vi'=>$don_vi]);
    }

    public function addData(Request $req){
    	$id_user = Auth::user()->id;
    	$don_vi = New App\Donvi;
    	$don_vi->ten = $req->don_vi;
    	$don_vi->id_user = $id_user;
    	$don_vi->save();
    	$result = "Đã thêm thành công đơn vị: $req->don_vi";
    	
    	//get Don vi
    	$don_vi = App\Donvi::get();
    	$don_vi = $don_vi->reverse();
    	return view('admin.table-dv',['don_vi'=>$don_vi,'result'=>$result]);
    }
}
