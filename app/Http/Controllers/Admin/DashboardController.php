<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Certification;
use App\Models\ContactMessage;
use App\Models\Profile;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $publishedProjects = Project::where('status', 'published')->count();
        $draftProjects = Project::where('status', 'draft')->count();

        $totalSkills = Skill::count();
        $totalCerts = Certification::count();

        $totalMessages = ContactMessage::count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();

        $recentMessages = ContactMessage::latest()->take(5)->get();
        $recentProjects = Project::latest()->take(5)->get();
        $profile = Profile::first();

        return view('admin.dashboard', compact(
            'totalProjects',
            'publishedProjects',
            'draftProjects',
            'totalSkills',
            'totalCerts',
            'totalMessages',
            'unreadMessages',
            'recentMessages',
            'recentProjects',
            'profile'
        ));
    }
}
