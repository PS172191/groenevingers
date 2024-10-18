<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $inventory = Product::with('inventory')->get();
        $categories = Category::all();

        $productsPerCategory = [];
        foreach ($products as $product) {
            if (!isset($productsPerCategory[$product->category_id])) {
                $productsPerCategory[$product->category_id] = [];
            }

            array_push($productsPerCategory[$product->category_id], $product);
        }

        return view('products.index', compact('productsPerCategory', 'inventory', 'categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $inventory = Product::with('inventory')->get();

        return view('products.show', compact('product', 'inventory'));
    }

    public function showByCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $products = Product::where('category_id', $categoryId)->get();

        $categories = Category::all();

        return view('products.showbyCategory', compact('products', 'categories', 'category', 'categoryId'));
    }

    public function indexForEmployees()
    {
        $products = Product::all();
        $inventory = Product::with('inventory')->get();
        $categories = Category::all();

        return view('products.indexForEmployees', compact('products', 'inventory', 'categories'));
    }

    public function showForEmployees($id)
    {
        $product = Product::findOrFail($id);
        $inventory = Product::with('inventory')->get();

        return view('products.showForEmployees', compact('product', 'inventory'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $randomNumber = mt_rand(1000000000, 9999999999);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'color' => 'required',
            'height_cm' => 'required|numeric',
            'width_cm' => 'required|numeric',
            'depth_cm' => 'required|numeric',
            'weight_gr' => 'required|numeric',
        ]);

        // Get the file from the request
        $file = $request->file('image');

        if ($file && $file->isValid()) {
            // Open the file and read its contents into a variable
            $imageData = file_get_contents($file->getRealPath());


            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->suppliers_price = $request->price;
            $price = $product->suppliers_price * 1.4;
            $product->price = $price;
            $product->image = $imageData;
            $product->color = $request->color;
            $product->barcode = $randomNumber;
            $product->height_cm = $request->height_cm;
            $product->width_cm = $request->width_cm;
            $product->depth_cm = $request->depth_cm;
            $product->weight_gr = $request->weight_gr;
            $product->category_id = $request->category_id;
            $product->user_id = $request->user()?->id;

            $product->save();

            // Get the category name
            $categoryName = Category::find($request->category_id)->name;

            // Generate the SKU
            $sku = generateSKU($product->name, $categoryName, $product->id);
            // Update the product with the generated SKU
            $product->sku = $sku;

            $inventory = new Inventory();
            $inventory->product_id = $product->id;
            $inventory->quantity = 0;
            $inventory->save();

            $product->save();

            return redirect()->route('products.indexForEmployees')->with('message', 'Product toegevoegd.');
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'color' => 'required',
            'height_cm' => 'required|numeric',
            'width_cm' => 'required|numeric',
            'depth_cm' => 'required|numeric',
            'weight_gr' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->color = $request->get('color');
        $product->height_cm = $request->get('height_cm');
        $product->width_cm = $request->get('width_cm');
        $product->depth_cm = $request->get('depth_cm');
        $product->weight_gr = $request->get('weight_gr');
        $product->category_id = $request->get('category_id');
        $product->user_id = $request->user()?->id;

        // Check if a new image has been uploaded
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $imageData = file_get_contents($file->getRealPath());
            $product->image = $imageData;
        }

        $product->save();

        // Get the category name
        $categoryName = Category::find($request->category_id)->name;

        // Generate the SKU
        $sku = generateSKU($product->name, $categoryName, $product->id);
        // Update the product with the generated SKU
        $product->sku = $sku;

        $product->save();

        return redirect()->route('products.indexForEmployees')->with('message', 'Product bijgewerkt.');
    }

    public function destroy(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        // $product->user_id = User::findOrFail($id);
        $product->user_id = $request->user()?->id;
        $product->delete();

        return redirect()->route('products.indexForEmployees')->with('message', 'Product verwijderd.');
    }
}
