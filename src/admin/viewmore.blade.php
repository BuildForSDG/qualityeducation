 @include('admin.admin')
<div style="background-color: #efefef;">
<div><h6 ><a href="manage"><span style="font-size: 30px;">&#8592;</span></a> Fundisha Online Learning. Certify with us</h6></div>
 @foreach($course as $key => $value)
<div class="container card summary bg-light text-black col-sm-12 col-md-12 col-lg-12" style="padding: 0px;">
	<div class="row">
	<div class="col-sm-12 col-md-4 col-lg-4">
		<a style="color: blue;" href="#">{{$value->course_title}}</a><br>
		@for($i=0;$i<@count($chapter);$i++)
 <a style="color: blue;" href='getchapter?id={{$chapter[$i]->id}}&c_no={{$chapter[$i]->c_no}}&course_id={{$chapter[$i]->course_id}}'>Chapter {{$chapter[$i]->c_no}} {{$chapter[$i]->title}}</a><br>	 
  @endfor
  <button class="btn btn-secondary"  data-toggle="collapse" data-target="#chap">Add chapter</button>
    </div>
    <div class="col-sm-12 col-md-8 col-lg-8">
    	@if(@count($ada)>0)
    	@for($i=0;$i<@count($ada);$i++)
 <p>{{$ada[$i]->c_no}} {{$ada[$i]->title}}</p>
 <p>{{$ada[$i]->des}}</p>
    	<video style="height: 20vh; width: 20%;" controls=""   poster='images/{{$ada[$i]->video}}' src='images/{{$ada[$i]->video}}'></video>
    	<div style="padding: 10px;"><button  class="btn btn-danger"  data-toggle="modal" data-target="#{{$ada[$i]->c_no}}">Delete this chapter</button></div>
    	 <div class="modal fade" id="{{$ada[$i]->c_no}}">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-body">
            <form action="deletechapter" method="post">
                            {{ csrf_field() }}
              <div class="form-group">
                <label>Are you sure you want to delete this course?</label>
                <input type="text" name="id" hidden="true" value="{{$ada[$i]->c_no}}">
              </div>
                <div class="text-center"><button data-dismiss="modal" class="btn btn-secondary">cancel</button>
                <button type="submit" class="btn btn-primary">Yes</button></div>
                  </form>
              </div>
              
          
          </div>
        </div>
        </div>
  @endfor
    	@else
    	<p>{{$value->course_content}}</p>
    	<video style="height: 20vh; width: 20%;" controls=""   poster='images/{{$value->course_image}}' src='images/{{$value->course_video}}'></video>
    	@endif
    	<div class="container collapse card summary bg-light text-black col-sm-12 col-md-6 col-lg-6" id="chap">
	<div class="row">
			@if(session('status'))
<div class="alert alert-success">
	{{session('status')}}
</div>
@endif
		<form action="add_chapter" role='form' style="padding: 10px;"  method="post" enctype="multipart/form-data" accept-charset="utf-8">
							{{ csrf_field() }}
							<p class="text-center">Add course Chapter</p>
							<input type="text" name="course_id" hidden="true" value="{{$value->course_id}}"  class="form-control">
							<div class="form-group">
								<span style="color: red;"> @error("c_no")
								{{ $message }}
							@enderror </span>
								<label>Chapter Number</label>
								<input type="text" name="c_no"  class="form-control">
								</div>
								<div class="form-group">
									<span style="color: red;"> @error("title")
								{{ $message }}
							@enderror </span>
									<label>Chapter Title</label>
									<input type="text" name="title" class="form-control">
								</div>
								<div class="form-group">
									<span style="color: red;"> @error("des")
								{{ $message }}
							@enderror </span>
									<label>Chapter Description</label>
									<textarea name="des" class="form-control" placeholder="description here...."></textarea>
								</div>
								<div class="form-group">
									<span style="color: red;"> @error("file")
								{{ $message }}
							@enderror </span>
									<label>Chapter Video</label>
									<input type="file" name="video" class="form-control">
								</div>
								<button type="submit" class="btn btn-primary">Add chapter</button>
									</form>
		
	</div>
</div>
    	
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