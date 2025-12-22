<x-public-layout 
    title="Documentation" 
    description="Complete guide to Cronjobs.to. Learn job scheduling, uptime monitoring, heartbeat checks, status pages, alerts, and API integration with code examples."
    keywords="cronjobs documentation, cron scheduler guide, job monitoring tutorial, uptime check setup, heartbeat monitoring docs, api integration"
>
    <!-- Hero Section -->
    <section class="pt-24 pb-12 bg-midnight-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-accent-500/10 border border-accent-500/30 rounded-full text-sm text-accent-200 mb-4">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Documentation
                </div>
                <h1 class="text-4xl sm:text-5xl font-bold text-midnight-50 mb-4">
                    Master <span class="text-gradient">Cronjobs.to</span>
                </h1>
                <p class="text-lg text-midnight-300 max-w-2xl mx-auto">
                    Complete guides, code examples, and best practices for scheduling jobs, monitoring uptime, and managing status pages.
                </p>
            </div>

            <!-- Quick Start Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
                <a href="#getting-started" class="card-hover p-6 border border-accent-500/30 bg-accent-500/5">
                    <div class="w-12 h-12 rounded-xl bg-accent-500/20 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-midnight-50 mb-2">Quick Start</h3>
                    <p class="text-sm text-midnight-400">Create your first job in 2 minutes</p>
                </a>
                <a href="#api" class="card-hover p-6 border border-midnight-700 bg-midnight-900">
                    <div class="w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-midnight-50 mb-2">API Reference</h3>
                    <p class="text-sm text-midnight-400">Integrate with your workflow</p>
                </a>
                <a href="#examples" class="card-hover p-6 border border-midnight-700 bg-midnight-900">
                    <div class="w-12 h-12 rounded-xl bg-emerald-500/20 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-midnight-50 mb-2">Examples</h3>
                    <p class="text-sm text-midnight-400">Real-world use cases</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Main Content with Sidebar -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Navigation (Sticky) -->
                <aside class="lg:w-64 flex-shrink-0">
                    <div class="lg:sticky lg:top-24 space-y-6">
                        <nav class="space-y-1">
                            <p class="text-xs font-semibold text-midnight-500 uppercase tracking-wider px-3 mb-2">Getting Started</p>
                            <a href="#introduction" class="block px-3 py-2 text-sm text-midnight-300 hover:text-accent-400 hover:bg-midnight-900 rounded-lg transition">Introduction</a>
                            <a href="#create-first-job" class="block px-3 py-2 text-sm text-midnight-300 hover:text-accent-400 hover:bg-midnight-900 rounded-lg transition">Create First Job</a>
                            <a href="#dashboard-tour" class="block px-3 py-2 text-sm text-midnight-300 hover:text-accent-400 hover:bg-midnight-900 rounded-lg transition">Dashboard Tour</a>
                            
                            <p class="text-xs font-semibold text-midnight-500 uppercase tracking-wider px-3 mb-2 mt-6">Features</p>
                            <a href="#cron-monitoring" class="block px-3 py-2 text-sm text-midnight-300 hover:text-accent-400 hover:bg-midnight-900 rounded-lg transition">Job Monitoring</a>
                            <a href="#uptime" class="block px-3 py-2 text-sm text-midnight-300 hover:text-accent-400 hover:bg-midnight-900 rounded-lg transition">Uptime Checks</a>
                            <a href="#heartbeat" class="block px-3 py-2 text-sm text-midnight-300 hover:text-accent-400 hover:bg-midnight-900 rounded-lg transition">Heartbeat Monitoring</a>
                            <a href="#status-pages" class="block px-3 py-2 text-sm text-midnight-300 hover:text-accent-400 hover:bg-midnight-900 rounded-lg transition">Status Pages</a>
                            <a href="#alerts" class="block px-3 py-2 text-sm text-midnight-300 hover:text-accent-400 hover:bg-midnight-900 rounded-lg transition">Alerts & Notifications</a>
                            
                            <p class="text-xs font-semibold text-midnight-500 uppercase tracking-wider px-3 mb-2 mt-6">API</p>
                            <a href="#api-auth" class="block px-3 py-2 text-sm text-midnight-300 hover:text-accent-400 hover:bg-midnight-900 rounded-lg transition">Authentication</a>
                            <a href="#api-endpoints" class="block px-3 py-2 text-sm text-midnight-300 hover:text-accent-400 hover:bg-midnight-900 rounded-lg transition">Endpoints</a>
                            <a href="#api-examples" class="block px-3 py-2 text-sm text-midnight-300 hover:text-accent-400 hover:bg-midnight-900 rounded-lg transition">Code Examples</a>
                        </nav>

                        <!-- Help Card -->
                        <div class="hidden lg:block p-4 rounded-xl border border-midnight-800 bg-midnight-900">
                            <h4 class="text-sm font-semibold text-midnight-50 mb-2">Need Help?</h4>
                            <p class="text-xs text-midnight-400 mb-3">Can't find what you're looking for?</p>
                            <a href="{{ route('contact') }}" class="text-xs text-accent-400 hover:text-accent-300 flex items-center gap-1">
                                Contact support
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </aside>

                <!-- Main Content -->
                <main class="flex-1 min-w-0">
                    <!-- Introduction -->
                    <article id="introduction" class="mb-16 scroll-mt-24">
                        <h2 class="text-3xl font-bold text-midnight-50 mb-4">Introduction</h2>
                        <p class="text-midnight-300 mb-6 leading-relaxed">
                            Cronjobs.to is a cloud-based platform for scheduling HTTP jobs, monitoring uptime, tracking heartbeats, and sharing public status pages. No servers to manage, no agents to install — everything runs in the cloud.
                        </p>
                        
                        <div class="p-6 rounded-xl border border-accent-500/30 bg-accent-500/5 mb-6">
                            <h3 class="text-lg font-semibold text-midnight-50 mb-3">What you can do:</h3>
                            <ul class="space-y-2">
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-accent-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-midnight-300"><strong class="text-midnight-100">Schedule HTTP Jobs:</strong> Make HTTP requests on a schedule (every 5 minutes, hourly, daily, or custom cron)</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-accent-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-midnight-300"><strong class="text-midnight-100">Monitor Uptime:</strong> Check if your websites/APIs are up and get alerted on downtime</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-accent-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-midnight-300"><strong class="text-midnight-100">Track Heartbeats:</strong> Ensure your cron jobs/workers are running by pinging our endpoint</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-accent-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-midnight-300"><strong class="text-midnight-100">Public Status Pages:</strong> Share real-time system health with customers</span>
                                </li>
                            </ul>
                        </div>
                    </article>

                    <!-- Create First Job -->
                    <article id="create-first-job" class="mb-16 scroll-mt-24">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-accent-500 to-accent-600 flex items-center justify-center text-white font-bold text-sm">1</div>
                            <h2 class="text-3xl font-bold text-midnight-50">Create Your First Job</h2>
                        </div>
                        
                        <p class="text-midnight-300 mb-6">Follow these steps to schedule your first HTTP job:</p>

                        <!-- Step 1 -->
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold text-midnight-50 mb-3">Step 1: Use the Job Creator</h3>
                            <p class="text-midnight-300 mb-4">Go to the <a href="{{ url('/') }}" class="text-accent-400 hover:underline">homepage</a> and fill in the job creator form:</p>
                            
                            <div class="bg-midnight-900 rounded-xl border border-midnight-800 p-6 mb-4">
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-3">
                                        <span class="w-6 h-6 rounded-full bg-midnight-800 flex items-center justify-center text-xs text-midnight-300 flex-shrink-0 mt-0.5">→</span>
                                        <div>
                                            <strong class="text-midnight-100">URL:</strong>
                                            <span class="text-midnight-400"> Enter your endpoint (e.g., </span>
                                            <code class="text-sm text-cyan-400 bg-midnight-950 px-2 py-0.5 rounded">https://api.example.com/backup</code>
                                            <span class="text-midnight-400">)</span>
                                        </div>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="w-6 h-6 rounded-full bg-midnight-800 flex items-center justify-center text-xs text-midnight-300 flex-shrink-0 mt-0.5">→</span>
                                        <div>
                                            <strong class="text-midnight-100">HTTP Method:</strong>
                                            <span class="text-midnight-400"> Choose GET, POST, PUT, PATCH, or DELETE</span>
                                        </div>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="w-6 h-6 rounded-full bg-midnight-800 flex items-center justify-center text-xs text-midnight-300 flex-shrink-0 mt-0.5">→</span>
                                        <div>
                                            <strong class="text-midnight-100">Schedule:</strong>
                                            <span class="text-midnight-400"> Use presets or enter custom cron (e.g., </span>
                                            <code class="text-sm text-cyan-400 bg-midnight-950 px-2 py-0.5 rounded">0 2 * * *</code>
                                            <span class="text-midnight-400"> for daily at 2 AM)</span>
                                        </div>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span class="w-6 h-6 rounded-full bg-midnight-800 flex items-center justify-center text-xs text-midnight-300 flex-shrink-0 mt-0.5">→</span>
                                        <div>
                                            <strong class="text-midnight-100">Timezone:</strong>
                                            <span class="text-midnight-400"> Select your timezone (default: UTC)</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="bg-blue-500/10 border border-blue-500/30 rounded-xl p-4">
                                <div class="flex gap-3">
                                    <svg class="w-5 h-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <p class="text-sm font-semibold text-blue-300 mb-1">Free Test Available</p>
                                        <p class="text-sm text-midnight-400">Click "Test This Job" to run it immediately without signing up. Check if your endpoint responds correctly before committing.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold text-midnight-50 mb-3">Step 2: Sign Up & Activate</h3>
                            <p class="text-midnight-300 mb-4">After testing, create your account to activate the schedule. Your job will run automatically based on the cron expression.</p>
                            
                            <div class="bg-midnight-900 rounded-xl border border-midnight-800 p-4">
                                <pre class="text-sm text-midnight-300"><code><span class="text-emerald-400">✓</span> Job created: <span class="text-cyan-400">/api/backup</span>
