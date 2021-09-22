@extends('layouts.app')


@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>La liste des Cvs</h1>
      <div class="pull-right">
        <a href="{{'cvs/create'}}" class="btn btn-success">Nouveau Cv</a>
      </div>
      <div class="row">
        @foreach($cvs as $cv)
          <div class="col-sm-6 col-md-4">
             <div class="thumbnail">
                 <img src="{{ asset('storage/'.$cv->image)}}" alt="...">
                    <div class="caption">
                       <h3>{{$cv->titer}}</h3>
                        <p>{{$cv->presentation}}</p>
                         <p>
                          <form action="{{url('cvs/'.$cv->id)}}" method="post">
                            <!--<input type="hidden" name="_method" value="DELETE"> Form Method Spoofing-->
                            <!-- generer token (securiser le formulaire) et hedden pour la methode delete -->
                                   {{csrf_field()}}
                                   {{method_field('DELETE')}}
                                  <!--end token -->
                             <a href="{{url('cvs/'.$cv->id)}}" class="btn btn-primary">Detail</a>
                             <a href="{{url('cvs/'.$cv->id.'/edit')}}" class="btn btn-default">Edite</a>
                             <!-- cacher le buuton supprimer des cv n'aprtien pas a un utilisateur-->
                             @can('delete',$cv)
                             <button type="submit" class="btn btn-danger">Supprimer</button> 
                             @endcan
                          </form>
                        </p>
                    </div>
              </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
 </div>
 

@endsection