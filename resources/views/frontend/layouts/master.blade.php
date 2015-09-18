<!DOCTYPE html>
<html lang="es">
  <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="description" content="">
	  <meta name="author" content="">

	  <title>Agency - Start Bootstrap Theme</title>

	  @include('frontend.partials.style')

  </head>

  <body id="page-top" class="index">
	  @include('frontend.partials.navbar')

	  @yield('content') 

	  @include('frontend.partials.footer')

	  @include('frontend.partials.script')
  </body>

</html>