 var app=new Vue({
      el:'#root',
      data:{
      	message:"bonjour ikram",
      	experiences : [],
        competences : [],
        formations :[],
        projets : [],
      	//open:false,
      	//edit:false,
        open:{
          experience:false,
          competence:false,
          formation:false,
          projet:false,
        },
        edit:{
          experience:false,
          competence:false,
          formation:false,
          projet:false,
        },
      	//objet binding 
      	experience:{
      		id:0,
      		titre:'',
      		body:'',
      		debut:'',
      		fin:'',
      		vc_id:window.Laravel.idExperience
      	},
        competence:{
          id:0,
          titre:'',
          body:'',
          vc_id:window.Laravel.idExperience
        },
        formation:{
          id:0,
          titre:'',
          body:'',
          debut:'',
          fin:'',
          vc_id:window.Laravel.idExperience
        },
        projet:{
          id:0,
          titre:'',
          body:'',
          lien:'',
          image:'',
          vc_id:window.Laravel.idExperience
        }
      },

      methods:{
      	/*getExperiences: function(){
      		axios.get(window.Laravel.url+'/getexperiences/'+window.Laravel.idExperience)
      		     .then(response=>{
      		     	console.log('success :', response)
      		     	this.experiences = response.data;
                       

      		     })
      		     .cath(error=>{
      		     	console.log('errors :', error);
      		     })
      	},*/
        getData : function(){
          axios.get(window.Laravel.url+'/getdata/'+window.Laravel.idExperience)
               .then(response=>{
                console.log('success :', response)
                this.experiences = response.data.experiences;
                this.formations=response.data.formations;
                this.competences=response.data.competences;
                this.projets=response.data.projets;                       
               })
               .cath(error=>{
                console.log('errors :', error);
               })
        },
      	addExperience:function(){
      		axios.post(window.Laravel.url+'/addexperience',this.experience)
      		     .then(response=>{
      		     	console.log('success :', response)
      		     	if(response.data.etat){
      		     		this.open.experience=false;

      		     		this.experience.id=response.data.id;
      		     		//this.experiences.push(this.experience); ajouter a la fin de la liste
      		     		this.experiences.unshift(this.experience);


      		     		this.experience ={
      		     			      		id:0,
      		                            titre:'',
      		                            body:'',
      		                            debut:'',
      		                            fin:'',
      		                            vc_id:window.Laravel.idExperience

      		     		};
      		     	}

      		     })
      		     .cath(error=>{
      		     	console.log('errors :', error);
      		     })
      	
        },
        editExperience: function(exp){
        	this.open.experience=true;
      	    this.edit.experience=true;
      	    this.experience=exp;
          },
        updateExperience : function(){
        	axios.put(window.Laravel.url+'/updateexperience',this.experience)
      		     .then(response=>{
      		     	console.log('success :', response)
      		     	if(response.data.etat){
      		     		this.open.experience=false;
      		     		this.experience ={
      		     			      		id:0,
      		                            titre:'',
      		                            body:'',
      		                            debut:'',
      		                            fin:'',
      		                            vc_id:window.Laravel.idExperience

      		     		};
      		     	}
      		     	    this.edit.experience=false;

      		     })
      		     .cath(error=>{
      		     	console.log('errors :', error);
      		     })
      	


        },
        deleteExperience : function(exp){

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
             }).then((result) => {
                   if (result.value) {
                   	Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                   	//suupression code
             	axios.delete(window.Laravel.url+'/deleteexperience/'+exp.id)
      		     .then(response=>{
      		     	console.log('success :', response)
      		     	if(response.data.etat){
      		     		var position=this.experiences.indexOf(exp);
      		     		//supprimer un element de la lists experiences 2 argument 1er position et 2 eme nb des elm quand vent suppriler aprés cette elemment
      		     		this.experiences.splice(position,1);
      		     	 }      		     	   
      		       })
      		     .cath(error=>{
      		     	console.log('errors :', error);
      		     })
      		     //end suppression code
                    
                    }
            })
        },
        addFormation : function(){
          axios.post(window.Laravel.url+'/addformation',this.formation)
               .then(response=>{
                console.log('success :', response)
                if(response.data.etat){
                  this.open.formation=false;

                  this.formation.id=response.data.id;
                  //this.experiences.push(this.experience); ajouter a la fin de la liste
                  this.formations.unshift(this.formation);


                  this.formation ={
                              id:0,
                                      titre:'',
                                      body:'',
                                      debut:'',
                                      fin:'',
                                      vc_id:window.Laravel.idExperience

                  };
                }

               })
               .cath(error=>{
                console.log('errors :', error);
               })

        },
        editFormation : function(form){
            this.open.formation=true;
            this.edit.formation=true;
            this.formation=form;

        },
        updateFormation : function (){
          axios.put(window.Laravel.url+'/updateformation',this.formation)
               .then(response=>{
                console.log('success :', response)
                if(response.data.etat){
                  this.open.formation=false;
                  this.formation ={
                              id:0,
                                      titre:'',
                                      body:'',
                                      debut:'',
                                      fin:'',
                                      vc_id:window.Laravel.idExperience

                  };
                }
                    this.edit.formation=false;

               })
               .cath(error=>{
                console.log('errors :', error);
               })

        },
        deleteFormation : function(form){
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
             }).then((result) => {
                   if (result.value) {
                    Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                    //suupression code
              axios.delete(window.Laravel.url+'/deleteformation/'+form.id)
               .then(response=>{
                console.log('success :', response)
                if(response.data.etat){
                  var position=this.formations.indexOf(form);
                  //supprimer un element de la lists experiences 2 argument 1er position et 2 eme nb des elm quand vent suppriler aprés cette elemment
                  this.formations.splice(position,1);
                 }                   
                 })
               .cath(error=>{
                console.log('errors :', error);
               })
               //end suppression code
                    
                    }
            })

        },
        addCompetence : function(){
          axios.post(window.Laravel.url+'/addcompetence',this.competence)
               .then(response=>{
                console.log('success :', response)
                if(response.data.etat){
                  this.open.competence=false;

                  this.competence.id=response.data.id;
                  //this.experiences.push(this.experience); ajouter a la fin de la liste
                  this.competences.unshift(this.competence);


                  this.competence ={
                                      id:0,
                                      titre:'',
                                      body:'',
                                      vc_id:window.Laravel.idExperience

                  };
                }

               })
               .cath(error=>{
                console.log('errors :', error);
               })

        },
        editCompetence : function(comp){
            this.open.competence=true;
            this.edit.competence=true;
            this.competence=comp;

        },
        updateCompetence : function (){
          axios.put(window.Laravel.url+'/updatecompetence',this.competence)
               .then(response=>{
                console.log('success :', response)
                if(response.data.etat){
                  this.open.competence=false;
                  this.competence ={
                              id:0,
                                      titre:'',
                                      body:'',                                     
                                      vc_id:window.Laravel.idExperience

                  };
                }
                    this.edit.competence=false;

               })
               .cath(error=>{
                console.log('errors :', error);
               })

        },
        deleteCompetence : function(comp){
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
             }).then((result) => {
                   if (result.value) {
                    Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                    //suupression code
              axios.delete(window.Laravel.url+'/deletecompetence/'+comp.id)
               .then(response=>{
                console.log('success :', response)
                if(response.data.etat){
                  var position=this.competences.indexOf(comp);
                  //supprimer un element de la lists experiences 2 argument 1er position et 2 eme nb des elm quand vent suppriler aprés cette elemment
                  this.competences.splice(position,1);
                 }                   
                 })
               .cath(error=>{
                console.log('errors :', error);
               })
               //end suppression code
                    
                    }
            })

        },
        addProjet : function(){
          axios.post(window.Laravel.url+'/addprojet',this.projet)
               .then(response=>{
                console.log('success :', response)
                if(response.data.etat){
                  this.open.projet=false;

                  this.projet.id=response.data.id;
                  //this.experiences.push(this.experience); ajouter a la fin de la liste
                  this.competences.unshift(this.projet);


                  this.projet ={
                                      id:0,
                                      titre:'',
                                      body:'',
                                      lien:'',
                                      image:'',
                                      vc_id:window.Laravel.idExperience

                  };
                }

               })
               .cath(error=>{
                console.log('errors :', error);
               })

        },
        editProjet : function(proj){
            this.open.projet=true;
            this.edit.projet=true;
            this.projet=proj;

        },
        updateProjet : function (){
          axios.put(window.Laravel.url+'/updateprojet',this.projet)
               .then(response=>{
                console.log('success :', response)
                if(response.data.etat){
                  this.open.projet=false;
                  this.projet ={
                              id:0,
                                      titre:'',
                                      body:'',  
                                      lien:'',
                                      image:'',                                   
                                      vc_id:window.Laravel.idExperience

                  };
                }
                    this.edit.projet=false;

               })
               .cath(error=>{
                console.log('errors :', error);
               })

        },
        deleteProjet : function(proj){
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
             }).then((result) => {
                   if (result.value) {
                    Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                    //suupression code
              axios.delete(window.Laravel.url+'/deleteprojet/'+proj.id)
               .then(response=>{
                console.log('success :', response)
                if(response.data.etat){
                  var position=this.projets.indexOf(proj);
                  //supprimer un element de la lists experiences 2 argument 1er position et 2 eme nb des elm quand vent suppriler aprés cette elemment
                  this.projets.splice(position,1);
                 }                   
                 })
               .cath(error=>{
                console.log('errors :', error);
               })
               //end suppression code
                    
                    }
            })

        },
        validateForm(scope){
          this.$validator.validateAll(scope).then((result) =>{
            if(result){
              this.addExperience();
            }

          });
        }



      },
      created : function(){
      	this.getData();
      }


	 });
