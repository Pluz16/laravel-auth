<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\CreateProjectRequest;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(CreateProjectRequest $request)
    {
        $validated = $request->validated();

        $project = new Project();
        $project->title = $validated['title'];
        $project->client = $validated['client'];
        $project->description = $validated['description'];
        $project->url = $validated['url'];
        $project->slug = Str::slug($validated['title']);
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('projects.show', compact('project'));
    }

    public function edit($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('projects.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $request, $slug)
    {
        $validated = $request->validated();

        $project = Project::where('slug', $slug)->firstOrFail();
        $project->title = $validated['title'];
        $project->client = $validated['client'];
        $project->description = $validated['description'];
        $project->url = $validated['url'];
        $project->slug = Str::slug($validated['title']);
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
}