<span class="text-emerald-400">✓</span> Next run: <span class="text-accent-400">Mon, Dec 23, 02:00 AM</span>
<span class="text-emerald-400">✓</span> Timezone: <span class="text-midnight-400">Europe/Istanbul</span></code></pre>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div>
                            <h3 class="text-xl font-semibold text-midnight-50 mb-3">Step 3: Monitor & Configure Alerts</h3>
                            <p class="text-midnight-300 mb-4">Go to your dashboard to:</p>
                            <ul class="space-y-2 mb-4">
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-accent-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    <span class="text-midnight-300">View execution logs, response times, and success rates</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-accent-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    <span class="text-midnight-300">Configure email or Telegram alerts for failures</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-accent-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    <span class="text-midnight-300">Add custom headers, request body, and authentication</span>
                                </li>
                            </ul>
                            
                            <a href="{{ route('dashboard') }}" class="btn-primary inline-flex items-center gap-2 text-sm px-5 py-2.5">
                                Go to Dashboard
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </article>

                    <hr class="border-midnight-800 my-16">

                    <!-- Job Monitoring -->
                    <article id="cron-monitoring" class="mb-16 scroll-mt-24">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-accent-500/10 flex items-center justify-center">
                                <svg class="w-6 h-6 text-accent-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-midnight-50">Job Monitoring</h2>
                        </div>

                        <p class="text-midnight-300 mb-6">Schedule HTTP requests to run on your cron schedule. Perfect for database backups, API synchronization, cache warming, and periodic cleanups.</p>

                        <!-- Cron Expression Guide -->
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold text-midnight-50 mb-4">Understanding Cron Expressions</h3>
                            <div class="bg-midnight-900 rounded-xl border border-midnight-800 overflow-hidden">
                                <div class="p-4 border-b border-midnight-800">
                                    <code class="text-cyan-400 font-mono">* * * * *</code>
                                    <span class="text-midnight-500 ml-3">→ minute hour day month weekday</span>
                                </div>
                                <div class="p-4">
                                    <table class="w-full text-sm">
                                        <thead>
                                            <tr class="text-left border-b border-midnight-800">
                                                <th class="pb-2 text-midnight-300 font-semibold">Expression</th>
                                                <th class="pb-2 text-midnight-300 font-semibold">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-midnight-400">
                                            <tr class="border-b border-midnight-800/50">
                                                <td class="py-3"><code class="text-cyan-400 bg-midnight-950 px-2 py-1 rounded">*/5 * * * *</code></td>
                                                <td class="py-3">Every 5 minutes</td>
                                            </tr>
                                            <tr class="border-b border-midnight-800/50">
                                                <td class="py-3"><code class="text-cyan-400 bg-midnight-950 px-2 py-1 rounded">0 * * * *</code></td>
                                                <td class="py-3">Every hour (at minute 0)</td>
                                            </tr>
                                            <tr class="border-b border-midnight-800/50">
                                                <td class="py-3"><code class="text-cyan-400 bg-midnight-950 px-2 py-1 rounded">0 2 * * *</code></td>
                                                <td class="py-3">Every day at 2:00 AM</td>
                                            </tr>
                                            <tr class="border-b border-midnight-800/50">
                                                <td class="py-3"><code class="text-cyan-400 bg-midnight-950 px-2 py-1 rounded">0 0 * * 0</code></td>
                                                <td class="py-3">Every Sunday at midnight</td>
                                            </tr>
                                            <tr>
                                                <td class="py-3"><code class="text-cyan-400 bg-midnight-950 px-2 py-1 rounded">0 0 1 * *</code></td>
                                                <td class="py-3">First day of every month</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Custom Headers Example -->
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold text-midnight-50 mb-4">Adding Custom Headers</h3>
                            <p class="text-midnight-300 mb-4">For authenticated endpoints, add custom headers like API keys or bearer tokens:</p>
                            
                            <div class="bg-midnight-950 rounded-xl border border-midnight-800 overflow-hidden">
                                <div class="flex items-center justify-between px-4 py-2 bg-midnight-900 border-b border-midnight-800">
                                    <span class="text-xs text-midnight-400 font-mono">Custom Headers</span>
                                    <button onclick="copyCode('headers-example')" class="text-xs text-accent-400 hover:text-accent-300 transition">Copy</button>
                                </div>
                                <pre id="headers-example" class="p-4 text-sm overflow-x-auto"><code class="text-midnight-300"><span class="text-purple-400">Authorization:</span> <span class="text-emerald-400">Bearer YOUR_API_TOKEN_HERE</span>
