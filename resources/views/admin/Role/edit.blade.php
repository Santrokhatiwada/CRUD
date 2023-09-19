@extends('admin.layouts.app')

@section('content')

<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Edit Role</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin.roles.index') }}"> Back</a>
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
            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Role Name:</strong>
                                    <input type="text" value="{{$role->name}}" name="name" class="form-control" placeholder="Role Name">

                                    </div>
                                    <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Roles:</strong>
                                            <div class="tab-content rounded-bottom">
                                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-839">
                                                    <select name="permission_ids[]" class="form-select" aria-label="Default select example" multiple>
                                                      
                                                        @foreach($permissions as $permission)
                                                        <option value="{{$permission->id}}" 
                                                            @foreach($selectedPermissions as $selectedPermission)
                                                            @if($permission->id == $selectedPermission->id) selected @endif

                                                            @endforeach>
                                        {{$permission->name }}</option>

                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                               
                                <div class="row">
                                
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