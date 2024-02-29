<div class="col-md-3 col-sm-5 col-xs-12 fix">   

      <div id="cart_box">
      <h3>Đơn Hàng Của Bạn <i class="fa fa-shopping-cart pull-right"></i></h3>
      <table class="table table_summary">
      <tbody>
      </tbody>
      </table>  
      @foreach(\App\Cart::where('user_id',Auth::id())->orderBy('id')->get() as $n=>$cart_item)
            <table class="table table_summary">
              <tbody>
              <tr>
                <td><a href="{{URL::to('delete_item/'.$cart_item->id)}}" class="remove_item"><i class="fa fa-minus-circle"></i></a> <strong>{{$cart_item->quantity}}x</strong> {{$cart_item->item_name}} </td>
                <td><strong class="pull-right">{{$cart_item->item_price}} {{getcong('currency_symbol')}}</strong></td>
              </tr>
             </tbody>
            </table> 
      @endforeach    
        
      <hr>
      @if(DB::table('cart')->where('user_id', Auth::id())->sum('item_price')>0)
      <table class="table table_summary">
        <tbody>
        <tr>
          <td class="total"> Tổng <span class="pull-right">{{$price = DB::table('cart')
                ->where('user_id', Auth::id())
                ->sum('item_price')}} {{getcong('currency_symbol')}}</span></td>
        </tr>
        </tbody>
      </table>
      <hr>
          <a class="btn_full" href="{{URL::to('order_details')}}">Đặt Hàng Ngay</a>  
          @else
            <a class="btn_full" href="#0">Xóa Giỏ Hàng</a>  
          @endif
    </div>   
  



        <!-- <div id="cart_box" class="categories">
        <ul class="animenu_nav">
            <li> <a href="javascript:void(0);">Loại <i class="icon-down-open-mini"> </i></a>
             
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
          </div>   -->

          
    
</div>