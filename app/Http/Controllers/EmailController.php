<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\CustomEmail;
use App\Models\Email;

class EmailController extends Controller
{
    public function index()
    {
        $emails = Email::orderBy('sent_at', 'desc')->paginate(20);
        return view('admin.emails.index', compact('emails'));
    }

    public function create()
    {
        return view('admin.emails.create');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'to_email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'attachments.*' => 'nullable|file|max:10240', // Max 10MB per file
        ]);

        try {
            $attachments = [];
            $attachmentCount = 0;
            
            // Handle attachments properly
            if ($request->hasFile('attachments')) {
                $files = $request->file('attachments');
                if (!is_array($files)) {
                    $files = [$files];
                }
                
                foreach ($files as $file) {
                    if ($file && $file->isValid()) {
                        $path = $file->store('email_attachments', 'public');
                        $fullPath = storage_path('app/public/' . $path);
                        
                        if (file_exists($fullPath)) {
                            $attachments[] = [
                                'path' => $fullPath,
                                'name' => $file->getClientOriginalName(),
                                'mime' => $file->getMimeType()
                            ];
                            $attachmentCount++;
                        }
                    }
                }
            }

            Mail::to($validated['to_email'])->send(new CustomEmail(
                $validated['subject'],
                $validated['message'],
                $attachments
            ));

            // Clean up temporary files
            foreach ($attachments as $attachment) {
                if (file_exists($attachment['path'])) {
                    unlink($attachment['path']);
                }
            }

            // Save email to database
            Email::create([
                'to_email' => $validated['to_email'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'status' => 'sent',
                'sent_at' => now(),
                'attachment_count' => $attachmentCount,
            ]);

            return redirect()->route('admin.emails.index')
                ->with('success', 'Email sent successfully!');

        } catch (\Exception $e) {
            return redirect()->route('admin.emails.create')
                ->with('error', 'Failed to send email: ' . $e->getMessage())
                ->withInput();
        }
    }
}
