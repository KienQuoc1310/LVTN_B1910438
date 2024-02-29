@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> {{ isset($user->id) ? 'Edit: User' : 'Thêm Người Dùng' }}</h2>
		
		<a href="{{ URL::to('admin/users') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i>Quay Lại</a>
	  
	</div>
	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
	 @if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif
   
   	<div class="panel panel-default">
            <div class="panel-body">
                {!! Form::open(array('url' => array('admin/users/adduser'),'class'=>'form-horizontal padding-15','name'=>'user_form','id'=>'user_form','role'=>'form','enctype' => 'multipart/form-data')) !!} 
                <input type="hidden" name="id" value="{{ isset($user->id) ? $user->id : null }}">
                  
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Họ</label>
                    <div class="col-sm-9">
                        <input type="text" name="first_name" value="{{ isset($user->first_name) ? $user->first_name : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Tên</label>
                    <div class="col-sm-9">
                        <input type="text" name="last_name" value="{{ isset($user->last_name) ? $user->last_name : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" value="{{ isset($user->email) ? $user->email : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Mật Khẩu</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" value="" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Số Điện Thoại</label>
                    <div class="col-sm-9">
                        <input type="text" name="mobile" value="{{ isset($user->mobile) ? $user->mobile : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Thành Phố</label>
                    <div class="col-sm-9">
                        <input type="text" name="city" value="{{ isset($user->city) ? $user->city : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Mã Bưu Điện</label>
                    <div class="col-sm-9">
                        <input type="text" name="postal_code" value="{{ isset($user->postal_code) ? $user->postal_code : null }}" class="form-control">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Địa Chỉ</label>
                    <div class="col-sm-9">
                        
                        <textarea name="address" cols="30" rows="5" class="form-control">{{ isset($user->address) ? $user->address : null }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Loại Người Dùng</label>
                    <div class="col-sm-4">
                        <select id="basic" name="usertype" class="selectpicker show-tick form-control">
                               @if(isset($user->usertype))  
                                    <option value="Owner" @if($user->usertype=='Owner') selected @endif >Owner</option>
                                    <option value="User" @if($user->usertype=='User') selected @endif >User</option>
                                     
                                @else

                                    <option value="Owner">Owner</option>
                                    <option value="User">User</option> 
                                
                                @endif                          
                            
                        </select>
                    </div>
                </div>                  
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">{{ isset($user->name) ? 'Chỉnh Sửa Người Dùng' : 'Thêm Người Dùng' }}</button>
                         
                    </div>
                </div>
                
                {!! Form::close() !!} 
            </div>
        </div>
   
    
</div>

@endsection