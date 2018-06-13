@extends('public.layout.master')
@section('title', 'Trang chủ')
@section('content')
  <!-- main-slider -->
     <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
         <a href="beverages.html"> <img class="first-slide" src="/images/banner/b1.jpg" alt="First slide"></a>
        </div>
        <div class="item">
         <a href="personalcare.html"> <img class="second-slide " src="/images/banner/b3.jpg" alt="Second slide"></a>
        </div>
        <div class="item">
          <a href="household.html"><img class="third-slide " src="/images/banner/b1.jpg" alt="Third slide"></a>
        </div>
      </div>
    
    </div><!-- /.carousel -->  
<!--banner-bottom-->
        
<!--banner-bottom-->
  <!-- //main-slider -->
  <!-- //top-header and slider -->
  <!-- top-brands -->
  <div class="top-brands">
    <div class="container">
    <h2>{{ __('user/index.title-offers') }}</h2>
      <div class="grid_3 grid_5">
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
          <ul id="myTab" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">{{ __('user/index.top-selling') }}</a></li>
            <li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">{{ __('user/index.top-rating') }}</a></li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
              <div class="agile_top_brands_grids">
              </div>
              <div class="clearfix"> </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
              <div class="agile-tp">
              </div>
              <div class="agile_top_brands_grids">
                
              </div>
              <div class="clearfix"> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- //top-brands -->

<!--brands-->
    
<!--//brands-->
<!-- new -->
  <div class="newproducts-w3agile">
    <div class="container">
      <h3>{{ __('user/index.title-new-offers') }}</h3>
        <div class="agile_top_brands_grids">
            
        </div>
        <div class="clearfix"> </div>
    </div>
  </div>
<!-- //new -->
@endsection
