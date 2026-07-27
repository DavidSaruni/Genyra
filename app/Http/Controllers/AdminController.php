<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Email;
use App\Models\News;
use App\Models\Poster;

class AdminController extends Controller
{
    public function index()
    {
        $newsCount = News::count();
        $publishedNews = News::where('status', 'published')->count();
        $draftNews = News::where('status', 'draft')->count();
        $contactCount = Contact::count();
        $unreadContacts = Contact::whereNull('read_at')->count();
        $readContacts = max($contactCount - $unreadContacts, 0);
        $posterCount = Poster::count();
        $activePoster = Poster::where('is_active', true)->count();
        $emailCount = class_exists(Email::class) ? Email::count() : 0;

        $publishRate = $newsCount > 0 ? (int) round(($publishedNews / $newsCount) * 100) : 0;
        $draftRate = max(100 - $publishRate, 0);
        $readRate = $contactCount > 0 ? (int) round(($readContacts / $contactCount) * 100) : 0;
        $unreadRate = max(100 - $readRate, 0);

        return view('admin.index', [
            'newsCount' => $newsCount,
            'publishedNews' => $publishedNews,
            'draftNews' => $draftNews,
            'contactCount' => $contactCount,
            'unreadContacts' => $unreadContacts,
            'readContacts' => $readContacts,
            'posterCount' => $posterCount,
            'activePoster' => $activePoster,
            'emailCount' => $emailCount,
            'publishRate' => $publishRate,
            'draftRate' => $draftRate,
            'readRate' => $readRate,
            'unreadRate' => $unreadRate,
            'recentNews' => News::with('categories')->latest()->take(5)->get(),
            'recentContacts' => Contact::latest()->take(5)->get(),
            'firstName' => explode(' ', auth()->user()->name)[0],
        ]);
    }
}
