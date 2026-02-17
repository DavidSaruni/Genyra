<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    //
    public function index()
    {
        return view(view: 'web.index');
    }

    public function contactPost(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);
        
        if($validated){
            // try to send email to admin
            try{
                // i want to send to two emails,to two department emails
                Mail::to(['laytonmatheka@gmail.com','executivedirector@genyragroup.com','info@genyragroup.com'])->send(new ContactMail($validated));
                Contact::create($validated);
            }
            catch(\Exception $e){
                Log::error('Failed to send contact email: ' . $e->getMessage());
                return back()->with('error','message failed to send, please try again later ' . $e->getMessage());
            }
            return back()->with('success','Message send successfully');
        }
        else{
            return back()->with('error','Failed to send message');
        }
        
    }

    public function projects(){
        return view('web.projects');
    }
}
