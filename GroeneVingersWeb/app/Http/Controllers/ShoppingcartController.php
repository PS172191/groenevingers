<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingcartController extends Controller
{
    public function index()
    {
        session_start();

        return view('shoppingcart');
    }

    public function updateCart(Request $request)
    {
        // Start the session
        session_start();

        // Initialize the cart if it doesn't exist
        if (! isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if the request is for incrementing the cart amount
        if (isset($request->type) && $request->type == 'cartamount') {
            if (isset($request->operation) && $request->operation == 'increment') {
                // Check the product quantity
                $product = Product::find($request->product_id);
                if ($_SESSION['cart'][$request->product_id]['amount'] < $product->inventory->quantity) {
                    // Increment the product amount
                    $_SESSION['cart'][$request->product_id]['amount']++;
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Producthoeveelheidslimiet bereikt']);
                    exit();
                }
            } elseif (isset($request->operation) && $request->operation == 'decrement') {
                // Decrement the product amount if greater than 0
                if ($_SESSION['cart'][$request->product_id]['amount'] > 0) {
                    $_SESSION['cart'][$request->product_id]['amount']--;
                }
            }

            echo json_encode(['status' => 'success']);
            exit();
        }

        // Check if the product is already in the cart
        $product_exists = false;
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['product_id'] == $request->product_id) {
                $product = Product::find($request->product_id);
                if ($_SESSION['cart'][$key]['amount'] < $product->inventory->quantity) {
                    $_SESSION['cart'][$key]['amount']++;
                    $product_exists = true;
                    break;
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Producthoeveelheidslimiet bereikt']);
                    exit();
                }
            }
        }

        // If the product doesn't exist in the cart, add it with an initial amount of 1
        if (! $product_exists) {
            $product = Product::find($request->product_id);
            if ($product->inventory->quantity > 1) {
                $_SESSION['cart'][$product->id] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'img' => $product->image,
                    'amount' => 1,
                    'quantity' => $product->inventory->quantity,
                ];
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Product niet op voorraad']);
                exit();
            }
        }

        if (isset($request->type) && $request->type == 'deleteitem') {
            unset($_SESSION['cart'][$request->product_id]);
        }

        return redirect()->route('shoppingcart');
    }

    public function destroy($id)
    {
        return redirect('/');
    }
}
