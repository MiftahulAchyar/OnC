@include("admin/header")
<div id="app" class="ui container">
	<div id="maincontent" class="ui grid">
		<div class="four wide column">
			<div class="ui piled segment">
				<a class="ui olive ribbon label">Detail Mata Pelajaran</a><br><br>
				<strong>Nama :</strong><br>{{$course->name}}<br> <br> 
				<strong>Slug :</strong><br> {{$course->slug}}<br> <br> 
				<strong>Deskripsi :</strong><br> {{$course->description}}<br> <br> 
				<strong>Kelas :</strong><br> {{$course->group->name}}<br> <br> 
				<strong>Tanggal dibuat :</strong><br> {{$course->getCreatedDateTimeLocalized()}}<br> <br> 
				<strong>Terakhir diubah :</strong><br> {{$course->getUpdatedDateTimeLocalized()}}<br><br>
				<button id="btn-edit-course" class="ui basic blue button">
					<i class="edit icon"></i>
					Ubah
				</button>

			</div>
		</div>
		<div class="twelve wide column">
			<a href="{{url('admin/courses')}}"><i class="arrow left icon"></i> Kembali ke daftar mata pelajaran</a>
			
			<h2 class="header">{{$course->name}}</h2>

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
			    	<div class="header">Berhasil!</div>
			    	<p>{{session('success') }}</p>
			  	</div>
			  	<br>
  			@endif

			<form class="ui form"  method="POST" action="{{ url('admin/chapters/delete') }}">
				{{ csrf_field() }}
				<input type="hidden" name="course_id" value="{{$course->id}}">

			<a href="" id="btn-tambah-chapter" class="ui right  labeled icon primary button">
 			 <i class="right plus icon"></i>
 			 Tambahkan BAB
			</a>

			@if($course->chapters->count() > 0)


			<button type="button" id="btn-show-cbox" class="ui right  labeled icon red button" >
 			 <i class="right trash icon"></i>
 			 Hapus Beberapa
			</button>


			<input type="submit" id="btn-hapus-chapter" class="ui red button" style="display: none;" value="Hapus">
 			 
			</input>

			@endif

			<button type="button"  id="btn-batal-hapus" class="ui basic red button" style="display: none;">
 			 Batal
			</button>

			@if($course->chapters->count() > 0)

			@foreach($course->chapters as $chapter)
			<table class="ui small very compact unstackable selectable olive table">
				<thead>
					<tr>
						<th colspan>
							<input type="checkbox" class="chapter-cbox" style="display: none;" name="chapter_id[]" value="{{$chapter->id}}"> {{$chapter->name}}
						</th>
						<th class="right aligned">
							<a data-tooltip="Tambahkan Sub Bab" data-position="top left" href="" class="btn-tambah-section" id="{{$chapter->id.'_'.$chapter->name}}"><i class="plus icon green"></i></a>
							<a data-tooltip="Edit Chapter" data-position="top right" href="{{url('admin/chapters/'.$chapter->id.'/edit')}}"><i class="edit icon blue"></i></a>
							
						</th>
					</tr>
				</thead>

				<tbody>
					@foreach($chapter->sections as $section)
					<tr>
						<td><input type="checkbox" class="cbox" style="display: none;" name="section_id[]" value="{{$section->id}}"> <a href="{{url('admin/sections/'.$section->id)}}">{{$section->name}}</a></td>
						<td class="right aligned"></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endforeach

			@else
			<br><br>
			<p>Anda Belum membuat Bab Pada Kursus ini,</p> 
				
			@endif
			
			</form>
		</div>


		<!--- modal edit mata -->
		<div id="edit-course" class="ui modal">
			<div class="header">Edit Mata Pelajaran</div>
			<div class="content">
				<form class="ui form"  method="POST" action="{{ url('admin/courses/'.$course->id) }}">
				{{ csrf_field() }}
				<div class="required field">
					<label>Nama Mata Pelajaran :</label>
					<input type="text" name="name" placeholder="Nama" value="{{$course->name}}" required>
				</div>

				<div class="field">
					<label>Deskripsi:</label>
					<textarea name="description" placeholder="Deskripsi"  rows="2">{{$course->description}}</textarea>
				</div>

				<div class="required field">
					<label>Pilih Kelas</label>
					<select name="group_id" class="ui search dropdown" required>
						<option value="">Pilih Kelas untuk mata pelajaran diatas</option>
						@foreach($groups as $group)
							<option value="{{$group->id}}" @if($group->id==$course->group_id) selected="" @endif>{{$group->name}}</option>	
						@endforeach
					</select>
				</div>

				<button class="ui primary button" type="submit">Ubah</button>
			</form>
			</div>
		</div>

		<!--- modal tambah bab -->
		<div id="tambah-chapter" class="ui modal">
			<div class="header">Tambahkan Bab</div>
			<div class="content">
			<form class="ui form"  method="POST" action="{{ url('admin/chapters') }}">
				{{ csrf_field() }}
				<div class="required field">
					<label>Nama Bab :</label>
					<input type="text" name="name" placeholder="Nama" required>
				</div>
				<input type="hidden" name="course_id" placeholder="Nama" value="{{$course->id}}" required>

				<button class="ui primary button" type="submit">Tambah</button>
			</form>
			</div>
		</div>

		<!--- modal tambah sub bab -->
		<div id="tambah-section" class="ui modal">
			<div class="header" id="chapter-name"></div>
			<div class="content">
			<form class="ui form"  method="POST" action="{{ url('admin/sections') }}">
				{{ csrf_field() }}
				<div class="required field">
					<label>Nama Sub Bab :</label>
					<input type="text" name="name" placeholder="Nama" required>
				</div>

				<div class="field">
					<label>Deskripsi:</label>
					<textarea name="description" placeholder="Tambahkan Deskripsi"  rows="2"></textarea>
				</div>

				<input type="hidden" id="chapter-id" name="chapter_id" placeholder="Nama" value="" required>

				<button class="ui primary button" type="submit">Tambah</button>
			</form>
			</div>
		</div>




		<script src="{{ URL::asset('js/jquery.min.js') }}"></script>	
		<script src="{{ asset('semantic/dist-semantic/semantic.min.js') }}"></script>
		<script type="text/javascript">
			$("#btn-edit-course").click(function(){
				$('#edit-course').modal('show');
			});

			$("#btn-tambah-chapter").click(function(e){
				e.preventDefault();
				$('#tambah-chapter').modal('show');
			});

			$(".btn-tambah-section").click(function(e){
				e.preventDefault();
				chapter = $(this).attr('id').split("_");
				$('#chapter-id').val(chapter[0]);
				$('#chapter-name').html( "Tambahkankan Sub Bab pada " +chapter[1]);
				$('#tambah-section').modal('show');
			});

			$("#btn-show-cbox").click(function(){
				$(this).hide(); 
    			$(".cbox").show();    			
    			$(".chapter-cbox").show();       			
    			$("#btn-batal-hapus").show()    			
    			$("#btn-hapus-chapter").show()
			});

		

			$("#btn-batal-hapus").click(function(){
				$(this).hide(); 
				$(".cbox").prop('checked', false);
    			$(".cbox").hide();
    			$(".chapter-cbox").prop('checked', false);
    			$(".chapter-cbox").hide();
    			$("#btn-show-cbox").show()
    			$("#btn-hapus-chapter").hide()
			});


		</script>

	</body>
	</html>