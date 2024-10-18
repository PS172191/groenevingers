<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\PaymentDetail;
use App\Models\Product;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;
class CheckoutController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('employees.checkout', compact('products'));
    }

    public function store(Request $request)
    {

        // Retrieve selected products and calculate total price
        $selectedProducts = [];
        $totalPrice = 0;
        $selectedProductIds = $request->input('products', []);
        $productQuantities = array_count_values($selectedProductIds);

        foreach ($productQuantities as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $selectedProducts[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $quantity,
                ];
                $totalPrice += $product->price * $quantity;
            }
        }

        // Create order details
        $orderDetail = new OrderDetail();
        $orderDetail->user_id = auth()->user()->id;
        $orderDetail->total = $totalPrice;
        $orderDetail->save();

        // Add order items
        foreach ($selectedProducts as $product) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $orderDetail->id;
            $orderItem->product_id = $product['id'];
            $orderItem->quantity = $product['quantity']; // Store the quantity
            $orderItem->save();
        }

        // Create payment detail
        $paymentDetail = new PaymentDetail();
        $paymentDetail->order_id = $orderDetail->id;
        $paymentDetail->amount = $totalPrice;
        $paymentDetail->provider = 'Checkout';
        $paymentDetail->status = 'Pending';
        $paymentDetail->save();

        // Generate PDF invoice
        $customerName = $request->input('customer_name');
        $customerAddress = $request->input('address');
        $zipCode = $request->input('zip_code');
        $fullAddress = "$customerAddress, $zipCode";

        $pdfContent = view('employees.invoice', compact('customerName', 'selectedProducts', 'totalPrice', 'customerName', 'fullAddress'))->render();

        $pdf = PDF::loadHTML($pdfContent);
        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream('invoice.pdf');
    }
}
