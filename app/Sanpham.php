<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Sanpham extends Model
{
    protected $table = 'san_pham';
    public function donvi(){
    	return $this -> belongsTo('App\Donvi','id_don_vi','id');
    }

    public function user(){
    	return $this -> belongsTo('App\User','id_user','id');
    }

    public function nhapvao(){
    	return $this -> hasMany('App\Nhapvao','id_san_pham', 'id');
    }

    public function xuatra(){
    	return $this -> hasMany('App\Xuatra','id_san_pham', 'id');
    }

    
    public function hh_xuatra($from, $to){
    	return $this-> hasMany('App\Xuatra','id_san_pham', 'id')-> whereBetween('created_at', array($from, $to)) ;
    }
}