<span class="text-purple-400">Content-Type:</span> <span class="text-emerald-400">application/json</span>
<span class="text-purple-400">X-Custom-Header:</span> <span class="text-emerald-400">custom-value</span></code></pre>
                            </div>
                        </div>

                        <!-- Request Body Example -->
                        <div>
                            <h3 class="text-xl font-semibold text-midnight-50 mb-4">Request Body (POST/PUT)</h3>
                            <p class="text-midnight-300 mb-4">Send JSON payloads for POST or PUT requests:</p>
                            
                            <div class="bg-midnight-950 rounded-xl border border-midnight-800 overflow-hidden">
                                <div class="flex items-center justify-between px-4 py-2 bg-midnight-900 border-b border-midnight-800">
                                    <span class="text-xs text-midnight-400 font-mono">Request Body (JSON)</span>
                                    <button onclick="copyCode('body-example')" class="text-xs text-accent-400 hover:text-accent-300 transition">Copy</button>
                                </div>
                                <pre id="body-example" class="p-4 text-sm overflow-x-auto"><code class="text-midnight-300">{
  <span class="text-purple-400">"action"</span>: <span class="text-emerald-400">"backup"</span>,
  <span class="text-purple-400">"database"</span>: <span class="text-emerald-400">"production"</span>,
  <span class="text-purple-400">"timestamp"</span>: <span class="text-cyan-400">1703289600</span>
}</code></pre>
                            </div>
                        </div>
                    </article>

                    <hr class="border-midnight-800 my-16">

                    <!-- Uptime Monitoring -->
                    <article id="uptime" class="mb-16 scroll-mt-24">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-cyan-500/10 flex items-center justify-center">
                                <svg class="w-6 h-6 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-midnight-50">Uptime Monitoring</h2>
                        </div>

                        <p class="text-midnight-300 mb-6">Monitor your websites and APIs 24/7. Get instant alerts when endpoints go down.</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div class="p-6 rounded-xl border border-cyan-500/30 bg-cyan-500/5">
                                <h4 class="font-semibold text-midnight-50 mb-2">Check Frequency</h4>
                                <p class="text-sm text-midnight-300">Checks run every 1-5 minutes (depending on plan)</p>
                            </div>
                            <div class="p-6 rounded-xl border border-cyan-500/30 bg-cyan-500/5">
                                <h4 class="font-semibold text-midnight-50 mb-2">Alert Threshold</h4>
                                <p class="text-sm text-midnight-300">Set consecutive failures before alerting (default: 2)</p>
                            </div>
                        </div>

                        <h3 class="text-xl font-semibold text-midnight-50 mb-4">Creating an Uptime Check</h3>
                        <ol class="space-y-4">
                            <li class="flex gap-4">
                                <span class="flex-shrink-0 w-8 h-8 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center font-semibold text-sm">1</span>
                                <div>
                                    <p class="text-midnight-300">Navigate to <strong class="text-midnight-100">Uptime</strong> section in your dashboard</p>
                                </div>
                            </li>
                            <li class="flex gap-4">
                                <span class="flex-shrink-0 w-8 h-8 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center font-semibold text-sm">2</span>
                                <div>
                                    <p class="text-midnight-300">Click <strong class="text-midnight-100">"New Uptime Check"</strong> and enter your URL</p>
                                </div>
                            </li>
                            <li class="flex gap-4">
                                <span class="flex-shrink-0 w-8 h-8 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center font-semibold text-sm">3</span>
                                <div>
                                    <p class="text-midnight-300">Set expected status code (e.g., 200) and optional keyword to verify</p>
                                </div>
                            </li>
                            <li class="flex gap-4">
                                <span class="flex-shrink-0 w-8 h-8 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center font-semibold text-sm">4</span>
                                <div>
                                    <p class="text-midnight-300">Configure alert threshold and notification channels</p>
                                </div>
                            </li>
                        </ol>
                    </article>

                    <hr class="border-midnight-800 my-16">

                    <!-- Heartbeat Monitoring -->
                    <article id="heartbeat" class="mb-16 scroll-mt-24">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center">
                                <svg class="w-6 h-6 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-midnight-50">Heartbeat Monitoring</h2>
                        </div>

                        <p class="text-midnight-300 mb-6">Ensure your cron jobs, workers, and background processes are running by sending periodic pings to Cronjobs.to.</p>

                        <div class="bg-emerald-500/10 border border-emerald-500/30 rounded-xl p-5 mb-8">
                            <h4 class="font-semibold text-emerald-300 mb-2">💡 Use Case:</h4>
                            <p class="text-sm text-midnight-300">Your server runs a daily backup script. Add a cURL command at the end of the script to ping Cronjobs.to. If the ping stops coming, we alert you that the backup failed.</p>
                        </div>

                        <h3 class="text-xl font-semibold text-midnight-50 mb-4">Implementation</h3>
                        
                        <div class="space-y-6">
                            <!-- Bash Example -->
                            <div>
                                <p class="text-sm text-midnight-400 mb-3">Add this to the end of your bash script:</p>
                                <div class="bg-midnight-950 rounded-xl border border-midnight-800 overflow-hidden">
                                    <div class="flex items-center justify-between px-4 py-2 bg-midnight-900 border-b border-midnight-800">
                                        <span class="text-xs text-midnight-400 font-mono">backup.sh</span>
                                        <button onclick="copyCode('bash-heartbeat')" class="text-xs text-accent-400 hover:text-accent-300 transition">Copy</button>
                                    </div>
                                    <pre id="bash-heartbeat" class="p-4 text-sm overflow-x-auto"><code class="text-midnight-300"><span class="text-purple-400">#!/bin/bash</span>

