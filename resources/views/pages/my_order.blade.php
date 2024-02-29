@extends("app")

@section('head_title', 'Đơn Hàng Của Bạn' .' | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")
 
<div class="sub-banner" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image')) }}) no-repeat center top;">
    <div class="overlay">
      <div class="container">
        <h1>Đơn Hàng Của Bạn</h1>
      </div>
    </div>
  </div>
 
 <div class="white_for_login">
    <div class="container margin_60">
      <div class="col-md-offset-2 col-md-9">                
        <div class="box_style_2">
      <h2 class="inner">Danh Sách Đơn Hàng</h2>
      <table class="table table-striped nomargin">
      <tbody>
        <tr>
        <th>Ngày</th>
        <th>Nhà Hàng</th>
        <th>Tên Món</th>
        <th>Số Lượng </th>
        <th>Giá Món</th>
        <th>Tổng Giá</th>
        <th>Tình Trạng</th>
        <th>Thao Tác</th>
         
        </tr>
        @foreach($order_list as $order_item)
                 
                <tr>
                <td>{{date('m-d-Y',$order_item->created_date)}}</td> 
                <td><a href="{{ url('restaurants/'.\App\Restaurants::getRestaurantsInfo($order_item->restaurant_id)->restaurant_slug) }}" class="text-regular">{{ \App\Restaurants::getRestaurantsInfo($order_item->restaurant_id)->restaurant_name }}</a>
                </td> 
                <td>{{$order_item->item_name}} </td>
                <td><strong class="">{{$order_item->quantity}}</strong></td>
                <td><strong class="">{{ \App\Menu::getMenunfo($order_item->item_id)->price }} {{getcong('currency_symbol')}}</strong></td>
                <td><strong class="">{{$order_item->item_price}} {{getcong('currency_symbol')}}</strong></td>
                <td><strong class="">{{$order_item->status}}</strong></td>
                @if($order_item->status!='Cancel' and $order_item->status!='Completed')

                <td><a href="{{URL::to('cancel_order/'.$order_item->id)}}" class=""><strong>Hủy </strong></a></td>
                @else
                 
                @endif
              </tr>
       @endforeach
        
        
         
      </tbody>
      </table>
      <br>
    </div>

      </div>
    </div>
  </div>

@endsection
