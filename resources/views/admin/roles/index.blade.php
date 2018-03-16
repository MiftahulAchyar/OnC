@include("admin/header")
<div id="app" class="ui container">
	<div id="maincontent" class="ui grid">
		<div class="four wide column">
			@include("admin/sidebar")
		</div>
		<div class="twelve wide column">
			<h2 class="header">Daftar Role User</h2>
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
  			<button id="btn-add-role" class="ui basic blue button">
					<i class="plus icon"></i>
					Buat Role baru
				</button>
			<table class="ui celled table">
				<thead>
			    <tr>
			    	<th>id</th>
			    	<th>Nama</th>
			    	<th>Deskripsi</th>
				    <th>Tanggal dibuat</th>
				    <th>Terakhir di ubah</th>
				    <th>Aksi</th>
				 </tr>
				</thead>
				@foreach($roles as $role)
					<tr>
						<td>{{$role->id}}</td>
						<td>{{$role->name}}</td>
						<td>{{$role->description}}</td>			
						<td>{{$role->getCreatedDateTimeLocalized()}}</td>
						<td>{{$role->getUpdatedDateTimeLocalized()}}</td>
						<td>
							<!--<div class="ui small basic icon buttons">
							  <a href="{{url('admin/roles/'.$role->id)}}" class="ui button"><i class="edit icon blue"></i></a>
							  <form  method="POST" action="{{ url('admin/roles/delete') }}">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{$role->id}}">
								<button class="ui button"  onclick="return confirm('Apa anda yakin untuk menghapus?');"><i class="trash icon red" ></i></button>
								</form>
							</div>
						
							</form> -->		

						</td>

					</tr>
				@endforeach
				 <tfoot>
    			<tr><th colspan="7">
				@if($roles->total() > 10)
     				 <div class="ui right floated pagination menu">
     				 	{{ $roles->links('admin/pagination-simple', ['paginator' => $roles]) }}
     				 </div>
     			@endif
     			</th></tr>
     			</tfoot>
			</table>


		</div>
		@include("admin/roles/create")

		<script src="{{ URL::asset('js/jquery.min.js') }}"></script>	
		<script src="{{ asset('semantic/dist-semantic/semantic.min.js') }}"></script>
		<script type="text/javascript">
			$("#btn-add-role").click(function(){
				$('#add-role').modal('show');
			});
		</script>
	
	</body>
	</html>