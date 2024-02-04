<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Logのクラスをインポート

use Stripe\Stripe;
use Stripe\Charge;
use App\Services\ProductService;
class PaymentController extends Controller
{
    //
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function pay(Request $request)  
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
            // Laravelから送信されたトークンを取得
            $token = $request->input('token');
            $price = $request->input('product_price');
            $id = $request->input('product_id');
            $charge = Charge::create([
                'amount' => $price,  // 金額（例: 1000円）
                'currency' => 'JPY',
                'source' => $token,
                'description' => 'Stripe決済デモ',
            ]);
            // 成功した場合の処理
            $this->productService->GuestBuyService($id);
            return response()->json();
        
    }
}
