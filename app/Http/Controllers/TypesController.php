<?php

namespace App\Http\Controllers;

use App\Models\Types;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type = Types::all();
        return response()->json([
            'data'=>$type
        ]

        );
    }

    /**
     * Show the form for creating a new resource.
     */

    public function store(Request $request)
    {
        $type = Types::create([
            'name'=>$request->name
        ]);
        return response()->json([
            'data'=>$type
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $type= Types::find($id);
        return response()->json([
            'data'=>$type
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Types $types)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Types $types)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Types $types)
    {
        //
    }
}
