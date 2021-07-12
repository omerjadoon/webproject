 <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
          <div class="logo-wrapper"><a href="{{route('main')}}"><img class="img-fluid for-light" src="{{asset('user/assets/images/logo/logo.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('user/assets/images/logo/logo.png')}}" alt="looginpage"></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
          </div>
          <div class="logo-icon-wrapper"><a href="{{route('main')}}"><img class="img-fluid" src="{{asset('user/assets/images/logo/logo.png')}}" alt="looginpage"></a></div>

          <nav class="sidebar-main">

            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
            @if(Auth::user()->email_verified_at!='')
           
              <ul class="sidebar-links custom-scrollbar">
                <li class="back-btn"><a href="{{url('/')}}"><img class="img-fluid" src="{{asset('user/assets/images/logo/logo-icon.png')}}" alt=""></a>
                  <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                </li>
                <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title link-nav {{$request=='dashboard' ? 'active' : ''}}" href="{{route('media_dashboard.index')}}"><i data-feather="home"></i><span>Dashboard</span></a>
                </li>
                <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title link-nav {{$request=='payment' ? 'active' : ''}}" href="{{route('payment-detail.index')}}"><i data-feather="credit-card"></i><span>Payment Detail</span></a>
                </li>
                 <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title {{$request=='ads' ? 'active' : ''}}" href="#"><i data-feather="monitor"></i><span>Ads Detail</span></a>
                    <ul class="sidebar-submenu">
                    <li><a href="{{route('ad-detail.index')}}">All Ads</a></li>
                    <li><a href="{{route('participated_ad')}}">Participated Ads</a></li>
                  </ul>
                </li>
                <li class="sidebar-list">
                  <a class="sidebar-link sidebar-title link-nav {{$request=='lead' ? 'active' : ''}}" href="{{route('media_lead.index')}}"><i data-feather="pocket"></i><span>Leads</span></a>
                </li>

              </ul>
            
            @endif
            </div>

            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
             
          </nav>
         
        </div>
        <!-- Page Sidebar Ends-->app