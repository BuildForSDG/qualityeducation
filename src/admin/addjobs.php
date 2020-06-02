<link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('Assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Assets/js/bootstrap.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('Assets/js/bootstrap.bundle.min.js')}}"></script>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-6 col-lg-6">
			@if(session('job'))
<div class="alert alert-success">
	{{session('job')}}
</div>
@endif
			<form action="jobss" method="post" enctype="multipart/form-data" accept-charset="utf-8">
				{{ csrf_field() }}
				<div class="form-group">
					<span style="color: red;"> @error("job_title")
								{{ $message }}
							@enderror </span>
					<label>Job Title</label>
					<input type="text" name="job_title" placeholder="Job Title" class="form-control">
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