<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
class ProductDetailController extends Controller
{
    public function index()
    {
        $product_details = ProductDetail::paginate(5);
        return view('admin.product_detail.list', compact('product_details'));
    }

    public function create($id)
    {
        $product = Product::find($id);
        return view('admin.product_detail.create', compact('product'));
    }

    public function detail($id)
    {
        $product_details = ProductDetail::where('Product_ID', $id)->paginate(5);
        return view('admin.product_detail.list', compact('product_details'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'import_price' => 'required|numeric',
            'export_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'main_img' => 'required',
            'slide_img_1' => 'required|unique:product_details',
            'slide_img_2' => 'required|unique:product_details',
            'information' => 'required',
            'material' => 'required',
            'color' => 'required|unique:product_details',
            'size' => 'required',
            'code' => 'required|unique:product_details',
            'quantity' => 'required|numeric',
        ]);

        $product = Product::find($request->product_id);

        $slug = Str::slug($product->Name . "-" . $request->color);

        ProductDetail::create([
            'Import_Price' => $request->import_price,
            'Export_Price' => $request->export_price,
            'Sale_Price' => $request->sale_price,
            'Main_IMG' => $request->main_img,
            'Slide_IMG_1' => $request->slide_img_1,
            'Slide_IMG_2' => $request->slide_img_2,
            'Information' => $request->information,
            'Material' => $request->material,
            'Color' => $request->color,
            'Size' => $request->size,
            'Code' => $request->code,
            'Is_Trending' => $request->is_trending,
            'Is_New_Arrivals' => $request->is_arrivals,
            'Is_Feature' => $request->is_feature,
            'Product_ID' => $request->product_id,
            'Quantity' => $request->quantity,
            'Slug' => $slug,
        ]);

        return redirect()->route('admin.product-detail.index')->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $product_detail = ProductDetail::find($id);
        $product = Product::find($product_detail->Product_ID);
        return view('admin.product_detail.edit', compact('product', 'product_detail'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'import_price' => 'required|numeric',
            'export_price' => 'required|numeric',
            // 'sale_price' => 'numeric',
            'main_img' => 'required',
            'slide_img_1' => 'required',
            'slide_img_2' => 'required',
            'information' => 'required',
            'material' => 'required',
            'color' => 'required',
            'size' => 'required',
            'code' => 'required',
            'quantity' => 'required|numeric',
        ]);

        $product_detail = ProductDetail::find($id);
        $product_id  = $product_detail->Product_ID;
        $product = Product::find($product_id);

        $slug = Str::slug($product->Name . "-" . $request->color);

        $old_product_detail = ProductDetail::find($id);
        $old_quantity = $old_product_detail->Quantity;

        ProductDetail::where('ID', $id)->update([
            'Import_Price' => $request->import_price,
            'Export_Price' => $request->export_price,
            'Sale_Price' => $request->sale_price,
            'Main_IMG' => $request->main_img,
            'Slide_IMG_1' => $request->slide_img_1,
            'Slide_IMG_2' => $request->slide_img_2,
            'Information' => $request->information,
            'Material' => $request->material,
            'Color' => $request->color,
            'Size' => $request->size,
            'Code' => $request->code,
            'Is_Trending' => $request->is_trending,
            'Is_New_Arrivals' => $request->is_arrivals,
            'Is_Feature' => $request->is_feature,
            'Product_ID' => $product_id,
            'Quantity' => $request->quantity + $old_quantity,
            'Slug' => $slug,
        ]);

        return redirect()->route('admin.product-detail.index')->with('success', 'Updated Successfully');
    }

    public function delete($id)
    {
        ProductDetail::where('ID', $id)->delete();
        return redirect()->route('admin.product-detail.index')->with('success', 'Deleted Successfully');
    }

    public function search(Request $request)
    {
        $data = $request->search;
        $product_details = DB::table('product_details As p')
            ->select('p.*')
            ->where('p.Code', 'like', '%' . $data . '%')
            ->orWhere('p.Import_Price', 'like', '%' . $data . '%')
            ->orWhere('p.Export_Price', 'like', '%' . $data . '%')
            ->orWhere('p.Sale_Price', 'like', '%' . $data . '%')
            ->orWhere('p.Material', 'like', '%' . $data . '%')
            ->orWhere('p.Color', 'like', '%' . $data . '%')
            ->orWhere('p.Quantity', 'like', '%' . $data . '%')
            ->orWhere('p.Is_Trending', 'like', '%' . $data . '%')
            ->orWhere('p.Is_New_Arrivals', 'like', '%' . $data . '%')
            ->orWhere('p.Is_Feature', 'like', '%' . $data . '%')
            ->paginate(5)
            ->appends(request()->query());
        if (!count($product_details)) {
            $error = 'No Result';
            return view('admin.product_detail.list', compact('error'));
        }
        return view('admin.product_detail.list', compact('product_details'));
    }
}
