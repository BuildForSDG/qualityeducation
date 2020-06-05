<link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('Assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Assets/js/bootstrap.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('Assets/js/bootstrap.bundle.min.js')}}"></script>
<body>
	<h3 class="text-center" >welcome to fundisha Admins Portal</h3>
					<div class="container ">
					<div class="row">
						<div style="margin-top: 20vh; margin-left: auto;display: block; margin-right: auto;" class="col-sm-12 col-md-6 col-lg-6 card summary bg-light text-black text-center">
							 @if(session('login'))
							<div class="alert alert-success">
							{{session('login')}}
							</div>
							@endif
							<form action="loginadmin" method="post">
							{{ csrf_field() }}
							<p class="text-center">Admin Signin</p>
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
								<div class="text-center"><button type="submit" class="btn btn-primary">Sign in</button></div>
								<div class="text-center"><a href="register" class="btn btn-link">create account</a></div>
									</form>
						</div>
							</div>
					</div></body>
			

			<style type="text/css">
	h3{
		color: white;
	}
	body{
    background-image: url("Assets/images/bl.jpeg");
    background-attachment: scroll;
    background-size: cover;
    background-repeat: no-repeat;
    width: 100%;
}
</style>