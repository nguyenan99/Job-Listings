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
    <!-- Title Header End -->
    <!-- Resume Detail Start -->
    <section class="detail-desc">
        <div class="container white-shadow">
            <div class="row mrg-0">
                <div class="detail-pic">
                    <img src="{{pare_url_file($user->image)}}" class="img" alt="" />
                </div>
                @if(auth()->check())
                    @if(auth()->user()->id == $user->id)
                        <div class="" style="float: right; margin-right: 46px; padding-bottom: 10px">
                            <a href="{{route('get.edit_profile',['id' => $user->id ])}}"><i class="fa fa-edit" style="color: dodgerblue; font-size: 32px"></i></a>
                        </div>
                    @endif
                @endif
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
    </section>
    <!-- Resume Detail End -->
    <section class="full-detail-description full-detail">
        <div class="container">

            <div class="row row-bottom mrg-0">
                <h2 class="detail-title">About Me</h2>
                <div class="col-md-12 col-sm-12">
                    <textarea class="form-control" style="min-height: 300px" disabled name="description" placeholder="">{!! $user->about_user !!}</textarea>
                </div>
            </div>

            <div class="row row-bottom mrg-0">
                <h2 class="detail-title">Education</h2>
                <div class="col-md-12 col-sm-12">
                    <textarea class="form-control" style="min-height: 300px" disabled name="description" placeholder="">{!! $user->education !!}</textarea>
                </div>


            </div>
            <div class="row row-bottom mrg-0">
                <h2 class="detail-title">Work Experience</h2>
                <div class="col-md-12 col-sm-12">
                    <textarea class="form-control" style="min-height: 300px" disabled name="description" placeholder="">{!! $user->work_exp !!}</textarea>
                </div>

            </div>

            <div class="row row-bottom mrg-0">
                <h2 class="detail-title">Skills</h2>
                <div class="col-md-12 col-sm-12">
                    <textarea class="form-control" style="min-height: 300px" disabled name="description" placeholder="">{!! $user->skill !!}</textarea>
                </div>
            </div>

        </div>
    </section>
@endsection
