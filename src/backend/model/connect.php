<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
class connect extends Model
{
    public static function signin(array $data){
    	  $ret=DB::table("users")->insert($data);
        return $ret;
    }
    public static function adminsignin(array $data){
           $ret=DB::table("admin")->insert($data);
        return $ret;
    }
    public static function check(array $data){
    	$email=$data['email'];
    	$ret=DB::table("users")->where('email','=',$email)->get();
    	return $ret;
    }
     public static function checkadmin(array $data){
        $email=$data['email'];
        $ret=DB::table("admin")->where('email','=',$email)->get();
        return $ret;
    }
    public static function deletecourse($data){
        $ret=DB::table("courses")->where('course_id','=',$data)->delete();
        if ($ret) {
            $ret1=DB::table("chapters")->where('course_id','=',$data)->delete();
             if ($ret1) {
                $ret2=DB::table("enrolled")->where('course_id','=',$data)->delete();
                if ($ret2) {
                     return $ret2;
                }
             }
        }
        return $ret;
    }
    public static function deletejob($data){
            $ret1=DB::table("jobs")->where('job_id','=',$data)->delete();  
        return $ret1;
    }
    public static function deletechapter($data){
            $ret1=DB::table("chapters")->where('c_no','=',$data)->delete();  
        return $ret1;
    }

    public static function userlogin(array $data){
    	$ret=DB::table("users")->where($data)->get();
    	return $ret;
    }
    public static function getprofile(array $data){
        $ret=DB::table("users")->where($data)->get();
        return $ret;
    }
    public static function adminlogin(array $data){
        $ret=DB::table("admin")->where($data)->get();
        return $ret;
    }
    public static function updatejob($jobid,array $data){
        $ret=DB::table("jobs")->where('job_id','=',$jobid)->update($data);
        return $ret;
    }
      public static function addcourse(array $data){
        $ret=DB::table("courses")->insert($data);
        return $ret;
    }
    public static function checkchapter(array $data){
        $ret=DB::table("chapters")->where($data)->get();
        return $ret;
    }
    public static function checkaddcourse(array $data){
        $ret=DB::table("courses")->where($data)->get();
        return $ret;
    }
    public static function add_chapter(array $data){
       $ret=DB::table("chapters")->insert($data);
        return $ret;
    }
    public static function getall($ema){
$ret=DB::select("SELECT courses.course_id,courses.course_title,courses.course_content,courses.course_image,enrolled.enrol from courses left join enrolled on enrolled.course_id=courses.course_id and enrolled.email='$ema'");
        return $ret;
    }
    public static function getallcourses(){
        $ret=DB::table("courses")->get();
        return $ret;
    }

    public static function getalljobs(){
        $ret=DB::select("SELECT * FROM jobs ORDER by created_at DESC");
            return $ret;
    }
    public static function getall1($id){
        $ret=DB::table("courses")->where('course_id','=',$id)->get();
        return $ret;
    }

     public static function getallc($data){
        $ret=DB::table("chapters")->where('course_id','=',$data)->get();
        return $ret;
    }
    public static function getallch(array $data){
        $ret=DB::table("chapters")->where($data)->get();
        return $ret;
    }
    public static function getcourse(array $data){
        $ret=DB::table("courses")->where($data)->get();
        return $ret;
    }
    public static function enrolcourse(array $data){
       $ret=DB::table("enrolled")->insert($data);
        return $ret;
    }
    public static function checkenrol(array $data){
        $ret=DB::table("enrolled")->where($data)->get();
        return $ret;
    }
    public static function addjob(array $data){
       $ret=DB::table("jobs")->insert($data);
        return $ret;

    }
    public static function deletes($data){
        $ret=DB::table("courses")->where('course_id','=',$data)->delete();
        if ($ret) {
           $ret=DB::table("enrolled")->where('course_id','=',$data)->delete();
           return $ret;
        }else{
            echo "failed";
        }
    }

}