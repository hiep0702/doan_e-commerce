<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\subscriberMail;
use Illuminate\Http\Request;
use App\Models\subscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class MailController extends Controller
{
    public function index()
    {
        $mails = subscriber::paginate(10);
        return view('admin.mail.list', compact('mails'));
    }

    public function getSendMail()
    {
        return view('admin.mail.mail');
    }

    public function PostSendMail(Request $req)
    {

        $mail_content = $req->mail;

        $details = [
            'title' => 'Sugar thông báo: ', 'body' => $mail_content
        ];

        $subscriber = DB::table('subscriber')
            ->get('email');

        foreach ($subscriber as $item) {
            Mail::to($item->email)->send(new subscriberMail($details));
        };

        Alert::success('Gửi thư thành công');
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $searchTerm = '%' . $request->input('search') . '%';

        $mails = DB::table('subscriber')
            ->where('email', 'like', $searchTerm)
            ->paginate(10);

        if ($mails->isEmpty()) {
            $error = 'Không tìm thấy kết quả';
            return view('admin.mail.list', compact('error'));
        }

        return view('admin.mail.list', compact('mails'));
    }
}
