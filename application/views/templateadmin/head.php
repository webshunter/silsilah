<?php
        $statususer = generate_session('login');
        $active = explode("/",$_SERVER['PATH_INFO']);
        if (!isset($active[2])) {
          $active = $active[1];
        }else{
          $active = $active[2];
        }
        $menu = [
            "Home" => "home",
            "Artikel" => "tbl_artikel",
            "Berita" => "tbl_berita",
            "Kegiatan" => "tbl_kegiatan",
            "Perusahaan" => "perusahaan",
            "Struktur Keluarga" => "tree",
            "User" => "user",
            "User Keluarga" => "user_kel",
            "Sosial Media" => "sosmed",
            "Support" => "support",
            "Service" => "service",
            "Testimony" => "testimony",
            "Kategori" => [
              "Agama" => "magama",
              "Artikiel" => "martikel",
              "Berita" => "mberita",
              "Kabupaten" => "mkabupaten",
              "Kegiatan" => "mkegiatan",
              "keluarga" => "mkel",
              "Jenis Kelamin" => "mkelamin",
              "Pekerjaan" => "mpekerjaan",
              "Pendidikan" => "mpendidikan",
              "Provinsi" => "mprovinsi",
              "Status Keluarga" => "mstatkel",
              "Umur" => "mumur",
              "Status" => "mstatus",
            ],
        ];

        $icon = [
            "Home" => "fa fa-home",
            "Artikel" => "fas fa-newspaper",
            "Berita" => "fas fa-newspaper",
            "Kegiatan" => "fas fa-snowboarding",
            "Perusahaan" => "far fa-building",
            "Struktur Keluarga" => "fas fa-project-diagram",
            "User" => "fa fa-users",
            "User Keluarga" => "fa fa-users",
            "Sosial Media" => "fa fa-hashtag",
            "Support" => "fa fa-hashtag",
            "Service" => "fab fa-servicestack",
            "Testimony" => "fas fa-thumbs-up",
            "Kategori" => "fa fa-tags",
        ];

        $auth = [
            "Home" => "user",
            "Artikel" => "admin",
            "Berita" => "user",
            "Kegiatan" => "user",
            "Perusahaan" => "admin",
            "Struktur Keluarga" => "user",
            "User" => "user",
            "User Keluarga" => "user",
            "Sosial Media" => "admin",
            "Support" => "admin",
            "Service" => "admin",
            "Testimony" => "admin",
            "Kategori" => [
              "Agama" => "admin",
              "Artikiel" => "admin",
              "Berita" => "user",
              "Kabupaten" => "admin",
              "Kegiatan" => "user",
              "keluarga" => "admin",
              "Jenis Kelamin" => "admin",
              "Pekerjaan" => "admin",
              "Pendidikan" => "admin",
              "Provinsi" => "admin",
              "Status Keluarga" => "admin",
              "Umur" => "admin",
              "Status" => "admin",
            ],
        ];

        $menuactive = NULL;
        // cek active menu
        foreach(array_keys($menu) as $cc => $val){
            // cek if array
            if (is_array($menu[$val])) {
                $ccc = $val;
                foreach(array_keys($menu[$val]) as $ccs => $vals){
                    if ($menu[$val][$vals] == $active) {
                        $menuactive = $ccc;
                    }
                }
            }else{
                if ($active == $menu[$val]) {
                    $menuactive = $val;
                }
            }
        }

        // autenticarion if admin login first load path 0 from array with condition active menu


        function cekarraylistcontainactivekey($active = null, $data = [], $auth)
        {
            $obj1 = array_keys($data);

            $cc = null;

            foreach ($obj1 as $key => $value) {
                if (is_array($data[$value])) {
                    foreach(array_keys($data[$value]) as $key => $datas ) {
                        if ($data[$value][$datas] == $active) {
                            $cc = $auth[$value][$datas];
                        }
                    }
                }else{
                    if ($data[$value] == $active) {
                        $cc = $auth[$value];
                    }
                }

            }
            return $cc;
        }

        function callbacktoadmin($active = null, $data = [], $auth)
        {
            $obj1 = array_keys($data);

            $cc = null;

            if ($active == 'home') {
              return redirect('home');
            }else{
              foreach ($obj1 as $key => $value) {
                if (is_array($data[$value])) {
                  foreach(array_keys($data[$value]) as $key => $datas ) {
                    if ($auth[$value][$datas] == $active) {
                      return redirect('admin/'.$data[$value][$datas]);
                    }
                  }
                }else{
                  if ($auth[$value] == $active) {
                    return redirect('admin/'.$data[$value]);
                  }
                }

              }
            }
            return $cc;

        }

        $cek = cekarraylistcontainactivekey($active, $menu, $auth);

        if (generate_session('login') != $cek) {
          if ($active == 'home') {

          }else{
            callbacktoadmin(generate_session('login'), $menu, $auth);
          }
        }


        // lihat nilai active

    ?>


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>  <?= Perusahaans::get()->nama; ?></title>
    <link href="<?= base_url('assets/') ?>logo.jpg" rel="icon">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- favicon

		============================================ -->
    <!-- Google Fonts
		============================================ -->
    <link href="<?= base_url('');?>assets/notika/https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900"
        rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->

    <!-- replay css -->

    <link rel="stylesheet" href="<?= base_url('');?>assets/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/owl.theme.css">
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/normalize.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/wave/waves.min.css">
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/wave/button.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/notika-custom-icon.css">
    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/jquery.dataTables.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('');?>assets/notika/css/responsive.css">


    <link rel="stylesheet" href="<?= base_url('');?>assets/summernote.min.css">

    <link rel="stylesheet" href="<?= base_url('');?>mc_sweetalert/sweetalert.css">


    <!-- modernizr JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- from notika -->
    <!-- datatable area -->

    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/notika/css/jquery.dataTables.min.css">
    <!-- main CSS
		============================================ -->
    <!-- style CSS
		============================================ -->
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('')?>assets/notika/css/responsive.css">

    <link rel="stylesheet" href="<?= base_url('')?>assets/tree/Treant.css" />

    <!-- from notika -->

    <!-- End Footer area-->
    <link rel="stylesheet" href="<?= base_url('')?>assets/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('')?>assets/responsive.bootstrap4.min.css">
    <!-- jquery

		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/data-table/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('')?>assets/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('')?>assets/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('')?>assets/responsive.bootstrap4.min.js"></script>

    <script src="<?= base_url('')?>assets/notika/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/counterup/waypoints.min.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/sparkline/sparkline-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/flot/jquery.flot.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/flot/jquery.flot.resize.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/flot/curvedLines.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/flot/flot-active.js"></script>

    <script src="<?= base_url('')?>assets/notika/js/icheck/icheck.min.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/icheck/icheck-active.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/chat/jquery.chat.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/knob/jquery.knob.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/knob/jquery.appear.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/wave/waves.min.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/wave/wave-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/todo/jquery.todo.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/autosize.min.js"></script>
    <!-- plugins JS

		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/plugins.js"></script>
	<!--  Chat JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/chat/moment.min.js"></script>
    <script src="<?= base_url('')?>assets/notika/js/chat/jquery.chat.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?= base_url('')?>assets/notika/js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->



    <script src="<?= base_url('');?>mc_sweetalert/sweetalert.js"></script>
    <script src="<?= base_url('')?>assets/summernote.min.js"></script>
    <script src="<?= base_url('')?>assets/tree/vendor/raphael.js"></script>
    <script src="<?= base_url('')?>assets/tree/Treant.js"></script>

    <!-- bootstrap JS
		============================================ -->

        <style>
            .paginate_button a{
            padding: 0 !important;
            background-color: rgba(0,0,0,0.0) !important;
            color: #000000 !important;
            outline: none !important;;
            border: none !important;;
            }

            .paginate_button.active a{
            color: #9ca8eb !important;
            }


            .footer-copyright-area{
              background-color: #007bff !important;
            }

            .header-top-area{
              background-color: #007bff !important;
            }


        </style>



