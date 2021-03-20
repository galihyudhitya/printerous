<style>
  .text-muted {
    /* padding-top: 10px !important;
    padding-bottom: 1px !important; */
    margin: 0px !important;
  }
</style>

<!doctype html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <title>{{ config('app.name', 'Laravel') }}</title>

      <script src="{{ asset('js/app.js') }}" defer></script>
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>   
  </html>


    <!-- app/views/layouts/master.blade.php -->
<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta name="description" content="Simple CMS" />
      <meta name="author" content="Sheikh Heera" />

      <title>Printerous</title>

      <link rel="stylesheet" type="text/css" href="/css/app.css">
      <script type="text/javascript" src="/js/app.js"></script>
    </head>
    
<!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="{{url('image/printerous_logo.png')}}">

    </head>
    <body>
      <div>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
          <!-- <a class="navbar-brand" href="#">Printerous</a> -->
          <img src="{{url('image/printerous_logo2.png')}}" class="navbar-brand" width="8%">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{url('organization')}}">Organization <span class="sr-only">(current)</span></a>
              </li>
              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li> -->
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <?php
                if($_SESSION['auth'] == 'admin') {
                  echo '<a href="'.url("adminpage").'" class="btn btn-outline-success my-2 my-sm-2">Administrator Menu</a>';
                  echo '&nbsp;&nbsp';
                } 
              ?>
              <p class="btn btn-outline-success my-2 my-sm-2">{{ $_SESSION['name'] }}</p>
              &nbsp;&nbsp;
              <p class="btn btn-outline-success my-2 my-sm-0"><a href="/logout">Log Out</a></p>
            </form>
          </div>
        </nav>
      </div>
        <div>

        <main role="main" class="container">
          
        @yield('content')

    </main>
        </div>
        <footer class="py-4 bg-dark flex-shrink-0">
        <div class="container text-center">
          <p class="text-muted">&copy 2019 Galih Yudhitya Utama. <br>All Right Reserved</p>
        </div>
        </footer>

        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      </body>
    </html>
