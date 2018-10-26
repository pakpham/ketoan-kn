<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class Home extends Controller
{
	// //Xuat
	// public function tongthu(){
	// 	$tong_tien_xuat = 0;
	// 	$xuat_ra = App\Xuatra::all();
	// 	foreach ($xuat_ra as $key => $value) {
	// 		$tong_tien_xuat = $tong_tien_xuat + $value->tra_truoc;
	// 	}
	// 	return ['tong_thu'=>$tong_tien_xuat];
	// }

	// //Nhap
	// public function tongchi(){
	// 	$tong_tien_nhap = 0;
	// 	$nhap_vao = App\Nhapvao::all();
	// 	foreach ($nhap_vao as $key => $value) {
	// 		$tong_tien_nhap = $tong_tien_nhap + $value->tra_truoc;
	// 	}
	// 	return ['tong_chi'=>$tong_tien_nhap];
	// }

	// //Nợ cần thu
	// public function tiennoxuat(){
	// 	$tong_tien_no = 0;
	// 	$xuat_ra = App\Xuatra::all();
	// 	foreach ($xuat_ra as $key => $value) {
	// 		$tien_no_xuat = ($value->so_luong * $value->gia ) - $value->tra_truoc;
	// 		$tong_tien_no = $tong_tien_no + $tien_no_xuat;
	// 	}
	// 	return ['tong_tien_no_xuat'=>$tong_tien_no];
	// }

	// //Nợ cần trả
	// public function tiennonhap(){
	// 	$tong_tien_no = 0;
	// 	$xuat_ra = App\Nhapvao::all();
	// 	foreach ($xuat_ra as $key => $value) {
	// 		$tien_no_xuat = $value->so_luong * $value->gia - $value->tra_truoc;
	// 		$tong_tien_no = $tong_tien_no + $tien_no_xuat;
	// 	}
	// 	return ['tong_tien_no_nhap'=>$tong_tien_no];
	// }


	// TRUY VẤN DỮ LIỆU THEO NGÀY
	public function getThongke($date_from, $date_to){
		$date_from = $date_from . " 00:00:00";
		$date_to   = $date_to . " 23:59:59";
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

		//$loi_nhuan = $tien_xuat - $tien_nhap;


		return ["tien_nhap"=>$tien_nhap, "tien_xuat"=>$tien_xuat, "tien_no_nhap"=>$tien_no_nhap, "tien_no_xuat"=>$tien_no_xuat,"thanh_tien_nhap"=>$thanh_tien_nhap, "thanh_tien_xuat"=>$thanh_tien_xuat, "loi_nhuan"=>$loi_nhuan, "thiet_hai"=>$thiet_hai];
	}


	//  Danh sach San Pham và Ton Kho
	public function sanpham(){
		$san_pham = App\Sanpham::get();
		foreach ($san_pham as $key0 => $value0) {
			$tong_nhap_vao = 0;
			$tong_xuat_ra = 0;
			$tong_hang_hong = 0;
			$nhap_vao = $value0->nhapvao;
			foreach ($nhap_vao as $key => $value) {
				$tong_nhap_vao = $tong_nhap_vao + $value->so_luong;
			}
			$xuat_ra = $value0->xuatra;
			foreach ($xuat_ra as $key => $value) {
				$tong_xuat_ra = $tong_xuat_ra + $value->so_luong;
			}

			// Tạo mảng dữ liệu
			$value0->ton_kho = $tong_nhap_vao - $tong_xuat_ra ;
		}
		return ["san_pham"=>$san_pham];
	}

	// Sản phẩm hư trong 7 ngày qua
	public function sanphamhong(){
		$date_to = date("Y-m-d 23:59:59");		// Lấy thời gian ngay bây giờ
		$date_count = 7;
		$date_from = date('Y-m-d',strtotime($date_to. '-7 days'));	// Trở lề 7 ngày trước
		//Lấy sô lượng hàng hỏng trong 7 ngày gần nhất
		$san_pham = App\Sanpham::get();
		foreach ($san_pham as $key => $value) {
			$tong_hang_hong = 0;
			$xuat_ra = $value->hh_xuatra($date_from, $date_to)->where("hang_hong","=",1)->get();
			foreach ($xuat_ra as $key1 => $value1) {
				$tong_hang_hong = $tong_hang_hong + $value1->so_luong;
			}
			$value->so_luong_hong = $tong_hang_hong ;
		}
		// var_dump($san_pham->toArray());
		return ['hang_hong'=>$san_pham];
	}

	// Tiền nợ xuất ra - Nợ cần thu
	public function noxuat(){
		$xuat_ra = App\Xuatra::where('thanh_toan','=', 0)->get();
		$tongno_xuat = 0;
		foreach ($xuat_ra as $key => $value) {
			$tongno_xuat = $tongno_xuat + $value->so_luong * $value->gia - $value->tra_truoc;
		}
		return ['no_xuat'=>$xuat_ra, 'tongno_xuat'=>$tongno_xuat];
	}

	// Tiền nợ nhập vào - Nợ cần trả
	public function nonhap(){
		$nhap_vao = App\Nhapvao::where('thanh_toan','=', 0)->get();
		$tongno_nhap = 0;
		foreach ($nhap_vao as $key => $value) {
			$tongno_nhap = $tongno_nhap + $value->so_luong * $value->gia - $value->tra_truoc;
		}
		return ['no_nhap'=>$nhap_vao, 'tongno_nhap'=>$tongno_nhap];
	}

	//////////////////////////////////////////
    public function getData(){
    	$date_to = date("Y-m-d");
    	//$date_from = date("y-m-d");
    	$date_from = date('Y-m-d');
    	//getThongke($date_from, $date_to);
    	$data = array_merge( $this->getThongke($date_from, $date_to), $this->sanpham(), $this->sanphamhong(), $this->noxuat(), $this->nonhap());
    	return view('admin.admin-home',$data);
    	//return $this->sanphamhong();
    }
}
