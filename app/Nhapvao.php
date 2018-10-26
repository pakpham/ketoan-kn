<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Nhapvao extends Model
{
    protected $table = 'nhap_vao';

    public function sanpham(){
    	return $this -> belongsTo('App\Sanpham','id_san_pham','id');
    }
    public function user(){
    	return $this -> belongsTo('User','id_user','id');
    }

}
