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
                    <h5>Payment Section</h5><span>Please Provide Correct Information </span>
                    @include('alerts.error-alert',['ses_name'=>'error'])
                    @include('alerts.success-alert',['ses'=>'success'])
                </div>
                <div class="card-body">
                    <form class="form-vertical" id="payment-sect" action="{{route('payment-detail.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                       <div class="col-md-6 offset-3">
                            <div class="m-checkbox-inline">
                                <div class="radio radio-theme">
                                    <input id="radioinline1" type="radio" class="paytype" name="type" value="bank" data-bs-original-title="" title="" {{old('type')=='bank' ? 'checked' : ''}}>
                                    <label for="radioinline1">Bank Wire</label>
                                </div>
                                <div class="radio radio-theme">
                                    <input id="radioinline2" type="radio" class="paytype" name="type" value="paypal" data-bs-original-title="" title="" {{old('type')=='paypal' ? 'checked' : ''}}>
                                    <label for="radioinline2">PayPal</label>
                                </div>
                                <div class="radio radio-theme">
                                    <input id="radioinline3"  type="radio" class="paytype" name="type" value="contact_person" data-bs-original-title="" title="" {{old('type')=='contact_person' ? 'checked' : ''}}>
                                    <label for="radioinline3">Contact Person</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pay {{old('type')=='bank' ? 'active' : 'notactive'}} mt-3" id="bank">
                        <div class="col-sm-6 offset-3">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h6>Bank Wire</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="control-label" for="bank_name">Bank Name</label>
                                            <input id="bank_name" name="bank_name" value="{{old('bank_name')}}" type="text" placeholder="Enter Bank Name" class="form-control">
                                            @include('alerts.errorfield',['field'=>'bank_name'])
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label" for="routing_no">Routing Number</label>
                                            <input id="routing_no" name="routing_no" value="{{old('routing_no')}}" type="text" placeholder="Enter Routing Number" class="form-control">
                                            @include('alerts.errorfield',['field'=>'routing_no'])
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="control-label" for="account_no">Account Number</label>
                                            <input id="account_no" name="account_no" value="{{old('account_no')}}" type="text" placeholder="Enter Account Number" class="form-control">
                                            @include('alerts.errorfield',['field'=>'account_no'])
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label" for="account_title">Account Title</label>
                                            <input id="account_title" name="account_title" value="{{old('account_title')}}" type="text" placeholder="Enter Account Title" class="form-control">
                                            @include('alerts.errorfield',['field'=>'account_title'])
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label class="control-label" for="bank_address">Bank Address</label>
                                            <textarea id="bank_address" name="bank_address" value="{{old('bank_address')}}"  placeholder="Enter Bank Address" class="form-control"></textarea>
                                            @include('alerts.errorfield',['field'=>'bank_address'])
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 text-center">
                                            <button id="btnstore" name="btnstore" onclick="btnsubmit('paypal','contact_person')" type="button" class="btn btn-primary mt-4">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pay {{old('type')=='paypal' ? 'active' : 'notactive'}} mt-3" id="paypal">
                        <div class="col-sm-6 offset-3">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h6>PayPal</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label class="control-label" for="paypal_user_id">PayPal User Id</label>
                                            <input id="paypal_user_id" name="paypal_user_id" value="{{old('paypal_user_id')}}" type="text" placeholder="Enter Paypal UserId" class="form-control">
                                            @include('alerts.errorfield',['field'=>'paypal_user_id'])
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label class="control-label" for="paypal_venmo">PayPal Venmo</label>
                                            <input id="paypal_venmo" name="paypal_venmo" value="{{old('paypal_venmo')}}" type="text" placeholder="Enter Venom" class="form-control">
                                            @include('alerts.errorfield',['field'=>'paypal_venmo'])
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label class="control-label" for="paypal_user_mail">PayPal User Email</label>
                                            <input id="paypal_user_mail" name="paypal_user_mail" value="{{old('paypal_user_mail')}}" type="text" placeholder="Enter Paypal useremail" class="form-control">
                                            @include('alerts.errorfield',['field'=>'paypal_user_mail'])
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 text-center">
                                            <button id="btnstore" name="btnstore" onclick="btnsubmit('bank','contact_person')" type="button" class="btn btn-primary mt-4">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pay {{old('type')=='contact_person' ? 'active' : 'notactive'}} mt-3" id="contact_person">
                        <div class="col-sm-6 offset-3">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h6>Contact Person</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="control-label" for="contact_person_name">Contact Person Name</label>
                                            <input id="contact_person_name" name="contact_person_name" value="{{old('contact_person_name')}}" type="text" placeholder="Enter Name" class="form-control">
                                            @include('alerts.errorfield',['field'=>'contact_person_name'])
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label" for="contact_person_title">Contact Person Title</label>
                                            <input id="contact_person_title" name="contact_person_title" value="{{old('contact_person_title')}}" type="text" placeholder="Enter Title" class="form-control">
                                            @include('alerts.errorfield',['field'=>'contact_person_title'])
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="control-label" for="contact_person_number">Contact Person Number</label>
                                            <input id="contact_person_number" name="contact_person_number" value="{{old('contact_person_number')}}" type="text" placeholder="Enter Number" class="form-control">
                                            @include('alerts.errorfield',['field'=>'contact_person_number'])
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label" for="contact_person_email">Contact Person Email</label>
                                            <input id="contact_person_email" name="contact_person_email" value="{{old('contact_person_email')}}" type="email" placeholder="Enter Email" class="form-control">
                                            @include('alerts.errorfield',['field'=>'contact_person_email'])
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 text-center">
                                            <button id="btnstore" name="btnstore" onclick="btnsubmit('paypal','bank')" type="button" class="btn btn-primary mt-4">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
  $('.paytype').on('click',function(){
    if ($(".active").length > 0)
        {
            $('.pay').removeClass('active').addClass('notactive');
        }
    $('#'+$(this).val()).removeClass('notactive').addClass('active');
  });
  function btnsubmit(id1,id2){
   $('#'+id1).remove();
    $('#'+id2).remove();
    $('#payment-sect').submit();
  }
</script>
@endpush