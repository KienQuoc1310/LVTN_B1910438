@extends("app")

@section('head_title', $restaurant->restaurant_name.' Thực Đơn' .' | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")

  <div class="sub-banner" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image')) }}) no-repeat center top;">
    <div class="overlay">
      <div class="container">
        <div id="sub_content" class="animated zoomIn">
    <div class="col-md-2 col-sm-3">
      <div id="thumb"><img src="{{ URL::asset('upload/restaurants/'.$restaurant->restaurant_logo.'-b.jpg') }}" alt="{{ $restaurant->restaurant_name }}"></div>
    </div>  
    <div class="col-md-10 col-sm-9">  
      <h1>{{ $restaurant->restaurant_name }}</h1>
      <div class="sub_cont_rt">{{ $restaurant->type }}</div>
      <div class="sub_cont_lt"><i class="fa fa-map-marker"></i>{{$restaurant->restaurant_address}}</div>
      <div class="rating"> 
         @for($x = 0; $x < 5; $x++)
                    
                @if($x < $restaurant->review_avg)
                  <i class="fa fa-star"></i>
                @else
                  <i class="fa fa-star fa fa-star-o"></i>
                @endif
               
                @endfor 
                (<small><a href="{{URL::to('restaurants/'.$restaurant->restaurant_slug)}}"> Đọc {{\App\Review::getTotalReview($restaurant->id)}} Đánh Giá </a></small>)
      </div>
      <div class="rstl_list_btn"><a href="{{URL::to('restaurants/'.$restaurant->restaurant_slug)}}">Xem Nhà Hàng</a></div>
      </div>
    </div>
      </div>
    </div>
  </div>
  
  <div class="restaurant_list_detail">
    <div class="container">
      <div class="row"> 
        <div class="col-md-9 col-sm-7 col-xs-12">         
      <div id="main_menu" class="box_style_2">
        <h2 class="inner">Danh Sách Món</h2>
         @foreach(\App\Categories::where('restaurant_id',$restaurant->id)->orderBy('category_name')->get() as $n=>$cat)
        <h3 id="{{$cat->category_name}}" class="nomargin_top">{{$cat->category_name}}</h3>
        <table class="table table-striped cart-list">
          <thead>
          <tr>
            <th>Tên</th>
            <th>Giá</th>
            <th>Đặt Hàng</th>
          </tr>
          </thead>
          <tbody>
            @foreach(\App\Menu::where('menu_cat',$cat->id)->orderBy('menu_name')->get() as $menu_item)
          <tr>
            <td>

              <div class="rstl_img"><a href="#menu_{{$menu_item->id}}">
                @if($menu_item->menu_image)
                <img src="{{ URL::asset('upload/menu/'.$menu_item->menu_image.'-s.jpg') }}" />
                @else
                <img src="{{ URL::asset('upload/menu_img_s.png') }}" />
                @endif
              </a></div>
                        <div id="menu_{{$menu_item->id}}" class="modalDialog">
                          <div>
                            <a href="#close" title="Close" class="close">X</a>
                            <h2>{{$menu_item->menu_name}}</h2>
                              @if($menu_item->menu_image)
                              <img src="{{ URL::asset('upload/menu/'.$menu_item->menu_image.'-b.jpg') }}" />
                               @else
                              <img src="{{ URL::asset('upload/menu_img_s.png') }}" />
                              @endif 
                          </div>
                        </div>
                        <div class="rstl_img_contant">
                        <h5>{{$menu_item->menu_name}}</h5>
                        <p>{{$menu_item->description}}</p>
                        </div>

              
            </td>
            <td><strong>{{$menu_item->price}} {{getcong('currency_symbol')}}</strong></td>
            <td class="options">
                @if(Auth::check())

                    <a href="{{URL::to('add_item/'.$menu_item->id)}}"><i class="fa fa-plus-square-o"></i></a>
                  
                  @else
                    
                    <a href="{{URL::to('login')}}"><i class="fa fa-plus-square-o"></i></a>

                  @endif 
               
          </tr>
          @endforeach
          
          </tbody>
        </table>
        <hr>
        @endforeach

         
        </div>
           </div>

           
          @include("_particles.sidebar")

          <hr>
          <br>
          <div class="col-md-6 d-flex">
            <button>
          <iframe src="{{$restaurant->restaurant_mapurl}}" 
             width="844" 
             height="300" 
             style="border:0;" 
             allowfullscreen="" 
             loading="lazy" 
             referrerpolicy="no-referrer-when-downgrade">
          </iframe>        
      </button>        
          </div>
       
      </div>
    </div>
  </div>


@endsection
