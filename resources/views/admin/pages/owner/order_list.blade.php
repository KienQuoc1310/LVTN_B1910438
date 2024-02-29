@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		
		
		<h2>Danh Sách Đơn Hàng</h2>
         
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif
     
<div class="panel panel-default panel-shadow">
    <div class="panel-body">
         
        <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Ngày</th>
                <th>Tên Khách Hàng</th>
                <th>Số Điện Thoại</th>
                <th>Email</th>
                <th>Địa Chỉ</th>
                <th>Tên Thực Đơn</th>
                <th>Số Lượng</th>
                <th>Giá</th>
                <th>Tổng Giá</th>
                <th>Trạng Thái</th>                           
                <th class="text-center width-100">Trạng Thái</th>
            </tr>
            </thead>

            <tbody>
            @foreach($order_list as $i => $order)
            <tr>
                <td>{{ date('m-d-Y',$order->created_date)}}</td>
                <td>{{ \App\User::getUserFullname($order->user_id) }}</td>
                <td>{{ \App\User::getUserInfo($order->user_id)->mobile }}</td>
                <td>{{ \App\User::getUserInfo($order->user_id)->email }}</td>
                <td>{{ \App\User::getUserInfo($order->user_id)->address }}</td>
                <td>{{ $order->item_name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{getcong('currency_symbol')}}{{ $order->item_price }}</td>
                <td>{{getcong('currency_symbol')}}{{ $order->quantity*$order->item_price }}</td>
                <td>{{ $order->status }}</td>
                <td class="text-center">
                <div class="btn-group">
                                <button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Thao Tác<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu"> 
                                    <li><a href="{{ url('admin/orderlist/'.$order->id.'/Pending') }}"><i class="md md-lock"></i>Chờ Thanh Toán</a></li>
                                    <li><a href="{{ url('admin/orderlist/'.$order->id.'/Processing') }}"><i class="md md-loop"></i> Đang Xử Lý</a></li>
                                    <li><a href="{{ url('admin/orderlist/'.$order->id.'/Completed') }}"><i class="md md-done"></i> Hoàn Thành</a></li>
                                    <li><a href="{{ url('admin/orderlist/'.$order->id.'/Cancel') }}"><i class="md md-cancel"></i> Hủy</a></li>
                                    <li><a href="{{ url('admin/orderlist/'.$order->id) }}"><i class="md md-delete"></i> Xóa</a></li>
                                </ul>
                            </div> 
                
            </td>
                
                 
            </tr>
           @endforeach
             
            </tbody>
        </table>
         
    </div>
    <div class="clearfix"></div>
</div>

</div>

@endsection