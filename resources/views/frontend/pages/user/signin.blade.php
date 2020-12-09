<!doctype html>
<html lang="en">

<!-- signup42:17-->
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <title>Job Stock - Responsive Job Portal Bootstrap Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/assets_frontend/plugins/css/plugins.css">

    <!-- Custom style -->
    <link href="/assets_frontend/css/style.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" id="jssDefault" href="/assets_frontend/css/colors/green-style.css">

</head>
<body class="simple-bg-screen" style="background-image:url(/assets_frontend/img/banner-10.jpg);">
<div class="Loader"></div>
<div class="wrapper">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

<!-- Title Header Start -->
    @include('flash-message')
    <section class="signup-screen-sec">
        <div class="container">
            <div class="signup-screen">
                <a href="index-2.html"><img src="/assets_frontend/img/logo.png" class="img-responsive" alt=""></a>
                <form action="{{route('post.login')}}" method="post">
                    @csrf
                    <input type="text" class="form-control" placeholder="Tài khoản hoặc email" name="user_name" >
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password">

                    <button class="btn btn-login" type="submit" >Đăng nhập</button>
                    <span>Bạn chưa có tài khoản <a href="{{route('get.signup')}}"> Đăng ký</a></span>
                </form>
            </div>
        </div>
    </section>
    <button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()"><i class="spin fa fa-cog" aria-hidden="true"></i></button>
    <div class="w3-sidebar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
        <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
        <ul id="styleOptions" title="switch styling">
            <li>
                <a href="javascript: void(0)" class="cl-box blue" data-theme="colors/blue-style"></a>
            </li>
            <li>
                <a href="javascript: void(0)" class="cl-box red" data-theme="colors/red-style"></a>
            </li>
            <li>
                <a href="javascript: void(0)" class="cl-box purple" data-theme="colors/purple-style"></a>
            </li>
            <li>
                <a href="javascript: void(0)" class="cl-box green" data-theme="colors/green-style"></a>
            </li>
            <li>
                <a href="javascript: void(0)" class="cl-box dark-red" data-theme="colors/dark-red-style"></a>
            </li>
            <li>
                <a href="javascript: void(0)" class="cl-box orange" data-theme="colors/orange-style"></a>
            </li>
            <li>
                <a href="javascript: void(0)" class="cl-box sea-blue" data-theme="colors/sea-blue-style "></a>
            </li>
            <li>
                <a href="javascript: void(0)" class="cl-box pink" data-theme="colors/pink-style"></a>
            </li>
        </ul>
    </div>

    <!-- Scripts
    ================================================== -->
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

    <!-- Custom Js -->
    <script src="/assets_frontend/js/custom.js"></script>
    <script src="/assets_frontend/js/jQuery.style.switcher.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#styleOptions').styleSwitcher();
        });
    </script>
    <script>
        function openRightMenu() {
            document.getElementById("rightMenu").style.display = "block";
        }

        function closeRightMenu() {
            document.getElementById("rightMenu").style.display = "none";
        }
    </script>
</div>
</body>

<!-- signup42:17-->
</html>
