
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('semantic/dist-semantic/semantic.min.css') }}">

  <!-- Site Properties -->
  <title>Homepage - Online Course</title>
  <style type="text/css">

	    .hidden.menu {
	      display: none;
	    }

	    .masthead.segment {
	      min-height: 700px;
	      padding: 1em 0em;
	    }
	    .masthead .logo.item img {
	      margin-right: 1em;
	    }
	    .masthead .ui.menu .ui.button {
	      margin-left: 0.5em;
	    }
	    .masthead h1.ui.header {
	      margin-top: 3em;
	      margin-bottom: 0em;
	      font-size: 4em;
	      font-weight: normal;
	    }
	    .masthead h2 {
	      font-size: 1.7em;
	      font-weight: normal;
	    }

	    .ui.vertical.stripe {
	      padding: 8em 0em;
	    }
	    .ui.vertical.stripe h3 {
	      font-size: 2em;
	    }
	    .ui.vertical.stripe .button + h3,
	    .ui.vertical.stripe p + h3 {
	      margin-top: 3em;
	    }
	    .ui.vertical.stripe .floated.image {
	      clear: both;
	    }
	    .ui.vertical.stripe p {
	      font-size: 1.33em;
	    }
	    .ui.vertical.stripe .horizontal.divider {
	      margin: 3em 0em;
	    }

	    .quote.stripe.segment {
	      padding: 0em;
	    }
	    .quote.stripe.segment .grid .column {
	      padding-top: 5em;
	      padding-bottom: 5em;
	    }

	    .footer.segment {
	      padding: 5em 0em;
	    }

	    .secondary.pointing.menu .toc.item {
	      display: none;
	    }

	    @media only screen and (max-width: 700px) {
	      .ui.fixed.menu {
	        display: none !important;
	      }
	      .secondary.pointing.menu .item,
	      .secondary.pointing.menu .menu {
	        display: none;
	      }
	      .secondary.pointing.menu .toc.item {
	        display: block;
	      }
	      .masthead.segment {
	        min-height: 350px;
	      }
	      .masthead h1.ui.header {
	        font-size: 2em;
	        margin-top: 1.5em;
	      }
	      .masthead h2 {
	        margin-top: 0.5em;
	        font-size: 1.5em;
	      }
	    }
		.ui.large.menu .item{
			border: 0 !important;
			border-left: 0 !important
		}
		.ui.menu .item:before{
			background: none
		}
    /*.ui.popup{overflow:auto;}*/
    #menu-btn{left: 0 !important}
    #menu-btn * { color: black !important;text-align: left;}
    #menu-btn a:hover{opacity: 0.7}
    .ui.inverted.vertical.masthead.center.aligned.segment::before {
      background: url({{asset('/images/burung.jpg')}});
      display: block;
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      right: 0;
      bottom: 0;
      z-index: 1;
			background-repeat: no-repeat;
			background-size: cover;
    }
    .ui.inverted.vertical.masthead.center.aligned.segment::after {
        /*background: url(assets/images/burung.jpg);*/
        display: block;
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        right: 0;
        background: #000000a1;/*000000d1;*/
        bottom: 0;
        z-index: 1;
    }
    .ui.container {
        z-index: 3;
        position: relative;
    }
    </style>
  <script src="{{ asset('golgi/js/jquery-2.1.4.min.js')}}"></script>
  <script src="{{ asset('semantic/dist-semantic/semantic.min.js')}}"></script>

<!--   <script src="assets/jquery-3.1.1.min.js"></script> -->
<!--   <script type="text/javascript" src="assets/semantic.min.js"></script>
  <script src="assets/components/visibility.js"></script>
  <script src="assets/components/sidebar.js"></script>
  <script src="assets/components/transition.js"></script> -->
    <script>
  $(document)
    .ready(function() {
      var resizePopup = function(){$('.ui.popup').css({'max-height': $(window).height(), 'left':0} ) ;};

      $(window).resize(function(e){
          resizePopup();
      });

      $('#subject-btn')
        .popup({
          popup : $('#menu-btn'),
          on    : 'click',
          lastResort: 'bottom right',
          onShow: function(){
//             $('.ui.text.container h1, .ui.text.container h2').css({'width': 0, 'height':0,  'display':'none'})
            // $('#menu-btn').css('left','0 !important');
          },
          onHidden: function () {
//             $('.ui.text.container h1, .ui.text.container h2').css({'width': 'auto', 'height':'auto', 'display':'block'})
					}
        })
      ;
			$('.ui.accordion').accordion();
      // fix menu when passed
      // $('.masthead')
      //   .visibility({
      //     once: false,
      //     onBottomPassed: function() {
      //       $('.fixed.menu').transition('fade in');
      //     },
      //     onBottomPassedReverse: function() {
      //       $('.fixed.menu').transition('fade out');
      //     }
      //   })
      // ;

      // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
      ;
		// show dropdown on hover
      $('  .ui.dropdown').dropdown({
        on: 'hover'
      });
      $('[href="#"]').on('click', function(e){
      	e.preventDefault();
      });
    })
  ;
  </script>

</head>
