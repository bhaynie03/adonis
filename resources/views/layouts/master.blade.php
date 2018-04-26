<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>The Adonis Program</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="/css/adonis_blog.css" rel="stylesheet">


  </head>

  <body>

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">


          <div class="col-4 pt-1" id="Thisisaveryspecificid">
            <a class="text-muted" href="#"></a>
          </div>

          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="/">The Adonis Program</a>
          </div>

          <div class="col-4 d-flex justify-content-end align-items-center">

            @auth
            <a class="btn btn-sm btn-outline-secondary" href="{{ url('/') }}">{{ Auth::user()->name }}</a>
            <a class="btn btn-sm btn-outline-secondary" href="{{ url('logout') }}">Logout</a>

            @else
              <a class="btn btn-sm btn-outline-secondary" href="{{ url('login') }}">Login</a>
              <a class="btn btn-sm btn-outline-secondary" href="{{ url('register') }}">Sign up</a>
              
            @endif

          </div>
        </div>
      </header>

      @include ('layouts.nav')

      @yield ('content')

      <footer class="blog-footer">
      <p>This template was built by Bootstrap and re-purposed by <a href="mailto:brad.lee.jest@gmail.com">Brad Haynie</a></p>
      <p>
        <a href="/">Back to Main page</a>
      </p>
    </footer>

    </body>
</html>
<!-- this website is the original source of my template https://getbootstrap.com/docs/4.0/examples/blog/ -->