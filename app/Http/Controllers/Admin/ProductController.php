<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products As p')
            ->join('brands as b', 'p.Brand_ID', '=', 'b.ID')
            ->join('categories as c', 'p.Category_ID', '=', 'c.ID')
            ->select('p.*', 'b.Name as Brand_Name', 'c.Name as Category_Name')
            ->paginate(10);
        return view('admin.product.list', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'brand' => 'required',
            'category' => 'required',
            'name' => 'required|unique:products',
            'img' => 'required',
            'code' => 'required|unique:products',
        ],
        [
            'brand.required' => 'Thương hiệu không được bỏ trống',
            'category.required' => 'Thể loại không được bỏ trống',
            'name.required' => 'Tên sản phẩm không được bỏ trống',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'img.required' => 'Ảnh không được bỏ trống',
            'code.required' => 'Mã sản phẩm không được bỏ trống',
            'code.unique' => 'Mã sản phẩm đã tồn tại',
        ]);


        $slug = Str::slug($request->name);

        $IMG = cloudinary()->upload($request->file('img')->getRealPath())->getSecurePath();

        Product::create([
            'Brand_ID' => $request->brand,
            'Category_ID' => $request->category,
            'Name' => $request->name,
            'IMG' => $IMG,
            'Code' => $request->code,
            'Slug' => $slug,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Thêm mới thành công');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.edit', compact('brands', 'product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'brand' => 'required',
            'category' => 'required',
            'name' => 'required',
            'img' => 'required',
            'code' => 'required',
        ],
        [
            'brand.required' => 'Thương hiệu không được bỏ trống',
            'category.required' => 'Thể loại không được bỏ trống',
            'name.required' => 'Tên sản phẩm không được bỏ trống',
            'img.required' => 'Ảnh không được bỏ trống',
            'code.required' => 'Mã sản phẩm không được bỏ trống',
        ]);

        $slug = Str::slug($request->name);

        $IMG = cloudinary()->upload($request->file('img')->getRealPath())->getSecurePath();

        Product::where('ID', $id)->update([
            'Brand_ID' => $request->brand,
            'Category_ID' => $request->category,
            'Name' => $request->name,
            'IMG' => $IMG,
            'Code' => $request->code,
            'Slug' => $slug,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product_id = $product->ID;
        $product_details = ProductDetail::where('Product_ID', $product_id)->count();
        if ($product_details) {
            return redirect()->route('admin.product.index')->with('error', 'Không thể xóa sản phẩm này!');
        }
        Product::where('ID', $id)->delete();
        return redirect()->route('admin.product.index')->with('success', 'Đã xoá thành công');
    }

    public function search(Request $request)
    {
        $searchTerm = '%' . $request->input('search') . '%';

        $products = DB::table('products As p')
            ->join('brands as b', 'p.Brand_ID', '=', 'b.ID')
            ->join('categories as c', 'p.Category_ID', '=', 'c.ID')
            ->select('p.*', 'b.Name as Brand_Name', 'c.Name as Category_Name')
            ->where(function ($query) use ($searchTerm) {
                $query->where('p.Code', 'like', $searchTerm)
                    ->orWhere('b.Name', 'like', $searchTerm)
                    ->orWhere('c.Name', 'like', $searchTerm)
                    ->orWhere('p.Name', 'like', $searchTerm);
            })
            ->paginate(10)
            ->appends(request()->query());

        if ($products->isEmpty()) {
            $error = 'Không tìm thấy kết quả';
            return view('admin.product.list', compact('error'));
        }

        return view('admin.product.list', compact('products'));
    }
}
