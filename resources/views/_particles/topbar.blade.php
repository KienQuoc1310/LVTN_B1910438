

<div class="col-md-12 col-sm-5 col-xs-12 ">   
    
    <div class="col-md-9 col-sm-5 col-xs-12  fix"> 
    
        <div class="col-md-3">
       
            <div class="go_to">
                <div> 
                
                </div>
            </div>
       
        </div>
      
        <div class="col-md-3">
            <h4><b>Đã Lưu</b></h4>
        </div>

    </div>

    <div class="col-md-2 fix">

        <div id="new_cart_box" class="categories">
            <ul class="animenu_nav">
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
        </div>  

    </div>
    
   
</div>

