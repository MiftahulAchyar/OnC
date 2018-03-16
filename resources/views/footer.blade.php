<script src="{{ asset('golgi/js/jquery-2.1.4.min.js')}}"></script>
  <script src="{{ asset('semantic/dist-semantic/semantic.min.js')}}"></script>
<script>
  $(document).ready(function() {
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
            $('.ui.text.container h1, .ui.text.container h2').css({'width': 0, 'height':0,  'display':'none'})
            // $('#menu-btn').css('left','0 !important');
          },
          onHidden: function () {
            $('.ui.text.container h1, .ui.text.container h2').css({'width': 'auto', 'height':'auto', 'display':'block'})
					}
        })
      ;
		
  });	
</script>

<script>
 $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
      ;
	
			$('.ui.accordion').accordion();
</script>