<?php

namespace App\Http\Controllers;

use App\Models\Grind;
use App\Models\Price;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\RoastLevel;
use App\Models\UnitPackage;
use App\Models\UnitWeight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    private function updatePrice($SKU, $type_id, $value)
    {
        Price::where('SKU', $SKU)->where('type_id', $type_id)->update([
            'price' => $value,
            'updated_at' => now(),
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table("products as p")
            -> leftJoin('grinds as g', 'g.id', '=', 'p.grind')
            -> leftJoin('unit_weights as uw', 'uw.id', '=', 'p.unit_weight')
            -> leftJoin('product_categories as pc', 'pc.id', '=', 'p.product_category')
            -> select('p.*', 'g.name as grind_name', 'uw.name as unit_weight_name', 'pc.name as pd_cat_name')
            -> orderByDesc('p.created_at')->paginate(20);

        return view('dream-up.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::all();
        $roastLevels = RoastLevel::all();
        $grinds = Grind::all();
        $unitWeights = UnitWeight::all();
        $unitPackages = UnitPackage::all();
        return view('dream-up.pages.product.create', compact(['categories', 'roastLevels', 'grinds', 'unitWeights', 'unitPackages']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'SKU.required' => 'Mã sản phẩm không được để trống!',
            'SKU.string' => 'Mã sản phẩm phải là chuỗi ký tự!',
            'SKU.max' => 'Mã sản phẩm không được quá 100 ký tự!',
            'SKU.unique' => 'Mã sản phẩm đã tồn tại',
            'name.required' => 'Tên sản phẩm không được để trống!',
            'name.string' => 'Tên sản phẩm phải là chuỗi ký tự!',
            'name.max' => 'Tên sản phẩm không được quá 100 ký tự!',
            'product_category' => 'Mã nhóm sản phẩm không được để trống',
            'description.max' => 'Mô tả không được quá 255 ký tự!',
            'description.string' => 'Mô tả phải là chuỗi ký tự',
            'product_tag.string' => 'Tag phải là chuỗi ký tự',
            'product_tag.max' => 'Tag không được quá 255 ký tự',
            'imamge.required' => 'Ảnh sản phẩm phải có tối thiểu 1 ảnh',
            'image.max' => 'Ảnh sản phẩm phải có kích thước dưới 2MB',
            'image.mimes' => 'Ảnh sản phẩm phải là định dạng jpeg, jpg, png, gif, svg',
            'image2.max' => 'Ảnh sản phẩm phải có kích thước dưới 2MB',
            'image2.mimes' => 'Ảnh sản phẩm phải là định dạng jpeg, jpg, png, gif, svg',
            'image3.max' => 'Ảnh sản phẩm phải có kích thước dưới 2MB',
            'image3.mimes' => 'Ảnh sản phẩm phải là định dạng jpeg, jpg, png, gif, svg',
            'image4.max' => 'Ảnh sản phẩm phải có kích thước dưới 2MB',
            'image4.mimes' => 'Ảnh sản phẩm phải là định dạng jpeg, jpg, png, gif, svg',
            'image5.max' => 'Ảnh sản phẩm phải có kích thước dưới 2MB',
            'image5.mimes' => 'Ảnh sản phẩm phải là định dạng jpeg, jpg, png, gif, svg',
            'image6.max' => 'Ảnh sản phẩm phải có kích thước dưới 2MB',
            'image6.mimes' => 'Ảnh sản phẩm phải là định dạng jpeg, jpg, png, gif, svg',
            'image7.max' => 'Ảnh sản phẩm phải có kích thước dưới 2MB',
            'image7.mimes' => 'Ảnh sản phẩm phải là định dạng jpeg, jpg, png, gif, svg',
            'image8.max' => 'Ảnh sản phẩm phải có kích thước dưới 2MB',
            'image8.mimes' => 'Ảnh sản phẩm phải là định dạng jpeg, jpg, png, gif, svg',
            'unit_package' => 'Đơn vị tính không được để trống',
        ];

        $request->validate([
            'SKU' => 'required|string|max:50|unique:products,SKU',
            'name' => 'required|string|max:100',
            'product_category' => 'required',
            'description' => 'nullable|string|max:255',
            'product_tag' => 'nullable|string|max:255',
            'barcode' => 'nullable|string|max:15',
            'weight' => 'required|numeric|min:0',
            'unit_weight' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image6' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image7' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image8' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'unit_package' => 'required',
        ], $messages);

        Product::create([
            'SKU' => $request->SKU,
            'name' => $request->name,
            'product_category' => $request->product_category,
            'description' => $request->description,
            'product_tag' => $request->tag,
            'grind' => $request->grind,
            'barcode' => $request->barcode,
            'weight' => $request->weight,
            'unit_weight' => $request->unit_weight,
            'image' => $request->hasFile('image') ? $request->file('image')->store('products', 'public') : null,
            'image2' => $request->hasFile('image2') ? $request->file('image2')->store('products', 'public') : null,
            'image3' => $request->hasFile('image3') ? $request->file('image3')->store('products', 'public') : null,
            'image4' => $request->hasFile('image4') ? $request->file('image4')->store('products', 'public') : null,
            'image5' => $request->hasFile('image5') ? $request->file('image5')->store('products', 'public') : null,
            'image6' => $request->hasFile('image6') ? $request->file('image6')->store('products', 'public') : null,
            'image7' => $request->hasFile('image7') ? $request->file('image7')->store('products', 'public') : null,
            'image8' => $request->hasFile('image8') ? $request->file('image8')->store('products', 'public') : null,
            'unit_package' => $request->unit_package,
            'roast_level' => $request->roast_level,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('pd-index')->with('success', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = DB::table("products as p")
            ->leftJoin('grinds as g', 'g.id', '=', 'p.grind')
            ->leftJoin('unit_weights as uw', 'uw.id', '=', 'p.unit_weight')
            ->leftJoin('product_categories as pc', 'pc.id', '=', 'p.product_category')
            ->leftJoin('unit_packages as up', 'up.id', '=', 'p.unit_package')
            ->select('p.*', 'g.name as grind_name', 'uw.name as unit_weight_name', 'pc.name as pd_cat_name', 'up.name as unit_package_name')
            ->where('p.SKU', $product->SKU)->first();
        $prices = DB::table('prices as pr')
            ->leftJoin('products as p', 'p.SKU', '=', 'pr.SKU')
            ->leftJoin('price_types as pt', 'pt.type_id', '=', 'pr.type_id')
            ->select('pr.price as price', 'pt.name as price_type_name')
            ->where('pr.SKU', $product->SKU)->get();

        $categories = ProductCategory::all();
        $roastLevels = RoastLevel::all();
        $grinds = Grind::all();
        $unitWeights = UnitWeight::all();
        $unitPackages = UnitPackage::all();
        return view('dream-up.pages.product.detail', compact(['product', 'categories', 'roastLevels', 'grinds', 'unitWeights', 'unitPackages','prices']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product = DB::table("products as p")
            ->leftJoin('grinds as g', 'g.id', '=', 'p.grind')
            ->leftJoin('unit_weights as uw', 'uw.id', '=', 'p.unit_weight')
            ->leftJoin('product_categories as pc', 'pc.id', '=', 'p.product_category')
            ->leftJoin('unit_packages as up', 'up.id', '=', 'p.unit_package')
            ->select('p.*', 'g.name as grind_name', 'uw.name as unit_weight_name', 'pc.name as pd_cat_name', 'up.name as unit_package_name')
            ->where('p.SKU', $product->SKU)->first();

        $categories = ProductCategory::all();
        $roastLevels = RoastLevel::all();
        $grinds = Grind::all();
        $unitWeights = UnitWeight::all();
        $unitPackages = UnitPackage::all();

        $prices = DB::table('prices as pr')
            ->select('pr.price', 'pr.type_id')->where('pr.SKU', $product->SKU)->get();

        return view('dream-up.pages.product.edit', compact(['product', 'categories', 'roastLevels', 'grinds', 'unitWeights', 'unitPackages', 'prices']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $messages = [
            'SKU.required' => 'Mã sản phẩm không được để trống!',
            'SKU.string' => 'Mã sản phẩm phải là chuỗi ký tự!',
            'SKU.max' => 'Mã sản phẩm không được quá 100 ký tự!',
            'SKU.unique' => 'Mã sản phẩm đã tồn tại',
            'name.required' => 'Tên sản phẩm không được để trống!',
            'name.string' => 'Tên sản phẩm phải là chuỗi ký tự!',
            'name.max' => 'Tên sản phẩm không được quá 100 ký tự!',
            'product_category' => 'Mã nhóm sản phẩm không được để trống',
            'description.max' => 'Mô tả không được quá 255 ký tự!',
            'description.string' => 'Mô tả phải là chuỗi ký tự',
            'product_tag.string' => 'Tag phải là chuỗi ký tự',
            'product_tag.max' => 'Tag không được quá 255 ký tự',
            'imamge.required' => 'Ảnh sản phẩm phải có tối thiểu 1 ảnh',
            'image.max' => 'Ảnh sản phẩm phải có kích thước dưới 2MB',
            'image.mimes' => 'Ảnh sản phẩm phải là định dạng jpeg, jpg, png, gif, svg',
            'image2.max' => 'Ảnh sản phẩm phải có kích thước dưới 2MB',
            'image2.mimes' => 'Ảnh sản phẩm phải là định dạng jpeg, jpg, png, gif, svg',
            'image3.max' => 'Ảnh sản phẩm phải có kích thước dưới 2MB',
            'image3.mimes' => 'Ảnh sản phẩm phải là định dạng jpeg, jpg, png, gif, svg',
            'image4.max' => 'Ảnh sản phẩm phải có kích thước dưới 2MB',
            'image4.mimes' => 'Ảnh sản phẩm phải là định dạng jpeg, jpg, png, gif, svg',
            'image5.max' => 'Ảnh sản phẩm phải có kích thước dưới 2MB',
            'image5.mimes' => 'Ảnh sản phẩm phải là định dạng jpeg, jpg, png, gif, svg',
            'image6.max' => 'Ảnh sản phẩm phải có kích thước dưới 2MB',
            'image6.mimes' => 'Ảnh sản phẩm phải là định dạng jpeg, jpg, png, gif, svg',
            'image7.max' => 'Ảnh sản phẩm phải có kích thước dưới 2MB',
            'image7.mimes' => 'Ảnh sản phẩm phải là định dạng jpeg, jpg, png, gif, svg',
            'image8.max' => 'Ảnh sản phẩm phải có kích thước dưới 2MB',
            'image8.mimes' => 'Ảnh sản phẩm phải là định dạng jpeg, jpg, png, gif, svg',
            'unit_package' => 'Đơn vị tính không được để trống',
        ];

        $request->validate([
            'SKU' => 'required|string|max:50|unique:products,SKU,' . $product->SKU . ',SKU',
            'name' => 'required|string|max:100',
            'product_category' => 'required',
            'description' => 'nullable|string|max:255',
            'product_tag' => 'nullable|string|max:255',
            'barcode' => 'nullable|string|max:15',
            'weight' => 'required|numeric|min:0',
            'unit_weight' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image6' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image7' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image8' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'unit_package' => 'required',
        ], $messages);

        $product->update([
            'SKU' => $request->SKU,
            'name' => $request->name,
            'product_category' => $request->product_category,
            'description' => $request->description,
            'product_tag' => $request->tag,
            'grind' => $request->grind,
            'barcode' => $request->barcode,
            'weight' => $request->weight,
            'unit_weight' => $request->unit_weight,
            'image' => $request->hasFile('image') ? $request->file('image')->store('products', 'public') : $product->image,
            'image2' => $request->hasFile('image2') ? $request->file('image2')->store('products', 'public') : $product->image2,
            'image3' => $request->hasFile('image3') ? $request->file('image3')->store('products', 'public') : $product->image3,
            'image4' => $request->hasFile('image4') ? $request->file('image4')->store('products', 'public') : $product->image4,
            'image5' => $request->hasFile('image5') ? $request->file('image5')->store('products', 'public') : $product->image5,
            'image6' => $request->hasFile('image6') ? $request->file('image6')->store('products', 'public') : $product->image6,
            'image7' => $request->hasFile('image7') ? $request->file('image7')->store('products', 'public') : $product->image7,
            'image8' => $request->hasFile('image8') ? $request->file('image8')->store('products', 'public') : $product->image8,
            'unit_package' => $request->unit_package,
            'roast_level' => $request->roast_level,
            'updated_at' => now()
        ]);

        $retailString = $request->retail;
        $retail = (int) str_replace(',', '', $retailString);
        $this->updatePrice($request->SKU, 'retail', $retail);

        $wholesaleString = $request->wholesale;
        $wholesale = (int) str_replace(',', '', $wholesaleString);
        $this->updatePrice($request->SKU, 'wholesale', $wholesale);

        $contributorString = $request->contributor;
        $contributor = (int) str_replace(',', '', $contributorString);
        $this->updatePrice($request->SKU, 'contributor', $contributor);

        $distributorString = $request->distributor;
        $distributor = (int) str_replace(',', '', $distributorString);
        $this->updatePrice($request->SKU, 'distributor', $distributor);

        $oneHundredKgString = $request->oneHundredKg;
        $oneHundredKg = (int) str_replace(',', '', $oneHundredKgString);
        $this->updatePrice($request->SKU, '100kg', $oneHundredKg);

        $fiftyKgString = $request->fiftyKg;
        $fiftyKg = (int) str_replace(',', '', $fiftyKgString);
        $this->updatePrice($request->SKU, '50kg', $fiftyKg);

        $tenKgString = $request->tenKg;
        $tenKg = (int) str_replace(',', '', $tenKgString);
        $this->updatePrice($request->SKU, '10kg', $tenKg);

        $fiveKgString = $request->fiveKg;
        $fiveKg = (int) str_replace(',', '', $fiveKgString);
        $this->updatePrice($request->SKU, '5kg', $fiveKg);

        $agencyString = $request->agency;
        $agency = (int) str_replace(',', '', $agencyString);
        $this->updatePrice($request->SKU, 'agency', $agency);

        $importString = $request->import;
        $import = (int) str_replace(',', '', $importString);
        $this->updatePrice($request->SKU, 'import', $import);

        return redirect()->route('pd-edit', $product->SKU)->with('success', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('pd-index')->with('success', 'Xóa sản phẩm thành công');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('SKU', 'LIKE', "%{$query}%")->orWhere('name', 'LIKE', "%{$query}%")->orWhere('barcode', 'LIKE', "%{$query}%")->get();
        return view('dream-up.pages.product.table', compact('products'))->render();
    }

    public function uploadImage(Request $request)
    {

    }
}
