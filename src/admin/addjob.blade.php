@include('admin.admin')
<div style="width: 100%; background: blue; color: white; height: 50px;">
	<header>
	<nav> 
    <a href="home" onclick="openNav()" style="font-size:30px;cursor:pointer"><img class="nav1" src="Assets/logos/hm.png"></a>
    <h5 class="text-center" >Jobs and Career opportunities corner</h5>
    </nav></header>
</div>
<div class="container col-sm-12 col-md-12 col-lg-12" >
       <div class="row">
         <div class="col-sm-12 col-md-2 col-lg-2">
            <a  class="btn btn-link" href="addcourse">Add Courses</a><br>
            <a  class="btn btn-link" href="manage">Manage courses</a><br>
            <a class="btn btn-link" href="addjob">Jobs</a><br>
            <a class="btn btn-link" href="managejob">Manage Jobs</a><br>
            <img class="nav1" src="Assets/Imgs/registered.jpg">
         </div>
         <div class="col-sm-12 col-md-10 col-lg-10">
          <div class="container card summary bg-light text-black col-sm-12 col-md-12 col-lg-12" >
       @foreach($jobs as $key => $value)
    <div class="row">
    <img src='images/{{$value->job_attachment}}' alt="Avatar" class="image col-sm-12 col-md-4 col-lg-4">
    <div class="col-sm-12 col-md-8 col-lg-8">
    <p class="text-center">{{$value->job_title}}</p>
    <p class="">{{$value->job_description}}{{$value->job_id}} </p>
    <div class="text-center">
<button class="btn btn-primary" data-toggle="modal" data-target="#jj{{$value->job_id}}">update</button>
<button  class="btn btn-danger"  data-toggle="modal" data-target="#delete{{$value->job_id}}">Delete</button>
  <div class="modal fade" id="delete{{$value->job_id}}">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-body">
            <form action="deletejob" method="post">
                            {{ csrf_field() }}
              <div class="form-group">
                <label>Are you sure you want to delete this Job?</label>
                <input type="text" name="id" hidden="true"  value="{{$value->job_id}}">
              </div>
                <div class="text-center"><button data-dismiss="modal" class="btn btn-secondary">cancel</button>
                <button type="submit" class="btn btn-primary">Yes</button></div>
                  </form>
              </div>          
          </div>
        </div>
        </div>
        <div class="modal fade" id="jj{{$value->job_id}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-head">
            <button data-dismiss="modal" class="close">
              <span>&times</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="updatejob" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        {{ csrf_field() }}
        <h3 class="text-center">Update job details here</h3>
         @if(session('jobup'))
              <div class="alert alert-success">
              {{session('jobup')}}
              </div>
              @endif
        <input type="text" name="job_id" hidden="true" value="{{$value->job_id}}" class="form-control">
        <div class="form-group">
          <span style="color: red;"> @error("job_title")
                {{ $message }}
              @enderror </span>
          <label>Job Title</label>
          <input type="text" name="job_title" placeholder="Job Title" value="{{$value->job_title}}" class="form-control">
        </div>
        <div class="form-group">
          <span style="color: red;"> @error("email")
                {{ $message }}
              @enderror </span>
          <label>Email</label>
          <input type="email" name="email" placeholder="Email Address" value="{{$value->email}}" class="form-control">
        </div>
        <div class="form-group">
          <span style="color: red;"> @error("job_des")
                {{ $message }}
              @enderror </span>
          <label>Job Description</label>
          <textarea name="job_des" class="form-control" placeholder="Job Description here">{{$value->job_description}}</textarea>
        </div>
        <div class="form-group">
          <span style="color: red;"> @error("date")
                {{ $message }}
              @enderror </span>
          <label>Application Deadline</label>
          <input type="date" name="date" class="form-control" value="{{$value->application_deadline}}">
        </div>
        <div class="form-group">
          <span style="color: red;"> @error("job_attach")
                {{ $message }}
              @enderror </span>
          <label>Job Attachment</label>
          <input type="file" name="job_attach" class="form-control">
        </div>
        
        <div class="text-center">
          <button class="btn btn-primary" type="submit"> Update Job details</button>
        </div>
      </form>
          </div>
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

