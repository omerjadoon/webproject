@extends('layouts.app',['title'=>'Account','request'=>'useracc'])
@push('css')
<style type="text/css">
     .roundedpencil{
       background: white;
    display: inline-block;
    position: absolute;
    bottom: 0px;
    left: 54px;
    border-radius: 100%;
    /* padding: 8px; */
    padding-top: 8px;
    padding-bottom: -1px;
    padding-left: 10px;
    padding-right: 10px;
    text-align: center;
    cursor:pointer;
    }
    .img-70{
        border-style: double !important;
    border: 3px;
    }.no-border{
        border:none;
    }.hw{
        height:200px;
        width:100%;
        border:solid 1px black;
    }.float{
        float:right !important;
    }
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
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Account</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('media_dashboard.index')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Account setting</li>
                    <!-- <li class="breadcrumb-item active">Ads List</li> -->
                </ol>
            </div>
        </div>
    </div>
</div>
  <!-- Container-fluid starts-->
         <div class="container-fluid">
            <div class="edit-profile">
              <div class="row">
                <div class="col-xl-4">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title mb-0">My Profile</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse" data-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove" data-original-title="" title=""><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      
                       <div class="tab-content" id="v-pills-tabContent">
                      <div class="tab-pane contact-tab-0 tab-content-child fade show active" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                                        <div class="profile-mail">
                                          <div class="media"><img class="img-70 img-fluid m-r-20 rounded-circle update_img_0" src="{{asset(Auth::user()->file_path)}}" alt="" data-original-title="" title="">
                                        
                                            <div class="media-body mt-3">
                                              <h5><span class="first_name_0">{{strtoupper(Auth::user()->title.'
                                               '.Auth::user()->f_name.' '.Auth::user()->l_name)}} </span></h5>
                                               <p class="email_add_0">{{Auth::user()->role=='buisness' ? 'Business' : 'Media Partner'}}</p>
                                             
                                            </div>
                                          </div>
                                          <div class="email-general mt-5">
                                            <ul class="mt-5">
                                                   <li class="mt-3 first_name_0">Bio<span class="font-primary url_add_0 float"></span></li>
                                                   <li class="mt-3"><hr></li>
                                              <li class="mt-3">First Name<span class="font-primary first_name_0 float">{{Auth::user()->f_name}}</span></li>
                                              <li class="mt-3">Last Name<span class="font-primary first_name_0 float">{{Auth::user()->l_name}}</span></li>
                                              <li class="mt-3">Email<span class="font-primary first_name_0 float">{{Auth::user()->email}}</span></li>
                                              <li class="mt-3">Contact #<span class="font-primary float">{{Auth::user()->phone}}</span></li>
                                               <li class="mt-3">City<span class="font-primary personality_0 float">{{Auth::user()->belongtocity->name}}</span></li>
                                                <li class="mt-3">State<span class="font-primary personality_0 float">{{Auth::user()->belongtocity->belongtostate->name}}</span></li>
                                              <li class="mt-3">Country<span class="font-primary personality_0 float">{{Auth::user()->belongtocity->belongtostate->belongtocountry->name}}</span></li>
                                              <li class="mt-3">Zip Code<span class="font-primary personality_0 float">{{Auth::user()->zip_code}}</span></li>
                                              
                                              
                                              <li class="mt-3">Address <span class="font-primary">{{Auth::user()->address}}</span></li>
                                              
                                                <li class="mt-3">Media Type<span class="font-primary first_name_0 float">{{Auth::user()->mediadetail->m_type}}</span></li>
                                              <li class="mt-3">T-Shirt Size<span class="font-primary first_name_0 float">@if(Auth::user()->mediadetail->size=='S') Small @elseif(Auth::user()->mediadetail->size=='M') Medium @elseif(Auth::user()->mediadetail->size=='L') Large @elseif(Auth::user()->mediadetail->size=='XL') Extra Large @elseif(Auth::user()->mediadetail->size=='XXL') Double XXL @endif</span></li>
                                              <li class="mt-3">Best time for someone to call you<span class="font-primary first_name_0 float">{{Auth::user()->mediadetail->day.' '.Auth::user()->mediadetail->time}}</span></li>
                                            </br>
                                               <li class="mt-3"><hr></li>
                                             <li class="mt-3">Business<span class="font-primary url_add_0 float"></span></li>
                                              <li class="mt-3"><hr></li>
                                                <li class="mt-3">Business Name<span class="font-primary first_name_0 float">{{Auth::user()->mediadetail->buisness_name}}</span></li>
                                              <li class="mt-3">Webiste Link<span class="font-primary first_name_0 float">{{Auth::user()->mediadetail->website_link}}</span></li>
                                              <li class="mt-3">Additional #<span class="font-primary first_name_0 float">{{Auth::user()->mediadetail->additional_no}}</span></li>
                                            </ul>
                                          </div>
                                        </div>
                                      </div>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-8">
                  <form class="card" action="{{route('media_dashboard.update',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                     @method('put')      
                     @csrf                
                    <div class="card-header">
                      <h4 class="card-title mb-0">Edit Profile</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse" data-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove" data-original-title="" title=""><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                     
                   
                      <div class="row">
                          <div class="col-md-3">
                               <div class="form-group mb-3">
                                    <label class="form-label">Profile Pic</label>
                               <div class="avatar"><img height="70px" alt="" class="img-70 rounded-circle" id="prev" src="{{asset(Auth::user()->file_path)}}" data-original-title="" title=""></div>
                      <div class="roundedpencil"><input type="file" value="profile.jpg" name="profile" id="filee" style="display:none" onchange="previewFile(this);" data-original-title="" title=""><label for="filee"><i class="icofont icofont-pencil-alt-5"></i></label></div>
                          </div>
                          </div>
                      <div class="col-sm-6 col-md-4">
                          <div class="form-group mb-3">
                            <label class="form-label">Role</label>
                            <input class="form-control" name="role" readonly="" value="{{Auth::user()->role=='buisness' ? 'Business' : 'Media Partner'}}" type="text" data-original-title="" title="">
                          </div>
                       </div>
                        <div class="col-md-8 col-sm-8">
                          <div class="form-group mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control" name="email" value="{{Auth::user()->email}}" type="email" placeholder="Email" data-original-title="" title="" readonly>
                          </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                          <div class="form-group mb-3">
                            <label class="form-label">Contact</label>
                            <input class="form-control" type="text" name="phone" value="{{Auth::user()->phone}}" placeholder="First Name" data-original-title="" title="">
                          </div>
                        </div>
                       
                        <div class="col-sm-2 col-md-2">
                          <div class="form-group mb-3">
                            <label class="form-label">Title</label>
                            <input class="form-control" type="text" name="title" value="{{Auth::user()->title}}" placeholder="First Name" data-original-title="" title="">
                          </div>
                        </div>
                        
                         <div class="col-sm-5 col-md-5">
                          <div class="form-group mb-3">
                            <label class="form-label">First Name</label>
                            <input class="form-control" type="text" name="f_name" value="{{Auth::user()->f_name}}" placeholder="First Name" data-original-title="" title="">
                          </div>
                        </div>
                         <div class="col-sm-5 col-md-5">
                          <div class="form-group mb-3">
                            <label class="form-label">Last Name</label>
                            <input class="form-control" type="text" name="l_name" value="{{Auth::user()->l_name}}" placeholder="First Name" data-original-title="" title="">
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <div class="form-group mb-3">
                            <label for="" class="form-label">T-Shirt Size </label>
                         <select class="form-control btn-square" name="size">
                            <option value="S" {{Auth::user()->mediadetail->size=='S' ? 'selected' : ''}}>Small</option>
                            <option value="M" {{Auth::user()->mediadetail->size=='M' ? 'selected' : ''}}>Medium</option>
                            <option value="L" {{Auth::user()->mediadetail->size=='L' ? 'selected' : ''}}>Large</option>
                            <option value="XL" {{Auth::user()->mediadetail->size=='XL' ? 'selected' : ''}}>Extra Large</option>
                            <option value="XXL" {{Auth::user()->mediadetail->size=='XXL' ? 'selected' : ''}}>Double XXL</option>
                         </select>
                          
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <div class="form-group mb-3">
                            <label for="" class="form-label">Media Type </label>
                         <select class="form-control btn-square" name="m_type">
                          <option value="Radio" {{Auth::user()->mediadetail->m_type=='Radio' ? 'selected' : ''}}>Radio</option>
                          <option value="TV" {{Auth::user()->mediadetail->m_type=='TV' ? 'selected' : ''}}>TV</option>
                          <option value="Magazine Publisher" {{Auth::user()->mediadetail->m_type=='Magazine Publisher' ? 'selected' : ''}}>Magazine Publisher</option>
                          <option value="Newspaper Publisher" {{Auth::user()->mediadetail->m_type=='Newspaper Publisher' ? 'selected' : ''}}>Newspaper Publisher</option>
                          <option value="Broadcast TV or Cable"{{Auth::user()->mediadetail->m_type=='Broadcast TV or Cable' ? 'selected' : ''}}>Broadcast TV or Cable</option>
                          <option value="Internet TV" {{Auth::user()->mediadetail->m_type=='Internet TV' ? 'selected' : ''}}>Internet TV</option>
                          <option value="Affiliate Marketer" {{Auth::user()->mediadetail->m_type=='Affiliate Marketer' ? 'selected' : ''}}>Affiliate Marketer</option>
                          <option value="Influencer" {{Auth::user()->mediadetail->m_type=='Influencer' ? 'selected' : ''}}>Influencer</option>
                          <option value="Vlogger" {{Auth::user()->mediadetail->m_type=='Vlogger' ? 'selected' : ''}}>Vlogger</option>
                          <option value="Blogger" {{Auth::user()->mediadetail->m_type=='Blogger' ? 'selected' : ''}}>Blogger</option>
                        </select>
                          
                          </div>
                        </div>
                        
                                              <div class="col-md-4 col-sm-4">
                          <div class="form-group mb-3">
                            <label class="form-label">Country</label>
                            <select class="form-control btn-square country-select" name="country">
                            @foreach($country as $key=>$country)
                            <option value="{{$country->id}}" {{$country->id==Auth::user()->belongtocity->belongtostate->belongtocountry->id ? 'selected' : ''}}>{{$country->name}}</option>
                            @endforeach
                            </select>
                          </div>
                        </div>
                         <div class="col-md-4 col-sm-4">
                          <div class="form-group mb-3">
                            <label class="form-label">State</label>
                            <select class="form-control btn-square state-select" required="" name="state">
                            <option selected="" disabled="" value="">Select State</option>
                            <option>...</option>
                            </select>
                          </div>
                        </div>
                         <div class="col-md-4 col-sm-4">
                          <div class="form-group mb-3">
                            <label class="form-label">City</label>
                            <select class="form-control btn-square city-select" required="" name="city">
                            <option selected="" disabled="" value="">Select City</option>
                            <option>...</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                          <div class="form-group mb-3">
                            <label class="form-label">Zip Code</label>
                            <input class="form-control" type="text" name="zip_code" value="{{Auth::user()->zip_code}}" placeholder="First Name" data-original-title="" title="">
                          </div>
                        </div>
                          <div class="col-sm-4 col-md-4">
                          <div class="form-group mb-3">
                            <label class="form-label">Business Name</label>
                            <input class="form-control" type="text" name="buisness_name" value="{{Auth::user()->mediadetail->buisness_name}}" placeholder="First Name" data-original-title="" title="">
                          </div>
                        </div>
                          <div class="col-sm-4 col-md-4">
                          <div class="form-group mb-3">
                            <label class="form-label">Webiste Link</label>
                            <input class="form-control" type="text" name="website_link" value="{{Auth::user()->mediadetail->website_link}}" placeholder="First Name" data-original-title="" title="">
                          </div>
                        </div>
                          <div class="col-sm-4 col-md-4">
                          <div class="form-group mb-3">
                            <label class="form-label">Additional #</label>
                            <input class="form-control" type="text" name="additional_no" value="{{Auth::user()->mediadetail->additional_no}}" placeholder="First Name" data-original-title="" title="">
                          </div>
                        </div>
                       <div class="col-md-12">
                        <label class="col-form-label">What’s the best time for someone to call you?</label>
                         <div class="form-group mb-3">
                          <div class="row">

                             <div class="col-md-5">
       
                              <input type="hidden" name="day" class="form-control days-of-week" id="WorkWeek" type="text" value="{{Auth::user()->mediadetail->day}}" data-bind="value: WorkWeek">
                             </div>
                             <div class="col-md-5">
                                <input type="time" name="time" value="{{Auth::user()->mediadetail->time}}" class="form-control">
                             </div>
                           </div>
                            </div>
                       </div>

                        <div class="col-md-12">
                          <div class="form-group mb-3 mb-0">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="address" rows="3" placeholder="Enter About your description">{{Auth::user()->address}}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="submit" data-original-title="" title="">Update Profile</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>

@endsection
@push('js')
<script type="text/javascript">
    var country="{{Auth::user()->belongtocity->belongtostate->belongtocountry->id}}";
    var state="{{Auth::user()->belongtocity->belongtostate->id}}";
    var city="{{Auth::user()->belongtocity->id}}";
  
      countrychange(country,state); 
    function previewFile(input){
        var file = $("input[name=profile]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#prev").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
       $('.country-select').on('change', function() {
        countrychange($(this).val());
   });
      $('.state-select').on('change', function() {
        statechange($(this).val());
   });

function countrychange(country,state_id){
    state_id = state_id || 0;
    
  $.ajax({
        url:"{{route('get_state')}}",
        type:"get",
        data:{
          country_id:country,
        },
        beforeSend: function() {
               $(".state-select").html("<option value>Finding State.....</option>");
           },
        success:function(resp) {
          console.log(resp.length);
          html='';
          if(resp.length>0){
            $.each(resp, function(i, v) {
                    if(v.id==state_id){
                         html+="<option value=" + v.id + " selected>" + v.name + "</option>"; 
                          statechange(state_id,city); 
                    }
                    else{
                            html+="<option value=" + v.id + " >" + v.name + "</option>";
                      }      
                   if(i==0 && state_id==0)
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

}      
function statechange(state,city_id){
    city_id = city_id || 0;
    
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
                  if(v.id==city_id){
                         html+="<option value=" + v.id + " selected>" + v.name + "</option>";  
                    }
                    else{
                            html+="<option value=" + v.id + " >" + v.name + "</option>";
                      }    
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