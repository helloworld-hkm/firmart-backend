<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Transactions;
use Exception;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transactions::with('items')->with('items.types')->get();
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

        $items=Items::find($request->id_items);
        $items->stock= $items->stock - $request->quantity_sold;
        $items->save();
        $transactions = Transactions::create([
            'id_items'=>$request->id_items,

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
    public function sortBy($by)
    {
        if ($by=='name') {
            $sort="items.name";
        }elseif ($by=='date') {
           $sort="transaction_date";
        }
        $transactions= Transactions::with('items')->with('items.types')->get()->sortBy($sort)->values();
        return response()->json([
            'data'=>$transactions
        ]);
    }
    public function groupBy($type)
    {

        $transactions= Transactions::with('items')->with('items.types')->get()->where('items.types.name',$type)->sortByDesc('quantity_sold')->values();
        return response()->json([
            'data'=>$transactions
        ]);
    }
    public function range($type,$from,$to)
    {

        $transactions = Transactions::with('items')
        ->with('items.types')
        ->whereHas('items.types', function ($query) use ($type) {
            $query->where('name', $type);
        })
        ->whereBetween('transaction_date', [$from, $to]) // Menambahkan filter rentang tanggal
        ->orderByDesc('quantity_sold')
        ->get();
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


        public function search($keyword)
        {
            $query = Transactions::with('items')->with('items.types');

    // Cari berdasarkan nama item atau tanggal transaksi
    $query->where(function ($query) use ($keyword) {
        $query->whereHas('items', function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        })
        ->orWhereDate('transaction_date', $keyword);
    });

    $searchResult = $query->get();

    return response()->json([
        'data' => $searchResult
    ]);
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
        $transactions= Transactions::findOrFail($id);
        $transactions->delete();
        return response()->json(['message' => 'Resource deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete resource'], 500);
        }

    }
}
