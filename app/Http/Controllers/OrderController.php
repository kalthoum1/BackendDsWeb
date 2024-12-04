<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $orders = Order::all();
            return response()->json($orders, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de récupération de la liste des commandes", 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $order = new Order([
                "CustomerID" => $request->input("CustomerID"),
                "Total" => $request->input("Total"),
                "Status" => $request->input("Status"),
            ]);
            $order->save();
            return response()->json($order, 201);
        } catch (\Exception $e) {
            return response()->json("Insertion impossible de la commande", 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $order = Order::findOrFail($id);
            return response()->json($order, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de récupération des données de la commande", 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->update($request->all());
            return response()->json($order, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de modification de la commande", 500);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();
            return response()->json("Commande supprimée avec succès", 200);
        } catch (\Exception $e) {
            return response()->json("Problème de suppression de la commande", 500);
        }
    }
}
