<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{

// ************************** récupperer un etudiant *****************************

    public function index()

    {
        $etudiants = Etudiant::orderBy("nom", "asc")->paginate(5);
        return view("etudiant", compact("etudiants"));
    }

    public function create()

    {
        $classes = Classe::all();
        return view("createEtudiant", compact("classes"));
    }

    // alerte message


// ************************** Enregistrer un etudiant *****************************

    public function store(Request $request){

        $request->validate(["nom"=> "required", "prenom"=>"required","classe_id"=>"required"]);

       // Etudiant::create($request->all());  l'orsque fillable definit

       Etudiant::create(["nom"=>$request->nom,"prenom"=>$request->prenom, "classe_id"=>$request->classe_id,]);

       return back() ->with("message", "Etudiant ajouté avec succès!");
    }


    // ************************** Mise à jour un etudiant *****************************

    public function update(Request $request, Etudiant $etudiant){

        $request->validate(["nom"=> "required", "prenom"=>"required","classe_id"=>"required"]);

       // Etudiant::create($request->all());  l'orsque fillable definit

       $etudiant->update(["nom"=>$request->nom,"prenom"=>$request->prenom, "classe_id"=>$request->classe_id,]);

       return back() ->with("message", "Etudiant mise à jour avec succès!");
    }

    public function edit(Etudiant $etudiant)

    {
        $classes = Classe::all();
        return view("editEtudiant", compact("etudiant", "classes"));
        
    }

// ************************** Supprimer un etudiant *****************************

    public function delete(Etudiant $etudiant)
    {
        $nom_complet = $etudiant->nom ." ".$etudiant->prenom;
       $etudiant->delete();
       return back() ->with("message", "l'Etudiant '$nom_complet' Supprimé avec succès!");

    }

}

