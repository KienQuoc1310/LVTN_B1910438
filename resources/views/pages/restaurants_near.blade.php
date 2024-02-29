@extends("app")

@section('head_title', 'Nhà Hàng Gần Đây' .' | '.getcong('site_name') )

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
 @include("_particles.topbar")
    <div class="container">
      <div class="row"> 
      @foreach($restaurants as $i => $restaurant)
      <div class="fix">
        <div class="col-md-4 col-sm-7 col-xs-12">         
        
          
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

              <div class="rating"> 
                @for($x = 0; $x < 5; $x++)
                    
                @if($x < $restaurant->review_avg)
                  <i class="fa fa-star"></i>
                @else
                  <i class="fa fa-star fa fa-star-o"></i>
                @endif
               
                @endfor
                (<small><a href="{{URL::to('restaurants/'.$restaurant->restaurant_slug)}}">Xem {{\App\Review::getTotalReview($restaurant->id)}} Đánh Giá</a></small>)
              </div>

               
              </div>
            </div>  
            <div class="col-md-3 col-sm-12">
              <div class="go_to">
              <div> <a class="btn_1" href="{{URL::to('restaurants/menu/'.$restaurant->restaurant_slug)}}">Xem Thực Đơn</a> </div>
              </div>
            </div>
            </div>
            </div>
          </div>

          @endforeach
      
          
                        
           </div>
          
          

      </div>
    </div>
  </div>

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
