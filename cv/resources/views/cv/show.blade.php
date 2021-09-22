@extends('layouts.app')


@section('content')

<div class="container" id="root">
  <div class="row">
    <div class="col-md-12">
    	<h1>@{{ message }}</h1>
    	<div class="panel panel-primary">
    		<div class="panel-heading">
    			<div class="row">
    				<div class="col-md-10"><h3 class="panel-titel">Experience</h3>	</div>
    				<div class="col-md-2 text-right">
    					<button class="btn btn-success" v-on:click="open.experience=true"> Ajouter</button>
    				</div>
    			</div>
    			
    		</div>
    		<div calss="panel-body">
    			<div v-if="open.experience">
                    <form @submit.prevent="validateForm('form-exp')" data-vv-scope="form-exp">
    				<div :class="{'form-group':true,'has-error' :errors.has('form-exp.titre')}">
    					<label for="">Titer</label>
    					<input type="text" v-validate="'required'" name="titre" class="form-control" placeholder="Titer" v-model="experience.titre" >
                        <label class="control-label" v-show="errors.has('form-exp.titre')">@{{ errors.first('form-exp.titre')}}</label>
    				</div>

    				<div class="form-group">
    					<label for="">Body</label>
    					<textarea class="form-control" name="body" v-validate="'required|min:5|max:255'" placeholder="Contenue" v-model="experience.body"  ></textarea>
                        <label class="control-label" v-show="errors.has('form-exp.body')">@{{ errors.first('form-exp.body')}}</label>
    				</div>

    				<div class="row ">
    					<div class="col-md-6">
    						<label for="">Debut</label>
    					    <input class="form-control" v-validate="'required'" type="date" name="debut" v-model="experience.debut" >

                            <label class="control-label" v-show="errors.has('form-exp.debut')">@{{ errors.first('form-exp.debut')}}</label>
    					</div>
    					<div class="col-md-6 ">
    						<label for="">Fin</label>
    					    <input class="form-control"  v-validate="'required'" type="date" name="fin" v-model="experience.fin" >
                            <label class="control-label" v-show="errors.has('form-exp.fin')">@{{ errors.first('form-exp.fin')}}</label>
    					</div>
    				</div>

    				<button v-if="edit.experience" class="btn btn-danger btn-block" @click="updateExperience">Modifier</button>
    				<button type="submit" v-else class="btn btn-info">Ajouter</button>
                    <button  class="btn btn-default" @click="open.experience=false">Fermer</button>


    			</div>
    			<ul class="list-group">
    				<li calss="list-group-item" v-for="exp in experiences">
    					<div class="pull-right">
    						<button class="btn btn-warning btn-sm" @click="editExperience(exp)">Editer</button>
    						<button class="btn btn-danger btn-sm" @click="deleteExperience(exp)">Supprimer</button>
    					</div>
    					<h3>@{{exp.titre}}</h3>
    					<p>@{{exp.body}}</p>
    					<small>@{{exp.debut}}-@{{exp.fin}}</small>
    				</li>
    			</ul>
    		</div>
    	</div>
        </form>
         <hr>
         <!-- ------------- ----------------------Formation ---------------------------------------------->
    	<div class="panel panel-primary">
    		<div class="panel-heading">
    			<div class="row">
    				<div class="col-md-10"><h3 class="panel-titel">Formation</h3></div>
    				<div class="col-md-2 text-right">
    					<button class="btn btn-success" v-on:click="open.formation=true"> Ajouter</button>
    				</div>
    			</div>
    				
    		</div>
    		<div calss="panel-body">
    			<div v-if="open.formation">
    				<div class="form-group">
    					<label for="">Titer</label>
    					<input type="text" name="titre" class="form-control" placeholder="Titer" v-model="formation.titre" >
    				</div>

    				<div class="form-group">
    					<label for="">Body</label>
    					<textarea class="form-control" placeholder="Contenue" v-model="formation.body"  ></textarea>
    				</div>

    				<div class="row ">
    					<div class="col-md-6">
    						<label for="">Debut</label>
    					    <input class="form-control" type="date" name="debut" v-model="formation.debut" >
    					</div>
    					<div class="col-md-6 ">
    						<label for="">Fin</label>
    					    <input class="form-control" type="date" name="fint" v-model="formation.fin" >
    					</div>
    				</div>

    				<button v-if="edit.formation" class="btn btn-danger btn-block" @click="updateFormation">Modifier</button>
    				<button v-else class="btn btn-info" @click="addFormation">Ajouter</button>
                    <button  class="btn btn-default" @click="open.formation=false">Fermer</button>


    			</div>
    			<ul class="list-group">
    				<li calss="list-group-item" v-for="form in formations">
    					<div class="pull-right">
    						<button class="btn btn-warning btn-sm" @click="editFormation(form)">Editer</button>
    						<button class="btn btn-danger btn-sm" @click="deleteFormation(form)">Supprimer</button>
    					</div>
    					<h3>@{{form.titre}}</h3>
    					<p>@{{form.body}}</p>
    					<small>@{{form.debut}}-@{{form.fin}}</small>
    				</li>
    			</ul>
    		</div>
    	</div>
    	 <!-- ------------- ---------------------- Fin Formation ----------------------------------------->

    	 <!-- ------------- ---------------------- Competence ----------------------------------------->
         <hr>
    	<div class="panel panel-primary">
    		<div class="panel-heading">
    			<div class="row">
    				<div class="col-md-10"><h3 class="panel-titel">Competence</h3>	</div>
    				<div class="col-md-2 text-right">
    					<button class="btn btn-success" v-on:click="open.competence=true"> Ajouter</button>
    				</div>
    			</div>
    			
    		</div>
    		<div calss="panel-body">
    			<div v-if="open.competence">
    				<div class="form-group">
    					<label for="">Titer</label>
    					<input type="text" name="titre" class="form-control" placeholder="Titer" v-model="competence.titre" >
    				</div>

    				<div class="form-group">
    					<label for="">Body</label>
    					<textarea class="form-control" placeholder="Contenue" v-model="competence.body"  ></textarea>
    				</div>


    				<button v-if="edit.competence" class="btn btn-danger btn-block" @click="updateCompetence">Modifier</button>
    				<button v-else class="btn btn-info" @click="addCompetence">Ajouter</button>
                    <button  class="btn btn-default" @click="open.competence=false">Fermer</button>


    			</div>
    			<ul class="list-group">
    				<li calss="list-group-item" v-for="comp in competences">
    					<div class="pull-right">
    						<button class="btn btn-warning btn-sm" @click="editCompetence(comp)">Editer</button>
    						<button class="btn btn-danger btn-sm" @click="deleteCompetence(comp)">Supprimer</button>
    					</div>
    					<h3>@{{comp.titre}}</h3>
    					<p>@{{comp.body}}</p>
    				</li>
    			</ul>
    		</div>
    	</div>
    	<!--------------------------------------------Fin Competence-------------------------------------->

    	<!--------------------------------------------Projet-------------------------------------->
        <hr>
    	<div class="panel panel-primary">
    		<div class="panel-heading ">
    			<div class="row">
    				<div class="col-md-10"><h3 class="panel-titel">Projet</h3></div>
    				<div class="col-md-2 text-right">
    					<button class="btn btn-success" v-on:click="open.projet=true"> Ajouter</button>
    				</div>
    			</div>
    				
    		</div>
    		<div calss="panel-body">
    			<div v-if="open.projet">
    				<div class="form-group">
    					<label for="">Titer</label>
    					<input type="text" name="titre" class="form-control" placeholder="Titer" v-model="projet.titre" >
    				</div>

    				<div class="form-group">
    					<label for="">Body</label>
    					<textarea class="form-control" placeholder="Contenue" v-model="projet.body"  ></textarea>
    				</div>
                    <div class="row ">
    				  <div class="col-md-6">
    				      <div class="form-group">
    					     <label for="">Lien</label>
    					     <input type="url" name="lien" class="form-control" placeholder="Lien" v-model="projet.lien" >
    					 </div>
    				  </div>

    				<div class="col-md-6">
    				   <div class="form-group">
    					  <label for="">Image</label>
    					  <input type="url" name="image" class="form-control" placeholder="Image" v-model="projet.image" >	
    				  </div>
    				</div>
    			 </div>


    				<button v-if="edit.projet" class="btn btn-danger btn-block" @click="updateProjet">Modifier</button>
    				<button v-else class="btn btn-info" @click="addProjet">Ajouter</button>
    				<button  class="btn btn-default" @click="open.projet=false">Fermer</button>


    			</div>
    			<ul class="list-group">
    				<li calss="list-group-item" v-for="proj in projets">
    					<div class="pull-right">
    						<button class="btn btn-warning btn-sm" @click="editProjet(proj)">Editer</button>
    						<button class="btn btn-danger btn-sm" @click="deleteProjet(proj)">Supprimer</button>
    					</div>
    					<h3>@{{proj.titre}}</h3>
    					<p>@{{proj.body}}</p>
    					<small> <a :href="projet.lien"> Voir....</a> </small>
    				</li>
    			</ul>
    		</div>
    	</div>
        <!--------------------------------------------Fin Projet-------------------------------------->

    </div>
   </div>
</div>
@endsection

@section('javascripts')
<script src="{{asset('js/vue.js')}}"></script>
<!-- jsdelivr cdn -->
  <script src="https://cdn.jsdelivr.net/npm/vee-validate@<3.0.0/dist/vee-validate.js"></script>

  <!-- unpkg -->
  <script src="https://unpkg.com/vee-validate@<3.0.0"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script >
    Vue.use(VeeValidate);

	window.Laravel ={!! json_encode([
		'csrfToken'     => csrf_token(),
		'idExperience'  =>$id,
		'url'           =>url('/')

		]) !!};
</script>
<script src="{{ asset('js/script.js')}}"></script>


@endsection


