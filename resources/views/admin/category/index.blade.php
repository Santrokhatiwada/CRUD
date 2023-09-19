@extends('admin.layouts.app')
  
@section('content')
@section('body')
<div class="body flex-grow-1 px-3">
  <div class="container-lg">
<div class="card">
        <div class="card-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CATEGORY LIST</h2>
            </div>
            <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/admin/home') }}"> Back</a>
            @can('create_category')
            <a class="btn btn-info" href="{{ url('/admin/categories/create') }}"> Add</a>
            @endcan
        </div>
            
        </div>
    </div>
     
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
  
           
               
                <div class="tab-content rounded-bottom">
                  <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-81">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Slug</th>
                          <th scope="col">Image</th>
                          <th scope="col">IS Active</th>
                         
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($Categorys as $category)
        <tr>
            <td>{{ $category->id }}</td>
         
            <td>{{ $category->categories }}</td>
            <td>{{ $category->description }}</td>
            <td><img height="80px" src="{{asset('uploads/categories/'.$category->image)}}"></td>
            <td>{{ $category->is_active ? 'yes' :'no'}}</td>
            <td>
          
            <form action="{{ route('admin.categories.destroy',$category->id) }}" method="POST">
            @can('read_category')
                    <a class="btn btn-info" href="{{ route('admin.categories.show',$category->id) }}">Show</a>
                   @endrole
                    @can('update_category')
                    <a class="btn btn-primary" href="{{ route('admin.categories.edit',$category->id) }}">Edit</a>
                    @endcan

                    @can('delete_category')
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                    </form>
            </td>
        </tr>
        @endforeach
    </table>
     

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>
  </div></div>
             
      
@endsection
@endsection