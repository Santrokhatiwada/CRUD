@extends('admin.layouts.app')

@section('content')

<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Edit User</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin.users.index') }}"> Back</a>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>ID:</strong>
                                <input type="text" name="id" value="{{ $user->id }}" class="form-control" placeholder="ID">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>password:</strong>
                                        <input type="password" name="password" class="form-control" placeholder="password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Roles:</strong>
                                            <div class="tab-content rounded-bottom">
                                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-839">
                                                    <select name="role_id" class="form-select" aria-label="Default select example">
                                                        <option selected="">Open this select menu</option>
                                                        @foreach($roles as $role)
                                                        <option value="{{$role->id}}"
                                                            @if($role->name == $user->getRoleNames()->first())selected @endif>
                                                        {{$role->name}}
                                                        </option>

                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                </form>



            </div>
        </div>
    </div>
</div>
@endsection