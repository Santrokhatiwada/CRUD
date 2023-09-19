@extends('website.layouts.app')

@section('body')

<section class="service_section ">
  <div class="container">
    <div class="heading_container">
      <h2>
       News
      </h2>
    </div>
  </div>
  <div class="container">
 
    <div class="row">
      
       

  
         
        
      <div class="col-md-6">
        <div class="box">
         
          <h1>
          
    
            {{$blog->header}}
            </h1>
            <div class="img-box">
          <img height="80px" src="{{ asset('uploads/blogs/'.$blog->image) }}">
</div>
            {!!$blog->body!!}
            
           
         

         
         
        
        </div>
      </div>
    
   
    
 
      
    </div>
  </div>
</section>

@endsection