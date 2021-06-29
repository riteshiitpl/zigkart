@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Helper::translation(1913,$translate) }} - {{ $allsettings->site_title }}</title>
@include('style')
<style>
.testimonial-section .single-testimonial .carousel-item{
    width: 100% !important;
    background: #ececec !important;
}

</style>

<style>
@import url('https://fonts.googleapis.com/css?family=Roboto');
.carousel-item > div {
  float: left;
}
.carousel-by-item [class*="cloneditem-"] {
  display: none;
}
.carousel-inner{
    margin-top: -57px;
    padding-bottom: 30px;
}
.box figure {
  -webkit-transition: 1s all;
  transition: 1s all;
  position: relative;
}

.box figure img {
  height: 223px;
  -o-object-fit: cover;
     object-fit: cover;
  -webkit-transition: .3s all;
  transition: .3s all;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
}

.box figure figcaption {
  position: absolute;
  bottom: 0px;
  left: 8%;
  right: 8%;
  background: #fff;
  color: #000;
  padding: 20px 15px;
  -webkit-box-shadow: 0 5px 10px #00000033;
          box-shadow: 0 5px 10px #00000033;
  -webkit-transition: .5s all;
  transition: .5s all;
}

.box figure figcaption::after {
  left: 50%;
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
  bottom: 0;
  height: 2px;
  background: #fc5546;
  content: '';
  width: 0;
  position: absolute;
  -webkit-transition: .5s all;
  transition: .5s all;
}

.box figure figcaption h5 {
  font-size: 1.4rem;
  font-weight: bold;
  -webkit-transition: .3s all;
  transition: .3s all;
}

.box figure figcaption h3 {
  font-size: 2.1rem;
  font-weight: 500;
}

.box figure:hover {
  -webkit-transform: translateY(5px);
          transform: translateY(5px);
}

.box figure:hover h5 {
  color: #fc5546;
}

.box figure:hover img {
  -webkit-box-shadow: 0px 0px 6px #0000004f, -10px -10px 1px #f97955;
          box-shadow: 0px 0px 6px #0000004f, -10px -10px 1px #f97955;
}

.box2 figure:hover figcaption {
  -webkit-transform: translateY(-7px);
          transform: translateY(-7px);
  -webkit-box-shadow: 0 10px 10px #0000004f;
          box-shadow: 0 10px 10px #0000004f;
}

.box figure:hover figcaption::after {
  width: 100%;
}
.box h3 {
  font-size: 3rem;
  font-family: inherit;
  font-weight: bold;
  line-height: 4rem;
}

.box p {
  font-size: 2rem;
  font-family: "helveticaregular";
  color: rgba(255, 255, 255, 0.7);
}
.carousel-item{
    height:0px !important;
}
.carousel-inner{
    height: 400px !important;
}
</style>

<script>
    function GetUnique(e) {
    var l = [],
        s = temp_c = [],
        t = ["col-md-1", "col-md-2", "col-md-3", "col-md-4", "col-md-6", "col-md-12", "col-sm-1", "col-sm-2", "col-sm-3", "col-sm-4", "col-sm-6", "col-sm-12", "col-lg-1", "col-lg-2", "col-lg-3", "col-lg-4", "col-lg-6", "col-lg-12", "col-xs-1", "col-xs-2", "col-xs-3", "col-xs-4", "col-xs-6", "col-xs-12", "col-xl-1", "col-xl-2", "col-xl-3", "col-xl-4", "col-xl-6", "col-xl-12"];
    $(e).each(function() {
        for (var l = $(e + " > div").attr("class").split(/\s+/), t = 0; t < l.length; t++) s.push(l[t])
    });
    for (var c = 0; c < s.length; c++) temp_c = s[c].split("-"), 2 == temp_c.length && (temp_c.push(""), temp_c[2] = temp_c[1], temp_c[1] = "xs", s[c] = temp_c.join("-")), -1 == $.inArray(s[c], l) && $.inArray(s[c], t) && l.push(s[c]);
    return l
}

