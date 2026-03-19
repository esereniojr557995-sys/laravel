<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --bg: #0d0d0f; --surface: #16161a; --border: #2a2a32;
            --accent: #ff6b35; --text: #e8e8f0; --muted: #6b6b80;
        }
        body { background: var(--bg); color: var(--text); font-family: 'DM Sans', sans-serif; min-height: 100vh; }
        nav {
            display: flex; align-items: center; justify-content: space-between;
            padding: 1.25rem 2.5rem; border-bottom: 1px solid var(--border);
            background: var(--surface); position: sticky; top: 0; z-index: 100;
        }
        .nav-brand { font-family: 'Syne', sans-serif; font-weight: 800; font-size: 1.3rem; color: var(--accent); text-decoration: none; }
        .nav-links { display: flex; align-items: center; gap: 0.5rem; }
        .nav-links a, .nav-links button {
            font-family: 'DM Sans', sans-serif; font-size: 0.875rem; font-weight: 500;
            color: var(--muted); text-decoration: none; padding: 0.45rem 1rem;
            border-radius: 6px; border: none; background: transparent; cursor: pointer; transition: 0.2s;
        }
        .nav-links a:hover, .nav-links button:hover { color: var(--text); background: var(--border); }
        .badge { display: inline-block; font-size: 0.7rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; padding: 0.2rem 0.6rem; border-radius: 4px; background: #2a1a10; color: var(--accent); border: 1px solid #3a2010; }
        .btn-logout { color: var(--text) !important; background: #2a1a1a !important; border: 1px solid #4a2a2a !important; }
        .btn-logout:hover { color: #ff6b6b !important; }
        main { padding: 3rem 2.5rem; max-width: 1100px; margin: 0 auto; }
        .hero { margin-bottom: 3rem; padding-bottom: 2rem; border-bottom: 1px solid var(--border); }
        .hero-eyebrow { font-size: 0.75rem; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: var(--accent); display: block; margin-bottom: 0.5rem; }
        .hero-title { font-family: 'Syne', sans-serif; font-weight: 800; font-size: clamp(2rem, 4vw, 3rem); letter-spacing: -0.03em; line-height: 1.1; }
        .hero-sub { color: var(--muted); font-size: 1rem; margin-top: 0.5rem; }
        .section-label { font-size: 0.75rem; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: var(--muted); margin-bottom: 1rem; }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2.5rem; }
        .stat-card { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 1.5rem; transition: border-color 0.2s; }
        .stat-card:hover { border-color: var(--accent); }
        .stat-label { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--muted); margin-bottom: 0.5rem; }
        .stat-value { font-family: 'Syne', sans-serif; font-size: 2rem; font-weight: 800; color: var(--accent); }
        .actions-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem; }
        .action-card { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 1.5rem; text-decoration: none; color: var(--text); display: flex; align-items: flex-start; gap: 1rem; transition: 0.2s; }
        .action-card:hover { border-color: var(--accent); transform: translateY(-2px); }
        .action-icon { font-size: 1.5rem; }
        .action-title { font-family: 'Syne', sans-serif; font-weight: 600; margin-bottom: 0.25rem; }
        .action-desc { font-size: 0.875rem; color: var(--muted); }
    </style>
</head>
<body>
<nav>
    <a class="nav-brand" href="#">◈ MyApp</a>
    <div class="nav-links">
        <span class="badge">admin</span>
        <a href="{{ route('profile.edit') }}">Profile</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>
</nav>
<main>
    <div class="hero">
        <span class="hero-eyebrow">⬡ Control Center</span>
        <h1 class="hero-title">Welcome back,<br>{{ $user->name }}</h1>
        <p class="hero-sub">You have full administrative access.</p>
    </div>

    <p class="section-label">Overview</p>
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-label">Total Users</div>
            <div class="stat-value">{{ \App\Models\User::count() }}</div>
        </div>
    </div>

    <p class="section-label">Quick Actions</p>
    <div class="actions-grid">
        <a href="/users" class="action-card">
            <span class="action-icon">👥</span>
            <div>
                <div class="action-title">Manage Users</div>
                <div class="action-desc">View and manage all registered users</div>
            </div>
        </a>
        <a href="{{ route('profile.edit') }}" class="action-card">
            <span class="action-icon">⚙️</span>
            <div>
                <div class="action-title">Account Settings</div>
                <div class="action-desc">Edit your profile and preferences</div>
            </div>
        </a>
    </div>
</main>
</body>
</html>