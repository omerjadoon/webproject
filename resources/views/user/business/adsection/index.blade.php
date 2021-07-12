@extends('layouts.app',['title'=>'Ads Listing','request'=>'ads'])
@push('css')
<style type="text/css">
	.custom{
		margin-top: 5px;
	}
    .h-revert{
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
                	<li class="breadcrumb-item active">Ads List</li>
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
                    <form action="{{route('Ads.index')}}" method="get">
                    <div class="row">
                        
                        <div class="col-md-3">
                            <h5>Ads Listing</h5>
                        </div>
                        <div class="col-md-3">
                                <input id="adtitle" name="adtitle" value="{{\Request::get('adtitle')}}" type="text" placeholder="Enter ad title" class="form-control">
                        </div>
                        <div class="col-md-3">
                                <select id="mediatype" name="mediatype" class="form-control">
                                    <option selected="selected" value="">Select media type</option>
                                    @foreach($mediatype as $key=>$m)
                                <option value="{{$m->id}}" {{$m->id == \Request::get("mediatype") ? 'selected' : ''}}>{{$m->name.' ('.$m->format.')'}}</option>
                                @endforeach
                                </select>
                        </div>
                        <div class="col-md-3 btn-group">
                            <button id="btnsearch" type="submit" class="btn btn-primary">Search</button>
                            <a class="btn btn-info" href="{{route('Ads.index')}}">{{(\Request::get("mediatype") || \Request::get('mediatype')) ? 'Reset' : 'Refresh'}}</a>
                        </div>
                    
                    </div>
                    </form>
                    <div class="row">
                        <div class="col-md-12">
                	       @include('alerts.success-alert',['ses'=>'success'])
                       </div>
                   </div>
                </div>
                <div class="card-body" style="background: #f8f8f8 !important;">
                	@if($adsection->count()>0)
                	@foreach($adsection as $key=>$ad)
                	<div class="container-fluid">
                		<div class="row">
                			<div class="col-sm-12">
                  				<div class="card">
                  					<div class="card-header">
                  						<div class="row">
                  							<div class="col-md-8">
                								<h5>{{$ad->title}}</h5>
                							</div>
                							<div class="col-md-4 text-right">
                								<div><b>{{$ad->created_at->format('Y M,d h:i a')}}</b></div>
                                                <span>No Of Participants : <b>{{$ad->adhasmnayparticpnt->count()}}</b></span>
                							</div>
                						</div>
                					</div>
                					<div class="card-body">
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
                                    @if(!$ad->adhasmnayparticpnt->count()>0)
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4 btn-group">
                                                <a class="btn btn-primary" href="{{route('Ads.edit',$ad->id)}}" ><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger sweet-5" ad-id="{{$ad->id}}"><i class="fa fa-trash"></i></a>
                                                
                                            </div> 
                                            <div class="col-md-4"></div>
                                       </div>
                                    </div>
                                    @endif
                  				</div>
                			</div>
               		 	</div>
           			</div>
           			@endforeach
           			@else
                    <div class="container-fluid">
                        <div class="row">
                            <div clas="col-md-12 text-center">
                            <h6> No Result Found</h6> 
                            </div>
                        </div>
                    </div>
                    @endif
                     <div class="row">
                        <div class="col-md-4 offset-4">
                            {{$adsection->links()}}
                        </div>
                    </div>
            	</div>
            </div>
        </div>
    </div>
</div> 



@endsection
@push('js')
<script type="text/javascript">
    $('.sweet-5').on('click', function(){
        ad_id=$(this).attr('ad-id');
        var url = '{{ route("Ads.destroy", ":ad_id") }}';
        url = url.replace(':ad_id', ad_id);

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Ad!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                            $.ajax({
                            url:url,
                            type:"DELETE",
                            data:{
                                '_token':"{{csrf_token()}}",
                            },
                            success:function(res){
                                if(res.status==200){
                                 swal("Poof! Your Ad has been deleted!", {
                                    icon: "success",
                                });
                               location.reload();
                                }else if(res.status==500){
                                     swal("Oh! Something Went Wrong!", {
                                    icon: "danger",
                                });
                                }                        
                            },error:function(res){
                                console.log(res);
                            },
                            }); 
                    } else {
                        swal("Your Ad is safe!");
                    }
                })
        });
</script>
@endpush