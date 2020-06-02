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
		return view('project.index');
	}
	function login(){
		return view('project.login');
	}
	function signup(){
		return view('project.signUp');
	}
	function signin(Request $Request){
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
                    return view('project.index');      
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
function jobs(){
	$res=connect::getall(session('email'));
	return view('project.jobs',["courses"=>$res]);
}
function enrol(Request $Request){
	$course_id1=$Request->input('course_id');
	$arr=array(
'email'=>session('email'),
'course_id'=>$course_id1);
	$check=connect::checkenrol($arr);
	if (count($check)>0) {
	$course_id=$Request->all();
	$res=connect::getcourse($course_id);
	$datas=json_decode($res);
	return view('project.learn',["course"=>$datas]);
	}else{
	$enrol=connect::enrolcourse([
		'email'=>session('email'),
		'course_id'=>$course_id1
	]);
	if ($enrol) {
	$course_id=$Request->all();
	$res=connect::getcourse($course_id);
	$datas=json_decode($res);
	return view('project.learn',["course"=>$datas]);
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