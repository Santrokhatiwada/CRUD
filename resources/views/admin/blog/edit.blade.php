@extends('admin.layouts.app')
  
@section('content')

<div class="body flex-grow-1 px-3">
  <div class="container-lg">
<div class="card">
        <div class="card-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Blog</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.blogs.index') }}"> Back</a>
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
    <form action="{{ route('admin.blogs.update',$Blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                    <strong>header:</strong>
                    <input type="text" name="header" value="{{ $Blog->header }}" class="form-control" placeholder="Header">
                </div>
            </div>
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Slug:</strong>
                    <input type="text" name="slug" value="{{ $Blog->slug }}" class="form-control" placeholder="slug">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Body:</strong>
                    <textarea class="form-control" style="height:150px" name="body" placeholder="Description">{{ $Blog->body }}</textarea>
                </div>
            </div>
            <div class="row">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Blog Image</label>
                                    
                                    <input class="form-control" type="file" id="formFile" name="image">
                    @if($Blog->image == NULL)
                     "No photo"
     @elseif($Blog->image != NULL)
       <td><img height="120px" src="{{ asset('uploads/blogs/'.$Blog->image) }}"></td>
       
       <a class="btn btn-info" href=# onclick="event.preventDefault();document.getElementById('delete-image-form').submit();">Delete the image</a>
    
        @endif

                                </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-xs-12 col-sm-12 col-md-12">
        <strong>Is Active:</strong>
        <div class="form-check">

  <input class="form-check-input" type="radio" name="is_active" id="flexRadioDefault1" value="{{'1'}}" @if($Blog->is_active) checked @endif > 
  <label class="form-check-label" for="flexRadioDefault1">
    Yes
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="is_active" id="flexRadioDefault2"  value="{{'0'}}" @if(!$Blog->is_active) checked @endif>
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

    <form action="{{ route('admin.blogs.deleteImage',$Blog->id) }}" method="POST" id="delete-image-form">
    @csrf
                      @method('DELETE')
                     
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
