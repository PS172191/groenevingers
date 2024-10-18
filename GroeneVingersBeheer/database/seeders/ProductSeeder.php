<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $randomNumber = mt_rand(1000000000, 9999999999);
        $sku = generateSKU($product->name, $category->name, $product->id);

        Product::create([
            'name' => 'Varen',
            'description' => 'De varen is een groep van ongeveer 10.560 bekende nog levende soorten vaatplanten.',
            'price' => '9.99',
            'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
            'color' => 'Blue',
            'barcode' => $randomNumber,
            'height_cm' => '60',
            'width_cm' => '30',
            'depth_cm' => '30',
            'weight_gr' => '150',
        ]);

        Product::create([
            'name' => 'Gras',
            'description' => 'Gras is een belangrijke familie van monocot planten, graslanden bedekken ongeveer 20% van de aardse vegetatie.',
            'price' => '2.49',
            'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
            'color' => 'Silver',
            'barcode' => $randomNumber,
            'height_cm' => '40',
            'width_cm' => '10',
            'depth_cm' => '10',
            'weight_gr' => '80',
        ]);

        Product::create([
            'name' => 'Bamboe',
            'description' => 'Bamboe is een snelgroeiend gras in de familie Poaceae.',
            'price' => '7.99',
            'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
            'color' => 'DarkSalmon',
            'barcode' => $randomNumber,
            'height_cm' => '180',
            'width_cm' => '50',
            'depth_cm' => '10',
            'weight_gr' => '500',
        ]);

        Product::create([
            'name' => 'Klimop',
            'description' => 'Klimop is een geslacht van 12-15 soorten klimmende of kruipende altijd groenblijvende houtige planten.',
            'price' => '5.49',
            'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
            'color' => 'Ivory',
            'barcode' => $randomNumber,
            'height_cm' => '100',
            'width_cm' => '20',
            'depth_cm' => '5',
            'weight_gr' => '200',
        ]);

        Product::create([
            'name' => 'Aloe Vera',
            'description' => 'Aloë vera is een succulente plantensoort die vermoedelijk afkomstig is uit het Arabische schiereiland.',
            'price' => '4.99',
            'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
            'color' => 'Gold',
            'barcode' => $randomNumber,
            'height_cm' => '30',
            'width_cm' => '15',
            'depth_cm' => '15',
            'weight_gr' => '120',
        ]);

    }
}
