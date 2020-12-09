@extends('layouts.app')
@section('content')
    <!-- Header Title Start -->
    <section class="inner-header-title blank">
        <div class="container">
            <h1>Create Company</h1>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Header Title End -->
    <!-- General Detail Start -->
    <div class="detail-desc section">
        <div class="container white-shadow">
            <form action="{{route('store.company')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    <div class="detail-pic js">
                        <div class="box">
                            <img id="output"/>
                            <input type="file" name="logo_company" accept="image/*" onchange="loadFile(event)" style="padding: 16px">

                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-md-10 col-sm-10" >
                        <input type="text" name="name" class="form-control" placeholder="" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Website</label>
                    <div class="col-md-10 col-sm-10" >
                        <input type="text" name="website" class="form-control" placeholder="" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-md-10 col-sm-10" >
                        <input type="text" name="email" class="form-control" placeholder=""  >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-md-10 col-sm-10" >
                        <input type="text" name="phone" class="form-control" placeholder="" >
                    </div>
                </div>
                <br>

                <div class="row bottom-mrg extra-mrg">
                    <h2 class="detail-title">About Company</h2>
                    <div class="col-md-12 col-sm-12">
                        <textarea class="form-control textarea" name="description" placeholder="About Company"></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <button class="btn btn-success btn-primary small-btn" type="submit">Submit your company</button>
                </div>
            </form>



        </div>
    </div>
    <!-- General Detail End -->

@endsection
@push('scripts')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

@endpush
