<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Donvi extends Model
{
    protected $table = 'don_vi';
    public function user(){
    	return $this -> belongsTo('App\User','id_user','id');
    }
}
