@extends('layouts.app')
@section('content')
    <!-- Title Header Start -->
    <section class="inner-header-title" style="background-image:url(assets/img/banner-10.jpg);">
        <div class="container">
            <h1>Browse Jobs</h1>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Title Header End -->

    <!-- ========== Begin: Brows job Category ===============  -->
    <section class="brows-job-category">
        <div class="container">
            <!-- Company Searrch Filter End -->
            <div class="row extra-mrg">
                <div class="wrap-search-filter">
                    <form>
                        <div class="col-md-3 col-sm-6">
                            <input type="text" class="form-control" placeholder="Location: City, State, Zip">
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <select class="selectpicker form-control" multiple title="All Categories">
                                <option>Information Technology</option>
                                <option>Mechanical</option>
                                <option>Hardware</option>
                            </select>

                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="job-types">
                                <label>
                                    <input type="checkbox" class="full-time check-option checkbox" CHECKED />
                                    Full Time
                                </label>

                                <label>
                                    <input type="checkbox" class="part-time check-option checkbox" />
                                    Part Time
                                </label>

                                <label>
                                    <input type="checkbox" class="freelancer check-option checkbox" />
                                    Freelancer
                                </label>

                                <label>
                                    <input type="checkbox" class="internship check-option checkbox" />
                                    Internship
                                </label>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- Company Searrch Filter End -->
            @foreach($searchResult as $result)

            <div class="item-click">
                <article>
                    <div class="brows-job-list">
                        <div class="col-md-1 col-sm-2 small-padding">
                            <div class="brows-job-company-img">
                                <a href="{{route('get.job-detail',[$result->id])}}"><img src="{{pare_url_file($result->logo)}}" class="img-responsive" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-5">
                            <div class="brows-job-position">
                                <a href="{{route('get.job-detail',[$result->id])}}"><h3>{{$result->title}}</h3></a>
                                <p>
                                    <span>Autodesk</span><span class="brows-job-sallery"><i class="fa fa-money"></i>${{$result->salary}}</span>

                                         @if($result->job_nature == "part_time")
                                        <span class="job-type bg-trans-warning cl-warning">Part Time</span>
                                        @elseif($result->job_nature == "full_time")
                                        <span class="job-type cl-success bg-trans-success">Full time</span>
                                        @elseif($result->job_nature == "freelancer")
                                        <span class="job-type cl-info bg-trans-info">Freelancer</span>
                                        @else
                                        <span class="job-type cl-danger bg-trans-danger">Internship</span>
                                         @endif


                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="brows-job-location">
                                <p><i class="fa fa-map-marker"></i>{{$result->location}}</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <div class="brows-job-link">
                                <a href="job-detail.html" class="btn btn-default">Apply Now</a>
                            </div>
                        </div>
                    </div>
                    <span class="tg-themetag tg-featuretag">Premium</span>
                </article>
            </div>
            @endforeach

            {{$searchResult->links()}}

        </div>
    </section>
    <!-- ========== Begin: Brows job Category End ===============  -->
@endsection
