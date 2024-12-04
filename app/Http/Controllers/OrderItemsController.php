<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use Illuminate\Http\Request;

class OrderItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $orderItems = OrderItems::all();
            return response()->json($orderItems, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de récupération de la liste des items de commande", 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $orderItem = new OrderItems([
                "OrderID" => $request->input("OrderID"),
                "ProductID" => $request->input("ProductID"),
                "Quantity" => $request->input("Quantity"),
                "Price" => $request->input("Price"),
            ]);
            $orderItem->save();
            return response()->json($orderItem, 201);
        } catch (\Exception $e) {
            return response()->json("Insertion impossible de l'item de commande", 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $orderItem = OrderItems::findOrFail($id);
            return response()->json($orderItem, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de récupération des données de l'item de commande", 404);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $orderItem = OrderItems::findOrFail($id);
            $orderItem->update($request->all());
            return response()->json($orderItem, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de modification de l'item de commande", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $orderItem = OrderItems::findOrFail($id);
            $orderItem->delete();
            return response()->json("Item de commande supprimé avec succès", 200);
        } catch (\Exception $e) {
            return response()->json("Problème de suppression de l'item de commande", 500);
        }
    }
}
