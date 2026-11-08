<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Category;
use App\Models\Contact;
use App\Models\News;
use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    //
    public function index()
    {
        $poster = Poster::getActive();

        $baseQuery = fn () => News::with('categories')
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc');

        $latestNews = $baseQuery()->first();

        // Exactly four theme cards for the homepage strip (exclude featured)
        $latestFour = $baseQuery()
            ->when($latestNews, fn ($q) => $q->whereKeyNot($latestNews->id))
            ->limit(4)
            ->get()
            ->values();

        $partnerLogos = collect(glob(public_path('images/logo/*')) ?: [])
            ->filter(fn ($path) => preg_match('/\.(png|jpe?g|svg|webp)$/i', $path))
            ->sort()
            ->map(fn ($path) => 'images/logo/' . basename($path))
            ->values();

        return view('web.index', compact('poster', 'latestNews', 'latestFour', 'partnerLogos'));
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

    // course readmore
    public function courseReadMore(){
        return view('web.courseReadMore');
    }

    public function ourStory(){
        return view('web.ourStory');
    }

    public function vissionMission(){
        return view('web.vissionMission');
    }

    public function values(){
        return view('web.values');
    }

    public function strategicDirection(){
        return view('web.strategicDirection');
    }

    public function whatWeDo(){
        return view('web.whatWeDo');
    }

    public function medicalSupplies()
    {
        return $this->departmentPage('medical-supplies');
    }

    public function medicalTechnologies()
    {
        return $this->departmentPage('medical-technologies');
    }

    public function strategicPlanning()
    {
        return $this->departmentPage('strategic-planning');
    }

    public function metrology()
    {
        return $this->departmentPage('metrology');
    }

    private function departmentPage(string $key)
    {
        $departments = $this->departments();
        abort_unless(isset($departments[$key]), 404);

        return view('web.department', [
            'department' => $departments[$key],
            'others' => array_values(array_filter(
                $departments,
                fn (array $department) => $department['key'] !== $key
            )),
        ]);
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    private function departments(): array
    {
        return [
            'medical-supplies' => [
                'key' => 'medical-supplies',
                'route' => 'department.medical-supplies',
                'tag' => 'Department 1',
                'title' => 'Medical Supplies',
                'eyebrow' => 'Life Sciences Research & Applied Biology',
                'meta' => 'Medical supplies and applied life sciences from genyra Group, covering laboratory sciences, diagnostics support, and scientific training.',
                'summary' => 'Genyra BioSciences is where discovery meets application. We bridge the gap between fundamental biological research and real-world health outcomes advancing knowledge in molecular biology, microbiology, genomics, and applied life sciences. Our work underpins the science behind better diagnostics, safer products, and more effective therapies.',
                'points' => [
                    'Applied biological research & laboratory sciences',
                    'Microbiology, genomics & molecular diagnostics support',
                    'Biosafety & biosecurity advisory',
                    'Research design, data analysis & scientific consulting',
                    'Capacity building & scientific training programmes',
                ],
                'image' => 'https://images.pexels.com/photos/2280571/pexels-photo-2280571.jpeg?auto=compress&cs=tinysrgb&w=1200',
                'image_alt' => 'Scientist working in a laboratory',
            ],
            'medical-technologies' => [
                'key' => 'medical-technologies',
                'route' => 'department.medical-technologies',
                'tag' => 'Department 2',
                'title' => 'Medical Technologies',
                'eyebrow' => 'Medical Technology & Device Solutions',
                'meta' => 'Medical technology solutions from genyra Group, from device selection and procurement to installation, training, and lifecycle support.',
                'summary' => 'Genyra MedTech delivers end-to-end medical technology solutions from device selection and procurement to deployment, user training, and post-market support. We work with hospitals, clinics, and health programmes to ensure the right technology is in the right hands, functioning optimally, and aligned with clinical and operational needs.',
                'points' => [
                    'Medical device supply, sourcing & procurement advisory',
                    'Technology needs assessment & health technology evaluation',
                    'Biomedical equipment management & lifecycle support',
                    'Installation, commissioning & user training',
                    'Maintenance programme design & technical support',
                ],
                'image' => 'https://images.pexels.com/photos/4386467/pexels-photo-4386467.jpeg?auto=compress&cs=tinysrgb&w=1200',
                'image_alt' => 'Medical technology in clinical use',
            ],
            'strategic-planning' => [
                'key' => 'strategic-planning',
                'route' => 'department.strategic-planning',
                'tag' => 'Department 3',
                'title' => 'Strategic Planning & QMS',
                'eyebrow' => 'Strategic Planning · Quality Management Systems',
                'meta' => 'Health systems strategic planning and quality management systems from genyra Group, including ISO alignment and performance improvement.',
                'summary' => 'Genyra Health Systems Planning & Advisory empowers health institutions and organisations with the strategic intelligence and quality frameworks they need to perform at their best. We partner with governments, health authorities, NGOs, and private sector actors to design robust health systems, develop strategic plans, and embed quality cultures that endure.',
                'points' => [
                    'Health sector strategic planning & institutional strengthening',
                    'Quality Management Systems (QMS) design & implementation',
                    'ISO standards alignment & accreditation readiness',
                    'Health policy advisory & programme design',
                    'Monitoring, evaluation & performance improvement frameworks',
                ],
                'image' => 'https://images.pexels.com/photos/3184292/pexels-photo-3184292.jpeg?auto=compress&cs=tinysrgb&w=1200',
                'image_alt' => 'Health systems planning discussion',
            ],
            'metrology' => [
                'key' => 'metrology',
                'route' => 'department.metrology',
                'tag' => 'Department 4',
                'title' => 'Metrology, Calibration & Preventive Maintenance',
                'eyebrow' => 'Precision Measurement & Instrument Assurance',
                'meta' => 'Metrology, calibration, and preventive maintenance from genyra Group for medical, laboratory, and industrial instruments.',
                'summary' => 'Genyra Metrology & Calibration Services is built on a fundamental truth: accurate measurement is the foundation of safe and effective healthcare. We provide professional calibration, verification, and measurement assurance services for medical, laboratory, and industrial instruments ensuring that every reading is trustworthy, traceable, and compliant.',
                'points' => [
                    'Calibration of medical, laboratory & industrial instruments',
                    'Measurement traceability to national & international standards',
                    'Preventive maintenance & performance verification',
                    'Calibration programme management & scheduling',
                    'Compliance with ISO 17025 & regulatory requirements',
                ],
                'image' => 'https://images.pexels.com/photos/3938022/pexels-photo-3938022.jpeg?auto=compress&cs=tinysrgb&w=1200',
                'image_alt' => 'Precision laboratory instruments',
            ],
        ];
    }
    
    public function directors(){
        return view('web.directors');
    }

    public function management(){
        return view('web.management');
    }

}
