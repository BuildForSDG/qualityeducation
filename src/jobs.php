<link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('Assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Assets/js/bootstrap.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('Assets/js/bootstrap.bundle.min.js')}}"></script>
<div style="width: 100%; background: blue; color: white; height: 50px;">
     
    <a href="home" onclick="openNav()" style="font-size:30px;cursor:pointer"><img class="nav1" src="Assets/logos/hm.png"></a>
    <h5 class="text-center" >Jobs and Career opportunities corner</h5>
</div>
<div class="container col-sm-12 col-md-12 col-lg-12" >
       <div class="row">
         <div class="col-sm-12 col-md-2 col-lg-2">
            <a  class="btn btn-link" href="home">Home</a><br>
            <a  class="btn btn-link" href="morecourses">Courses</a><br>
            <a class="btn btn-link" href="">Jobs</a><br>
            <a class="btn btn-link" href="">Profile</a><br>
            <a class="btn btn-link" href="">My Courses</a><br>
            <a class="btn btn-link" href="logout1"  id="log_out" onClick="return confirm('Confirm Logout');">Logout</a><br>

            <img class="nav1" src="Assets/Imgs/registered.jpg">
         </div>
         <div class="col-sm-12 col-md-10 col-lg-10">
          <div class="container card summary bg-light text-black col-sm-12 col-md-12 col-lg-12" >
       @foreach($jobs as $key => $value)
    <div class="row">
    <img src='images/{{$value->job_attachment}}' alt="Avatar" class="image col-sm-12 col-md-4 col-lg-4">
    <div class="col-sm-12 col-md-8 col-lg-8">
    <p class="text-center">{{$value->job_title}}</p>
    <p class="" style="color: black;">{{$value->job_description}}</p>
    <p class="text-center">Application Deadline: {{$value->application_deadline}} </p>
    <div class="text-center">
  <button class="btn btn-secondary" ><a href="mailto:{{$value->email}}">Apply Now</a></button>
    </div>
    </div>
    
    </div>
    <hr>
    @endforeach

  </div>
         </div>
       </div>

    </div>
  @include('project.footer')
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

