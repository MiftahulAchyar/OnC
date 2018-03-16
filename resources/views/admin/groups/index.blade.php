@include("admin/header")
<div id="app" class="ui container">
	<div id="maincontent" class="ui grid">
		<div class="four wide column">
			@include("admin/sidebar")
		</div>
		<div class="twelve wide column">
			<h2 class="header">Daftar Grup Mata Pelajaran</h2>
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
  			<button id="btn-add-group" class="ui basic blue button">
					<i class="plus icon"></i>
					Buat Grup baru
			</button>
			<table class="ui celled table">
				<thead>
			    <tr>
			    	<th>id</th>
			    	<th>Nama</th>
				    <th>Parent</th>
				    <th>Tanggal dibuat</th>
				    <th>Terakhir di ubah</th>
				    <th>Aksi</th>
				 </tr>
				</thead>
				@foreach($groups as $group)
					<tr>
						<td>{{$group->id}}</td>
						<td>{{$group->name}}</td>
						<td>@if(!empty($group->parent)) {{$group->parent->name}} @else {{'-'}} @endif</td>						
						<td>{{$group->getCreatedDateTimeLocalized()}}</td>
						<td>{{$group->getUpdatedDateTimeLocalized()}}</td>
						<td>
							<div class="ui small basic icon buttons">
							  <form  method="POST" action="{{ url('admin/groups/delete') }}">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{$group->id}}">
								<button class="ui button"  onclick="return confirm('Apa anda yakin untuk menghapus?');"><i class="trash icon red" ></i></button>
								</form>
							</div>
						
							</form> 	

						</td>

					</tr>
				@endforeach
				 <tfoot>
    			<tr><th colspan="7">
				@if($groups->total() > 10)
     				 <div class="ui right floated pagination menu">
     				 	{{ $groups->links('admin/pagination-simple', ['paginator' => $groups]) }}
     				 </div>
     			@endif
     			</th></tr>
     			</tfoot>
			</table>


		</div>
		@include("admin/groups/create")

		<script src="{{ URL::asset('js/jquery.min.js') }}"></script>	
		<script src="{{ asset('semantic/dist-semantic/semantic.min.js') }}"></script>
		<script type="text/javascript">
			$("#btn-add-group").click(function(){
				$('#add-group').modal('show');
			});
		</script>
	
	</body>
	</html>