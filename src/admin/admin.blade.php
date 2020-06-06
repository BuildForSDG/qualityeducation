    <link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('Assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Assets/js/bootstrap.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('Assets/js/bootstrap.bundle.min.js')}}"></script>

<div class="btn-group navbar-header" style="background-color: white;">
		<a class="btn btn-primary" href="admin" style="margin-left: 10px;margin-right: 10px;margin-top: 1vh;">Home</a>
		<div class="dropdown" >
		<button class="btn btn-primary dropdown-toggle" style="margin-left: 10px;margin-right: 10px;margin-top: 1vh;" type="button" id="dropdownmenu1" data-toggle="dropdown">Courses<span class="caret"></span>
		</button>
		<ul style="background-color: grey; color: white;" class="dropdown-menu" role="menu" aria-labelledby="dropdownmenu1">
			<li><a href="addcourse" role="menuitem">Add course</a> </li>
			<li><a href="manage" role="menuitem">Manage Courses</a> </li>
			<li><a href="#" role="menuitem">Courses Certification</a> </li>
			<li><a href="#" role="menuitem">View Enrolled</a> </li>
			<li><a  href="#" role="menuitem">View Certified</a> </li>	
		</ul>
		</div>
		<div class="dropdown" >
		<button class="btn btn-primary dropdown-toggle" style="margin-left: 10px;margin-right: 10px;margin-top: 1vh;" type="button" id="dropdownmenu2" data-toggle="dropdown">Jobs<span class="caret"></span>
		</button>
		<ul style="background-color: grey; color: white;" class="dropdown-menu" role="menu" aria-labelledby="dropdownmenu2">
			<li><a href="addjob" role="menuitem">Add Job</a> </li>
			<li><a href="managejob" role="menuitem">Manage Jobs</a> </li>
		</ul>
		</div>

		<button style="margin-left: 10px;margin-right: 10px;margin-top: 1vh;color: white;" class="btn btn-primary" id="logi"><a style="color: white;" href="adminlogin">login</a></button>
		<button style="margin-left: 10px;margin-right: 10px;margin-top: 1vh;" class="btn btn-primary" id="regis"><a style="color: white;" href="register">Signup</a> </button>
		<button style="margin-left: 10px;margin-right: 10px;margin-top: 1vh;" class="btn btn-danger" id="logout" data-toggle="modal" data-target="#logo">logout</button>
	</div>
	<hr>
	{{ csrf_field() }}
	
				<div class="modal fade" id="logo">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-body">
						<form action="logout" method="post">
                            {{ csrf_field() }}
							<div class="form-group">
								<label>Are you sure you want to logout?</label>
							</div>
								<div class="text-center"><button data-dismiss="modal" class="btn btn-secondary">cancel</button>
								<button type="submit" class="btn btn-primary">Yes</button></div>
									</form>
							</div>
							
					
					</div>
				</div>
				</div>
			 @if(session('email'))
				<style type="text/css">
					#logi,#regis{
						display: none;
					}
					#logout{
						display: block;
					}

               </style>	
               @else
               <style type="text/css">
               	#logi,#regis{
						display: block;
					}
					#logout,#dropdownmenu1,#dropdownmenu2{
						display: none;
					}


               </style>	

			 @endif
<style type="text/css">

</style>
