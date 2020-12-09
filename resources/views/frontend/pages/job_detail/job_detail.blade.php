@extends('layouts.app')
@section('content')
    <div class="clearfix"></div>

    <!-- Title Header Start -->
    <section class="inner-header-title" style="background-image:url(assets/img/banner-10.jpg);">
        <div class="container">
            <h1>Chi tiết công việc</h1>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Title Header End -->

    <!-- Job Detail Start -->
    <section class="detail-desc">
        <div class="container white-shadow">

            <div class="row">

                <div class="detail-pic">
                    <img src="{{pare_url_file($job->logo)}}" class="img" alt="" />
                </div>

                <div class="detail-status">
                    <span> {{ Carbon\Carbon::parse($job->created_at)->diffForHumans()}} </span>
                </div>

            </div>

            <div class="row bottom-mrg">
                <div class="col-md-8 col-sm-8">
                    <div class="detail-desc-caption">
                        <h4>{{$job->company_name}}</h4>
                        <span class="designation">{!! $job->company_description !!}</span>
                       <p style="padding-top: 5px">
                           <i class="fa fa-briefcase"></i><span>
                                @if($job->job_nature == "part_time")
                                   Part time
                               @elseif($job->job_nature == "full_time")
                                   Full time
                               @elseif($job->job_nature == "freelancer")
                                   Freelancer
                               @else
                                   Internship
                               @endif
                                </span>
                       </p>


                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="get-touch">
                        <h4>Liên lạc</h4>
                        <ul>
                            <li><i class="fa fa-map-marker"></i><span>{{$job->location}}</span></li>
                            <li><i class="fa fa-envelope"></i><span>{{$job->email}}</span></li>
                            <li><i class="fa fa-globe"></i><span>{{$job->website}}</span></li>
                            <li><i class="fa fa-phone"></i><span>{{$job->phone}}</span></li>
                            <li><i class="fa fa-money"></i><span>{{$job->salary}} $</span></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="row no-padd">
                <div class="detail pannel-footer">
                    <div class="col-md-5 col-sm-5">
                        <ul class="detail-footer-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    @if(auth()->check() )
                        @if(!(auth()->user()->id == $job->user_id))
                        <div class="col-md-7 col-sm-7">
                            <div class="detail-pannel-footer-btn pull-right">
                                @if(!$applied)
                                <a href="{{route('apply',['id' => $job->id])}}" class="footer-btn grn-btn" title="">Quick Apply</a>
                                @else
                                <a href="{{route('apply',['id' => $job->id])}}" class="footer-btn btn-danger" title="">Applied</a>
                                @endif
                            </div>
                        </div>
                        @endif
                     @else
                        <div class="col-md-7 col-sm-7">
                            <div class="detail-pannel-footer-btn pull-right">
                                <a href="{{route('get.login')}}" class="footer-btn grn-btn" title="">Quick Apply</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Job Detail End -->

    <!-- Job full detail Start -->
    <section class="full-detail-description full-detail">
        <div class="container">
            <div class="row row-bottom">
                <h2 class="detail-title">Mô tả công việc</h2>
               <p>
                   {!! $job->full_description !!}
               </p>

            </div>

            <div class="row row-bottom">
                <h2 class="detail-title">Yêu cầu ứng viên</h2>
               <p>
                   {!! $job->requirements !!}
               </p>
            </div>

            <div class="row row-bottom">
                <h2 class="detail-title">Quyền lời được hưởng</h2>
                <p>
                    {!! $job->benefit !!}
                </p>

            </div>

        </div>
    </section>
    <!-- Job full detail End -->
@endsection
