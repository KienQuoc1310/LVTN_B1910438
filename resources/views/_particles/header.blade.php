  <header class="sticky">

    <div class="container">
      <nav class="animenu">
      <button class="animenu_toggle"> 
         <span class="animenu_toggle_bar"></span> 
         <span class="animenu_toggle_bar"></span> 
         <span class="animenu_toggle_bar"></span> 
      </button>
      <ul class="animenu_nav">
            <li> <a href="{{ URL::to('/') }}">Trang Chủ</a></li>
            <li><a href="{{URL::to('restaurants')}}">Nhà Hàng</a></li>

            @if(Auth::check() and Auth::user()->usertype=='User')

             <li> <a href="javascript:void(0);">Tài Khoản<i class="icon-down-open-mini"></i></a>
              <ul class="animenu_nav_child">
                <li><a href="{{ URL::to('profile') }}">Chỉnh Sửa Thông Tin</a></li>
                <li><a href="{{ URL::to('change_pass') }}">Thay Đổi Mật Khẩu</a></li>
                <li><a href="{{URL::to('myorder')}}">Đơn Hàng Của Bạn</a></li>
                <li><a href="{{ URL::to('logout') }}">Đăng Xuất</a></li>                
              </ul>
            </li>
            @elseif(Auth::check() and Auth::user()->usertype=='Owner')
              <li> <a href="javascript:void(0);">Tài Khoản Của Bạn<i class="icon-down-open-mini"></i></a>
              <ul class="animenu_nav_child">
                <li><a href="{{ URL::to('admin/dashboard') }}">Bảng Điều Khiển</a></li>
                <li><a href="{{ URL::to('logout') }}">Đăng Xuất</a></li>                
              </ul>
            </li>
            @elseif(Auth::check() and Auth::user()->usertype=='Admin')
              <li> <a href="javascript:void(0);">Tài Khoản Của Bạn<i class="icon-down-open-mini"></i></a>
              <ul class="animenu_nav_child">
                <li><a href="{{ URL::to('admin/dashboard') }}">Bảng Điều Khiển</a></li>
                <li><a href="{{ URL::to('logout') }}">Đăng Xuất</a></li>                
              </ul>
            </li>

              
            @else
 
            <li><a href="{{ URL::to('login') }}">Đăng Nhập</a></li>
            <li><a href="{{ URL::to('register') }}">Đăng Ký </a></li>

            @endif

            <!-- <li><a href="{{ URL::to('about') }}">Giới Thiệu</a></li>
            <li><a href="{{ URL::to('contact') }}">Liên Hệ</a></li>               -->
                      <li> <a href="javascript:void(0);">Loại <i class="icon-down-open-mini"></i> </a>
                      
                      <ul class="animenu_nav_child">
                      <li>
                          <a href="{{URL::to('restaurants/')}}">Tất Cả </i></a>
                      </li>
                      
                          @foreach(\App\Types::orderBy('type')->get() as $type)
                          <li>
                          <a href="{{URL::to('restaurants/type/'.$type->id)}}">{{$type->type}}</a>
                          </li>
                          @endforeach
                      </ul>

                      </li>

             
          </ul>
       
       
    </nav>
    </div>
  </header>
   