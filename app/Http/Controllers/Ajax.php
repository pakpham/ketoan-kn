<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class Ajax extends Controller
{
	public function getSanpham(Request $req){
		$id_loai_san_pham = $req->id_loai_san_pham;
		$data = App\Loaisanpham::find($id_loai_san_pham)->sanpham;
    	// foreach($data as $value){
    	// 	return "<option>".$value->ten."</option>"
    	// }
		foreach ($data as $value) {
			echo "<option value='$value->id'>$value->ten</option>";
		}
	}
	public function getGianhapvao(Request $req){
		$gia = App\Sanpham::find($req->id_san_pham)->gia_nhap_vao;
		$don_vi = App\Sanpham::find($req->id_san_pham)->donvi->ten;

		return ['gia'=>$gia,'don_vi'=>$don_vi];
	}
	public function getGiaxuatra(Request $req){
		$gia = App\Sanpham::find($req->id_san_pham)->gia_xuat_ra;
		$don_vi = App\Sanpham::find($req->id_san_pham)->donvi->ten;

		return ['gia'=>$gia,'don_vi'=>$don_vi];
	}


	// =========== THỐNG KÊ DỮ LIỆU THEO NGÀY  ===============
	public function getThongke(Request $request){
		$date_from = $request->date_from . " 00:00:00";
		$date_to   = $request->date_to . " 23:59:59";
		$nhap_vao = App\Nhapvao::whereBetween('created_at', [$date_from, $date_to])->get();
		$xuat_ra =  App\Xuatra::whereBetween('created_at', [$date_from, $date_to])->get();
		
		// Tổng thu
		$thanh_tien_nhap = 0;
		$thanh_tien_xuat = 0;
		$tien_nhap = 0;
		$tien_xuat = 0;
		$tien_no_nhap = 0;
		$tien_no_xuat = 0;
		$thiet_hai = 0;
		$loi_nhuan = 0;
		foreach ($nhap_vao as $key => $value) {
			$thanh_tien_nhap = $thanh_tien_nhap + $value->so_luong * $value->gia;	
			$tien_no_nhap = $tien_no_nhap + $value->so_luong * $value->gia - $value->tra_truoc;
			$tien_nhap = $tien_nhap + $value->tra_truoc;
		}

		foreach ($xuat_ra as $key => $value) {
			$loi_nhuan = $loi_nhuan + $value->so_luong * (App\Sanpham::find($value->id_san_pham)->gia_xuat_ra - App\Sanpham::find($value->id_san_pham)->gia_nhap_vao);
			$thanh_tien_xuat = $thanh_tien_xuat + $value->so_luong * $value->gia;
			$tien_no_xuat = $tien_no_xuat + $value->so_luong * $value->gia - $value->tra_truoc;
			$tien_xuat = $tien_xuat + $value->tra_truoc;
			if($value->hang_hong==1){
				$thiet_hai = $thiet_hai +  $value->so_luong * App\Sanpham::find($value->id_san_pham)->gia_nhap_vao;
			}
		}


		// Sản phẩm bán chạy
		$san_pham = App\Sanpham::get();
		$so_luong = 0;
		foreach ($san_pham as $key => $value) {
			$so_luong = 0;
			$xuat_ra = App\Xuatra::whereBetween('created_at', [$date_from, $date_to])->where('id_san_pham','=',$value->id)->get();
			foreach ($xuat_ra as $value1) {
				$so_luong = $so_luong + $value1->so_luong;
			}
			$value->so_luong = $so_luong;
		}
		
		$san_pham = $san_pham ->unique()->sortBy('so_luong')->reverse();
		$san_pham1;
		$i = 0;
		foreach ($san_pham as $key => $value) {
				$san_pham1[$i] = $value;
				++ $i;
		}



		return [
			"tien_nhap"=>$tien_nhap, 
			"tien_xuat"=>$tien_xuat, 
			"tien_no_nhap"=>$tien_no_nhap, 
			"tien_no_xuat"=>$tien_no_xuat,
			"thanh_tien_nhap"=>$thanh_tien_nhap, 
			"thanh_tien_xuat"=>$thanh_tien_xuat, 
			"loi_nhuan" =>$loi_nhuan,
			"thiet_hai" =>$thiet_hai,
			"max"		=>$san_pham1,
			"test"		=>'sad'
			];
	}
	//========================================================

	public function deleteNo(Request $request){
		//return $request;
		switch ($request->loai) {
			case "no-xuat":
				$xuat_ra = App\Xuatra::find($request->id);
				$tra_truoc = $xuat_ra->gia * $xuat_ra->so_luong;
				$xuat_ra = App\Xuatra::where('id',$request->id)->update(['thanh_toan'=>1, 'tra_truoc'=>$tra_truoc]);
				return  $xuat_ra;
				break;
			
			case "no-nhap":
				$nhap_vao = App\Nhapvao::find($request->id);
				$tra_truoc = $nhap_vao->gia * $nhap_vao->so_luong;
				$nhap_vao = App\Nhapvao::where('id',$request->id)->update(['thanh_toan'=>1, 'tra_truoc'=>$tra_truoc]);
				return  $nhap_vao;
				break;
		}

	}



	//============  TEST ====================
	public function test(){
		// Sản phẩm bán chạy
		$date_from = "2018-10-1"  . " 00:00:00";
		$date_to   = "2018-10-29" . " 23:59:59";
		$san_pham = App\Sanpham::get();
		$so_luong = 0;
		foreach ($san_pham as $key => $value) {
			$so_luong = 0;
			$xuat_ra = App\Xuatra::whereBetween('created_at', [$date_from, $date_to])->where('id_san_pham','=',$value->id)->get();
			foreach ($xuat_ra as $value1) {
				$so_luong = $so_luong + $value1->so_luong;
			}
			$value->so_luong = $so_luong;
		}
		$max = 0;
		$max_sl = 0;
		$i = 0;
		$san_pham = $san_pham ->unique()->sortBy('so_luong');
		$san_pham1;
		foreach ($san_pham as $key => $value) {
				$san_pham1[$i] = $value;
				++ $i;
		}
		// $san_pham = $san_pham->toArray();

		// function cmp($a, $b)
		// {
		// 	return strcmp($a->name, $b->name);
		// }

		// usort($san_pham, array($this, "cmp"));

		
		var_dump($san_pham1);
		
	}
}
