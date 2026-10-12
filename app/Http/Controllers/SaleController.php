<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use App\Models\SaleItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with('client')->latest()->get();


        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        $products = Product::all();

        return view('sales.create', compact('clients', 'products'));

    }

    /**
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * 
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'nullable|exists:clients,id',
            'payement_method' => 'required|string'
        ]);

        $items = json_decode($request->products, true) ?? [];

        // Vérification du stock avant toute écriture
        $lines = [];
        foreach ($items as $item) {
            $product = Product::findOrFail($item['id']);
            $quantity = (int) $item['quantity'];

            if ($product->stock < $quantity) {
                return back()->with('error', "Stock insuffisant pour {$product->name}");
            }

            $lines[] = ['product' => $product, 'quantity' => $quantity];
        }

        DB::transaction(function () use ($lines, $request) {
            $sale = Sale::create([
                'client_id' => $request->client_id,
                'total' => 0,
                'payement_method' => $request->payement_method,
            ]);

            $total = 0;

            foreach ($lines as $line) {
                $product = $line['product'];
                $quantity = $line['quantity'];
                $subtotal = $product->price * $quantity;
                $total += $subtotal;

                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ]);

                $product->decrement('stock', $quantity);
            }

            $sale->update(['total' => $total]);
        });

        return redirect()->route('sales.index')->with('success', 'Vente enregistrée');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sale = Sale::with('items.product')->findOrFail($id);
        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index');
    }

    public function invoice($id)
    {
        $sale = Sale::with('saleItems.product')->findOrFail($id);
        $pdf = Pdf::loadView('sales.invoice', compact('sale'));
        return $pdf->stream('facture_' . $sale->id . '.pdf');
    }
}
