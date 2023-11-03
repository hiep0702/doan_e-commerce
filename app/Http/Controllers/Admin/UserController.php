<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.list', compact('users'));
    }

    public function detail($id)
    {
        $user = User::find($id);
        return view('admin.user.detail', compact('user'));
    }

    public function search(Request $request)
    {
        $searchTerm = '%' . $request->input('search') . '%';

        $users = DB::table('users')
            ->where(function ($query) use ($searchTerm) {
                $query->where('Code', 'like', $searchTerm)
                    ->orWhere('First_Name', 'like', $searchTerm)
                    ->orWhere('Last_Name', 'like', $searchTerm)
                    ->orWhereDate('Dob', 'like', $searchTerm)
                    ->orWhere('Email', 'like', $searchTerm)
                    ->orWhere('username', 'like', $searchTerm)
                    ->orWhere('Number_Phone', 'like', $searchTerm)
                    ->orWhere('Rank', 'like', $searchTerm)
                    ->orWhere('Total_Amount_Spent', 'like', $searchTerm)
                    ->orWhereDate('created_at', 'like', $searchTerm);
            })
            ->paginate(10)
            ->appends(request()->query());

        if ($users->isEmpty()) {
            $error = 'Không tìm thấy kết quả';
            return view('admin.user.list', compact('error'));
        }

        return view('admin.user.list', compact('users'));
    }
}
