@extends('layouts.admin')

@section('content')
    <h2>Modifica progetto: {{ $project->title }}</h2>
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{ route('admin.projects.update', $project->slug) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title', $project->title) }}">
        </div>
        <div class="mb-3">
            <label for="type">Tipo</label>
            <select class="form-select" id="type_id" name="type_id">
                <option></option>
                @foreach ($types as $type)
                    <option @selected($type->id == old("$type->id", $project->type?->id)) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" rows="3" name="content">{{ old('content', $project->content) }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Invia</button>
        <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Torna alla home</a>
    </form>
@endsection
