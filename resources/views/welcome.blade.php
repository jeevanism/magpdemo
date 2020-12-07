
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Wallys Widget Delivery</title>

    <link rel="canonical" href="#">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
     <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
 
  </head>

  

  <body class="text-center">
    <div class="jumbotron">
  
  <hr class="my-4">
  <div class="shadow-sm p-3 mb-5 bg-white rounded ">
    <h4>Welcome to <strong>Wallys Widget</strong> Delivery Service</h4>
   
      <form  action="{{route('home')}}" method="POST" class="form-signin">
      @csrf
      <img class="mb-4" src="{{url('/images/stick.jpg')}}" >
      <h6 class="h6 mb-3 font-weight-normal">Please Enter the Required Widgets</h6>
      <label for="inputOrder" class="sr-only">Enter Widget Order</label>
      <input type="inputOrder" id="inputOrder" name="inputOrder" class="form-control" placeholder="Enter Digits Only" required autofocus>
      
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Order Submit</button>
      <p class="mt-5 mb-3 text-muted">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
    </form>
    </div>
   
</div>
    
    
  </body>
</html>
