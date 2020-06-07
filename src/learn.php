<?php
?>
<link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('Assets/css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('Assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Assets/js/bootstrap.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('Assets/js/bootstrap.bundle.min.js')}}"></script>
<div style="background-color: #efefef;">
<div style="width: 100%; background: blue; color: white; height: 50px;">
    <header>
    <nav> 
    <a href="home" onclick="openNav()" style="font-size:30px;cursor:pointer"><img class="nav1" src="Assets/logos/hm.png"></a>
    <h5 class="text-center" >Fundisha Online Learning. Certify with us Today</h5>
    </nav></header>
</div>
<a style="color: blue;" href="morecourses"><span style="font-size: 30px;">&#8592;</span></a> 
 @foreach($course as $key => $value)
<div class="container card summary bg-light text-black col-sm-12 col-md-12 col-lg-12" style="padding: 0px;">
	<div class="row">
	<div class="col-sm-12 col-md-2 col-lg-2">
		<a style="color: blue;" href="#">{{$value->course_title}}</a><br>
		@for($i=0;$i<@count($chapter);$i++)
 <a style="color: blue;" href='getchapters?id={{$chapter[$i]->id}}&c_no={{$chapter[$i]->c_no}}&course_id={{$chapter[$i]->course_id}}'>Chapter {{$chapter[$i]->c_no}} {{$chapter[$i]->title}}</a><br>
  @endfor
    </div>
    <div class="col-sm-12 col-md-10 col-lg-10">
    	@if(@count($ada)>0)
    	@for($i=0;$i<@count($ada);$i++)
 <p>{{$ada[$i]->c_no}} {{$ada[$i]->title}}</p>
 <p>{{$ada[$i]->des}}</p>
    	<video style="height: auto; width: 80%;" class="text-center" controls=""   poster='images/{{$ada[$i]->video}}' src='images/{{$ada[$i]->video}}'></video>
  @endfor
    	@else
    	<p>{{$value->course_content}}</p>
    	<video style="height: auto; width: 80%;"  controls=""   poster='images/{{$value->course_image}}' src='images/{{$value->course_video}}'></video>
    	@endif
    	
    </div>
	</div>
</div>
@endforeach
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
a{
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


