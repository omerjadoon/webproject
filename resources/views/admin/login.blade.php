<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title>BigProfitAds - Admin Login</title>
       <link rel="icon" href="{{asset('admin/login/logo.png')}}" type="image/png" sizes="16x16">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('admin/login/login.css')}}">
  <style type="text/css">
      .error-field{
        color: red; 
        display:block;
        margin-top: -10px;
        margin-bottom: 3px;

    }
  </style>
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="{{asset('admin/login/login.jpg')}}" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
                    @include('alerts.error-alert',['ses_name'=>'error'])
              <div class="brand-wrapper">
                <img src="{{asset('admin/login/logo.png')}}" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Sign into your account</p>

              <form action="{{route('admin-login.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                                  @include('alerts.error-alert',['ses_name'=>'cred_err'])
                </div>
                  <div class="form-group">
                    <label for="email" class="sr-only">User Name</label>
                    <input type="text" name="user_name" id="email" class="form-control" placeholder="Email address">

                  </div>
                                         @include('alerts.errorfield', ['field' => 'user_name'])
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                     
                  </div>
                   @include('alerts.errorfield', ['field' => 'password'])
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                </form>
<!--                 <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p> -->
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
