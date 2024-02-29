@extends("app")

@section('head_title', 'Nhà Hàng' .' | '.getcong('site_name') )

@section('head_url', Request::url())



@section("content")

 
 <div class="sub-banner" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image')) }}) no-repeat center top;">
    <div class="overlay">
      <div class="container">
        <h1>Nhà Hàng</h1>
      </div>
      <div class="container-4">
        {!! Form::open(array('url' => 'restaurants/search','class'=>'','id'=>'search','role'=>'form')) !!} 
      
        <input type="search" placeholder="Tên hoặc địa chỉ của nhà hàng..." name="search_keyword" id="searchh">
          <span class="microphone" style="width: 40px;">
            <i class="fa fa-microphone"> </i>
            <span class="recording-icon"> </span>
          </span>
          <button class="icon" type="submit"><i class="fa fa-search"></i></button>
        
          
        {!! Form::close() !!} 
    </div>
    </div>
   
  </div>

 <div class="restaurant_list_detail">

    <div class="container">
   
   

      <div class="row">
    
        
        @foreach($restaurants as $i => $restaurant)
        <div class="fix">
        <div class="col-md-4 col-sm-4 col-xs-5">      
          <div data-wow-delay="0.{{$i}}s" class="strip_list wow fadeIn animated" style="visibility: visible; animation-delay: 0s; animation-name: fadeIn;">
         
            <div class="row">         
          
            <div class="col-md-12 col-sm-12">
              <div class="desc">
                <div class="thumb_strip"> 
                  <a href="{{URL::to('restaurants/menu/'.$restaurant->restaurant_slug)}}">

                    <img src="{{ URL::asset('upload/restaurants/'.$restaurant->restaurant_logo.'-s.jpg') }}" alt="{{ $restaurant->restaurant_name }}">

                  </a>  
                </div>         
              <h3>{{ $restaurant->restaurant_name }}</h3>
              <div class="type"> {{$restaurant->type}} </div>
              <div class="location">{{$restaurant->restaurant_address}}  </div>
              @if ($restaurant->restaurant_distance = '70') 
              @endif
              <div class="distance">{{$restaurant->restaurant_distance}}</div>
            


              <div class="rating"> 
                @for($x = 0; $x < 5; $x++)
                    
                @if($x < $restaurant->review_avg)
                  <i class="fa fa-star"></i>
                @else
                  <i class="fa fa-star fa fa-star-o"></i>
                @endif
               
                @endfor
                (<small><a href="{{URL::to('restaurants/'.$restaurant->restaurant_slug)}}">Đọc {{\App\Review::getTotalReview($restaurant->id)}} Đánh Giá</a></small>)
              </div>

               
              </div>
            </div>  
            <div class="col-md-3 col-sm-12">
              <div class="go_to">
              <div> <a class="btn_1" href="{{URL::to('restaurants/menu/'.$restaurant->restaurant_slug)}}">Xem Thực Đơn</a> </div>
              </div>
            </div>

            <!-- <div class="col-md-3 col-sm-12">
              <div class="go_to">
              <div> <a class="btn_1" href="{{URL::to('restaurants/near/'.$restaurant->restaurant_slug)}}">Gần Đây</a> </div>
              </div>
            </div> -->
            
            </div>

            </div>
            
          <!-- </div> -->
       
        
         
          @include('_particles.pagination', ['paginator' => $restaurants]) 
       
          </div>
        
          
          </div>
        
          @endforeach
         
        
     
       

          <!-- <p id="demo">Kích vào button để lấy vị trí.</p>

          <button onclick="getLocation()">Lấy vị trí</button>
          <button onclick="showlt()">Lấy vị trí</button>

          <div id="demo"></div> -->
          <div>
              
          </div>



      </div>
    </div>
  </div>

  
      <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
     
      <script src="https://cdn.jsdelivr.net/npm/graphhopper-js-api-client/dist/graphhopper-client.js"></script>

      <script>
      
        var x = document.getElementById("demo");
        var latitude = 0  , longitude = 0;

    function getLocation(){
        if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
        x.innerHTML = "Geolocation không được hỗ trợ bởi trình duyệt này.";
        }
      }
        
  

        function showPosition(position) {
         
          latitude = position.coords.latitude ;
          longitude = position.coords.longitude;
    
          var ghRouting = new GraphHopper.Routing(
            { key: "eb35e186-ae1b-49d3-bb49-e83749e57d60"},
            { vehicle: "car", elevation: false });


            var point3 = (this.longitude)/2;
            var point5 = {{ ($restaurant->restaurant_maplong)/2 + 0.01}};
            var point4 = {{$restaurant->restaurant_maplat}};
            var point1 = [this.latitude.toFixed(2),point3.toFixed(2)]; 
            console.log(point1);
            var point2 = [point4.toFixed(2), point5.toFixed(2)];  
            console.log(point2);

          ghRouting.doRequest({points:[point1,point2]})
            .then(function(json) {
              var distance = json.paths[0].distance;
              console.log('Distance: ' + distance + ' meters');
            
              restaurants_distance(70)
              // @set($restaurant->restaurant_distance , 70 ) 
              

              console.log("kkk: " + {{$restaurant->restaurant_distance}});
              console.log("hhh: "+  distance);
                    
              x.innerHTML = distance; 
              x.innerHTML = "vd: " + this.latitude +
                "<br>Kd: " + this.longitude;
              console.log(json);
            
            })
            .catch(function(err) {
              console.error(err.message);
              });
          
          };

        function showError(error) {
        switch(error.code) {
        case error.PERMISSION_DENIED:
        x.innerHTML = "Người sử dụng từ chối cho xác định vị trí."
        break;
        case error.POSITION_UNAVAILABLE:
        x.innerHTML = "Thông tin vị trí không có sẵn."
        break;
        case error.TIMEOUT:
        x.innerHTML = "Yêu cầu vị trí người dùng vượt quá thời gian quy định."
        break;
        case error.UNKNOWN_ERROR:
        x.innerHTML = "Một lỗi xảy ra không rõ nguyên nhân."
        break;
        }
        }

     

          // };


      </script>

  <script>
      var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
      var SpeechGrammarList = window.SpeechGrammarList || window.webkitSpeechGrammarList;

      var grammar = '#JSGF V1.0';

      var recognition = new SpeechRecognition();
      var speechRecognitionList = new SpeechGrammarList();
      speechRecognitionList.addFromString(grammar, 1);
      recognition.grammars = speechRecognitionList;
      recognition.interimResults = false;

      recognition.onresult = function(event) {
          var lastResult = event.results.length -1;
          var content = event.results[lastResult][0].transcript;
          console.log(content);
          document.getElementById('searchh').value = content;
          document.getElementById('search').submit();
      }

      recognition.onspeechend = function() {
        recognition.stop();
      }

      recognition.onerror = function(event) {
        console.log(event.error);
        const microphone = document.querySelector('.microphone');
        microphone.classList.remove('recording');
      }

      document.querySelector('.microphone').addEventListener('click', function(){
        recognition.start();
        const microphone = document.querySelector('.microphone');
        microphone.classList.add('recording');
      });
  </script>

@endsection
