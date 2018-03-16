@include("admin/header")
<div id="app" class="ui container">
	<div id="maincontent" class="ui grid">
		<div class="four wide column">
			<div class="ui piled segment">
				<a class="ui olive ribbon label">Detail Sub bab</a><br><br>
				<strong>Nama :</strong><br>{{$section->name}}<br> <br> 
				<strong>Slug :</strong><br> {{$section->slug}}<br> <br> 
				<strong>Chapter :</strong><br> {{$section->chapter->name}}<br> <br> 
				<strong>Deskripsi :</strong><br> {{$section->description}}<br> <br> 
				<strong>Tanggal dibuat :</strong><br> {{$section->getCreatedDateTimeLocalized()}}<br> <br> 
				<strong>Terakhir diubah :</strong><br> {{$section->getUpdatedDateTimeLocalized()}}<br><br>
			
			</div>
		</div>
		<div class="twelve wide column">
			<a href="{{url('admin/section/'.$section->id)}}"><i class="arrow left icon"></i> Kembali ke {{$section->name}}</a>
			<h2 class="header">Edit SUB BAB</h2>
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
			<form class="ui form"  method="POST" action="{{ url('admin/sections/'.$section->id) }}">
				{{ csrf_field() }}
				<div class="required field">
					<label>Nama SUB BAB :</label>
					<input type="text" name="name" placeholder="Nama" value="{{$section->name}}" required>
				</div>

				<div class="required field">
					<label>Pilih BAB</label>
					<select name="chapter_id" class="ui search dropdown" required>
						@foreach($courses as $course)
						<optgroup label="{{$course->name}}">
						@foreach($course->chapters as $chapter)
						<option value="{{$chapter->id}}" @if($chapter->id==$section->chapter_id) selected="" @endif>{{$chapter->name}}</option>	
						@endforeach
						</optgroup>
						@endforeach
					</select>
				</div>
				<input type="hidden" name="id" value="{{$section->id}}">

				<button class="ui primary button" type="submit">Ubah SUB BAB<i class="angle double right icon"></i></button>
			</form>


		</div>
		<script src="{{ URL::asset('js/jquery.min.js') }}"></script>	
		<script src="{{ asset('semantic/dist-semantic/semantic.min.js') }}"></script>
	
	</body>
	</html>