<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Items::all();
        return response()->json([
            'data'=>$items
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
        $items = Items::create([
            'name'=>$request->name,
            'id_types'=>$request->id_types,
            'stock'=>$request->stock
        ]);
        return response()->json([
            'data'=>$items
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item= Items::find($id);
        return response()->json([
            'data'=>$item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Items $items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Items $items)
    {
        //
    }
}
