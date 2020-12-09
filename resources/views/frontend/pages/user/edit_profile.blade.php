@extends('layouts.app')
@section('content')
    <div class="clearfix"></div>

    <!-- Title Header Start -->
    <section class="inner-header-title" style="background-image:url(assets/img/banner-10.jpg);">
        <div class="container">
            <h1>Profile</h1>
        </div>
    </section>
    <div class="clearfix"></div>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Title Header End -->
    <!-- Resume Detail Start -->
    <form action="{{route('update.user',['id'=> $user->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container white-shadow">

            <div class="row mrg-0">
                <div class="detail-pic">
                    <img id="output" src="{{pare_url_file($user->image)}}" class="img" alt="" />
                    <input type="file" name="image" accept="image/*" onchange="loadFile(event)" style="padding: 16px">
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Name</label>
                <div class="col-md-10 col-sm-10" >
                    <input type="text" name="name" class="form-control" placeholder="" value="{{$user->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-md-10 col-sm-10" >
                    <input type="text" name="phone" class="form-control" placeholder="" value="{{$user->phone}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Email</label>
                <div class="col-md-10 col-sm-10" >
                    <input type="text" name="email" class="form-control" placeholder="" value="{{$user->email}}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Address</label>
                <div class="col-md-10 col-sm-10" >
                    <input type="text" name="address" class="form-control" placeholder="" value="{{$user->address}}" >
                </div>
            </div>
        </div>
    <!-- Resume Detail End -->
        <div class="container">

            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">About Me</h2>
                <div class="col-md-12 col-sm-12">
                    <textarea class="form-control textarea" name="about_user" placeholder="">{!! $user->about_user !!}</textarea>
                </div>
            </div>

            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Education</h2>
                <div class="col-md-12 col-sm-12">
                <textarea class="form-control textarea" style="min-height: 300px"  name="education" placeholder="">{!! $user->education !!}</textarea>

                </div>
            </div>

            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Work Experience</h2>
                <div class="col-md-12 col-sm-12">
                    <textarea class="form-control textarea" style="min-height: 300px"  name="work_exp" placeholder="">{!! $user->work_exp !!}</textarea>

                </div>
            </div>
            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Skills</h2>
                <div class="col-md-12 col-sm-12">
                    <textarea class="form-control textarea" style="min-height: 300px"  name="skill" placeholder="">{!! $user->skill !!}</textarea>

                </div>
            </div>
        </div>
    <div class="col-md-12 col-sm-12">
        <button class="btn btn-success btn-primary small-btn" type="submit">Update</button>
    </div>
    </form>
@endsection

@push('scripts')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

@endpush
