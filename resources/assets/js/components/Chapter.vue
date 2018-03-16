<template>
<div  class="chapter">
	<div id="chapter-title">
		<h1 class="white ui header">			
			<div class="sub header"><a href="/{{chapter.course.slug }}">< Kembali ke {{chapter.course["name"]}}</a></div>
			{{chapter.name}}
		</h1>
	</div>

    
 <div class="ui vertical stripe segment"  style="padding-top: 2em">
    <div class="ui aligned stackable grid container">
      
      <div class="row">
        <div class="four wide column">
        <!-- <div class="ui column"> -->
          <!-- MENU -->
          <div id="left-menu" class="ui vertical menu bound sticky " >
          	
            <div class="item" id="sess-title">
              <h4>Sessions</h4>
            </div>
            <div class="item" id="outer-menu" style="max-height: 300px; overflow-y: auto; padding-top: 0">
                <!-- Hanya batas atas -->
               <!--  <div class="item">
                  <div class="header"></div>
                </div> -->
                <!-- List Sessions -->
              @foreach($chapter->sections as $section)
                <div class="item">
                  <div class="header"><a class="item"><i class="bookmark icon"></i> {{$section->name}}</a></div>
<!--                   <div class="header">
                    <a class="item"><i class="bookmark iconicon"></i> {{$section->name}}</a>
                  </div>                   -->
                </div>
              @endforeach
                
            </div>
          </div>
          <!-- /  menu -->
        </div>
        <div class="eleven wide right floated column" id="content-disini">
        <!-- <div class="ui column" id="content-disini"> -->
         <!-- Looping session -->
          @foreach($chapter->sections as $section)
            <div class="ui dividing header">
              <h3>{{$section->name}}</h3>
            </div>
            <div class="ui two column grid" id="Session-1">
              <!-- Learn -->
              <div class="column" >
                <p class="ui header">Learn</p>
                <div class="ui large middle aligned selection list animated">
                  @foreach($section->lessons as $lesson)  
                    <a href="{{ url('/'.$chapter->course->slug.'/'.$chapter->slug.'/'.$section->slug.'#/'.$lesson->lessonType->code.'/'.$lesson->slug) }}" class="item learn-item">
                      <i class="book icon"></i>
                      <!-- <img class="ui avatar image" src="/images/avatar/small/helen.jpg"> -->
                      <div class="content">
                        <div class="header">{{ $lesson->title}}</div>
                      </div>
                    </a>
                  @endforeach
                </div>
              </div>
							<!-- QUIZ -->
							<div class="column" >
								<p class="ui header">Quiz</p>
                <div class="ui large middle aligned selection list animated">
                  
                    <a href="#" class="item learn-item">
											<i class="puzzle icon"></i>
											<div class="content">
												<div class="header">Test quiz item</div>
												<div class="description">7 questions.</div>
											</div>
										</a>
                  
                </div>
							</div>
            </div>
          @endforeach
          
        </div>
      </div>
      
    </div>
  </div>
    
<!--  MS ANTOK   -->
</div>

<!-- 	POPUP DI SINI -->
	<div class="ui standard test modal transition hidden" style="margin-top: -234px;">
    <div class="header">
      Title here
    </div>
    <div class="image content">
      <!-- <div class="ui medium image">
        <img src="./Modal _ Semantic UI_files/rachel.png">
      </div> -->
      <div class="description">
        <div class="ui header">Content header</div>
        <p>We've found the following <a href="https://www.gravatar.com/" target="_blank">gravatar</a> image associated with your e-mail address.</p>
        <p>Is it okay to use this photo?</p>
      </div>
    </div>
    <div class="actions">
      <div class="ui black deny button">
        Close
      </div>
      <div class="ui positive right labeled icon button">
        Next page
        <!-- <i class="checkmark icon"></i> -->
      </div>
    </div>
  </div>
  
</template>

<script>
  export default {
  }
</script>