@extends('layouts.app',['title'=>'Upload Ad','request'=>'upload-ads'])
@push('css')
<style type="text/css">
	.custom{
		margin-top: 5px;
	}
</style>
@endpush
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Ad section</h3>
            </div>
            <div class="col-6">
            	<ol class="breadcrumb">
                	<li class="breadcrumb-item"><a href="{{route('dashboard.index')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Ad section</li>
                	<li class="breadcrumb-item active">Upload Ad</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                	<h5>Upload Ads</h5><span>Please Upload Content According To Media Type </span>
                	@include('alerts.error-alert',['ses_name'=>'error'])
                	@include('alerts.success-alert',['ses'=>'success'])
                </div>
                <div class="card-body">
                	<form class="form-vertical" action="{{route('Ads.store')}}" method="POST" enctype="multipart/form-data">
                		@csrf
                		<input type="hidden" name="type_name">
						<div class="form-group row">  
		  					<div class="col-md-3">
		  						<label class="control-label" for="adtitle">Ad Title</label>
		  						<input id="adtitle" name="adtitle" value="{{old('adtitle')}}" type="text" placeholder="Enter ad title" class="form-control">
		  						@include('alerts.errorfield',['field'=>'adtitle'])
							</div>
	 						<div class="col-md-3">
	 							<label class="control-label"  for="mediatype">Media Type</label>
	    						<select id="mediatype" name="mediatype" class="form-control">
	    							<option selected="selected">Select media type</option>
	    							@foreach($mediatype as $key=>$m)
	      						<option value="{{$m->id}}">{{$m->name.' ('.$m->format.')'}}</option>
	      						@endforeach
	    						</select>
	    						@include('alerts.errorfield',['field'=>'mediatype'])
	  						</div>
	  						<div class="col-md-3">
	  							<label class="control-label" for="filebutton">Ads Content</label>
	    						<input id="ads" name="ads" value="{{old('ads')}}" class="input-file" type="file" accept="">
	    						@include('alerts.errorfield',['field'=>'ads'])
	  						</div>
	  						<div class="col-md-3">
	    						<button id="btnupload" name="btnupload" type="submit" class="btn btn-primary mt-4">Upload</button>
	  						</div>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection
@push('js')
<script type="text/javascript">
	$('#mediatype').on('change',function(){
		$.ajax({
			url:"{{route('get-format')}}",
			type:"get",
			data:{
				media_id:$(this).val(),
			},
			success:function(resp){
				$('#ads').attr('accept',resp);
				console.log(resp);
			},
			error:function(resp){
				console.log(resp);
			},
		});
	});
</script>
@endpush