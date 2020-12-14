@extends('layouts.app')
@section('content')

    <!-- Title Header Start -->
    <section class="inner-header-title" style="background-image:url(assets/img/banner-10.jpg);">
        <div class="container">
            <h1>Manage Candidate</h1>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Title Header End -->

    <!-- Member list start -->
    <section class="member-card gray">
        <div class="container">

            <!-- search filter -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="search-filter">
                        <form action="{{route('search.candidate')}}">
                            <div class="col-md-4 col-sm-5">
                                <div class="filter-form">
                                    <label for="">Search</label>

                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Candidate" name="candidate" value="{{request('candidate')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-5">
                                <div class="input-group" style="display: inline-block">
                                    <label for="">Select job</label>
                                    <select class="form-control input-lg" name="job_id">
                                        <option value="">All</option>
                                        @foreach($jobs as $job)
                                            <option value="{{$job->id}}" {{($job->id == request('job_id')) ? 'selected':''}}>{{$job->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <label for=""></label>
                               <span class="input-group-btn">
                                        <button type="submit"  class="btn btn-default">Search</button>
                                </span>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
            <!-- search filter End -->

            <div class="row">
                @foreach($candidates as $candidate)
                <div class="col-md-4 col-sm-4">
                    <div class="manage-cndt" >
                        <div class="remove-resume" style="float: right; padding: 10px;margin: 5px; border: 1px darkorange solid; border-radius: 5px; z-index: 1000" >
                            <a href="{{route('remove.candidate',['id' => $candidate->id,'job_id' => $candidate->job_id])}}" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-trash-o" style="color: darkorange; font-size: 20px"></i>
                            </a>
                        </div>
                        <div class="cndt-caption">
                            <div class="cndt-pic">
                                <img src="{{pare_url_file($candidate->image)}}" class="img-responsive" alt="" />
                            </div>
                            <h4>{{$candidate->name}}</h4>
                            <span>apply for a position</span>
                            <p>{{$candidate->job_title}}</p>
                        </div>
                       <a href="{{route('get.resume',['id' => $candidate->id])}}" title="" class="view-profile"  >View Profile</a>

                    </div>
                </div>
                @endforeach

            </div>



        </div>
    </section>
    <!-- Member List End -->
@endsection
@push('style')
    <style>
        .remove-resume:hover{
            background-color: #e49e836b;
            transition: 1s;
        }
        .view-profile{
            display: block;
            width: 100%;
            background-color: #07b107;
            text-align: center;
            padding: 13px;
            color: white;
            font-size: 20px;
        }
        .view-profile:hover{
            background-color: #0d770d;
            transition: 1s;
            color: white;
        }

    </style>


@endpush
