<x-public-layout 
    description="Schedule HTTP jobs in the cloud with Cronjobs.to. Auto-retry on failure, Telegram & Email alerts, 2FA security, uptime monitoring, and status pages. Free plan available."
    keywords="cron job scheduler, http job scheduler, cloud cron, job monitoring, uptime monitoring, heartbeat monitoring, status page, scheduled tasks"
>
    <!-- Hero Section with Cron Editor -->
    <section class="relative pt-24 pb-16 overflow-hidden">
        <!-- Background effects -->
        <div class="absolute inset-0 bg-gradient-to-b from-accent-500/5 via-transparent to-transparent"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[600px] bg-accent-500/10 rounded-full blur-3xl"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-midnight-900 border border-accent-500/30 rounded-full text-sm mb-6 shadow-lg shadow-accent-500/10">
                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                    <span class="text-midnight-200">No signup required — Test your job now</span>
                </div>

                <!-- Heading - Clear Value Proposition -->
                <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black tracking-tight mb-6">
                    <span class="text-midnight-50">Cron Jobs + Monitoring</span>
                    <br>
                    <span class="text-gradient">One Dashboard</span>
                </h1>

                <!-- Subheading - Concrete Benefits -->
                <p class="text-xl lg:text-2xl text-midnight-300 max-w-3xl mx-auto mb-8 leading-relaxed">
                    Schedule HTTP tasks. <span class="text-accent-400 font-semibold">Auto-retry on failure.</span> 
                    Get <span class="text-emerald-400 font-semibold">Telegram & Email alerts.</span>
                    <br>
                    <span class="text-cyan-400 font-semibold">2FA security.</span> 
                    <span class="text-violet-400 font-semibold">Multi-language support.</span>
                </p>

                <!-- Trust Indicators -->
                <div class="flex flex-wrap items-center justify-center gap-3 lg:gap-4 mb-8">
                    <div class="flex items-center gap-1.5">
                        <div class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></div>
                        <span class="text-sm font-medium text-midnight-100">99.9%</span>
                        <span class="text-midnight-500 text-xs">Uptime</span>
                    </div>
                    <div class="w-px h-3.5 bg-midnight-700 hidden sm:block"></div>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-accent-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <span class="text-sm font-medium text-midnight-100">1M+</span>
                        <span class="text-midnight-500 text-xs">Jobs Executed</span>
                    </div>
                    <div class="w-px h-3.5 bg-midnight-700 hidden sm:block"></div>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-medium text-midnight-100">&lt;100ms</span>
                        <span class="text-midnight-500 text-xs">Latency</span>
                    </div>
                </div>
            </div>

            <!-- Interactive Job Creator -->
            <div class="max-w-4xl mx-auto">
                <form id="job-creator-form" action="{{ route('guest.preview') }}" method="POST">
                    @csrf
                    <div class="card p-6 lg:p-8">
                        <!-- URL Input -->
                        <div class="mb-6">
                            <label for="url" class="label">URL to Call <span class="text-red-400">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-midnight-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                    </svg>
                                </div>
                                <input type="url" name="url" id="url" required
                                       class="input pl-12 text-lg font-mono" 
                                       placeholder="https://api.yoursite.com/cron/backup"
                                       value="{{ old('url', session('pending_job.url', '')) }}">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <!-- HTTP Method -->
                            <div>
                                <label for="http_method" class="label">HTTP Method</label>
                                <select name="http_method" id="http_method" class="select">
                                    @foreach(['GET', 'POST', 'PUT', 'PATCH', 'DELETE'] as $method)
                                    <option value="{{ $method }}" {{ old('http_method', session('pending_job.http_method', 'GET')) === $method ? 'selected' : '' }}>
                                        {{ $method }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Timezone -->
                            <div>
                                <label for="timezone" class="label">Timezone</label>
                                <select name="timezone" id="timezone" class="select">
                                    @foreach(['UTC', 'America/New_York', 'America/Los_Angeles', 'Europe/London', 'Europe/Paris', 'Europe/Istanbul', 'Asia/Tokyo', 'Asia/Shanghai', 'Australia/Sydney'] as $tz)
                                    <option value="{{ $tz }}" {{ old('timezone', session('pending_job.timezone', 'UTC')) === $tz ? 'selected' : '' }}>
                                        {{ $tz }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Cron Expression Builder -->
                        <div class="mb-6">
                            <label class="label mb-4">Schedule (Cron Expression)</label>
                            
                            <!-- Quick Presets -->
                            <div class="grid grid-cols-3 sm:grid-cols-6 gap-2 mb-4">
                                <button type="button" onclick="setCronPreset('*/5 * * * *', 'Every 5 minutes')" class="px-3 py-2 text-sm bg-midnight-800 text-midnight-300 rounded-lg border border-midnight-700 hover:border-accent-500 hover:text-accent-400 transition-all">Every 5 min</button>
                                <button type="button" onclick="setCronPreset('*/15 * * * *', 'Every 15 minutes')" class="px-3 py-2 text-sm bg-midnight-800 text-midnight-300 rounded-lg border border-midnight-700 hover:border-accent-500 hover:text-accent-400 transition-all">Every 15 min</button>
                                <button type="button" onclick="setCronPreset('0 * * * *', 'Every hour')" class="px-3 py-2 text-sm bg-midnight-800 text-midnight-300 rounded-lg border border-midnight-700 hover:border-accent-500 hover:text-accent-400 transition-all">Every hour</button>
                                <button type="button" onclick="setCronPreset('0 */6 * * *', 'Every 6 hours')" class="px-3 py-2 text-sm bg-midnight-800 text-midnight-300 rounded-lg border border-midnight-700 hover:border-accent-500 hover:text-accent-400 transition-all">Every 6 hours</button>
                                <button type="button" onclick="setCronPreset('0 0 * * *', 'Every day at midnight')" class="px-3 py-2 text-sm bg-midnight-800 text-midnight-300 rounded-lg border border-midnight-700 hover:border-accent-500 hover:text-accent-400 transition-all">Daily</button>
                                <button type="button" onclick="setCronPreset('0 0 * * 0', 'Every Sunday at midnight')" class="px-3 py-2 text-sm bg-midnight-800 text-midnight-300 rounded-lg border border-midnight-700 hover:border-accent-500 hover:text-accent-400 transition-all">Weekly</button>
                            </div>

                            <!-- Cron Input -->
                            <div class="relative">
                                <div class="bg-midnight-950 rounded-lg border border-midnight-700 p-4">
                                    <div class="flex items-center justify-center gap-2 font-mono text-2xl">
                                        <input type="text" name="cron_minute" id="cron_minute" value="{{ old('cron_minute', '*') }}" 
                                               class="w-16 h-12 bg-midnight-800 border border-midnight-600 rounded-lg text-center text-midnight-100 text-xl focus:border-accent-500 focus:outline-none focus:ring-1 focus:ring-accent-500 transition-colors" 
                                               placeholder="*" oninput="updateCronExpression()">
                                        <input type="text" name="cron_hour" id="cron_hour" value="{{ old('cron_hour', '*') }}" 
                                               class="w-16 h-12 bg-midnight-800 border border-midnight-600 rounded-lg text-center text-midnight-100 text-xl focus:border-accent-500 focus:outline-none focus:ring-1 focus:ring-accent-500 transition-colors" 
                                               placeholder="*" oninput="updateCronExpression()">
                                        <input type="text" name="cron_day" id="cron_day" value="{{ old('cron_day', '*') }}" 
                                               class="w-16 h-12 bg-midnight-800 border border-midnight-600 rounded-lg text-center text-midnight-100 text-xl focus:border-accent-500 focus:outline-none focus:ring-1 focus:ring-accent-500 transition-colors" 
                                               placeholder="*" oninput="updateCronExpression()">
                                        <input type="text" name="cron_month" id="cron_month" value="{{ old('cron_month', '*') }}" 
                                               class="w-16 h-12 bg-midnight-800 border border-midnight-600 rounded-lg text-center text-midnight-100 text-xl focus:border-accent-500 focus:outline-none focus:ring-1 focus:ring-accent-500 transition-colors" 
                                               placeholder="*" oninput="updateCronExpression()">
                                        <input type="text" name="cron_weekday" id="cron_weekday" value="{{ old('cron_weekday', '*') }}" 
                                               class="w-16 h-12 bg-midnight-800 border border-midnight-600 rounded-lg text-center text-midnight-100 text-xl focus:border-accent-500 focus:outline-none focus:ring-1 focus:ring-accent-500 transition-colors" 
                                               placeholder="*" oninput="updateCronExpression()">
                                    </div>
                                    <!-- Field Labels -->
                                    <div class="flex items-center justify-center gap-2 mt-3 text-xs text-midnight-500 font-mono">
                                        <span class="w-16 text-center">minute</span>
                                        <span class="w-16 text-center">hour</span>
                                        <span class="w-16 text-center">day</span>
                                        <span class="w-16 text-center">month</span>
                                        <span class="w-16 text-center">weekday</span>
                                    </div>
                                </div>
                                <input type="hidden" name="cron_expression" id="cron_expression" value="{{ old('cron_expression', '* * * * *') }}">
                            </div>

                            <!-- Human Readable Description -->
                            <div class="mt-4 p-4 bg-midnight-800/50 rounded-lg border border-midnight-700">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-accent-500/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-accent-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-lg font-medium text-midnight-100" id="cron-description">Every minute</p>
                                        <p class="text-sm text-midnight-500" id="cron-expression-display">* * * * *</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Next Executions -->
                            <div class="mt-4">
                                <p class="text-xs text-midnight-500 mb-2">Next scheduled runs:</p>
                                <div class="flex flex-wrap gap-2" id="next-executions">
                                    <span class="px-3 py-1 bg-midnight-800 rounded-full text-sm text-midnight-300">Loading...</span>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex flex-col sm:flex-row items-center gap-4">
                            <button type="submit" class="btn-primary w-full sm:w-auto text-lg px-8 py-4">
                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Test This Job — Free
                            </button>
                            <p class="text-sm text-midnight-500">
                                <svg class="w-4 h-4 inline mr-1 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                No signup required • Test run included
                            </p>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Comparison Banner -->
            <div class="mt-12 pt-8 border-t border-midnight-800/50">
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 text-center">
                    <p class="text-midnight-400 text-sm">
                        <span class="text-accent-400 font-bold">Pro starts at $5/month</span> — 
                        Competitors charge $20-50 for the same features
                    </p>
                    <a href="{{ route('pricing') }}" class="text-accent-400 hover:text-accent-300 text-sm font-medium flex items-center gap-1 transition-colors">
                        See pricing
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 bg-midnight-900/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-midnight-50 mb-4">Everything you need for job scheduling</h2>
                <p class="text-midnight-400 max-w-2xl mx-auto">
                    Powerful features to help you monitor and manage your scheduled HTTP tasks with ease.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Feature 1 -->
                <div class="card-hover p-6">
                    <div class="w-12 h-12 bg-accent-500/10 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-accent-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-midnight-50 mb-2">Flexible Scheduling</h3>
                    <p class="text-midnight-400 text-sm">
                        Set up jobs with intervals, daily/weekly schedules, or custom cron expressions. Full timezone support included.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="card-hover p-6">
                    <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-midnight-50 mb-2">Automatic Retries</h3>
                    <p class="text-midnight-400 text-sm">
                        Failed jobs are automatically retried based on your configuration. Never miss a critical task again.
                    </p>
                </div>

                <!-- Feature 3 - Telegram & Email Alerts -->
                <div class="card-hover p-6 border border-purple-500/20 bg-gradient-to-br from-purple-500/5 to-transparent">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                        <span class="px-2 py-0.5 text-xs font-medium bg-purple-500/20 text-purple-400 rounded-full">NEW</span>
                    </div>
                    <h3 class="text-lg font-semibold text-midnight-50 mb-2">Telegram & Email Alerts</h3>
                    <p class="text-midnight-400 text-sm">
                        Get notified via Telegram or Email when your jobs fail. Instant notifications with detailed error information.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="card-hover p-6">
                    <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-midnight-50 mb-2">Detailed Logs</h3>
                    <p class="text-midnight-400 text-sm">
                        View complete execution history with response times, status codes, and response snippets for debugging.
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="card-hover p-6">
                    <div class="w-12 h-12 bg-red-500/10 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-midnight-50 mb-2">Custom Headers & Body</h3>
                    <p class="text-midnight-400 text-sm">
                        Full control over your HTTP requests. Add custom headers, set request bodies, and choose your method.
                    </p>
                </div>

                <!-- Feature 6 - Heartbeat Monitoring -->
                <div class="card-hover p-6 border border-emerald-500/20 bg-gradient-to-br from-emerald-500/5 to-transparent">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <span class="px-2 py-0.5 text-xs font-medium bg-emerald-500/20 text-emerald-400 rounded-full">NEW</span>
                    </div>
                    <h3 class="text-lg font-semibold text-midnight-50 mb-2">Heartbeat Monitoring</h3>
                    <p class="text-midnight-400 text-sm">
                        Monitor your cron jobs, workers, and services. Get alerted when they stop sending pings.
                    </p>
                </div>

                <!-- Feature 7 - Uptime Monitoring -->
                <div class="card-hover p-6 border border-cyan-500/20 bg-gradient-to-br from-cyan-500/5 to-transparent">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-12 h-12 bg-cyan-500/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="px-2 py-0.5 text-xs font-medium bg-cyan-500/20 text-cyan-400 rounded-full">NEW</span>
                    </div>
                    <h3 class="text-lg font-semibold text-midnight-50 mb-2">Uptime Monitoring</h3>
                    <p class="text-midnight-400 text-sm">
                        Monitor your websites and APIs 24/7. Get instant alerts when your endpoints go down with response time tracking.
                    </p>
                </div>

                <!-- Feature 8 - Status Pages -->
                <div class="card-hover p-6 border border-violet-500/20 bg-gradient-to-br from-violet-500/5 to-transparent">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-12 h-12 bg-violet-500/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-violet-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <span class="px-2 py-0.5 text-xs font-medium bg-violet-500/20 text-violet-400 rounded-full">NEW</span>
                    </div>
                    <h3 class="text-lg font-semibold text-midnight-50 mb-2">Public Status Pages</h3>
                    <p class="text-midnight-400 text-sm">
                        Create beautiful public status pages for your services. Show your users real-time system health and uptime history.
                    </p>
                </div>

                <!-- Feature 9 - Dashboard & Analytics -->
                <div class="card-hover p-6">
                    <div class="w-12 h-12 bg-orange-500/10 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-midnight-50 mb-2">Dashboard & Analytics</h3>
                    <p class="text-midnight-400 text-sm">
                        Powerful dashboard with real-time statistics, success rates, response times, and comprehensive job analytics at a glance.
                    </p>
                </div>

                <!-- Feature 10 - Two-Factor Authentication -->
                <div class="card-hover p-6 border border-rose-500/20 bg-gradient-to-br from-rose-500/5 to-transparent">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-12 h-12 bg-rose-500/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <span class="px-2 py-0.5 text-xs font-medium bg-rose-500/20 text-rose-400 rounded-full">NEW</span>
                    </div>
                    <h3 class="text-lg font-semibold text-midnight-50 mb-2">Two-Factor Authentication</h3>
                    <p class="text-midnight-400 text-sm">
                        Secure your account with 2FA using Google Authenticator or Authy. Recovery codes included for backup access.
                    </p>
                </div>

                <!-- Feature 11 - Multi-Language Support -->
                <div class="card-hover p-6 border border-sky-500/20 bg-gradient-to-br from-sky-500/5 to-transparent">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-12 h-12 bg-sky-500/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                            </svg>
                        </div>
                        <span class="px-2 py-0.5 text-xs font-medium bg-sky-500/20 text-sky-400 rounded-full">NEW</span>
                    </div>
                    <h3 class="text-lg font-semibold text-midnight-50 mb-2">Multi-Language Support</h3>
                    <p class="text-midnight-400 text-sm">
                        Use the platform in your preferred language. Currently supporting English, Turkish, and German with more coming soon.
                    </p>
                </div>

                <!-- Feature 12 - Activity Log -->
                <div class="card-hover p-6 border border-amber-500/20 bg-gradient-to-br from-amber-500/5 to-transparent">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-12 h-12 bg-amber-500/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <span class="px-2 py-0.5 text-xs font-medium bg-amber-500/20 text-amber-400 rounded-full">NEW</span>
                    </div>
                    <h3 class="text-lg font-semibold text-midnight-50 mb-2">Activity Log & History</h3>
                    <p class="text-midnight-400 text-sm">
                        Track all your job executions, API requests, and system activities. Full request/response details with filtering options.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Security Section -->
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-midnight-900 border border-rose-500/30 rounded-full text-sm mb-6 shadow-lg shadow-rose-500/10">
                    <svg class="w-4 h-4 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span class="text-midnight-200">Enterprise-Grade Security</span>
                </div>
                <h2 class="text-3xl font-bold text-midnight-50 mb-4">Your Security is Our Priority</h2>
                <p class="text-midnight-400 max-w-2xl mx-auto">
                    Protect your account and data with advanced security features designed for peace of mind.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Security Feature 1 -->
                <div class="card p-8 text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-rose-500/20 to-pink-500/20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-midnight-50 mb-3">Two-Factor Authentication</h3>
                    <p class="text-midnight-400">
                        Add an extra layer of security with TOTP-based 2FA. Compatible with Google Authenticator, Authy, and other authenticator apps.
                    </p>
                    <ul class="mt-4 space-y-2 text-sm text-midnight-400">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            QR Code Setup
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            8 Recovery Codes
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Easy Enable/Disable
                        </li>
                    </ul>
                </div>

                <!-- Security Feature 2 -->
                <div class="card p-8 text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-amber-500/20 to-orange-500/20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-midnight-50 mb-3">Login Notifications</h3>
                    <p class="text-midnight-400">
                        Get instant alerts whenever someone logs into your account. Know exactly when and where your account is accessed.
                    </p>
                    <ul class="mt-4 space-y-2 text-sm text-midnight-400">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Email & Telegram Alerts
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Device & Location Info
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Suspicious Activity Detection
                        </li>
                    </ul>
                </div>

                <!-- Security Feature 3 -->
                <div class="card p-8 text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-500/20 to-violet-500/20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-midnight-50 mb-3">Login History</h3>
                    <p class="text-midnight-400">
                        Full visibility into your account access history. Review all login attempts with detailed information.
                    </p>
                    <ul class="mt-4 space-y-2 text-sm text-midnight-400">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            IP Address Tracking
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Browser & Platform Details
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            New Device Detection
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Global Platform Section -->
    <section class="py-24 bg-midnight-900/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-midnight-800 border border-sky-500/30 rounded-full text-sm mb-6">
                        <svg class="w-4 h-4 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-midnight-200">Global Platform</span>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-midnight-50 mb-6">
                        Use Cronjobs.to in
                        <span class="text-gradient">Your Language</span>
                    </h2>
                    <p class="text-lg text-midnight-400 mb-8 leading-relaxed">
                        We believe great tools should be accessible to everyone. That's why Cronjobs.to supports multiple languages, making it easy for teams around the world to monitor their jobs.
                    </p>
                    
                    <!-- Language Flags -->
                    <div class="flex flex-wrap gap-3 mb-8">
                        <div class="flex items-center gap-2.5 px-3 py-2.5 bg-midnight-800/50 rounded-lg border border-midnight-700">
                            <div class="w-8 h-8 rounded-md overflow-hidden flex-shrink-0 shadow-md ring-1 ring-white/10">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7410 3900" class="w-full h-full" preserveAspectRatio="xMidYMid meet">
                                    <rect width="7410" height="3900" fill="#b22234"/>
                                    <path d="M0,450H7410m0,600H0m0,600H7410m0,600H0m0,600H7410m0,600H0" stroke="#fff" stroke-width="300"/>
                                    <rect width="2964" height="2100" fill="#3c3b6e"/>
                                    <g fill="#fff">
                                        <g id="s18"><g id="s9"><g id="s5"><g id="s4"><path id="s" d="M247,90 317.534230,307.082039 132.873218,172.917961H361.126782L176.465770,307.082039z"/><use href="#s" y="420"/><use href="#s" y="840"/><use href="#s" y="1260"/></g><use href="#s" y="1680"/></g><use href="#s4" x="247" y="210"/></g><use href="#s9" x="494"/></g><use href="#s18" x="988"/><use href="#s9" x="1976"/><use href="#s5" x="2470"/>
                                    </g>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-midnight-100">English</p>
                                <p class="text-xs text-midnight-500">Default</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2.5 px-3 py-2.5 bg-midnight-800/50 rounded-lg border border-midnight-700">
                            <div class="w-8 h-8 rounded-md overflow-hidden flex-shrink-0 shadow-md ring-1 ring-white/10">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 800" class="w-full h-full" preserveAspectRatio="xMidYMid meet">
                                    <rect width="1200" height="800" fill="#E30A17"/>
                                    <circle cx="425" cy="400" r="200" fill="#fff"/>
                                    <circle cx="475" cy="400" r="160" fill="#E30A17"/>
                                    <path fill="#fff" d="M 625 305 L 680 475 L 860 495 L 730 620 L 765 800 L 625 720 L 485 800 L 520 620 L 390 495 L 570 475 Z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-midnight-100">Türkçe</p>
                                <p class="text-xs text-midnight-500">Turkish</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2.5 px-3 py-2.5 bg-midnight-800/50 rounded-lg border border-midnight-700">
                            <div class="w-8 h-8 rounded-md overflow-hidden flex-shrink-0 shadow-md ring-1 ring-white/10">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 5 3" class="w-full h-full" preserveAspectRatio="xMidYMid meet">
                                    <rect width="5" height="1" fill="#000"/>
                                    <rect width="5" height="1" y="1" fill="#D00"/>
                                    <rect width="5" height="1" y="2" fill="#FFCE00"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-midnight-100">Deutsch</p>
                                <p class="text-xs text-midnight-500">German</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2.5 px-3 py-2.5 bg-midnight-800/30 rounded-lg border border-dashed border-midnight-600">
                            <div class="w-8 h-8 rounded-md overflow-hidden flex-shrink-0 bg-gradient-to-br from-blue-500 via-blue-600 to-green-600 flex items-center justify-center shadow-md ring-1 ring-white/10">
                                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-midnight-400">More Coming</p>
                                <p class="text-xs text-midnight-600">Soon</p>
                            </div>
                        </div>
                    </div>

                    <p class="text-sm text-midnight-500">
                        <svg class="w-4 h-4 inline mr-1 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Change your language anytime in account settings
                    </p>
                </div>
                
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-sky-500/20 via-transparent to-cyan-500/20 blur-3xl"></div>
                    <div class="relative card p-6 lg:p-8">
                        <div class="space-y-4">
                            <!-- UI Preview -->
                            <div class="flex items-center justify-between p-4 bg-midnight-800/50 rounded-lg border border-midnight-700">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-accent-500/10 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-accent-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                    </div>
                                    <span class="font-medium text-midnight-100">Dashboard</span>
                                </div>
                                <span class="text-xs text-midnight-500">Kontrol Paneli</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-midnight-800/50 rounded-lg border border-midnight-700">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-emerald-500/10 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <span class="font-medium text-midnight-100">Cron Jobs</span>
                                </div>
                                <span class="text-xs text-midnight-500">Zamanlanmış Görevler</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-midnight-800/50 rounded-lg border border-midnight-700">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-cyan-500/10 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                    <span class="font-medium text-midnight-100">Statistics</span>
                                </div>
                                <span class="text-xs text-midnight-500">İstatistikler</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-midnight-800/50 rounded-lg border border-midnight-700">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-rose-500/10 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <span class="font-medium text-midnight-100">Settings</span>
                                </div>
                                <span class="text-xs text-midnight-500">Ayarlar</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-midnight-50 mb-4">How it works</h2>
                <p class="text-midnight-400">Get started in 3 simple steps</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-accent-500 rounded-2xl flex items-center justify-center mx-auto mb-6 text-2xl font-bold text-midnight-950">1</div>
                    <h3 class="text-xl font-semibold text-midnight-50 mb-2">Create Your Job</h3>
                    <p class="text-midnight-400">Enter your URL and set your schedule using our visual cron builder above.</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-accent-500 rounded-2xl flex items-center justify-center mx-auto mb-6 text-2xl font-bold text-midnight-950">2</div>
                    <h3 class="text-xl font-semibold text-midnight-50 mb-2">Sign Up Free</h3>
                    <p class="text-midnight-400">Create your account to activate monitoring and receive alerts.</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-accent-500 rounded-2xl flex items-center justify-center mx-auto mb-6 text-2xl font-bold text-midnight-950">3</div>
                    <h3 class="text-xl font-semibold text-midnight-50 mb-2">Monitor & Relax</h3>
                    <p class="text-midnight-400">We'll run your jobs and notify you if anything goes wrong.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-midnight-900/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="card p-12 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-accent-500/10 via-transparent to-accent-500/10"></div>
                
                <div class="relative">
                    <h2 class="text-3xl font-bold text-midnight-50 mb-4">Ready to automate your tasks?</h2>
                    <p class="text-midnight-400 mb-6 max-w-xl mx-auto">
                        Join thousands of developers who trust cronjobs.to for their scheduled tasks.
                    </p>
                    
                    <!-- Feature highlights -->
                    <div class="flex flex-wrap items-center justify-center gap-4 mb-8 text-sm">
                        <div class="flex items-center gap-2 px-3 py-1.5 bg-midnight-800/50 rounded-full">
                            <svg class="w-4 h-4 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <span class="text-midnight-300">2FA Security</span>
                        </div>
                        <div class="flex items-center gap-2 px-3 py-1.5 bg-midnight-800/50 rounded-full">
                            <svg class="w-4 h-4 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span class="text-midnight-300">Telegram Alerts</span>
                        </div>
                        <div class="flex items-center gap-2 px-3 py-1.5 bg-midnight-800/50 rounded-full">
                            <svg class="w-4 h-4 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                            </svg>
                            <span class="text-midnight-300">Multi-Language</span>
                        </div>
                        <div class="flex items-center gap-2 px-3 py-1.5 bg-midnight-800/50 rounded-full">
                            <svg class="w-4 h-4 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <span class="text-midnight-300">Activity Logs</span>
                        </div>
                    </div>

                    <a href="#" onclick="document.getElementById('url').focus(); window.scrollTo({top: 0, behavior: 'smooth'}); return false;" class="btn-primary text-base px-8 py-3">
                        Create Your First Job
                        <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Cron Expression JavaScript -->
    <script>
    const cronDescriptions = {
        '* * * * *': 'Every minute',
        '*/5 * * * *': 'Every 5 minutes',
        '*/10 * * * *': 'Every 10 minutes',
        '*/15 * * * *': 'Every 15 minutes',
        '*/30 * * * *': 'Every 30 minutes',
        '0 * * * *': 'Every hour',
        '0 */2 * * *': 'Every 2 hours',
        '0 */3 * * *': 'Every 3 hours',
        '0 */6 * * *': 'Every 6 hours',
        '0 */12 * * *': 'Every 12 hours',
        '0 0 * * *': 'Every day at midnight',
        '0 12 * * *': 'Every day at noon',
        '0 0 * * 0': 'Every Sunday at midnight',
        '0 0 * * 1': 'Every Monday at midnight',
        '0 0 1 * *': 'First day of every month',
        '0 0 1 1 *': 'Every year on January 1st',
    };

    function setCronPreset(expression, description) {
        const parts = expression.split(' ');
        document.getElementById('cron_minute').value = parts[0];
        document.getElementById('cron_hour').value = parts[1];
        document.getElementById('cron_day').value = parts[2];
        document.getElementById('cron_month').value = parts[3];
        document.getElementById('cron_weekday').value = parts[4];
        updateCronExpression();
    }

    function updateCronExpression() {
        const minute = document.getElementById('cron_minute').value || '*';
        const hour = document.getElementById('cron_hour').value || '*';
        const day = document.getElementById('cron_day').value || '*';
        const month = document.getElementById('cron_month').value || '*';
        const weekday = document.getElementById('cron_weekday').value || '*';
        
        const expression = `${minute} ${hour} ${day} ${month} ${weekday}`;
        document.getElementById('cron_expression').value = expression;
        document.getElementById('cron-expression-display').textContent = expression;
        
        // Update description
        const description = cronDescriptions[expression] || describeCron(minute, hour, day, month, weekday);
        document.getElementById('cron-description').textContent = description;
        
        // Update next executions
        updateNextExecutions(expression);
    }

    function describeCron(minute, hour, day, month, weekday) {
        let desc = '';
        
        // Simple descriptions
        if (minute.startsWith('*/')) {
            return `Every ${minute.slice(2)} minutes`;
        }
        if (minute === '0' && hour.startsWith('*/')) {
            return `Every ${hour.slice(2)} hours`;
        }
        if (minute === '0' && hour === '0') {
            if (day === '*' && month === '*' && weekday === '*') return 'Every day at midnight';
            if (day === '*' && month === '*') {
                const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                if (!isNaN(weekday)) return `Every ${days[weekday]} at midnight`;
            }
        }
        if (minute !== '*' && hour !== '*' && day === '*' && month === '*' && weekday === '*') {
            return `Daily at ${hour.padStart(2, '0')}:${minute.padStart(2, '0')}`;
        }
        
        return `Custom schedule: ${minute} ${hour} ${day} ${month} ${weekday}`;
    }

    function updateNextExecutions(expression) {
        const container = document.getElementById('next-executions');
        const timezone = document.getElementById('timezone').value;
        
        // Simple next execution calculation (client-side approximation)
        const now = new Date();
        const executions = [];
        
        try {
            for (let i = 0; i < 5; i++) {
                const next = getNextExecution(expression, now, i);
                if (next) {
                    executions.push(formatDate(next, timezone));
                }
            }
        } catch (e) {
            executions.push('Invalid expression');
        }
        
        container.innerHTML = executions.map(e => 
            `<span class="px-3 py-1 bg-midnight-800 rounded-full text-sm text-midnight-300">${e}</span>`
        ).join('');
    }

    function getNextExecution(expression, fromDate, offset = 0) {
        const parts = expression.split(' ');
        const minute = parts[0];
        const hour = parts[1];
        
        let next = new Date(fromDate);
        next.setSeconds(0);
        next.setMilliseconds(0);
        
        // Simple interval calculation
        if (minute.startsWith('*/')) {
            const interval = parseInt(minute.slice(2));
            const currentMinute = next.getMinutes();
            const nextMinute = Math.ceil((currentMinute + 1) / interval) * interval;
            next.setMinutes(nextMinute);
            next.setMinutes(next.getMinutes() + (offset * interval));
        } else if (minute === '0' && hour.startsWith('*/')) {
            const interval = parseInt(hour.slice(2));
            next.setMinutes(0);
            const currentHour = next.getHours();
            const nextHour = Math.ceil((currentHour + 1) / interval) * interval;
            next.setHours(nextHour);
            next.setHours(next.getHours() + (offset * interval));
        } else {
            // Daily at specific time
            const targetMinute = minute === '*' ? 0 : parseInt(minute);
            const targetHour = hour === '*' ? 0 : parseInt(hour);
            next.setMinutes(targetMinute);
            next.setHours(targetHour);
            if (next <= fromDate) {
                next.setDate(next.getDate() + 1);
            }
            next.setDate(next.getDate() + offset);
        }
        
        return next;
    }

    function formatDate(date, timezone) {
        return date.toLocaleDateString('en-US', {
            weekday: 'short',
            month: 'short',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            timeZone: timezone
        });
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        // Set default to every 15 minutes
        setCronPreset('*/15 * * * *', 'Every 15 minutes');
        
        // Update on timezone change
        document.getElementById('timezone').addEventListener('change', function() {
            updateCronExpression();
        });
    });
    </script>

    <!-- SoftwareApplication Schema -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "SoftwareApplication",
        "name": "Cronjobs.to",
        "applicationCategory": "DeveloperApplication",
        "operatingSystem": "Web",
        "description": "Schedule HTTP jobs in the cloud. Monitor cron jobs, get alerts on failures via Telegram & Email, and view detailed logs.",
        "url": "{{ url('/') }}",
        "offers": {
            "@@type": "AggregateOffer",
            "lowPrice": "0",
            "highPrice": "5",
            "priceCurrency": "USD",
            "offerCount": "3"
        },
        "featureList": [
            "Flexible cron scheduling",
            "Automatic retries on failure",
            "Email and Telegram alerts",
            "Detailed execution logs",
            "Custom headers and body",
            "Heartbeat monitoring",
            "Uptime monitoring",
            "Public status pages",
            "Two-factor authentication",
            "Multi-language support",
            "Activity logging"
        ],
        "screenshot": "{{ asset('images/og-image.png') }}",
        "softwareVersion": "1.0",
        "datePublished": "2024-01-01",
        "aggregateRating": {
            "@@type": "AggregateRating",
            "ratingValue": "4.8",
            "ratingCount": "150",
            "bestRating": "5",
            "worstRating": "1"
        }
    }
    </script>

    <!-- HowTo Schema for Getting Started -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "HowTo",
        "name": "How to Schedule a Cron Job with Cronjobs.to",
        "description": "Learn how to create and schedule your first HTTP cron job in 3 easy steps.",
        "step": [
            {
                "@@type": "HowToStep",
                "name": "Create Your Job",
                "text": "Enter your URL and set your schedule using the visual cron builder.",
                "position": 1
            },
            {
                "@@type": "HowToStep",
                "name": "Sign Up Free",
                "text": "Create your account to activate monitoring and receive alerts.",
                "position": 2
            },
            {
                "@@type": "HowToStep",
                "name": "Monitor & Relax",
                "text": "We'll run your jobs and notify you if anything goes wrong.",
                "position": 3
            }
        ],
        "totalTime": "PT5M"
    }
    </script>

</x-public-layout>
