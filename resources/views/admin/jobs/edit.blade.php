@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit Job</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('jobs.update',['id'=>$job->id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" name="title" value="{{$job->title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Job nature</label>
                            <div class="col-sm-10">

                                <select class="custom-select form-control-border" id="exampleSelectBorder" name="job_nature">
                                    <option value="part_time">Part time</option>
                                    <option value="full_time">Full time</option>
                                    <option value="freelancer">Freelancer</option>
                                    <option value="internship">Internship</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Exp Require</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" name="exp_require" value="{{$job->exp_require}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Full Description</label>
                            <div class="form-group col-sm-10">
                                <textarea name="full_description" class="form-control " id="editor2">{{$job->full_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Requirements</label>
                            <div class="form-group col-sm-10">
                                <textarea name="requirements" class="form-control " id="editor3">{{$job->requirements}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Benefit</label>
                            <div class="form-group col-sm-10">
                                <textarea name="benefit" class="form-control " id="editor4">{{$job->benefit}}</textarea>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <button type="submit" class="btn btn-default float-right">Cancel</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>

    </div>

@endsection


