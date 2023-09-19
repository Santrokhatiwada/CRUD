@extends('app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
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
     
    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ old ('name') ?? $product->name }}" class="form-control" placeholder="Name">
                    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <!-- <textarea class="form-control" style="height:150px" name="price" placeholder="Price">{{ $product->price }}</textarea> -->
                    <input type="number" name="price" value="{{ old ('price') ?? $product->price }}" class="form-control" placeholder="proce">
                    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control"  placeholder="image">
                    <img src="/images/{{ old ('image') ?? $product->image }}" width="300px">
                    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Manufacture Date</strong>
          
                <input type="date" name="manufacture_date" value="{{ old ('manufacture_date') ??$product->manufacture_date }}" class="form-control" placeholder="Manufacture Date">
                @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Expire Date</strong>
          
                <input type="date" name="expired_date" value="{{ old ('expired_date') ?? $product->expired_date}}" class="form-control" placeholder="Expire_date">
                @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
      
    </form>
@endsection