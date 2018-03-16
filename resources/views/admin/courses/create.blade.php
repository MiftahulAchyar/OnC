@include("admin/header")
<div id="app" class="ui container">
	<div id="maincontent" class="ui grid">
		<div class="four wide column">
			@include("admin/sidebar")
		</div>
		<div class="twelve wide column">
			<h2 class="header">Buat Mata Pelajaran</h2>
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
			@if(session('success'))
		    	<div class="ui success message">
			    	<div class="header">Mata Pelajaran Berhasil di buat</div>
			    	<p>Anda dapat melihat mata pelajaran ini <a href="{{url('admin/courses/'.session('success'))}}">disini</a></p>
			  	</div>
  			@endif
			<form class="ui form"  method="POST" action="{{ url('admin/courses') }}">
				{{ csrf_field() }}
				<div class="required field">
					<label>Nama Mata Pelajaran :</label>
					<input type="text" name="name" placeholder="Nama" required>
				</div>

				<div class="field">
					<label>Deskripsi:</label>
					<textarea name="description" placeholder="Deskripsi" rows="2"></textarea>
				</div>

				<div class="required field">
					<label>Pilih Kelas</label>
					<select name="group_id" class="ui search dropdown" required>
						<option value="">Pilih Kelas untuk mata pelajaran diatas</option>
						@foreach($groups as $group)
						<option value="{{$group->id}}">{{$group->name}}</option>
						@endforeach
					</select>
				</div>

				<button class="ui primary button" type="submit">Buat Mata Pelajaran</button>
			</form>
		</div>
		<script src="{{ URL::asset('js/jquery.min.js') }}"></script>	
		<script src="{{ asset('semantic/dist-semantic/semantic.min.js') }}"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.tabular.menu .item').tab();
				$('select.dropdown').dropdown();
			});
		</script>
	</body>
	</html>