function setcss(e, l, s) {
    for (var t = ["", "", "", "", "", ""], c = d = f = g = 0, r = [1200, 992, 768, 567, 0], o = [], a = 0; a < e.length; a++) {
        var i = e[a].split("-");
        if (3 == i.length) {
            switch (i[1]) {
                case "xl":
                    d = 0;
                    break;
                case "lg":
                    d = 1;
                    break;
                case "md":
                    d = 2;
                    break;
                case "sm":
                    d = 3;
                    break;
                case "xs":
                    d = 4
            }
            t[d] = i[2]
        }
    }
    for (var n = 0; n < t.length; n++)
        if ("" !== t[n]) {
            if (0 === c && (c = 12 / t[n]), f = 12 / t[n], g = 100 / f, a = s + " > .carousel-item.active.carousel-item-right," + s + " > .carousel-item.carousel-item-next {-webkit-transform: translate3d(" + g + "%, 0, 0);transform: translate3d(" + g + ", 0, 0);left: 0;}" + s + " > .carousel-item.active.carousel-item-left," + s + " > .carousel-item.carousel-item-prev {-webkit-transform: translate3d(-" + g + "%, 0, 0);transform: translate3d(-" + g + "%, 0, 0);left: 0;}" + s + " > .carousel-item.carousel-item-left, " + s + " > .carousel-item.carousel-item-prev.carousel-item-right, " + s + " > .carousel-item.active {-webkit-transform: translate3d(0, 0, 0);transform: translate3d(0, 0, 0);left: 0;}", f > 1) {
                for (k = 0; k < f - 1; k++) o.push(l + " .cloneditem-" + k);
                o.length && (a = a + o.join(",") + "{display: block;}"), o = []
            }
            0 !== r[n] && (a = "@media all and (min-width: " + r[n] + "px) {" + a + "}"), $("#slider-css").prepend(a)
        } $(l).each(function() {
        for (var e = $(this), l = 0; l < c - 1; l++)(e = e.next()).length || (e = $(this).siblings(":first")), e.children(":first-child").clone().addClass("cloneditem-" + l).appendTo($(this))
    })
}

//Use Different Slider IDs for multiple slider
$(document).ready(function() {
    var item = '#slider-1 .carousel-item';
    var item_inner = "#slider-1 .carousel-inner";
    classes = GetUnique(item);
    setcss(classes, item, item_inner);


    var item_1 = '#slider-2 .carousel-item';
    var item_inner_1 = "#slider-2 .carousel-inner";
    classes = GetUnique(item_1);
    setcss(classes, item_1, item_inner_1);
});
    </script>
</head>
<body>

@include('header')

    <section class="sectin1" style="background:url('public/new_assets/images/Artboard1.jpg');background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="col-sm-8"><div class="vid-large-text">Welcome To <span style="color:#fe4909 !important">Woo</span>Marketplace<span class="text-underline-style" style="text-align: left !important;">Watch and learn about our vision and requirements</span></div>
      <div class="vid-small-text" style="font-size: 13px;
    font-weight: 500;">Your Destination to discover and buy quality products & services.</div>
      <a href="{{url('/shop')}}" class="buttonss" style="margin-top: 30px;">SHOP NOW</a>
    </div>
      <div class="col-sm-4 redl-video">
        <a href="javascript:void(0);" class="play-btn" id="myImg"><i></i></a>
          
          <div class="video">
            <iframe width="380" height="280" src="https://www.youtube.com/embed/nfQHF87vY0s?autoplay=1" frameborder="0" allowfullscreen></iframe>
          
        </div>
       
        </div>
    </div>
    
    </div>
    </section>
     <section class="sectin bg-gray" style="padding: 35px 0px ;height: 250px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-title" style="margin-bottom: 25px;">Buy and Sell Products</h2>
          </div>
          <div class="col-lg-6 col-md-8 col-sm-9 col-10 mx-auto" style="height: 100px !important;     line-height: 50px;">
            <form action="{{ route('shop') }}" class="search_form" id="search_form" method="post" enctype="multipart/form-data">
             {{ csrf_field() }}
              <div class="form-group has-feedback">
                <label for="search" class="sr-only">Search</label> 
                <input type="text" class="form-control" id="search_text" name="search_text" placeholder="{{ Helper::translation(2039,$translate) }}">
                 </div>
            </form>
            <a href="{{url('/register')}}" class="buttonss" style="margin-top: 30px;    margin-left: 41px;background: #7a93a7;color: #fff;border: 1px solid #fff;">I'm a buyer</a>
            <a href="{{url('/register')}}" class="buttonss" style="margin-top: 30px;background: #fd784a;color: #fff;border: 1px solid #fff;">I'm a seller</a>
          </div>
        </div>
      </div>
    </section>
       <section class="sectin" style="padding:0px 15px">
        <div class="row work-process  pb-5 pt-5" style="
    padding: 30px 0px !important;
