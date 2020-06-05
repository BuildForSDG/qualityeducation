@include('admin.admin')
<script src="Assets/js/script.js"></script>
<link href="Assets/css/jobs.css" rel="stylesheet" type="text/css">
<div style="width: 100%; background: blue; color: white; height: 50px;">
	<header>
	<nav> 
    <h3 class="text-center" >Manage Courses here</h3>
    </nav></header>
</div>
<div class="container col-sm-12 col-md-12 col-lg-12" >
       <div class="row">
         <div class="col-sm-12 col-md-2 col-lg-2">
            <a  class="btn btn-link" href="addcourse">Add Courses</a><br>
            <a  class="btn btn-link" href="manage">Manage courses</a><br>
            <a class="btn btn-link" href="addjob">Add Jobs</a><br>
            <a class="btn btn-link" href="managejob">Manage Jobs</a><br>
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
<button id="enrolled" class="btn btn-success"><a href="viewmore?course_id={{$value->course_id}}">view course content</a></button>
 <button  class="btn btn-danger"  data-toggle="modal" data-target="#{{$value->course_id}}">Delete</button>
    </div>
    <div class="modal fade" id="{{$value->course_id}}">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-body">
            <form action="deletecourse" method="post">
                            {{ csrf_field() }}
              <div class="form-group">
                <label>Are you sure you want to delete this course?</label>
                <input type="text" name="id" hidden="true" value="{{$value->course_id}}">
              </div>
                <div class="text-center"><button data-dismiss="modal" class="btn btn-secondary">cancel</button>
                <button type="submit" class="btn btn-primary">Yes</button></div>
                  </form>
              </div>
              
          
          </div>
        </div>
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

