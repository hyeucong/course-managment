<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? 'Laravel' }}</title>

<link rel="preconnect" href="https://fonts.bunny.net">
<!-- Inline SVG favicon as primary (avoids missing/corrupt binary files) -->
<link rel="icon"
    href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ccircle cx='50' cy='50' r='50' fill='%23326ce5'/%3E%3Ctext x='50' y='60' font-size='50' text-anchor='middle' fill='white' font-family='Arial, Helvetica, sans-serif'%3EC%3C/text%3E%3C/svg%3E">
<!-- Fallback to classic favicon.ico -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
