<?php

namespace App\Services;

use App\Models\Product;
use Carbon\Carbon;

class ProductService
{
    public function GuestBuyService($product_id)
    {
        // findメソッドを使って該当するProductモデルを取得
        $product = Product::find($product_id);
				$product->sold_at = Carbon::now();
				$product->save();
    }

		public function AllGetProduct()
		{
			$product = Product::all();
			return $product;
		}
}
