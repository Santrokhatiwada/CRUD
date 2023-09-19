@extends('admin.layouts.app')

@section('content')

<div class="body flex-grow-1 px-3">
  <div class="container-lg">
<div class="card">
        <div class="card-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-left">
                <h2>Add New Blog List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/admin/blogs') }}"> Back</a>
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

    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category Id:</strong>
                    <div class="tab-content rounded-bottom">
                        <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-839">
                            <select name="category_id" class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                @foreach($categorys as $category)
                                <option value="{{$category->id}}">{{$category->categories }}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Header:</strong>
                            <input type="text" name="header" class="form-control" placeholder="Header">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Slug:</strong>
                                <input type="text" name="slug" class="form-control" placeholder="Slug">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Body:</strong>
                                    <textarea class="form-control" style="height:150px" name="body" placeholder="Body"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Blog Image</label>
                                    <input class="form-control" type="file" id="formFile" name="image">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <strong>Is Active:</strong>
                                    <div class="form-check">

                                        <input class="form-check-input" type="radio" name="is_active" id="flexRadioDefault1" value="{{'1'}}">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_active" id="flexRadioDefault2" checked value="{{'0'}}">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            No
                                        </label>
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

<html>
        <head>
               
                <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
        </head>
        <body>
                
                <script>
                        CKEDITOR.replace( 'body' );
                </script>
        </body>
</html>


@endsection