<?php

namespace App\Http\Controllers;

use App\Jobs\SyncInventoryJob;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        // Dispatch job to sync inventory
        SyncInventoryJob::dispatch();
        $products = Product::with('inventory')->get();

        return view('management.inventory', compact('products'));
    }

    public function orderView()
    {
        $products = Product::with('inventory')->get();

        return view('management.wholesale', compact('products'));
    }

    public function order(Request $request)
    {
        // Validate form data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Find the inventory record for the product
        $inventory = Inventory::where('product_id', $request->product_id)->first();

        // If inventory record exists, update the quantity, otherwise create a new record
        if ($inventory) {
            // Increment the quantity
            $inventory->increment('quantity', $request->quantity);
        } else {
            // Create a new inventory record
            Inventory::create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        // Retrieve the product name using the product_id from the request
        $product = Product::find($request->product_id);

        // Check if the product exists
        if ($product) {
            // Generate the success message using the product name
            $message = 'Voorraad aangepast met het product '.$product->name.' met een aantal van '.$request->quantity.'.';
        } else {
            // Handle the case where the product is not found
            $message = 'Product niet gevonden.';
        }

        // Redirect back with success message
        return redirect()->route('management.wholesale')->with('message', $message);
    }
}
