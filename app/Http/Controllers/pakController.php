<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;

class pakController extends Controller
{
    //
  public function testView($name2){
    echo "PAK: " , $name2;
  }

  public function getModel(){
    $data = pakModel::all()->where('id','>',3);
    echo $data;
  }

  public function getFrom(){
    return view('test');
  }
  public function handleRequest(Request $request){
    return $request -> all();
  }

  public function nameBlade($name){
    if ($name == 'pak'){
      return view ('pages.content');
    }
    elseif ($name != 'pak') {
      return view ('pages.content3', ['name'=>$name]);
    }
  }

  public function addDataHocSinh($num){

    for ($i=0; $i < $num; $i++) { 
      $data = New App\hocsinh();
      $check_insert = 0;
      $data->name = str_random(10);
      $data->age = rand(20,30);
      $data->id_giaovien = rand(1,10);
      $data->save();
      echo "Add data: ". $i;
      echo "</br>";
    }
  }

  public function addUser ($name, $pass, $admin){
    $data = New App\User();
    $data->name = $name;
    $data->email = $name.'@gmail.com';
    $data->password = bcrypt($pass);
    $data->admin = $admin;
    $data->save();
    echo "Da them User!";
  }

  public function handlingLogin(Request $request) {
    $user_name = $request->name;
    $pass = $request->password;

    if(Auth::attempt(['name'=>$user_name, 'password'=>$pass])){
      return view('pages.logined',['user'=> Auth::user()]);
      //$user => Auth::user();
    }
    else
      return view('pages.login',['error'=>'Dang nhap khong thanh cong']);
  }

  public function logout(){
    Auth::logout();
    return view('pages.login');
  }

  public function checkLogin (){
    if (Auth::check()){
      return view('pages.logined');
    }
    else echo "Ban chua dang nhap";
  }
}
