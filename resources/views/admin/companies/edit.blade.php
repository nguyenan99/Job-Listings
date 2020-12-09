@extends("layouts.admin")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit Company</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('companies.update',['id'=>$company->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" name="name" value="{{$company->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Logo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="logo_company">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                            <div class="form-group col-sm-10">
                                <textarea name="description" class="form-control "  id="editor5">
                                    {{$company->description}}
                                </textarea>
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
