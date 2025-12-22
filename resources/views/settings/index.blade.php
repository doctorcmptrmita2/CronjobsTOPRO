<x-app-layout>
    <x-slot name="title">{{ __('app.settings') }}</x-slot>

    <x-slot name="header">
        <h1 class="text-2xl font-bold text-midnight-50">{{ __('app.settings') }}</h1>
        <p class="text-sm text-midnight-400 mt-1">{{ __('app.settings_desc') }}</p>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Account -->
        <a href="{{ route('settings.account') }}" class="card p-6 hover:border-midnight-700 transition-all group">
            <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-500/20 transition-colors">
                <svg class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-midnight-100 mb-1">{{ __('app.account') }}</h3>
            <p class="text-sm text-midnight-400">{{ __('app.account_desc') }}</p>
        </a>

        <!-- Notifications -->
        <a href="{{ route('settings.notifications') }}" class="card p-6 hover:border-midnight-700 transition-all group">
            <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-500/20 transition-colors">
                <svg class="w-6 h-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-midnight-100 mb-1">{{ __('app.notifications') }}</h3>
            <p class="text-sm text-midnight-400">{{ __('app.notifications_desc') }}</p>
        </a>

        <!-- API Keys -->
        <a href="{{ route('settings.api') }}" class="card p-6 hover:border-midnight-700 transition-all group">
            <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-emerald-500/20 transition-colors">
                <svg class="w-6 h-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-midnight-100 mb-1">{{ __('app.api_keys') }}</h3>
            <p class="text-sm text-midnight-400">{{ __('app.api_keys_desc') }}</p>
        </a>

        <!-- Plan & Billing -->
        <a href="{{ route('pricing') }}" class="card p-6 hover:border-midnight-700 transition-all group">
            <div class="w-12 h-12 bg-amber-500/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-amber-500/20 transition-colors">
                <svg class="w-6 h-6 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-midnight-100 mb-1">{{ __('app.plan_billing') }}</h3>
            <p class="text-sm text-midnight-400">{{ __('app.plan_billing_desc') }}</p>
            <div class="mt-3">
                <span class="badge-neutral">{{ $user->plan?->name ?? __('app.free_plan') }}</span>
            </div>
        </a>

        <!-- Login History -->
        <a href="{{ route('settings.login-history') }}" class="card p-6 hover:border-midnight-700 transition-all group">
            <div class="w-12 h-12 bg-red-500/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-red-500/20 transition-colors">
                <svg class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-midnight-100 mb-1">{{ __('app.login_history') }}</h3>
            <p class="text-sm text-midnight-400">{{ __('app.login_history_desc') }}</p>
        </a>

        <!-- Two-Factor Authentication -->
        <a href="{{ route('settings.two-factor') }}" class="card p-6 hover:border-midnight-700 transition-all group">
            <div class="w-12 h-12 bg-cyan-500/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-cyan-500/20 transition-colors">
                <svg class="w-6 h-6 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-midnight-100 mb-1">{{ __('app.two_factor_auth') }}</h3>
            <p class="text-sm text-midnight-400">{{ __('app.two_factor_desc') }}</p>
            <div class="mt-3">
                @if($user->hasTwoFactorEnabled())
                <span class="badge-success">{{ __('app.enabled') }}</span>
                @else
                <span class="badge-neutral">{{ __('app.not_enabled') }}</span>
                @endif
            </div>
        </a>
    </div>
</x-app-layout>
