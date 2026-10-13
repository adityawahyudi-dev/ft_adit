<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::firstOrCreate(['id' => 1], [
            'full_name' => 'Aditya Yazidil Wahyudi',
            'headline_id' => 'FULL-STACK DEVELOPER',
            'headline_en' => 'FULL-STACK DEVELOPER',
            'subheadline_id' => 'developer & builder',
            'subheadline_en' => 'developer & builder',
            'bio_id' => 'Fokus membangun aplikasi web modern...',
            'bio_en' => 'Focusing on engineering modern web apps...',
            'education_title' => 'S1 Teknik Informatika',
            'email' => 'adityayazidilwahyudi@gmail.com',
        ]);

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::firstOrFail();

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'headline_id' => 'required|string|max:255',
            'headline_en' => 'required|string|max:255',
            'subheadline_id' => 'required|string|max:255',
            'subheadline_en' => 'required|string|max:255',
            'bio_id' => 'required|string',
            'bio_en' => 'required|string',
            'about_id' => 'nullable|string',
            'about_en' => 'nullable|string',
            'education_title' => 'required|string|max:255',
            'gpa' => 'required|string|max:50',
            'location' => 'required|string|max:255',
            'timezone' => 'required|string|max:100',
            'status_badge_id' => 'required|string|max:255',
            'status_badge_en' => 'required|string|max:255',
            'status_description_id' => 'nullable|string',
            'status_description_en' => 'nullable|string',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:100',
            'github_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('uploads/profile', 'public');
            $validated['photo_url'] = '/storage/' . $path;
        }

        if ($request->hasFile('cutout')) {
            $path = $request->file('cutout')->store('uploads/profile', 'public');
            $validated['cutout_url'] = '/storage/' . $path;
        }

        $profile->update($validated);

        return redirect()->route('admin.profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}
