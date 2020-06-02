<link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('Assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Assets/js/bootstrap.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('Assets/js/bootstrap.bundle.min.js')}}"></script>

<div class="btn-group navbar-header">
		<a class="btn brn-default" href="admin">Home</a>
		<div class="dropdown" >
		<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownmenu1" data-toggle="dropdown">Courses<span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownmenu1">
			<li><a href="addcourse" role="menuitem">Add course</a> </li>
			<li><a href="manage" role="menuitem">Manage Courses</a> </li>
			<li><a href="#" role="menuitem">Courses Certification</a> </li>
			<li><a href="#" role="menuitem">View Enrolled</a> </li>
			<li><a  href="#" role="menuitem">View Certified</a> </li>	
		</ul>
		</div>
		<div class="dropdown" >
		<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownmenu1" data-toggle="dropdown">Jobs<span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownmenu1">
			<li><a href="addjob" role="menuitem">Add Job</a> </li>
			<li><a href="manage" role="menuitem">Manage Jobs</a> </li>
		</ul>
		</div>

		<button class="btn btn-primary" id="logi" data-toggle="modal" data-target="#login">login</button>
		<button class="btn btn-primary" id="regis" data-toggle="modal" data-target="#form">register</button>
		<button class="btn btn-danger" id="logout" data-toggle="modal" data-target="#logo">logout</button>
	</div>
	<hr>
	{{ csrf_field() }}
	<span><?php if(session()->has('email')){
	echo ('welcome again '.session('email'));
} ?></span>
	@if(session('status'))
<div class="alert alert-success">
	{{session('status')}}
</div>
@endif
			<div class="modal fade" id="form">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-head">
						<button data-dismiss="modal" class="close">
							<span>&times</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="register" method="post">
							{{ csrf_field() }}
							<div class="form-group">
								<span style="color: red;"> @error("email")
								{{ $message }}
							@enderror </span>
								<label>Email</label>
								<input type="email" name="email" value="{{old('email')}}" class="form-control">
								<div class="form-group">
									<span style="color: red;"> @error("username")
								{{ $message }}
							@enderror </span>
									<label>username</label>
									<input type="text" value="{{old('username')}}" name="username" class="form-control">
								</div>
								<div class="form-group">
									<span style="color: red;"> @error("password")
								{{ $message }}
							@enderror </span>
									<label>Password</label>
									<input type="password" name="password" class="form-control">
								</div>
								<div class="form-group">
									<label>confirm password</label>
									<input type="password" name="confirmed" class="form-control">
								</div>
							</div>
							<button type="submit" class="btn btn-primary">subscribe</button>
						</form>
					</div>
				</div>
				</div>
			</div>
			<div class="modal fade" id="login">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-head">
						<button data-dismiss="modal" class="close">
							<span>&times</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="login" method="post">
							{{ csrf_field() }}
							<div class="form-group">
								<span style="color: red;"> @error("email")
								{{ $message }}
							@enderror </span>
								<label>Email</label>
								<input type="email" name="email" value="{{old('email')}}" class="form-control">
								</div>
								<div class="form-group">
									<span style="color: red;"> @error("password")
								{{ $message }}
							@enderror </span>
									<label>Password</label>
									<input type="password" name="password" class="form-control">
								</div>
								<span>
									@error("status")
								{{ $message }}
							@enderror
								</span>
								<button type="submit" class="btn btn-secondary">Sign in</button>
									</form>
							</div>
							
					
					</div>
				</div>
				</div>
				<div class="modal fade" id="logo">
				<div class="modal-dialog">
					<div class="modal-content">
						<p class="text-center"><?php
							if(session()->has('email')){
	                         echo (session('email'));
                             }?></p>
			
					<div class="modal-body">
						<form action="logout" method="post">
                            {{ csrf_field() }}
							<div class="form-group">
								<label>Are you sure you want to logout?</label>
							</div>
								<button data-dismiss="modal" class="btn btn-secondary">cancel</button>
								<button type="submit" class="btn btn-primary">Yes</button>
									</form>
							</div>
							
					
					</div>
				</div>
				</div>
<style type="text/css">
	
	.btn{
		margin-left: 10px;
		margin-right: 10px;
		margin-top: 1vh;
	}
</style>
