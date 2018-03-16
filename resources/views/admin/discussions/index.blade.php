@include("admin/header")
<div id="app" class="ui container">
	<div id="maincontent" class="ui grid">
		<div class="four wide column">
			@include("admin/sidebar")
		</div>
		<div class="twelve wide column">
			<h2 class="header">Daftar Diskusi</h2>
			<br>
			@if(session('success'))
		    	<div class="ui success message">
			    	<div class="header">Berhasil!</div>
			    	<p>{{session('success') }}</p>
			  	</div>
			  	<br>
  			@endif
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
			<table class="ui celled table">
				<thead>
			    <tr>
			    	<th>id</th>
			    	<th>User</th>
				    <th>Materi</th>
				    <th>Text</th>
				    <th>Parent</th>
				    <th>Jumlah votes</th>
				    <th>Terakhir di ubah</th>
				    <th>Aksi</th>
				 </tr>
				</thead>
				@foreach($discussions as $discussion)
					<tr>
						<td>{{$discussion->id}}</td>
						<td>{{$discussion->user->name}}</td>
						<td>{{$discussion->lesson->title}}</td>
						<td>{{$discussion->text}}</td>
						<td>@if(!empty($discussion->parent)) {{$discussion->parent->id}} @else {{'-'}} @endif</td>						
						<td>{{$discussion->number_of_votes}}</td>
						<td>{{$discussion->getCreatedDateTimeLocalized()}}</td>
						<td>
							<div class="ui small basic icon buttons">
							  <form  method="POST" action="{{ url('admin/discussions/delete') }}">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{$discussion->id}}">
								<button class="ui button"  onclick="return confirm('Apa anda yakin untuk menghapus?');"><i class="trash icon red" ></i></button>
								</form>
							</div>
						
							</form> 	

						</td>

					</tr>
				@endforeach
				 <tfoot>
    			<tr><th colspan="7">
				@if($discussions->total() > 10)
     				 <div class="ui right floated pagination menu">
     				 	{{ $discussions->links('admin/pagination-simple', ['paginator' => $discussions]) }}
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