<span class="text-gray-500"># Your backup logic here</span>
<span class="text-cyan-400">mysqldump</span> -u root database > backup.sql

<span class="text-gray-500"># Ping Cronjobs.to on success</span>
<span class="text-cyan-400">curl</span> <span class="text-emerald-400">"https://cronjobs.to/api/heartbeat/YOUR_TOKEN_HERE/ping"</span></code></pre>
                                </div>
                            </div>

                            <!-- PHP Example -->
                            <div>
                                <p class="text-sm text-midnight-400 mb-3">PHP example:</p>
                                <div class="bg-midnight-950 rounded-xl border border-midnight-800 overflow-hidden">
                                    <div class="flex items-center justify-between px-4 py-2 bg-midnight-900 border-b border-midnight-800">
                                        <span class="text-xs text-midnight-400 font-mono">backup.php</span>
                                        <button onclick="copyCode('php-heartbeat')" class="text-xs text-accent-400 hover:text-accent-300 transition">Copy</button>
                                    </div>
                                    <pre id="php-heartbeat" class="p-4 text-sm overflow-x-auto"><code class="text-midnight-300"><span class="text-purple-400">&lt;?php</span>

<span class="text-gray-500">// Your backup logic</span>
<span class="text-cyan-400">performBackup</span>();

<span class="text-gray-500">// Ping heartbeat</span>
<span class="text-cyan-400">file_get_contents</span>(<span class="text-emerald-400">'https://cronjobs.to/api/heartbeat/YOUR_TOKEN/ping'</span>);
</code></pre>
                                </div>
                            </div>

                            <!-- Python Example -->
                            <div>
                                <p class="text-sm text-midnight-400 mb-3">Python example:</p>
                                <div class="bg-midnight-950 rounded-xl border border-midnight-800 overflow-hidden">
                                    <div class="flex items-center justify-between px-4 py-2 bg-midnight-900 border-b border-midnight-800">
                                        <span class="text-xs text-midnight-400 font-mono">backup.py</span>
                                        <button onclick="copyCode('python-heartbeat')" class="text-xs text-accent-400 hover:text-accent-300 transition">Copy</button>
                                    </div>
                                    <pre id="python-heartbeat" class="p-4 text-sm overflow-x-auto"><code class="text-midnight-300"><span class="text-purple-400">import</span> requests