">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><div class="title mb-5 text-center">
          <h3 style="text-align: center;">WOOMARKETPLACE <span class="site-color"></span></h3>
          <p style="text-align: center;">It’s simple: request to sell, get approved, own your presence!</p>
          <img src=" {{ URL('public/new_assets/images/Asset-49-135x6.png') }}">
      </div>
  </div>
   <div class="col-sm-4"></div>
   </div>
   <style type="text/css" id="slider-css"></style>
   <div class="spe-cor">
<div class="container-fluid">
    <div class="row">
            <div id="slider-2" class="carousel carousel-by-item slide" data-ride="carousel">
                <div class="carousel-inner box" role="listbox">
                    <div class="carousel-item active">
                        <div class="col-md-3 col-sm-4 col-4">
                            
                        <figure class="text-center">
                               <img class="d-block img-fluid" src="https://lab2.invoidea.in/marketplace/public/new_assets/images/women.jpg" alt="First slide">
                                <figcaption>
                                    <h5>Women Collections</h5>
                                    
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3 col-sm-4 col-4">
                            
                        <figure class="text-center">
                            <img class="d-block img-fluid" src="https://lab2.invoidea.in/marketplace/public/new_assets/images/men.jpg" alt="First slide">
                                <figcaption>
                                    <h5>Men Collections</h5>
                                    
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3 col-sm-4 col-4">
                          
                          <figure class="text-center">
                             <img class="d-block img-fluid" src="https://lab2.invoidea.in/marketplace/public/new_assets/images/kids.jpeg" alt="First slide">
                                <figcaption>
                                    <h5>Kids Collections</h5>
                                    
                                </figcaption>
                            </figure>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3 col-sm-4 col-4">
                           
                          <figure class="text-center">
                             <img class="d-block img-fluid" src="https://images.unsplash.com/photo-1562101806-ecd80e69bbb7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Second slide">
                                <figcaption>
                                    <h5>Electronics</h5>
                                    
                                </figcaption>
                            </figure>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3 col-sm-4 col-4">
                           
                         <figure class="text-center">
                             <img class="d-block img-fluid" src="https://images.unsplash.com/photo-1558979158-65a1eaa08691?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Third slide">
                                <figcaption>
                                    <h5>Accessories</h5>
                                    
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3 col-sm-4 col-4">
                           
                         <figure class="text-center">
                             <img class="d-block img-fluid" src="https://images.unsplash.com/photo-1564359916269-08ddfdf543ee?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Third slide">
                                <figcaption>
                                    <h5>Our Services</h5>
                                    
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#slider-2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#slider-2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
</div>
</div>
</div>
      </section>


       <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <section class="our-blog p-0 m-0 bg-silver sectin">
        <div class="container work-process  pb-5 pt-5" style="margin-top: -40px;">
            <div class="title mb-5 text-center">
            <h3>OUR WORK <span class="site-color">PROCESS</span></h3>
            <p>It’s simple: request to sell, get approved, own your presence!</p>
            <img src="{{ url('public/new_assets/images/Asset-49-135x6.png') }}">
        </div>
            <!-- ============ step 1 =========== -->
            <div class="row">
                <div class="col-md-5">
                    <div class="process-box process-left" data-aos="fade-right" data-aos-duration="1000">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="process-step">
                                    <p class="m-0 p-0">Step</p>
                                    <h2 class="m-0 p-0">01</h2>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h5>Approval</h5>
                                <p><small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </small></p>
                            </div>
                        </div>
                        <div class="process-line-l"></div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="process-point-right"></div>
                </div>
            </div>
            <!-- ============ step 2 =========== -->
            <div class="row">
                
                <div class="col-md-5">
                    <div class="process-point-left"></div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="process-box process-right" data-aos="fade-left" data-aos-duration="1000">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="process-step">
                                    <p class="m-0 p-0">Step</p>
                                    <h2 class="m-0 p-0">02</h2>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h5>Contract</h5>
                                <p><small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </small></p>
                            </div>
                        </div>
                        <div class="process-line-r"></div>
                    </div>
                </div>
    
            </div>
            <!-- ============ step 3 =========== -->
            <div class="row">
                <div class="col-md-5">
                    <div class="process-box process-left" data-aos="fade-right" data-aos-duration="1000">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="process-step">
                                    <p class="m-0 p-0">Step</p>
                                    <h2 class="m-0 p-0">03</h2>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h5>Registration</h5>
                                <p><small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </small></p>
                            </div>
                        </div>
                        <div class="process-line-l"></div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="process-point-right"></div>
                </div>
            </div>
            <!-- ============ step 4 =========== -->
            <div class="row">
                <div class="col-md-5">
                    <div class="process-point-left"></div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="process-box process-right" data-aos="fade-left" data-aos-duration="1000">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="process-step">
                                    <p class="m-0 p-0">Step</p>
                                    <h2 class="m-0 p-0">04</h2>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h5>Onboarding</h5>
                                <p><small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </small></p>
                            </div>
                        </div>
                        <div class="process-line-r"></div>
                    </div>
                </div>
                
                
            </div>
            <!-- ============ step 3 =========== -->
            <div class="row">
                <div class="col-md-5">
                    <div class="process-box process-left" data-aos="fade-right" data-aos-duration="1000">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="process-step">
                                    <p class="m-0 p-0">Step</p>
                                    <h2 class="m-0 p-0">05</h2>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h5>Request Launch</h5>
                                <p><small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </small></p>
                            </div>
                        </div>
                        <div class="process-line-l"></div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="process-point-right process-last"></div>
                </div>
            </div>
            <!-- ============ -->
        </div>
    </section>

