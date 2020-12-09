@extends("layouts.admin")

@section("content")

    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Categories</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 80%">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Company</th>
                            <th>Short Description</th>
                            <th>Location</th>
                            <th>Address</th>
                            <th>Categories</th>
                            <th>Salary</th>
                            <th>Top Rated</th>
                            <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{$job->id}}</td>
                                <td>{{$job->title}}</td>
                                <td>{{$job->company_id}}</td>
                                <td>{{$job->short_description}}</td>
                                <td>{{$job->location_id}}</td>
                                <td>{{$job->address}}</td>
                                <td>{{$job->category_id}}</td>
                                <td>{{$job->salary}}</td>
                                <td>{{$job->top_rated}}</td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('jobs.edit',['id'=>$job->id]) }}">View/ Edit</a>
                                    <a class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('categories.destroy',['id'=>$job->id]) }}" type="button" >
                                        Delete
                                    </a>

                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
