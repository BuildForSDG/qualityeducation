@include('project.admin')
					<div class="container ">
					<div class="row">
						<div class="col-sm-12 col-md-6 col-lg-6 card summary bg-light text-black">
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
					</div>
			