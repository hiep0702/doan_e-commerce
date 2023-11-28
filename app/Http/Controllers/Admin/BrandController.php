<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('admin.brand.list', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|unique:brands',
            'logo'          => 'required',
            'information'   => 'required',
            'code'          => 'required|unique:brands',
        ]);

        $slug = Str::slug($request->name);

        $logo = cloudinary()->upload($request->file('logo')->getRealPath())->getSecurePath();

        Brand::create([
            'Name'          => $request->name,
            'Logo'          => $logo,
            'Information'   => $request->information,
            'Code'          => $request->code,
            'Slug'          => $slug,
        ]);

        return redirect()->route('admin.brand.index')->with('success', 'Thêm mới thành công');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required',
            'logo'          => 'required',
            'information'   => 'required',
            'code'          => 'required',
        ]);

        $slug = Str::slug($request->name);

        $logo = cloudinary()->upload($request->file('logo')->getRealPath())->getSecurePath();

        Brand::where('ID', $id)->update([
            'Name'          => $request->name,
            'Logo'          => $logo,
            'Information'   => $request->information,
            'Code'          => $request->code,
            'Slug'          => $slug,
        ]);

        return redirect()->route('admin.brand.index')->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        $brand_id = $brand->ID;
        $products = Product::where('Brand_ID', $brand_id)->count();
        if ($products) {
            return redirect()->route('admin.brand.index')->with('error', 'Không thể xóa thương hiệu này!');
        }
        Brand::where('ID', $id)->delete();
        return redirect()->route('admin.brand.index')->with('success', 'Đã xoá thành công');
    }

    public function search(Request $request)
    {
        $searchTerm = '%' . $request->input('search') . '%';

        $brands = DB::table('brands')
            ->where('Code', 'like', $searchTerm)
            ->orWhere('Name', 'like', $searchTerm)
            ->paginate(10);

        if ($brands->isEmpty()) {
            $error = 'Không tìm thấy kết quả';
            return view('admin.brand.list', compact('error'));
        }

        return view('admin.brand.list', compact('brands'));
    }
}
