<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $customers = Customer::all();
            return response()->json($customers, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de récupération de la liste des clients", 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $customer = new Customer([
                "name" => $request->input("name"),
                "last_name" => $request->input("last_name"),
                "address" => $request->input("address"),
                "phone_num" => $request->input("phone_num"),
            ]);
            $customer->save();
            return response()->json($customer, 201);
        } catch (\Exception $e) {
            return response()->json("Insertion impossible du client", 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            return response()->json($customer, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de récupération des données du client", 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->update($request->all());
            return response()->json($customer, 200);
        } catch (\Exception $e) {
            return response()->json("Problème de modification du client", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();
            return response()->json("Client supprimé avec succès", 200);
        } catch (\Exception $e) {
            return response()->json("Problème de suppression du client", 500);
        }
    }
}
