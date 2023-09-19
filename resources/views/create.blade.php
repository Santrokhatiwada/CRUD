@extends('layouts.app')
   
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
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
 
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Name">
       
            </div>
        
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
          
                <input type="number" name="price" value="{{old('price')}}" class="form-control" placeholder="Price">
         
            </div>
       
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Manufacture Date</strong>
          
                <input type="date" name="manufacture_date" value="{{old('manufacture_date')}}" class="form-control" placeholder="Manufacture Date">
            
            </div>
        
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Expire Date</strong>
          
                <input type="date" name="expired_date" value="{{old('expired_date')}}" class="form-control" placeholder="Expire_date">
            
            </div>
        

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" value="{{old('image')}}" class="form-control" placeholder="image">
            </div>
        </div>

        <!-- </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password</strong>
          
                <input type="text" name="password"  class="form-control" placeholder="password">
            
            </div> -->





      
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
      
</form>

@endsection