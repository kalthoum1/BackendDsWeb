<?php

namespace App\Http\Controllers;

use App\Models\SCategory;
use Illuminate\Http\Request;

class SCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $scategories = SCategory::all();
            return response()->json($scategories, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de récupération de la liste des sous-catégories", 500);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $scategory = new SCategory([
                "SCategoryName" => $request->input("SCategoryName"),
                "SCategoryImage" => $request->input("SCategoryImage"),
                "CategoryID" => $request->input("CategoryID"),
            ]);
            $scategory->save();
            return response()->json($scategory, 201);
        } catch (\Exception $e) {
            return response()->json("Insertion impossible de la sous-catégorie", 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $scategory = SCategory::findOrFail($id);
            return response()->json($scategory, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de récupération des données de la sous-catégorie", 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $scategory = SCategory::findOrFail($id);
            $scategory->update($request->all());
            return response()->json($scategory, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de modification de la sous-catégorie", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $scategory = SCategory::findOrFail($id);
            $scategory->delete();
            return response()->json("Sous-catégorie supprimée avec succès", 200);
        } catch (\Exception $e) {
            return response()->json("Problème de suppression de la sous-catégorie", 500);
        }
    }
}
