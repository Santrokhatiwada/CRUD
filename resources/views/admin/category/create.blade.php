@extends('admin.layouts.app')
   
@section('content')
@section('body')
<div class="body flex-grow-1 px-3">
  <div class="container-lg">
<div class="body flex-grow-1 px-3">
  <div class="container-lg">
<div class="card">
        <div class="card-body">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Category List</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/admin/categories') }}"> Back</a>
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
 
<form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="categories" class="form-control" placeholder="Category">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slug:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="row">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Category Image</label>
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
@endsection