<span class="text-gray-500"># Your backup logic</span>
<span class="text-cyan-400">perform_backup</span>()

<span class="text-gray-500"># Ping heartbeat</span>
requests.<span class="text-cyan-400">get</span>(<span class="text-emerald-400">'https://cronjobs.to/api/heartbeat/YOUR_TOKEN/ping'</span>)</code></pre>
                                </div>
                            </div>
                        </div>
                    </article>

                    <hr class="border-midnight-800 my-16">

                    <!-- Status Pages -->
                    <article id="status-pages" class="mb-16 scroll-mt-24">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-violet-500/10 flex items-center justify-center">
                                <svg class="w-6 h-6 text-violet-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-midnight-50">Public Status Pages</h2>
                        </div>

                        <p class="text-midnight-300 mb-8">Create beautiful, branded status pages to share system health with customers. Reduce support tickets by providing real-time transparency.</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div class="card p-5 border-l-4 border-violet-500">
                                <h4 class="font-semibold text-midnight-50 mb-2">✨ Features</h4>
                                <ul class="text-sm text-midnight-400 space-y-1.5">
                                    <li>• Custom domain support</li>
                                    <li>• Real-time uptime status</li>
                                    <li>• 90-day history charts</li>
                                    <li>• Incident announcements</li>
                                    <li>• Email subscribers</li>
                                </ul>
                            </div>
                            <div class="card p-5 border-l-4 border-orange-500">
                                <h4 class="font-semibold text-midnight-50 mb-2">⚙️ Customization</h4>
                                <ul class="text-sm text-midnight-400 space-y-1.5">
                                    <li>• Brand colors & logo</li>
                                    <li>• Custom sections</li>
                                    <li>• Service descriptions</li>
                                    <li>• Scheduled maintenance</li>
                                    <li>• Public or password-protected</li>
                                </ul>
                            </div>
                        </div>

                        <a href="{{ route('status-pages.index') }}" class="btn-primary inline-flex items-center gap-2 text-sm px-5 py-2.5">
                            Create Status Page
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </article>

                    <hr class="border-midnight-800 my-16">

                    <!-- Alerts -->
                    <article id="alerts" class="mb-16 scroll-mt-24">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-purple-500/10 flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-midnight-50">Alerts & Notifications</h2>
                        </div>

                        <p class="text-midnight-300 mb-8">Get notified when things break. Choose your notification channel and configure alert thresholds.</p>

                        <div class="space-y-6">
                            <!-- Email Alerts -->
                            <div class="card p-6">
                                <h3 class="text-lg font-semibold text-midnight-50 mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                    Email Alerts
                                </h3>
                                <p class="text-sm text-midnight-400 mb-4">Receive detailed failure reports with response codes, error messages, and timestamps.</p>
                                <div class="bg-midnight-900 rounded-lg border border-midnight-800 p-4 text-sm">
                                    <p class="text-midnight-300"><strong class="text-midnight-100">Trigger:</strong> Consecutive failures (configurable threshold)</p>
                                    <p class="text-midnight-300 mt-2"><strong class="text-midnight-100">Recovery:</strong> Automatic email when service is back online</p>
                                </div>
                            </div>

                            <!-- Telegram Alerts -->
                            <div class="card p-6 border-l-4 border-purple-500">
                                <h3 class="text-lg font-semibold text-midnight-50 mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                    Telegram Alerts (NEW)
                                </h3>
                                <p class="text-sm text-midnight-400 mb-4">Get instant push notifications on your phone via Telegram bot.</p>
                                
                                <div class="bg-midnight-950 rounded-xl border border-midnight-800 overflow-hidden mb-4">
                                    <div class="flex items-center justify-between px-4 py-2 bg-midnight-900 border-b border-midnight-800">
                                        <span class="text-xs text-midnight-400 font-mono">Setup Telegram Bot</span>
                                    </div>
                                    <div class="p-4 text-sm space-y-2 text-midnight-300">
                                        <p><span class="text-midnight-500">1.</span> Open Telegram and search for <code class="text-accent-400 bg-midnight-900 px-2 py-0.5 rounded">@CronjobsBot</code></p>
                                        <p><span class="text-midnight-500">2.</span> Send <code class="text-accent-400 bg-midnight-900 px-2 py-0.5 rounded">/start</code> to get your chat ID</p>
                                        <p><span class="text-midnight-500">3.</span> Add chat ID to your account settings</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                    <hr class="border-midnight-800 my-16">

                    <!-- API Documentation -->
                    <article id="api" class="mb-16 scroll-mt-24">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-orange-500/10 flex items-center justify-center">
                                <svg class="w-6 h-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-midnight-50">API Integration</h2>
                        </div>

                        <p class="text-midnight-300 mb-8">Automate job creation, uptime checks, and heartbeat pings programmatically using our REST API.</p>

                        <!-- Authentication -->
                        <div id="api-auth" class="mb-10">
                            <h3 class="text-xl font-semibold text-midnight-50 mb-4">Authentication</h3>
                            <p class="text-midnight-300 mb-4">Generate API tokens from <a href="{{ route('settings.api') }}" class="text-accent-400 hover:underline">Settings → API</a>. Include the token in the Authorization header:</p>
                            
                            <div class="bg-midnight-950 rounded-xl border border-midnight-800 overflow-hidden">
                                <div class="flex items-center justify-between px-4 py-2 bg-midnight-900 border-b border-midnight-800">
                                    <span class="text-xs text-midnight-400 font-mono">cURL Example</span>
                                    <button onclick="copyCode('api-auth-example')" class="text-xs text-accent-400 hover:text-accent-300 transition">Copy</button>
                                </div>
                                <pre id="api-auth-example" class="p-4 text-sm overflow-x-auto"><code class="text-midnight-300"><span class="text-cyan-400">curl</span> -X GET <span class="text-emerald-400">"https://cronjobs.to/api/v1/jobs"</span> \
  -H <span class="text-emerald-400">"Authorization: Bearer YOUR_API_TOKEN"</span> \
  -H <span class="text-emerald-400">"Accept: application/json"</span></code></pre>
                            </div>
                        </div>

                        <!-- API Endpoints -->
                        <div id="api-endpoints" class="mb-10">
                            <h3 class="text-xl font-semibold text-midnight-50 mb-4">Available Endpoints</h3>
                            
                            <div class="space-y-4">
                                <!-- List Jobs -->
                                <div class="card p-5">
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="px-2 py-1 bg-emerald-500/20 text-emerald-400 rounded text-xs font-mono font-semibold">GET</span>
                                        <code class="text-sm text-midnight-300">/api/v1/jobs</code>
                                    </div>
                                    <p class="text-sm text-midnight-400 mb-3">List all your scheduled jobs</p>
                                    <details class="text-sm">
                                        <summary class="cursor-pointer text-accent-400 hover:text-accent-300 mb-2">Show example response</summary>
                                        <div class="bg-midnight-950 rounded-lg border border-midnight-800 p-3 mt-2">
                                            <pre><code class="text-midnight-400">{
  "jobs": [
    {
      "id": 123,
      "name": "Daily Backup",
      "url": "https://api.example.com/backup",
      "schedule": "0 2 * * *",
      "status": "active",
      "last_run": "2025-12-23T02:00:00Z"
    }
  ]
}</code></pre>
                                        </div>
                                    </details>
                                </div>

                                <!-- Create Job -->
                                <div class="card p-5">
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="px-2 py-1 bg-blue-500/20 text-blue-400 rounded text-xs font-mono font-semibold">POST</span>
                                        <code class="text-sm text-midnight-300">/api/v1/jobs</code>
                                    </div>
                                    <p class="text-sm text-midnight-400 mb-3">Create a new scheduled job</p>
                                    <details class="text-sm">
                                        <summary class="cursor-pointer text-accent-400 hover:text-accent-300 mb-2">Show request body</summary>
                                        <div class="bg-midnight-950 rounded-lg border border-midnight-800 p-3 mt-2">
                                            <pre><code class="text-midnight-400">{
  "name": "Database Backup",
  "url": "https://api.example.com/backup",
  "http_method": "POST",
  "cron_expression": "0 2 * * *",
  "timezone": "Europe/Istanbul",
  "headers": {
    "Authorization": "Bearer token123"
  },
  "body": "{\"action\":\"backup\"}"
}</code></pre>
                                        </div>
                                    </details>
                                </div>

                                <!-- Delete Job -->
                                <div class="card p-5">
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="px-2 py-1 bg-red-500/20 text-red-400 rounded text-xs font-mono font-semibold">DELETE</span>
                                        <code class="text-sm text-midnight-300">/api/v1/jobs/{id}</code>
                                    </div>
                                    <p class="text-sm text-midnight-400">Delete a scheduled job</p>
                                </div>
                            </div>
                        </div>

                        <!-- Code Examples -->
                        <div id="api-examples" class="mb-10">
                            <h3 class="text-xl font-semibold text-midnight-50 mb-4">Full Code Examples</h3>
                            
                            <!-- JavaScript Example -->
                            <div class="mb-6">
                                <h4 class="text-lg font-semibold text-midnight-50 mb-3">JavaScript (Node.js)</h4>
                                <div class="bg-midnight-950 rounded-xl border border-midnight-800 overflow-hidden">
                                    <div class="flex items-center justify-between px-4 py-2 bg-midnight-900 border-b border-midnight-800">
                                        <span class="text-xs text-midnight-400 font-mono">create-job.js</span>
                                        <button onclick="copyCode('js-example')" class="text-xs text-accent-400 hover:text-accent-300 transition">Copy</button>
                                    </div>
                                    <pre id="js-example" class="p-4 text-sm overflow-x-auto"><code class="text-midnight-300"><span class="text-purple-400">const</span> response <span class="text-purple-400">=</span> <span class="text-purple-400">await</span> <span class="text-cyan-400">fetch</span>(<span class="text-emerald-400">'https://cronjobs.to/api/v1/jobs'</span>, {
  <span class="text-purple-400">method:</span> <span class="text-emerald-400">'POST'</span>,
  <span class="text-purple-400">headers:</span> {
    <span class="text-emerald-400">'Authorization'</span>: <span class="text-emerald-400">'Bearer YOUR_API_TOKEN'</span>,
    <span class="text-emerald-400">'Content-Type'</span>: <span class="text-emerald-400">'application/json'</span>
  },
  <span class="text-purple-400">body:</span> <span class="text-cyan-400">JSON.stringify</span>({
    <span class="text-purple-400">name:</span> <span class="text-emerald-400">'Backup Database'</span>,
    <span class="text-purple-400">url:</span> <span class="text-emerald-400">'https://api.example.com/backup'</span>,
    <span class="text-purple-400">cron_expression:</span> <span class="text-emerald-400">'0 2 * * *'</span>,
    <span class="text-purple-400">timezone:</span> <span class="text-emerald-400">'UTC'</span>
  })
});

