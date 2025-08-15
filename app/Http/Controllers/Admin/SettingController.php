<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->keyBy('key');
        return view('admin.settings.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|max:255|unique:settings',
            'value' => 'required|string',
            'type' => 'required|in:text,textarea,number,email,url,boolean',
            'description' => 'nullable|string',
        ]);

        Setting::create($request->all());

        return redirect()->route('admin.settings.index')->with('success', 'Setting created successfully.');
    }

    public function show(Setting $setting)
    {
        return view('admin.settings.show', compact('setting'));
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'key' => 'required|string|max:255|unique:settings,key,' . $setting->id,
            'value' => 'required|string',
            'type' => 'required|in:text,textarea,number,email,url,boolean',
            'description' => 'nullable|string',
        ]);

        $setting->update($request->all());

        return redirect()->route('admin.settings.index')->with('success', 'Setting updated successfully.');
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route('admin.settings.index')->with('success', 'Setting deleted successfully.');
    }

    public function updateAll(Request $request)
    {
        $settings = $request->except('_token', '_method');

        foreach ($settings as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }

        return redirect()->route('admin.settings.index')->with('success', 'All settings updated successfully.');
    }
}
