# Task Manager CRUD (Laravel 12)

This project now includes a Task Manager with Create, Read, Update, and Delete operations.

## Features
- List tasks with pagination
- Create a task with title, optional description, and status
- View individual task details
- Edit/update a task
- Delete a task after confirmation
- Server-side validation and CSRF protection
- SQLite configuration for local testing

## Run on Windows (PowerShell)

Run these commands from the project folder. The `vendor` directory is intentionally not included in this ZIP; Composer will recreate it.

```powershell
Copy-Item .env.example .env
composer install
php artisan key:generate
New-Item -ItemType File -Path database/database.sqlite -Force
php artisan migrate
php artisan route:list --path=tasks
php artisan serve
```

Then open http://127.0.0.1:8000.

If `.env` already exists, do not overwrite it; simply run `composer install` and continue with the key/migration commands as appropriate.

## CRUD routes
- `GET /tasks` — list tasks
- `GET /tasks/create` — create form
- `POST /tasks` — save new task
- `GET /tasks/{task}` — show task
- `GET /tasks/{task}/edit` — edit form
- `PUT /tasks/{task}` — update task
- `DELETE /tasks/{task}` — delete task

The database migration is `database/migrations/2026_10_26_000000_create_tasks_table.php`.
