@extends('layouts.app',['title' => 'Register'])
@push('css')
    <style>
      

input[type=checkbox] {
  display: none;
}

input[type=checkbox] + label {
  color: #ccc;
  cursor: pointer;
}

input[type=checkbox]:checked + label {
  color: #333;
}

.days {
  > div {
    display: inline;
  }
}
    </style>
@endpush
@section('login_signup')
<div class="container-fluid p-0"> 
      <div class="row">
        <div class="col-12">     
          <div class="login-card">
            <div>
              <div><a class="logo" href="{{url('/')}}"><img class="img-fluid for-light" src="{{asset('user/assets/images/logo/logo.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('user/assets/images/logo/logo.png')}}" alt="looginpage"></a></div>
              <div class="login-main"> 
                <form class="theme-form" id="reg_form" action="{{route('register')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <h4>Create your account as {{\Request::get('business')=='yes' ? 'Business Lead' : 'Media Partner'}}</h4>
                  <p>Enter your personal details to create account</p>
                  @include('alerts.error-alert',['ses_name'=>'error'])
                  <div class="form-group">
                    <label class="col-form-label pt-0">Your Name</label>
                    <div class="form-row">
                      <div class="col-2">
                        <input class="form-control" type="text" name="title" required=""  value="{{old('title')}}" placeholder="Mr/Ms">
                      
                      </div>
                      <div class="col-5">
                        <input class="form-control" type="text" name="first_name" required="" value="@if(!empty(\Request::get('f_name'))){{\Request::get('f_name')}} @else {{old('first_name')}} @endif" placeholder="First name">
                      
                      </div>
                      <div class="col-5">
                        <input class="form-control" type="text" name="last_name" required="" value="@if(!empty(\Request::get('l_name'))){{\Request::get('l_name')}} @else {{old('last_name')}} @endif" placeholder="Last name">
                    
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" type="email" name="email" required="" value="@if(!empty(\Request::get('email'))){{\Request::get('email')}} @else {{old('email')}} @endif" placeholder="Test@gmail.com">
                   
                  </div>
                   <div class="form-group">
                    
                    <div class="form-row">
                       <div class="col-6">
                        <label class="col-form-label">Business Name</label>
                    <input class="form-control" type="text" name="buisness_name" required="" value="{{old('buisness_name')}}" placeholder="Counsel Bridge">
                  </div>
                   <div class="col-6">
                    <label class="col-form-label">Webiste Link</label>
                      <input class="form-control" type="link" name="website_link" required="" value="{{old('website_link')}}" placeholder="wwww.counselbridge.com">
                   </div>
                  </div>
                      
                  </div>
                                    <div class="form-group">
                    <label class="col-form-label">Address </label>
                    <textarea  class="form-control" col="3" type="text" name="address" required="" placeholder="Dha Phase V tauheed Commercial">{{old('address')}}</textarea>
                    
                  </div>

                  <div class="form-group">
                    
                    <div class="form-row">
                       <div class="col-6">
                        <label class="col-form-label">Country</label>
                   <select class="custom-select country-select" required="" name="country">
                            <option selected="" value="">Select Country</option>
                            @foreach($country as $key=>$country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                          </select>
                  </div>
                   <div class="col-6">
                    <label class="col-form-label">State</label>
                                         <select class="custom-select state-select" required="" name="state">
                            <option selected="" disabled="" value="">Select State</option>
                            <option>...</option>
                          </select>
                   </div>
                  </div>
                      
                  </div>
                                    <div class="form-group">
                    
                    <div class="form-row">
                       <div class="col-6">
                        <label class="col-form-label">City</label>
                     <select class="custom-select city-select" required="" name="city">
                            <option selected="" disabled="" value="">Select City</option>
                            <option>...</option>
                          </select>
                  </div>
                   <div class="col-6">
                    <label class="col-form-label">Zip Code</label>
                      <input class="form-control" type="text" name="zip_code" required="" value="{{old('zip_code')}}" placeholder="7890909">
                   </div>
                  </div>
                      
                  </div>
                  <div class="form-group">
                    <div class="form-row">
                     <label class="col-form-label">What’s the best time for someone to call you?</label>
                      <div class="col-6">

                       <input type="hidden" name="day" class="form-control days-of-week" id="WorkWeek" type="text" value="" data-bind="value: WorkWeek">
                      </div>
                      <div class="col-6">
                         <input type="time" name="time" class="form-control">
                      </div>
                    </div>
                    
                  </div>
                   <div class="form-group">
                     <div class="form-row">
                       <div class="col-6">
                    <label class="col-form-label">Phone #</label>
                   <input class="form-control" type="text" name="phone" required="" value="{{old('phone')}}" placeholder="+923073286665">
                     
                  </div>
                                     <div class="col-6">
                    <label class="col-form-label">Additional Phone #</label>
                   <input class="form-control" type="text" name="additional_no" required="" value="{{old('additional_no')}}" placeholder="+923073286665">
                     
                  </div>
                </div>
                   </div>
                   <div class="form-group">
                     <div class="form-row">
                       <div class="col-6">
                        <label class="col-form-label">T-Shirt Size</label>
                         <select class="custom-select" name="size">
                            <option value="S" {{\Request::get('size')=='S' ? 'selected' : ''}}>Small</option>
                            <option value="M" {{\Request::get('size')=='M' ? 'selected' : ''}}>Medium</option>
                            <option value="L" {{\Request::get('size')=='L' ? 'selected' : ''}}>Large</option>
                            <option value="XL" {{\Request::get('size')=='XL' ? 'selected' : ''}}>Extra Large</option>
                            <option value="XXL" {{\Request::get('size')=='XXL' ? 'selected' : ''}}>Double XXL</option>
                         </select>
                       </div>
                       <div class="col-6">
                        <label class="col-form-label">Media Type</label>
                        <select class="custom-select" name="m_type">
                          <option value="Radio" >Radio</option>
                          <option value="TV" >TV</option>
                          <option value="Magazine Publisher" >Magazine Publisher</option>
                          <option value="Newspaper Publisher" >Newspaper Publisher</option>
                          <option value="Broadcast TV or Cable">Broadcast TV or Cable</option>
                          <option value="Internet TV" >Internet TV</option>
                          <option value="Affiliate Marketer" >Affiliate Marketer</option>
                          <option value="Influencer" >Influencer</option>
                          <option value="Vlogger" >Vlogger</option>
                          <option value="Blogger" >Blogger</option>
                       </select>
                       </div>
                     </div>
                   </div>
                  

          
                  <input type="hidden" value="{{\Request::get('business')=='yes' ? 'buisness' : 'media'}}" name="role" >
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <input class="form-control" type="password" id="pass" name="login[password]" required="" placeholder="*********">
                    <!-- <div class="show-hide"><span class="show"></span></div> -->

                  </div>
                                    <div class="form-group">
                    <label class="col-form-label">Confirm Password</label>
                    <input class="form-control" type="password" id="c_pass" name="login[password]" required="" placeholder="*********">
                    <div class="show-hide"><span class="show"></span></div>

                  </div>
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox" name="agree"  checked="checked">
                      <label class="text-muted" for="checkbox1" >Agree with<a class="ml-2" href="{{route('privacy_policy')}}">Privacy Policy</a></label>
                       
                    </div>
                    <button class="btn btn-primary btn-block" id="btnreg" type="button">Create Account</button>
                  </div>
                 <!--  <h6 class="text-muted mt-4 or">Or signup with</h6>
                  <div class="social mt-4">
                    <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                  </div> -->
                  <p class="mt-4 mb-0">Already have an account?<a class="ml-2" href="{{route('login')}}">Sign in</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>

@endsection
@push('js')
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
<script type="text/javascript">
   $(document).ready(function() {
        $('#btnreg').on('click',function(){
            c_pass=$('#c_pass').val();
            pass=$('#pass').val();
            if(pass===c_pass){
              var notify = $.notify('<i class="fa fa-bell-o"></i><strong>Success</strong> Password Match...', {
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
                $('#reg_form').submit();
            }else{
               var notify = $.notify('<i class="fa fa-bell-o"></i><strong>Error</strong> Password Mix Match...', {
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
            }
        });
    });

   $('.country-select').on('change', function() {
      $.ajax({
        url:"{{route('get_state')}}",
        type:"get",
        data:{
          country_id:$(this).val(),
        },
        beforeSend: function() {
               $(".state-select").html("<option value>Finding State.....</option>");
           },
        success:function(resp) {
          console.log(resp.length);
          html='';
          if(resp.length>0){
            $.each(resp, function(i, v) {
                   html+="<option value=" + v.id + ">" + v.name + "</option>";
                   if(i==0)
                      statechange(v.id);
                   
            });
          }else{
             html="<option>No State Found</option>";
          } 
          $('.state-select').html(html);
        },
        error:function(resp){
          console.log(resp);
        },
      });
   });
      $('.state-select').on('change', function() {
        statechange($(this).val());
   });
function statechange(state){
   $.ajax({
        url:"{{route('get_city')}}",
        type:"get",
        data:{
          state_id:state,
        },
        beforeSend: function() {
               $(".city-select").html("<option value>Finding Cities.....</option>");
           },
        success:function(resp) {
          console.log(resp.length);
          html='';
          if(resp.length>0){
            $.each(resp, function(i, v) {
                   html+="<option value=" + v.id + ">" + v.name + "</option>";
            });
          }else{
             html="<option>No City Found</option>";
          } 
          $('.city-select').html(html);
        },
        error:function(resp){
          console.log(resp);
        },
      });
}
(function( $ ){

"use strict";

$.fn.daysOfWeekInput = function() {
  return this.each(function(){
    var $field = $(this);
    
    var days = [
      {
        Name: 'Su',
        Value: 'N',
        Checked: false
      },
      {
        Name: 'Mo',
        Value: 'M',
        Checked: false
      },
      {
        Name: 'Tu',
        Value: 'T',
        Checked: false
      },
      {
        Name: 'We',
        Value: 'W',
        Checked: false
      },
      {
        Name: 'Th',
        Value: 'R',
        Checked: false
      },
      {
        Name: 'Fr',
        Value: 'F',
        Checked: false
      },
      {
        Name: 'Sa',
        Value: 'S',
        Checked: false
      }
    ];
    
    var currentDays = $field.val().split('');
    for(var i = 0; i < currentDays.length; i++) {
      var dayA = currentDays[i];
      for(var n = 0; n < days.length; n++) {
        var dayB = days[n];
        if(dayA === dayB.Value) {
          dayB.Checked = true;
        }
      }
    }
    
    // Make the field hidden when in production.
    //$field.attr('type','hidden');
    
    var options = '';
    var n = 0;
    while($('.days' + n).length) {
      n = n + 1;
    }
    
    var optionsContainer = 'days' + n;
    $field.before('<div class="days ' + optionsContainer + ' row ml-2"></div>');
    
    for(var i = 0; i < days.length; i++) {
      var day = days[i];
      var id = 'day' + day.Name + n;
      var checked = day.Checked ? 'checked="checked"' : '';
      options = options + '<div><input type="checkbox" value="' + day.Value + '" id="' + id + '" ' + checked + ' /><label for="' + id + '">' + day.Name + '</label>&nbsp;&nbsp;</div>';
    }
    
    $('.' + optionsContainer).html(options);
    
    $('body').on('change', '.' + optionsContainer + ' input[type=checkbox]', function () {
      var value = $(this).val();
      var index = getIndex(value);
      if(this.checked) {
        updateField(value, index);
      } else {
        updateField(' ', index);
      }
    });
    
    function getIndex(value) {
      for(i = 0; i < days.length; i++) {
        if(value === days[i].Value) {
          return i;
        }
      }
    }
    
    function updateField(value, index) {
      $field.val($field.val().substr(0, index) + value + $field.val().substr(index+1)).change();
    }
  });
}

})( jQuery );

$('.days-of-week').daysOfWeekInput();
</script>
@endpush