<!-- Google font -->

  
<script src="https://use.fontawesome.com/1744f3f671.js"></script>

<section class="sectingray" style="padding-bottom: 30px;">

      <div class="container">
        <div class="row">
            <br/>
           <div class="col text-center">
         
          
          <div class="title mb-5 text-center">
          <h3 style="text-align: center;">Our Clients <span class="site-color"></span></h3>
          <p style="text-align: center;">It’s simple: request to sell, get approved, own your presence!</p>
          <img src="{{ url('public/new_assets/images/Asset-49-135x6.png') }}">
      </div></div>
          
                   
          
        </div>
          <div class="row text-center">
                <div class="col">
                <div class="counter">
            <i class="fa fa-code fa-2x"></i>
            <h2 class="timer count-title count-number" data-to="100" data-speed="1500">1 crore+</h2>
             <p class="count-text ">Resellers to boost your business</p>
          </div>
                </div>
                    <div class="col">
                     <div class="counter">
            <i class="fa fa-coffee fa-2x"></i>
            <h2 class="timer count-title count-number" data-to="1700" data-speed="1500">24000+</h2>
            <p class="count-text ">Happy Clients</p>
          </div>
                    </div>
                    <div class="col">
                        <div class="counter">
            <i class="fa fa-lightbulb-o fa-2x"></i>
            <h2 class="timer count-title count-number" data-to="11900" data-speed="1500">7 crore+</h2>
            <p class="count-text ">Project Complete</p>
          </div></div>
                    <div class="col">
                    <div class="counter">
            <i class="fa fa-bug fa-2x"></i>
            <h2 class="timer count-title count-number" data-to="157" data-speed="1500">700+</h2>
            <p class="count-text ">Coffee With Clients</p>
          </div>
                    </div>
               </div>
      </div>
      </section>

   <section class="sectingray">
     <div class="supplier-page-start-selling-container" style=" margin: 0;
    margin-top: 50px;
    height: 350px;
    background-size: cover;
    padding-top: 45px;
    padding-left: 90px;background: url('public/new_assets/images/Artboard 3-100.jpg');">
    <div class="supplier-page-start-selling-item-wrapper" style="float:left"><h2 class="supplier-page-start-selling-title">Start Selling Today</h2><p class="supplier-page-start-selling-caption">Put your products in front of crores of people</p><a href="https://supplier.meeshosupply.com/v2/new/signup?distinct_id=" class="supplier-page-start-selling-button" style="margin-top: 30px;background: #fd784a;color: #fff;border: 1px solid #fd784a;padding: 7px 20px;text-decoration: none;border-radius: 8px;">Start Selling</a></div>
</div> 
</section> 

<section class="testimonial-section2">
 <div class="row text-center">

<div class="head-box text-center mb-3 col-md-12 mt-5">
<h2 class="font-abril">What Our Clients Says About Us</h2>
<img src="{{ url('public/new_assets/images/Asset-49-135x6.png') }}">
</div>

        </div>
       <div id="testim" class="testim">

