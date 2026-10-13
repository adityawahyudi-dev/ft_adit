<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Certification;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('sort_order')->get();
        $certifications = Certification::orderBy('sort_order')->get();

        return view('admin.skills.index', compact('skills', 'certifications'));
    }

    public function storeSkill(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'required|string',
            'icon' => 'nullable|string|max:50',
            'badge_id' => 'required|string|max:50',
            'badge_en' => 'required|string|max:50',
            'title_id' => 'required|string|max:100',
            'title_en' => 'required|string|max:100',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'sort_order' => 'integer',
        ]);

        Skill::create($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Keahlian berhasil ditambahkan!');
    }

    public function updateSkill(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'required|string',
            'icon' => 'nullable|string|max:50',
            'badge_id' => 'required|string|max:50',
            'badge_en' => 'required|string|max:50',
            'title_id' => 'required|string|max:100',
            'title_en' => 'required|string|max:100',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'sort_order' => 'integer',
        ]);

        $skill->update($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Keahlian berhasil diperbarui!');
    }

    public function destroySkill(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Keahlian berhasil dihapus!');
    }

    public function storeCert(Request $request)
    {
        $validated = $request->validate([
            'title_id' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'track_id' => 'required|string|max:100',
            'track_en' => 'required|string|max:100',
            'issuer' => 'required|string|max:100',
            'credential_id' => 'required|string|max:100',
            'issue_date_id' => 'required|string|max:100',
            'issue_date_en' => 'required|string|max:100',
            'valid_until' => 'required|string|max:50',
            'credential_url' => 'nullable|url',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'sort_order' => 'integer',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/certs', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }

        Certification::create($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Sertifikat berhasil ditambahkan!');
    }

    public function updateCert(Request $request, Certification $certification)
    {
        $validated = $request->validate([
            'title_id' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'track_id' => 'required|string|max:100',
            'track_en' => 'required|string|max:100',
            'issuer' => 'required|string|max:100',
            'credential_id' => 'required|string|max:100',
            'issue_date_id' => 'required|string|max:100',
            'issue_date_en' => 'required|string|max:100',
            'valid_until' => 'required|string|max:50',
            'credential_url' => 'nullable|url',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'sort_order' => 'integer',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/certs', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }

        $certification->update($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Sertifikat berhasil diperbarui!');
    }

    public function destroyCert(Certification $certification)
    {
        $certification->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Sertifikat berhasil dihapus!');
    }
}
