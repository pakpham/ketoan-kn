<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xuatra extends Model
{
    protected $table = 'xuat_ra';

    public function sanpham(){
    	return $this -> belongsTo('Sanpham','id_san_pham','id');
    }
     public function user(){
    	return $this -> belongsTo('User','id_user','id');
    }
}
