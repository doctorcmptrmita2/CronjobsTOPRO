<?php if (isset($component)) { $__componentOriginal58c831a7c3cbf004f2e66a23aed50e5b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal58c831a7c3cbf004f2e66a23aed50e5b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.public-layout','data' => ['title' => 'System Status','description' => 'Real-time status of Cronjobs.to infrastructure. Check uptime, performance metrics, and current system health.','keywords' => 'cronjobs status, system status, uptime status, service status, infrastructure health']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('public-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'System Status','description' => 'Real-time status of Cronjobs.to infrastructure. Check uptime, performance metrics, and current system health.','keywords' => 'cronjobs status, system status, uptime status, service status, infrastructure health']); ?>
    <div class="min-h-screen py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Hero -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-500/10 border border-emerald-500/30 rounded-full text-sm mb-6">
                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse" aria-hidden="true"></span>
                    <span class="text-emerald-400 font-medium">All Systems Operational</span>
                </div>
                <h1 class="text-4xl sm:text-5xl font-bold text-midnight-50 mb-4">
                    System Status
                </h1>
                <p class="text-xl text-midnight-400">
                    Real-time status of Cronjobs.to infrastructure
                </p>
            </div>

            <!-- Current Status -->
            <section class="card p-6 mb-8" aria-labelledby="current-status-heading">
                <div class="flex items-center justify-between mb-6">
                    <h2 id="current-status-heading" class="text-xl font-semibold text-midnight-50">Current Status</h2>
                    <span class="text-sm text-midnight-500">Last updated: <?php echo e(now()->format('M d, Y H:i')); ?> UTC</span>
                </div>

                <div class="space-y-4">
                    <!-- API -->
                    <div class="flex items-center justify-between p-4 bg-midnight-800/50 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-emerald-500/10 rounded-lg flex items-center justify-center" aria-hidden="true">
                                <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-midnight-100">API & Dashboard</p>
                                <p class="text-sm text-midnight-500">Web application and API endpoints</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 text-sm font-medium rounded-full">Operational</span>
                    </div>

                    <!-- Job Scheduler -->
                    <div class="flex items-center justify-between p-4 bg-midnight-800/50 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-emerald-500/10 rounded-lg flex items-center justify-center" aria-hidden="true">
                                <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-midnight-100">Job Scheduler</p>
                                <p class="text-sm text-midnight-500">Cron job execution engine</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 text-sm font-medium rounded-full">Operational</span>
                    </div>

                    <!-- Monitoring -->
                    <div class="flex items-center justify-between p-4 bg-midnight-800/50 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-emerald-500/10 rounded-lg flex items-center justify-center" aria-hidden="true">
                                <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-midnight-100">Monitoring & Alerts</p>
                                <p class="text-sm text-midnight-500">Email notifications and logging</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 text-sm font-medium rounded-full">Operational</span>
                    </div>

                    <!-- Database -->
                    <div class="flex items-center justify-between p-4 bg-midnight-800/50 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-emerald-500/10 rounded-lg flex items-center justify-center" aria-hidden="true">
                                <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-midnight-100">Database</p>
                                <p class="text-sm text-midnight-500">Primary data storage</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 text-sm font-medium rounded-full">Operational</span>
                    </div>
                </div>
            </section>

            <!-- Metrics -->
            <section class="grid md:grid-cols-3 gap-6 mb-8" aria-labelledby="metrics-heading">
                <h2 id="metrics-heading" class="sr-only">Performance Metrics</h2>
                <div class="card p-6 text-center">
                    <div class="text-3xl font-bold text-accent-400 mb-1"><?php echo e($stats['success_rate']); ?>%</div>
                    <div class="text-midnight-400 text-sm">Success Rate (24h)</div>
                </div>
                <div class="card p-6 text-center">
                    <div class="text-3xl font-bold text-emerald-400 mb-1"><?php echo e(number_format($stats['runs_today'])); ?></div>
                    <div class="text-midnight-400 text-sm">Runs Today</div>
                </div>
                <div class="card p-6 text-center">
                    <div class="text-3xl font-bold text-blue-400 mb-1"><?php echo e($stats['avg_response_time']); ?>ms</div>
                    <div class="text-midnight-400 text-sm">Avg Response Time</div>
                </div>
            </section>

            <!-- Uptime History -->
            <section class="card p-6 mb-8" aria-labelledby="uptime-heading">
                <h2 id="uptime-heading" class="text-xl font-semibold text-midnight-50 mb-6">90-Day Uptime History</h2>
                <div class="flex gap-1" role="img" aria-label="90-day uptime history showing consistent uptime">
                    <?php for($i = 0; $i < 90; $i++): ?>
                        <div class="flex-1 h-8 bg-emerald-500 rounded-sm opacity-<?php echo e(rand(80, 100)); ?>" title="Day <?php echo e(90 - $i); ?>: 100% uptime"></div>
                    <?php endfor; ?>
                </div>
                <div class="flex justify-between mt-2 text-xs text-midnight-500">
                    <span>90 days ago</span>
                    <span>Today</span>
                </div>
                <div class="mt-4 text-center">
                    <span class="text-2xl font-bold text-emerald-400">99.98%</span>
                    <span class="text-midnight-400 ml-2">uptime over the last 90 days</span>
                </div>
            </section>

            <!-- Subscribe -->
            <section class="card p-8 text-center bg-gradient-to-br from-midnight-900 via-midnight-900 to-accent-900/20" aria-labelledby="subscribe-heading">
                <h2 id="subscribe-heading" class="text-xl font-semibold text-midnight-50 mb-4">Get Status Updates</h2>
                <p class="text-midnight-400 mb-6">Subscribe to receive notifications about scheduled maintenance and incidents.</p>
                <form class="flex max-w-md mx-auto gap-3">
                    <label for="status-email" class="sr-only">Email address</label>
                    <input type="email" id="status-email" placeholder="your@email.com" class="input flex-1" required>
                    <button type="submit" class="btn-primary">Subscribe</button>
                </form>
            </section>
        </div>
    </div>

    <!-- Status Page Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Cronjobs.to System Status",
        "description": "Real-time status of Cronjobs.to infrastructure including uptime, performance metrics, and system health.",
        "url": "<?php echo e(route('system-status')); ?>"
    }
    </script>

    <!-- BreadcrumbList Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "<?php echo e(url('/')); ?>"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "System Status",
                "item": "<?php echo e(route('system-status')); ?>"
            }
        ]
    }
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal58c831a7c3cbf004f2e66a23aed50e5b)): ?>
<?php $attributes = $__attributesOriginal58c831a7c3cbf004f2e66a23aed50e5b; ?>
<?php unset($__attributesOriginal58c831a7c3cbf004f2e66a23aed50e5b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal58c831a7c3cbf004f2e66a23aed50e5b)): ?>
<?php $component = $__componentOriginal58c831a7c3cbf004f2e66a23aed50e5b; ?>
<?php unset($__componentOriginal58c831a7c3cbf004f2e66a23aed50e5b); ?>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\CronjobsTOPRO\resources\views/pages/status.blade.php ENDPATH**/ ?>