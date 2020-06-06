@include('admin.admin')
<div class="container  col-sm-12 col-md-12 col-lg-12 card summary bg-light text-black">
	<div class="row">
		<div class="col-sm-12 col-md-3 col-lg-3">
            <a  class="btn btn-link" href="addcourse">Add Courses</a><br>
            <a  class="btn btn-link" href="manage">Manage courses</a><br>
            <a class="btn btn-link" href="addjob">Add Jobs</a><br>
            <a class="btn btn-link" href="managejob">Manage Jobs</a><br>
            <a class="btn btn-link" href="">Log Out</a><br>
            <img class="nav1" src="Assets/Imgs/registered.jpg">
         </div>
		<div class="col-sm-12 col-md-6 col-lg-6">
			@if(session('job'))
<div class="alert alert-success">
	{{session('job')}}
</div>
@endif
			<form action="jobss" method="post" enctype="multipart/form-data" accept-charset="utf-8">
				{{ csrf_field() }}
				<h4 class="text-center">Add job here</h4>
				<div class="form-group">
					<span style="color: red;"> @error("job_title")
								{{ $message }}
							@enderror </span>
					<label>Job Title</label>
					<input type="text" name="job_title" placeholder="Job Title" class="form-control">
				</div>
				<div class="form-group">
					<span style="color: red;"> @error("email")
								{{ $message }}
							@enderror </span>
					<label>Email</label>
					<input type="email" name="email" placeholder="Email Address" class="form-control">
				</div>
				<div class="form-group">
					<span style="color: red;"> @error("job_des")
								{{ $message }}
							@enderror </span>
					<label>Job Description</label>
					<textarea name="job_des" class="form-control" placeholder="Job Description here">
						
					</textarea>
				</div>
				<div class="form-group">
					<span style="color: red;"> @error("date")
								{{ $message }}
							@enderror </span>
					<label>Application Deadline</label>
					<input type="date" name="date" class="form-control">
				</div>
				<div class="form-group">
					<span style="color: red;"> @error("job_attach")
								{{ $message }}
							@enderror </span>
					<label>Job Attachment</label>
					<input type="file" name="job_attach" class="form-control">
				</div>
				
				<div class="text-center">
					<button class="btn btn-primary" type="submit"> Post Job</button>
				</div>
			</form>

			
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