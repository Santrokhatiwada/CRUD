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
                            <h2>Role List</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ url('/admin/home') }}"> Back</a>
                            @can('create_role')
                            <a class="btn btn-info" href="{{ url('/admin/roles/create') }}"> Add Role</a>
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
                            <th scope="col">Role</th>
                        
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0 ?>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                    
                            <td>
                              


                                <form action="{{ route('admin.roles.destroy',$role->id) }}" method="POST">
                                @can('update_role')
                                   
                                    <a class="btn btn-primary" href="{{ route('admin.roles.edit',$role->id) }}">Edit</a>
                                    @endcan

                                    @can('delete_role')
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