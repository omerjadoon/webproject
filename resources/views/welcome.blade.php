<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <title>BigProfitAds</title>
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
        .modal.fade {
            opacity: 1;
        }

        .modal.fade .modal-dialog {
            -webkit-transform: translate(0);
            -moz-transform: translate(0);
            transform: translate(0);
        }
.pbh-10{
  padding: 10px;
}
        video {
            max-width: 700px;
            min-height: 394px;
        }.mth-25{
          margin-top: 30px !important;
        }

        @media only screen and (max-width: 600px) {
            video {
                max-width: 251px !important;
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

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
        </button>
                <a href="{{url('/')}}" class="navbar-brand smoothScroll"><img class="img-fluid" src="{{asset('user/assets/images/logo/logo.png')}}" alt="looginpage"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#top" class="smoothScroll"><span>Home</span></a></li>
                    <li><a href="#about" class="smoothScroll"><span>About</span></a></li>
                    @auth
                    <li><a href="{{url('home')}}"><span>Dashboard</span></a></li>
                    @endauth @guest
                    <li><a href="{{route('login')}}" class="smoothScroll"><span>Login</span></a></li>
                    <!-- <li><a href="{{route('register')}}" class="smoothScroll"><span>Register</span></a></li> -->
                    @endguest
                    <li><a href="{{route('admin-login.index')}}"><span>Admin Portal</span></a></li>
                    <li><a href="{{route('privacy_policy')}}" class=""><span>Privacy Policy</span></a></li>
                    <li><a href="#contact" class="smoothScroll"><span>Contact</span></a></li>
                </ul>
            </div>

        </div>
    </div>


    <!-- Home section -->

    <section id="home" class="mth-25">
        <div class="overlay mth-25"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="wow fadeInUp" data-wow-delay="0.6s">Want to get in touch directly? Call us today on <b>+1 (877) 432-4440
                    </b></h1>
                    <video loop="true" autoplay="autoplay" controls muted>
             <source  src="{{asset('landing/images/video.mp4')}}" type="video/mp4">
        </video>
                    <!-- <p class="wow fadeInUp" data-wow-delay="0.9s">Snapshot website template is available for free download. Anyone can modify and use it for any site. Please tell your friends about <a rel="nofollow" href="http://www.templatemo.com">templatemo</a>. Thank you.</p> -->
                </div>

            </div>
            @guest
            <div class="row">
                <div class="col-md-3"></div>
                {{--
                <div class="col-md-3">
                    <a href="{{route('register',['business'=>'yes'])}}" class="smoothScroll btn btn-success btn-lg wow fadeInUp" data-wow-delay="1.2s">Are you a Business</br> looking for exposure?</a>
                </div>href="{{route('register',['media'=>'yes'])}}"--}}
                <div class="col-md-6 text-center">
                    <!-- Button to Open the Modal -->

                    <button type="button" class="smoothScroll btn btn-success btn-lg wow fadeInUp" data-toggle="modal" data-target="#myModal" data-wow-delay="1.2s">Are you a Media</br> Company?</button>
                </div>
                <div class="col-md-3"></div>
            </div>
            

            @endguest
        </div>


    </section>


    <!-- About section -->

    <section id="about">
        <div class="container">
            <div class="row">

                <div class="col-md-9 col-sm-8 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="about-thumb">
                        <h1>Background</h1>
                        <p>Big Profit Ads connects businesses looking for exposure, with media companies looking to fill empty advertising slots - for a commission. We are a matchmaking service for you if you run a small or medium sized business and want
                            to place your print, video or audio ads across various media outlets, for free, if you make money, they make money.
                            </br>
                            Sign up with us today and see what we have on offer!
                            </br>
                            Team Big Profit Ads</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-4 wow fadeInUp about-img" data-wow-delay="0.6s">
                    <img src="{{asset('landing/images/about-img.png')}}" class="img-responsive img-circle" alt="About">
                </div>

                <div class="clearfix"></div>

                <!--      <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
        <div class="section-title text-center">
          <h1>Snapshot Team</h1>
          <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
        </div>
      </div> -->

                <!-- team carousel -->
                <!-- <div id="team-carousel" class="owl-carousel">

      <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="{{asset('landing/images/team-img1.jpg')}}" class="img-responsive img-circle" alt="Mary">
          </div>
          <h2 class="heading">Mary, CEO</h2>
          <p class="description">Aliquam ac justo est. Praesent feugiat cursus est.</p>
        </div>
      </div>

      <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="{{asset('landing/images/team-img2.jpg')}}" class="img-responsive img-circle" alt="Jack">
          </div>
          <h2 class="heading">Jack, Founder</h2>
          <p class="description">Maecenas sed diam eget risus varius blandit sit non.</p>
        </div>
      </div>

      <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="{{asset('landing/images/team-img3.jpg')}}" class="img-responsive img-circle" alt="Linda">
          </div>
          <h2 class="heading">Linda, Manager</h2>
          <p class="description">Phasellus nec ante in nunc molestie tincidunt ut eu diam.</p>
        </div>
      </div>

      <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="{{asset('landing/images/team-img4.jpg')}}" class="img-responsive img-circle" alt="Sandy">
          </div>
          <h2 class="heading">Sandy, Director</h2>
          <p class="description">Curabitur vulputate euismod neque et tincidunt.</p>
        </div>
      </div>

      <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="{{asset('landing/images/team-img5.jpg')}}" class="img-responsive img-circle" alt="Lukia">
          </div>
          <h2 class="heading">Lukia, Fashion</h2>
          <p class="description">Maecenas sed diam eget risus varius blandit sit.</p>
        </div>
      </div>

      <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="{{asset('landing/images/team-img6.jpg')}}" class="img-responsive img-circle" alt="George">
          </div>
          <h2 class="heading">George, Admin</h2>
          <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
        </div>
      </div>

      <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="{{asset('landing/images/team-img7.jpg')}}" class="img-responsive img-circle" alt="Day">
          </div>
          <h2 class="heading">Day, Accountant</h2>
          <p class="description">Maecenas sed diam eget risus varius blandit sit.</p>
        </div>
      </div>

      <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="{{asset('landing/images/team-img8.jpg')}}" class="img-responsive img-circle" alt="Lynn">
          </div>
          <h2 class="heading">Lynn, Marketing</h2>
          <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
        </div>
      </div>

      </div> -->
                <!-- end team carousel -->

            </div>
        </div>
    </section>


    <!-- Gallery section -->
    <!-- 
<section id="gallery">
  <div class="container">
    <div class="row">

      <div class="col-md-offset-2 col-md-8 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
        <div class="section-title">
          <h1>Gallery</h1>
          <p>Nullam scelerisque, quam nec iaculis vulputate, arcu ligula sollicitudin nisl, ac volutpat erat nulla a arcu.</p>
        </div>
      </div>

      <ul class="grid cs-style-4">
        <li class="col-md-6 col-sm-6">
          <figure>
            <div><img src="{{asset('landing/images/gallery-img1.jpg')}}" alt="image 1"></div>
            <figcaption>
              <h1>Sapien arcu</h1>
              <small>Cum sociis natoque penatibus et magnis dis parturient montes.</small>
              <a href="#">Read More</a>
            </figcaption>
          </figure>
        </li>

        <li class="col-md-6 col-sm-6">
          <figure>
            <div><img src="{{asset('landing/images/gallery-img2.jpg')}}" alt="image 2"></div>
            <figcaption>
              <h1>Aliquam erat</h1>
              <small>Suspendisse venenatis quam sed libero euismod feugiat.</small>
              <a href="#">Details</a>
            </figcaption>
          </figure>
        </li>

        <li class="col-md-6 col-sm-6">
          <figure>
            <div><img src="{{asset('landing/images/gallery-img3.jpg')}}" alt="image 3"></div>
            <figcaption>
              <h1>Cras ante sem</h1>
              <small>Aenean urna massa, convallis vehicula velit et, dictum pellentesque nisi.</small>
              <a href="#">Learn More</a>
            </figcaption>
          </figure>
        </li>

        <li class="col-md-6 col-sm-6">
          <figure>
            <div><img src="{{asset('landing/images/gallery-img4.jpg')}}" alt="image 4"></div>
            <figcaption>
              <h1>Sed ornare</h1>
              <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small>
              <a href="#">Full Post</a>
            </figcaption>
          </figure>
        </li>
      </ul>

    </div>
  </div>
</section> -->


    <!-- Contact section -->

    <section id="contact">
        <div class="container">
            <div class="row">

                <div class="col-md-offset-1 col-md-10 col-sm-12">

                    <div class="col-lg-offset-1 col-lg-10 section-title wow fadeInUp" data-wow-delay="0.4s">
                        <h1>Send a message</h1>
                        <p>Get in touch with us today, we will get back to you within the work day! </p>
                    </div>

                    <form action="#" method="post" class="wow fadeInUp" id="contact-form" data-wow-delay="0.8s">
                        <div class="col-md-4 col-sm-4">
                            <input name="name" type="text" class="form-control inpfeild" placeholder="Name">
                            <b><span class="text-danger empty-html" id="name"></span></b>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <input name="email" type="email" class="form-control inpfeild" id="" placeholder="Email">
                            <b><span class="text-danger empty-html" id="email"></span></b>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <input name="phone_number" type="text" class="form-control inpfeild" id="" placeholder="Contact Number">
                            <b><span class="text-danger empty-html" id="phone_number"></span></b>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <input name="subject" type="text" class="form-control inpfeild" id="" placeholder="Subject">
                            <b><span class="text-danger empty-html" id="subject"></span></b>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <textarea name="message" rows="6" class="form-control inpfeild" id="" placeholder="Message"></textarea>
                            <b><span class="empty-html text-danger" id="message"></span></b>
                        </div>
                        <div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
                            <b><span class="empty-html" id="main-error"></span></b>
                            <input type="button" id="sendcontactinfo" class="form-control btn btn-info" value="SEND MESSAGE">
                        </div>
                    </form>

                </div>

            </div>
        </div>



    </section>


    <!-- Footer section -->

    <footer>
        <div class="container">

            <div class="row">

                <div class="col-md-12 col-sm-12">

                    <!--  <ul class="social-icon"> 
                    <li><a href="#" class="fa fa-facebook wow fadeInUp" data-wow-delay="0.2s"></a></li>
                    <li><a href="#" class="fa fa-twitter wow fadeInUp" data-wow-delay="0.4s"></a></li>
                    <li><a href="#" class="fa fa-linkedin wow fadeInUp" data-wow-delay="0.6s"></a></li>
                    <li><a href="#" class="fa fa-instagram wow fadeInUp" data-wow-delay="0.8s"></a></li>
                    <li><a href="#" class="fa fa-google-plus wow fadeInUp" data-wow-delay="1.0s"></a></li>
                </ul> -->

                    <p class="wow fadeInUp" data-wow-delay="1s">Copyright &copy; 2021 BigProfitAds </p>

                </div>

            </div>

        </div>
    </footer>
    <!-- Modal -->
    <div class="modal modalAnimate fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" data-animation-in="bounceIn" data-animation-out="bounceOut">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="get" action="{{route('register')}}">
                      <input type="hidden" name="media" value="yes" >
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Register today and get a <b>Free Big Profit Ads Tshirt</b> worth $29.99/- absolutely free!</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6 text-center">
                                <img class="img-thumbnail" src="{{asset('images/bfatshirt.PNG')}}" min-height="100px">
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 pbh-10">
                                        <input type="text" class="form-control" required placeholder="Enter First Name" name="f_name" />
                                    </div>
                                    <div class="col-md-12 pbh-10">
                                        <input type="text" class="form-control" required placeholder="Enter Last Name" name="l_name" />
                                    </div>
                                    <div class="col-md-12 pbh-10">
                                        <input type="email" class="form-control" required placeholder="Enter Email" name="email" />
                                    </div>
                                    <div class="col-md-12 pbh-10">
                                        <select class="form-control" name="size" required>
                                          <option selected value="">Select Size</option>
                                          <option value="S">Small</option>
                                          <option value="M">Medium</option>
                                          <option value="L">Large</option>
                                          <option value="XL">extra Large</option>
                                          <option value="XXL">Double XXL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Register Now</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>

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
        <script>
            $('#sendcontactinfo').on('click', function() {
                $.ajax({
                    url: "{{route('save_contact')}}",
                    type: "post",
                    data: {
                        _token: "{{csrf_token()}}",
                        name: $('[name=name]').val(),
                        email: $('[name=email]').val(),
                        subject: $('[name=subject]').val(),
                        phone_number: $('[name=phone_number]').val(),
                        message: $('[name=message]').val(),
                    },
                    beforeSend: function() {
                        $(".empty-html").html(" ");
                        $('#sendcontactinfo').val('SENDING.....');
                    },
                    success: function(resp) {
                        $('#main-error').removeClass('text-danger').addClass('text-success');
                        $('#main-error').html(resp.msg);
                        $('#sendcontactinfo').val('SEND MESSAGE');
                        $('.inpfeild').val('');
                    },
                    error: function(resp) {
                        if (resp.status == 422) {
                            let errors = JSON.parse(resp.responseText)
                            $.each(errors.errors, function(key, value) {
                                $('#' + key).html(value);
                            });
                        }
                        if (resp.status == 400) {
                            let errors = JSON.parse(resp.responseText)
                            $('#main-error').removeClass('text-success').addClass('text-danger');
                            $('#main-error').html(errors.msg);
                        }
                        $('#sendcontactinfo').val('SEND MESSAGE');
                    }
                });


            });

            function modalAnimation(animation) {
                $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + animation + ' animated');
            };
            $('.modalAnimate').on('show.bs.modal', function(e) {
                var anim = $(this).attr('data-animation-in');
                modalAnimation(anim);
            });
            $('.modalAnimate').on('hide.bs.modal', function(e) {
                var anim = $(this).attr('data-animation-out');
                modalAnimation(anim);
            });
        </script>
</body>

</html>