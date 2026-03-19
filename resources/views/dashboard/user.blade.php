<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --bg: #0d0d0f; --surface: #16161a; --border: #2a2a32;
            --accent: #42c8f5; --text: #e8e8f0; --muted: #6b6b80;
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
        .badge { display: inline-block; font-size: 0.7rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; padding: 0.2rem 0.6rem; border-radius: 4px; background: #102a2e; color: var(--accent); border: 1px solid #103040; }
        .btn-logout { color: var(--text) !important; background: #2a1a1a !important; border: 1px solid #4a2a2a !important; }
        .btn-logout:hover { color: #ff6b6b !important; }
        main { padding: 3rem 2.5rem; max-width: 1100px; margin: 0 auto; }
        .hero { margin-bottom: 2rem; padding-bottom: 2rem; border-bottom: 1px solid var(--border); }
        .hero-eyebrow { font-size: 0.75rem; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: var(--accent); display: block; margin-bottom: 0.5rem; }
        .hero-title { font-family: 'Syne', sans-serif; font-weight: 800; font-size: clamp(2rem, 4vw, 3rem); letter-spacing: -0.03em; line-height: 1.1; }
        .hero-sub { color: var(--muted); font-size: 1rem; margin-top: 0.5rem; }
        .info-strip { display: flex; gap: 0.75rem; flex-wrap: wrap; margin-bottom: 2.5rem; }
        .info-pill { display: flex; align-items: center; gap: 0.5rem; background: var(--surface); border: 1px solid var(--border); border-radius: 999px; padding: 0.4rem 1rem; font-size: 0.85rem; color: var(--muted); }
        .info-pill strong { color: var(--text); font-weight: 500; }
        .section-label { font-size: 0.75rem; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: var(--muted); margin-bottom: 1rem; }
        .cards-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1rem; }
        .card { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 1.75rem; transition: 0.2s; }
        .card:hover { border-color: var(--accent); transform: translateY(-2px); }
        .card-icon { font-size: 1.75rem; margin-bottom: 1rem; }
        .card-title { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 1.05rem; margin-bottom: 0.4rem; }
        .card-desc { font-size: 0.875rem; color: var(--muted); line-height: 1.6; }
        .card-link { display: inline-block; margin-top: 1.25rem; font-size: 0.8rem; font-weight: 600; letter-spacing: 0.06em; text-transform: uppercase; color: var(--accent); text-decoration: none; }
        .card-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
<nav>
    <a class="nav-brand" href="#">◈ MyApp</a>
    <div class="nav-links">
        <span class="badge">user</span>
        <a href="{{ route('profile.edit') }}">Profile</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>
</nav>
<main>
    <div class="hero">
        <span class="hero-eyebrow">◎ Your Space</span>
        <h1 class="hero-title">Hello,<br>{{ $user->name }}</h1>
        <p class="hero-sub">Here's your personal dashboard.</p>
    </div>

    <div class="info-strip">
        <div class="info-pill">📧 <strong>{{ $user->email }}</strong></div>
        <div class="info-pill">🗓 Joined <strong>{{ $user->created_at->format('M Y') }}</strong></div>
    </div>

    <p class="section-label">What would you like to do?</p>
    <div class="cards-grid">
        <div class="card">
            <div class="card-icon">👤</div>
            <div class="card-title">Your Profile</div>
            <div class="card-desc">Update your name, email, and password anytime.</div>
            <a class="card-link" href="{{ route('profile.edit') }}">Edit Profile →</a>
        </div>
        <div class="card">
            <div class="card-icon">📬</div>
            <div class="card-title">Notifications</div>
            <div class="card-desc">Stay updated with the latest activity.</div>
            <a class="card-link" href="#">View All →</a>
        </div>
        <div class="card">
            <div class="card-icon">🔒</div>
            <div class="card-title">Security</div>
            <div class="card-desc">Review your login sessions and stay safe.</div>
            <a class="card-link" href="#">Manage →</a>
        </div>
    </div>
</main>
</body>
</html>