<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vc;
use App\Http\Requests\cvRequest;
use Auth;
use Illuminate\Http\UploadedFile;
use App\Experience;
use App\Formation;
use App\Competence;
use App\Projet;

class CvController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }
	//lister les cv
    public function index(){
      //afficher tous les cv $cvs=Vc::all(); 
      // afficher les cv de user authentufier $cvs=Vc::where('user_id', Auth::user()->id)->get();
        // afficher cv de user authentufier avec la relation hasmany 
        if(Auth::user()->is_admin){
            $cvs=Vc::all(); 
        }else{
            $cvs=Auth::user()->cvs;
        }
       
       return view('cv.index2',['cvs' => $cvs]);

    }
    // affiche formulaire de creation de cv
    public function create(){
       return view('cv.create');
    }
    // enregister un cv
    public function store(cvRequest $request){
    	$cv=new Vc();
    	$cv->titer=$request->input('titer');
    	$cv->presentation=$request->input('presentation');
        $cv->user_id=Auth::user()->id;
         if($request->hasFile('image')){
          $cv->image = $request->image->store('images');
         }
        
    	$cv->save();
        session()->flash("success","Le CV à été bien enregistrer");
    	return redirect('cvs');
       //return $request->all(); 
    }
    // recupere un cv et mettre en formulaire
    public function edit($id){
    	$cv=Vc::find($id);

        $this->authorize('update',$cv);

    	return view('cv.edit',['cv' => $cv]);

    }
    //modifier le cv
    public function update(cvRequest $request,$id){
         $cv=Vc::find($id);
         $cv->titer=$request->input('titer');
         $cv->presentation=$request->input('presentation');
         if($request->hasFile('image')){
          $cv->image = $request->image->store('images');
         }
         $cv->save();
         return redirect('cvs');
    }
    //supprimer un cv
    public function destroy(Request $request, $id){
    	 $cv=Vc::find($id);
         
          $this->authorize('delete',$cv);

    	 $cv->delete();

    	 return redirect('cvs');


    }

    public function show($id){
        return view('cv.show',['id' =>$id]);
    }
    
    /*public function getexperiences($id){
        //$experiences=Experience::all();
        $cv=VC::find($id);

        return $cv->experiences()->orderBy('debut','desc')->get();
    }*/

    public function getdata($id){
        $cv=VC::find($id);
        $experiences=$cv->experiences()->orderBy('debut','desc')->get();
        $formations=$cv->formations()->orderBy('debut','desc')->get();
        $competences=$cv->competences()->orderBy('updated_at','desc')->get();
        $projets=$cv->projets()->orderBy('updated_at','desc')->get();

        return Response()->json([

                                 'experiences' =>$experiences,
                                 'formations'  =>$formations,
                                 'competences' =>$competences,
                                 'projets'     =>$projets,
                                ]);
    }

    //Experience

    public function addexperience(Request $request){

        $exp = new Experience();

        $exp->titre=$request->titre;
        $exp->body=$request->body;
        $exp->debut=$request->debut;
        $exp->fin=$request->fin;
        $exp->vc_id=$request->vc_id;

        $exp->save();

        return Response()->json(['etat' =>true,'id' => $exp->id]);



    }
    public function updateexperience(Request $request){
        $exp =Experience::find($request->id);

        $exp->titre=$request->titre;
        $exp->body=$request->body;
        $exp->debut=$request->debut;
        $exp->fin=$request->fin;
        $exp->vc_id=$request->vc_id;

        $exp->save();

        return Response()->json(['etat' =>true]);

    }

    public function deleteexperience($id){
        $exp=Experience::find($id);

        $exp->delete();

        return Response()->json(['etat' =>true]);
    }

    // END Experience

    //Formation

    public function addformation(Request $request){

        $form = new Formation();

        $form->titre=$request->titre;
        $form->body=$request->body;
        $form->debut=$request->debut;
        $form->fin=$request->fin;
        $form->vc_id=$request->vc_id;

        $form->save();

        return Response()->json(['etat' =>true,'id' => $form->id]);



    }
    public function updateformation(Request $request){
        $form =Formation::find($request->id);

        $form->titre=$request->titre;
        $form->body=$request->body;
        $form->debut=$request->debut;
        $form->fin=$request->fin;
        $form->vc_id=$request->vc_id;

        $form->save();
        return Response()->json(['etat' =>true]);

    }

    public function deleteformation($id){
        $form=Formation::find($id);

        $form->delete();

        return Response()->json(['etat' =>true]);
    }
    
    // END Formation

    //Competenece

    public function addcompetence(Request $request){

        $comp = new Competence();

        $comp->titre=$request->titre;
        $comp->body=$request->body;
        $comp->vc_id=$request->vc_id;

        $comp->save();

        return Response()->json(['etat' =>true,'id' => $comp->id]);



    }
    public function updatecompetence(Request $request){
        $comp =Competence::find($request->id);

        $comp->titre=$request->titre;
        $comp->body=$request->body;
        $comp->vc_id=$request->vc_id;

        $comp->save();
        return Response()->json(['etat' =>true]);

    }

    public function deletecompetence($id){
        $comp =Competence::find($id);

        $comp->delete();

        return Response()->json(['etat' =>true]);
    }
    
    // END Competence 

    //Projet

    public function addprojet(Request $request){

        $proj = new Projet();

        $proj->titre=$request->titre;
        $proj->body=$request->body;
        $proj->lien=$request->lien;
        $proj->image=$request->image;
        $proj->vc_id=$request->vc_id;

        $proj->save();

        return Response()->json(['etat' =>true,'id' => $proj->id]);



    }
    public function updateprojet(Request $request){
        $proj =Projet::find($request->id);

        $proj->titre=$request->titre;
        $proj->body=$request->body;
        $proj->lien=$request->lien;
        $proj->image=$request->image;
        $proj->vc_id=$request->vc_id;

        $proj->save();
        return Response()->json(['etat' =>true]);

    }

    public function deleteprojet($id){
         $proj =Projet::find($id);

        $proj->delete();

        return Response()->json(['etat' =>true]);
    }

    // END Projet 


}
