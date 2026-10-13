<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Profile;

class SettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        $profile = Profile::first();

        return view('admin.settings.index', compact('settings', 'profile'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'cv_file']);

        foreach ($data as $key => $val) {
            SiteSetting::set($key, $val);
        }

        // Handle CV file upload if provided
        if ($request->hasFile('cv_file')) {
            $file = $request->file('cv_file');
            $filename = 'CV_Aditya_Yazidil_Wahyudi.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/cv', $filename, 'public');

            $profile = Profile::first();
            if ($profile) {
                $profile->cv_url = '/storage/' . $path;
                $profile->cv_filename = $filename;
                $profile->save();
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil disimpan!');
    }
}
