<x-app-layout>
    <x-slot name="title">{{ __('app.two_factor_auth') }}</x-slot>

    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('settings') }}" class="p-2 text-midnight-400 hover:text-midnight-100 hover:bg-midnight-800 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-midnight-50">{{ __('app.two_factor_auth') }}</h1>
                <p class="text-sm text-midnight-400 mt-1">{{ __('app.two_factor_auth_desc') }}</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-2xl">
        @if($isEnabled)
        <!-- 2FA Enabled State -->
        <div class="card p-6 mb-6 border-emerald-500/50 bg-emerald-500/5">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                </div>
                <div class="flex-1">
                    <h3 class="font-semibold text-emerald-300">{{ __('app.2fa_enabled_title') }}</h3>
                    <p class="text-sm text-midnight-400 mt-1">
                        {{ __('app.2fa_enabled_desc') }}
                    </p>
                    <p class="text-xs text-midnight-500 mt-2">
                        {{ __('app.enabled_on') }} {{ $user->two_factor_confirmed_at->format('M d, Y \a\t H:i') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="card p-6 space-y-6">
            <!-- Recovery Codes -->
            <div class="flex items-center justify-between p-4 bg-midnight-800/50 rounded-lg">
                <div>
                    <p class="font-medium text-midnight-100">{{ __('app.recovery_codes') }}</p>
                    <p class="text-sm text-midnight-400">{{ __('app.view_or_regenerate_codes') }}</p>
                </div>
                <a href="{{ route('settings.two-factor.recovery-codes') }}" class="btn-secondary text-sm">
                    {{ __('app.view_codes') }}
                </a>
            </div>

            <!-- Disable 2FA -->
            <div class="pt-6 border-t border-midnight-800">
                <h3 class="text-lg font-semibold text-midnight-50 mb-4">{{ __('app.disable_2fa') }}</h3>
                <p class="text-sm text-midnight-400 mb-4">
                    {{ __('app.disable_2fa_warning') }}
                </p>
                
                <form action="{{ route('settings.two-factor.disable') }}" method="POST" onsubmit="return confirm('{{ __('app.disable_2fa_confirm') }}')">
                    @csrf
                    @method('DELETE')
                    
                    <div class="mb-4">
                        <label for="password" class="label">{{ __('app.confirm_password') }}</label>
                        <input type="password" name="password" id="password" 
                               class="input @error('password') input-error @enderror"
                               placeholder="{{ __('app.enter_password') }}">
                        @error('password')
                        <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn-danger">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>
                        {{ __('app.disable_2fa') }}
                    </button>
                </form>
            </div>
        </div>

        @else
        <!-- 2FA Not Enabled State -->
        <div class="card p-6">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-amber-500/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-midnight-50 mb-2">{{ __('app.enable_2fa') }}</h3>
                <p class="text-midnight-400">{{ __('app.enable_2fa_desc') }}</p>
            </div>

            <!-- Benefits -->
            <div class="bg-midnight-800/50 rounded-lg p-6 mb-8">
                <h4 class="text-sm font-medium text-midnight-300 mb-4">{{ __('app.why_enable_2fa') }}</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-5 h-5 bg-emerald-500/20 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-sm text-midnight-300">{{ __('app.2fa_benefit_1') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-5 h-5 bg-emerald-500/20 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-sm text-midnight-300">{{ __('app.2fa_benefit_2') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-5 h-5 bg-emerald-500/20 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-sm text-midnight-300">{{ __('app.2fa_benefit_3') }}</span>
                    </li>
                </ul>
            </div>

            <div class="text-center">
                <a href="{{ route('settings.two-factor.setup') }}" class="btn-primary text-lg px-8 py-3">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    {{ __('app.enable_2fa') }}
                </a>
            </div>
        </div>
        @endif
    </div>
</x-app-layout>

