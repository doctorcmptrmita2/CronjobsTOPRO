<x-app-layout>
    <x-slot name="title">{{ __('app.uptime_monitoring') }}</x-slot>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-midnight-50">{{ __('app.uptime_monitoring') }}</h1>
                <p class="text-sm text-midnight-400 mt-1">{{ __('app.uptime_desc') }}</p>
            </div>
            <a href="{{ route('uptime.create') }}" class="btn-primary">
                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('app.new_check') }}
            </a>
        </div>
    </x-slot>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="stat-card-label">{{ __('app.total_checks') }}</p>
                    <p class="stat-card-value">{{ $totalChecks }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="stat-card-label">{{ __('app.up') }}</p>
                    <p class="stat-card-value text-emerald-400">{{ $checksUp }}</p>
                </div>
                <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="stat-card-label">{{ __('app.down') }}</p>
                    <p class="stat-card-value text-red-400">{{ $checksDown }}</p>
                </div>
                <div class="w-12 h-12 bg-red-500/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="stat-card-label">{{ __('app.avg_uptime_24h') }}</p>
                    <p class="stat-card-value {{ $avgUptime >= 99 ? 'text-emerald-400' : ($avgUptime >= 95 ? 'text-amber-400' : 'text-red-400') }}">
                        {{ number_format($avgUptime, 2) }}%
                    </p>
                </div>
                <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Checks List -->
    <div class="card">
        <div class="px-6 py-4 border-b border-midnight-800">
            <h2 class="text-lg font-semibold text-midnight-50">{{ __('app.monitors') }}</h2>
        </div>
        
        @if($checks->isEmpty())
        <div class="px-6 py-12 text-center">
            <div class="w-16 h-16 bg-midnight-800 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-midnight-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-midnight-200 mb-2">{{ __('app.no_checks_yet') }}</h3>
            <p class="text-midnight-500 mb-6">{{ __('app.create_first_check') }}</p>
            <a href="{{ route('uptime.create') }}" class="btn-primary">
                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('app.create_first_check_btn') }}
            </a>
        </div>
        @else
        <div class="divide-y divide-midnight-800">
            @foreach($checks as $check)
            <div class="p-6 hover:bg-midnight-800/30 transition-colors">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4 flex-1 min-w-0">
                        <!-- Status Indicator -->
                        <div class="flex-shrink-0">
                            @if(!$check->is_active)
                            <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
                            @elseif($check->is_up)
                            <div class="w-3 h-3 bg-emerald-400 rounded-full animate-pulse"></div>
                            @else
                            <div class="w-3 h-3 bg-red-400 rounded-full animate-pulse"></div>
                            @endif
                        </div>

                        <!-- Check Info -->
                        <div class="min-w-0 flex-1">
                            <a href="{{ route('uptime.show', $check) }}" class="font-medium text-midnight-100 hover:text-accent-400 transition-colors">
                                {{ $check->name }}
                            </a>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="text-sm text-midnight-500 font-mono truncate">{{ $check->url }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="flex items-center gap-6">
                        <!-- Status -->
                        <div class="text-center">
                            <span class="block text-sm font-medium {{ $check->is_active ? ($check->is_up ? 'text-emerald-400' : 'text-red-400') : 'text-gray-500' }}">
                                {{ $check->status_text }}
                            </span>
                            <span class="text-xs text-midnight-500">{{ __('app.status') }}</span>
                        </div>

                        <!-- Response Time -->
                        <div class="text-center w-20">
                            @if($check->last_response_time_ms)
                            <span class="block text-sm font-medium text-{{ $check->response_time_color }}-400">
                                {{ $check->last_response_time_ms }}ms
                            </span>
                            @else
                            <span class="block text-sm text-midnight-500">—</span>
                            @endif
                            <span class="text-xs text-midnight-500">{{ __('app.response') }}</span>
                        </div>

                        <!-- Uptime -->
                        <div class="text-center w-20">
                            <span class="block text-sm font-medium text-{{ $check->uptime_color }}-400">
                                {{ number_format($check->uptime_percentage, 2) }}%
                            </span>
                            <span class="text-xs text-midnight-500">{{ __('app.uptime') }}</span>
                        </div>

                        <!-- Interval -->
                        <div class="text-center w-20">
                            <span class="block text-sm font-medium text-midnight-300">
                                {{ $check->interval_text }}
                            </span>
                            <span class="text-xs text-midnight-500">{{ __('app.interval') }}</span>
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center gap-2">
                            <form action="{{ route('uptime.toggle', $check) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="p-2 text-midnight-400 hover:text-midnight-100 hover:bg-midnight-800 rounded-lg transition-colors" title="{{ $check->is_active ? __('app.pause') : __('app.activate') }}">
                                    @if($check->is_active)
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    @else
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    @endif
                                </button>
                            </form>

                            <a href="{{ route('uptime.edit', $check) }}" class="p-2 text-midnight-400 hover:text-midnight-100 hover:bg-midnight-800 rounded-lg transition-colors" title="{{ __('app.edit') }}">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>

                            <form action="{{ route('uptime.run-now', $check) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="p-2 text-midnight-400 hover:text-midnight-100 hover:bg-midnight-800 rounded-lg transition-colors" title="{{ __('app.run_now') }}">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Mini Uptime Bar -->
                @php
                    $recentRuns = $check->runs()->latest('checked_at')->limit(50)->get()->reverse();
                @endphp
                @if($recentRuns->count() > 0)
                <div class="mt-4 flex items-center gap-0.5">
                    @foreach($recentRuns as $run)
                    <div class="flex-1 h-2 rounded-sm {{ $run->is_up ? 'bg-emerald-500' : 'bg-red-500' }}" 
                         title="{{ $run->checked_at->format('M d, H:i') }} - {{ $run->is_up ? __('app.up') : __('app.down') }} {{ $run->response_time_ms ? '(' . $run->response_time_ms . 'ms)' : '' }}"></div>
                    @endforeach
                    @for($i = $recentRuns->count(); $i < 50; $i++)
                    <div class="flex-1 h-2 rounded-sm bg-midnight-700"></div>
                    @endfor
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @endif
    </div>
</x-app-layout>
