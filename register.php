<?php
   session_start();

   $con = mysqli_connect("localhost","root","") or die("Couldn't connect");
   mysqli_select_db($con,"talkapp")or die("Couldn't Find Database");
   
    
    if(isset($_POST['submit']))
    {
      $name =$_POST['Name'];
      $surname =$_POST['Surname'];
      $email =$_POST['email'];
      $password =$_POST['password'];
      $confirm_password =$_POST['cpassword'];
      $status="1";
      if($confirm_password==$password)
      {
      
        $password=md5($password);
      
        $stmt= $con->prepare("INSERT INTO users(Name,Surname,Email,Password,Status) VALUES(?,?,?,?,?)");
        $stmt->bind_param("sssss",$name,$surname,$email,$password,$status);
        
          if($stmt->execute())
          {
             echo "Success";

             header("location: login.php");
  
          }else
          {
            echo "Not Success";
  
          }

      }else{

        echo "passwords doesn't match";
      }
    
    }
   


?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/paper-kit-2-pro/examples/login-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Jun 2018 07:41:26 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Talk 2 Me
  </title>
  <style>
  .card-register{

    opacity: .7;
  }
  </style>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Canonical SEO -->
 
  <!--  Social tags      -->
  <meta name="keywords" content="bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, paper, paper kit, creative tim, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit, premium bootstrap 4 ui kit, premium template, bootstrap 4 template">
  <meta name="description" content="Paper Kit PRO is a premium Bootstrap 4 kit provided by Invision and Creative Tim. It is a beautiful cross-platform UI kit featuring over 1000 components, 34 sections and 11 example pages.">
  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="Paper Kit Pro by Creative Tim">
  <meta itemprop="description" content="Paper Kit PRO is a premium Bootstrap 4 kit provided by Invision and Creative Tim. It is a beautiful cross-platform UI kit featuring over 1000 components, 34 sections and 11 example pages.">
  <meta itemprop="image" content="../../../s3.amazonaws.com/creativetim_bucket/products/62/opt_pk2p_thumbnail.jpg">
  <!-- Twitter Card data -->
 
  <!-- Open Graph data -->
  <meta property="fb:app_id" content="655968634437471">
  <meta property="og:title" content="Paper Kit Pro by Creative Tim" />
  <meta property="og:type" content="article" />

  <meta property="og:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/62/opt_pk2p_thumbnail.jpg" />
  <meta property="og:description" content="Paper Kit PRO is a premium Bootstrap 4 kit provided by Invision and Creative Tim. It is a beautiful cross-platform UI kit featuring over 1000 components, 34 sections and 11 example pages." />
  <meta property="og:site_name" content="Creative Tim" />
  <!--     Fonts and icons     -->

  <link href="../../../maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="bootstrap.min.css" rel="stylesheet" />
  <link href="paper-kit.min89bf.css?v=2.2.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="demo.css" rel="stylesheet" />
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        '../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
  </script>
  <!-- End Google Tag Manager -->
</head>

