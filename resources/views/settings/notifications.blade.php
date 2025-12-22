<x-app-layout>
    <x-slot name="title">{{ __('app.notification_settings') }}</x-slot>

    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('settings') }}" class="p-2 text-midnight-400 hover:text-midnight-100 hover:bg-midnight-800 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-midnight-50">{{ __('app.notification_settings') }}</h1>
                <p class="text-sm text-midnight-400 mt-1">{{ __('app.notification_settings_desc') }}</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-2xl">
        <form action="{{ route('settings.notifications.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card p-6 space-y-6">
                <!-- Email Notifications -->
                <div>
                    <h3 class="text-lg font-semibold text-midnight-50 mb-4">{{ __('app.email_notifications') }}</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="notification_email" class="label">{{ __('app.notification_email') }}</label>
                            <input type="email" name="notification_email" id="notification_email" 
                                   value="{{ old('notification_email', $user->notification_email) }}" 
                                   class="input @error('notification_email') input-error @enderror"
                                   placeholder="{{ $user->email }}">
                            <p class="mt-1.5 text-xs text-midnight-500">{{ __('app.leave_empty_for_account_email') }} ({{ $user->email }})</p>
                            @error('notification_email')
                            <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Security Alerts -->
                <div class="pt-6 border-t border-midnight-800">
                    <h3 class="text-lg font-semibold text-midnight-50 mb-4">🔐 {{ __('app.security_alerts') }}</h3>
                    
                    <div class="space-y-4">
                        <label class="flex items-center justify-between p-4 bg-midnight-800/50 rounded-lg cursor-pointer hover:bg-midnight-800 transition-colors">
                            <div>
                                <p class="font-medium text-midnight-100">{{ __('app.login_alerts') }}</p>
                                <p class="text-sm text-midnight-400">{{ __('app.login_alerts_desc') }}</p>
                            </div>
                            <div class="relative">
                                <input type="checkbox" name="login_alerts_enabled" value="1" 
                                       {{ old('login_alerts_enabled', $user->login_alerts_enabled) ? 'checked' : '' }}
                                       class="sr-only peer">
                                <div class="w-11 h-6 bg-midnight-700 rounded-full peer peer-checked:bg-accent-500 transition-colors"></div>
                                <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform peer-checked:translate-x-5"></div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Alert Types -->
                <div class="pt-6 border-t border-midnight-800">
                    <h3 class="text-lg font-semibold text-midnight-50 mb-4">📧 {{ __('app.email_alerts') }}</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-midnight-800/50 rounded-lg">
                            <div>
                                <p class="font-medium text-midnight-100">{{ __('app.job_failure_alerts') }}</p>
                                <p class="text-sm text-midnight-400">{{ __('app.job_failure_alerts_desc') }}</p>
                            </div>
                            <div class="text-emerald-400">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-midnight-800/50 rounded-lg">
                            <div>
                                <p class="font-medium text-midnight-100">{{ __('app.uptime_alerts') }}</p>
                                <p class="text-sm text-midnight-400">{{ __('app.uptime_alerts_desc') }}</p>
                            </div>
                            <div class="text-emerald-400">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-midnight-800/50 rounded-lg opacity-50">
                            <div>
                                <p class="font-medium text-midnight-100">{{ __('app.weekly_summary') }}</p>
                                <p class="text-sm text-midnight-400">{{ __('app.weekly_summary_desc') }}</p>
                            </div>
                            <span class="badge-neutral text-xs">{{ __('app.coming_soon') }}</span>
                        </div>

                        <a href="{{ route('settings.telegram') }}" class="flex items-center justify-between p-4 bg-midnight-800/50 rounded-lg hover:bg-midnight-800 transition-colors">
                            <div>
                                <p class="font-medium text-midnight-100">{{ __('app.telegram_notifications') }}</p>
                                <p class="text-sm text-midnight-400">{{ __('app.telegram_alerts_desc') }}</p>
                            </div>
                            @if(auth()->user()->telegram_enabled)
                            <span class="badge-success text-xs">{{ __('app.connected') }}</span>
                            @else
                            <span class="badge-neutral text-xs">{{ __('app.connect') }} →</span>
                            @endif
                        </a>
                    </div>
                </div>

                <div class="pt-4 border-t border-midnight-800">
                    <button type="submit" class="btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('app.save_changes') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>








