@include("admin/header")
<div id="app" class="ui container">
	<div id="maincontent" class="ui grid">
		<div class="four wide column">
			@include("admin/sidebar")
		</div>
		<div class="twelve wide column">
			<h2 class="header">Daftar Mata Pelajaran</h2>
			<br>
			@if(session('success'))
		    	<div class="ui success message">
			    	<div class="header">Berhasil!</div>
			    	<p>{{session('success') }} berhasil dihapus!</p>
			  	</div>
			  	<br>
  			@endif
  			
			<table class="ui celled table">
				<thead>
			    <tr>
			    	<th>id</th>
			    	<th>Nama</th>
				    <th>Deskripsi</th>
				    <th>Jumlah Bab</th>
				    <th>Grup</th>
				    <th>Dibuat Pada</th>
				    <th>Aksi</th>
				 </tr>
				</thead>
				@foreach($courses as $course)
					<tr>
						<td>{{$course->id}}</td>
						<td>{{$course->name}}</td>
						<td>@if(!empty($course->description)) {{$course->description}} @else {{'-'}} @endif</td>
						<td>{{$course->chapters->count()}}</td>
						<td>{{$course->group->name}}</td>
						<td>{{$course->getUpdatedDateTimeLocalized()}}</td>
						<td>
							<div class="ui small basic icon buttons">
							  <a href="{{url('admin/courses/'.$course->id)}}" class="ui button"><i class="edit icon blue"></i></a>
							  <form  method="POST" action="{{ url('admin/courses/delete') }}">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{$course->id}}">
								<button class="ui button"  onclick="return confirm('Apa anda yakin untuk menghapus?');"><i class="trash icon red" ></i></button>
								</form>
							</div>
						
							</form>		

						</td>

					</tr>
				@endforeach
				 <tfoot>
    			<tr><th colspan="7">
				@if($courses->total() > 10)
     				 <div class="ui right floated pagination menu">
     				 	{{ $courses->links('admin/pagination-simple', ['paginator' => $courses]) }}
     				 </div>
     			@endif
     			</th></tr>
     			</tfoot>
			</table>


		</div>
		<script src="{{ URL::asset('js/jquery.min.js') }}"></script>	
		<script src="{{ asset('semantic/dist-semantic/semantic.min.js') }}"></script>
	
	</body>
	</html>