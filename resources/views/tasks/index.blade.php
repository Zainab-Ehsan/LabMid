@extends('layout')

@section('title', 'All Tasks')

@section('content')
<div class="heading">
    <div>
        <h1>Task Manager</h1>
        <p class="sub">Create, organize, update, and track your tasks.</p>
    </div>
    <a class="btn btn-primary" href="{{ route('tasks.create') }}">＋ Add new task</a>
</div>

<div class="card">
    <div class="heading" style="margin-bottom:10px">
        <div>
            <h2 style="margin-bottom:4px">Your tasks</h2>
            <p class="sub">{{ $tasks->total() }} {{ Str::plural('task', $tasks->total()) }} in total</p>
        </div>
    </div>

    @if ($tasks->count())
        <div class="table-wrap">
            <table>
                <thead>
                <tr><th>Task</th><th>Status</th><th>Created</th><th>Actions</th></tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>
                            <strong>{{ $task->title }}</strong>
                            @if ($task->description)
                                <div style="color:#687386;margin-top:5px;max-width:340px">{{ Str::limit($task->description, 75) }}</div>
                            @endif
                        </td>
                        <td><span class="status status-{{ $task->status }}">{{ ucfirst($task->status) }}</span></td>
                        <td>{{ $task->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-light" href="{{ route('tasks.show', $task) }}">View</a>
                                <a class="btn btn-light" href="{{ route('tasks.edit', $task) }}">Edit</a>
                                <form method="POST" action="{{ route('tasks.destroy', $task) }}" onsubmit="return confirm('Are you sure you want to delete this task?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">{{ $tasks->links() }}</div>
    @else
        <div class="empty">
            <strong>No tasks yet</strong>
            Start by adding your first task.
            <div style="margin-top:18px"><a class="btn btn-primary" href="{{ route('tasks.create') }}">Create a task</a></div>
        </div>
    @endif
</div>
@endsection
