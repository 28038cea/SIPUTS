<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $judul ?></title>
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
  <!-- data-table CSS
		============================================ -->
  <link rel="stylesheet" href="/assets/css/data-table/bootstrap-table.css">
  <link rel="stylesheet" href="/assets/css/data-table/bootstrap-editable.css">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="/assets/css/normalize.css">
  <!-- charts C3 CSS
		============================================ -->
  <link rel="stylesheet" href="/assets/css/c3.min.css">
  <!-- forms CSS
		============================================ -->
  <link rel="stylesheet" href="/assets/css/form/all-type-forms.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="/assets/style.css">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="/assets/css/responsive.css">
  <!-- modernizr JS
		============================================ -->
  <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
  <!-- jquery
		============================================ -->
  <!-- <script src="/assets/js/vendor/jquery-1.11.3.min.js"></script> -->
  <script src="/assets/js/jquery/dist/jquery.min.js"></script>





</head>

<body class="materialdesign">
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

  <!-- Header top area start-->
  <div class="wrapper-pro">
    <div class="left-sidebar-pro">
      <nav id="sidebar">
        <div class="sidebar-header">
          <a href="#"><img src="/upload/<?= $akun['foto'] ?>" alt="" style="width : 100px" />
          </a>
          <h3>
            <?= $akun['nama'] ?>
          </h3>
          <p><?= $akun['role'] ?></p>
          <strong>AP+</strong>
        </div>
        <div class="left-custom-menu-adp-wrap">
          <ul class="nav navbar-nav left-sidebar-menu-pro">
            <li class="nav-item">
              <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Home</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
              <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                <a href="/admin" class="dropdown-item">Dashboard</a>
                <a href="/admin/admin" class="dropdown-item">Data Akun</a>
                <a href="/admin/user" class="dropdown-item">Data User</a>
                <a href="/admin/gambar" class="dropdown-item">Data Gambar</a>
                <a href="analytics.html" class="dropdown-item">Data Pariwisata</a>
                <a href="widgets.html" class="dropdown-item">Widgets</a>
              </div>
            </li>

          </ul>
        </div>
      </nav>
    </div>
    <div class="content-inner-all">
      <div class="header-top-area">
        <div class="fixed-header-top">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                  <i class="fa fa-bars"></i>
                </button>
                <div class="admin-logo logo-wrap-pro">
                  <a href="#"><img src="/assets/img/logo/log.png" alt="" />
                  </a>
                </div>
              </div>
              <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">
                <div class="header-top-menu tabl-d-n">
                  <ul class="nav navbar-nav mai-top-nav">
                    <li class="nav-item"><a href="#" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">About</a>
                    </li>

                  </ul>
                </div>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                <div class="header-right-info">
                  <ul class="nav navbar-nav mai-top-nav header-right-menu">

                    <li class="nav-item">
                      <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                        <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                        <span class="admin-name"><?= $akun['nama'] ?></span>
                        <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                      </a>
                      <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                        <!-- <li><a href="#"><span class="adminpro-icon adminpro-home-admin author-log-ic"></span>My Account</a> -->
                        <!-- </li> -->
                        <!-- <li><a href="#"><span class="adminpro-icon adminpro-user-rounded author-log-ic"></span>My Profile</a> -->
                        <!-- </li> -->
                        <!-- <li><a href="#"><span class="adminpro-icon adminpro-money author-log-ic"></span>User Billing</a> -->
                        <!-- </li> -->
                        <!-- <li><a href="#"><span class="adminpro-icon adminpro-settings author-log-ic"></span>Settings</a> -->
                    </li>
                    <li><a href="/auth/logout"><span class="adminpro-icon adminpro-locked author-log-ic"></span>Log Out</a>
                    </li>
                  </ul>
                  </li>


                  </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Header top area end-->
      <!-- Breadcome start-->
      <div class="breadcome-area mg-b-30 small-dn">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="breadcome-heading">
                      <form role="search" class="">
                        <input type="text" placeholder="Search..." class="form-control">
                        <a href=""><i class="fa fa-search"></i></a>
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <ul class="breadcome-menu">
                      <li><a href="#">Home</a> <span class="bread-slash">/</span>
                      </li>
                      <li><span class="bread-blod">Dashboard</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Breadcome End-->


      <?= $this->renderSection('content') ?>

    </div>
  </div>
  <!-- Footer Start-->
  <div class="footer-copyright-area">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="footer-copy-right">
            <p>Copyright &#169; 2018 Colorlib All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer End-->

  <script src="/assets/dist/sweetalert2.all.min.js"></script>
  <!-- bootstrap JS
		============================================ -->
  <script src="/assets/js/bootstrap.min.js"> </script>
  <!-- meanmenu JS============================================ -->
  <script src="/assets/js/jquery.meanmenu.js">
  </script>
  <!-- mCustomScrollbar JS
		============================================ -->
  <script src="/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
  <!-- sticky JS
		============================================ -->
  <script src="/assets/js/jquery.sticky.js"></script>
  <!-- scrollUp JS
		============================================ -->
  <script src="/assets/js/jquery.scrollUp.min.js"></script>
  <!-- counterup JS
		============================================ -->
  <script src="/assets/js/counterup/jquery.counterup.min.js"></script>
  <script src="/assets/js/counterup/waypoints.min.js"></script>
  <script src="/assets/js/counterup/counterup-active.js"></script>
  <!-- peity JS
		============================================ -->
  <script src="/assets/js/peity/jquery.peity.min.js"></script>
  <script src="/assets/js/peity/peity-active.js"></script>
  <!-- sparkline JS
		============================================ -->
  <script src="/assets/js/sparkline/jquery.sparkline.min.js"></script>
  <script src="/assets/js/sparkline/sparkline-active.js"></script>
  <!-- flot JS
		============================================ -->
  <script src="/assets/js/flot/jquery.flot.js"></script>
  <script src="/assets/js/flot/jquery.flot.tooltip.min.js"></script>
  <script src="/assets/js/flot/jquery.flot.spline.js"></script>
  <script src="/assets/js/flot/jquery.flot.resize.js"></script>
  <script src="/assets/js/flot/jquery.flot.pie.js"></script>
  <script src="/assets/js/flot/Chart.min.js"></script>
  <script src="/assets/js/flot/flot-active.js"></script>
  <!-- map JS
		============================================ -->
  <script src="/assets/js/map/raphael.min.js"></script>
  <script src="/assets/js/map/jquery.mapael.js"></script>
  <script src="/assets/js/map/france_departments.js"></script>
  <script src="/assets/js/map/world_countries.js"></script>
  <script src="/assets/js/map/usa_states.js"></script>
  <script src="/assets/js/map/map-active.js"></script>
  <!-- data table JS
		============================================ -->
  <script src="/assets/js/data-table/bootstrap-table.js"></script>
  <script src="/assets/js/data-table/tableExport.js"></script>
  <script src="/assets/js/data-table/data-table-active.js"></script>
  <script src="/assets/js/data-table/bootstrap-table-editable.js"></script>
  <script src="/assets/js/data-table/bootstrap-editable.js"></script>
  <script src="/assets/js/data-table/bootstrap-table-resizable.js"></script>
  <script src="/assets/js/data-table/colResizable-1.5.source.js"></script>
  <script src="/assets/js/data-table/bootstrap-table-export.js"></script>
  <!-- main JS
		============================================ -->
  <script src="/assets/js/main.js"></script>
</body>

</html>