<span class="text-purple-400">const</span> job <span class="text-purple-400">=</span> <span class="text-purple-400">await</span> response.<span class="text-cyan-400">json</span>();
<span class="text-cyan-400">console</span>.<span class="text-cyan-400">log</span>(<span class="text-emerald-400">'Job created:'</span>, job);</code></pre>
                                </div>
                            </div>

                            <!-- PHP Example -->
                            <div class="mb-6">
                                <h4 class="text-lg font-semibold text-midnight-50 mb-3">PHP (cURL)</h4>
                                <div class="bg-midnight-950 rounded-xl border border-midnight-800 overflow-hidden">
                                    <div class="flex items-center justify-between px-4 py-2 bg-midnight-900 border-b border-midnight-800">
                                        <span class="text-xs text-midnight-400 font-mono">create-job.php</span>
                                        <button onclick="copyCode('php-api-example')" class="text-xs text-accent-400 hover:text-accent-300 transition">Copy</button>
                                    </div>
                                    <pre id="php-api-example" class="p-4 text-sm overflow-x-auto"><code class="text-midnight-300"><span class="text-purple-400">&lt;?php</span>

<span class="text-cyan-400">$ch</span> = <span class="text-cyan-400">curl_init</span>(<span class="text-emerald-400">'https://cronjobs.to/api/v1/jobs'</span>);

