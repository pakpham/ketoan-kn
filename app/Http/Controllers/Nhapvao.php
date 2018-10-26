<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;

class Nhapvao extends Controller
{
    public function returnView(){
        $from = date('2018-10-14');
        $to = date('2018-10-18'.' 23:59:59', time());

        $san_pham = App\Sanpham::get();
        $nhap_vao = App\Nhapvao::orderBy('id')->get();
        $nhap_vao = $nhap_vao ->reverse();
        //return $to;
        return view ('admin.nhap-vao',['nhap_vao'=>$nhap_vao, 'san_pham'=>$san_pham]);
    }

    public function returnView1($result){
        $san_pham = App\Sanpham::get();
        $nhap_vao = App\Nhapvao::orderBy('id')->get()->reverse();
        return view ('admin.nhap-vao',['nhap_vao'=>$nhap_vao, 'san_pham'=>$san_pham, 'result'=>$result]);  
    }

    public function getData(){  
        return $this->returnView();
    }

    public function addData(Request $request){
        $ten = App\Sanpham::find($request->id_san_pham)->ten;
    	$nhap_vao = New App\Nhapvao;
        $nhap_vao->ten = $ten;
        $nhap_vao->ghi_chu =  $request->ghi_chu;
        $nhap_vao->so_luong = $request->so_luong;
        $nhap_vao->gia = $request->gia_nhap_vao;
        $nhap_vao->id_san_pham = $request->id_san_pham;
        $nhap_vao->id_user = Auth::user()->id;
        $nhap_vao->thanh_toan = $request->thanh_toan;
        $nhap_vao->tra_truoc = $request->tra_truoc;
        // var_dump($nhap_vao->toArray());
        $temp = $nhap_vao->save();  
        $don_vi = App\Sanpham::find($request->id_san_pham)->donvi->ten;
        if($temp){
          $result = "Đã thêm mới: <b>Mã số: </b><b style='color: blue'>XR/$nhap_vao->id </b> - <b>Tên: </b><b style='color: blue'>$ten </b> - <b>Số lượng: </b><b style='color: blue'>$nhap_vao->so_luong </b>($don_vi)";
          return $this->returnView1($result);
        }
     
    }

    public function editData(Request $request){
        $nhap_vao = App\Nhapvao::where('id',$request->edit_id)->update(['thanh_toan'=>$request->edit_thanh_toan, 'tra_truoc'=>$request->edit_tra_truoc, 'ghi_chu'=>$request->edit_ghi_chu]);
        
        $ten = App\Nhapvao::find($request->edit_id)->ten;
        $result = "Đã cập nhật: <b>Mã số: </b><b style='color: blue'>XR/$request->edit_id </b> - <b>Tên: </b><b style='color: blue'>$ten </b>";
        return $this->returnView1($result);
    }

    public function delData(Request $request){
        
        $ten = App\Nhapvao::find($request->del_id)->ten;
        $del = App\Nhapvao::find($request->del_id)->delete();
        if($del == 1){
            $result = "<b style='color:red'>Đã xóa khỏi danh sách:</b> <b>Mã số: </b><b style='color: blue'>XR/$request->del_id </b> - <b>Tên: </b><b style='color: blue'>$ten </b>";
            return $this->returnView1($result);
        }
    }
}
