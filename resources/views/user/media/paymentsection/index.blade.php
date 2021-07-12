@extends('layouts.app',['title'=>'Payment Detail','request'=>'payment'])
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
    }.notactive{
        display: none;
    }.active{
        display: block;
    }
</style>
@endpush
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Payment Detail</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('media_dashboard.index')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Payment Detail</li>
                    <!-- <li class="breadcrumb-item active">Detail</li> -->
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
                     <h5>Payment Detail</h5><span><u>{{strtoupper(Auth::user()->paymentdetail->type)}}</u></span>
                </div>
                <div class="card-body">
                     @if(Auth::user()->paymentdetail->type=='bank')
                                        <div class="row p-10">
                                            <div class="col-md-4">
                                               <b> Routing # :</b> {{Auth::user()->paymentdetail->routing_no}}
                                            </div>
                                            <div class="col-md-4">
                                               <b> Account # :</b> {{Auth::user()->paymentdetail->account_no}}
                                            </div>
                                            <div class="col-md-4">
                                               <b> Account Title :</b> {{Auth::user()->paymentdetail->account_title}}
                                            </div>
                                        </div>
                                        <div class="row p-10">
                                            <div class="col-md-4">
                                               <b> Bank Name :</b> {{Auth::user()->paymentdetail->bank_name}}
                                            </div>
                                            <div class="col-md-8">
                                               <b> Bank Address :</b> {{Auth::user()->paymentdetail->bank_address}}
                                            </div>
                                        </div>
                                        @elseif(Auth::user()->paymentdetail->type=='paypal')
                                        <div class="row">
                                             <div class="col-md-4">
                                               <b> PayPal User ID :</b> {{Auth::user()->paymentdetail->paypal_user_id}}
                                            </div>
                                            <div class="col-md-4">
                                               <b> PayPal Venmo :</b> {{Auth::user()->paymentdetail->paypal_venmo}}
                                            </div>
                                            <div class="col-md-4">
                                               <b> PayPal User Email :</b> {{Auth::user()->paymentdetail->paypal_user_mail}}
                                            </div>
                                        </div>
                                        @elseif(Auth::user()->paymentdetail->type=='contact_person')
                                       
                                        <div class="row p-10">
                                            <div class="col-md-3">
                                               <b> Name :</b> {{Auth::user()->paymentdetail->contact_person_name}}
                                            </div>
                                             <div class="col-md-3">
                                               <b> Email :</b> {{Auth::user()->paymentdetail->contact_person_email}}
                                            </div>
                                            <div class="col-md-3">
                                               <b> Title :</b> {{Auth::user()->paymentdetail->contact_person_title}}
                                            </div>
                                            <div class="col-md-3">
                                               <b> Number :</b> {{Auth::user()->paymentdetail->contact_person_number}}
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
</script>
@endpush