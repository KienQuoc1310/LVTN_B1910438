<div id="banner">
  <section>
  <div id="subheader">
    <div id="sub_content" class="animated zoomIn">
      <h1>Tìm Kiếm Và Đặt Những Món Ăn Mà Bạn Thích!</h1>
      <div class="container-4">
        {!! Form::open(array('url' => 'restaurants/search','class'=>'','id'=>'search','role'=>'form')) !!} 
        <input type="search" placeholder="Tên hoặc địa chỉ của nhà hàng..." name="search_keyword" id="searchh">
          <span class="microphone">
            <i class="fa fa-microphone"> </i>
            <span class="recording-icon"> </span>
          </span>
          <button class="icon" type="submit"><i class="fa fa-search"></i></button>
        
           
          
        {!! Form::close() !!} 
    </div>
    </div>
  </div>

  <div class="hidden-xs" id="count">
    <ul>
      <li><span class="number">{{getcong('total_restaurant')}}</span>Nhà Hàng</li>
      <li><span class="number">{{getcong('total_people_served')}}</span>Số Người Đã Phục Vụ</li>
      <li><span class="number">{{getcong('total_registered_users')}}</span>Số Thành Viên Đã Đăng Ký</li>
    </ul>
  </div>
  </section>
    <div class="flex-banner">
      <ul class="slides">
        <li><img src="{{ URL::asset('upload/'.getcong('home_slide_image1'))}}" alt=""></li>
        <li><img src="{{ URL::asset('upload/'.getcong('home_slide_image2'))}}" alt=""></li>
        <li><img src="{{ URL::asset('upload/'.getcong('home_slide_image3'))}}" alt=""></li>
         
      </ul>
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