@include("header")
<div id="app">
	<chapter-component slug_id="{{ $chapter_slug }} "></chapter-component>
</div>

<style>
  #left-menu div.item > div.item .header {
    margin-bottom: 0 !important
  }
  #left-menu div.item > div.item::first-child::before {
    display: block;
    content: '';
    position: absolute;
    top: 0;
    width: 10px;
    height: 10px;
    background-color: black;
  }
  #left-menu div.item > div.item {
    border-left: 1px solid #8080809e;
    padding-left: 0px;
    padding-top: 0;
    padding-bottom: 0;
  }
  #left-menu div.item > div.item i.icon{
    position: absolute;
    /*font-size: 1.2em;*/
/*     background-color: white; */
    left: -10px;
/*     border: 2px solid black; */
/*     border-radius: 50%; */
    transform: rotate(-90deg);
    width: 20px;
    height: 20px;
    line-height: 17px;
  }
  #left-menu div.item > div.item div.item{
    padding-left: 16px
  }
  </style>
	
<script src="{{  URL::asset('js/app.js') }}"></script>
@include("footer")
	
	<script>
	  $('.test.modal').modal('attach events', 'a.learn-item', 'show');
		$('a.learn-item').on('click', function(e){
			e.preventDefault();
			var url = $(this).attr('href');
			
		});
	</script>
</body>    
</html>