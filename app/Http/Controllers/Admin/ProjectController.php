<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('images')->ordered()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'slug'         => 'nullable|string|max:255|unique:projects,slug',
            'category'     => 'nullable|string|max:255',
            'description'  => 'nullable|string',
            'location'     => 'nullable|string|max:255',
            'year'         => 'nullable|integer|min:2000|max:2100',
            'is_published' => 'boolean',
            'sort_order'   => 'nullable|integer',
            'images.*'     => 'nullable|image|max:4096',
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);

        $project = Project::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $i => $file) {
                $path = $file->store('projects', 'public');
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $path,
                    'sort_order' => $i,
                ]);
            }
        }

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name'               => 'required|string|max:255',
            'category'           => 'nullable|string|max:255',
            'description'        => 'nullable|string',
            'location'           => 'nullable|string|max:255',
            'year'               => 'nullable|integer|min:2000|max:2100',
            'is_published'       => 'boolean',
            'sort_order'         => 'nullable|integer',
            'images.*'           => 'nullable|image|max:4096',
            'delete_image_ids.*' => 'nullable|integer',
        ]);

        $project->update($data);

        // Delete selected images
        if ($request->filled('delete_image_ids')) {
            foreach ($request->delete_image_ids as $imgId) {
                $img = ProjectImage::where('id', $imgId)->where('project_id', $project->id)->first();
                if ($img) {
                    Storage::delete('public/' . $img->image_path);
                    $img->delete();
                }
            }
        }

        if ($request->hasFile('images')) {
            $offset = $project->images()->max('sort_order') ?? -1;
            foreach ($request->file('images') as $i => $file) {
                $path = $file->store('projects', 'public');
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $path,
                    'sort_order' => $offset + $i + 1,
                ]);
            }
        }

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        foreach ($project->images as $img) {
            Storage::delete('public/' . $img->image_path);
        }
        $project->images()->delete();
        $project->delete();
        return back()->with('success', 'Proyek berhasil dihapus.');
    }
}
