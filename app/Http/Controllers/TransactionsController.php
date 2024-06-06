<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transactions::with('items')->with('types')->get();
        return response()->json([
            'data'=>$transactions
        ]

        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transactions = Transactions::create([
            'id_items'=>$request->id_items,
            'id_types'=>$request->id_types,
            'quantity_sold'=>$request->quantity_sold,
            'transaction_date'=>$request->transaction_date,
        ]);
        return response()->json([
            'data'=>$transactions
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transactions= Transactions::find($id);
        return response()->json([
            'data'=>$transactions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transactions $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,$id)
    {
        $transactions= Transactions::find($id);
        $transactions->update($request->all());
        return response()->json([
            'data'=>$transactions
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transactions $transactions)
    {
        //
    }
}
