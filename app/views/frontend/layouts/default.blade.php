<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>MediaCloud | Homepage</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <link href="/_frontend/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
   <link href="/_frontend/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   <!-- END GLOBAL MANDATORY STYLES -->

   <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
   <link href="/_frontend/assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link rel="stylesheet" href="/_frontend/assets/plugins/revolution_slider/css/rs-style.css" media="screen">
   <link rel="stylesheet" href="/_frontend/assets/plugins/revolution_slider/rs-plugin/css/settings.css" media="screen">
   <link href="/_frontend/assets/plugins/bxslider/jquery.bxslider.css" rel="stylesheet" />
   <!-- END PAGE LEVEL PLUGIN STYLES -->

   <!-- BEGIN THEME STYLES -->
   <link href="/_frontend/assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
   <link href="/_frontend/assets/css/style.css" rel="stylesheet" type="text/css"/>
   <link href="/_frontend/assets/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>
   <link href="/_frontend/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
   <link href="/_frontend/assets/css/custom.css" rel="stylesheet" type="text/css"/>
   <!-- END THEME STYLES -->

   <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body>

    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<button class="navbar-toggle btn navbar-btn" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN LOGO (you can use logo image instead of text)-->
				<a class="navbar-brand" href="index.html">
					<img src="/assets/img/WSU.jpg" id="logoimg" alt="">Media Cloud
				</a>
				<!-- END LOGO -->
			</div>

			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="dropdown active">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                        	Home
                        	<i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                        	<li class="active"><a href="index.html">Home Default</a></li>
                        	<li><a href="page_home2.html">Home with Top Bar</a></li>
                        </ul>
					</li>
					<li><a href="http://www.keenthemes.com/preview/index.php?theme=metronic_admin&page=index.html" target="_blank">Login</a></li>
				</ul>
			</div>
			<!-- BEGIN TOP NAVIGATION MENU -->
		</div>
    </div>
    <!-- END HEADER -->

    <!-- BEGIN ALERTS -->
            <div id="alerts">
                @if(Session::has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p>{{Session::get('message')}}</p>
                </div>
                @endif

                @if(Session::has('info'))
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p>{{Session::get('info')}}</p>
                </div>
                @endif

                @if(Session::has('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p>{{Session::get('error')}}</p>
                </div>
                @endif

                @if($errors->has())
                <div class="alert alert-danger error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h2>Error</h2>
                    @foreach($errors->all('<p>:message</p>') as $error)
                    {{$error}}
                    @endforeach
                </div>
                @endif
            </div>
                <!-- END ALERTS -->


    <!-- BEGIN PAGE CONTAINER -->
    <div class="page-container">
        <!-- BEGIN REVOLUTION SLIDER -->
        <div class="fullwidthbanner-container slider-main">
            <div class="fullwidthabnner">
                <ul id="revolutionul" style="display:none;">
                        <!-- THE FIRST SLIDE -->
                        <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="assets/img/sliders/revolution/thumbs/thumb2.jpg">
                            <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                            <img src="/_frontend/assets/img/sliders/revolution/bg1.jpg" alt="">

                            <div class="caption lft slide_subtitle slide_item_left thought1 "
                                 data-x="0"
                                 data-y="105"
                                 data-speed="400"
                                 data-start="3000"
                                 data-easing="easeOutExpo">
                                 I don't use Media often...
                            </div>
                            <div class="caption lft slide_desc slide_item_left"
                                 data-x="200"
                                 data-y="145"
                                 data-speed="400"
                                 data-start="4000"
                                 data-easing="easeOutExpo">
                                 But When I do...<br>

                            </div>
                            <div class="caption lfr slide_title slide_item_left"
                                 data-x="200"
                                 data-y="185"
                                 data-speed="1200"
                                 data-start="5000"
                                 data-easing="easeInOutElastic">
                                 I use Media Cloud
                            </div>
                            <a class="caption lfb btn green slide_btn slide_item_left" href="/login"
                                 data-x="0"
                                 data-y="300"
                                 data-speed="400"
                                 data-start="7000"
                                 data-easing="easeOutExpo">
                                 Get Started Now!
                            </a>
                            <div class="caption lfb"
                                 data-x="640"
                                 data-y="55"
                                 data-speed="700"
                                 data-start="900"
                                 data-easing="easeOutExpo">
                                 <img src="/assets/img/old_man.png" alt="Image 1">
                            </div>
                        </li>



                        <!-- THE THIRD SLIDE -->
                        <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="assets/img/sliders/revolution/thumbs/thumb2.jpg">
                            <img src="/_frontend/assets/img/sliders/revolution/bg3.jpg" alt="">
                            <div class="caption lfl slide_item_left"
                                 data-x="20"
                                 data-y="95"
                                 data-speed="400"
                                 data-start="1500"
                                 data-easing="easeOutBack">
                                 <iframe src="http://player.vimeo.com/video/56974716?portrait=0" width="420" height="240" style="border:0" allowFullScreen></iframe>
                            </div>
                            <div class="caption lfr slide_title"
                                 data-x="470"
                                 data-y="100"
                                 data-speed="400"
                                 data-start="2000"
                                 data-easing="easeOutExpo">
                                 Confused?
                            </div>
                            <div class="caption lfr slide_subtitle"
                                 data-x="470"
                                 data-y="170"
                                 data-speed="400"
                                 data-start="2500"
                                 data-easing="easeOutExpo">
                                 Relax, we got this.
                            </div>
                            <div class="caption lfr slide_desc"
                                 data-x="470"
                                 data-y="220"
                                 data-speed="400"
                                 data-start="3000"
                                 data-easing="easeOutExpo">
                                 Check out this video to help you get started
                            </div>
                            <a class="caption lfr  btn green slide_btn" href=""
                                 data-x="470"
                                 data-y="280"
                                 data-speed="400"
                                 data-start="3500"
                                 data-easing="easeOutExpo">
                                 Ain't Nobody Got Time for That-- Upload!
                            </a>
                        </li>

                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
            </div>
        </div>
        <!-- END REVOLUTION SLIDER -->

        <!-- BEGIN CONTAINER -->
        <div class="container">

            <div class="clearfix"></div>

            <div class="clearfix"></div>

            <!-- BEGIN STEPS -->
            <div class="row no-space-steps margin-bottom-40">
                <div class="col-md-4 col-sm-4">
                    <div class="front-steps front-step-one">
                        <h2>Upload</h2>
                        <p> Upload your media by simply dragging and dropping your media on the upload page. Quick. Simple. Easy to Use.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="front-steps front-step-two">
                        <h2>Manage</h2>
                        <p>Decide what your media is called, where it goes, and who gets to see it. Or delete it, if you're into that sort of thing.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="front-steps front-step-three">
                        <h2>Share</h2>
                        <p>Share with your friends, family, students or professors. No need to be stingy. </p>
                    </div>
                </div>
            </div>
            <!-- END STEPS -->
                </div>
        <!-- END CONTAINER -->
    </div>
    <!-- END PAGE CONTAINER -->

    <!-- BEGIN COPYRIGHT -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <p>
                        <span class="margin-right-10">2013 © Media Cloud. ALL Rights Reserved.</span>
                        <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <ul class="social-footer">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-google-plus"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-skype"></i></a></li>
                        <li><a href="#"><i class="icon-github"></i></a></li>
                        <li><a href="#"><i class="icon-youtube"></i></a></li>
                        <li><a href="#"><i class="icon-dropbox"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END COPYRIGHT -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS(REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="/_frontend/assets/plugins/respond.min.js"></script>
    <![endif]-->
    <script src="/_frontend/assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="/_frontend/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="/_frontend/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/_frontend/assets/plugins/hover-dropdown.js"></script>
    <script type="text/javascript" src="/_frontend/assets/plugins/back-to-top.js"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS(REQUIRED ONLY FOR CURRENT PAGE) -->
    <script type="text/javascript" src="/_frontend/assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="/_frontend/assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="/_frontend/assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="/_frontend/assets/plugins/bxslider/jquery.bxslider.min.js"></script>
    <script src="/_frontend/assets/scripts/app.js"></script>
    <script src="/_frontend/assets/scripts/index.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();
            App.initBxSlider();
            Index.initRevolutionSlider();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->


</html>