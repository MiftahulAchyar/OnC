<div id="add-role" class="ui modal">
	<div class="header">Tambah Role</div>
	<div class="content">
		<form class="ui form"  method="POST" action="{{ url('admin/roles') }}">
			{{ csrf_field() }}
			<div class="required field">
				<label>Nama Role :</label>
				<input type="text" name="name" placeholder="Nama" required>
			</div>

			<div class="field">
				<label>Display Name :</label>
				<input type="text" name="display_name" placeholder="display name">
			</div>

			<div class="field">
				<label>description :</label>
				<input type="text" name="description" placeholder="description">
			</div>
			
			<button class="ui primary button" type="submit">Tambah</button>
		</form>
	</div>
</div>