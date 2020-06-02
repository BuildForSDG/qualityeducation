@include('project.admin')
<link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('Assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Assets/js/bootstrap.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('Assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="Assets/js/script.js"></script>
<link href="Assets/css/jobs.css" rel="stylesheet" type="text/css">
<div style="width: 100%; background: blue; color: white; height: 50px;">
	<header>
	<nav> 
    <a href="home" onclick="openNav()" style="font-size:30px;cursor:pointer"><img class="nav1" src="Assets/logos/hm.png"></a>
    <h5 class="text-center" >We provide courses that will help you get certified on Various subjects</h5>
    </nav></header>
</div>
<div class="container col-sm-12 col-md-12 col-lg-12" >
       <div class="row">
         <div class="col-sm-12 col-md-2 col-lg-2">
            <img class="home" src="Assets/Imgs/icons8-home-24.png"><br>
            <a  class="btn btn-link" href="home">Home</a><br>
            <a  class="btn btn-link" href="morecourses">Add Courses</a><br>
            <a class="btn btn-link" href="">Jobs</a><br>
            <a class="btn btn-link" href="">Profile</a><br>
            <a class="btn btn-link" href="">My Courses</a><br>
            <a class="btn btn-link" href="">Log Out</a><br>
            <img class="nav1" src="Assets/Imgs/registered.jpg">
         </div>
         <div class="col-sm-12 col-md-10 col-lg-10">
          <div class="container card summary bg-light text-black col-sm-12 col-md-12 col-lg-12" >
       @foreach($courses as $key => $value)
    <div class="row">
    <img src='images/{{$value->course_image}}' alt="Avatar" class="image col-sm-12 col-md-4 col-lg-4">
    <div class="col-sm-12 col-md-8 col-lg-8">
    <p class="text-center">{{$value->course_title}}</p>
    <p class="">{{$value->course_content}}</p>
    <div class="text-center">
<button id="enrolled" class="btn btn-success"><a href="update?course_id={{$value->course_id}}">Update</a></button>
 <button id="enrol" class="btn btn-primary"><a href="deletes?course_id={{$value->course_id}}">Delete</a></button>

    </div>
    </div>
    </div>
    <hr>
    @endforeach

  </div>
         </div>
       </div>

    </div>
		 
		
	
   <style type="text/css">
   	.image {
  display: inline-block;
  height: 30vh;
  width: 30vh;
  border-radius: 10px 10px 0px 0px;
  -webkit-border-radius: 10px 10px 0px 0px;
  -moz-border-radius: 10px 10px 0px 0px;
  -ms-border-radius: 10px 10px 0px 0px;
  -o-border-radius: 10px 10px 0px 0px;
}
a,button{
	color: white;
}
.container{
	padding: 15px;
}
.nav1{
margin-left: 5px;
    float: left;
    height: 50px
}
   </style>
}

