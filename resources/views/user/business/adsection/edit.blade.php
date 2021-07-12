@extends('layouts.app',['title'=>'Edit Ad','request'=>'edit-ads'])
@push('css')
<style type="text/css">
	.custom{
		margin-top: 5px;
	}.h-revert{
        height: revert !important;
    }
    .h-900{
        height: 900px !important;
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
                	<li class="breadcrumb-item active">Edit Ad</li>
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
                	<h5>Update Ads</h5><span>Please Upload Content According To Media Type </span>
                	@include('alerts.error-alert',['ses_name'=>'error'])
                	@include('alerts.success-alert',['ses'=>'success'])
                </div>
                <div class="card-body">
                	<form class="form-vertical" action="{{route('Ads.update',$ad->id)}}" method="post" enctype="multipart/form-data">
                		@csrf
                		@method('PUT')
                		<input type="hidden" name="type_name" value="{{$ad->type_name}}">
						<div class="form-group row">  
		  					<div class="col-md-3">
		  						<label class="control-label" for="adtitle">Ad Title</label>
		  						<input id="adtitle" name="adtitle" value="{{$ad->title}}" type="text" placeholder="Enter ad title" class="form-control">
		  						@include('alerts.errorfield',['field'=>'adtitle'])
							</div>
	 						<div class="col-md-3">
	 							<label class="control-label"  for="mediatype">Media Type</label>
	    						<select id="mediatype" name="mediatype" class="form-control">
	    							<option selected="selected">Select media type</option>
	    							@foreach($mediatype as $key=>$m)
	      						<option value="{{$m->id}}" {{$m->id==$ad->media_id ? 'selected' : ''}}>{{$m->name.' ('.$m->format.')'}}</option>
	      						@endforeach
	    						</select>
	    						@include('alerts.errorfield',['field'=>'mediatype'])
	  						</div>
	  						<div class="col-md-3">
	  							<label class="control-label" for="filebutton">Ads Content</label>
	    						<input id="ads" name="ads" value="{{$ad->file_name}}" class="input-file" type="file" accept="">
	    						@include('alerts.errorfield',['field'=>'ads'])
	  						</div>
	  						<div class="col-md-3 btn-group">
	    						<button id="btnupload" name="btnupload" type="submit" class="btn btn-primary mt-4">Save Changes</button>
	    						<button id="btnupload" name="btnupload" type="button" onclick="window.history.go(-1); return false;" class="btn btn-info mt-4">Cancel</button>
	  						</div>
						</div>
					</form>
					     @if($ad->type_name=='video')
                                        <div class="img-container">
                                            <div class="my-gallery" id="aniimated-thumbnials" itemscope="">
                                                <figure itemprop="associatedMedia" itemscope="">
                                                   <!--  <a href="#" itemprop="contentUrl" data-size="1600x950"> -->
                                                        <video class="img-fluid rounded" src="{{asset($ad->file_path)}}" width="1535px !important" height="500px !important" itemprop="thumbnail" alt="gallery" controls controlsList="nodownload"></video>
                                                    <!-- </a> -->
                                                </figure>
                                            </div>
                                        </div>
                                         
                                        @elseif($ad->type_name=='audio')
                                        <div class="img-container">
                                            <div class="my-gallery" id="aniimated-thumbnials" itemscope="">
                                                <figure itemprop="associatedMedia" itemscope="">
                                                        <audio class="img-fluid rounded h-revert" controls controlsList="nodownload">
                                                            <source src="{{asset($ad->file_path)}}">
                                                        </audio>
                                                </figure>
                                            </div>
                                        </div>
                                        @elseif($ad->type_name=='document')
                                        <div class="img-container">
                                            <div class="my-gallery" id="aniimated-thumbnials" itemscope="">
                                                <figure itemprop="associatedMedia" itemscope="" >
                                                        <iframe  class="img-fluid rounded h-900" src="{{asset($ad->file_path)}}" width="1535px !important"  itemprop="thumbnail" alt="gallery"></iframe>
                                                    {{--<figcaption itemprop="caption description">{{$ad->belongtomedia->name}}</figcaption>--}}
                                                </figure>
                                            </div>
                                        </div>
                                        @elseif($ad->type_name=='image')
                                        <div class="img-container">
                                            <div class="my-gallery" id="aniimated-thumbnials" itemscope="">
                                                <figure itemprop="associatedMedia" itemscope="">
                                                        <img class="img-fluid rounded" src="{{asset($ad->file_path)}}" itemprop="thumbnail" alt="gallery">
                                                    {{--<figcaption itemprop="caption description">{{$ad->belongtomedia->name}}</figcaption>--}}
                                                </figure>
                                            </div>
                                        </div>
                                        @endif
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
	$('#ads').on('change',function(){
		$('.img-container').remove();
	});
</script>
@endpush