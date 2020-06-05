<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class connect extends Model
{
    public static function signin(array $data){
    	 $email=$data['email'];
        $password=$data['password'];
        $firstname=$data['firstname'];
        $lastname=$data['lastname'];
        $DOB=$data['DOB'];
        $gender=$data['gender'];
        $mobile=$data['mobile'];
        $country=$data['country'];
        $res=DB::insert("insert into users(email,password,firstname,lastname,DOB,gender,mobile,country) values('$email','$password','$firstname','$lastname','$DOB','$gender','$mobile','$country')");
        return $res;
    }
    public static function adminsignin(array $data){
         $email=$data['email'];
        $password=$data['password'];
        $firstname=$data['firstname'];
        $lastname=$data['lastname'];
        $mobile=$data['mobile'];
        $country=$data['country'];
        $res=DB::insert("insert into admin(email,password,firstname,lastname,mobile,country) values('$email','$password','$firstname','$lastname','$mobile','$country')");
        return $res;
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
    public static function deletechapter($data){
            $ret1=DB::table("chapters")->where('c_no','=',$data)->delete();  
        return $ret1;
    }

    public static function userlogin(array $data){
    	$ret=DB::table("users")->where($data)->get();
    	return $ret;
    }
    public static function adminlogin(array $data){
        $ret=DB::table("admin")->where($data)->get();
        return $ret;
    }
      public static function addcourse(array $data){
      $id=$data['course_id'];
      $title=$data['course_title'];
      $image=$data['course_image'];
      $video=$data['course_video'];
      $content=$data['course_content'];
        $res=DB::insert("insert into courses(course_id,course_title,course_image,course_video,course_content) values('$id','$title','$image','$video','$content')");
        return $res;
    }
    public static function checkchapter(array $data){
        $ret=DB::table("chapters")->where($data)->get();
        return $ret;
    }
    public static function add_chapter(array $data){
      $id=$data['course_id'];
      $title=$data['title'];
      $c_no=$data['c_no'];
      $video=$data['video'];
      $content=$data['des'];
        $res=DB::insert("insert into chapters(course_id,title,c_no,video,des) values('$id','$title','$c_no','$video','$content')");
        return $res;
    }
    public static function getall($ema){
$ret=DB::select("SELECT courses.course_id,courses.course_title,courses.course_content,courses.course_image,enrolled.enrol from courses left join enrolled on enrolled.course_id=courses.course_id and enrolled.email='$ema'");
        return $ret;
    }
//     public static function getall1($id){
// $ret=DB::select("SELECT distinct courses.course_id,courses.course_title,courses.course_content,courses.course_video,courses.course_image,chapters.course_id,chapters.id,chapters.c_no,chapters.title,chapters.des,chapters.video from courses INNER join chapters on chapters.course_id=courses.course_id where courses.course_id='$id'");
//         return $ret;
//     }
    public static function getalljobs(){
        $ret=DB::select("SELECT * FROM jobs ORDER by created_at DESC");
            return $ret;
    }
    public static function getall1($ids){
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
        $course_id=$data['course_id'];
        $email=$data['email'];
        $ret=DB::insert("insert into enrolled(email,course_id,enrol) values('$email','$course_id','enrolled')");
        return $ret;
    }
    public static function checkenrol(array $data){
        $ret=DB::table("enrolled")->where($data)->get();
        return $ret;
    }
    public static function addjob(array $data){
        $job_title=$data['job_title'];
        $job_des=$data['job_des'];
        $email=$data['email'];
        $job_attach=$data['job_attach'];
        $date=$data['date'];
        $created_at=$data['create'];
        $ret=DB::insert("insert into jobs(job_title,job_description,job_attachment,application_deadline,created_at,email) values('$job_title','$job_des','$job_attach','$date','$created_at','$email')");
        return $ret;

    }
    public static function deletes($data){
        $ret=DB::table("courses")->where('course_id','=',$data)->delete();
        if ($ret) {
           $ret=DB::table("enrolled")->where('course_id','=',$data)->delete();
           return $ret;
        }
    }

}