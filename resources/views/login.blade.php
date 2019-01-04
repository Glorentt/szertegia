<!doctype html>
<html lang="en">
  <head>
    <title>Szertegia-Tracking</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" href=" assets/images/miniatura-png.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/assets/css/sesion.css') }}">
  </head>
  <body>
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <body translate="no" >

      <div class="wrapper">
      <div class="container">

        <h1>Szertegia</h1>
        <h4 class="text-secondary">Tracking sheet</h4>

        <form class="form" method="POST" id="login" action="{{route('login.submit')}} " >
          <input type="hidden" name="_token" id="token" value="{{ Session::token() }}" />
          <input type="text" placeholder="email" name="email" id="email">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                </span>
            @endif
          <input type="password" placeholder="Password" name="password" id="password">
          @if ($errors->has('password'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('password') }}</strong>
                </span>
            @endif
          <button type="submit" id="login-button" form="login">Login</button>
          <div class="col-md-12"></div>
          <a href="/time" target="_blank" class="btn btn-warning">if you want to see your time connection, click here</a>
          <div class="col-md-12"></div>
          <a href="/paysheet" target="_blank" class="btn btn-warning">	paysheet</a>
        </form>

      </div>

      <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>

    <script >
      $("#login-button").click(function (event) {

        var email = $('#email').val();
        var pass = $('#password').val();
        var tocken = "{{ csrf_token() }}";
        $('h1').html('Welcome- come in');
        $('form').fadeOut(500);
        $('.wrapper').addClass('form-success');
        $( "#login" ).submit(function( event ) {


        });

      });

      //# sourceURL=pen.js
    </script>
    </body>
  </body>
</html>
