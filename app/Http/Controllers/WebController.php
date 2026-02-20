<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Category;
use App\Models\Contact;
use App\Models\News;
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
            try{
                Mail::to('executivedirector@genyragroup.com')->send(new ContactMail($validated));
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

    public function news(Request $request){
        $query = News::with('categories')
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());

        // Filter by category if provided
        if ($request->has('category')) {
            $categorySlug = $request->get('category');
            $category = Category::where('slug', $categorySlug)->first();
            if ($category) {
                $query->whereHas('categories', function($q) use ($category) {
                    $q->where('categories.id', $category->id);
                });
            }
        }

        // Search functionality
        if ($request->has('search')) {
            $searchTerm = $request->get('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('excerpt', 'like', '%' . $searchTerm . '%')
                  ->orWhere('content', 'like', '%' . $searchTerm . '%');
            });
        }

        $news = $query->latest('published_at')->paginate(6);
        
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        
        return view('web.news', compact('news', 'categories'));
    }

    public function newsReadMore($slug = null){
        if ($slug) {
            $article = News::with('categories')
                ->where('slug', $slug)
                ->where('status', 'published')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->firstOrFail();
            
            $relatedArticles = News::with('categories')
                ->where('status', 'published')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->where('id', '!=', $article->id)
                ->whereHas('categories', function($query) use ($article) {
                    $query->whereIn('categories.id', $article->categories->pluck('id'));
                })
                ->latest('published_at')
                ->limit(3)
                ->get();
            
            return view('web.newsReadMore', compact('article', 'relatedArticles'));
        }
        
        return view('web.newsReadMore');
    }


    public function courses(){
        return view('web.courses');
    }

}
