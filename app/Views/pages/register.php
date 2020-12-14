<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Register </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">
  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
  <!-- adminpro icon CSS
		============================================ -->
  <link rel="stylesheet" href="/assets/css/adminpro-custon-icon.css">
  <!-- meanmenu icon CSS
		============================================ -->
  <link rel="stylesheet" href="/assets/css/meanmenu.min.css">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="/assets/css/jquery.mCustomScrollbar.min.css">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="/assets/css/animate.css">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="/assets/css/normalize.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="/assets/css/form.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="style.css">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="/assets/css/responsive.css">
  <!-- modernizr JS
		============================================ -->
  <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="materialdesign">
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

  <!-- Register Start-->
  <div class="login-form-area mg-t-30 mg-b-15">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3"></div>
        <form id="adminpro-register-form" class="adminpro-form" method="post" action="/Auth/regis">
          <div class="col-lg-6">
            <div class="login-bg">
              <div class="row">
                <div class="col-lg-12">
                  <div class="logo">
                    <a href="#"><img src="/assets/img/logo/log.png" alt="" />
                    </a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="login-title">
                    <h1>Registration Form</h1>
                    <?php if (session()->getFlashdata('registered')) : ?>
                      <?= session()->getFlashdata('registered'); ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="login-input-head">
                    <p>Name</p>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="login-input-area">
                    <input type="text" name="name" />
                    <i class="fa fa-user login-user"></i>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="login-input-head">
                    <p>Email Address</p>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="login-input-area">
                    <input type="email" name="email" />
                    <i class="fa fa-envelope login-user" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="login-input-head">
                    <p>Password</p>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="login-input-area">
                    <input type="password" name="password1" />
                    <i class="fa fa-lock login-user"></i>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="login-input-head">
                    <p>Confirm Password</p>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="login-input-area">
                    <input type="password" name="password2" />
                    <i class="fa fa-lock login-user"></i>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                  <div class="login-button-pro">
                    <a href="/Auth" type="btn-btn" class="login-button login-button-rg">Log In</a>
                    <button type="submit" class="login-button login-button-lg">Register</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="col-lg-3"></div>
      </div>
    </div>
  </div>
  <!-- Register End-->
  </div>
  </div>

  <!-- Footer End-->
  <!-- jquery
		============================================ -->
  <script src="/assets/js/vendor/jquery-1.11.3.min.js"></script>
  <!-- bootstrap JS
		============================================ -->
  <script src="/assets/js/bootstrap.min.js"></script>
  <!-- meanmenu JS
		============================================ -->
  <script src="/assets/js/jquery.meanmenu.js"></script>
  <!-- mCustomScrollbar JS
		============================================ -->
  <script src="/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
  <!-- sticky JS
		============================================ -->
  <script src="/assets/js/jquery.sticky.js"></script>
  <!-- scrollUp JS
		============================================ -->
  <script src="/assets/js/jquery.scrollUp.min.js"></script>
  <!-- form validate JS
		============================================ -->
  <script src="/assets/js/jquery.form.min.js"></script>
  <script src="/assets/js/jquery.validate.min.js"></script>
  <script src="/assets/js/form-active.js"></script>
  <!-- main JS
		============================================ -->
  <script src="/assets/js/main.js"></script>
</body>

</html>