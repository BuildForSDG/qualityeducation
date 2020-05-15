<?php
namespace App\Http\Controllers;
use DB;
use Hash;
use App\connect;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
class project extends Controller{
    //controller file key to connection between the frontend and model
	function index(){
		return view('project.index');
	}
	function login(){
		return view('project.login');
	}
	function signup(){
		return view('project.signUp');
	}
	function signin(Request $Request){
		$Request->flash();
		$Request->validate([
			'email'=>'required',
			'password'=>'required|min:6'
		]);
		$check=connect::check([
			'email'=>$Request->input('email')]);
		if (count($check)>0) {
$Request->session()->flash("status","User Arleady exists");
                    return back();
                
		}else{
			$insert=connect::signin([
				'email'=>$Request->input('email'),
				'password'=>md5($Request->input('password'))

			]);if ($insert) {
				$Request->session()->flash("status","Account created successfully Login To continue");
                    return back();
			}
			else{
$Request->session()->flash("status","Failed to create account");
                    return back();	
			}
		}
	}
	function userlogin(Request $Request){
		$Request->flash();
		$Request->validate([
			'email'=>'required',
			'password'=>'required|min:6'
		]);
		$arry=array(
			'email'=>$Request->input('email'),
			'password'=>md5($Request->input('password'))
		);
		$check=connect::userlogin($arry);
		if (count($check)>0) {
$Request->session()->flash("login","logged in successfully");
                    return view('project.index');      
		}else{
			$Request->session()->flash("login","wrong username or password");
                    return back(); 
		}

	}
}

?>