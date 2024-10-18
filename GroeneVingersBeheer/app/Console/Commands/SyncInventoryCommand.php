<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class SyncInventoryCommand extends Command
{
    protected $signature = 'inventory:sync';

    protected $description = 'Sync inventory with live data from API';

    public static function dispatch() {}

    public function handle()
    {

        // Check if the request was successful
        if ($response->successful()) {
            // Decode the JSON response
            $apiData = $response->json();

            // Iterate through API data and update inventory
            foreach ($apiData as $item) {
                $product = Product::firstOrNew(['id' => $item['id']]);
                // Assign values from the API data to the model attributes
                $product->id = $item['id'];
                $product->name = $item['name'];
                $product->description = $item['description'];
                $product->price = $item['price'];
                $product->image = $item['image'];
                $product->color = $item['color'];
                $product->height_cm = $item['height_cm'];
                $product->width_cm = $item['width_cm'];
                $product->depth_cm = $item['depth_cm'];
                $product->weight_gr = $item['weight_gr'];
                $product->created_at = $item['created_at'];
                $product->updated_at = $item['updated_at'];

                // Save the inventory item to the database
                $product->save();
            }

            // Fetch data from your API
            $apiData = json_decode(file_get_contents('https://kuin.summaict.nl/api/product'), true);

            // Return a response indicating success
            return response()->json(['message' => 'Inventory data has been successfully filled from API'], 200);
        } else {
            $this->error('Failed to fetch data from API.');
        }
    }
}
