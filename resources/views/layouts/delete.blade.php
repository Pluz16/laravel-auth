@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Delete Project</h1>
        <p>Are you sure you want to delete the project "{{ $project->title }}"?</p>
        <form action="{{ route('projects.destroy', $project->slug) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
