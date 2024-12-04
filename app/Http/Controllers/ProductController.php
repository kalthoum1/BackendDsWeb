<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Product::all();
            return response()->json($products, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de récupération de la liste des produits", 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $product = new Product([
                "SCategoryID" => $request->input("SCategoryID"),
                "ProductName" => $request->input("ProductName"),
                "Description" => $request->input("Description"),
                "Price" => $request->input("Price"),
                "Stock" => $request->input("Stock"),
            ]);
            $product->save();
            return response()->json($product, 201);
        } catch (\Exception $e) {
            return response()->json("Insertion impossible du produit", 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
            return response()->json($product, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de récupération des données du produit", 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->update($request->all());
            return response()->json($product, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de modification du produit", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json("Produit supprimé avec succès", 200);
        } catch (\Exception $e) {
            return response()->json("Problème de suppression du produit", 500);
        }
    }
}