<!--         <div class="testim-cover"> -->
            <div class="wrap">

                <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
                <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
                <ul id="testim-dots" class="dots">
                    <li class="dot active"></li><!--
                    --><li class="dot"></li><!--
                    --><li class="dot"></li><!--
                    --><li class="dot"></li><!--
                    --><li class="dot"></li>
                </ul>
                <div id="testim-content" class="cont">                    
                    <div class="active">
                        <div class="img"><img src="https://image.ibb.co/hgy1M7/5a6f718346a28820008b4611_750_562.jpg" alt=""></div>
                        <div class="h4">Kellie</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
                    </div>

                    <div>
                        <div class="img"><img src="https://image.ibb.co/cNP817/pexels_photo_220453.jpg" alt=""></div>
                        <div class="h4">Jessica</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
                    </div>

                    <div>
                        <div class="img"><img src="https://image.ibb.co/iN3qES/pexels_photo_324658.jpg" alt=""></div>
                         <div class="h4">Kellie</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
                    </div>

                    <div>
                        <div class="img"><img src="https://image.ibb.co/kL6AES/Top_SA_Nicky_Oppenheimer.jpg" alt=""></div>
                        <div class="h4">Jessica</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
                    </div>

                    <div>
                        <div class="img"><img src="https://image.ibb.co/gUPag7/image.jpg" alt=""></div>
                        <div class="h4">Kellie</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    
                    </div>

                </div>
                 </div>
            </div>
<!--         </div> -->
    </section>
    
<script src="https://use.fontawesome.com/1744f3f671.js"></script>
  <section id="testimonial" class="testimonial-section sec-bg-04 py-5 h-100" style="background: #ececec">
 <div class="container">


<style>

.testimonial-section2{
  /*height: 600px;*/
  position: relative;
  padding: 0px 0;
  background-color: #ececec;
}


@media only screen and (max-width: 998px){
.navbar-brand {
    float: right !important;
    margin-right: -33px;
}
.vid-large-text{
        font-size: 37px !important;
}
}
.testim .wrap {
    position: relative;
    width: 100%;
    max-width: 1020px;
    padding: 40px 20px;
    margin: auto;
}

.testim .arrow {
    display: block;
    position: absolute;
    color: #000;
    cursor: pointer;
    font-size: 2em;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
    -webkit-transition: all .3s ease-in-out;    
    -ms-transition: all .3s ease-in-out;    
    -moz-transition: all .3s ease-in-out;    
    -o-transition: all .3s ease-in-out;    
    transition: all .3s ease-in-out;
    padding: 5px;
    z-index: 22222222;
}

.testim .arrow:before {
    cursor: pointer;
}

.testim .arrow:hover {
    color: #2b288d;
}
    

.testim .arrow.left {
    left: 10px;
}

.testim .arrow.right {
    right: 10px;
}

.testim .dots {
    text-align: center;
    position: absolute;
    width: 100%;
    bottom: 60px;
    left: 0;
    display: block;
    z-index: 3333;
    height: 12px;
}

.testim .dots .dot {
    list-style-type: none;
    display: inline-block;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 1px solid #eee;
    margin: 0 10px;
    cursor: pointer;
    -webkit-transition: all .5s ease-in-out;    
    -ms-transition: all .5s ease-in-out;    
    -moz-transition: all .5s ease-in-out;    
    -o-transition: all .5s ease-in-out;    
    transition: all .5s ease-in-out;
    position: relative;
    background:#15121254;
}

.testim .dots .dot.active,
.testim .dots .dot:hover {
    background: #2b288d;
    border-color: #2b288d;
}

.testim .dots .dot.active {
    -webkit-animation: testim-scale .5s ease-in-out forwards;   
    -moz-animation: testim-scale .5s ease-in-out forwards;   
    -ms-animation: testim-scale .5s ease-in-out forwards;   
    -o-animation: testim-scale .5s ease-in-out forwards;   
    animation: testim-scale .5s ease-in-out forwards;   
}
    
.testim .cont {
    position: relative;
    overflow: hidden;
}

.testim .cont > div {
    text-align: center;
    position: absolute;
    top: 0;
    left: 0;
    padding: 0 0 70px 0;
    opacity: 0;
}

.testim .cont > div.inactive {
    opacity: 1;
}
    

.testim .cont > div.active {
    position: relative;
    opacity: 1;
}
    

.testim .cont div .img img {
    display: block;
    width: 100px;
    height: 100px;
    margin: auto;
    border-radius: 50%;
}

