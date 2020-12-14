@extends('layouts.app')
@section('content')

    <div class="clearfix"></div>
    <div class="banner" style="background-image:url(/assets_frontend/img/banner-9.jpg);">
        <div class="container">
            <div class="banner-caption">
                <div class="col-md-12 col-sm-12 banner-text">
                    <h1>7,000+ Browse Jobs</h1>

                    <form class="form-horizontal" action="{{route('get.search_job_result')}}" method="get">
                        <div class="col-md-4 no-padd">
                            <div class="input-group">
                                <label style="color: white">Skills, companies, ...</label>
                                <input type="text" class="form-control right-bor" id="joblist" name="like_search">
                            </div>
                        </div>

                        <div class="col-md-3 no-padd">
                            <div class="input-group">
                                <Label style="color: white">Job</Label>
                                <select id="choose-job" class="form-control" name="job_search[]" multiple="multiple">
                                    <option>All</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 no-padd">
                            <div class="input-group">
                                <label style="color: white">Location</label>
                                <select id="choose-city" class="form-control" name="city_search[]" multiple="multiple">
                                    <option>All</option>
                                    @foreach($locations as $location)
                                    <option value="{{$location->id}}">{{$location->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 no-padd">
                            <label for=""></label>
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">Search Job</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="company-brand">
            <div class="container">
                <div id="company-brands" class="owl-carousel">
                    <div class="brand-img"><img src="/assets_frontend/img/microsoft-home.png" class="img-responsive" alt=""/>
                    </div>
                    <div class="brand-img"><img src="/assets_frontend/img/img-home.png" class="img-responsive" alt=""/></div>
                    <div class="brand-img"><img src="/assets_frontend/img/mothercare-home.png" class="img-responsive" alt=""/>
                    </div>
                    <div class="brand-img"><img src="/assets_frontend/img/paypal-home.png" class="img-responsive" alt=""/></div>
                    <div class="brand-img"><img src="/assets_frontend/img/serv-home.png" class="img-responsive" alt=""/></div>
                    <div class="brand-img"><img src="/assets_frontend/img/xerox-home.png" class="img-responsive" alt=""/></div>
                    <div class="brand-img"><img src="/assets_frontend/img/yahoo-home.png" class="img-responsive" alt=""/></div>
                    <div class="brand-img"><img src="/assets_frontend/img/mothercare-home.png" class="img-responsive" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <section>
        <div class="container">
            <div class="row">
                <div class="main-heading">
                    <p>200 New Jobs</p>

                    <h2>New <span>Jobs</span></h2>
                </div>
            </div>
            <div class="row extra-mrg">
                @foreach($jobs as $job)
                <div class="col-md-3 col-sm-6">
                    <div class="grid-view brows-job-list">
                        <a href="{{route("get.job-detail",['id' => $job->id])}}">
                            <div class="" style="height: 280px">
                                <div class="brows-job-company-img"><img src="{{pare_url_file($job->logo)}}" class="img-responsive"
                                                                        alt=""/></div>
                                <div class="brows-job-position">
                                    <h3>{{ $job->title }}</h3>

                                    <p><span>{{$job->company_name}}</span></p>
                                </div>
                                <div class="job-position"><span class="job-num">1 Position</span></div>
                                <div class="brows-job-type">
                                     @if($job->job_nature == 1)
                                        <span class="part-time">  Part time </span>
                                        @elseif($job->job_nature == 2)
                                        <span class="full-time">  Full time </span>
                                        @elseif($job->job_nature == 3)
                                        <span class="freelancer">   Freelancer </span>
                                        @else
                                        <span class="internship">   Internship</span>
                                        @endif
                                    </div>
                            </div>
                        </a>
                        <ul class="grid-view-caption">
                            <li>
                                <div class="brows-job-location">
                                    <p><i class="fa fa-map-marker"></i>{{$job->location}}</p>
                                </div>
                            </li>
                            <li>
                                <p><span class="brows-job-sallery"><i class="fa fa-money"></i>{{$job->salary}}</span></p>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <section class="how-it-works">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-md-12">
                    <div class="main-heading">
                        <p>Working Process</p>

                        <h2>How It <span>Works</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="working-process">
                        <span class="process-img"><img src="/assets_frontend/img/step-1.png" class="img-responsive" alt=""/><span
                                class="process-num">01</span></span>
                        <h4>Create An Account</h4>

                        <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers
                            find place best.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="working-process">
                        <span class="process-img"><img src="/assets_frontend/img/step-2.png" class="img-responsive" alt=""/><span
                                class="process-num">02</span></span>
                        <h4>Search Jobs</h4>

                        <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers
                            find place best.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="working-process">
                        <span class="process-img"><img src="/assets_frontend/img/step-3.png" class="img-responsive" alt=""/><span
                                class="process-num">03</span></span>
                        <h4>Save & Apply</h4>

                        <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers
                            find place best.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
@endsection
