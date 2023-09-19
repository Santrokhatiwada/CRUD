@extends('admin.layouts.app')

@section('content')
@section('body')


<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Permission List</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ url('/admin/home') }}"> Back</a>
                            @can('create_permission')
                            <a class="btn btn-info" href="{{ url('/admin/permissions/create') }}"> Add Permission</a>
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
                            <th scope="col">S.N</th>
                            <th scope="col">ID</th>
                            <th scope="col">Permission</th>
                        
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0 ?>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                    
                            <td>
                              


                                <form action="{{ route('admin.permissions.destroy',$permission->id) }}" method="POST">
                                @can('update_permission')
                                    <a class="btn btn-primary" href="{{ route('admin.permissions.edit',$permission->id) }}">Edit</a>
                                    @endcan
                                    @can('delete_permission')
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

@endsection
@endsection