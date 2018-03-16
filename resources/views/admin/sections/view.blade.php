@include("admin/header")
<div id="app" class="">
	<div id="maincontent" class="ui grid ">
		<div class="ui container">
			<div class="fourteen wide column">
				<a href="{{url('admin/courses/'.$section->chapter->course->id)}}"><i class="arrow left icon"></i> Kembali ke {{$section->chapter->course->name}}</a>

				<h2 class="header">{{$section->name}}</h2>
				<strong>{{$section->description}}</strong><br>
				Terakhir di update pada {{$section->getUpdatedDateTimeLocalized()}}

				
				@if(session('success'))
		    	<div class="ui success message">
			    	<div class="header">Berhasil</div>
			    	<p>{{session('success')}}</p>
			  	</div>
  				@endif

				<div id="chapter-stats" class="ui five  statistics">
					<div class="statistic card" >
						<div class="value">
							{{$section->lessons->count()}} 
						</div>
						<div class="label">
							Materi
						</div>
					</div>
					<div class="statistic">
						<div class="value">
							<i class="book icon"></i> {{$section->lessons->where("lesson_type_id",1)->count()}}
						</div>
						<div class="label">
							Teks
						</div>
					</div>
					<div class="statistic">
						<div class="value">
							<i class="video icon"></i> {{$section->lessons->where("lesson_type_id",2)->count()}}
						</div>
						<div class="label">
							Video
						</div>
					</div>
					<div class="statistic">
						<div class="value">
							<i class="help icon"></i> {{$section->lessons->where("lesson_type_id",3)->count()}}
						</div>
						<div class="label">
							Kuis
						</div>
					</div>
					<div class="statistic">
						<div class="value">
							<i class="student icon"></i> -
						</div>
						<div class="label">
							Siswa Mengikuti
						</div>
					</div>
				</div>

				<br><br>

				<a href="{{url('admin/lessons/create/'.$section->id)}}" id="btn-edit-course" class="ui basic green button">
					<i class="plus icon"></i>
					Tambahkan Materi
				</a>

				<a href="{{url('admin/sections/'.$section->id.'/edit')}}" class="ui basic blue button">
					<i class="edit icon"></i>
					Edit Sub Bab
				</a>
			</div>
		</div>

		<div class="sixteen wide column lesson-panel">
			<div class="ui container">
			<table class="ui celled table">
				<thead>
			    <tr>
			    	<th>id</th>
			    	<th>nama</th>
			    	<th>deskripsi</th>
				    <th>tipe</th>
				    <th>Tanggal dibuat</th>
				    <th>Terakhir diedit</th>
				    <th>Aksi</th>
				 </tr>
				</thead>
				@foreach($section->lessons as $lesson)
					<tr>
						<td>{{$lesson->id}}</td>
						<td>{{$lesson->title}}</td>
						<td>{{$lesson->description}}</td>
						<td>{{$lesson->lessonType->type}}</td>						
						<td>{{$lesson->getCreatedDateTimeLocalized()}}</td>
						<td>{{$lesson->getUpdatedDateTimeLocalized()}}</td>
						<td>
							<div class="ui small basic icon buttons">
							 <a  data-tooltip="Preview" data-position="top left"  href="{{url($lesson->section->chapter->course->slug.'/'.$lesson->section->chapter->slug.'/'.$lesson->section->slug).'#/'.$lesson->lessonType->code.'/'.$lesson->slug}}" class="ui button"><i class="browser icon green"></i></a>
							 <a  data-tooltip="Edit" data-position="top center"  class="ui button"><i class="edit icon blue"></i></a>
							 <form  method="POST" action="{{ url('admin/lessons/delete') }}">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{$lesson->id}}">
								<button data-tooltip="Hapus" data-position="top right" class="ui button"  onclick="return confirm('Apa anda yakin untuk menghapus?');"><i class="trash icon red" ></i></button>
								</form>
							</div>

						</td>

					</tr>
				@endforeach
			</table>
			</div>

		</div>



	</div>



	<script src="{{ URL::asset('js/jquery.min.js') }}"></script>	
	<script src="{{ asset('semantic/dist-semantic/semantic.min.js') }}"></script>

</body>
</html>