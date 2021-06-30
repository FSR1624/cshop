<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProuductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
            'photo'=> 'https://hajduk.hr/sadrzaj/macron-2020-21/macron-dres-20-21-900x900.jpg',
            'name'=>'Dres Hajduka',
            'description'=>'Dres Hajduka za sezonu 2020/21.',
            'price' => 49.99
        ]);
        $product->save();
        $product = new Product([
            'photo'=> 'https://shop.gnkdinamo.hr/wp-content/uploads/2019/12/dres_home1-1.jpg',
            'name'=>'Dres Dinama',
            'description'=>'Dres Dinama za sezonu 2020/21.',
            'price' => 49.99
        ]);
        $product->save();
        $product = new Product([
            'photo'=> 'https://www.bela-sport.hr/wp-content/uploads/NkOsijek_Sezona-2020_21_Dres_Linije_Prednja.jpg',
            'name'=>'Dres Osijeka',
            'description'=>'Dres Osijeka za sezonu 2020/21.',
            'price' => 49.99
        ]);
        $product->save();
        $product = new Product([
            'photo'=> 'https://shop.nk-rijeka.hr/media/filer_public_thumbnails/filer_public/e7/67/e7670d42-7664-44b7-9beb-35fde0d3f545/rk10101120-2.jpg__530x600_q85_crop_subsampling-2_upscale.jpg',
            'name'=>'Dres Rijeke',
            'description'=>'Dres Rijeke za sezonu 2020/21.',
            'price' => 49.99
        ]);
        $product->save();

        $product = new Product([
            'photo'=> 'https://jako.hr/wp-content/uploads/2020/08/HNK-Sibenik-Prednja.gif',
            'name'=>'Dres Šibenika',
            'description'=>'Dres Šibenika za sezonu 2020/21.',
            'price' => 49.99
        ]);
        $product->save();

    }
}
