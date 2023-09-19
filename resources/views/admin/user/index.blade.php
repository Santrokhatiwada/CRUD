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
                            <h2>User List</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ url('/admin/home') }}"> Back</a>
                            @can('create_user')
                            <a class="btn btn-info" href="{{ url('/admin/users/create') }}"> Register</a>
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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                        
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0 ?>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                {{$role->name}}

                               @endforeach
                            </td>
                        
                        

                            <td>
                                <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST">
                                @can('read_user')
                                        <a class="btn btn-info" href="{{ route('admin.users.show',$user->id) }}">Show</a>
                                        @endcan
                                        @can('update_user')
                                        <a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}">Edit</a>
                                        @endcan
                                        @can('delete_user')
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        @endcan
                                    </form>


                                <!-- <form action="#" method="POST">
                                    <a class="btn btn-info" href="#">Show</a>
                                    <a class="btn btn-primary" href="#">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form> -->

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