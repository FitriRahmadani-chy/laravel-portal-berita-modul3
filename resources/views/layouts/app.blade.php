<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Portal Berita') — Portal Berita</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f8fafc;
            --surface: #ffffff;
            --surface-alt: #f1f5f9;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --primary: #1e3a8a;
            --primary-hover: #172554;
            --primary-soft: #eff6ff;
            --danger: #b91c1c;
            --danger-soft: #fef2f2;
            --danger-border: #fecaca;
            --success: #15803d;
            --success-soft: #f0fdf4;
            --success-border: #bbf7d0;
            --radius: 12px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        h1, h2, h3, h4, .brand {
            font-family: 'Plus Jakarta Sans', 'Inter', system-ui, sans-serif;
            letter-spacing: -0.02em;
        }

        a {
            color: var(--primary);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Navbar */
        .topbar {
            background-color: var(--surface);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .container {
            max-width: 1040px;
            margin: 0 auto;
            padding: 0 1.25rem;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            min-height: 64px;
            flex-wrap: wrap;
        }

        .brand {
            font-weight: 800;
            font-size: 1.1rem;
            color: var(--text);
            margin-right: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .brand-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: var(--primary);
            display: inline-block;
        }

        .nav a {
            padding: 0.45rem 0.75rem;
            border-radius: 8px;
            font-size: 0.92rem;
            font-weight: 500;
            color: var(--muted);
        }

        .nav a:hover {
            background-color: var(--surface-alt);
            color: var(--text);
            text-decoration: none;
        }

        .nav a.active {
            background-color: var(--primary-soft);
            color: var(--primary);
            font-weight: 600;
        }

        .nav .right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 0.65rem;
            flex-wrap: wrap;
        }

        .user-badge {
            font-size: 0.875rem;
            color: var(--muted);
            padding: 0.3rem 0.65rem;
            background-color: var(--surface-alt);
            border-radius: 999px;
        }

        main.container {
            padding-top: 1.75rem;
            padding-bottom: 3rem;
        }

        /* Card & Grid */
        .card {
            background-color: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.35rem;
        }

        .row {
            display: grid;
            gap: 1.25rem;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }

        .muted {
            color: var(--muted);
            font-size: 0.92rem;
        }

        /* Alerts */
        .flash {
            background-color: var(--success-soft);
            border: 1px solid var(--success-border);
            color: var(--success);
            padding: 0.75rem 1rem;
            border-radius: 10px;
            margin: 1rem 0;
            font-weight: 500;
        }

        .error {
            background-color: var(--danger-soft);
            border: 1px solid var(--danger-border);
            color: var(--danger);
            padding: 0.85rem 1rem;
            border-radius: 10px;
            margin: 1rem 0;
        }

        .error ul {
            margin: 0.35rem 0 0;
            padding-left: 1.25rem;
        }

        /* Buttons & Forms */
        .inline {
            display: inline;
        }

        button, .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            padding: 0.52rem 0.95rem;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            border: 1px solid transparent;
            text-decoration: none;
        }

        button[type="submit"].btn-primary, .btn-primary {
            background-color: var(--primary);
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            text-decoration: none;
        }

        .btn-secondary {
            background-color: var(--surface);
            color: var(--text);
            border-color: var(--border);
        }

        .btn-secondary:hover {
            background-color: var(--surface-alt);
            text-decoration: none;
        }

        .btn-danger {
            background-color: var(--danger-soft);
            color: var(--danger);
            border-color: var(--danger-border);
        }

        .btn-danger:hover {
            background-color: var(--danger);
            color: #ffffff;
        }

        button {
            background-color: var(--surface-alt);
            color: var(--text);
            border-color: var(--border);
        }

        button:hover {
            background-color: #e2e8f0;
        }

        form label {
            display: block;
            margin-top: 1rem;
            margin-bottom: 0.35rem;
            font-weight: 600;
            font-size: 0.92rem;
        }

        input[type="text"],
        input[type="url"],
        input[type="email"],
        input[type="password"],
        input[type="search"],
        textarea {
            width: 100%;
            padding: 0.6rem 0.75rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 0.95rem;
            font-family: inherit;
            color: var(--text);
            background-color: var(--surface);
        }

        input:focus, textarea:focus {
            outline: 2px solid var(--primary);
            outline-offset: 1px;
            border-color: var(--primary);
        }

        /* Pagination */
        .pagination {
            display: flex;
            gap: 0.35rem;
            list-style: none;
            padding: 0;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }

        .pagination li a,
        .pagination li span {
            display: inline-block;
            padding: 0.4rem 0.75rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--surface);
            color: var(--text);
            font-size: 0.88rem;
        }

        .pagination li.active span {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #ffffff;
            font-weight: 700;
        }
    </style>
</head>
<body>
    @include('partials.nav')
    <main class="container">
        @yield('content')
    </main>
</body>
</html>