@include('project.admin')
					<div class="container ">
					<div class="row">
					       <div class="col-sm-12 col-md-6 col-lg-6 card summary bg-light text-black">
			                @if(session('status'))
							<div class="alert alert-success">
							{{session('status')}}
							</div>
							@endif

					       	<form action="adminregister" method="post">
							{{ csrf_field() }}
							<p class="text-center">Admin Signup</p>
							<div class="form-group">
								<span style="color: red;"> @error("firstname")
								{{ $message }}
							@enderror </span>
								<label>FirstName</label>
								<input type="text" name="firstname" class="form-control">
							</div>
							<div class="form-group">
								<span style="color: red;"> @error("lastname")
								{{ $message }}
							@enderror </span>
								<label>Lastname</label>
								<input type="text" name="lastname" class="form-control">
							</div>
							<div class="form-group">
								<span style="color: red;"> @error("email")
								{{ $message }}
							@enderror </span>
								<label>Email</label>
								<input type="email" name="email" class="form-control">
							</div>
								<div class="form-group">
									<span style="color: red;"> @error("mobile")
								{{ $message }}
							@enderror </span>
									<label>Mobile</label>
									<input type="number"  name="mobile" class="form-control">
								</div>
								<div class="form-group">
									<span style="color: red;"> @error("country")
								{{ $message }}
							@enderror </span>
									<label>Select Country</label>
									<select class="form-control" name="country">
                <option value="ke">Kenya</option>
                <option value="ug">Uganda</option>
                <option value="tz">Tanzania</option>
                <option value="gh">Ghana</option>
                <option value="ng">Nigeria</option>
                <option value="cm">Cameroun</option>
                <option value="rw">Rwanda</option>
                <option value="sa">South Africa</option>
                <option value="zm">Zambia</option>
                </select> 
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
							<div class="text-center"><button type="submit" class="btn btn-primary">Sign Up</button></div>
						</form>
					       </div>
					</div>
				</div>
			