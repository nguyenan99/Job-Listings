@extends("layouts.admin")

@section("content")
   <div class="row">
       <div class="col-md-12">
           <a href="{{ route('categories.create') }}" class="btn btn-info">Add Category</a>
       </div>
   </div>
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
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('categories.edit',['id'=>$category->id]) }}">View/ Edit</a>
                                <a class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('categories.destroy',['id'=>$category->id]) }}" type="button" >
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
