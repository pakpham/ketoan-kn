<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;

class Xuatra extends Controller
{
    public function returnView(){
        $san_pham = App\Sanpham::get();
        $xuat_ra = App\Xuatra::orderBy('id')->get();
        $xuat_ra = $xuat_ra ->reverse();
        return view ('admin.xuat-ra',['xuat_ra'=>$xuat_ra, 'san_pham'=>$san_pham]);
    }

    public function returnView1($result){
        $san_pham = App\Sanpham::get();
        $xuat_ra = App\Xuatra::orderBy('id')->get()->reverse();
        return view ('admin.xuat-ra',['xuat_ra'=>$xuat_ra, 'san_pham'=>$san_pham, 'result'=>$result]);  
    }

    public function getData(){  
        return $this->returnView();
    }

    public function addData(Request $request){
        $ten = App\Sanpham::find($request->id_san_pham)->ten;
    	$xuat_ra = New App\Xuatra;
        $xuat_ra->ten = $ten;
        $xuat_ra->ghi_chu =  $request->ghi_chu;
        $xuat_ra->so_luong = $request->so_luong;
        $xuat_ra->gia = $request->gia_xuat_ra;
        $xuat_ra->id_san_pham = $request->id_san_pham;
        $xuat_ra->id_user = Auth::user()->id;
        $xuat_ra->thanh_toan = $request->thanh_toan;
        $xuat_ra->tra_truoc = $request->tra_truoc;
        $xuat_ra->hang_hong = $request->hang_hong;

        $temp = $xuat_ra->save();  
        $don_vi = App\Sanpham::find($request->id_san_pham)->donvi->ten;
        if($temp){

          $result = "Đã xuất mới: <b>Mã số: </b><b style='color: blue'>XR/$xuat_ra->id </b> - <b>Tên: </b><b style='color: blue'>$ten </b> - <b>Số lượng: </b><b style='color: blue'>$xuat_ra->so_luong </b>($don_vi)";
          return $this->returnView1($result);
        }

        //var_dump($xuat_ra->toArray());
     
    }

    public function editData(Request $request){
        $xuat_ra = App\Xuatra::where('id',$request->edit_id)->update(['thanh_toan'=>$request->edit_thanh_toan, 'tra_truoc'=>$request->edit_tra_truoc, 'ghi_chu'=>$request->edit_ghi_chu]);
        
        $ten = App\Xuatra::find($request->edit_id)->ten;
        $result = "Đã cập nhật: <b>Mã số: </b><b style='color: blue'>XR/$request->edit_id </b> - <b>Tên: </b><b style='color: blue'>$ten </b>";
        return $this->returnView1($result);
    }

    public function delData(Request $request){
        //var_dump($request->toArray());
        $ten = App\Xuatra::find($request->del_id)->ten;
        $del = App\Xuatra::find($request->del_id)->delete();
        if($del == 1){
            $result = "<b style='color:red'>Đã xóa khỏi danh sách:</b> <b>Mã số: </b><b style='color: blue'>XR/$request->del_id </b> - <b>Tên: </b><b style='color: blue'>$ten </b>";
            return $this->returnView1($result);
        }
    }
}

