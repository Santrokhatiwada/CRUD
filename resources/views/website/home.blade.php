
@extends('website.layouts.app')

@section('body')
<div class="body_bg layout_padding">

<!-- service section -->

<section class="service_section ">
  <div class="container">
    <div class="heading_container">
      <h2>
        At Your Service
      </h2>
    </div>
  </div>
  <div class="container">
    
    <div class="row">
        @foreach($category as $category)
      <div class="col-md-6">
        <div class="box">
          <div class="img-box">
            <img src="images/s-3.png" alt="">
          </div>
          
          <h4>
            {{$category->categories}}
          </h4>

          <a href="{{ route('website.category',$category->id) }}">
            Read More
          </a>
        </div>
      </div>
      @endforeach
      
    </div>
  </div>
</section>

<!-- end service section -->

<!-- quote section -->

<section class="quote_section layout_padding">
  <div class="container">
    <div class="box">
      <div class="detail-box">
        <h3>
          Get Your Quote Today!
        </h3>
        <p>
          It is a long established fact that a reader will be distracted by the readable content of a page
        </p>
      </div>
      <div class="btn-box">
        <a href="">
          Get A Quote
        </a>
      </div>
    </div>
  </div>
</section>

<!-- end quote section -->


<!-- contact section -->

<section class="contact_section">
  <div class="container">
    <div class="heading_container">
      <h2>
        Let's Get In Touch!
      </h2>
    </div>
  </div>
  <div class="container contact_bg layout_padding2-top">
    <div class="row">
      <div class="col-md-6">
        <div class="contact_form ">
          <form action="">
            <input type="text" placeholder="Name ">
            <input type="email" placeholder="Email">
            <input type="text" placeholder="Message" class="message_input">
            <button>
              Send
            </button>
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <div class="img-box">
          <img src="images/contact-img.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end contact section -->

<!-- client section -->

<section class="client_section layout_padding-top">
  <div class="d-flex justify-content-center">
    <div class="heading_container">
      <h2>
        Testimonial
      </h2>
    </div>
  </div>
  <div class="container layout_padding2">
    <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExample2Indicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExample2Indicators" data-slide-to="1"></li>
        <li data-target="#carouselExample2Indicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item ">
          <div class="client_container">
            <div class="client-id">
              <div class="img-box">
                <img src="images/client.jpg" alt="">
              </div>
              <div class="client_name">
                <div>
                  <h3>
                    Johndue
                  </h3>
                  <p>
                    Farm & CO
                  </p>
                </div>
              </div>
            </div>
            <div class="client_detail">
              <div class="client_text">
                <blockquote>
                  <p>
                    ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                  </p>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item active">
          <div class="client_container">
            <div class="client-id">
              <div class="img-box">
                <img src="images/client.jpg" alt="">
              </div>
              <div class="client_name">
                <div>
                  <h3>
                    Johndue
                  </h3>
                  <p>
                    Farm & CO
                  </p>
                </div>
              </div>
            </div>
            <div class="client_detail">
              <div class="client_text">
                <blockquote>
                  <p>
                    ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                  </p>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="client_container">
            <div class="client-id">
              <div class="img-box">
                <img src="images/client.jpg" alt="">
              </div>
              <div class="client_name">
                <div>
                  <h3>
                    Johndue
                  </h3>
                  <p>
                    Farm & CO
                  </p>
                </div>
              </div>
            </div>
            <div class="client_detail">
              <div class="client_text">
                <blockquote>
                  <p>
                    ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                  </p>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>


<!-- end client section -->

</div>

@endsection