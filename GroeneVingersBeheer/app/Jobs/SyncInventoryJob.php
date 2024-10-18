<?php

namespace App\Jobs;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SyncInventoryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $signature = 'fetch:store-products';

    protected $description = 'Fetch products from API and store them in the database';

    public function handle()
    {
        $apiEndpoint = 'https://kuin.summaict.nl/api/product';
        $bearerToken = 'Bearer 75|oxURV36dYHnbyy3f94vb70qPmCwY4OLimqyjorTh';

        $response = Http::withHeaders([
            'Authorization' => $bearerToken,
        ])->get($apiEndpoint);

        if ($response->successful()) {
            $apiData = $response->json();

            foreach ($apiData as $item) {
                $existingItem = Product::where('id', $item['id'])->first();

                if (! $existingItem) {
                    try {
                        $randomNumber = mt_rand(1000000000, 9999999999);
                        $randomAmount = mt_rand(0, 17);

                        // Retrieve a random category from the database
                        $randomCategory = Category::inRandomOrder()->first();

                        if ($randomCategory) {
                            // Download the image from the URL
                            $imageData = $this->downloadImage($item['image']);

                            // Create the product without SKU first
                            $product = Product::create([
                                'id' => $item['id'],
                                'name' => $item['name'],
                                'description' => $item['description'],
                                'suppliers_price' => $item['price'],
                                'price' => round($item['price'] * 1.4, 2),
                                'image' => $imageData,
                                'color' => $item['color'],
                                'barcode' => $randomNumber,
                                'height_cm' => $item['height_cm'],
                                'width_cm' => $item['width_cm'],
                                'depth_cm' => $item['depth_cm'],
                                'weight_gr' => $item['weight_gr'],
                                'category_id' => $randomCategory->id,
                            ]);

                            // Generate the SKU after the product is created and has an ID
                            $sku = generateSKU($product->name, $randomCategory->name, $product->id);

                            // Update the product with the generated SKU
                            $product->sku = $sku;
                            $product->save();

                            Inventory::updateOrCreate(
                                ['product_id' => $product->id],
                                ['quantity' => $randomAmount]
                            );
                        }
                    } catch (\Exception $e) {
                        // Log or handle the exception
                        dd($e->getMessage());
                    }
                }
            }
        }
    }

    private function downloadImage($url)
    {
        try {
            $response = Http::get($url);
            if ($response->successful()) {
                return $response->body();
            }
        } catch (\Exception $e) {
            // Handle download error
            return null;
        }
    }
}
