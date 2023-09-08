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
        ]);


        $slug = Str::slug($request->name);

        Product::create([
            'Brand_ID' => $request->brand,
            'Category_ID' => $request->category,
            'Name' => $request->name,
            'IMG' => $request->img,
            'Code' => $request->code,
            'Slug' => $slug,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Created Successfully');
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
        ]);

        $slug = Str::slug($request->name);

        Product::where('ID', $id)->update([
            'Brand_ID' => $request->brand,
            'Category_ID' => $request->category,
            'Name' => $request->name,
            'IMG' => $request->img,
            'Code' => $request->code,
            'Slug' => $slug,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Updated Successfully');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product_id = $product->ID;
        $product_details = ProductDetail::where('Product_ID', $product_id)->count();
        if($product_details){
            return redirect()->route('admin.product.index')->with('error', 'Cannot detele this product!');
        }
        Product::where('ID', $id)->delete();
        return redirect()->route('admin.product.index')->with('success', 'Deleted Successfully');
    }

    public function search(Request $request)
    {
        $data = $request->search;
        $products = DB::table('products As p')
        ->join('brands as b', 'p.Brand_ID', '=', 'b.ID')
        ->join('categories as c', 'p.Category_ID', '=', 'c.ID')
        ->select('p.*', 'b.Name as Brand_Name', 'c.Name as Category_Name')
        ->where('p.Code', 'like', '%' . $data . '%')
        ->orWhere('b.Name', 'like', '%' . $data . '%')
        ->orWhere('c.Name', 'like', '%' . $data . '%')
        ->orWhere('p.Name', 'like', '%' . $data . '%')
        ->paginate(10)
        ->appends(request()->query());
        if(!count($products)){
            $error = 'No Result';
            return view('admin.product.list', compact('error'));
        }
        return view('admin.product.list', compact('products'));
    }
}
