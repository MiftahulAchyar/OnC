<html>
  <head>    
    <meta name="csrf-token" content="{{ csrf_token() }}">
		<title>
			<?php
			if(isset($course))
				echo $course->name;
			else if(isset($chapter))
				echo $chapter->name;
			?>
			- Online Course</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('semantic/dist-semantic/semantic.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
		<style>
/* 			.ui.menu .container a.item:not(.toc){
				display:flex;
			}
			
			.ui.menu .container a.item:not(.toc){
				display:flex;
			}
			 */
    
			.ui.bottom.right.popup:before{display:none}
			#menu-btn{
				left : 0 !important
			}
			.toc.item {
	      display: none !important;
	    }

	    @media only screen and (max-width: 700px) {
	    	.toc.item {
	        display: block !important;
	      }
				.ui.menu .container a.item:not(.toc){
					display:none !important;
				}
				.ui.menu .container form{
						display: none;
				}
			}
		</style>
  </head>
<body>
 
<div class="ui vertical inverted sidebar menu left" style="margin-bottom:0">
  <a class="active item">Home</a>
<!-- 	<div class=""> -->
<!--   <a class="item">Materi</a> -->
	<div class=" item ui accordion">
		<div class="ui title" >
			<i class="dropdown icon"></i>
			Materi
		</div>
		<div class="content">
			@foreach($group->where("parent_id", NULL) as $g)
				@foreach ($group->where("parent_id", $g->id) as $gc)
						<div class="accordion">
							<div class="ui title item" style=" ">
								<i class="dropdown icon"></i>
								{{$gc->name}}
							</div>
							<div class="content">
<!-- 										<p class="transition hidden"> -->
								@if(count($gc->courses)>0)
									@foreach($gc->courses as $c)
										<p class="transition hidden" >
											<a href="{{ url('/'.$c->slug.'/')}}" class="item">{{$c->name}}</a>
										</p>
<!-- 												<br> -->
									@endforeach
								@else
								<p class="transition hidden"><a href="#" class="item"><i>Belum ada materi</i></a></p>
<!-- 											<br> -->
								@endif
								</p>
							</div>
						</div>
					@endforeach
			@endforeach
		</div>
	</div>
					
  <a class="item">Daftar</a>
</div>
<div class="pusher" style="background:#eeeeee">

		<div class="ui inverted menu borderless" style="border-radius: 0 ">
		<div class="ui container">
			<a class="toc item">
        	<!-- Online course -->
          	<!-- <img class="logo" src="assets/images/logo.png"> -->
          <i class="sidebar icon">
          </i>
      </a>
			<a href="{{URL::to('/')}}" class="ui header item">
<!-- 				<img class="logo" src="{{asset('/images/logo.png')}}"> -->
				Online Course
			</a>
			<a class="ui browse item"  id="subject-btn"  style="color: #fff !important; font-weight: 700;font-size: 1.2em; ">
				Materi
				<i class="dropdown icon"></i>
			</a>
			<form class="ui action left icon input" style="max-width: 120px;margin-top: 10px;">
		        <!-- <i class="search icon"></i> -->
		        <input type="text" placeholder="Search" style="background: #69696957; padding-left: 10px !important;">
		        <button style="margin: 0; color: rgba(255,255,255,.7)!important;background: #69696957;" class="ui button" ><i class="search icon"></i></button>
		  </form>
			<div class="right menu">
			@guest
				<a href="{{ route('login') }}" class="header item ui inverted button">
					Login
				</a>
			@else 
				<a href="#" class="header item">
					{{ Auth::user()->name }} 
				</a>
				<a class="header item ui button" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
					Logout
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
			@endguest
			</div>
		</div>
	</div>  
	
		<div class="ui fluid popup" id="menu-btn" style="">
				<div class="ui three column relaxed equal height divided grid">
						<?php
// 					print_r($group);
// 					die();
					?>
						@foreach($group->where("parent_id", NULL) as $g)
							
						<div class="column">
							<?php //echo $g->name; die(); ?>
							<h4 class="ui header"> {{$g->name}}</h4>
							
							@foreach ($group->where("parent_id", $g->id) as $gc)
								<div class="ui accordion">
									<div class="title">
										<i class="dropdown icon"></i>
										{{$gc->name}}
									</div>
									<div class="content">
<!-- 										<p class="transition hidden"> -->
										@if(count($gc->courses)>0)
											@foreach($gc->courses as $c)
												<p class="transition hidden">
													<a href="{{ url('/'.$c->slug.'/')}}" class="item">{{$c->name}}</a>
												</p>
<!-- 												<br> -->
											@endforeach
										@else
										<p class="transition hidden"><a href="#" class="item"><i>Belum ada materi</i></a></p>
<!-- 											<br> -->
										@endif
										</p>
									</div>
								</div>
							@endforeach
						</div>
						@endforeach
				</div>
			</div>