.testim .cont div .h4 {
    color: #2b288d;
    font-size: 1.2em;
    margin: 15px 0;
}

.testim .cont div p {
    font-size: 1.15em;
    color: #444;
    width: 80%;
    margin: auto;
}

.testim .cont div.active .img img {
    -webkit-animation: testim-show .5s ease-in-out forwards;            
    -moz-animation: testim-show .5s ease-in-out forwards;            
    -ms-animation: testim-show .5s ease-in-out forwards;            
    -o-animation: testim-show .5s ease-in-out forwards;            
    animation: testim-show .5s ease-in-out forwards;            
}

.testim .cont div.active .h4 {
    -webkit-animation: testim-content-in .4s ease-in-out forwards;    
    -moz-animation: testim-content-in .4s ease-in-out forwards;    
    -ms-animation: testim-content-in .4s ease-in-out forwards;    
    -o-animation: testim-content-in .4s ease-in-out forwards;    
    animation: testim-content-in .4s ease-in-out forwards;    
}

.testim .cont div.active p {
    -webkit-animation: testim-content-in .5s ease-in-out forwards;    
    -moz-animation: testim-content-in .5s ease-in-out forwards;    
    -ms-animation: testim-content-in .5s ease-in-out forwards;    
    -o-animation: testim-content-in .5s ease-in-out forwards;    
    animation: testim-content-in .5s ease-in-out forwards;    
}

.testim .cont div.inactive .img img {
    -webkit-animation: testim-hide .5s ease-in-out forwards;            
    -moz-animation: testim-hide .5s ease-in-out forwards;            
    -ms-animation: testim-hide .5s ease-in-out forwards;            
    -o-animation: testim-hide .5s ease-in-out forwards;            
    animation: testim-hide .5s ease-in-out forwards;            
}

.testim .cont div.inactive .h4 {
    -webkit-animation: testim-content-out .4s ease-in-out forwards;        
    -moz-animation: testim-content-out .4s ease-in-out forwards;        
    -ms-animation: testim-content-out .4s ease-in-out forwards;        
    -o-animation: testim-content-out .4s ease-in-out forwards;        
    animation: testim-content-out .4s ease-in-out forwards;        
}

.testim .cont div.inactive p {
    -webkit-animation: testim-content-out .5s ease-in-out forwards;    
    -moz-animation: testim-content-out .5s ease-in-out forwards;    
    -ms-animation: testim-content-out .5s ease-in-out forwards;    
    -o-animation: testim-content-out .5s ease-in-out forwards;    
    animation: testim-content-out .5s ease-in-out forwards;    
}

@-webkit-keyframes testim-scale {
    0% {
        -webkit-box-shadow: 0px 0px 0px 0px #eee;
        box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
        -webkit-box-shadow: 0px 0px 10px 5px #eee;        
        box-shadow: 0px 0px 10px 5px #eee;        
    }

    70% {
        -webkit-box-shadow: 0px 0px 10px 5px #ea830e;        
        box-shadow: 0px 0px 10px 5px #ea830e;        
    }

    100% {
        -webkit-box-shadow: 0px 0px 0px 0px #ea830e;        
        box-shadow: 0px 0px 0px 0px #ea830e;        
    }
}

@-moz-keyframes testim-scale {
    0% {
        -moz-box-shadow: 0px 0px 0px 0px #eee;
        box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
        -moz-box-shadow: 0px 0px 10px 5px #eee;        
        box-shadow: 0px 0px 10px 5px #eee;        
    }

    70% {
        -moz-box-shadow: 0px 0px 10px 5px #ea830e;        
        box-shadow: 0px 0px 10px 5px #ea830e;        
    }

    100% {
        -moz-box-shadow: 0px 0px 0px 0px #ea830e;        
        box-shadow: 0px 0px 0px 0px #ea830e;        
    }
}

@-ms-keyframes testim-scale {
    0% {
        -ms-box-shadow: 0px 0px 0px 0px #eee;
        box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
        -ms-box-shadow: 0px 0px 10px 5px #eee;        
        box-shadow: 0px 0px 10px 5px #eee;        
    }

    70% {
        -ms-box-shadow: 0px 0px 10px 5px #ea830e;        
        box-shadow: 0px 0px 10px 5px #ea830e;        
    }

    100% {
        -ms-box-shadow: 0px 0px 0px 0px #ea830e;        
        box-shadow: 0px 0px 0px 0px #ea830e;        
    }
}