<span class="text-cyan-400">curl_setopt_array</span>(<span class="text-cyan-400">$ch</span>, [
    <span class="text-purple-400">CURLOPT_POST</span> => <span class="text-purple-400">true</span>,
    <span class="text-purple-400">CURLOPT_RETURNTRANSFER</span> => <span class="text-purple-400">true</span>,
    <span class="text-purple-400">CURLOPT_HTTPHEADER</span> => [
        <span class="text-emerald-400">'Authorization: Bearer YOUR_API_TOKEN'</span>,
        <span class="text-emerald-400">'Content-Type: application/json'</span>
    ],
    <span class="text-purple-400">CURLOPT_POSTFIELDS</span> => <span class="text-cyan-400">json_encode</span>([
        <span class="text-emerald-400">'name'</span> => <span class="text-emerald-400">'Daily Backup'</span>,
        <span class="text-emerald-400">'url'</span> => <span class="text-emerald-400">'https://api.example.com/backup'</span>,
        <span class="text-emerald-400">'cron_expression'</span> => <span class="text-emerald-400">'0 2 * * *'</span>
    ])
]);

<span class="text-cyan-400">$response</span> = <span class="text-cyan-400">curl_exec</span>(<span class="text-cyan-400">$ch</span>);
<span class="text-cyan-400">$job</span> = <span class="text-cyan-400">json_decode</span>(<span class="text-cyan-400">$response</span>);

<span class="text-cyan-400">curl_close</span>(<span class="text-cyan-400">$ch</span>);</code></pre>
                                </div>
                            </div>

                            <!-- Python Example -->
                            <div>
                                <h4 class="text-lg font-semibold text-midnight-50 mb-3">Python (requests)</h4>
                                <div class="bg-midnight-950 rounded-xl border border-midnight-800 overflow-hidden">
                                    <div class="flex items-center justify-between px-4 py-2 bg-midnight-900 border-b border-midnight-800">
                                        <span class="text-xs text-midnight-400 font-mono">create_job.py</span>
                                        <button onclick="copyCode('python-api-example')" class="text-xs text-accent-400 hover:text-accent-300 transition">Copy</button>
                                    </div>
                                    <pre id="python-api-example" class="p-4 text-sm overflow-x-auto"><code class="text-midnight-300"><span class="text-purple-400">import</span> requests

url <span class="text-purple-400">=</span> <span class="text-emerald-400">"https://cronjobs.to/api/v1/jobs"</span>
headers <span class="text-purple-400">=</span> {
    <span class="text-emerald-400">"Authorization"</span>: <span class="text-emerald-400">"Bearer YOUR_API_TOKEN"</span>,
    <span class="text-emerald-400">"Content-Type"</span>: <span class="text-emerald-400">"application/json"</span>
}
data <span class="text-purple-400">=</span> {
    <span class="text-emerald-400">"name"</span>: <span class="text-emerald-400">"Daily Backup"</span>,
    <span class="text-emerald-400">"url"</span>: <span class="text-emerald-400">"https://api.example.com/backup"</span>,
    <span class="text-emerald-400">"cron_expression"</span>: <span class="text-emerald-400">"0 2 * * *"</span>,
    <span class="text-emerald-400">"timezone"</span>: <span class="text-emerald-400">"UTC"</span>
}

response <span class="text-purple-400">=</span> requests.<span class="text-cyan-400">post</span>(url, headers<span class="text-purple-400">=</span>headers, json<span class="text-purple-400">=</span>data)
job <span class="text-purple-400">=</span> response.<span class="text-cyan-400">json</span>()

