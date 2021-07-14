<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <title>BigProfitAds - Privacy Policy</title>
     <link rel="icon" href="{{asset('admin/login/logo.png')}}" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{asset('landing/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/component.css')}}">
    
    <link rel="stylesheet" href="{{asset('landing/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/vegas.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/style.css')}}">

    <!-- Google web font  -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>
    <style type="text/css">
        video{
            max-width:700px;min-height:394px;
        }
        .mt-3{
    margin-top: 3rem;
  }
  .mr-top-50{
          margin-top: 53px !important;
        }
      
        @media only screen and (max-width: 600px) {
  video {
   max-width: 251px !important;
  }
  .img-med{
              max-width: 119px;
            }
}
      

    </style>
    
</head>
<body id="top" data-spy="scroll" data-offset="50" data-target=".navbar-collapse">


<!-- Preloader section -->

<div class="preloader">
     <div class="sk-spinner sk-spinner-pulse"></div>
</div>


<!-- Navigation section  -->

  <div class="navbar navbar-default navbar-fixed-top" role="navigation" style="height: 100px !important">
    <div class="container">

      <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
        </button>
        <a href="{{url('/')}}" class="navbar-brand smoothScroll"><img class="img-fluid img-med" src="{{asset('admin/login/logo.png')}}" width="150px" alt="looginpage"></a>   </div>
        <div class="collapse navbar-collapse mr-top-50">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{url('/')}}" class="smoothScroll"><span>Home</span></a></li>
            <li><a href="{{url('/#about')}}" class="smoothScroll"><span>About</span></a></li>
            @auth
             <li><a href="{{url('home')}}"><span>Dashboard</span></a></li>
            @endauth
            @guest
            <li><a href="{{route('login')}}" class="smoothScroll"><span>Login</span></a></li>
            <!-- <li><a href="{{route('register')}}" class="smoothScroll"><span>Register</span></a></li> -->
            @endguest
            <li><a href="{{route('admin-login.index')}}"><span>Admin Portal</span></a></li>
            <li class="active"><a href="{{route('privacy_policy')}}" class=""><span>Privacy Policy</span></a></li>
            <li><a href="{{url('/#contact')}}" class="smoothScroll"><span>Contact</span></a></li>
          </ul>
       </div>

    </div>
  </div>

<!-- Home section -->

<section id="home">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">

      <div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
        <h1 class="wow fadeInUp" data-wow-delay="0.6s">PRIVACY POLICY</h1>
        <p class="wow fadeInUp" data-wow-delay="0.9s">If you require any more information or have any questions about our privacy policy, please feel free to contact us using  <a rel="nofollow" href="{{url('/#contact')}}">Contact Us </a>form. Thank you.</p>
      </div>

    </div>
   
  </div>
  

</section>
<section id="about">
  <div class="container">
    <div class="row">

      <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.2s">
        <div class="about-thumb">
          <h1>Policies</h1>
          <p>
            <b>Privacy Policy: What personal data do we collect and why we collect it.<b></br>
 


<b>Comments & Reviews</b>
</br>

When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor’s IP address and browser user agent string to help spam detection.



<b>Contact form messages, Analytics & Cookies</b>
</br>

If you leave a comment on any blog or article on our site you automatically opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.



<b>Payment Information</b>
</br>

Your credit card info is held in a secure database in our official Stripe account, as all our transactions are processed through Stripe.



<b>Your name, address, contact details & preferences.</b>

</br>
The purpose of collecting & preserving this data is solely to help make your website use experience a little easier each time you opt to use our site.


For any further queries you might have, feel free to reach us via the contact section on this site.</p>
        </div>
      </div>

     <!--  <div class="col-md-3 col-sm-4 wow fadeInUp about-img" data-wow-delay="0.6s">
        <img src="{{asset('landing/images/about-img.jpg')}}" class="img-responsive img-circle" alt="About">
      </div> -->

      <div class="clearfix"></div>



    </div>
  </div>
</section>

  <!-- Footer section -->

<footer class="p-3">
    <div class="container">
    
        <div class="row mt-3">

            <div class="col-md-12 col-sm-12">
            
              <!--   <ul class="social-icon"> 
                    <li><a href="#" class="fa fa-facebook wow fadeInUp" data-wow-delay="0.2s"></a></li>
                    <li><a href="#" class="fa fa-twitter wow fadeInUp" data-wow-delay="0.4s"></a></li>
                    <li><a href="#" class="fa fa-linkedin wow fadeInUp" data-wow-delay="0.6s"></a></li>
                    <li><a href="#" class="fa fa-instagram wow fadeInUp" data-wow-delay="0.8s"></a></li>
                    <li><a href="#" class="fa fa-google-plus wow fadeInUp" data-wow-delay="1.0s"></a></li>
                </ul> -->

                <p class="wow fadeInUp"  data-wow-delay="1s" >Copyright &copy; 2021 BigProfitAds </p>
                
            </div>
            
        </div>
        
    </div>
</footer>

<!-- Back top -->
<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

<!-- Javascript  -->
<script src="{{asset('landing/js/jquery.js')}}"></script>
<script src="{{asset('landing/js/bootstrap.min.js')}}"></script>
<script src="{{asset('landing/js/vegas.min.js')}}"></script>
<script src="{{asset('landing/js/modernizr.custom.js')}}"></script>
<script src="{{asset('landing/js/toucheffects.js')}}"></script>
<script src="{{asset('landing/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('landing/js/smoothscroll.js')}}"></script>
<script src="{{asset('landing/js/wow.min.js')}}"></script>
<script src="{{asset('landing/js/custom.js')}}"></script>
</body>
</html>