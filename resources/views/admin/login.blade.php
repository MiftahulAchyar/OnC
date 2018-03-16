<!DOCTYPE html>
  <head>    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('semantic/dist-semantic/semantic.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 350px;
    }
  </style>
  </head>
<body>
  <div class="ui middle aligned center aligned grid">
    <div class="column">
      <h2 class="ui teal image header">
        <div class="content">
          Login Administrator
        </div>
      </h2>
      <form class="ui large form" method="POST" action="{{ url('admin/login') }}">
        {{ csrf_field() }}
        <div class="ui stacked segment">
          <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" name="email" value="superadministrator@app.com" placeholder="E-mail address">
            </div>
          </div>
          <div class="field">
            <div class="ui left icon input">
              <i class="lock icon"></i>
              <input type="password" name="password" value="123456" placeholder="Password">
            </div>
          </div>
          <button class="ui fluid large teal submit button">Login</button>
        </div>


      </form>
      <br>

          @if ($errors->any())
          <div class="alert alert-danger">
            
            @foreach ($errors->all() as $error)       
            <div class="ui error message">
              <div class="header">Terjadi Kesalahan</div>
              <p>{{ $error }}</p>
            </div>
            @endforeach
          </div>

          @endif

    </div>
  </div>
</body>
<script src="{{ URL::asset('js/jquery.min.js') }}"></script>  
<script src="{{ asset('semantic/dist-semantic/semantic.min.js') }}"></script>
</html>