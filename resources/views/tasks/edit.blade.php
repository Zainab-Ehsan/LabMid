@extends('layout')

@section('title', 'Edit Task')

@section('content')
<div class="heading">
    <div><h1>Edit task</h1><p class="sub">Update the task details and save your changes.</p></div>
    <a class="btn btn-light" href="{{ route('tasks.index') }}">← Back to tasks</a>
</div>
<div class="card" style="max-width:760px">
    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')
        <div class="field">
            <label for="title">Task title *</label>
            <input id="title" name="title" value="{{ old('title', $task->title) }}" required maxlength="255">
            @error('title') <div class="error">{{ $message }}</div> @enderror
        </div>
        <div class="field">
            <label for="description">Description</label>
            <textarea id="description" name="description">{{ old('description', $task->description) }}</textarea>
            @error('description') <div class="error">{{ $message }}</div> @enderror
        </div>
        <div class="field">
            <label for="status">Status *</label>
            <select id="status" name="status" required>
                <option value="pending" @selected(old('status', $task->status) === 'pending')>Pending</option>
                <option value="completed" @selected(old('status', $task->status) === 'completed')>Completed</option>
            </select>
            @error('status') <div class="error">{{ $message }}</div> @enderror
        </div>
        <div class="actions">
            <button class="btn btn-primary" type="submit">Update task</button>
            <a class="btn btn-light" href="{{ route('tasks.show', $task) }}">Cancel</a>
        </div>
    </form>
</div>
@endsection
