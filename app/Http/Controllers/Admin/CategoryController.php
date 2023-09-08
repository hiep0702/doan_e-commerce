<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(10);
        return view('admin.category.list', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:categories',
            'code' => 'required|unique:categories',
        ]);

        $slug = Str::slug($request->name);

        Category::create([
            'Name' => $request->name,
            'Code' => $request->code,
            'Slug' => $slug,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Created Successfully');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
        ]);

        $slug = Str::slug($request->name);

        Category::where('ID', $id)->update([
            'Name' => $request->name,
            'Code' => $request->code,
            'Slug' => $slug,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Updated Successfully');
    }

    public function delete($id){
        $category = Category::find($id);
        $category_id = $category->ID;
        $products = Product::where('Category_ID', $category_id)->count();
        if($products){
            return redirect()->route('admin.category.index')->with('error', 'Cannot detele this category!');
        }
        Category::where('ID', $id)->delete();
        return redirect()->route('admin.category.index')->with('success', 'Deleted Successfully');
    }

    public function search(Request $request)
    {
        $data = $request->search;
        $categories = DB::table('categories')
            ->where('Code', 'like', '%' . $data . '%')
            ->orWhere('Name', 'like', '%' . $data . '%')
            ->paginate(10);
        if(!count($categories)){
            $error = 'No Result';
            return view('admin.category.list', compact('error'));
        }
        return view('admin.category.list', compact('categories'));
    }
}
