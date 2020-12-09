@extends('layouts.app')
@section('content')

    <div class="clearfix"></div>

    <!-- Title Header Start -->
    <section class="inner-header-title" style="background-image:url(assets/img/banner-10.jpg);">
        <div class="container">
            <h1>Applied Job</h1>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Title Header End -->

    <!-- Manage Resume List Start -->
    <section class="manage-resume gray">
        <div class="container">
            <!-- search filter -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="search-filter">

                        <div class="col-md-4 col-sm-5">
                            <div class="filter-form">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search…">
                                    <span class="input-group-btn">
												<button type="button" class="btn btn-default">Go</button>
											</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-7">
                            <div class="short-by pull-right">
                                Short By
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Short By Date</a></li>
                                        <li><a href="#">Short By Views</a></li>
                                        <li><a href="#">Short By Popular</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- search filter End -->

            <!-- Manage Resume -->
            <div class="row">
                <div class="col-md-12">
                    @foreach($jobs as $job)
                        <article>
                            <div class="mng-resume">
                                <a href="{{route('get.job-detail',['id' => $job->id])}}">
                                    <div class="col-md-2 col-sm-2">
                                        <div class="mng-resume-pic">
                                            <img src="{{pare_url_file($job->company_logo)}}" class="img-responsive" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="mng-resume-name">
                                            <h4>{{$job->title}} </h4>
                                            <span class="cand-status">{{ Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </a>

                                <div class="col-md-2 col-sm-2">
                                    <div class="per-hour-rate">
                                        <p><i class="fa fa-money"></i> {{$job->salary}}</p>
                                    </div>
                                </div>

                                <div class="col-md-1 col-sm-1 pull-right">
                                    <div class="mng-resume-action">
                                        <a href="{{route('remove.candidate',['id' => auth()->user()->id, 'job_id' =>$job->id ])}}" onclick="return confirm('Are you sure?')" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </div>

                            </div>
                        </article>
                    @endforeach
                </div>
            </div>


        </div>
    </section>
    <!-- Manage Resume List End -->
@endsection
