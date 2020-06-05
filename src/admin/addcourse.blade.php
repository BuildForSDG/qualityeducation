
@include('admin.admin')
<div class="container col-sm-12 col-md-12 col-lg-12 card summary bg-light text-black">
	<div class="row" >
		<div class="col-sm-12 col-md-3 col-lg-3">
            <a  class="btn btn-link" href="addcourse">Add Courses</a><br>
            <a  class="btn btn-link" href="manage">Manage courses</a><br>
            <a class="btn btn-link" href="addjob">Add Jobs</a><br>
            <a class="btn btn-link" href="managejob">Manage Jobs</a><br>
            <a class="btn btn-link" href="">Log Out</a><br>
            <img class="nav1" src="Assets/Imgs/registered.jpg">
         </div>
		<div class="col-sm-12 col-md-6 col-lg-6" >
			@if(session('status'))
<div class="alert alert-success">
	{{session('status')}}
</div>
@endif
		<form role="form" action="course" method="post" enctype="multipart/form-data" accept-charset="utf-8">
			{{ csrf_field() }}
			<p class="text-center">Add Course</p>
			<div class="form-group">
				<span style="color: red;"> @error("course_id")
								{{ $message }}
							@enderror </span>
				<label>Course Id:</label>
				<input type="text" name="course_id" class="form-control">
			</div>
			<div class="form-group">
				<span style="color: red;"> @error("course_title")
								{{ $message }}
							@enderror </span>
				<label>Course Title:</label>
				<input type="text" name="course_title" class="form-control">
			</div>
			<div class="form-group">
				<label>Course Image:</label>
				<span style="color: red;"> @error("course_image")
								{{ $message }}
							@enderror </span>
				<input type="file" name="course_image" class="form-control">
			</div>
			<div class="form-group">
				<span style="color: red;"> @error("course_video")
								{{ $message }}
							@enderror </span>
				<label>Course Video</label>
				<input type="file" name="course_video" class="form-control">
			</div>
			<div class="form-group">
				<span style="color: red;"> @error("course_content")
								{{ $message }}
							@enderror </span>
				<label>Course Content:</label>
				<textarea type="text" name="course_content" class="form-control"></textarea>
				<div class="">
					<button style="margin-top: 1vh;" type="submit" class="btn btn-primary">Add Course</button>
				</div>
			</div>
		</form>
	</div></div>
	
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

.container{
	padding: 15px;
}
.nav1{
margin-left: 5px;
    float: left;
    height: 50px
}
a,button{
	color: white;
}
   </style>}
