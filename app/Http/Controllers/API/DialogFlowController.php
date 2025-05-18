<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\select;

class DialogFlowController extends Controller {
    public function webhook(Request $request) {
        try {
            $intentName = $request->input('queryResult.intent.displayName');
            $parameters = $request->input('queryResult.parameters');

            if ($intentName == 'getProductPrice') {
                $productName = $parameters['productName'] ?? null;

                $product = DB::table('products as p')
                    ->leftJoin('prices as pr', 'pr.SKU', 'p.SKU')
                    ->select('p.name as productName', 'pr.price as productPrice')
                    ->where('p.name', $productName)
                    ->where('pr.type_id','retail')
                    ->first();

                if ($product) {
                    $responseText = "Giá cà phê {$productName} hiện tại là {$product->productPrice} VNĐ.";
                } else {
                    $responseText = "Xin lỗi, chúng tôi không có thông tin về loại cà phê {$productName}.";
                }

            } else if ($intentName == 'getTotalProduct') {
                $products = Product::all();
                $count = $products->count();

                $productNames = $products->pluck('name')->toArray();
                $namesString = implode(', ', $productNames);

                $responseText = "Hiện có $count sản phẩm: $namesString.";

            } else {
                $responseText = "Tôi không hiểu câu hỏi của bạn, vui lòng thử lại.";
            }

            return response()->json([
                "fulfillmentText" => $responseText
            ]);

        } catch (\Exception $e) {
            return response()->json([
                "fulfillmentText" => "Lỗi máy chủ: " . $e->getMessage()
            ]);
        }
    }

}
