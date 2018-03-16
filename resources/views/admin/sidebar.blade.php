
<div class="ui secondary vertical pointing fluid menu">
	<a href="{{url('/admin')}}" class="item @if(Request::is('admin')) {{'active'}}   @endif">
		Dashboard 
	</a>
	
	<a href="{{url('/admin/courses')}}" class="item @if(Request::is('admin/courses')) {{'active'}}   @endif">
		Daftar Mata Pelajaran
	</a>
	<a href="{{url('/admin/courses/create')}}" class="item @if(Request::is('admin/courses/create')) {{'active'}}   @endif">
		&nbsp;&nbsp; Buat Mata Pelajaran
	</a>
	<a href="{{url('/admin/groups')}}" class="item @if(Request::is('admin/groups')) {{'active'}}   @endif">
		Daftar Grup Mata Pelajaran
	</a>
	<a href="{{url('/admin/users')}}" class="item @if(Request::is('admin/users')) {{'active'}}   @endif">
		Daftar User
	</a>
	<a href="{{url('/admin/roles')}}" class="item @if(Request::is('admin/roles')) {{'active'}}   @endif">
		Daftar Role
	</a>

	<a href="{{url('/admin/discussions')}}" class="item @if(Request::is('admin/discussions')) {{'active'}}   @endif">
		Daftar Diskusi
	</a>
	
</div>