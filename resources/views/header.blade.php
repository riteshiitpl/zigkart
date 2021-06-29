     <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-3 brandname">
                <a class="navbar-brand" href="{{url('/') }}">
                    <img src="{{ url('public/new_assets/images/Woomarketplace_white.jpg') }}" style="width: 170px; height: 72px;"></a>
            </div>
            <div class="col-sm-6" style="float: left;    padding-left: 62px;margin-top: -7px;">
            <form action="" class="search-form" style="margin-top: 27px;
                margin-left: -186px;
                width: 100%;">
                    <div class="form-group has-feedback">
                    <label for="search" class="sr-only">Search</label>
                    
                    <input type="text" class="form-control" id="search" placeholder=" Search" style="font-family:Arial, FontAwesome">
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                  </div>
            </form>
        </div>
        <div class="col-sm-3" style="float: right;">
            <ul class="rightmenu">
                @if(Auth::guest())
                    <li><a href="{{ url('register') }}">Register</a></li>
                    <li><a href="{{ url('login') }}">Login</a></li>
                @else 
                    <li><a href="{{ url('/my-profile') }}">{{ Helper::translation(2042,$translate) }}</a></li>
                    <li><a href="{{ url('logout') }}">Logout</a></li>
                @endif
                
                <li class=""><a href="{{ url('/cart') }}" class=""><i class="fa fa-shopping-cart"></i> {{ Helper::translation(1983,$translate) }} <span class="cart-badge">{{ $cart_count }}</span></a></li>
                        

            <!-- <li><a href="#" class="cntme">Contact us</a></li> -->
            </ul>
        </div>
        </div>  
        </div>
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile_nav" aria-controls="mobile_nav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span> 
        </button>
        <div class="collapse navbar-collapse" id="mobile_nav">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 float-md-right">
        </ul>
        <form action="" class="search-formmb">
            <div class="form-group has-feedback">
            <label for="search" class="sr-only">Search</label>
            
            <input type="text" class="form-control" id="search" placeholder=" Search" style="font-family:Arial, FontAwesome">
              <span class="glyphicon glyphicon-search form-control-feedback"></span>
          </div>
        </form>


        <ul class="navbar-nav navbar-light">
            @foreach($categories['display'] as $key => $menu)
                <li class="nav-item dropdown megamenu-li dmenu"><!-- 
                    <a class="nav-link dropdown-toggle" href="{{ URL::to('/shop/category') }}/{{ $menu->category_slug }}" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $menu->category_name }}</a> -->
                    <a class="nav-link" href="{{ URL::to('/shop/category') }}/{{ $menu->category_slug }}" id="dropdown0{{$key}}" >{{ $menu->category_name }}</a>
                    @if(count($menu->subcategory) != 0)
                    <div class="dropdown-menu megamenu sm-menu border-top" aria-labelledby="dropdown0{{$key}}">
                        <div class="row">
                            @if(count($menu->subcategory) != 0)
                                @foreach($menu->subcategory as $sub_category)  
                                    <div class="col-sm-6 col-lg-3 border-right mb-4">
                                        <h6>{{ $sub_category->subcategory_name }}</h6>
                                        <a class="dropdown-item" href="{{ URL::to('/shop/subcategory') }}/{{$sub_category->subcategory_slug}}">
                                            <i class="fab fa-magento"></i> {{ $sub_category->subcategory_name }}
                                        </a>
                                    </div>
                                @endforeach    
                            @endif
                            
                        </div>
                    </div>
                   @endif
                </li>
            @endforeach

   

           <li class="nav-item">
            <ul class="rightmenumb">
                <li><a href="#">Register</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#" class="cntme">Contact us</a></li>
              </ul>
          </li>
        </ul>

        </div>
    </div>
</nav>
        </div>