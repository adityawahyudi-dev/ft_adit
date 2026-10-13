<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Certification;
use App\Models\Project;
use App\Models\Education;
use App\Models\ContactMessage;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Show main portfolio landing page.
     */
    public function index(Request $request)
    {
        $locale = app()->getLocale();
        $profile = Profile::first();
        $skills = Skill::where('is_active', true)->orderBy('sort_order')->get();
        $certifications = Certification::where('is_active', true)->orderBy('sort_order')->get();
        $projects = Project::where('status', 'published')->orderBy('sort_order')->get();
        $education = Education::orderBy('sort_order')->get();
        $settings = SiteSetting::pluck('value', 'key')->toArray();

        return view('portfolio.index', compact(
            'locale',
            'profile',
            'skills',
            'certifications',
            'projects',
            'education',
            'settings'
        ));
    }

    /**
     * Show dedicated About & Credentials page.
     */
    public function about(Request $request)
    {
        $locale = app()->getLocale();
        $profile = Profile::first();
        $education = Education::orderBy('sort_order')->get();
        $certifications = Certification::where('is_active', true)->orderBy('sort_order')->get();
        $settings = SiteSetting::pluck('value', 'key')->toArray();

        return view('portfolio.about', compact(
            'locale',
            'profile',
            'education',
            'certifications',
            'settings'
        ));
    }

    /**
     * Show full projects gallery.
     */
    public function projects(Request $request)
    {
        $locale = app()->getLocale();
        $category = $request->get('category', 'all');

        $query = Project::where('status', 'published')->orderBy('sort_order');
        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }
        $projects = $query->get();

        $profile = Profile::first();
        $settings = SiteSetting::pluck('value', 'key')->toArray();

        return view('portfolio.projects', compact(
            'locale',
            'category',
            'projects',
            'profile',
            'settings'
        ));
    }

    /**
     * Show Project case study detail.
     */
    public function projectDetail(Request $request, string $slug)
    {
        $locale = app()->getLocale();
        
        $project = Project::where('slug', $slug);
        if (!auth()->check()) {
            $project->where('status', 'published');
        }
        $project = $project->firstOrFail();

        $relatedProjects = Project::where('status', 'published')
            ->where('id', '!=', $project->id)
            ->take(2)
            ->get();

        $profile = Profile::first();
        $settings = SiteSetting::pluck('value', 'key')->toArray();

        return view('portfolio.project-detail', compact(
            'locale',
            'project',
            'relatedProjects',
            'profile',
            'settings'
        ));
    }

    /**
     * Download or view CV.
     */
    public function downloadCv(Request $request)
    {
        $profile = Profile::first();
        $filePath = public_path('assets/images/cv-preview.png');

        if (file_exists($filePath)) {
            $filename = $profile->cv_filename ?? 'CV_Aditya_Yazidil_Wahyudi.png';
            return response()->download($filePath, $filename);
        }

        return redirect()->route('portfolio.index')->with('error', 'CV belum tersedia.');
    }

    /**
     * Submit contact form message.
     */
    public function contact(Request $request)
    {
        // Simple honeypot anti-spam
        if ($request->filled('website_url')) {
            return response()->json(['success' => true, 'message' => 'Terkirim!'], 200);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:150',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|min:5|max:5000',
        ]);

        $message = ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'] ?? 'Pesan dari Portofolio',
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => __('portfolio.form_success'),
            ]);
        }

        return redirect()->back()->with('contact_success', __('portfolio.form_success'));
    }

    /**
     * Switch locale.
     */
    public function setLocale(Request $request, string $locale)
    {
        if (in_array($locale, ['id', 'en'])) {
            session(['locale' => $locale]);
        }

        return redirect()->back();
    }
}
