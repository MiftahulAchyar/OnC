@include("header")

<div  class="chapter">
	<div id="chapter-title">
		<h1 class="white ui header">			
			{{$course->name}}
		</h1>
	</div>

	<div class="ui main container section-holder">
		<div class="ui special cards">
			@foreach($course->chapters as $chapter)
			<div class="ui card">
				<div class="content">
					<div class="header">{{$chapter->name}}</div>
				</div>
				<div class="extra content">
					<a class="ui button" href="{{ url('/'.$course->slug.'/'.$chapter->slug)}}">open</a>
				</div>
			</div>
			@endforeach
		</div>


	</div> 	

	
</div>
</div>
<!-- <script src="{{  URL::asset('js/app.js') }}"></script> -->
@include("footer")
<style>
	body{
		background:#eeeeee
	}
</style>
</body>    
</html>