<body class="login-page full-screen sidebar-collapse">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-white fixed-top nav-down navbar-transparent" color-on-scroll="500">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="../index.html" rel="tooltip" title="Paper Kit 2 PRO" data-placement="bottom" target="_blank">
         Talk 2 Me
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" data-nav-image="assets/img/blurred-image-1.jpg" data-color="orange">
        <ul class="navbar-nav ml-auto">
         
          <li class="nav-item">
            <a class="btn btn-round btn-danger" href="login.php" target="_blank">
               Login
            </a>
          </li>
  
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header" style="background-image: url('assets/img/sections/bruno-abatti.jpg');">
      <div class="filter"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
            <div class="card card-register">
              <h3 class="card-title">Welcome</h3>
              <form class="register-form" method="post" action="">
                <label>Name</label>
                <input type="text" class="form-control no-border" id="Name" name="Name" placeholder="Name">
                <label>Surname</label>
                <input type="text" class="form-control no-border" id="Surname" name="Surname" placeholder="Surname">
                <label>Email</label>
                <input type="email" class="form-control no-border" id="email" name="email" placeholder="Email">
                <label>Password</label>
                <input type="password" class="form-control no-border" id="password" name="password" placeholder="Password">
                <label>Confirm Password</label>
                <input type="password" class="form-control no-border" id="cpassword" name="cpassword" placeholder="Confirm Password">
                <input type="submit" class="btn btn-danger btn-block btn-round" id="submit" name="submit" value="Register"/>
              </form>
              <div class="forgot">
                <a href="#paper-kit" class="btn btn-link btn-danger">Forgot password?</a>
              </div>
            </div>
          </div>
        </div>
        <div class="demo-footer text-center">
          <h6>&copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made <i class="fa fa-heart heart"></i> by Ingenious Vision</h6>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="jquery.min.js" type="text/javascript"></script>
  <script src="rpopper.min.js" type="text/javascript"></script>
  <script src="bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="moment.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="bootstrap-tagsinput.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="bootstrap-selectpicker.js" type="text/javascript"></script>
  <!--	Plugin for Datetimepicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Vertical nav - dots -->
  <!--  Photoswipe files -->
  <script src="photoswipe.min.js"></script>
  <script src="photoswipe-ui-default.min.js"></script>
  <script src="init-gallery.js"></script>
  <!--  for Jasny fileupload -->
  <script src="jasny-bootstrap.min.js"></script>
  <!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
  <script src="paper-kit.min89bf.js?v=2.2.1" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
  <!--  Plugin for presentation page - isometric cards  -->
  <script src="presentation-page/main.js"></script>
  <!-- Sharrre libray -->
  <script src="jquery.sharrre.js"></script>
  <script>
    $(document).ready(function() {


      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-46172202-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
      })();

      // Facebook Pixel Code Don't Delete
      ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
          n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
      }(window,
        document, 'script', '../../../connect.facebook.net/en_US/fbevents.js');

      try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

      } catch (err) {
        console.log('Facebook Track Error:', err);
      }

    });
  </script>
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
  </noscript>
  <script>
    $(document).ready(function() {

      $sidebar = $('.sidebar');
      $sidebar_img_container = $sidebar.find('.sidebar-background');

      $full_page = $('.full-page');

      $sidebar_responsive = $('body > .navbar-collapse');
      sidebar_mini_active = true;

      window_width = $(window).width();

      fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

      // if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
      //     if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
      //         $('.fixed-plugin .dropdown').addClass('show');
      //     }
      //
      // }

      $('.fixed-plugin a').click(function(event) {
        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass('switch-trigger')) {
          if (event.stopPropagation) {
            event.stopPropagation();
          } else if (window.event) {
            window.event.cancelBubble = true;
          }
        }
      });

      $('.fixed-plugin .active-color span').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if ($sidebar.length != 0) {
          $sidebar.attr('data-active-color', new_color);
        }

        if ($full_page.length != 0) {
          $full_page.attr('data-active-color', new_color);
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.attr('data-active-color', new_color);
        }
      });

      $('.fixed-plugin .background-color span').click(function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if ($sidebar.length != 0) {
          $sidebar.attr('data-color', new_color);
        }

        if ($full_page.length != 0) {
          $full_page.attr('filter-color', new_color);
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.attr('data-color', new_color);
        }
      });

      $('.fixed-plugin .img-holder').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).parent('li').siblings().removeClass('active');
        $(this).parent('li').addClass('active');


        var new_image = $(this).find("img").attr('src');

        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          $sidebar_img_container.fadeOut('fast', function() {
            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $sidebar_img_container.fadeIn('fast');
          });
        }

        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

          $full_page_background.fadeOut('fast', function() {
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            $full_page_background.fadeIn('fast');
          });
        }

        if ($('.switch-sidebar-image input:checked').length == 0) {
          var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

          $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
          $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
        }
      });

      $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function() {
        $full_page_background = $('.full-page-background');

        $input = $(this);

        if ($input.is(':checked')) {
          if ($sidebar_img_container.length != 0) {
            $sidebar_img_container.fadeIn('fast');
            $sidebar.attr('data-image', '#');
          }

          if ($full_page_background.length != 0) {
            $full_page_background.fadeIn('fast');
            $full_page.attr('data-image', '#');
          }

          background_image = true;
        } else {
          if ($sidebar_img_container.length != 0) {
            $sidebar.removeAttr('data-image');
            $sidebar_img_container.fadeOut('fast');
          }

          if ($full_page_background.length != 0) {
            $full_page.removeAttr('data-image', '#');
            $full_page_background.fadeOut('fast');
          }

          background_image = false;
        }
      });


      $('.switch-mini input').on("switchChange.bootstrapSwitch", function() {
        $body = $('body');

        $input = $(this);

        if (paperDashboard.misc.sidebar_mini_active == true) {
          $('body').removeClass('sidebar-mini');
          paperDashboard.misc.sidebar_mini_active = false;

          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

        } else {

          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

          setTimeout(function() {
            $('body').addClass('sidebar-mini');

            paperDashboard.misc.sidebar_mini_active = true;
          }, 300);
        }

        // we simulate the window Resize so the charts will get updated in realtime.
        var simulateWindowResize = setInterval(function() {
          window.dispatchEvent(new Event('resize'));
        }, 180);

        // we stop the simulation of Window Resize after the animations are completed
        setTimeout(function() {
          clearInterval(simulateWindowResize);
        }, 1000);

      });

    });
  </script>
</body>


<!-- Mirrored from demos.creative-tim.com/paper-kit-2-pro/examples/login-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Jun 2018 07:41:26 GMT -->
</html>
