<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('admin.payment.list', compact('payments'));
    }

    public function create()
    {
        return view('admin.payment.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'method' => 'required|unique:payments',
        ],
        [
            'method.required' => 'Phương thức thanh toán không được bỏ trống',
            'method.unique' => 'Phương thức thanh toán đã tồn tại',
        ]);

        Payment::create([
            'Method' => $request->method,
        ]);

        return redirect()->route('admin.payment.index')->with('success', 'Thêm mới thành công');
    }

    public function edit($id)
    {
        $payment = Payment::find($id);
        return view('admin.payment.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);
        $oldMethod = $payment->Method;

        if($request->method != $oldMethod){
            $this->validate($request, [
                'method' => 'required|unique:payments',
            ],
            [
                'method.required' => 'Phương thức thanh toán không được bỏ trống',
                'method.unique' => 'Phương thức thanh toán đã tồn tại',
            ]);
        }

        Payment::where('ID', $id)->update([
            'Method' => $request->method,
        ]);

        return redirect()->route('admin.payment.edit', $id)->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        Payment::where('ID', $id)->delete();
        return redirect()->route('admin.payment.index')->with('success', 'Đã xoá thành công!');
    }

    public function search(Request $request)
    {
        $codes = DB::table('codes')
        ->where('Code', 'LIKE', '%'. $request->search . '%')
        ->orWhere('Discount', 'LIKE', '%'. $request->search . '%')
        ->orWhere('Date_Start', 'LIKE', '%'. $request->search . '%')
        ->orWhere('Date_End', 'LIKE', '%'. $request->search . '%')
        ->orWhere('created_at', 'LIKE', '%'. $request->search . '%')
        ->get();
        if(!count($codes)){
            $error = 'No Result';
            return view('admin.discount_code.list', compact('error'));
        }
        return view('admin.discount_code.list', compact('codes'));
    }
}