@-o-keyframes testim-scale {
    0% {
        -o-box-shadow: 0px 0px 0px 0px #eee;
        box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
        -o-box-shadow: 0px 0px 10px 5px #eee;        
        box-shadow: 0px 0px 10px 5px #eee;        
    }

    70% {
        -o-box-shadow: 0px 0px 10px 5px #ea830e;        
        box-shadow: 0px 0px 10px 5px #ea830e;        
    }

    100% {
        -o-box-shadow: 0px 0px 0px 0px #ea830e;        
        box-shadow: 0px 0px 0px 0px #ea830e;        
    }
}

@keyframes testim-scale {
    0% {
        box-shadow: 0px 0px 0px 0px #eee;
    }

    35% {
        box-shadow: 0px 0px 10px 5px #eee;        
    }

    70% {
        box-shadow: 0px 0px 10px 5px #ea830e;        
    }

    100% {
        box-shadow: 0px 0px 0px 0px #ea830e;        
    }
}

@-webkit-keyframes testim-content-in {
    from {
        opacity: 0;
        -webkit-transform: translateY(100%);
        transform: translateY(100%);
    }
    
    to {
        opacity: 1;
        -webkit-transform: translateY(0);        
        transform: translateY(0);        
    }
}

@-moz-keyframes testim-content-in {
    from {
        opacity: 0;
        -moz-transform: translateY(100%);
        transform: translateY(100%);
    }
    
    to {
        opacity: 1;
        -moz-transform: translateY(0);        
        transform: translateY(0);        
    }
}

@-ms-keyframes testim-content-in {
    from {
        opacity: 0;
        -ms-transform: translateY(100%);
        transform: translateY(100%);
    }
    
    to {
        opacity: 1;
        -ms-transform: translateY(0);        
        transform: translateY(0);        
    }
}

@-o-keyframes testim-content-in {
    from {
        opacity: 0;
        -o-transform: translateY(100%);
        transform: translateY(100%);
    }
    
    to {
        opacity: 1;
        -o-transform: translateY(0);        
        transform: translateY(0);        
    }
}

@keyframes testim-content-in {
    from {
        opacity: 0;
        transform: translateY(100%);
    }
    
    to {
        opacity: 1;
        transform: translateY(0);        
    }
}

@-webkit-keyframes testim-content-out {
    from {
        opacity: 1;
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
    
    to {
        opacity: 0;
        -webkit-transform: translateY(-100%);        
        transform: translateY(-100%);        
    }
}

@-moz-keyframes testim-content-out {
    from {
        opacity: 1;
        -moz-transform: translateY(0);
        transform: translateY(0);
    }
    
    to {
        opacity: 0;
        -moz-transform: translateY(-100%);        
        transform: translateY(-100%);        
    }
}

@-ms-keyframes testim-content-out {
    from {
        opacity: 1;
        -ms-transform: translateY(0);
        transform: translateY(0);
    }
    
    to {
        opacity: 0;
        -ms-transform: translateY(-100%);        
        transform: translateY(-100%);        
    }
}

@-o-keyframes testim-content-out {
    from {
        opacity: 1;
        -o-transform: translateY(0);
        transform: translateY(0);
    }
    
    to {
        opacity: 0;
        transform: translateY(-100%);        
        transform: translateY(-100%);        
    }
}

@keyframes testim-content-out {
    from {
        opacity: 1;
        transform: translateY(0);
    }
    
    to {
        opacity: 0;
        transform: translateY(-100%);        
    }
}

@-webkit-keyframes testim-show {
    from {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }
    
    to {
        opacity: 1;
        -webkit-transform: scale(1);       
        transform: scale(1);       
    }
}

@-moz-keyframes testim-show {
    from {
        opacity: 0;
        -moz-transform: scale(0);
        transform: scale(0);
    }
    
    to {
        opacity: 1;
        -moz-transform: scale(1);       
        transform: scale(1);       
    }
}

@-ms-keyframes testim-show {
    from {
        opacity: 0;
        -ms-transform: scale(0);
        transform: scale(0);
    }
    
    to {
        opacity: 1;
        -ms-transform: scale(1);       
        transform: scale(1);       
    }
}

@-o-keyframes testim-show {
    from {
        opacity: 0;
        -o-transform: scale(0);
        transform: scale(0);
    }
    
    to {
        opacity: 1;
        -o-transform: scale(1);       
        transform: scale(1);       
    }
}

@keyframes testim-show {
    from {
        opacity: 0;
        transform: scale(0);
    }
    
    to {
        opacity: 1;
        transform: scale(1);       
    }
}

@-webkit-keyframes testim-hide {
    from {
        opacity: 1;
        -webkit-transform: scale(1);       
        transform: scale(1);       
    }
    
    to {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }
}

@-moz-keyframes testim-hide {
    from {
        opacity: 1;
        -moz-transform: scale(1);       
        transform: scale(1);       
    }
    
    to {
        opacity: 0;
        -moz-transform: scale(0);
        transform: scale(0);
    }
}

@-ms-keyframes testim-hide {
    from {
        opacity: 1;
        -ms-transform: scale(1);       
        transform: scale(1);       
    }
    
    to {
        opacity: 0;
        -ms-transform: scale(0);
        transform: scale(0);
    }
}

@-o-keyframes testim-hide {
    from {
        opacity: 1;
        -o-transform: scale(1);       
        transform: scale(1);       
    }
    
    to {
        opacity: 0;
        -o-transform: scale(0);
        transform: scale(0);
    }
}

@keyframes testim-hide {
    from {
        opacity: 1;
        transform: scale(1);       
    }
    
    to {
        opacity: 0;
        transform: scale(0);
    }
}

@media all and (max-width: 300px) {
  body {
    font-size: 14px;
  }
}

@media all and (max-width: 500px) {
  .testim .arrow {
    font-size: 1.5em;
  }
  
  .testim .cont div p {
    line-height: 25px;
  }

}

</style>
<script>

// vars
'use strict'
var testim = document.getElementById("testim"),
        testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),
    testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),
    testimLeftArrow = document.getElementById("left-arrow"),
    testimRightArrow = document.getElementById("right-arrow"),
    testimSpeed = 4500,
    currentSlide = 0,
    currentActive = 0,
    testimTimer,
        touchStartPos,
        touchEndPos,
        touchPosDiff,
        ignoreTouch = 30;
