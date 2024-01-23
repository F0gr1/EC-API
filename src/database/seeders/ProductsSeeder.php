<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i = 1; $i < 10; $i++){
            DB::table('products')->insert([
                'user_id' =>'1',
                'price'=>'1500',
                'name' => '魚',
                'description' => 'お魚です'
            ]);
        }
    }
}
