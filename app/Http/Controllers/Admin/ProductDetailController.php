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
            'color' => 'required',
            'size' => 'required',
            'code' => 'required|unique:product_details',
            'quantity' => 'required|numeric',
        ],
        [
            'import_price.required' => 'Giá nhập không được bỏ trống',
            'import_price.numeric' => 'Giá nhập phải là số',
            'export_price.required' => 'Giá bán không được bỏ trống',
            'export_price.numeric' => 'Giá bán phải là số',
            'sale_price.required' => 'Giá giảm không được bỏ trống',
            'sale_price.numeric' => 'Giá giảm phải là số',
            'main_img.required' => 'Ảnh chính không được bỏ trống',
            'slide_img_1.required' => 'Ảnh slide 1 không được bỏ trống',
            'slide_img_1.unique' => 'Ảnh slide 1 đã tồn tại',
            'slide_img_2.required' => 'Ảnh slide 2 không được bỏ trống',
            'slide_img_2.unique' => 'Ảnh slide 2 đã tồn tại',
            'information.required' => 'Thông tin không được bỏ trống',
            'material.required' => 'Chất liệu không được bỏ trống',
            'color.required' => 'Màu sắc không được bỏ trống',
            'size.required' => 'Kích cỡ không được bỏ trống',
            'code.required' => 'Mã chi tiết sản phẩm không được bỏ trống',
            'code.unique' => 'Mã chi tiết sản phẩm đã tồn tại',
            'quantity.required' => 'Số lượng không được bỏ trống',
            'quantity.numeric' => 'Số lượng không hợp lệ',
        ]);

        $product = Product::find($request->product_id);

        $slug = Str::slug($product->Name . "-" . $request->color);

        $Main_IMG = cloudinary()->upload($request->file('main_img')->getRealPath())->getSecurePath();
        $Slide_IMG_1 = cloudinary()->upload($request->file('slide_img_1')->getRealPath())->getSecurePath();
        $Slide_IMG_2 = cloudinary()->upload($request->file('slide_img_2')->getRealPath())->getSecurePath();

        ProductDetail::create([
            'Import_Price' => $request->import_price,
            'Export_Price' => $request->export_price,
            'Sale_Price' => $request->sale_price,
            'Main_IMG' => $Main_IMG,
            'Slide_IMG_1' => $Slide_IMG_1,
            'Slide_IMG_2' => $Slide_IMG_2,
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

        return redirect()->route('admin.product-detail.index')->with('success', 'Thêm mới thành công');
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
            'main_img' => 'required',
            'slide_img_1' => 'required',
            'slide_img_2' => 'required',
            'information' => 'required',
            'material' => 'required',
            'color' => 'required',
            'size' => 'required',
            'code' => 'required',
            'quantity' => 'required|numeric',
        ],
        [
            'import_price.required' => 'Giá nhập không được bỏ trống',
            'import_price.numeric' => 'Giá nhập phải là số',
            'export_price.required' => 'Giá bán không được bỏ trống',
            'export_price.numeric' => 'Giá bán phải là số',
            'main_img.required' => 'Ảnh chính không được bỏ trống',
            'slide_img_1.required' => 'Ảnh slide 1 không được bỏ trống',
            'slide_img_2.required' => 'Ảnh slide 2 không được bỏ trống',
            'information.required' => 'Thông tin không được bỏ trống',
            'material.required' => 'Chất liệu không được bỏ trống',
            'color.required' => 'Màu sắc không được bỏ trống',
            'size.required' => 'Kích cỡ không được bỏ trống',
            'code.required' => 'Mã chi tiết sản phẩm không được bỏ trống',
            'code.unique' => 'Mã chi tiết sản phẩm đã tồn tại',
            'quantity.required' => 'Số lượng không được bỏ trống',
            'quantity.numeric' => 'Số lượng không hợp lệ',
        ]);

        $product_detail = ProductDetail::find($id);
        $product_id  = $product_detail->Product_ID;
        $product = Product::find($product_id);

        $slug = Str::slug($product->Name . "-" . $request->color);

        $old_product_detail = ProductDetail::find($id);
        $old_quantity = $old_product_detail->Quantity;

        $Main_IMG = cloudinary()->upload($request->file('main_img')->getRealPath())->getSecurePath();
        $Slide_IMG_1 = cloudinary()->upload($request->file('slide_img_1')->getRealPath())->getSecurePath();
        $Slide_IMG_2 = cloudinary()->upload($request->file('slide_img_2')->getRealPath())->getSecurePath();

        ProductDetail::where('ID', $id)->update([
            'Import_Price' => $request->import_price,
            'Export_Price' => $request->export_price,
            'Sale_Price' => $request->sale_price,
            'Main_IMG' => $Main_IMG,
            'Slide_IMG_1' => $Slide_IMG_1,
            'Slide_IMG_2' => $Slide_IMG_2,
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

        return redirect()->route('admin.product-detail.index')->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        ProductDetail::where('ID', $id)->delete();
        return redirect()->route('admin.product-detail.index')->with('success', 'Đã xoá thành công');
    }

    public function search(Request $request)
    {
        $searchTerm = '%' . $request->input('search') . '%';

        $product_details = DB::table('product_details As p')
            ->select('p.*')
            ->where(function ($query) use ($searchTerm) {
                $query->where('p.Code', 'like', $searchTerm)
                    ->orWhere('p.Import_Price', 'like', $searchTerm)
                    ->orWhere('p.Export_Price', 'like', $searchTerm)
                    ->orWhere('p.Sale_Price', 'like', $searchTerm)
                    ->orWhere('p.Material', 'like', $searchTerm)
                    ->orWhere('p.Color', 'like', $searchTerm)
                    ->orWhere('p.Quantity', 'like', $searchTerm)
                    ->orWhere('p.Is_Trending', 'like', $searchTerm)
                    ->orWhere('p.Is_New_Arrivals', 'like', $searchTerm)
                    ->orWhere('p.Is_Feature', 'like', $searchTerm);
            })
            ->paginate(5)
            ->appends(request()->query());

        if ($product_details->isEmpty()) {
            $error = 'Không tìm thấy kết quả';
            return view('admin.product_detail.list', compact('error'));
        }

        return view('admin.product_detail.list', compact('product_details'));
    }
}
