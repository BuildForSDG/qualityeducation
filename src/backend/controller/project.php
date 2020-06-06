<?php
namespace App\Http\Controllers;
use DB;
use Hash;
use App\connect;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class project extends Controller{
	function index(){
		$res=connect::getall(session('email'));
		return view('project.index',["courses"=>$res]);
	}
	function courses(){
		return view('project.addcourse');
	}
	function login(){
		return view('project.login');
	}
	function signup(){
		return view('project.signUp');
	}
	function signin(Request $Request){
		$check1=connect::check([
			'email'=>$Request->input('email')]);
		if (count($check1)>0) {
$Request->session()->flash("status","User Arleady exists");
                    return back();
                
		}else{
			$insert=connect::signin([
				'email'=>$Request->input('email'),
				'password'=>md5($Request->input('pwd')),
				'firstname'=>$Request->input('faname'),
				'lastname'=>$Request->input('laname'),
				'mobile'=>$Request->input('tel'),
				'country'=>$Request->input('country'),
				'gender'=>$Request->input('gender'),
				'DOB'=>$Request->input('dob')

			]);if ($insert) {
				$Request->session()->flash("status","Account created successfully Login To continue");
                     return view('project.login'); 
			}
			else{
$Request->session()->flash("status","Failed to create account");
                    //return back();	
			}
		}
	}
	function adminregister(Request $Request){
		$Request->flash();
		$Request->validate([
			'email'=>'required',
			'firstname'=>'required',
			'lastname'=>'required',
			'mobile'=>'required|min:10',
			'country'=>'required',
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
				'password'=>md5($Request->input('pwd')),
				'firstname'=>$Request->input('faname'),
				'lastname'=>$Request->input('laname'),
				'mobile'=>$Request->input('tel'),
				'country'=>$Request->input('country'),
				'gender'=>$Request->input('gender'),
				'DOB'=>$Request->input('dob')

			]);if ($insert) {
				$Request->session()->flash("status","Account created successfully Login To continue");
                     return view('project.login'); 
			}
			else{
$Request->session()->flash("status","Failed to create account");
                    //return back();	
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
$Request->session()->put('email',$Request->input('email'));
        $res=connect::getall(session('email'));
		//$datas=json_decode($res);
		return view('project.index',["courses"=>$res]);     
		}else{
			$Request->session()->flash("login","wrong username or password");
                    return back(); 
		}

	}
	function course(Request $Request){
		$Request->flash();
		$Request->validate([
			'course_id'=>'required',
			'course_title'=>'required',
			'course_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
			'course_video'=>'required|mimes:mp4,mkv,VOB,Ogg,WebM',
			'course_content'=>'required']);
		$course_image=$Request->course_image->getClientOriginalName();
		$course_video=$Request->course_video->getClientOriginalName();
        $upload=$Request->course_image->move(public_path('images'),$course_image);
        $upload1=$Request->course_video->move(public_path('images'),$course_video);
        if ($upload && $upload1) {
        	$addcourse=connect::addcourse([
        		'course_id'=>$Request->input('course_id'),
        		'course_title'=>$Request->input('course_title'),
        		'course_image'=>$course_image,
        		'course_video'=>$course_video,
        		'course_content'=>$Request->input('course_content')]);
        	if ($addcourse) {
                    $Request->session()->flash("status","Successfully added course");
                    return back();
                }
                else{
                    $Request->session()->flash("status","failed to add course");
                    return back();
                }
        	
        }
	}
function morecourses(){
	$res=connect::getall(session('email'));
	return view('project.allcourses',["courses"=>$res]);
}
function admin(){
	$res=connect::getall(session('email'));
	return view('project.admin');
}
function manage(){
	$res=connect::getall(session('email'));
	return view('project.adminmanage',["courses"=>$res]);
}
function jobs(){
	$res=connect::getalljobs();
	return view('project.jobs',["jobs"=>$res]);
}
function enrols(Request $Request){
	$course_id1=$Request->input('course_id');
	$res=connect::getall1($course_id1);
	$result=json_decode($res);
	$res1=connect::getallc($course_id1);
	$data=json_decode($res1);
	$res12="";
	$data2=json_decode($res12);
	return view('admin.viewmore',["course"=>$result,'ada'=>$data2,'chapter'=>$data]);
	}
	function datum(Request $Request){
		$course_id1=$Request->input('course_id');
	$res=connect::getall1($course_id1);
	$result=json_decode($res);
	$res1=connect::getallc($course_id1);
	$data=json_decode($res1);
	$var=array(
		'id'=>$Request->input('id'),
		'c_no'=>$Request->input('c_no')

	);
		$res12=connect::getallch($var);
		$data2=json_decode($res12);
	return view('project.learn',['ada'=>$data2,"course"=>$result,'chapter'=>$data]);

	}
function enrol(Request $Request){
	$course_id1=$Request->input('course_id');
	$arr=array('email'=>session('email'),'course_id'=>$course_id1);
	$check=connect::checkenrol($arr);
	if (count($check)>0) {
	$res=connect::getall1($course_id1);
	$result=json_decode($res);
	$res1=connect::getallc($course_id1);
	$data=json_decode($res1);
	$res12="";
	$data2=json_decode($res12);
	return view('project.learn',["course"=>$result,'ada'=>$data2,'chapter'=>$data]);
	}else{
		$enrolled="enrolled";
	$enrol=connect::enrolcourse([
		'email'=>session('email'),
		'course_id'=>$course_id1,
		'enrol'=>$enrolled
	]);
	if ($enrol) {
	$res=connect::getall1($course_id1);
	$result=json_decode($res);
	$res1=connect::getallc($course_id1);
	$data=json_decode($res1);
	$res12="";
	$data2=json_decode($res12);
	return view('project.learn',["course"=>$result,'ada'=>$data2,'chapter'=>$data]);
	}else{
		return back();
	}}
	
}
function addjob(){
	return view('project.addjob');
}
function jobss(Request $Request){
	$Request->flash();
	$Request->validate([
			'job_title'=>'required',
			'job_des'=>'required',
			'job_attach'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
			'date'=>'required'
		]);
	$dates=date("Y-m-d");
	$job_upload=$Request->job_attach->getClientOriginalName();
    $upload=$Request->job_attach->move(public_path('images'),$job_upload);
    if ($upload) {
    	$addcourse=connect::addjob([
        		'job_title'=>$Request->input('job_title'),
        		'job_des'=>$Request->input('job_des'),
        		'job_attach'=>$job_upload,
        		'date'=>$Request->input('date'),
        		'create'=>$dates
        	]);
        	if ($addcourse) {
                    $Request->session()->flash("job","Successfully added job");
                    return back();
                }
                else{
                    $Request->session()->flash("job","failed to add job");
                    return back();
                } }
}

}

?>