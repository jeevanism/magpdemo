
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
     <section class="jumbotron text-center">
      <div class="shadow-sm p-3 mb-5 bg-white rounded ">
        <div class="container">
           <img class="mb-4" src="{{url('/images/stick.jpg')}}" >
          <h1 class="jumbotron-heading">Widget Delivery</h1>
          <p class="lead text-muted">Below listed packages are out for delivery.</p>
          
          <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Package Size</th>
      <th scope="col">Package No</th>
      
    </tr>
  </thead>
  <tbody>
    @php $i = 0; 

    @endphp
    @foreach($occurence as $k=>$out)
    
             
              <tr>
      <th scope="row">{{++$i}}</th>
     
      <td> {{ $k}}</td>
       <td> {{$out}}</td> 
     
    </tr>
     
            @endforeach
     
    
     
  </tbody>
</table>
          <a href="{{url('/')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">back to Home</a>

        </div>
        <p class="mt-5 mb-3 text-muted">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
      </section>
      
    </div>  

  </body>
</html>
