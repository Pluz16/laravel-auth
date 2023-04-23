@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">{{ $project->title }}</h1>
        <p>{{ $project->description }}</p>
        <p><strong>Client:</strong> {{ $project->client }}</p>
        @if ($project->url)
            <p><strong>URL:</strong> <a href="{{ $project->url }}">{{ $project->url }}</a></p>
        @endif
        <a href="{{ route('projects.edit', $project->slug) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('projects.destroy', $project->slug) }}" method="POST" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
