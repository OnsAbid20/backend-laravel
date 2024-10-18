<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $categories=Categorie::all();// model categorie 9otlo jibli les categorie l kol 
            return response()->json($categories); //kif nheb njib haja m serv naamelo response bech irajaali liste des categorie ili jebhom l kol w request l aks mteha  ;
        }catch(\Exception $e){
            return response()->json("impossible de recuperer") ;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $categories=new Categorie([
                "nomcategorie"=>$request->input("nomcategorie"),
                "imagecategorie"=>$request->input("imagecategorie"),

            ]);
            $categories->save();
            return response ()->json()($categories,200);
        }
        catch(\Exception $e){
            return response()->json("ajout impossible ") ;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        try {
            $categorie=Categorie::findOrFail($id);
            return response()->json($categorie);
            } catch (\Exception $e) {
            return response()->json("probleme de récupération des données");
            }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    try {
        $categorie=Categorie::findorFail($id);
        $categorie->update($request->all());
        return response()->json($categorie);
        } catch (\Exception $e) {
        return response()->json("probleme de modification");
        }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    try {
        $categorie=Categorie::findOrFail($id);
        $categorie->delete();
        return response()->json("catégorie supprimée avec succes");
        } catch (\Exception $e) {
        return response()->json("probleme de suppression de catégorie");
        }
    }
}
