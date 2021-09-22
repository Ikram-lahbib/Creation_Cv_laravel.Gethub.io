@extends('layouts.app')


@section('content')

<!--@if(count($errors))
     <div class="alert alert-danger" role="alert">
     	<ul>
     		@foreach($errors->all() as $msg)
             <li>{{$msg}}</li>
     		@endforeach
     	</ul>
     </div>
@endif-->
 
 <div class="container">
 	<div class="row">
 		<div class="col-md-12">
 			<form action="{{url('cvs')}}" method="post"  enctype="multipart/form-data">
 				<!-- generer token (securiser le formulaire)-->
 				{{csrf_field()}}
 				<!--end token -->
 				<div class="form-group @if($errors->get('titer')) has-error  @endif">
 					<label for="">Titer</label>
 					<input type="text" name="titer" class="form-control" value="{{old('titer')}}">
 					@if($errors->get('titer'))
                       <div class="alert alert-danger" role="alert">
     	                <ul>
     		                @foreach($errors->get('titer') as $msg)
                                <li>{{$msg}}</li>
     		                @endforeach
     	                </ul>
                       </div>
                    @endif
 					
 				</div>
 				<div class="form-group @if($errors->get('presentation')) has-error @endif">
 					<label for="">Presentation</label>
 					<textarea name="presentation" class="form-control"> {{old('presentation')}}</textarea>
 					@if($errors->get('presentation'))
                     <div class="alert alert-danger" role="alert">
     	                <ul>
     		                @foreach($errors->get('presentation') as $msg)
                                <li>{{$msg}}</li>
     		                @endforeach
     	                </ul>
     	            </div>
                       
                    @endif
 					
 				</div>

                <div class="form-group">
                    <label for="">Image</label>
                    <input class="form-control" type="file" name="image" >
                </div>
 				<div class="form-group">
 					<input type="submit" name="op" value="Enregister" class="form-control btn btn-primary">
 				</div>

 			</form>
 		</div>
 	</div>

 </div>


@endsection