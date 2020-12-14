@extends('layouts.app')
@section('content')

    <div class="clearfix"></div>

    <!-- Header Title Start -->
    <section class="inner-header-title blank">
        <div class="container">
            <h1>Edit Job</h1>
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
    <!-- Header Title End -->

    <!-- General Detail Start -->
    <form action="{{route('update.job',[$job->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="detail-desc section">
            <div class="container white-shadow">

                <div class="row">
                    <div class="detail-pic js">
                        <div class="box">
                            <img src="{{ pare_url_file($job->logo) }}" alt="">
                        </div>
                    </div>
                </div>

                <div class=" bottom-mrg">
                    <input type="hidden" value="{{$job->company_id}}" name="company_id">

                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Job Title</label>
                        <div class="col-md-10 col-sm-10" >
                            <input type="text" name="title" class="form-control " id="title" placeholder="" value="{{$job->title}}" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-md-10 col-sm-10" >
                            <input type="text" class="form-control" id="email" value="{{auth()->user()->email}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Salary</label>
                        <div class="col-md-10 col-sm-10" >
                            <input type="text" class="form-control" placeholder="" name="salary" id="salary" value="{{$job->salary}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-md-10 col-sm-10" >
                            <input type="text" class="form-control" placeholder="" name="address" id="address" value="{{$job->address}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="location" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-md-10 col-sm-10" >
                            <select class="form-control input-lg" name="location_id">
                                <option value=""></option>
                                @foreach($locations as $location)
                                    @if($location->id == $job->location_id)
                                    <option value="{{$location->id}}" selected> {{$location->name}} </option>
                                    @else
                                        <option value="{{$location->id}}"> {{$location->name}} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-md-10 col-sm-10" >
                            <select class="form-control input-lg" name="category_id">
                                <option></option>
                                @foreach($categories as $category)
                                    @if($category->id == $job->category_id)
                                    <option value="{{$category->id}}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="job_nature" class="col-sm-2 col-form-label">Job Nature</label>
                        <div class="col-md-10 col-sm-10" >
                            <select class="form-control input-lg" name="job_nature" id="job_nature">
                                <option></option>
                                <option {{$job->job_nature == "full_time"? "selected":""}} value="full_time">Full Time</option>
                                <option {{$job->job_nature == "part_time"? "selected":""}} value="part_time">Part Time</option>
                                <option {{$job->job_nature == "freelancer"? "selected":""}} value="freelancer">Freelancer</option>
                                <option {{$job->job_nature == "internship"? "selected":""}} value="internship">Internship</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- General Detail End -->
        <!-- General Detail End -->
        <div class="container">
            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Job Description</h2>
                <div class="col-md-12 col-sm-12">
                    <textarea class="form-control textarea" placeholder="" name="full_description">{{$job->full_description}}</textarea>
                </div>
            </div>
        </div>
        <!-- Basic Full Detail Form Start -->
        <div class="container">
            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Job Requirement</h2>
                <div class="col-md-12 col-sm-12">
                    <textarea class="form-control textarea" placeholder="" name="requirements">{{$job->requirements}}</textarea>
                </div>
            </div>
        </div>
        <!-- Basic Full Detail Form End -->
        <div class="container">
            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Benefit</h2>
                <div class="col-md-12 col-sm-12">
                    <textarea class="form-control textarea" placeholder="Benefit" name="benefit">{{$job->benefit}}</textarea>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <button class="btn btn-success btn-primary small-btn">Submit your job</button>
            </div>
        </div>
    </form>

@endsection
@push('style')
    <style>
        .width450{
            width: 450px;
        }
    </style>
@endpush


