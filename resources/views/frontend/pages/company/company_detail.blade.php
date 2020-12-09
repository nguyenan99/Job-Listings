@extends('layouts.app')
@section('content')
    <!-- Header Title Start -->
    <section class="inner-header-title blank">
        <div class="container">
            <h1>Company</h1>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Header Title End -->

    <!-- General Detail Start -->
    <div class="detail-desc section">
        <div class="container white-shadow">

                <div class="row" style="">
                    <div class="detail-pic js">
                        <div class="box">
                            <img src="{{pare_url_file($company->logo)}}" alt="">
                        </div>
                    </div>
                    <div class="" style="float: right; margin-right: 46px; padding-bottom: 10px">
                        <a href="{{route('get.edit_company',['id' => $company->id ])}}"><i class="fa fa-edit" style="color: dodgerblue; font-size: 32px"></i></a>
                    </div>
                </div>


                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Company Name</label>
                        <div class="col-md-10 col-sm-10" >
                            <input type="text" name="name" class="form-control" placeholder="Company Name" value="{{$company->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Website</label>
                        <div class="col-md-10 col-sm-10" >
                            <input type="text" name="website" class="form-control" placeholder="Website" value="{{$company->website}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-md-10 col-sm-10" >
                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{$company->email}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-md-10 col-sm-10" >
                            <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{$company->phone}}" >
                        </div>
                    </div>

                <br>

                <div class="row">
                    <h2 class="detail-title">About Company</h2>
                    <div class="col-md-12 col-sm-12">
                        <p>
                            {!! $company->description !!}
                        </p>

                    </div>
                </div>
    </div>




        </div>
    <!-- General Detail End -->

@endsection
@push('scripts')
@endpush
