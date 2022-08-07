<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
//        menampilkan halaman homepage
        return view('homepage');
    }

    public function contact (Request $request)
    {
//        Validasi data yang akan dikirim

        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required',
            // 'phone_number' => 'required|min:8|max:13',
            'message' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama harus diisi!',
            'name.max' => 'Nama terlalu panjang!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Isikan email anda dengan benar!',
            'subject.required' => 'Subject harus diisi!',
//            'phone_number.required' => 'Nomor telepon harus diisi!',
//            'phone_number.min' => 'Nomor telepon terlalu pendek!',
//            'phone_number.max' => 'Nomor telepon terlalu panjang!',
            'message.required' => 'Pesan harus diisi',
        ];

        $this->validate($request, $rules, $messages);

//        Proses memasukan data yg akan dikirim ke tabel contact
        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
//        $contact->phone_number = $request->phone_number;
        $contact->message = $request->message;

//        dd($contact);
        Mail::to('faldiharido@gmail.com')->send(new ContactMail($contact));

//        kembali ke halaman sebelumnya dengan pesan berhasil dikirim!

        return redirect('/#contact')->with('success', 'Thank you for contact us!');
    }
}
