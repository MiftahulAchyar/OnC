@include("admin/header")
<div id="app" class="">
	<div id="maincontent" class="ui grid ">
		<div class="ui container">
			<div class="fourteen wide column">
			
				<p><a href="{{url('admin/courses/'.$lesson->section->chapter->course->id)}}">{{$lesson->section->chapter->course->name}}</a> / <a href="{{url('admin/sections/'.$lesson->section->id)}}">{{$lesson->section->name}}</a></p>
				<h2>Buat Materi Baru</h2>
				<br>
				@if ($errors->any())
				<div class="alert alert-danger">
					
					@foreach ($errors->all() as $error)				
					<div class="ui error message">
						<div class="header">Terjadi Kesalahan</div>
						<p>{{ $error }}</p>
					</div>
					@endforeach
				</div>
				<br>
				@endif
				<form class="ui form dropzone" method="POST" action="{{ url('admin/lessons') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="section_id" value="{{$lesson->section->id}}">
				<div class="required field">
					<label>Judul Materi :</label>
					<input type="text" name="title" placeholder="Judul" required>
				</div>

				<div class="field">
					<label>Deskripsi:</label>
					<textarea name="description" placeholder="Deskripsi" rows="2"></textarea>
				</div>

				<div class="field">
					<label>Pilih Tipe Materi</label>
					<select id="lesson-type-selection" name="lesson_type_id" class="ui search dropdown" required>
						@foreach($lessonTypes as $lessonType)
						<option value="{{$lessonType->id}}">{{$lessonType->type}}</option>
						@endforeach
					</select>
				</div>

				<div id="form-content">
					<textarea name="body" id="body">
						
					</textarea>					
				</div>
				<br>
				<button class="ui primary button" type="submit">Buat Materi</button>

				</form>

			</div>
		</div>
	</div>



	<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('js/create-lesson.js') }}"></script>
	<script src="{{ asset('semantic/dist-semantic/semantic.min.js') }}"></script>
	 <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
    	
    	var options = {
		  //  filebrowserBrowseUrl:  '{{url("admin/lessons/upload/image")}}',
		    filebrowserUploadUrl:  '{{url("admin/lessons/upload/image?lesson_id=".$lesson->id)}}',
		 };


    	CKEDITOR.replace( 'body',options );
    	$("#lesson-type-selection").change(function(){
    		getForm($(this).val());
		           
		});

    	function getForm(lesson_type_id) {
    		$.ajax({
    			url : '{{url("admin/lessons/forms")}}/' + lesson_type_id  
    		}).done(function (data,xhr) {
    			$('#form-content').html(data);  
    			if(lesson_type_id == 1){
    				CKEDITOR.replace( 'body' ,options);
    			}

    		}).fail(function () {
    			alert('Form could not be loaded.');
    		});
    	}


    </script>

</body>
</html>