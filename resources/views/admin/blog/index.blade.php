@extends('admin.layouts.app')

@section('content')
@section('body')
<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Blog LIST</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ url('/admin/home') }}"> Back</a>

                            @can('create_blog')
                            <a class="btn btn-info" href="{{ url('/admin/blogs/create') }}"> Add blog</a>
                            @endcan
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif


                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Id</th>
                                <th scope="col">Header</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Body</th>
                                <th scope="col">Image</th>
                                <th scope="col">IS Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Blogs as $blog)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{$blog->category?->categories }}</td>
                                <td>{{ $blog->header }}</td>
                                <td>{{ $blog->slug }}</td>
                                <td>{!! $blog->body !!}</td>
                                
                                <td><img height="80px" src="{{ asset('uploads/blogs/'.$blog->image) }}"></td>
                                <td>{{ $blog->is_active ? 'yes' :'no' }}</td>
                                <td>
                                    <form action="{{ route('admin.blogs.destroy',$blog->id) }}" method="POST">
                                    @can('read_blog')
                                        <a class="btn btn-info" href="{{ route('admin.blogs.show',$blog->id) }}">Show</a>
                                        @endcan

                                        @can('update_blog')
                                        <a class="btn btn-primary" href="{{ route('admin.blogs.edit',$blog->id) }}">Edit</a>
                                      @endcan
                                        @can('delete_blog')
                                     
                                        @csrf
                                        @method('DELETE')
                                      
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@endsection