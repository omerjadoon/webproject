@extends('layouts.app',['title'=>'Dashboard','request'=>'dashboard'])
@push('css')
@endpush
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Dashboard</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{route('media_dashboard.index')}}"><i data-feather="home"></i></a></li>
                    <!-- <li class="breadcrumb-item">Ad section</li> -->
                    <!-- <li class="breadcrumb-item active">Ads List</li> -->
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
              <div class="col-sm-6 col-xl-4 col-lg-6">
                <div class="card o-hidden">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="database"></i></div>
                      <div class="media-body"><span class="m-0">Earnings Earned</span>
                        <h4 class="mb-0">{{number_format(Auth::user()->commisionowedbymedia())}} Cent</h4><i class="icon-bg" data-feather="database"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-4 col-lg-6">
                <div class="card o-hidden">
                  <div class="bg-secondary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="pocket"></i></div>
                      <div class="media-body"><span class="m-0">Earnings Recevied</span>
                        <h4 class="mb-0">{{number_format(Auth::user()->commisionrecbymedia())}} Cent</h4><i class="icon-bg" data-feather="pocket"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-4 col-lg-6">
                <div class="card o-hidden">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="layers"></i></div>
                      <div class="media-body"><span class="m-0">Earnings Pending</span>
                        <h4 class="mb-0">{{number_format(Auth::user()->commisionowedbymedia()-Auth::user()->commisionrecbymedia())}} Cent</h4><i class="icon-bg" data-feather="layers"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      </div> 
      <div class="row">
        <div class="col-xl-3 xl-50 chart_data_right box-col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="media align-items-center">
                      <div class="media-body right-chart-content">
                        <h4>{{Auth::user()->particpatedincampaigncountmedia()}}
                            <!-- <span class="new-box">Hot</span> -->
                        </h4><span>Total Participated Ads</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 xl-50 chart_data_right second d-none"> 
                <div class="card">
                  <div class="card-body">
                    <div class="media align-items-center">
                      <div class="media-body right-chart-content"> 
                        <h4>{{Auth::user()->participationhasmanyleadscountmedia()}}
                            <!-- <span class="new-box">New</span> -->
                        </h4><span>Total Leads Against Participated Ads</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      </div>    
    <div class="row second-chart-list third-news-update">
              <div class="col-xl-4 col-lg-12 xl-50 morning-sec box-col-12">
                <div class="card o-hidden profile-greeting">
                  <div class="card-body">
                  <div class="mobile-clock-widget">
                    <div class="bg-svg">
                      <svg class="climacon climacon_cloudLightningMoon" id="cloudLightningMoon" version="1.1" viewBox="15 15 70 70">
                        <clippath id="moonCloudFillClipfill11">
                          <path d="M0,0v100h100V0H0z M60.943,46.641c-4.418,0-7.999-3.582-7.999-7.999c0-3.803,2.655-6.979,6.211-7.792c0.903,4.854,4.726,8.676,9.579,9.58C67.922,43.986,64.745,46.641,60.943,46.641z"></path>
                        </clippath>
                        <clippath id="cloudFillClipfill19">
                          <path d="M15,15v70h70V15H15z M59.943,61.639c-3.02,0-12.381,0-15.999,0c-6.626,0-11.998-5.371-11.998-11.998c0-6.627,5.372-11.999,11.998-11.999c5.691,0,10.434,3.974,11.665,9.29c1.252-0.81,2.733-1.291,4.334-1.291c4.418,0,8,3.582,8,8C67.943,58.057,64.361,61.639,59.943,61.639z"></path>
                        </clippath>
                        <g class="climacon_iconWrap climacon_iconWrap-cloudLightningMoon">
                          <g clip-path="url(#cloudFillClip)">
                            <g class="climacon_wrapperComponent climacon_wrapperComponent-moon climacon_componentWrap-moon_cloud" clip-path="url(#moonCloudFillClip)">
                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" d="M61.023,50.641c-6.627,0-11.999-5.372-11.999-11.998c0-6.627,5.372-11.999,11.999-11.999c0.755,0,1.491,0.078,2.207,0.212c-0.132,0.576-0.208,1.173-0.208,1.788c0,4.418,3.582,7.999,8,7.999c0.614,0,1.212-0.076,1.788-0.208c0.133,0.717,0.211,1.452,0.211,2.208C73.021,45.269,67.649,50.641,61.023,50.641z"></path>
                            </g>
                          </g>
                          <g class="climacon_wrapperComponent climacon_wrapperComponent-lightning">
                            <polygon class="climacon_component climacon_component-stroke climacon_component-stroke_lightning" points="48.001,51.641 57.999,51.641 52,61.641 58.999,61.641 46.001,77.639 49.601,65.641 43.001,65.641 "></polygon>
                          </g>
                          <g class="climacon_wrapperComponent climacon_wrapperComponent-cloud">
                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M59.999,65.641c-0.28,0-0.649,0-1.062,0l3.584-4.412c3.182-1.057,5.478-4.053,5.478-7.588c0-4.417-3.581-7.998-7.999-7.998c-1.602,0-3.083,0.48-4.333,1.29c-1.231-5.316-5.974-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,12c0,5.446,3.632,10.039,8.604,11.503l-1.349,3.777c-6.52-2.021-11.255-8.098-11.255-15.282c0-8.835,7.163-15.999,15.998-15.999c6.004,0,11.229,3.312,13.965,8.204c0.664-0.114,1.338-0.205,2.033-0.205c6.627,0,11.999,5.371,11.999,11.999C71.999,60.268,66.626,65.641,59.999,65.641z"></path>
                          </g>
                        </g>
                      </svg>
                    </div>
                    <div>
                      <ul class="clock" id="clock">
                        <li class="hour" id="hour"></li>
                        <li class="min" id="min"></li>
                        <li class="sec" id="sec"></li>
                      </ul>
                      <div class="date f-24 mb-2" id="date"><span id="monthDay"></span><span id="year">, </span></div>
                      <div>
                        <p class="m-0 f-14 text-light" id="csc"></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-12 xl-50 calendar-sec box-col-6">
                <div class="card gradient-primary o-hidden">
                  <div class="card-body">
                    <div class="setting-dot">
                      <div class="setting-bg-primary date-picker-setting position-set pull-right"><i class="fa fa-spin fa-cog"></i></div>
                    </div>
                    <div class="default-datepicker">
                      <div class="datepicker-here" data-language="en"></div>
                    </div><span class="default-dots-stay overview-dots full-width-dots"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">                </span></span></span>
                  </div>
                </div>
              </div>
    </div>

</div>
@endsection
@push('js')
<script type="text/javascript">
   $.ajax({
  url: "https://geolocation-db.com/jsonp",
  jsonpCallback: "callback",
  dataType: "jsonp",
  success: function(location) {
    $('#csc').html(location.city+' '+location.state+', '+location.country_name);
  }
});
</script>
@endpush