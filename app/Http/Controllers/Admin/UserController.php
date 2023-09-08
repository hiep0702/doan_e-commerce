<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(10);
        return view('admin.user.list', compact('users'));
    }

    public function detail($id){
        $user = User::find($id);
        return view('admin.user.detail', compact('user'));
    }

    public function search(Request $request)
    {
        $data = $request->search;
        $users = DB::table('users')
            ->where('Code', 'like', '%' . $data . '%')
            ->orWhere('First_Name', 'like', '%' . $data . '%')
            ->orWhere('Last_Name', 'like', '%' . $data . '%')
            ->orWhereDate('Dob', 'like', '%' . $data . '%')
            ->orWhere('Email', 'like', '%' . $data . '%')
            ->orWhere('username', 'like', '%' . $data . '%')
            ->orWhere('Number_Phone', 'like', '%' . $data . '%')
            ->orWhere('Rank', 'like', '%' . $data . '%')
            ->orWhere('Total_Amount_Spent', 'like', '%' . $data . '%')
            ->orWhereDate('created_at', 'like', '%' . $data . '%')
            ->paginate(10)
            ->appends(request()->query());
        if (!count($users)) {
            $error = 'No Result';
            return view('admin.user.list', compact('error'));
        }
        return view('admin.user.list', compact('users'));
    }
}
