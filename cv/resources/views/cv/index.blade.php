@extends('layouts.app')



@section('content')

<div class="container">
 	<div class="row">
 		<div class="col-md-12">
 			<h1>La liste des Cvs</h1>
 			<div class="pull-right">
 				<a href="{{'cvs/create'}}" class="btn btn-success">Nouveau Cv</a>
 			</div>
 			<table class="table">
 				<head>
 					<tr>
 						<th>Titel</th>
 						<th>Presentation</th>
 						<th>Date</th>
 						<th>Action</th>

 					</tr>

 				</head>
 				<body>
 					@foreach($cvs as $cv)
 					<tr>
 						<td>{{$cv->titer}}  <br> {{$cv->user->name}}</td>
 						<td>{{$cv->presentation}}</td>
 						<td>{{$cv->created_at}}</td>
 						<td>
 							<form action="{{url('cvs/'.$cv->id)}}" method="post">
 				              <!--<input type="hidden" name="_method" value="DELETE"> Form Method Spoofing-->
 				              <!-- generer token (securiser le formulaire) et hedden pour la methode delete -->
 				               {{csrf_field()}}
 				               {{method_field('DELETE')}}
 				              <!--end token -->
 				            <a href="{{url('')}}" class="btn btn-primary">Detail</a>
 							<a href="{{url('cvs/'.$cv->id.'/edit')}}" class="btn btn-default">Edite</a>
 							<button type="submit" class="btn btn-danger">Supprimer</button> 
 						</form>
 						</td>

 					</tr>
                    @endforeach
 				</body>

 			</table>
 		</div>
 	</div>
 </div>

@endsection