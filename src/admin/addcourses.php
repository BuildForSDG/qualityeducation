<link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('Assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Assets/js/bootstrap.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('Assets/js/bootstrap.bundle.min.js')}}"></script>
<div class="container">
	<div class="row" >
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