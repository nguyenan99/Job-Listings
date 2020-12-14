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
                        <li ><a href="{{route('get.profile')}}">Account</a></li>
                        <li ><a href="{{route('get.applied')}}">Applied</a></li>
                        @if(!isset(auth()->user()->company))
                        <li ><a href="{{route('get.create_company')}}">Create a company profile</a></li>
                        @else
                        <li ><a href="{{route('get.create_job')}}">Create job</a></li>
                        <li ><a href="{{route('get.list_job')}}">Job management</a></li>

                        <li ><a href="{{route('get.candidates')}}">My candidates</a></li>
                        <li ><a href="{{route('get.my_company')}}">Company profile</a></li>

                        @endif

                        <li ><a href="{{route('logout')}}">Log out</a></li>
                    </ul>
                </li>
                @else
                <li><a href="{{route('get.signup')}}"><i class="fa fa-pencil" aria-hidden="true"></i>SignUp</a></li>
                <li class="left-br"> <a href="{{route('get.login')}}" class="signin">Log in</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
