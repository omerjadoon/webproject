@extends('admin.layout.app',['request'=>'user','innerrequest'=>'medua','title'=>'Media Partner Detail'])
@push('css')
<style type="text/css">
    .activeicon{
        padding: 5px;
    border: 1px solid #3c763d;
    border-radius: 50px;
    background: #3c763d;
    color: white;
    }
    .img-70{
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
                <h1 class="page-header">Media Partner Details</h1>
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
                                @if($user->status==1)
                                    <i class="fa fa-circle activeicon"></i>                   
                                @else
                                    <i class="ft-22 fa fa-ban text-danger"></i> 
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
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
                                            <div class="col-md-4">
                                                <b>Email :</b>  {{$user->email}}
                                            </div>
                                            <div class="col-md-4">
                                                <b>Contact Info :</b>  {{$user->phone}}
                                            </div>
                                            <div class="col-md-4">
                                                <b>Additional Number :</b>  {{$user->mediadetail->additional_no}}
                                            </div>
                                        </div>
                                         <div class="row p-10">
                                            <div class="col-md-3">
                                                <b>Company Name :</b>  {{$user->mediadetail->buisness_name}}
                                            </div>
                                            <div class="col-md-4">
                                                <b>Webiste Link :</b>  {{$user->mediadetail->website_link}}
                                            </div>
                                            <div class="col-md-3">
                                                <b>Zip Code :</b>  {{$user->zip_code}}
                                            </div>
                                            <div class="col-md-2">
                                                <b>T-Shirt Size : </b>@if($user->mediadetail->size=='S') Small @elseif($user->mediadetail->size=='M') Medium @elseif($user->mediadetail->size=='L') Large @elseif($user->mediadetail->size=='XL') Extra Large @elseif($user->mediadetail->size=='XXL') Double XXL @endif
                                            </div>
                                        </div>
                                        <div class="row p-10">
                                            <div class="col-md-6">
                                                <b>Address :</b>  {{$user->address}}
                                            </div>
                                            <div class="col-md-2">
                                                <b>City :</b>  {{$user->belongtocity->name}}
                                            </div>
                                            <div class="col-md-2">
                                                <b>State :</b>  {{$user->belongtocity->belongtostate->name}}
                                            </div>
                                            <div class="col-md-2">
                                                <b>Country :</b>  {{$user->belongtocity->belongtostate->belongtocountry->name}}
                                            </div>
                                        </div>
                                        <div class="row p-10">
                                            <div class="col-md-4">
                                                <b>The best time for someone to call you.</b>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <b>Days : </b>{{$user->mediadetail->day}}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Time : </b>{{$user->mediadetail->time}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <b>Media Type : </b>{{$user->mediadetail->m_type}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <h4>Payment Detail</h4>
                                                
                                            </div>
                                            @if($user->mediadetail->payment_detail==1)
                                            <div class="col-md-3 mt-5 text-right">
                                                 <b>Type : </b> {{strtoupper($user->paymentdetail->type)}}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="panel-body p-3">
                                       @if($user->mediadetail->payment_detail==1)
                                        @if($user->paymentdetail->type=='bank')
                                        <div class="row p-10">
                                            <div class="col-md-3">
                                               <b> Bank Name :</b> {{$user->paymentdetail->bank_name}}
                                            </div>
                                            <div class="col-md-2">
                                               <b> Routing # :</b> {{$user->paymentdetail->routing_no}}
                                            </div>
                                            <div class="col-md-4">
                                               <b> Account # :</b> {{$user->paymentdetail->account_no}}
                                            </div>
                                            <div class="col-md-3">
                                               <b> Account Title :</b> {{$user->paymentdetail->account_title}}
                                            </div>
                                        </div>
                                        <div class="row p-10">
                                            <div class="col-md-12">
                                               <b> Bank Address :</b> {{$user->paymentdetail->bank_address}}
                                            </div>
                                        </div>
                                        @elseif($user->paymentdetail->type=='paypal')
                                        <div class="row">
                                             <div class="col-md-4">
                                               <b> PayPal User ID :</b> {{$user->paymentdetail->paypal_user_id}}
                                            </div>
                                            <div class="col-md-4">
                                               <b> PayPal Venmo :</b> {{$user->paymentdetail->paypal_venmo}}
                                            </div>
                                            <div class="col-md-4">
                                               <b> PayPal User Email :</b> {{$user->paymentdetail->paypal_user_mail}}
                                            </div>
                                        </div>
                                        @elseif($user->paymentdetail->type=='contact_person')
                                       
                                        <div class="row p-10">
                                            <div class="col-md-3">
                                               <b> Name :</b> {{$user->paymentdetail->contact_person_name}}
                                            </div>
                                             <div class="col-md-3">
                                               <b> Email :</b> {{$user->paymentdetail->contact_person_email}}
                                            </div>
                                            <div class="col-md-3">
                                               <b> Title :</b> {{$user->paymentdetail->contact_person_title}}
                                            </div>
                                            <div class="col-md-3">
                                               <b> Number :</b> {{$user->paymentdetail->contact_person_number}}
                                            </div>
                                           
                                        </div>
                                         @endif
                                       @else
                                       <h5 class="text-center">No Detail provided</h5>
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