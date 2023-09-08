<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SlideController extends Controller
{
    public function index()
    {
        $slides = DB::table('sliedes As s')
            ->join('brands as b', 's.Brand_ID', 'b.ID')
            ->select('s.*', 'b.Name')
            ->paginate(10);
        return view('admin.slide.list', compact('slides'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('admin.slide.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
        ]);

        Slide::create([
            'Brand_ID' => $request->brand,
            'Tittle' => $request->title,
            'IMG' => $request->image,
            'Is_Top_Slide' => $request->top_or_middle_slide == 'top_slide' ? 'Top Slide' : '',
            'Is_Middle_Slide' => $request->top_or_middle_slide == 'middle_slide' ? 'Middle Slide' : '',
        ]);

        return redirect()->route('admin.slide.index')->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $slide = Slide::find($id);
        $brands = Brand::all();
        return view('admin.slide.edit', compact('slide', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
        ]);

        Slide::where('ID', $id)->update([
            'Brand_ID' => $request->brand,
            'Tittle' => $request->title,
            'IMG' => $request->image,
            'Is_Top_Slide' => $request->top_or_middle_slide == 'top_slide' ? 1 : '',
            'Is_Middle_Slide' => $request->top_or_middle_slide == 'middle_slide' ? 1 : '',
        ]);

        return redirect()->route('admin.slide.edit', $id)->with('success', 'Updated Successfully');
    }

    public function delete($id)
    {
        Slide::where('ID', $id)->delete();
        return redirect()->route('admin.slide.index')->with('success', 'Deleted Successfully!');
    }

    public function search(Request $request)
    {
        $slides = DB::table('sliedes As s')
        ->join('brands as b', 's.Brand_ID', 'b.ID')
        ->where('Name', 'LIKE', '%'. $request->search . '%')
        ->orWhere('Tittle', 'LIKE', '%'. $request->search . '%')
        ->orWhere('Is_Top_Slide', 'LIKE', '%'. $request->search . '%')
        ->orWhere('Is_Middle_Slide', 'LIKE', '%'. $request->search . '%')
        ->paginate(10)
        ->appends(request()->query());
        if(!count($slides)){
            $error = 'No Result';
            return view('admin.slide.list', compact('error'));
        }
        return view('admin.slide.list', compact('slides'));
    }
}
