<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactReplyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        // Mark as read if not already read
        if (!$contact->read_at) {
            $contact->update(['read_at' => now()]);
        }
        
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Show the form for replying to the contact message.
     */
    public function reply(Contact $contact)
    {
        return view('admin.contacts.reply', compact('contact'));
    }

    /**
     * Send reply to the contact message.
     */
    public function sendReply(Request $request, Contact $contact)
    {
        $request->validate([
            'reply_message' => 'required|string|min:10',
        ]);

        try {
            Mail::to($contact->email)->send(new ContactReplyMail($contact, $request->reply_message));
            
            return redirect()->route('admin.contacts.show', $contact->id)
                ->with('success', 'Reply sent successfully to ' . $contact->email);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send reply: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        
        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact message deleted successfully.');
    }
}
