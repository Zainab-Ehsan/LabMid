@extends('layout')

@section('title', 'Task Details')

@section('content')
<div class="heading">
    <div><h1>Task details</h1><p class="sub">Review the information for this task.</p></div>
    <div class="actions">
        <a class="btn btn-light" href="{{ route('tasks.index') }}">← All tasks</a>
        <a class="btn btn-primary" href="{{ route('tasks.edit', $task) }}">Edit task</a>
    </div>
</div>
<div class="card" style="max-width:760px">
    <div class="detail-row">
        <span class="detail-label">Title</span>
        <h2 style="margin:0">{{ $task->title }}</h2>
    </div>
    <div class="detail-row">
        <span class="detail-label">Description</span>
        <div style="white-space:pre-wrap">{{ $task->description ?: 'No description provided.' }}</div>
    </div>
    <div class="detail-row">
        <span class="detail-label">Status</span>
        <span class="status status-{{ $task->status }}">{{ ucfirst($task->status) }}</span>
    </div>
    <div class="detail-row">
        <span class="detail-label">Created</span>
        {{ $task->created_at->format('d M Y, h:i A') }}
    </div>
    <div class="detail-row">
        <span class="detail-label">Last updated</span>
        {{ $task->updated_at->format('d M Y, h:i A') }}
    </div>
    <div class="actions" style="margin-top:22px">
        <a class="btn btn-primary" href="{{ route('tasks.edit', $task) }}">Edit task</a>
        <form method="POST" action="{{ route('tasks.destroy', $task) }}" onsubmit="return confirm('Are you sure you want to delete this task?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete task</button>
        </form>
    </div>
</div>
@endsection
