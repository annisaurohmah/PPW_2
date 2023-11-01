<?php
namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use App\Jobs\SendMailJob;
use App\Mail\SendEmail;
// use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    // public function index()
    // {
    //     $content = [
    //         'name' => 'Ini nama saya',
    //         'subject' => 'This is the mail subject',
    //         'body' => 'This is the email body of how
    //         to send email from laravel 10 with mailtrap.'
    //     ];

    //     Mail::to('urohmahannisa@gmail.com')->send(new SendEmail($content));
    //         return "Email berhasil dikirim.";
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email:dns',
    //         'subject' => 'required|string|max:255',
    //         'body' => 'required|string',
    //     ]);

    //       
    // }

    public function index()
    {
        return view('emails.kirim-email');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        dispatch(new SendMailJob($data));
        return redirect()->route('kirim-email')->with('success', 'Email berhasil dikirim');
    }
}