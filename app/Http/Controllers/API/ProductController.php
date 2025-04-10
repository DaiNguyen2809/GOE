<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Grind;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\RoastLevel;
use App\Models\UnitPackage;
use App\Models\UnitWeight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products as pd')
            ->leftJoin('prices as pr', 'pr.SKU', '=', 'pd.SKU')
            ->select('pd.*', 'pr.price as price')->where('type_id', 'retail')->get();
        return json_encode($products);
    }

    public function show(Request $request, $id) {
        $product = DB::table('products as pd')
            ->leftJoin('prices as pr', 'pr.SKU', '=', 'pd.SKU')
            ->select('pd.*', 'pr.price as price')->where('pd.SKU', $id)->where('type_id', 'retail')->first();
        return json_encode($product);
    }


}