<span class="text-cyan-400">print</span>(<span class="text-emerald-400">f"Job created: </span>{job[<span class="text-emerald-400">'id'</span>]}<span class="text-emerald-400">"</span>)</code></pre>
                                </div>
                            </div>
                        </div>
                    </article>

                    <hr class="border-midnight-800 my-16">

                    <!-- Examples Section -->
                    <article id="examples" class="mb-16 scroll-mt-24">
                        <h2 class="text-3xl font-bold text-midnight-50 mb-6">Real-World Examples</h2>
                        
                        <div class="grid grid-cols-1 gap-6">
                            <!-- Example 1 -->
                            <div class="card p-6 border-l-4 border-accent-500">
                                <h3 class="text-lg font-semibold text-midnight-50 mb-2">🔄 Database Backup Job</h3>
                                <p class="text-sm text-midnight-400 mb-4">Trigger daily database backups at 2 AM</p>
                                <div class="bg-midnight-950 rounded-lg border border-midnight-800 p-3 text-xs">
                                    <p class="text-midnight-300"><strong>Schedule:</strong> <code class="text-cyan-400">0 2 * * *</code></p>
                                    <p class="text-midnight-300 mt-1"><strong>Endpoint:</strong> <code class="text-cyan-400">POST /api/backups/trigger</code></p>
                                </div>
                            </div>

                            <!-- Example 2 -->
                            <div class="card p-6 border-l-4 border-emerald-500">
                                <h3 class="text-lg font-semibold text-midnight-50 mb-2">🌐 API Uptime Monitor</h3>
                                <p class="text-sm text-midnight-400 mb-4">Monitor production API health every minute</p>
                                <div class="bg-midnight-950 rounded-lg border border-midnight-800 p-3 text-xs">
                                    <p class="text-midnight-300"><strong>Check Frequency:</strong> Every 1 minute</p>
                                    <p class="text-midnight-300 mt-1"><strong>Alert After:</strong> 2 consecutive failures</p>
                                </div>
                            </div>

                            <!-- Example 3 -->
                            <div class="card p-6 border-l-4 border-purple-500">
                                <h3 class="text-lg font-semibold text-midnight-50 mb-2">💓 Worker Heartbeat</h3>
                                <p class="text-sm text-midnight-400 mb-4">Ensure background worker is processing jobs</p>
                                <div class="bg-midnight-950 rounded-lg border border-midnight-800 p-3 text-xs">
                                    <p class="text-midnight-300"><strong>Expected:</strong> Ping every 5 minutes</p>
                                    <p class="text-midnight-300 mt-1"><strong>Alert If:</strong> No ping for 10 minutes</p>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- CTA Section -->
                    <div class="mt-16 p-8 rounded-2xl bg-gradient-to-r from-accent-500/10 via-transparent to-accent-500/10 border border-accent-500/20">
                        <h3 class="text-2xl font-bold text-midnight-50 mb-3 text-center">Ready to Get Started?</h3>
                        <p class="text-midnight-400 text-center mb-6">Create your first job in under 2 minutes</p>
                        <div class="flex flex-col sm:flex-row justify-center gap-4">
                            <a href="{{ url('/') }}" class="btn-primary inline-flex items-center justify-center gap-2 px-6 py-3">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Create Your First Job
                            </a>
                            <a href="{{ route('pricing') }}" class="btn-secondary inline-flex items-center justify-center gap-2 px-6 py-3">
                                View Pricing
                            </a>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </section>

    <!-- Bottom Help Section -->
    <section class="py-16 bg-midnight-900/40">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-bold text-midnight-50 mb-3">Still Have Questions?</h2>
            <p class="text-midnight-400 mb-6">Check our FAQ or contact support — we typically respond within 24 hours.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('faq') }}" class="btn-secondary inline-flex items-center justify-center gap-2 px-6 py-3">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    View Full FAQ
                </a>
                <a href="{{ route('contact') }}" class="btn-primary inline-flex items-center justify-center gap-2 px-6 py-3">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Contact Support
                </a>
            </div>
        </div>
    </section>

    <!-- Copy to Clipboard JavaScript -->
    <script>
    function copyCode(elementId) {
        const code = document.getElementById(elementId);
        const text = code.innerText;
        navigator.clipboard.writeText(text).then(() => {
            // Show success feedback
            const button = event.target;
            const originalText = button.innerText;
            button.innerText = 'Copied!';
            button.classList.add('text-emerald-400');
            setTimeout(() => {
                button.innerText = originalText;
                button.classList.remove('text-emerald-400');
            }, 2000);
        });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Highlight active section in sidebar
    const observerOptions = {
        root: null,
        rootMargin: '-100px 0px -66%',
        threshold: 0
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');
                document.querySelectorAll('aside a').forEach(link => {
                    link.classList.remove('text-accent-400', 'bg-midnight-900');
                    if (link.getAttribute('href') === `#${id}`) {
                        link.classList.add('text-accent-400', 'bg-midnight-900');
                    }
                });
            }
        });
    }, observerOptions);

    document.querySelectorAll('article[id]').forEach(section => {
        observer.observe(section);
    });
    </script>

    <!-- Documentation Schema -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "TechArticle",
        "headline": "Cronjobs.to Documentation - Complete Guide",
        "description": "Complete documentation for Cronjobs.to including job scheduling, uptime monitoring, heartbeat checks, status pages, alerts, and API integration with code examples.",
        "url": "{{ route('docs') }}",
        "author": {
            "@@type": "Organization",
            "name": "Cronjobs.to"
        },
        "publisher": {
            "@@type": "Organization",
            "name": "Cronjobs.to",
            "logo": {
                "@@type": "ImageObject",
                "url": "{{ asset('images/logo.png') }}"
            }
        },
        "datePublished": "2024-01-01",
        "dateModified": "{{ date('Y-m-d') }}",
        "mainEntityOfPage": {
            "@@type": "WebPage",
            "@@id": "{{ route('docs') }}"
        },
        "articleSection": [
            "Getting Started",
            "Job Monitoring",
            "Uptime Checks",
            "Heartbeat Monitoring",
            "Status Pages",
            "API Integration"
        ]
    }
    </script>
</x-public-layout>
