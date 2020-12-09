<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i
                class="fa fa-bars"></i></button>
        <div class="navbar-header"><a class="navbar-brand" href="{{route('get.home')}}"><img src="/assets_frontend/img/logo-white.png"
                                                                                    class="logo logo-display"
                                                                                    alt=""><img
                    src="/assets_frontend/img/logo-white.png" class="logo logo-scrolled" alt=""></a></div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">


                @if(Auth::check())
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{auth()->user()->name}}</a>
                    <ul class="dropdown-menu" role="menu" >
                        <li ><a href="{{route('get.profile')}}">Tài khoản</a></li>
                        <li ><a href="{{route('get.applied')}}">Đã apply</a></li>
                        @if(!isset(auth()->user()->company))
                        <li ><a href="{{route('get.create_company')}}">Tạo hồ sơ công ty</a></li>
                        @else
                        <li ><a href="{{route('get.create_job')}}">Tạo job</a></li>
                        <li ><a href="{{route('get.list_job')}}">Quản lý job</a></li>

                        <li ><a href="{{route('get.candidates')}}">Ứng viên của tôi</a></li>
                        <li ><a href="{{route('get.my_company')}}">Hồ sơ công ty</a></li>

                        @endif

                        <li ><a href="{{route('logout')}}">Đăng xuất</a></li>
                    </ul>
                </li>
                @else
                <li><a href="blog.html">Tạo hồ sơ công ty</a></li>
                <li><a href="{{route('get.signup')}}"><i class="fa fa-pencil" aria-hidden="true"></i>SignUp</a></li>
                <li class="left-br"> <a href="{{route('get.login')}}" class="signin">Đăng nhập</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
