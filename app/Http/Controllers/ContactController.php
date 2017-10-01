<?php

namespace App\Http\Controllers;

use App\Mail\CotactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(Request $request){
        $this->validate($request,[
            'name' => 'required| max:100',
            'email' => 'required | email',
            'message' => 'required | min:100'

        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;
        Mail::to('robinmedia7@gmail.com')->send(new CotactMail($name,$email,$message));
        return redirect()->back()->withMsg('Your Mail Has Been Send Successfully');
    }
}
