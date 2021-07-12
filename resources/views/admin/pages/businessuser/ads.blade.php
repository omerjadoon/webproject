@extends('admin.layout.app',['request'=>'ads','innerrequest'=>'viewallads','title'=>'All Ads'])
@push('css')
<style type="text/css">
    .activeicon{
        padding: 5px;
    border: 1px solid #3c763d;
    border-radius: 50px;
    background: #3c763d;
    color: white;
    }
    .h-revert{
        height: revert !important;
    }
    .h-900{
        height: 900px !important;
    }
    .img-fluid{
        max-width: 100%;
        height: auto;
    }
</style>
@endpush
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">All Ads</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <form action="{{route('business-ads.index')}}" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <h4>ADS LISITNG</h4>
                            </div>
                            <div class="col-md-3">
                                <input id="adtitle" name="adquery" value="{{\Request::get('adquery')}}" type="text" placeholder="Enter Query For Search" class="form-control">
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
                                <a class="btn btn-info" href="{{route('business-ads.index')}}">{{(\Request::get("adquery") || \Request::get('mediatype')) ? 'Reset' : 'Refresh'}}</a>
                            </div>
                        </div>
                    </form>
                    </div>
                     <!-- /.panel-heading -->
                    <div class="panel-body">
                        @if($adsection->count()>0)
                        @foreach($adsection as $key=>$ad)
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4>{{$ad->belongtouser->f_name.' '.$ad->belongtouser->l_name}}</h4>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <h5>{{$ad->title}}</h5>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <b>{{$ad->created_at->format('Y M,d h:i a')}}</b>
                                                <div>No of Participants : <b>{{$ad->adhasmnayparticpnt->count()}}</b></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
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
                        <!-- <div class="col-md-4"></div> -->
                        <div class="col-md-12  text-center">
                            {{$adsection->links()}}
                        </div>
                        <!-- <div class="col-md-4"></div> -->
                    </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

@push('js')
<script>

                            $('#dataTables-example').DataTable({
                        responsive: true
                });
        </script>
@endpush