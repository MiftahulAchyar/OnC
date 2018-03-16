<html>
  <head>    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('semantic/dist-semantic/semantic.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
  </head>
<body>
 <div class="ui fixed  menu">
  <div class="ui container">
    <a href="{{url('admin')}}" class="header item">
      <i class="bar chart icon"></i>
      Admin Panel

    </a>
    
    <div class="right menu">
      <div class="borderless item">
        Login as <strong> &nbsp;{{ Auth::user()->name }} </strong>
      </div>
      <div class="borderless item">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" id="userbutton" class="ui right labeled icon teal button"><i class="sign out icon"></i> Sign out
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </div>
    </div>

  </div>

</div>
