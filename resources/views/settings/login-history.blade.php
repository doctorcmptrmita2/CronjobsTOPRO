<x-app-layout>
    <x-slot name="title">{{ __('app.login_history') }}</x-slot>

    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('settings') }}" class="p-2 text-midnight-400 hover:text-midnight-100 hover:bg-midnight-800 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-midnight-50">{{ __('app.login_history') }}</h1>
                <p class="text-sm text-midnight-400 mt-1">{{ __('app.login_history_desc') }}</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-4xl">
        @if($loginHistories->isEmpty())
        <div class="card p-12 text-center">
            <div class="w-16 h-16 bg-midnight-800 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-midnight-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <p class="text-midnight-400">{{ __('app.no_login_history') }}</p>
            <p class="text-sm text-midnight-500 mt-2">{{ __('app.login_activity_hint') }}</p>
        </div>
        @else
        <div class="card overflow-hidden">
            <div class="px-6 py-4 border-b border-midnight-800">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-midnight-50">{{ __('app.recent_logins') }}</h3>
                    <span class="text-sm text-midnight-400">{{ $loginHistories->total() }} {{ __('app.total') }}</span>
                </div>
            </div>

            <div class="divide-y divide-midnight-800">
                @foreach($loginHistories as $login)
                <div class="px-6 py-4 hover:bg-midnight-800/30 transition-colors">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-start gap-4">
                            <!-- Device Icon -->
                            <div class="flex-shrink-0">
                                @if($login->device_type === 'mobile')
                                <div class="w-10 h-10 bg-blue-500/10 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                @elseif($login->device_type === 'tablet')
                                <div class="w-10 h-10 bg-purple-500/10 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                @else
                                <div class="w-10 h-10 bg-emerald-500/10 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                @endif
                            </div>

                            <!-- Details -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="font-medium text-midnight-100">
                                        {{ $login->browser }} on {{ $login->platform }}
                                    </span>
                                    @if($login->is_suspicious)
                                    <span class="inline-flex items-center px-2 py-0.5 text-xs font-medium bg-red-500/10 text-red-400 rounded">
                                        ⚠️ {{ __('app.suspicious') }}
                                    </span>
                                    @elseif($login->is_new_device)
                                    <span class="inline-flex items-center px-2 py-0.5 text-xs font-medium bg-amber-500/10 text-amber-400 rounded">
                                        {{ __('app.new_device') }}
                                    </span>
                                    @endif
                                </div>
                                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-sm text-midnight-400">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        {{ $login->location ?? __('app.unknown_location') }}
                                    </span>
                                    <span class="flex items-center gap-1 font-mono text-xs">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                        </svg>
                                        {{ $login->ip_address }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Time & Status -->
                        <div class="flex-shrink-0 text-right">
                            <div class="text-sm text-midnight-300">
                                {{ $login->logged_in_at->format('M d, Y') }}
                            </div>
                            <div class="text-xs text-midnight-500">
                                {{ $login->logged_in_at->format('H:i:s') }}
                            </div>
                            @if($login->notification_sent)
                            <div class="mt-1">
                                <span class="inline-flex items-center text-xs text-midnight-500">
                                    <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    {{ __('app.notified') }}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if($loginHistories->hasPages())
            <div class="px-6 py-4 border-t border-midnight-800">
                {{ $loginHistories->links() }}
            </div>
            @endif
        </div>
        @endif

        <!-- Security Note -->
        <div class="mt-6 p-4 bg-midnight-800/50 rounded-lg border border-midnight-700">
            <div class="flex items-start gap-3">
                <div class="flex-shrink-0 text-amber-400">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-midnight-100">{{ __('app.dont_recognize_login') }}</h4>
                    <p class="text-sm text-midnight-400 mt-1">
                        {{ __('app.suspicious_activity_hint') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

