@extends('admin.layout.app',['request'=>'user','innerrequest'=>'business','title'=>'Business Partner'])
@push('css')
<style type="text/css">
    .activeicon{
        padding: 5px;
    border: 1px solid #3c763d;
    border-radius: 50px;
    background: #3c763d;
    color: white;
    }.img-70{
        border-style: double !important;
    border: 3px;
    }
</style>
@endpush
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Business Partner Details</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-9">

                                <h4>{{$user->title.' '.$user->f_name.' '.$user->l_name}}</h4>
                            </div>
                            <div class="col-md-3  text-right">
                                <b>Total Ads Posted </b> : <a href="{{route('business-ads.index',['user_id'=> $user->id])}}">{{$user->businesshasmanyads->count()}}</a>

                               {{-- @if($user->status==1)
                                    <i class="fa fa-circle activeicon"></i>                   
                                @else
                                    <i class="ft-22 fa fa-ban text-danger"></i> 
                                @endif--}}
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>Personal Detial</h4>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <img class="img-70 img-fluid m-r-20 rounded-circle update_img_0" width="100px" height="100px" src="{{asset($user->file_path)}}" alt="" data-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body p-3">
                                        <div class="row p-10">
                                            <div class="col-md-6">
                                                <b>Email :</b>  {{$user->email}}
                                            </div>
                                            <div class="col-md-6">
                                                <b>Contact Info :</b>  {{$user->phone}}
                                            </div>
                                        </div>
                                        <div class="row p-10">
                                            <div class="col-md-7">
                                                <b>Address :</b>  {{$user->address}}
                                            </div>
                                            <div class="col-md-5">
                                                <b>Zip Code :</b>  {{$user->zip_code}}
                                            </div>
                                        </div>
                                        <div class="row p-10">
                                            <div class="col-md-4">
                                                <b>City :</b>  {{$user->belongtocity->name}}
                                            </div>
                                            <div class="col-md-4">
                                                <b>State :</b>  {{$user->belongtocity->belongtostate->name}}
                                            </div>
                                            <div class="col-md-4">
                                                <b>Country :</b>  {{$user->belongtocity->belongtostate->belongtocountry->name}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <h4>Business Detial</h4>
                                                
                                            </div>
                                            <div class="col-md-3 text-right">
                                                <!-- <b>Total Ads Posted </b> : 20 -->
                                                @if($user->businessdetail->agreement_status==1)
                                                   <span class="badge badge-success"> DONE </span>                   
                                                @else
                                                  <span class="badge badge-primary"> PENDING </span> 
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body p-3">
                                        <div class="row p-10">
                                            <div class="col-md-5">
                                                <b>Name :</b>  {{$user->businessdetail->buisness_name}}
                                            </div>
                                            <div class="col-md-7">
                                                <b>Webiste Link:</b>  {{$user->businessdetail->website_link}}
                                            </div>
                                        </div>
                                        @if($user->businessdetail->agreement_status==1)
                                        <div class="row p-10">
                                            <div class="col-md-6">
                                                <b>Industry :</b>  {{$user->businessdetail->industry_name}}
                                            </div>
                                            <div class="col-md-6">
                                                <b>Recent Campaign :</b>  {{$user->businessdetail->recent_campaigns}}
                                            </div>
                                        </div>
                                        <div class="row p-10">
                                            <div class="col-md-12">
                                                <b>Business Nature :</b>  {{$user->businessdetail->nature_of_buisness}}
                                            </div>
                                        </div>
                                        <div class="row p-10">
                                            <div class="col-md-12">
                                                <b>Business Detail :</b>  {{$user->businessdetail->detail_of_buisness}}
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
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