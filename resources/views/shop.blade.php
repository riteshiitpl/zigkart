@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Helper::translation(2040,$translate) }} - {{ $allsettings->site_title }}</title>
@include('style')
<style>
.ctli,.pt-1 h5 {
        text-align: left;
}
#shop_form{
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
    margin-top: 20px;
}
.card-header:first-child{
padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03) !important;
    border-bottom: 1px solid rgba(0,0,0,.125);
    margin-top:-24px !important;
}
.product-grid2{
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
    margin-top: 20px;
}
.product-grid2 .add-to-cart{
    position: relative !important;
    background-color: #ff9900 !important;
}
</style>
</head>
<body>
    @include('header')






    <section class="headerbg myprofile">
      <div class="container text-left">
        <h2 class="mb-0">{{ Helper::translation(2040,$translate) }}</h2>
        <p class="mb-0"><a href="{{ URL::to('/') }}">{{ Helper::translation(1913,$translate) }}</a> <span class="split">&gt;</span> <span>{{ Helper::translation(2040,$translate) }}</span></p>
      </div>
    </section>
   <main role="main">
      <div class="container-full mt-3" id="demo">
      @if($allsettings->shop_ads == 1)
      @if($allsettings->shop_top_ads !='')
         <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-2" align="center">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    @php echo html_entity_decode($allsettings->shop_top_ads); @endphp
                    <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
       </script>
      </div>
      </div>
      @endif 
      @endif
      <div class="row">
           <div class="col-md-3">
             <form action="{{ route('shop') }}" method="post" id="shop_form"  enctype="multipart/form-data">
           {{ csrf_field() }}
             <div class="mt-1 mb-1 pt-1 pb-1">
                 <div class="card shadow-sm bg-white border-0 mb-3 rounded-0">
                    <h5 class="card-header bg-white link-color">{{ Helper::translation(1932,$translate) }}</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12 categorybox">
                        <div class="ctli">
                            @foreach($categories['display'] as $menu)
                            @php 
                            if($translate == 'en'){ $menu_cat = $menu->cat_id;  } else { $menu_cat = $menu->category_page_parent;  } 
                            @endphp
                            <input type="checkbox" name="category[]" value="cat-{{ $menu_cat }}"> {{ $menu->category_name }}<br/>
                               @if(count($menu->subcategory) != 0)
                                  @foreach($menu->subcategory as $sub_category)
                                  @php if($translate == 'en'){ $menu_subcat = $sub_category->subcat_id; } else { $menu_subcat = $sub_category->subcategory_page_parent; } @endphp
                                   <span class="move_subcategory"><input type="checkbox" name="category[]" value="subcat-{{ $menu_subcat }}"> {{ $sub_category->subcategory_name }}<br/></span>
                                  @endforeach
                               @endif
                            @endforeach
                            </div>
                           </div>
                       </div>
                    </div>
                  </div>
                  <div class="card shadow-sm bg-white border-0 mb-3 rounded-0">
                    <h5 class="card-header bg-white link-color">{{ Helper::translation(1934,$translate) }}</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                            <select class="form-control" name="orderby">
                              <option value="asc">{{ Helper::translation(2163,$translate) }}</option>
                              <option value="desc">{{ Helper::translation(2164,$translate) }}</option>
                           </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card shadow-sm bg-white border-0 mb-3 rounded-0">
                    <h5 class="card-header bg-white link-color">{{ Helper::translation(1950,$translate) }}</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="ctli">
                            <input type="checkbox" name="condition" value="new"> {{ Helper::translation(1951,$translate) }}<br/>
                            <input type="checkbox" name="condition" value="used"> {{ Helper::translation(1952,$translate) }}
                           </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card shadow-sm bg-white border-0 mb-3 rounded-0">
                    <h5 class="card-header bg-white link-color">{{ Helper::translation(1946,$translate) }}</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="ctli">
                            <input type="checkbox" name="product_type" value="physical"> {{ Helper::translation(2165,$translate) }}<br/>
                            <input type="checkbox" name="product_type" value="external"> {{ Helper::translation(2166,$translate) }}<br/>
                            <input type="checkbox" name="product_type" value="digital"> {{ Helper::translation(2167,$translate) }}<br/>
                           </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  @if(count($attributer['display']) != 0)
                  @foreach($attributer['display'] as $attribute)
                  <div class="card shadow-sm bg-white border-0 mb-3 rounded-0">
                    <h5 class="card-header bg-white link-color">{{ $attribute->attribute_name }}</h5>
                    <div class="card-body">
                      <div class="row">
                      <div class="col-lg-12">
                        <div class="ctli">
                        @foreach($attribute->newattributevalue as $product_value)
                        @php if($translate == 'en') { $value_id = $product_value->attribute_value_id; } else { $value_id = $product_value->attrivalue_page_parent; } @endphp
                            <input type="checkbox" name="attribute[]" value="{{ $value_id }}"> {{ $product_value->attribute_value }}<br/>
                        @endforeach 
                        </div>   
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                 @endif
                 </div>
                 <div class="input-group-append">
                  <button class="btn button-color btn-block" type="submit">{{ __('Search') }}</button>
                 </div>
                 @if($allsettings->shop_ads == 1)
                 @if($allsettings->shop_sidebar_ads !='')
                 <div class="row">
                        <div class="col-lg-12" align="center">
                          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            @php echo html_entity_decode($allsettings->shop_sidebar_ads); @endphp
                            <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                 </div> 
                 @endif      
                 @endif
                 </form>
          </div>
            
            <div class="col-md-9">
              <div class="mt-1 mb-1 pt-1 pb-1">
                  <div class="row" align="center">
                           @php $z = 1; @endphp
                              @foreach($shop['product'] as $product) 
                                   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-2 pb-2 prod-item">
                                   <div class="product-grid2">
                                    <div class="product-image2">
                                    <div class="product-hider">
                               <a href="{{ url('/') }}/public/storage/product/{{ $product->product_image }}" data-fancybox="quick-view-{{ $product->product_token.$z }}" data-type="image" class="quickview">
                               <i class="fa fa-eye"></i>
                               <p>{{ Helper::translation(2060,$translate) }}<br/>{{ Helper::translation(2061,$translate) }}</p>
                               </a>
                               <div class="product-images">
                                    @php $imagecount = count($product->productimages); @endphp
                                    @if($imagecount != 0)
                                    @foreach($product->productimages as $images)
                                    <a href="{{ url('/') }}/public/storage/product/{{ $images->product_image }}" data-fancybox="quick-view-{{ $product->product_token.$z }}" data-type="image"></a>
                                    @endforeach
                                    @endif
                                    </div>
                                    <div class="product-former">
                                    <h3>{{ $product->product_name }}</h3>
                                    <div class="mt-3">{{ Helper::translation(2062,$translate) }} : @if($product->product_stock != 0)<span class="theme-color">{{ Helper::translation(2063,$translate) }} ({{ $product->product_stock }})</span>@else<span class="red-color">{{ Helper::translation(2064,$translate) }} ({{ $product->product_stock }})</span>@endif</div>
            @php if($product->product_condition == 'new'){ $badg = "badge badge-warning"; } else { $badg = "badge badge-secondary"; } @endphp
            @if($product->product_condition != "")<div class="mt-2">{{ Helper::translation(1950,$translate) }} : <span class="{{ $badg }}">{{ $product->product_condition }}</span></div>@endif
                                    <div class="mt-3">@if($product->product_price != 0)<span @if($product->product_offer_price != 0) class="fs16 offer-price red-color" @else class="fs32" @endif>{{ $allsettings->site_currency_symbol }}{{ $product->product_price }}</span>@endif @if($product->product_offer_price != 0)<span class="fs32">{{ $allsettings->site_currency_symbol }}{{ $product->product_offer_price }}</span>@endif</div>                                <p class="mt-3">
                                    {{ $product->product_short_desc }} 
                                    </p>
                                    <p><a href="{{ URL::to('/product') }}/{{ $product->product_slug }}" class="btn button-color">{{ Helper::translation(2065,$translate) }}</a></p>
                                    </div>
                                    </div>
                                    <a href="{{ URL::to('/product') }}/{{ $product->product_slug }}">
                                            @if($product->product_image != "")
                                            <img class="pic-1" src="{{ url('/') }}/public/storage/product/{{ $product->product_image }}">
                                            @else
                                            <img class="pic-1" src="{{ url('/') }}/public/img/no-image.jpg">
                                            @endif
                                            @php $imagecount = count($product->productimages); @endphp
                                            @if($imagecount != 0)
                                            @php $no = 1; @endphp
                                            @foreach($product->productimages as $images)
                                            @if($no == 1)
                                            <img class="pic-2" src="{{ url('/') }}/public/storage/product/{{ $images->product_image }}">
                                            @endif
                                            @php $no++; @endphp
                                            @endforeach
                                            @else
                                            <img class="pic-2" src="{{ url('/') }}/public/storage/product/{{ $product->product_image }}">
                                            @endif
                                            </a>
                                            @if($product->flash_deals == 1)
                                            <!-- <ul class="countdown-{{ $product->product_token }}" id="countdown-timer">
                                                <li>
                                                    <span class="days">00</span>
                                                    <p class="days_ref">{{ Helper::translation(2071,$translate) }}</p>
                                                </li>
                                                <li>
                                                    <span class="hours">00</span>
                                                    <p class="hours_ref">{{ Helper::translation(2072,$translate) }}</p>
                                                </li>
                                                <li>
                                                    <span class="minutes">00</span>
                                                    <p class="minutes_ref">{{ Helper::translation(2073,$translate) }}</p>
                                                </li>
                                                <li>
                                                    <span class="seconds last">00</span>
                                                    <p class="seconds_ref">{{ Helper::translation(2074,$translate) }}</p>
                                                </li>
                                            </ul> -->
                                            @endif
                                            <ul class="social">
                                                @if(Auth::guest())
                                                <li><a href="{{ url('/login') }}" data-tip="{{ Helper::translation(2066,$translate) }}"><i class="fa fa-shopping-bag"></i></a></li>
                                                @else
                                                @if(Auth::user()->id != $product->user_id)
                                                <li><a href="{{ url('/wishlist') }}/{{ Auth::user()->id }}/{{ $product->product_token }}" data-tip="{{ Helper::translation(2066,$translate) }}"><i class="fa fa-shopping-bag"></i></a></li>
                                                @endif
                                                @endif
                                                <li><a href="{{ URL::to('/product') }}/{{ $product->product_slug }}" data-tip="{{ Helper::translation(2067,$translate) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                            </div>
                                        <div class="product-content">
                                            <h3 class="title"><a href="{{ URL::to('/product') }}/{{ $product->product_slug }}">{{ $product->product_name }}</a></h3>
                                            @if($product->product_price_type == 'single_price')
                                            <span class="price like">@if($product->product_offer_price != 0)<span class="linethrow">{{ $allsettings->site_currency_symbol }}{{ $product->product_price }}</span>@endif @if($product->product_offer_price != 0)<span class="like">{{ $allsettings->site_currency_symbol }}{{ $product->product_offer_price }}</span>@else<span class="like">{{ $allsettings->site_currency_symbol }}{{ $product->product_price }}</span>@endif</span>
                                         @else
                                         <span class="price like">{{ $allsettings->site_currency_symbol }}{{ number_format($product->product_price_1, 2) }} - {{ $allsettings->site_currency_symbol }}{{ number_format($product->product_price_6, 2) }}</span>
                                        @endif
                                        <a class="add-to-cart" href="{{ URL::to('/product') }}/{{ $product->product_slug }}">{{ Helper::translation(2067,$translate) }}</a>
                                        </div>
                                        <p class="d-none">
                                        @php 
                                        $var=explode(',',$product->product_category);
                                        @endphp
                                        @foreach($var as $row)
                                        <span class="{{ $row }}">{{ $row }}</span>,
                                        @endforeach
                                        @php
                                        $var_two = explode(',',$product->product_attribute);
                                        @endphp
                                        @foreach($var_two as $row_two)
                                        <span class="{{ $row_two }}">{{ $row_two }}</span>,
                                        @endforeach
                                        <span class="{{ $product->product_condition }}">{{ $product->product_condition }}</span>,
                                        <span class="{{ $product->product_type }}">{{ $product->product_type }}</span>,
                                        </p>
                                        </div>
                                    </div>
                                   @php $z++; @endphp      
                            @endforeach
                          </div>
                          <div class="text-right">
                           <div class="turn-page" id="itempager"></div>
                        </div>
              </div>
          </div>
         </div>
         @if($allsettings->shop_ads == 1)
      @if($allsettings->shop_bottom_ads !='')
         <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-2" align="center">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    @php echo html_entity_decode($allsettings->shop_bottom_ads); @endphp
                    <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
       </script>
      </div>
      </div>
      @endif 
      @endif
      </div>
    </main>




    {{--



      <section >
    <img src="{{ url('public/new_assets/images/infinity-pro-shop-image.jpg') }}" style="height: 250px; width: 100% !important">
  </section>
<section class="sectin">
    <div class="container-fluid">
  <div class="row">
  <div class="col-md-3">
             <form action="{{ route('shop') }}" method="post" id="shop_form"  enctype="multipart/form-data">
           {{ csrf_field() }}
             <div class="mt-1 mb-1 pt-1 pb-1">
                 <div class="card shadow-sm bg-white border-0 mb-3 rounded-0">
                    <h5 class="card-header bg-white link-color">{{ Helper::translation(1932,$translate) }}</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12 categorybox">
                        <div class="ctli">
                            @foreach($categories['display'] as $menu)
                            @php 
                            if($translate == 'en'){ $menu_cat = $menu->cat_id;  } else { $menu_cat = $menu->category_page_parent;  } 
                            @endphp
                            <input type="checkbox" name="category[]" value="cat-{{ $menu_cat }}"> {{ $menu->category_name }}<br/>
                               @if(count($menu->subcategory) != 0)
                                  @foreach($menu->subcategory as $sub_category)
                                  @php if($translate == 'en'){ $menu_subcat = $sub_category->subcat_id; } else { $menu_subcat = $sub_category->subcategory_page_parent; } @endphp
                                   <span class="move_subcategory"><input type="checkbox" name="category[]" value="subcat-{{ $menu_subcat }}"> {{ $sub_category->subcategory_name }}<br/></span>
                                  @endforeach
                               @endif
                            @endforeach
                            </div>
                           </div>
                       </div>
                    </div>
                  </div>
                  <div class="card shadow-sm bg-white border-0 mb-3 rounded-0">
                    <h5 class="card-header bg-white link-color">{{ Helper::translation(1934,$translate) }}</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                            <select class="form-control" name="orderby">
                              <option value="asc">{{ Helper::translation(2163,$translate) }}</option>
                              <option value="desc">{{ Helper::translation(2164,$translate) }}</option>
                           </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card shadow-sm bg-white border-0 mb-3 rounded-0">
                    <h5 class="card-header bg-white link-color">{{ Helper::translation(1950,$translate) }}</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <div>
                            <input type="checkbox" name="condition" value="new"> {{ Helper::translation(1951,$translate) }}<br/>
                            <input type="checkbox" name="condition" value="used"> {{ Helper::translation(1952,$translate) }}
                           </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card shadow-sm bg-white border-0 mb-3 rounded-0">
                    <h5 class="card-header bg-white link-color">{{ Helper::translation(1946,$translate) }}</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <div>
                            <input type="checkbox" name="product_type" value="physical"> {{ Helper::translation(2165,$translate) }}<br/>
                            <input type="checkbox" name="product_type" value="external"> {{ Helper::translation(2166,$translate) }}<br/>
                            <input type="checkbox" name="product_type" value="digital"> {{ Helper::translation(2167,$translate) }}<br/>
                           </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  @if(count($attributer['display']) != 0)
                  @foreach($attributer['display'] as $attribute)
                  <div class="card shadow-sm bg-white border-0 mb-3 rounded-0">
                    <h5 class="card-header bg-white link-color">{{ $attribute->attribute_name }}</h5>
                    <div class="card-body">
                      <div class="row">
                      <div class="col-lg-12">
                        <div>
                        @foreach($attribute->newattributevalue as $product_value)
                        @php if($translate == 'en') { $value_id = $product_value->attribute_value_id; } else { $value_id = $product_value->attrivalue_page_parent; } @endphp
                            <input type="checkbox" name="attribute[]" value="{{ $value_id }}"> {{ $product_value->attribute_value }}<br/>
                        @endforeach 
                        </div>   
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                 @endif
                 </div>
                 <div class="input-group-append">
                  <button class="btn button-color btn-block" type="submit">{{ __('Search') }}</button>
                 </div>
                 @if($allsettings->shop_ads == 1)
                 @if($allsettings->shop_sidebar_ads !='')
                 <div class="row">
                        <div class="col-lg-12" align="center">
                          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            @php echo html_entity_decode($allsettings->shop_sidebar_ads); @endphp
                            <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                 </div> 
                 @endif      
                 @endif
                 </form>
            </div>
            
  <main class="col-md-9">

<header class="border-bottom mb-4 pb-3">
    <div class="form-inline">
      <span class="mr-md-auto">32 Items found </span>
      <select class="mr-2 form-control">
        <option>Latest items</option>
        <option>Trending</option>
        <option>Most Popular</option>
        <option>Cheapest</option>
      </select>
      <div class="btn-group">
        <a href="#" class="btn btn-outline-secondary" data-toggle="tooltip" title="" data-original-title="List view"> 
          <i class="fa fa-bars"></i></a>
        <a href="#" class="btn  btn-outline-secondary active" data-toggle="tooltip" title="" data-original-title="Grid view"> 
          <i class="fa fa-th"></i></a>
      </div>
    </div>
</header><!-- sect-heading -->

<div class="row">

    @php $z = 1; @endphp
      @foreach($shop['product'] as $product) 


  <div class="col-md-4">
    <figure class="card card-product-grid">
      <div class="img-wrap"> 
        <span class="badge badge-danger"> NEW </span>

            @if($product->product_image != "")
            <img class="img-fluid" src="{{ url('/') }}/public/storage/product/{{ $product->product_image }}">
            @else
            <img class="img-fluid" src="{{ url('/') }}/public/img/no-image.jpg">
            @endif

            @php $imagecount = count($product->productimages); @endphp
            
            @if($imagecount != 0)
            @php $no = 1; @endphp
            @foreach($product->productimages as $images)
            @if($no == 1)
            <img class="img-fluid" src="{{ url('/') }}/public/storage/product/{{ $images->product_image }}">
            @endif
            @php $no++; @endphp
            @endforeach
            @else
            <img class="img-fluid" src="{{ url('/') }}/public/storage/product/{{ $product->product_image }}">
            @endif
        
        <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
      </div> <!-- img-wrap.// -->
      <figcaption class="info-wrap">
        <div class="fix-height">
          <a href="{{ URL::to('/product') }}/{{ $product->product_slug }}" class="title">{{ $product->product_name }}</a>
          <div class="price-wrap mt-2">
            

            @if($product->product_offer_price != 0)
            <span class="price">
                {{ $allsettings->site_currency_symbol }}{{ $product->product_offer_price }}
            </span>
            @else
            <span class="price">
                {{ $allsettings->site_currency_symbol }}{{ $product->product_price }}
            </span>
            @endif

            
            @if($product->product_offer_price != 0)
                <del class="price-old">{{ $allsettings->site_currency_symbol }}{{ $product->product_price }}</del>
            @endif 

            
          </div> <!-- price-wrap.// -->
        </div>
        <a href="{{ URL::to('/product') }}/{{ $product->product_slug }}" class="btn btn-block btn-primary">Add to cart </a>
      </figcaption>
    </figure>
  </div> <!-- col.// -->

           
           @php $z++; @endphp      
    @endforeach


</div> <!-- row end.// -->


<nav class="mt-4" aria-label="Page navigation sample">
  <ul class="pagination">
    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>

  </main>
  </div>
</div>
   
</section>


--}}



    @include('footer')
    @include('javascript')
    </body>
</html>
@else
@include('503')
@endif