@extends('layout')

@section('title', 'Create Task')

@section('content')
<div class="heading">
    <div><h1>Create a task</h1><p class="sub">Add the details below to create a new task.</p></div>
    <a class="btn btn-light" href="{{ route('tasks.index') }}">← Back to tasks</a>
</div>
<div class="card" style="max-width:760px">
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="field">
            <label for="title">Task title *</label>
            <input id="title" name="title" value="{{ old('title') }}" required maxlength="255" placeholder="e.g. Prepare deployment pipeline">
            @error('title') <div class="error">{{ $message }}</div> @enderror
        </div>
        <div class="field">
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Add some details (optional)">{{ old('description') }}</textarea>
            @error('description') <div class="error">{{ $message }}</div> @enderror
        </div>
        <div class="field">
            <label for="status">Status *</label>
            <select id="status" name="status" required>
                <option value="pending" @selected(old('status', 'pending') === 'pending')>Pending</option>
                <option value="completed" @selected(old('status') === 'completed')>Completed</option>
            </select>
            @error('status') <div class="error">{{ $message }}</div> @enderror
        </div>
        <div class="actions">
            <button class="btn btn-primary" type="submit">Save task</button>
            <a class="btn btn-light" href="{{ route('tasks.index') }}">Cancel</a>
        </div>
    </form>
</div>
@endsection
