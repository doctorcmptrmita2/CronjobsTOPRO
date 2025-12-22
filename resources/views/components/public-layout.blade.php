@props([
    'title' => null,
    'description' => null,
    'keywords' => null,
    'ogImage' => null,
    'noindex' => false
])

@php
    $siteUrl = config('app.url', 'https://cronjobs.to');
    $currentUrl = url()->current();
    $currentLocale = app()->getLocale();
    
    // Default SEO values
    $defaultTitle = 'Cronjobs.to - Cloud Cron Job Scheduler with Monitoring & Alerts';
    $defaultDescription = 'Schedule HTTP jobs in the cloud. Monitor your cron jobs, get alerts on failures via Telegram & Email, 2FA security, and view detailed logs. Free plan available.';
    $defaultKeywords = 'cron job, scheduler, http job, cloud scheduler, job monitoring, cron monitoring, uptime monitoring, scheduled tasks, api scheduler, webhook scheduler';
    $defaultOgImage = asset('images/og-image.png');
    
    // Build final meta values
    $metaTitle = $title ? $title . ' - Cronjobs.to' : $defaultTitle;
    $metaDescription = $description ?? $defaultDescription;
    $metaKeywords = $keywords ?? $defaultKeywords;
    $metaOgImage = $ogImage ?? $defaultOgImage;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $currentLocale) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Primary Meta Tags -->
    <title>{{ $metaTitle }}</title>
    <meta name="title" content="{{ $metaTitle }}">
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="{{ $metaKeywords }}">
    <meta name="author" content="Cronjobs.to">
    <meta name="robots" content="{{ $noindex ? 'noindex, nofollow' : 'index, follow' }}">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ $currentUrl }}">
    
    <!-- Hreflang Tags for Multi-Language Support -->
    <link rel="alternate" hreflang="en" href="{{ $currentUrl }}{{ str_contains($currentUrl, '?') ? '&' : '?' }}lang=en">
    <link rel="alternate" hreflang="tr" href="{{ $currentUrl }}{{ str_contains($currentUrl, '?') ? '&' : '?' }}lang=tr">
    <link rel="alternate" hreflang="de" href="{{ $currentUrl }}{{ str_contains($currentUrl, '?') ? '&' : '?' }}lang=de">
    <link rel="alternate" hreflang="x-default" href="{{ $currentUrl }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $currentUrl }}">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:image" content="{{ $metaOgImage }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="Cronjobs.to">
    <meta property="og:locale" content="{{ $currentLocale }}">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $currentUrl }}">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $metaOgImage }}">
    <meta name="twitter:site" content="@cronjobsto">
    <meta name="twitter:creator" content="@cronjobsto">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>⚡</text></svg>">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    
    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- DNS Prefetch -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    
    <!-- Theme Color -->
    <meta name="theme-color" content="#0a0f1a">
    <meta name="msapplication-TileColor" content="#0a0f1a">
    
    <!-- Emoji Font Support for Chrome -->
    <style>
        .emoji-font {
            font-family: "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", sans-serif;
        }
    </style>
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Organization Schema -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "Cronjobs.to",
        "url": "{{ $siteUrl }}",
        "logo": "{{ asset('images/logo.png') }}",
        "description": "{{ $defaultDescription }}",
        "sameAs": [
            "https://twitter.com/cronjobsto",
            "https://github.com/cronjobsto"
        ],
        "contactPoint": {
            "@@type": "ContactPoint",
            "email": "support@@cronjobs.to",
            "contactType": "customer support",
            "availableLanguage": ["English", "Turkish", "German"]
        }
    }
    </script>
    
    <!-- WebSite Schema for Sitelinks Search Box -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "WebSite",
        "name": "Cronjobs.to",
        "url": "{{ $siteUrl }}",
        "potentialAction": {
            "@@type": "SearchAction",
            "target": "{{ $siteUrl }}/docs?search={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>
</head>
<body class="bg-midnight-950 text-midnight-50 min-h-screen antialiased">
    <!-- Skip to main content (Accessibility) -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-accent-500 text-midnight-950 px-4 py-2 rounded-lg z-[100]">
        Skip to main content
    </a>
    
    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-midnight-950/80 backdrop-blur-xl border-b border-midnight-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-2" aria-label="Cronjobs.to Homepage">
                    <div class="w-8 h-8 bg-accent-500 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-midnight-950" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="text-lg font-bold">cronjobs<span class="text-accent-500">.to</span></span>
                </a>

                <!-- Desktop Nav -->
                <nav class="hidden md:flex items-center gap-6" aria-label="Main navigation">
                    <a href="{{ route('docs') }}" class="text-sm text-midnight-400 hover:text-midnight-50 transition-colors">Docs</a>
                    <a href="{{ route('pricing') }}" class="text-sm text-midnight-400 hover:text-midnight-50 transition-colors">Pricing</a>
                    <a href="/#features" class="text-sm text-midnight-400 hover:text-midnight-50 transition-colors">Features</a>
                    <a href="{{ route('faq') }}" class="text-sm text-midnight-400 hover:text-midnight-50 transition-colors">FAQ</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-secondary text-sm">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-midnight-400 hover:text-midnight-50 transition-colors">Sign in</a>
                        <a href="{{ route('register') }}" class="btn-primary text-sm">Get Started</a>
                    @endauth
                </nav>

                <!-- Mobile menu button -->
                <button 
                    type="button"
                    id="mobile-menu-button"
                    class="md:hidden p-2 text-midnight-400 hover:text-midnight-50 focus:outline-none focus:ring-2 focus:ring-accent-500 rounded-lg"
                    aria-expanded="false"
                    aria-controls="mobile-menu"
                    aria-label="Open main menu"
                >
                    <svg class="w-6 h-6 menu-open-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="w-6 h-6 menu-close-icon hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Off-Canvas Menu (Hidden on desktop, starts closed on mobile) -->
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-midnight-950/80 backdrop-blur-sm hidden" style="z-index: 9998;" aria-hidden="true"></div>
    
    <aside 
        id="mobile-menu"
        class="fixed top-0 h-full w-80 max-w-[85vw] bg-midnight-900 border-r border-midnight-800 transition-transform duration-300 ease-in-out md:!hidden overflow-y-auto"
        style="left: 0; transform: translateX(-100%); z-index: 9999;"
        aria-label="Mobile navigation"
        role="dialog"
        aria-modal="true"
    >
        <!-- Mobile Menu Header -->
        <div class="flex items-center justify-between p-4 border-b border-midnight-800">
            <a href="/" class="flex items-center gap-2" aria-label="Cronjobs.to Homepage">
                <div class="w-8 h-8 bg-accent-500 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-midnight-950" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="text-lg font-bold">cronjobs<span class="text-accent-500">.to</span></span>
            </a>
            <button 
                type="button"
                id="mobile-menu-close"
                class="p-2 text-midnight-400 hover:text-midnight-50 focus:outline-none focus:ring-2 focus:ring-accent-500 rounded-lg"
                aria-label="Close menu"
            >
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <!-- Mobile Menu Navigation -->
        <nav class="p-4 space-y-2" aria-label="Mobile navigation">
            <a href="/" class="flex items-center gap-3 px-4 py-3 text-midnight-300 hover:text-midnight-50 hover:bg-midnight-800 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Home
            </a>
            <a href="/#features" class="flex items-center gap-3 px-4 py-3 text-midnight-300 hover:text-midnight-50 hover:bg-midnight-800 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                Features
            </a>
            <a href="{{ route('pricing') }}" class="flex items-center gap-3 px-4 py-3 text-midnight-300 hover:text-midnight-50 hover:bg-midnight-800 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Pricing
            </a>
            <a href="{{ route('docs') }}" class="flex items-center gap-3 px-4 py-3 text-midnight-300 hover:text-midnight-50 hover:bg-midnight-800 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                Documentation
            </a>
            <a href="{{ route('faq') }}" class="flex items-center gap-3 px-4 py-3 text-midnight-300 hover:text-midnight-50 hover:bg-midnight-800 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                FAQ
            </a>
            <a href="{{ route('about') }}" class="flex items-center gap-3 px-4 py-3 text-midnight-300 hover:text-midnight-50 hover:bg-midnight-800 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                About Us
            </a>
            <a href="{{ route('contact') }}" class="flex items-center gap-3 px-4 py-3 text-midnight-300 hover:text-midnight-50 hover:bg-midnight-800 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Contact
            </a>
            
            <!-- Divider -->
            <div class="my-4 border-t border-midnight-800"></div>
            
            <!-- Auth Links -->
            @auth
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-accent-400 hover:text-accent-300 hover:bg-accent-500/10 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                    </svg>
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="flex items-center gap-3 px-4 py-3 text-midnight-300 hover:text-midnight-50 hover:bg-midnight-800 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    Sign In
                </a>
                <a href="{{ route('register') }}" class="flex items-center justify-center gap-2 mt-4 px-4 py-3 bg-accent-500 text-midnight-950 font-semibold rounded-lg hover:bg-accent-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    Get Started Free
                </a>
            @endauth
        </nav>
        
        <!-- Mobile Menu Footer -->
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-midnight-800 bg-midnight-900">
            <div class="flex items-center justify-center gap-4">
                <a href="https://twitter.com/cronjobsto" target="_blank" rel="noopener noreferrer" class="p-2 text-midnight-500 hover:text-accent-400 transition-colors" aria-label="Twitter">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                    </svg>
                </a>
                <a href="https://github.com/cronjobsto" target="_blank" rel="noopener noreferrer" class="p-2 text-midnight-500 hover:text-accent-400 transition-colors" aria-label="GitHub">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" />
                    </svg>
                </a>
            </div>
            <p class="text-center text-xs text-midnight-600 mt-3">
                &copy; {{ date('Y') }} Cronjobs.to
            </p>
        </div>
    </aside>

    <!-- Main content -->
    <main id="main-content">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="border-t border-midnight-800 mt-24 bg-midnight-900/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <!-- Footer Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8 mb-12">
                <!-- Brand -->
                <div class="col-span-2 lg:col-span-1">
                    <a href="/" class="flex items-center gap-2 mb-4" aria-label="Cronjobs.to Homepage">
                        <div class="w-8 h-8 bg-accent-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-midnight-950" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <span class="text-lg font-bold">cronjobs<span class="text-accent-500">.to</span></span>
                    </a>
                    <p class="text-sm text-midnight-400 mb-4">
                        Cron jobs that just work. Schedule, monitor, and relax.
                    </p>
                    <!-- Status Badge -->
                    <a href="{{ route('system-status') }}" class="inline-flex items-center gap-2 px-3 py-1.5 bg-emerald-500/10 border border-emerald-500/30 rounded-full text-xs text-emerald-400 hover:bg-emerald-500/20 transition-colors">
                        <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></span>
                        All Systems Operational
                    </a>
                </div>

                <!-- Product -->
                <div>
                    <h4 class="text-sm font-semibold text-midnight-100 mb-4">Product</h4>
                    <ul class="space-y-3">
                        <li><a href="/#features" class="text-sm text-midnight-400 hover:text-accent-400 transition-colors">Features</a></li>
                        <li><a href="{{ route('docs') }}" class="text-sm text-midnight-400 hover:text-accent-400 transition-colors">Documentation</a></li>
                        <li><a href="{{ route('faq') }}" class="text-sm text-midnight-400 hover:text-accent-400 transition-colors">FAQ</a></li>
                        <li><a href="{{ route('system-status') }}" class="text-sm text-midnight-400 hover:text-accent-400 transition-colors">System Status</a></li>
                    </ul>
                </div>

                <!-- Company -->
                <div>
                    <h4 class="text-sm font-semibold text-midnight-100 mb-4">Company</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('about') }}" class="text-sm text-midnight-400 hover:text-accent-400 transition-colors">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="text-sm text-midnight-400 hover:text-accent-400 transition-colors">Contact</a></li>
                        <li><a href="{{ route('pricing') }}" class="text-sm text-midnight-400 hover:text-accent-400 transition-colors">Pricing</a></li>
                    </ul>
                </div>

                <!-- Legal -->
                <div>
                    <h4 class="text-sm font-semibold text-midnight-100 mb-4">Legal</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('privacy') }}" class="text-sm text-midnight-400 hover:text-accent-400 transition-colors">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}" class="text-sm text-midnight-400 hover:text-accent-400 transition-colors">Terms of Service</a></li>
                        <li><a href="{{ route('contact') }}?type=abuse" class="text-sm text-midnight-400 hover:text-accent-400 transition-colors">Report Abuse</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="pt-8 border-t border-midnight-800 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm text-midnight-500">
                    &copy; {{ date('Y') }} Cronjobs.to. All rights reserved.
                </p>
                <div class="flex items-center gap-6">
                    <!-- Social Links -->
                    <a href="https://twitter.com/cronjobsto" target="_blank" rel="noopener noreferrer" class="text-midnight-500 hover:text-accent-400 transition-colors" title="Follow us on Twitter" aria-label="Twitter">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                    <a href="https://github.com/cronjobsto" target="_blank" rel="noopener noreferrer" class="text-midnight-500 hover:text-accent-400 transition-colors" title="View on GitHub" aria-label="GitHub">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Powered By -->
            <div class="pt-4 text-center">
                <p class="text-xs text-midnight-600">
                    Powered by <a href="https://capitalcodes.io/" target="_blank" rel="noopener noreferrer" class="text-midnight-500 hover:text-accent-400 transition-colors font-medium">Capital Codes</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Cookie Consent Banner -->
    <x-cookie-consent />
    
    <!-- Mobile Menu JavaScript -->
    <script>
    (function() {
        const menuButton = document.getElementById('mobile-menu-button');
        const menuClose = document.getElementById('mobile-menu-close');
        const menu = document.getElementById('mobile-menu');
        const overlay = document.getElementById('mobile-menu-overlay');
        const menuOpenIcon = menuButton?.querySelector('.menu-open-icon');
        const menuCloseIcon = menuButton?.querySelector('.menu-close-icon');
        
        function openMenu() {
            if (!menu || !overlay) return;
            menu.style.transform = 'translateX(0)';
            overlay.classList.remove('hidden');
            menuButton?.setAttribute('aria-expanded', 'true');
            menuOpenIcon?.classList.add('hidden');
            menuCloseIcon?.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            // Focus trap - focus first focusable element in menu
            const firstFocusable = menu.querySelector('a, button');
            if (firstFocusable) {
                setTimeout(() => firstFocusable.focus(), 100);
            }
        }
        
        function closeMenu() {
            if (!menu || !overlay) return;
            menu.style.transform = 'translateX(-100%)';
            overlay.classList.add('hidden');
            menuButton?.setAttribute('aria-expanded', 'false');
            menuOpenIcon?.classList.remove('hidden');
            menuCloseIcon?.classList.add('hidden');
            document.body.style.overflow = '';
            menuButton?.focus();
        }
        
        menuButton?.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            if (isExpanded) {
                closeMenu();
            } else {
                openMenu();
            }
        });
        
        menuClose?.addEventListener('click', closeMenu);
        overlay?.addEventListener('click', closeMenu);
        
        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && menuButton?.getAttribute('aria-expanded') === 'true') {
                closeMenu();
            }
        });
        
        // Close menu when clicking nav links
        menu?.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeMenu);
        });
        
        // Handle resize - close menu if switching to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768 && menuButton?.getAttribute('aria-expanded') === 'true') {
                closeMenu();
            }
        });
    })();
    </script>
</body>
</html>
