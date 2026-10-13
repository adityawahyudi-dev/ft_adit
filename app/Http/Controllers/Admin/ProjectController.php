<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'all');
        $query = Project::orderBy('sort_order')->orderByDesc('created_at');

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        $projects = $query->paginate(10);

        return view('admin.projects.index', compact('projects', 'status'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_id' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug',
            'category' => 'required|string|in:fullstack,backend,designsystem,research',
            'category_label_id' => 'required|string|max:100',
            'category_label_en' => 'required|string|max:100',
            'status_label_id' => 'required|string|max:100',
            'status_label_en' => 'required|string|max:100',
            'summary_id' => 'required|string',
            'summary_en' => 'required|string',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'problem_id' => 'nullable|string',
            'problem_en' => 'nullable|string',
            'solution_id' => 'nullable|string',
            'solution_en' => 'nullable|string',
            'technologies_raw' => 'nullable|string',
            'key_features_raw' => 'nullable|string',
            'demo_url' => 'nullable|url',
            'repository_url' => 'nullable|url',
            'status' => 'required|in:published,draft,archived',
            'sort_order' => 'integer',
        ]);

        $slug = $validated['slug'] ? Str::slug($validated['slug']) : Str::slug($validated['title_en']);
        $validated['slug'] = $slug;

        // Process technologies tags from comma-separated string
        if (!empty($validated['technologies_raw'])) {
            $validated['technologies'] = array_map('trim', explode(',', $validated['technologies_raw']));
        } else {
            $validated['technologies'] = [];
        }

        // Process key features from new lines
        if (!empty($validated['key_features_raw'])) {
            $validated['key_features'] = array_filter(array_map('trim', explode("\n", $validated['key_features_raw'])));
        } else {
            $validated['key_features'] = [];
        }

        if ($request->hasFile('mockup')) {
            $path = $request->file('mockup')->store('uploads/projects', 'public');
            $validated['mockup_url'] = '/storage/' . $path;
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title_id' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug,' . $project->id,
            'category' => 'required|string|in:fullstack,backend,designsystem,research',
            'category_label_id' => 'required|string|max:100',
            'category_label_en' => 'required|string|max:100',
            'status_label_id' => 'required|string|max:100',
            'status_label_en' => 'required|string|max:100',
            'summary_id' => 'required|string',
            'summary_en' => 'required|string',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'problem_id' => 'nullable|string',
            'problem_en' => 'nullable|string',
            'solution_id' => 'nullable|string',
            'solution_en' => 'nullable|string',
            'technologies_raw' => 'nullable|string',
            'key_features_raw' => 'nullable|string',
            'demo_url' => 'nullable|url',
            'repository_url' => 'nullable|url',
            'status' => 'required|in:published,draft,archived',
            'sort_order' => 'integer',
        ]);

        if (!empty($validated['technologies_raw'])) {
            $validated['technologies'] = array_map('trim', explode(',', $validated['technologies_raw']));
        }
        if (!empty($validated['key_features_raw'])) {
            $validated['key_features'] = array_filter(array_map('trim', explode("\n", $validated['key_features_raw'])));
        }

        if ($request->hasFile('mockup')) {
            $path = $request->file('mockup')->store('uploads/projects', 'public');
            $validated['mockup_url'] = '/storage/' . $path;
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil dihapus!');
    }

    public function toggleStatus(Project $project)
    {
        $project->status = ($project->status === 'published') ? 'draft' : 'published';
        $project->save();

        return redirect()->back()->with('success', 'Status proyek berhasil diubah menjadi: ' . $project->status);
    }
}
