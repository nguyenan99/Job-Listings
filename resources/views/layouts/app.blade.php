<!doctype html>
<html lang="en">

<head>
    <!-- Basic Page Needs==================================================-->
    <title>Job Stock - Responsive Job Portal Bootstrap Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS==================================================-->
    <link rel="stylesheet" href="/assets_frontend/plugins/css/plugins.css">
    <link href="/assets_frontend/css/style.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" id="jssDefault" href="/assets_frontend/css/colors/green-style.css">
    <link rel="stylesheet" href="/assets/plugins/toastr/toastr.css">

    @stack('style')
</head>
<body>
{{--<div class="Loader"></div>--}}
<div class="wrapper">
    @include('frontend.components.header')
    @yield('content')
    @include('frontend.components.footer')
    <div class="clearfix"></div>
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="tab" role="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab">Sign
                                    In</a></li>
                            <li role="presentation"><a href="#register" role="tab" data-toggle="tab">Sign Up</a></li>
                        </ul>
                        <div class="tab-content" id="myModalLabel2">
                            <div role="tabpanel" class="tab-pane fade in active" id="login">
                                <img src="/assets_frontend/img/logo.png" class="img-responsive" alt=""/>

                                <div class="subscribe wow fadeInUp">
                                    <form class="form-inline" method="post">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control"
                                                       placeholder="Username" required=""><input type="password"
                                                                                                 name="password"
                                                                                                 class="form-control"
                                                                                                 placeholder="Password"
                                                                                                 required="">

                                                <div class="center">
                                                    <button type="submit" id="login-btn" class="submit-btn"> Login
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="register">
                                <img src="/assets_frontend/img/logo.png" class="img-responsive" alt=""/>

                                <form class="form-inline" method="post">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="Your Name"
                                                   required=""><input type="email" name="email" class="form-control"
                                                                      placeholder="Your Email" required=""><input
                                                type="email" name="email" class="form-control" placeholder="Username"
                                                required=""><input type="password" name="password" class="form-control"
                                                                   placeholder="Password" required="">

                                            <div class="center">
                                                <button type="submit" id="subscribe" class="submit-btn"> Create
                                                    Account
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()"><i class="spin fa fa-cog"
                                                                                      aria-hidden="true"></i></button>
    <div class="w3-sidebar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
        <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
        <ul id="styleOptions" title="switch styling">
            <li><a href="javascript: void(0)" class="cl-box blue" data-theme="colors/blue-style"></a></li>
            <li><a href="javascript: void(0)" class="cl-box red" data-theme="colors/red-style"></a></li>
            <li><a href="javascript: void(0)" class="cl-box purple" data-theme="colors/purple-style"></a></li>
            <li><a href="javascript: void(0)" class="cl-box green" data-theme="colors/green-style"></a></li>
            <li><a href="javascript: void(0)" class="cl-box dark-red" data-theme="colors/dark-red-style"></a></li>
            <li><a href="javascript: void(0)" class="cl-box orange" data-theme="colors/orange-style"></a></li>
            <li><a href="javascript: void(0)" class="cl-box sea-blue" data-theme="colors/sea-blue-style "></a></li>
            <li><a href="javascript: void(0)" class="cl-box pink" data-theme="colors/pink-style"></a></li>
        </ul>
    </div>
    <!-- Scripts==================================================-->

    <script type="text/javascript" src="/assets_frontend/plugins/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets_frontend/plugins/js/viewportchecker.js"></script>
    <script type="text/javascript" src="/assets_frontend/plugins/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets_frontend/plugins/js/bootsnav.js"></script>
    <script type="text/javascript" src="/assets_frontend/plugins/js/select2.min.js"></script>
    <script type="text/javascript" src="/assets_frontend/plugins/js/wysihtml5-0.3.0.js"></script>
    <script type="text/javascript" src="/assets_frontend/plugins/js/bootstrap-wysihtml5.js"></script>
    <script type="text/javascript" src="/assets_frontend/plugins/js/datedropper.min.js"></script>
    <script type="text/javascript" src="/assets_frontend/plugins/js/dropzone.js"></script>
    <script type="text/javascript" src="/assets_frontend/plugins/js/loader.js"></script>
    <script type="text/javascript" src="/assets_frontend/plugins/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="/assets_frontend/plugins/js/slick.min.js"></script>
    <script type="text/javascript" src="/assets_frontend/plugins/js/gmap3.min.js"></script>
    <script type="text/javascript" src="/assets_frontend/plugins/js/jquery.easy-autocomplete.min.js"></script>
    <script src="/assets_frontend/js/custom.js"></script>
    <script src="/assets_frontend/js/jQuery.style.switcher.js"></script>
    <script type="text/javascript">$(document).ready(function () {
            $('#styleOptions').styleSwitcher();
        });</script>
    <script>function openRightMenu() {
            document.getElementById("rightMenu").style.display = "block";
        }
        function closeRightMenu() {
            document.getElementById("rightMenu").style.display = "none";
        }</script>
    @stack('scripts')
    <script type="text/javascript" src="/assets/plugins/toastr/toastr.min.js"></script>
    @toastr_render
</div>
</body>

</html>
