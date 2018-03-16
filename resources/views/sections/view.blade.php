@include("header")
<div id="app">
	<section-component slug_id="{{ $section_slug }} "></section-component>
</div>

<script src="{{  URL::asset('js/app.js') }}"></script>
@include("footer")
</body>    
</html>