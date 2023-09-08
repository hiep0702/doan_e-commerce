<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
Use Alert;

use App\Mail\changePassword;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\SweetAlertServiceProvider;

class EmailController extends Controller
{
    public function getRecoverPassword(){
        $slide = DB::table('brand_collections')
        ->get();
        return view('clientsPage.changePassword',['img'=>$slide]);
    }

    public function postRecoverPassword(Request $req){
       $all_username = DB::table('users')
        ->get('username');

        $rules = [
            'user_name' => 'required'
        ];
        $messages = [
            'required' => 'This field is required'
        ];

        $req->validate($rules,$messages);

        $this_username = $req->user_name;

        $data = DB::table('users')
        ->where('username',$this_username)
        ->get();

        if(isset($data[0])){
            $user_email = DB::table('users')
            ->where('username',$this_username)
            ->get('Email');

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = ''; 
            $n = 10;
        
            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }

            $new_password = bcrypt($randomString);

            DB::table('users')
            ->where('username',$this_username)
            ->update(['password' => $new_password]);
            
            $details = [
                'title' => 'Recover Your Password From Pursellet'
                ,'body' => 'Your new password is:'.$randomString
            ];
            Alert::success('Email Sent Successfully')->autoclose(1500);

            Mail::to($user_email[0]->Email)->send(new changePassword($details));
            return redirect()->route('client.login');
        }
        
        else{
            Alert::error('This username does not exist')->autoclose(1500);
            return redirect()->back();
        }
    }
}
