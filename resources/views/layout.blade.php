<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Task Manager') | Task Manager</title>
    <style>
        :root { color-scheme: light; --ink:#172033; --muted:#687386; --line:#e5eaf1; --blue:#3157d5; --bg:#f5f7fb; }
        * { box-sizing:border-box; }
        body { margin:0; font-family:Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; color:var(--ink); background:var(--bg); }
        header { background:#fff; border-bottom:1px solid var(--line); }
        .nav { max-width:1080px; margin:auto; padding:18px 22px; display:flex; justify-content:space-between; align-items:center; gap:16px; }
        .brand { font-weight:800; font-size:19px; color:var(--ink); text-decoration:none; letter-spacing:-.4px; }
        .brand span { color:var(--blue); }
        main { max-width:1080px; margin:34px auto; padding:0 22px 44px; }
        .heading { display:flex; justify-content:space-between; align-items:center; gap:18px; margin-bottom:22px; }
        h1 { font-size:29px; letter-spacing:-.8px; margin:0 0 7px; }
        h2 { margin:0 0 18px; font-size:20px; }
        p { color:var(--muted); line-height:1.6; }
        .sub { margin:0; color:var(--muted); }
        .card { background:#fff; border:1px solid var(--line); border-radius:16px; padding:24px; box-shadow:0 5px 22px rgba(25,40,70,.035); }
        .btn { display:inline-flex; align-items:center; justify-content:center; gap:7px; border:1px solid transparent; border-radius:9px; padding:10px 14px; font-size:14px; font-weight:650; text-decoration:none; cursor:pointer; font-family:inherit; }
        .btn-primary { background:var(--blue); color:#fff; }
        .btn-light { background:#fff; border-color:var(--line); color:var(--ink); }
        .btn-danger { background:#fff2f1; color:#b42318; border-color:#ffd5d1; }
        .actions { display:flex; gap:7px; align-items:center; flex-wrap:wrap; }
        .alert { border-radius:10px; padding:13px 15px; margin-bottom:18px; }
        .alert-success { color:#17663a; background:#eaf8ef; border:1px solid #c8eed4; }
        .alert-error { color:#9f2424; background:#fff0f0; border:1px solid #ffd4d4; }
        .table-wrap { overflow-x:auto; }
        table { width:100%; border-collapse:collapse; }
        th, td { text-align:left; padding:15px 12px; border-bottom:1px solid var(--line); vertical-align:middle; }
        th { color:var(--muted); font-size:12px; text-transform:uppercase; letter-spacing:.7px; font-weight:750; }
        td { font-size:14px; }
        tbody tr:last-child td { border-bottom:0; }
        .status { display:inline-block; padding:5px 9px; border-radius:20px; font-size:12px; font-weight:750; text-transform:capitalize; }
        .status-pending { background:#fff4d8; color:#8b5b00; }
        .status-completed { background:#dcfce7; color:#166534; }
        .field { margin-bottom:19px; }
        label { display:block; margin-bottom:8px; font-weight:700; font-size:14px; }
        input, textarea, select { width:100%; border:1px solid #d8dfeb; border-radius:9px; padding:12px 13px; font:inherit; color:var(--ink); background:#fff; outline:none; }
        input:focus, textarea:focus, select:focus { border-color:var(--blue); box-shadow:0 0 0 3px rgba(49,87,213,.1); }
        textarea { min-height:120px; resize:vertical; }
        .error { color:#b42318; font-size:13px; margin-top:6px; }
        .detail-row { padding:14px 0; border-bottom:1px solid var(--line); }
        .detail-row:last-child { border-bottom:0; }
        .detail-label { display:block; color:var(--muted); font-size:12px; text-transform:uppercase; letter-spacing:.6px; margin-bottom:6px; font-weight:750; }
        .empty { text-align:center; padding:42px 18px; color:var(--muted); }
        .empty strong { display:block; color:var(--ink); margin-bottom:8px; font-size:17px; }
        .pagination { margin-top:20px; }
        footer { text-align:center; color:#8a93a3; font-size:12px; padding:0 20px 25px; }
        @media(max-width:650px) { .heading { align-items:flex-start; flex-direction:column; } main { margin-top:24px; } .card { padding:17px; } th,td { padding:12px 9px; } }
    </style>
</head>
<body>
<header>
    <div class="nav">
        <a class="brand" href="{{ route('tasks.index') }}">Task<span>Manager</span></a>
        <a class="btn btn-light" href="{{ route('tasks.index') }}">All tasks</a>
    </div>
</header>
<main>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-error">Please check the form fields and try again.</div>
    @endif
    @yield('content')
</main>
<footer>Task Manager · Laravel CRUD Demo</footer>
</body>
</html>
