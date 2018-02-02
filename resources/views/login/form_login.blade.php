
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Halaman Login</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  </head>

  <body>

    <div class="container">
    <div class="col-md-4 col-md-offset-4">
        
      <form class="form-signin" action="{{ url('cek_login') }}" method="POST">
      {{ csrf_field() }}
        <h2 class="form-signin-heading">Halaman Login</h2>
        <div class="form-group">
            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username or Email" required autofocus>
        </div>
        <div class="form-group">    
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        </div>
        
        <!-- <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> -->
        <div class="form-group">
          <span class="pull left">
            <button class="btn btn-primary" type="submit">Login</button>
          </span>
          <span class="pull-right">
            <a href="{{ url('register') }}">Register</a>
          </span>
        </div>
      </form>

    </div>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  </body>
</html>