;

window.onload = function() {

    // Testim Script
    function playSlide(slide) {
        for (var k = 0; k < testimDots.length; k++) {
            testimContent[k].classList.remove("active");
            testimContent[k].classList.remove("inactive");
            testimDots[k].classList.remove("active");
        }

        if (slide < 0) {
            slide = currentSlide = testimContent.length-1;
        }

        if (slide > testimContent.length - 1) {
            slide = currentSlide = 0;
        }

        if (currentActive != currentSlide) {
            testimContent[currentActive].classList.add("inactive");            
        }
        testimContent[slide].classList.add("active");
        testimDots[slide].classList.add("active");

        currentActive = currentSlide;
    
        clearTimeout(testimTimer);
        testimTimer = setTimeout(function() {
            playSlide(currentSlide += 1);
        }, testimSpeed)
    }

    testimLeftArrow.addEventListener("click", function() {
        playSlide(currentSlide -= 1);
    })

    testimRightArrow.addEventListener("click", function() {
        playSlide(currentSlide += 1);
    })    

    for (var l = 0; l < testimDots.length; l++) {
        testimDots[l].addEventListener("click", function() {
            playSlide(currentSlide = testimDots.indexOf(this));
        })
    }

    playSlide(currentSlide);

    // keyboard shortcuts
    document.addEventListener("keyup", function(e) {
        switch (e.keyCode) {
            case 37:
                testimLeftArrow.click();
                break;
                
            case 39:
                testimRightArrow.click();
                break;

            case 39:
                testimRightArrow.click();
                break;

            default:
                break;
        }
    })
        
        testim.addEventListener("touchstart", function(e) {
                touchStartPos = e.changedTouches[0].clientX;
        })
    
        testim.addEventListener("touchend", function(e) {
                touchEndPos = e.changedTouches[0].clientX;
            
                touchPosDiff = touchStartPos - touchEndPos;
            
                console.log(touchPosDiff);
                console.log(touchStartPos); 
                console.log(touchEndPos);   

            
                if (touchPosDiff > 0 + ignoreTouch) {
                        testimLeftArrow.click();
                } else if (touchPosDiff < 0 - ignoreTouch) {
                        testimRightArrow.click();
                } else {
                    return;
                }
            
        })
}


</script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

</div>
</section> 

    @include('footer')
    @include('javascript')
    </body>
</html>
@else
@include('503')
@endif