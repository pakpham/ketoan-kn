<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;

class User extends Controller
{
	public function handlingLogin(Request $request){

		$name = $request->name;
		$pass = $request->password;
		if(Auth::attempt(['name'=>$name, 'password'=>$pass])){
			//return view('admin.index',['user'=> Auth::user()]);
			return redirect('admin/home');
		}
		else{

			echo "Dang nhap khong thanh cong";
		}
	}

	public function logout(){
		Auth::logout();
		return redirect('/dangnhap');
	}
}
