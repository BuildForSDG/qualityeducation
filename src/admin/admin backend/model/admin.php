<?php
namespace App\Http\Controllers;
use DB;
use Hash;
use App\connect;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class admin extends Controller{
	function index(){
		return view('admin.index');
	}
	function courses(){
		return view('admin.addcourse');
	}
	function login(){
		return view('admin.adminlogin');
	}
	function signup(){
		return view('admin.register');
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
		$check=connect::checkadmin([
			'email'=>$Request->input('email')]);
		if (count($check)>0) {
        $Request->session()->flash("status","User Arleady exists");
                    return back();
               
		}else{
			$insert=connect::adminsignin([
				'email'=>$Request->input('email'),
				'password'=>md5($Request->input('password')),
				'firstname'=>$Request->input('firstname'),
				'lastname'=>$Request->input('lastname'),
				'mobile'=>$Request->input('mobile'),
				'country'=>$Request->input('country')

			]);if ($insert) {
				$Request->session()->flash("status","Account created successfully Login To continue");
                     return view('admin.adminlogin'); 
			}
			else{
$Request->session()->flash("status","Failed to create account");
                    return back();	
			}
		}
	}
	function adminlogin(Request $Request){
		$Request->flash();
		$Request->validate([
			'email'=>'required',
			'password'=>'required|min:6'
		]);
		$arry=array(
			'email'=>$Request->input('email'),
			'password'=>md5($Request->input('password'))
		);
		$check=connect::adminlogin($arry);
		if (count($check)>0) {
$Request->session()->flash("login","logged in successfully");
$Request->session()->put('email',$Request->input('email'));
		return view('admin.addcourse');   
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
		$details=array(
		'course_id'=>$Request->input('course_id'),
        'course_title'=>$Request->input('course_title'));
		$checkcourse=connect::checkaddcourse($details);
		if (count($checkcourse)>0) {
			 $Request->session()->flash("status","course Already exists");
                    return back();
		}else{
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
        	
        }}
	}
	function add_chapter(Request $Request){
		$Request->flash();
		$Request->validate([
			'course_id'=>'required',
			'c_no'=>'required',
			'title'=>'required',
			'video'=>'required|mimes:mp4,mkv,VOB,Ogg,WebM',
			'des'=>'required']);
		$arr=array(
			'course_id'=>$Request->input('course_id'),
			'c_no'=>$Request->input('c_no')
		);
		$check=connect::checkchapter($arr);
		if (count($check)>0) {
			$Request->session()->flash("status","chapter Already exist");
                    return back();
		}
		else{
		$course_video=$Request->video->getClientOriginalName();
        $upload1=$Request->video->move(public_path('images'),$course_video);
        if ($upload1) {
        	$addcourse=connect::add_chapter([
        		'course_id'=>$Request->input('course_id'),
        		'title'=>$Request->input('title'),
        		'des'=>$Request->input('des'),
        		'video'=>$course_video,
        		'c_no'=>$Request->input('c_no')]);
        	if ($addcourse) {
                    $Request->session()->flash("status","Successfully added chapter");
                    return back();
                }
                else{
                    $Request->session()->flash("status","failed to add chapter");
                    return back();
                }
        	
        }}

	}
function admin(){
	$res=connect::getall(session('email'));
	return view('admin.adminmanage',["courses"=>$res]);
}
function deletecourse(Request $request){
	$id=$request->input('id');
	$res=connect::deletecourse($id);
	if ($res) {
		$res=connect::getall(session('email'));
	return view('admin.adminmanage',["courses"=>$res]);
	}
	else{
		$res=connect::getall(session('email'));
	return view('admin.adminmanage',["courses"=>$res]);
	}
	return view('admin.adminmanage',["courses"=>$res]);
}
function updatejob(Request $Request){
	$Request->flash();
	$Request->validate([
			'job_title'=>'required',
			'email'=>'required',
			'job_des'=>'required',
			'job_attach'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
			'date'=>'required|date|after:today'
		]);
	$dates=date("Y-m-d");
	$jobid=$Request->input('job_id');
	$job_upload=$Request->job_attach->getClientOriginalName();
    $upload=$Request->job_attach->move(public_path('images'),$job_upload);
    $details=array(
    	'job_title'=>$Request->input('job_title'),
        		'email'=>$Request->input('email'),
        		'job_description'=>$Request->input('job_des'),
        		'job_attachment'=>$job_upload,
        		'application_deadline'=>$Request->input('date'),
        		'created_at'=>$dates
    );
    if ($upload) {
    	$addcourse=connect::updatejob($jobid,$details);
        	if ($addcourse) {
                    $Request->session()->flash("jobup","Successfully updated job");
	               return back();
                }
                else{
                    $Request->session()->flash("jobup","failed to update job");
                   return back();
                } }
}
function deletejob(Request $request){
	$jobid=$request->input('id');
	$res=connect::deletejob($jobid);
	if ($res) {
		$res=connect::getalljobs();
	return view('admin.managejobs',["jobs"=>$res]);
	}
	else{
		$res=connect::getalljobs();
	return view('admin.managejobs',["jobs"=>$res]);
	}
}

function deletechapter(Request $request){
	$id1=$request->input('id');
	$res=connect::deletechapter($id1);
	if ($res) {
		return back();	
	}else{
			return back();
		}
}
function manage(){
	$res=connect::getall(session('email'));
	return view('admin.adminmanage',["courses"=>$res]);
}
function managejob(){
	$res=connect::getalljobs();
	return view('admin.managejobs',["jobs"=>$res]);
}
function addjob(){
	return view('admin.addjob');
}
function logout(Request $request){
	$request->session()->flush();
	return view('admin.index');
}
function jobss(Request $Request){
	$Request->flash();
	$Request->validate([
			'job_title'=>'required',
			'email'=>'required',
			'job_des'=>'required',
			'job_attach'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
			'date'=>'required|date|after:today'
		]);
	$dates=date("Y-m-d");
	$job_upload=$Request->job_attach->getClientOriginalName();
    $upload=$Request->job_attach->move(public_path('images'),$job_upload);
    if ($upload) {
    	$addcourse=connect::addjob([
        		'job_title'=>$Request->input('job_title'),
        		'email'=>$Request->input('email'),
        		'job_description'=>$Request->input('job_des'),
        		'job_attachment'=>$job_upload,
        		'application_deadline'=>$Request->input('date'),
        		'created_at'=>$dates
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
function deletes(Request $Request){
$course_id1=$Request->input('course_id');
$arr=$course_id1;
//array('course_id'=>$course_id1);
$ret=connect::deletes($arr);
if ($ret) {
	return view('admin.adminmanage');
}
}
function enrol(Request $Request){
	$course_id1=$Request->input('course_id');
	$res=connect::getall1($course_id1);
	$result=json_decode($res);
	$res1=connect::getallc($course_id1);
	$data=json_decode($res1);
	$res12="";
	$data2=json_decode($res12);
	return view('admin.viewmore',["course"=>$result,'ada'=>$data2,'chapter'=>$data]);
	}
	function data(Request $Request){
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
	return view('admin.viewmore',['ada'=>$data2,"course"=>$result,'chapter'=>$data]);

	}
}

?>