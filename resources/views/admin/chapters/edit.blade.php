@include("admin/header")
<div id="app" class="ui container">
	<div id="maincontent" class="ui grid">
		<div class="four wide column">
			<div class="ui piled segment">
				<a class="ui olive ribbon label">Detail Bab</a><br><br>
				<strong>Nama :</strong><br>{{$chapter->name}}<br> <br> 
				<strong>Slug :</strong><br> {{$chapter->slug}}<br> <br> 
				<strong>Mata Pelajaran :</strong><br> {{$chapter->course->name}}<br> <br> 
				<strong>Tanggal dibuat :</strong><br> {{$chapter->getCreatedDateTimeLocalized()}}<br> <br> 
				<strong>Terakhir diubah :</strong><br> {{$chapter->getUpdatedDateTimeLocalized()}}<br><br>
			
			</div>
		</div>
		<div class="twelve wide column">
			<a href="{{url('admin/courses/'.$chapter->course->id)}}"><i class="arrow left icon"></i> Kembali ke {{$chapter->course->name}}</a>
			<h2 class="header">Edit BAB</h2>
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
			<form class="ui form"  method="POST" action="{{ url('admin/chapters/'.$chapter->id) }}">
				{{ csrf_field() }}
				<div class="required field">
					<label>Nama BAB :</label>
					<input type="text" name="name" placeholder="Nama" value="{{$chapter->name}}" required>
				</div>

				<div class="required field">
					<label>Pilih Mata Pelajaran</label>
					<select name="course_id" class="ui search dropdown" required>
						@foreach($groups as $group)
						<optgroup label="{{$group->name}}">
						@foreach($group->courses as $course)
						<option value="{{$course->id}}" @if($course->id==$chapter->course_id) selected="" @endif>{{$course->name}}</option>	
						@endforeach
						</optgroup>
						@endforeach
					</select>
				</div>

				<button class="ui primary button" type="submit">Ubah BAB<i class="angle double right icon"></i></button>
			</form>


		</div>
		<script src="{{ URL::asset('js/jquery.min.js') }}"></script>	
		<script src="{{ asset('semantic/dist-semantic/semantic.min.js') }}"></script>
	
	</body>
	</html>