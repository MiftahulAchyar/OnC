@include("header")
<div  class="chapter">
	<div id="chapter-title">
		<h1 class="white ui header">			
			<div class="sub header"><a href="{{ url('/'.$chapter->course->slug) }}">< Kembali ke {{$chapter->course["name"]}}</a></div>
			{{$chapter->name}}
		</h1>
	</div>

	<div class="ui main container section-holder">
		<div class="ui special cards">
			@foreach($chapter->sections as $section)
			<div class="ui card">
				<div class="content">
					<div class="header">{{$section->name}}</div>
				</div>
				<div class="content">
					<h4 class="ui sub header">{{$section->description}}</h4>
					<div class="ui small feed">
						@foreach($section->lessons as $lesson)
						<div class="event">
							<div class="content">
								<div class="summary">
									<a href="{{ url('/'.$chapter->course->slug.'/'.$chapter->slug.'/'.$section->slug.'#/'.$lesson->lessonType->code.'/'.$lesson->slug) }}">{{ $lesson->title}}</a> 
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="extra content">
					<a class="ui button" href="{{ url('/'.$chapter->course->slug.'/'.$chapter->slug.'/'.$section->slug.'#')}}">Get Started!</a>
				</div>
			</div>
			@endforeach
		</div>


	</div> 	

	
</div>

<script src="{{  URL::asset('js/app.js') }}"></script>
</body>    
</html>