@extends('admin.layouts.app')
  
@section('content')
<div class="body flex-grow-1 px-3">
  <div class="container-lg">
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Category</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.categories.index') }}"> Back</a>
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
        <form action="{{ route('admin.categories.update', $Category->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
      
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="categories" value="{{ $Category->categories }}" class="form-control" placeholder="Category">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Slug:</strong>
                        <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $Category->description }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Category Image</label>
                        <input class="form-control" type="file" id="formFile" name="image">

                    
                    @if($Category->image == NULL)
                     "No photo"
     @elseif($Category->image != NULL)
     <td><img height="120px" src="{{ asset('uploads/categories/'.$Category->image) }}"></td>

     <form action="{{ route('admin.categories.destroy', $Category->id) }}" method="POST" style="display: inline-block;">
   
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
</form>

        @endif
                    </div>
               
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>Is Active:</strong>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_active" id="flexRadioDefault1" value="{{'1'}}" @if($Category->is_active) checked @endif > 
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_active" id="flexRadioDefault2" value="{{'0'}}" @if(!$Category->is_active) checked @endif>
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
@endsection