</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="<?= base_url('');?>assets/notika/http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <h3 style="color: white;"><img src="<?= base_url('assets/logo.png');  ?>" style="height: 50px; width: auto;">&nbsp;&nbsp;&nbsp;Silsilah Keluarga</h3>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item dropdown">
                                <a href="<?= site_url('admin/login/out') ?>" role="button" aria-expanded="false"
                                    class="nav-link dropdown-toggle"><span><i
                                    class="fas fa-sign-out-alt"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->

        <!-- mobile -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="<?= site_url('admin/magama');?>">Agama</a></li>
                                        <li><a href="<?= site_url('');?>">Dashboard Two</a></li>
                                        <li><a href="<?= site_url('');?>">Dashboard Three</a></li>
                                        <li><a href="<?= site_url('');?>">Dashboard Four</a></li>
                                        <li><a href="<?= site_url('');?>">Analytics</a></li>
                                        <li><a href="<?= site_url('');?>">Widgets</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">Email</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li><a href="<?= base_url('');?>assets/notika/inbox.html">Inbox</a></li>
                                        <li><a href="<?= base_url('');?>assets/notika/view-email.html">View Email</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/compose-email.html">Compose
                                                Email</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#democrou" href="#">Interface</a>
                                    <ul id="democrou" class="collapse dropdown-header-top">
                                        <li><a href="<?= base_url('');?>assets/notika/animations.html">Animations</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/google-map.html">Google Map</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/data-map.html">Data Maps</a></li>
                                        <li><a href="<?= base_url('');?>assets/notika/code-editor.html">Code Editor</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/image-cropper.html">Images
                                                Cropper</a></li>
                                        <li><a href="<?= base_url('');?>assets/notika/wizard.html">Wizard</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demolibra" href="#">Charts</a>
                                    <ul id="demolibra" class="collapse dropdown-header-top">
                                        <li><a href="<?= base_url('');?>assets/notika/flot-charts.html">Flot Charts</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/bar-charts.html">Bar Charts</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/line-charts.html">Line Charts</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/area-charts.html">Area Charts</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Tables</a>
                                    <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="<?= base_url('');?>assets/notika/normal-table.html">Normal
                                                Table</a></li>
                                        <li><a href="<?= base_url('');?>assets/notika/data-table.html">Data Table</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demo" href="#">Forms</a>
                                    <ul id="demo" class="collapse dropdown-header-top">
                                        <li><a href="<?= base_url('');?>assets/notika/form-elements.html">Form
                                                Elements</a></li>
                                        <li><a href="<?= base_url('');?>assets/notika/form-components.html">Form
                                                Components</a></li>
                                        <li><a href="<?= base_url('');?>assets/notika/form-examples.html">Form
                                                Examples</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">App views</a>
                                    <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                        <li><a
                                                href="<?= base_url('');?>assets/notika/notification.html">Notifications</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/alert.html">Alerts</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/modals.html">Modals</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/buttons.html">Buttons</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/tabs.html">Tabs</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/accordion.html">Accordion</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/dialog.html">Dialogs</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/popovers.html">Popovers</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/tooltips.html">Tooltips</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/dropdown.html">Dropdowns</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages</a>
                                    <ul id="Pagemob" class="collapse dropdown-header-top">
                                        <li><a href="<?= base_url('');?>assets/notika/contact.html">Contact</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/invoice.html">Invoice</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/typography.html">Typography</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/color.html">Color</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/login-register.html">Login
                                                Register</a>
                                        </li>
                                        <li><a href="<?= base_url('');?>assets/notika/404.html">404 Page</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- desktop area -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">

                        <?php foreach(array_keys($menu) as $key => $val) : ?>
                            <?php if($val == $menuactive) : ?>
                                    <?php if(is_array($menu[$val])) : ?>
                                            <?php
                                                $cekstat = null;
                                                foreach(array_keys($menu[$val]) as $elm => $ecw){
                                                    if ($auth[$val][$ecw] == $statususer) {
                                                        $cekstat = $statususer;
                                                    }
                                                }

                                            ?>
                                            <?php if($statususer == $cekstat) : ?>
                                                <li class="active">
                                                    <a data-toggle="tab" href="#<?= str_replace(" ","-",$val); ?>"><i class="<?= $icon[$val] ?>"></i>
                                                        <?= $val ?>
                                                    </a>
                                                </li>
                                            <?php endif ?>
                                        <?php else : ?>
                                            <?php if($statususer == $auth[$val]) : ?>
                                              <?php if ($val == "Home"): ?>
                                                  <li class="active">
                                                    <a href="<?= site_url('/').$menu[$val]; ?>"><i class="<?= $icon[$val] ?>"></i>
                                                      <?= $val ?>
                                                    </a>
                                                  </li>
                                                <?php else: ?>
                                                  <li class="active">
                                                    <a href="<?= site_url('admin/').$menu[$val]; ?>"><i class="<?= $icon[$val] ?>"></i>
                                                      <?= $val ?>
                                                    </a>
                                                  </li>
                                              <?php endif; ?>
                                            <?php endif ?>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <?php if(is_array($menu[$val])) : ?>
                                            <?php
                                                $cekstat = null;
                                                foreach(array_keys($menu[$val]) as $elm => $ecw){
                                                    if ($auth[$val][$ecw] == $statususer) {
                                                        $cekstat = $statususer;
                                                    }
                                                }

                                            ?>
                                            <?php if($statususer == $cekstat) : ?>
                                            <li>
                                                <a data-toggle="tab" href="#<?= str_replace(" ","-",$val); ?>"><i class="<?= $icon[$val] ?>"></i>
                                                    <?= $val ?>
                                                </a>
                                            </li>
                                            <?php endif ?>
                                        <?php else : ?>
                                            <?php if($statususer == $auth[$val]) : ?>
                                              <?php if ($val == "Home"): ?>
                                                  <li>
                                                    <a href="<?= site_url('/').$menu[$val]; ?>"><i class="<?= $icon[$val] ?>"></i>
                                                      <?= $val ?>
                                                    </a>
                                                  </li>
                                                <?php else: ?>
                                                  <li>
                                                    <a href="<?= site_url('admin/').$menu[$val]; ?>"><i class="<?= $icon[$val] ?>"></i>
                                                      <?= $val ?>
                                                    </a>
                                                  </li>
                                              <?php endif; ?>
                                            <?php endif ?>
                                    <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <li>
                            <a data-toggle="tab" href="#lain-lain" aria-expanded="true"><i class="fa fa-tags"></i>
                                Lain-lain
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">

                      <div id="lain-lain" class="tab-pane in notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="<?= site_url('admin/tbl_berita/editor');?>">Berita</a></li>
                              <li><a href="<?= site_url('admin/tbl_kegiatan/editor');?>">Kegiatan</a></li>
                          </ul>
                        </div>
                        <?php foreach(array_keys($menu) as $key => $val) : ?>
                            <?php if($val == $menuactive) : ?>
                                    <?php if(is_array($menu[$val])) : ?>
                                        <!--  -->
                                        <div id="<?= str_replace(" ","-",$val); ?>" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                                            <ul class="notika-main-menu-dropdown">
                                                <!--  -->
                                                <?php foreach(array_keys($menu[$val]) as $keyd => $vald) : ?>
                                                    <?php if($statususer == $auth[$val][$vald]) : ?>
                                                        <li><a href="<?= site_url('admin/'.$menu[$val][$vald]);?>"><?= $vald; ?></a></li>
                                                    <?php endif ?>
                                                <?php endforeach; ?>
                                                <!--  -->
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <?php if(is_array($menu[$val])) : ?>
                                        <!--  -->
                                        <div id="<?= str_replace(" ","-",$val); ?>" class="tab-pane in notika-tab-menu-bg animated flipInX">
                                            <ul class="notika-main-menu-dropdown">
                                                <!--  -->
                                                <?php foreach(array_keys($menu[$val]) as $keyd => $vald) : ?>
                                                    <?php if($statususer == $auth[$val][$vald]) : ?>
                                                        <li><a href="<?= site_url('admin/'.$menu[$val][$vald]);?>"><?= $vald; ?></a></li>
                                                    <?php endif ?>
                                                <?php endforeach; ?>
                                                <!--  -->
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
