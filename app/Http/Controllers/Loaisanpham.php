<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class Loaisanpham extends Controller
{
    //
    public function getData(){
    	$data = App\LoaiSanPham::get();
 		//echo $data[0]->ten;   
 		return view ('admin.table-lsp',['data'=>$data]);	
    }

    public function addData(Request $request){
    	//echo $request->ten;
    	//echo $request->ghi_chu;
    	$data = New App\Loaisanpham;

    	$data->ten = $request->ten;
    	$data->ghi_chu = $request->ghi_chu;
    	$data -> save();
    	echo "them du lieu thanh cong";
    }

}
