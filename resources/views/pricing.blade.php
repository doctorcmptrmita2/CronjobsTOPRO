<x-public-layout 
    title="Pricing" 
    description="Simple, transparent pricing for Cronjobs.to. Start free with 5 jobs, or upgrade to Pro for unlimited features. No hidden fees."
    keywords="cronjobs pricing, cron job scheduler cost, free cron service, job monitoring pricing, cloud scheduler plans"
>
    <section class="pt-32 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-16">
                <h1 class="text-4xl font-bold text-midnight-50 mb-4">Simple, transparent pricing</h1>
                <p class="text-midnight-400 max-w-2xl mx-auto">
                    Choose the plan that fits your needs. Start free and upgrade as you grow.
                </p>
            </div>

            <!-- Pricing Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">
                @foreach($plans as $plan)
                <div class="card p-8 {{ $plan->slug === 'pro' ? 'border-accent-500/50 relative' : '' }}">
                    @if($plan->slug === 'pro')
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2">
                        <span class="badge bg-accent-500 text-midnight-950 font-semibold px-4 py-1">Popular</span>
                    </div>
                    @endif
                    
                    <div class="text-center mb-8">
                        <h2 class="text-lg font-semibold text-midnight-300 uppercase tracking-wider mb-2">{{ $plan->name }}</h2>
                        <div class="flex items-baseline justify-center gap-1">
                            <span class="text-4xl font-bold text-midnight-50">
                                {{ $plan->slug === 'free' ? 'Free' : '$5' }}
                            </span>
                            @if($plan->slug !== 'free')
                            <span class="text-midnight-500">/month</span>
                            @endif
                        </div>
                    </div>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span><strong class="text-midnight-100">{{ $plan->max_jobs }}</strong> scheduled jobs</span>
                        </li>
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span><strong class="text-midnight-100">{{ $plan->min_interval_minutes }} min</strong> minimum interval</span>
                        </li>
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span><strong class="text-midnight-100">{{ $plan->log_retention_days }} days</strong> log retention</span>
                        </li>
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Custom headers & body</span>
                        </li>
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Email failure alerts</span>
                        </li>
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Two-Factor Authentication (2FA)</span>
                        </li>
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Multi-language support</span>
                        </li>
                        @if($plan->slug === 'pro')
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-purple-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="flex items-center gap-2">
                                Telegram alerts
                                <span class="px-1.5 py-0.5 text-[10px] font-medium bg-purple-500/20 text-purple-400 rounded">NEW</span>
                            </span>
                        </li>
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-purple-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="flex items-center gap-2">
                                Login notifications
                                <span class="px-1.5 py-0.5 text-[10px] font-medium bg-purple-500/20 text-purple-400 rounded">NEW</span>
                            </span>
                        </li>
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-purple-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="flex items-center gap-2">
                                Activity log & history
                                <span class="px-1.5 py-0.5 text-[10px] font-medium bg-purple-500/20 text-purple-400 rounded">NEW</span>
                            </span>
                        </li>
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Priority support</span>
                        </li>
                        @endif
                    </ul>

                    @auth
                    <a href="{{ route('dashboard') }}" class="{{ $plan->slug === 'pro' ? 'btn-primary' : 'btn-secondary' }} w-full justify-center">
                        {{ auth()->user()->plan_id === $plan->id ? 'Current Plan' : 'Get Started' }}
                    </a>
                    @else
                    <a href="{{ route('register') }}" class="{{ $plan->slug === 'pro' ? 'btn-primary' : 'btn-secondary' }} w-full justify-center">
                        Get Started
                    </a>
                    @endauth
                </div>
                @endforeach

                <!-- Enterprise Card -->
                <div class="card p-8 bg-gradient-to-br from-midnight-900 to-midnight-950">
                    <div class="text-center mb-8">
                        <h2 class="text-lg font-semibold text-midnight-300 uppercase tracking-wider mb-2">Enterprise</h2>
                        <div class="flex items-baseline justify-center gap-1">
                            <span class="text-4xl font-bold text-midnight-50">Custom</span>
                        </div>
                    </div>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-accent-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span><strong class="text-midnight-100">Unlimited</strong> jobs</span>
                        </li>
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-accent-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span><strong class="text-midnight-100">1 min</strong> minimum interval</span>
                        </li>
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-accent-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Custom log retention</span>
                        </li>
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-accent-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Telegram & Email alerts</span>
                        </li>
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-accent-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>All security features (2FA, Login alerts)</span>
                        </li>
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-accent-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Dedicated support</span>
                        </li>
                        <li class="flex items-center gap-3 text-midnight-300">
                            <svg class="w-5 h-5 text-accent-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>SLA guarantee</span>
                        </li>
                    </ul>

                    <a href="mailto:hello@cronjobs.to" class="btn-secondary w-full justify-center">
                        Contact Sales
                    </a>
                </div>
            </div>

            <!-- FAQ -->
            <div class="mt-24 max-w-3xl mx-auto">
                <h2 class="text-2xl font-bold text-midnight-50 text-center mb-12">Frequently Asked Questions</h2>
                
                <div class="space-y-6">
                    <div class="card p-6">
                        <h3 class="text-lg font-semibold text-midnight-100 mb-2">What happens if my job fails?</h3>
                        <p class="text-midnight-400">Failed jobs are automatically retried based on your configuration. After consecutive failures reach your threshold, you'll receive an email alert (and Telegram notification for Pro users) with details about the failure.</p>
                    </div>
                    <div class="card p-6">
                        <h3 class="text-lg font-semibold text-midnight-100 mb-2">Can I upgrade or downgrade anytime?</h3>
                        <p class="text-midnight-400">Yes! You can change your plan at any time. Upgrades take effect immediately, and downgrades take effect at the end of your billing cycle.</p>
                    </div>
                    <div class="card p-6">
                        <h3 class="text-lg font-semibold text-midnight-100 mb-2">What HTTP methods are supported?</h3>
                        <p class="text-midnight-400">We support GET, POST, PUT, PATCH, and DELETE methods. You can also add custom headers and request bodies for your jobs.</p>
                    </div>
                    <div class="card p-6">
                        <h3 class="text-lg font-semibold text-midnight-100 mb-2">What is Two-Factor Authentication (2FA)?</h3>
                        <p class="text-midnight-400">2FA adds an extra layer of security to your account. After enabling it in settings, you'll need to enter a code from your authenticator app (Google Authenticator, Authy) when logging in. Available on all plans!</p>
                    </div>
                    <div class="card p-6">
                        <h3 class="text-lg font-semibold text-midnight-100 mb-2">How do Telegram alerts work?</h3>
                        <p class="text-midnight-400">Pro users can connect their Telegram account to receive instant notifications when jobs fail. Simply start a chat with our bot and link your account in settings. Much faster than email!</p>
                    </div>
                    <div class="card p-6">
                        <h3 class="text-lg font-semibold text-midnight-100 mb-2">What languages are supported?</h3>
                        <p class="text-midnight-400">Cronjobs.to is available in English, Turkish (Türkçe), and German (Deutsch). You can change your language preference in account settings. More languages coming soon!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Schema -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Product",
        "name": "Cronjobs.to",
        "description": "Cloud-based cron job scheduler with monitoring, alerts, and detailed logs.",
        "brand": {
            "@@type": "Brand",
            "name": "Cronjobs.to"
        },
        "offers": [
            {
                "@@type": "Offer",
                "name": "Free Plan",
                "price": "0",
                "priceCurrency": "USD",
                "description": "5 scheduled jobs, 15 min minimum interval, 30 days log retention"
            },
            {
                "@@type": "Offer",
                "name": "Pro Plan",
                "price": "5",
                "priceCurrency": "USD",
                "priceValidUntil": "{{ now()->addYear()->format('Y-m-d') }}",
                "description": "Unlimited jobs, 5 min minimum interval, 90 days log retention, Telegram alerts"
            }
        ]
    }
    </script>

    <!-- BreadcrumbList Schema -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "{{ url('/') }}"
            },
            {
                "@@type": "ListItem",
                "position": 2,
                "name": "Pricing",
                "item": "{{ route('pricing') }}"
            }
        ]
    }
    </script>
</x-public-layout>
