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
        @foreach($category->blogs as $blog)
       

  
         
        
      <div class="col-md-6">
        <div class="box">
          <div class="img-box">
            <img src="images/s-3.png" alt="">
          </div>
          
          <h4>
          
    
            {{$blog->header}}
            <a href="{{ route('website.blog',$blog->slug) }}">
            Read More
          </a>
          </h4>
         
         
          </a>
        </div>
      </div>
    
   
    
    @endforeach
      
    </div>
  </div>
</section>

@endsection