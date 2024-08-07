@extends('app')
  
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>LIST OF PRODUCTS</h2>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
     
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Manufactured Date</th>
            <th>Expired Date</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/images/{{ $product->image }}" width="100px"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->manufacture_date}}</td>
            
            <td>{{ $product->expired_date }}</td>
            

            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
      
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
       
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
      
                    @csrf
                    @method('DELETE')
         
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                
            </td>
        </tr>
        @endforeach
    </table>
     
    {!! $products->links() !!}
 
@endsection