<div id="add-group" class="ui modal">
	<div class="header">Tambah Grup</div>
	<div class="content">
		<form class="ui form"  method="POST" action="{{ url('admin/groups') }}">
			{{ csrf_field() }}
			<div class="required field">
				<label>Nama Grup :</label>
				<input type="text" name="name" placeholder="Nama" required>
			</div>


			<div class=" field">
				<label>Pilih Parent group</label>
				<select name="parent_id" class="ui" >
					<option value="">Tidak punya parent</option>
					@foreach($groups as $group)
						@if(empty($group->parent)	)
						<option value="{{$group->id}}">{{$group->name}}</option>
						@endif
					@endforeach
				</select>
			</div>
			
			<button class="ui primary button" type="submit">Tambah</button>
		</form>
	</div>
</div>