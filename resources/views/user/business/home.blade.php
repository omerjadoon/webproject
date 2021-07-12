@extends('layouts.app',['title'=>'Home'])
@push('css')
<style type="text/css">
    .aggrestyle{
        border:1px black solid;
        max-height:300px ;
        overflow: hidden scroll;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="aggrementform" style="display: {{(count($errors)>0 || Session::has('error')) ? 'none' : 'block'}}">
                <div class="card-header">{{ __('CONSENT AND AGGREMENT FORM') }}</div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12 aggrestyle">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                               <button class="btn btn-primary btn-block" id="aggree" type="button">Agree & Continue</button>
                        </div>
                    </div>                   
                </div>

              

            </div>
             <div class="card" id="businessform" style="display: {{(count($errors)>0 || Session::has('error')) ? 'block' : 'none'}};">
                <div class="card-header">{{ __('BUSINESS DETAIL') }}
                    @include('alerts.error-alert',['ses_name'=>'error'])
                </div>
                <div class="card-body">
                    <form class="theme-form" id="reg_form" action="{{route('business_detail')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label class="col-form-label">Nature Of Business</label>
                            <input class="form-control" type="text" name="nature_of_buisness" required="" value="{{old('nature_of_buisness')}}" placeholder="Test@gmail.com">
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-6">
                                    <label class="col-form-label">Recent Campaigns</label>
                                    <input class="form-control" type="text" name="recent_campaigns" required="" value="{{old('recent_campaigns')}}" placeholder="Counsel Bridge">
                                </div>
                                <div class="col-6">
                                    <label class="col-form-label">Industry</label>
                                    <input class="form-control" type="text" name="industry_name" required="" value="{{old('industry_name')}}" placeholder="wwww.counselbridge.com">
                                </div>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-form-label">Tell Us About Your Business </label>
                            <textarea  class="form-control" col="3" type="text" name="detail_of_buisness" required="" placeholder="Dha Phase V tauheed Commercial">{{old('detail_of_buisness')}}</textarea>
                        </div>
                        <div class="form-group mb-0 text-center">
                            <div class="form-row">
                                <div class="col-6">
                                    <button class="btn btn-info btn-block" id="back" type="button">Back</button>
                                </div>
                                 <div class="col-6">
                                    <button class="btn btn-success btn-block" id="Confirm" type="submit">Confirm</button>
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
    $('#aggree').on('click',function(){
        $('#aggrementform').css('display','none');
        $('#businessform').css('display','block');
    });
    $('#back').on('click',function(){
        $('#businessform').css('display','none');
        $('#aggrementform').css('display','block');
    });
</script>
@if(count($errors)>0)
@foreach($errors->all() as $key=>$error)
<script type="text/javascript">
  var notify = $.notify('<i class="fa fa-bell-o"></i><strong>Error!</strong> {{$error}}...', {
    type: 'theme',
    allow_dismiss: true,
    delay: 4000,
    showProgressbar: true,
    timer: 500,
    animate:{
        enter:'animated fadeInDown',
        exit:'animated fadeOutUp'
    }
});



</script>
@endforeach
@endif
@endpush
