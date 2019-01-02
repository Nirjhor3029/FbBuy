<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 1/2/2019
 * Time: 3:12 PM
 */

?>



{{--<head>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Favicon icon -->
    <link rel="icon" href="https://colorlib.com//polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/')}}/files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('assets/')}}/files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/')}}/files/assets/icon/feather/css/feather.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/')}}/files/assets/css/font-awesome-n.min.css">
    <!-- Chartlist chart css -->
    <link rel="stylesheet" href="{{asset('assets/')}}/files/bower_components/chartist/css/chartist.css" type="text/css" media="all">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/')}}/files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/')}}/files/assets/css/widget.css">
</head>--}}



<div class="pcoded-container navbar-wrapper">
    <nav class="navbar header-navbar pcoded-header iscollapsed" header-theme="themelight1" pcoded-header-position="fixed">
        <div class="navbar-wrapper">
            <div class="navbar-logo" logo-theme="theme6">
                <a href="index.html">
                    <img class="img-fluid" src="../files/assets/images/logo.png" alt="Theme-Logo">
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="#!">
                    <i class="feather icon-menu icon-toggle-right"></i>
                </a>
                <a class="mobile-options waves-effect waves-light">
                    <i class="feather icon-more-horizontal"></i>
                </a>
            </div>
            <div class="navbar-container container-fluid">
                <ul class="nav-left">
                    <li class="header-search">
                        <div class="main-search morphsearch-search">
                            <div class="input-group">
                                        <span class="input-group-prepend search-close">
										<i class="feather icon-x input-group-text"></i>
									</span>
                                <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn">
										<i class="feather icon-search input-group-text"></i>
									</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                            <i class="full-screen feather icon-maximize"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav-right">
                    <li class="header-notification">
                        <div class="dropdown-primary dropdown">
                            <div class="dropdown-toggle" data-toggle="dropdown">
                                <i class="feather icon-bell"></i>
                                <span class="badge bg-c-red">5</span>
                            </div>
                            <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <li>
                                    <h6>Notifications</h6>
                                    <label class="label label-danger">New</label>
                                </li>
                                <li>
                                    <div class="media">
                                        <img class="img-radius" src="../files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="notification-user">John Doe</h5>
                                            <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                            <span class="notification-time">30 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <img class="img-radius" src="../files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="notification-user">Joseph William</h5>
                                            <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                            <span class="notification-time">30 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <img class="img-radius" src="../files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="notification-user">Sara Soudein</h5>
                                            <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                            <span class="notification-time">30 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="header-notification">
                        <div class="dropdown-primary dropdown">
                            <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                                <i class="feather icon-message-square"></i>
                                <span class="badge bg-c-green">3</span>
                            </div>
                        </div>
                    </li>
                    <li class="user-profile header-notification">

                        <div class="dropdown-primary dropdown">
                            <div class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../files/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                <span>John Doe</span>
                                <i class="feather icon-chevron-down"></i>
                            </div>
                            <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <li>
                                    <a href="#!">
                                        <i class="feather icon-settings"></i> Settings

                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="feather icon-user"></i> Profile

                                    </a>
                                </li>
                                <li>
                                    <a href="email-inbox.html">
                                        <i class="feather icon-mail"></i> My Messages

                                    </a>
                                </li>
                                <li>
                                    <a href="auth-lock-screen.html">
                                        <i class="feather icon-lock"></i> Lock Screen

                                    </a>
                                </li>
                                <li>
                                    <a href="auth-sign-in-social.html">
                                        <i class="feather icon-log-out"></i> Logout

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</div>


<script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
<script type="text/javascript" src="{{asset('assets/')}}/files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('assets/')}}/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{asset('assets/')}}/files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="{{asset('assets/')}}/files/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- waves js -->
<script src="{{asset('assets/')}}/files/assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('assets/')}}/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- Float Chart js -->
<script src="{{asset('assets/')}}/files/assets/pages/chart/float/jquery.flot.js"></script>
<script src="{{asset('assets/')}}/files/assets/pages/chart/float/jquery.flot.categories.js"></script>
<script src="{{asset('assets/')}}/files/assets/pages/chart/float/curvedLines.js"></script>
<script src="{{asset('assets/')}}/files/assets/pages/chart/float/jquery.flot.tooltip.min.js"></script>
<!-- Chartlist charts -->
<script src="{{asset('assets/')}}/files/bower_components/chartist/js/chartist.js"></script>
<!-- amchart js -->
<script src="{{asset('assets/')}}/files/assets/pages/widget/amchart/amcharts.js"></script>
<script src="{{asset('assets/')}}/files/assets/pages/widget/amchart/serial.js"></script>
<script src="{{asset('assets/')}}/files/assets/pages/widget/amchart/light.js"></script>
<!-- Custom js -->
<script src="{{asset('assets/')}}/files/assets/js/pcoded.min.js"></script>
<script src="{{asset('assets/')}}/files/assets/js/vertical/vertical-layout.min.js"></script>
<script type="text/javascript" src="{{asset('assets/')}}/files/assets/pages/dashboard/custom-dashboard.min.js"></script>
<script type="text/javascript" src="{{asset('assets/')}}/files/assets/js/script.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>



