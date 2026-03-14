<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use App\Models\SaleItem;
use Barryvdh\DomPDF\Facade\Pdf;

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

        $products = json_decode($request->products, true);

        $sale = Sale::create([
            'client_id' => $request->client_id,
            'total' => 0,
            'payement_method' => $request->payement_method
        ]);

        $total = 0;

        foreach ($products as $item) {

            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;

            SaleItem::create([
                'sale_id' => $sale->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);

            //Mise à jours de stock
            $product = Product::find($item['id']);

            if ($product->stock < $item['quantity']) {
                return back()->with('error', 'Stock insuffisant pour ' . $item['name']);
            }
            $product->stock = $product->stock - $item['quantity'];
            $product->save();

        }



        $sale->update([
            'total' => $total
        ]);

        return redirect()->route('sales.index')
            ->with('success', 'Vente enregistrée');
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

    public function invoice($id){
        $sale = Sale::with('saleItems.product')->findOrFail($id);
        $pdf = Pdf::loadView('sales.invoice', compact('sale'));
        return $pdf->stream('facture_'.$sale->id.'.pdf');
    }
}
