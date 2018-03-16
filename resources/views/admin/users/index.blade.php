@include("admin/header")
<div id="app" class="ui container">
	<div id="maincontent" class="ui grid">
		<div class="four wide column">
			@include("admin/sidebar")
		</div>
		<div class="twelve wide column">
			<h2 class="header">Daftar User</h2>
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
				    <th>Email</th>				    
				    <th>Role</th>
				    <th>Tanggal dibuat</th>
				    <th>Terakhir di ubah</th>
				    <th>Aksi</th>
				 </tr>
				</thead>
				@foreach($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>@foreach($user->roleUsers as $userRole)
								{{ $userRole->role->name}} ,
							@endforeach
						</td>						
						<td>{{$user->getCreatedDateTimeLocalized()}}</td>
						<td>{{$user->getUpdatedDateTimeLocalized()}}</td>
						<td>
							<!--<div class="ui small basic icon buttons">
							  <a href="{{url('admin/users/'.$user->id)}}" class="ui button"><i class="edit icon blue"></i></a>
							  <form  method="POST" action="{{ url('admin/users/delete') }}">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{$user->id}}">
								<button class="ui button"  onclick="return confirm('Apa anda yakin untuk menghapus?');"><i class="trash icon red" ></i></button>
								</form>
							</div>
						
							</form> -->		

						</td>

					</tr>
				@endforeach
				 <tfoot>
    			<tr><th colspan="7">
				@if($users->total() > 10)
     				 <div class="ui right floated pagination menu">
     				 	{{ $users->links('admin/pagination-simple', ['paginator' => $users]) }}
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