<!DOCTYPE html>
<html>
	@include("home/myhead")
<body>
	<style>
		.transition{padding-left:20px}
		#menu-jenjang a.item{
				display: table-cell !important;
				text-align: center;
			font-size: 1.2em;
			font-weight: 700;
			padding-top: 20px;
			padding-bottom: 20px
		}
		.ui.vertical.stripe.jenjang p{
			font-size: 1.1em
		}
	</style>	
<!-- Following Menu -->


<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
  <a class="active item">Home</a>
  <a class="item">Materi</a>
  <a class="item">Daftar</a>
</div>


<!-- Page Contents -->
<div class="pusher">
  <div class="ui inverted vertical masthead center aligned segment">

    <div class="ui container">
      <div class="ui large secondary inverted pointing menu" style="border: none;">
        <a class="toc item">
        	<!-- Online course -->
          	<!-- <img class="logo" src="assets/images/logo.png"> -->
          <i class="sidebar icon">
          </i>
        </a>

	    <a href="#" class="header item">
				
<!-- 	        <img class="logo" src="{{asset('/images/logo.png')}}"> -->
	        Online Course
	    </a>
      <div class="ui menu" style="background: transparent; border:none; box-shadow:none">
				<a class="browse item"  id="subject-btn"  style="color: #fff !important; font-weight: 700 ">
					Materi
					<i class="dropdown icon"></i>
				</a>
			</div>
	    <div class="item">
		      <form class="ui action left icon input" style="max-width: 120px;">
		        <!-- <i class="search icon"></i> -->
		        <input type="text" placeholder="Search" style="background: #69696957; padding-left: 10px !important;">
		        <button style="margin: 0; color: rgba(255,255,255,.7)!important;background: #69696957;" class="ui button" ><i class="search icon"></i></button>
		      </form>
	    </div>
        <div class="right item">
          <!-- <a class="ui inverted button">Log in</a> -->
          <a class="ui inverted button">Daftar</a>
        </div>
      </div>
    </div>

    <div class="ui text container" style="z-index:2">
      <h1 class="ui inverted header">
        Online Course
      </h1>
      <h2>Membuka jendela dunia.</h2>
      <!-- <div class="ui huge primary button">Get Started <i class="right arrow icon"></i></div> -->
    </div>

			<!-- 	MENU PINDAH DI SINI		 -->
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
  </div>
	<div id="menu-jenjang" class="ui borderless main menu" style="border: none; display: table; margin-top: 0; width: 100%;">
<!--     <div class="ui text container"> -->
			<div class="ui  column grid container borderless menu" style="
					display: table-row;
					/* text-align: center !important; */
			">
				
			@foreach($group->where("parent_id", NULL) as $g)
				<a href="#jenjang{{$g->id}}" class="column item" style="width:30%"> {{$g->name}}</a>
			@endforeach
<!--       <div href="#" class="header item">
        Project Name
      </div>
      <a href="#" class="item">Blog</a>
      <a href="#" class="item">Articles</a>
      <a href="#" class="ui right floated dropdown item" tabindex="0">
        Dropdown <i class="dropdown icon"></i>
        <div class="menu transition hidden" tabindex="-1">
          <div class="item">Link Item</div>
          <div class="item">Link Item</div>
          <div class="divider"></div>
          <div class="header">Header Item</div>
          <div class="item">
            <i class="dropdown icon"></i>
            Sub Menu
            <div class="menu transition hidden">
              <div class="item">Link Item</div>
              <div class="item">Link Item</div>
            </div>
          </div>
          <div class="item">Link Item</div>
        </div>
      </a> -->
    </div>
  </div>
	@foreach($group->where("parent_id", NULL) as $g)
	<div id="jenjang{{$g->id}}" class="ui vertical stripe segment jenjang" style="padding: 1em 0">
		<div class="ui grid container">
			<div class="four wide column">
				<div class="ui" style="font-size: 1.32em;padding-top: 10px;">{{$g->name}}</div>
			</div>
			<div class="eleven wide column">
					<div class="ui segment" style="padding: 0; border:none; box-shadow:none">
							@foreach ($group->where("parent_id", $g->id) as $gc)
								<div class="ui accordion">
									<div class="title" style="font-size: 1.3em; ">
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
					</div>
			</div>
		</div>
	</div>
	@endforeach
  <div class="ui vertical stripe segment">
    <div class="ui text container">
      <h4 class="ui horizontal header divider">
        <a href="#">-</a>
      </h4>
      <h3 class="ui header center aligned">Subscribe untuk mendapatkan info materi terbaru</h3>
      <form class="ui action left icon input" style="width: 100%">
        <input type="text" placeholder="Email..." style="padding-left: 14px">
        <div class="ui teal button">Subscribe</div>
      </form><!-- 
      <p>Yes I know you probably disregarded the earlier boasts as non-sequitur filler content, but its really true. It took years of gene splicing and combinatory DNA research, but our bananas can really dance.</p>
      <a class="ui large button">I'm Still Quite Interested</a> -->
    </div>
  </div>


  <div class="ui inverted vertical footer segment">
    <div class="ui container">
      <div class="ui stackable inverted divided equal height stackable grid">
        <div class="three wide column">
          <h4 class="ui inverted header">Tentang </h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Kontak</a>
            <a href="#" class="item">Tim </a>
            <a href="#" class="item">Rencana</a>
            <a href="#" class="item">Karir</a>
          </div>
        </div>
        <div class="seven wide column">
          <h4 class="ui inverted header">Misi</h4>
					<p>Menyediakan platform edukasi berbasis <i>social online course</i> .</p>
        </div>
      </div>
    </div>
    <div class="ui container">
      <h4 class="ui horizontal divider" style="color: #fff">
        © 2018
      </h4>
    </div>
  </div>
</div>
<script>
	// Select all links with hashes
	$(document).ready(function(){
		$('.main.menu').visibility({
        type: 'fixed'
      });

	});
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top - 60
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
					
        });
      }
    }
  });
</script>
</body>

</html>