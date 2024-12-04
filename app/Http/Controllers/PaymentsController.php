<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $Payments = Payment::all();
            return response()->json($Payments, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de récupération de la liste des Payments", 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $payment = new Payment([
                "OrderID" => $request->input("OrderID"),
                "Amount" => $request->input("Amount"),
                "Method" => $request->input("Method"),
                "Status" => $request->input("Status"),
            ]);
            $payment->save();
            return response()->json($payment, 201);
        } catch (\Exception $e) {
            return response()->json("Insertion impossible du paiement", 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $payment = Payment::findOrFail($id);
            return response()->json($payment, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de récupération des données du paiement", 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->update($request->all());
            return response()->json($payment, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de modification du paiement", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->delete();
            return response()->json("Paiement supprimé avec succès", 200);
        } catch (\Exception $e) {
            return response()->json("Problème de suppression du paiement", 500);
        }
    }
}
