<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href=" {{asset('ass/css/bootstrap.min.css')}}">
<body>
<!-- la partie statique  -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="{{url('acceuil')}}">Acceuil</a></li>
        <li><a href="{{url('Service')}}">Service</a></li>
        <li><a href="{{url('Contact')}}">Contact</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- end la partie statique  -->
<!-- la partie dynamique  -->
@yield('content')

<!-- end la partie dynamique  -->

<script type="text/javascript" src="{{asset('ass/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('ass/js/jquery.min.js')}}"></script>
</body>
</html>