<?php

namespace App\Http\Controllers;

use App\Models\Stocks;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stocks::all();
        return response()->json([
            'data'=>$stocks
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
        $stock = Stocks::create([
            'id_items'=>$request->id_items,
            'stock'=>$request->stock
        ]);
        return response()->json([
            'data'=>$stock
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $stock= Stocks::find($id);
        return response()->json([
            'data'=>$stock
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stocks $stocks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stocks $stocks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stocks $stocks)
    {
        //
    }
}
