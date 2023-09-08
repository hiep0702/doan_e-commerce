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

        Brand::create([
            'Name'          => $request->name,
            'Logo'          => $request->logo,
            'Information'   => $request->information,
            'Code'          => $request->code,
            'Slug'          => $slug,
        ]);

        return redirect()->route('admin.brand.index')->with('success', 'Created Successfully');
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

        Brand::where('ID', $id)->update([
            'Name'          => $request->name,
            'Logo'          => $request->logo,
            'Information'   => $request->information,
            'Code'          => $request->code,
            'Slug'          => $slug,
        ]);

        return redirect()->route('admin.brand.index')->with('success', 'Updated Successfully');
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        $brand_id = $brand->ID;
        $products = Product::where('Brand_ID', $brand_id)->count();
        if ($products) {
            return redirect()->route('admin.brand.index')->with('error', 'Cannot detele this brand!');
        }
        Brand::where('ID', $id)->delete();
        return redirect()->route('admin.brand.index')->with('success', 'Deleted Successfully');
    }

    public function search(Request $request)
    {
        $data = $request->search;
        $brands = DB::table('brands')
            ->where('Code', 'like', '%' . $data . '%')
            ->orWhere('Name', 'like', '%' . $data . '%')
            ->paginate(10);
        if(!count($brands)){
            $error = 'No Result';
            return view('admin.brand.list', compact('error'));
        }
        return view('admin.brand.list', compact('brands'));
    }

    // public function search(Request $request){
    //     if($request->get('query')){
    //         $query = $request->get('query');
    //         $data = DB::table('brands')
    //         ->where('Name', 'LIKE', "%{$query}%")
    //         ->get();
    //         // return response()->json([
    //         //     'data' => $data,
    //         // ]);
    //         $output = "<tbody id='table-body-side'>";
    //         foreach ($data as $index => $data)
    //         {
    //             $output .= "<tr class='odd gradeX' align='center'>
    //             <td>".++$index."</td>
    //             <td>".$data->Code."</td>
    //             <td>".$data->Name."</td>
    //             <td><img width='100' src='".$data->Logo."'></td>
    //             <td>".$data->Information."</td>
    //             <td class='center'><i class='fa fa-trash-o  fa-fw'></i><a href='brand/delete".$data->ID."')> Delete</a></td>
    //             <td class='center'><i class='fa fa-pencil fa-fw'></i> <a href='brand/edit".$data->ID."')>Edit</a></td>
    //         </tr>";
    //         }
    //         $output .= "</tbody>";
    //         echo $output;
    //     }
    // }
}
