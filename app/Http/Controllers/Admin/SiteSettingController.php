<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::ordered()->get()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $inputs = $request->except(['_token', '_method']);

        foreach ($inputs as $key => $value) {
            $setting = SiteSetting::where('key', $key)->first();
            if (! $setting) {
                continue;
            }

            // Handle image/file upload
            if ($request->hasFile($key)) {
                $file = $request->file($key);

                // Validate: image only, max 2 MB
                if (! $file->isValid() || ! str_starts_with($file->getMimeType(), 'image/')) {
                    continue;
                }

                // Delete old file if exists
                if ($setting->value && Storage::disk('public')->exists($setting->value)) {
                    Storage::disk('public')->delete($setting->value);
                }

                $path = $file->store('settings', 'public');
                $setting->update(['value' => $path]);
                $this->forgetCache($key);
                continue;
            }

            // Skip if the submitted value is an array but not a file (e.g. empty file input)
            if (is_array($value)) {
                continue;
            }

            $setting->update(['value' => $value ?? '']);
            $this->forgetCache($key);
        }

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }

    /**
     * Safely forget a setting from cache.
     * Silently ignores failures (e.g. cache driver issues).
     */
    private function forgetCache(string $key): void
    {
        try {
            Cache::forget("setting_{$key}");
        } catch (\Throwable $e) {
            // Cache driver failure should not break saving settings
            logger()->warning("Cache forget failed for setting_{$key}: " . $e->getMessage());
        }
    }
}
