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
    }.byactive{
        display: block;
    }.notactive{
        display: none;
    }
    textarea{
        width: inherit !important;
        height: 200px !important;
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
                	<li class="breadcrumb-item"><a href="{{route('media_dashboard.index')}}"><i data-feather="home"></i></a></li>
                    <!-- <li class="breadcrumb-item">Ad section</li> -->
                	<li class="breadcrumb-item active">Ads Detail</li>
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
                    <form action="{{route('ad-detail.index')}}" method="get">
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
                            <a class="btn btn-info" href="{{route('ad-detail.index')}}">{{(\Request::get("mediatype") || \Request::get('mediatype')) ? 'Reset' : 'Refresh'}}</a>
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
                                                <span><b> Posted By: </b>{{$ad->belongtouser->title.' '.$ad->belongtouser->f_name.' '.$ad->belongtouser->l_name}}</span>
                							</div>
                							<div class="col-md-4 text-right">
                								<b>{{$ad->created_at->format('Y M,d h:i a')}}</b>
                							</div>
                						</div>
                					</div>
                					<div class="card-body">
                                        @if($ad->type_name=='video')
                                        <div class="img-container">
                                            <div class="my-gallery" id="aniimated-thumbnials" itemscope="">
                                                <figure itemprop="associatedMedia" itemscope="">
                                                   <!--  <a href="https://www.google.com" target="_blank" itemprop="contentUrl" data-size="1600x950"> -->

                                                        <video class="img-fluid rounded" src="{{asset($ad->file_path)}}" width="1535px !important" height="500px !important" itemprop="thumbnail" alt="gallery" controls controlsList="nodownload"></video>
                                                    <!-- </a> -->
                                                </figure>
                                            </div>
                                        </div>
                                         
                                        @elseif($ad->type_name=='audio')
                                        <div class="img-container">
                                            <div class="my-gallery" id="aniimated-thumbnials" itemscope="">
                                                <figure itemprop="associatedMedia" itemscope="">
                                                    <!--  <a href="https://www.google.com" target="_blank" itemprop="contentUrl" data-size="1600x950"> -->
                                                        <audio class="img-fluid rounded h-revert"  controls autoplay loop controlsList="nodownload" >
                                                            
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
                                        
                                        <div class="row notactive view" id="adid-{{$ad->id}}">
                                            <div class="col-md-8 offset-2">
                                                <div class="card" style="background: #f8f8f8 !important;">
                                                <div class="card-header">
                                                    <h5 class="text-center">Business Detail</h5>
                                                 </div>
                                                 <div class="card-body">
                                                    <div class="row mt-3">
                                                        <div class="col-md-4">
                                                            <b> Name : </b> {{$ad->belongtouser->businessdetail->buisness_name}}
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b> Recent Campaign : </b> {{$ad->belongtouser->businessdetail->recent_campaigns}}
                                                        </div>
                                                        <div class="col-md-4">
                                                             <b> Industry : </b> {{$ad->belongtouser->businessdetail->industry_name}}
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <b> Nature : </b> {{$ad->belongtouser->businessdetail->nature_of_buisness}}
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b> Webiste : </b> {{$ad->belongtouser->businessdetail->website_link}}
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-12">
                                                             <b> Detail : </b> {{$ad->belongtouser->businessdetail->detail_of_buisness}}
                                                        </div>
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                        </div>
                					</div>
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6 btn-group">
                                                <button type="button" status="0" ad-id="adid-{{$ad->id}}" class="btn btn-primary viewmore">View More</button>
                                                <button type="button" ad-id="{{$ad->id}}" typename="{{$ad->type_name}}" class="btn btn-success prti">{{!$ad->ad_participation() ? 'Participate In Campaign' : 'View HTML'}}</button>
                                            </div> 
                                            <div class="col-md-3"></div>
                                       </div>
                                    </div>
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
<!-- modal  -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"  aria-modal="true" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <div class="row">
                                <div class="col-md-12">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                        </div>
                        <div class="col-md-12">
                            <p class="text-info">Copy Below HTML and place on your empty slot for getting leads</p>
                        </div>
                            </div>
                            <!-- <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button> -->
                          </div>
                          <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12">
                                    <textarea readonly id="mytext"></textarea>
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-primary" type="button" id="closemodal" data-bs-original-title="" title="">Close</button>
                            <button class="btn btn-secondary" id="copyhtml" type="button" data-bs-original-title="" title="">Copy Html</button>
                          </div>
                        </div>
                      </div>
                    </div>

@endsection
@push('js')
<script type="text/javascript">
$('.viewmore').on('click',function(){
    adid=$(this).attr('ad-id');
    if($(this).attr('status')==0){
        // if ($(".byactive").length > 0)
        //     {
        //         $('.view').removeClass('byactive').addClass('notactive');
        //     }
        $('#'+adid).removeClass('notactive').addClass('byactive');
        $(this).attr('status',1);
        $(this).html('See Less');
    }
   else if($(this).attr('status')==1){
        $('#'+adid).removeClass('byactive').addClass('notactive');
        $(this).attr('status',0);
        $(this).html('View More');
    }
});
$('.prti').on('click',function(){
    var $this = $(this);
    ad_id=$(this).attr('ad-id');
    type_name=$(this).attr('typename');
    url="{{route('download_media',['id'=>'adid'])}}";
    url=url.replace('adid',ad_id);
    // window.location.href=url;
    $.ajax({
        url:"{{route('ad-detail.create')}}",
        type:'get',
        data:{
            id:ad_id,
            type_name:type_name,
        },beforeSend:function(){
            $this.html('Loading.....');
        },
        success:function(resp){
        
            $this.html('View HTML');
            $data=JSON.parse(resp);
            $('#mytext').val($data.html);
            $('#exampleModalLabel').html($data.title);
            $('#myModal').modal('show');

        },error:function(resp){
            $data=JSON.parse(resp);
            console.log($data.html);
        },
    });
});
$('#copyhtml').on('click', function(){
    var note = $("textarea#mytext").val();
    CopyToClipboard(note);
       /* Alert the copied text */
       $('#myModal').modal('hide');
                          var notify = $.notify('<i class="fa fa-bell-o"></i><strong>Html Copied successfully', {
                            type: 'theme',
                            allow_dismiss: true,
                            delay: 2000,
                            showProgressbar: true,
                            timer: 300,
                            animate:{
                                enter:'animated fadeInDown',
                                exit:'animated fadeOutUp'
                            }
                            
                              });
});

function CopyToClipboard(note) {
    function listener(e) {
        e.clipboardData.setData("text/html", note);
        e.clipboardData.setData("text/plain", note);
        e.preventDefault();
    }
    document.addEventListener("copy", listener);
    document.execCommand("copy");
    document.removeEventListener("copy", listener);
}
$('#closemodal').click(function(){
     $('#myModal').modal('hide');
 });

</script>
@endpush