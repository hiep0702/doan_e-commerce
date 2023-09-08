<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Code;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscountCodeController extends Controller
{
    public function index()
    {
        $codes = Code::all();
        return view('admin.discount_code.list', compact('codes'));
    }

    public function create()
    {
        return view('admin.discount_code.create');
    }

    public function store(Request $request)
    {
        // dd($request->temporary);
        $this->validate($request, [
            'code' => 'required|unique:codes',
            'discount' => 'required|numeric|min:1|max:50',
            'date_start' => 'required|date|before_or_equal:date_end',
            'date_end' => 'required|date|after_or_equal:date_start',
        ]);

        Code::create([
            'Code' => $request->code,
            'Discount' => $request->discount,
            'Date_Start' => $request->date_start,
            'Date_End' => $request->date_end,
            'Temporary' => $request->temporary,
            'Status' => 'Upcoming',
        ]);

        return redirect()->route('admin.discount.index')->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $code = Code::find($id);
        return view('admin.discount_code.edit', compact('code'));
    }

    public function update(Request $request, $id)
    {
        $code = Code::find($id);
        $oldCode = $code->Code;
        if ($request->code == $oldCode) {
            $this->validate($request, [
                'discount' => 'required|numeric|min:1|max:50',
                'date_start' => 'required|date|before_or_equal:date_end',
                'date_end' => 'required|date|after_or_equal:date_start',
            ]);
        } else {
            $this->validate($request, [
                'code' => 'required|unique:codes',
                'discount' => 'required|numeric|min:1|max:50',
                'date_start' => 'required|date|before_or_equal:date_end',
                'date_end' => 'required|date|after_or_equal:date_start',
            ]);
        }

        Code::where('ID', $id)->update([
            'Code' => $request->code,
            'Discount' => $request->discount,
            'Date_Start' => $request->date_start,
            'Date_End' => $request->date_end,
            'Temporary' => $request->temporary,
        ]);

        return redirect()->route('admin.discount.edit', $id)->with('success', 'Updated Successfully');
    }

    public function delete($id)
    {
        Code::where('ID', $id)->delete();
        return redirect()->route('admin.discount.index')->with('success', 'Deleted Successfully!');
    }

    public function search(Request $request)
    {
        $codes = DB::table('codes')
            ->where('Code', 'LIKE', '%' . $request->search . '%')
            ->orWhere('Discount', 'LIKE', '%' . $request->search . '%')
            ->orWhere('Date_Start', 'LIKE', '%' . $request->search . '%')
            ->orWhere('Date_End', 'LIKE', '%' . $request->search . '%')
            ->orWhere('Status', 'LIKE', '%' . $request->search . '%')
            ->orWhere('created_at', 'LIKE', '%' . $request->search . '%')
            ->orWhere('Temporary', 'LIKE', '%' . $request->search . '%')
            ->get();
        if (!count($codes)) {
            $error = 'No Result';
            return view('admin.discount_code.list', compact('error'));
        }
        return view('admin.discount_code.list', compact('codes'));
    }

    public function check()
    {
        $now = Carbon::now()->toDateString();

        Code::where('Date_Start', '>', $now)->update([
            'Status' => 'Upcoming',
        ]);

        Code::where('Date_Start', '=', $now)->update([
            'Status' => 'On',
        ]);

        Code::where('Date_End', '<', $now)->update([
            'Status' => 'Off',
        ]);
    }
}
