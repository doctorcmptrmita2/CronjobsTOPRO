<x-app-layout>
    <x-slot name="title">{{ __('app.activity_log') }}</x-slot>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-midnight-50">{{ __('app.activity_log') }}</h1>
                <p class="text-sm text-midnight-400 mt-1">{{ __('app.activity_log_desc') }}</p>
            </div>
        </div>
    </x-slot>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="card p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-midnight-400 text-sm">{{ __('app.total_activities') }}</p>
                    <p class="text-2xl font-bold text-midnight-50">{{ number_format($stats['total_requests'] ?? $stats['total_activities'] ?? 0) }}</p>
                </div>
                <div class="w-10 h-10 bg-blue-500/10 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="card p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-midnight-400 text-sm">{{ __('app.successful') }}</p>
                    <p class="text-2xl font-bold text-emerald-400">{{ number_format($stats['successful']) }}</p>
                </div>
                <div class="w-10 h-10 bg-emerald-500/10 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="card p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-midnight-400 text-sm">{{ __('app.failed') }}</p>
                    <p class="text-2xl font-bold text-red-400">{{ number_format($stats['failed']) }}</p>
                </div>
                <div class="w-10 h-10 bg-red-500/10 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="card p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-midnight-400 text-sm">{{ __('app.avg_duration') }}</p>
                    <p class="text-2xl font-bold text-midnight-50">{{ number_format($stats['avg_response_time'] ?? $stats['avg_duration_ms'] ?? 0) }}ms</p>
                </div>
                <div class="w-10 h-10 bg-purple-500/10 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card p-4 mb-6">
        <div class="flex flex-wrap items-center gap-3">
            <span class="text-midnight-400 text-sm">{{ __('app.filter') }}:</span>
            <a href="{{ route('activity-log.index', ['filter' => 'all']) }}" 
               class="px-3 py-1.5 rounded-lg text-sm font-medium transition-colors {{ $filter === 'all' ? 'bg-accent-500 text-white' : 'bg-midnight-800 text-midnight-300 hover:bg-midnight-700' }}">
                {{ __('app.all') }}
            </a>
            <a href="{{ route('activity-log.index', ['filter' => 'job_run']) }}" 
               class="px-3 py-1.5 rounded-lg text-sm font-medium transition-colors {{ $filter === 'job_run' ? 'bg-accent-500 text-white' : 'bg-midnight-800 text-midnight-300 hover:bg-midnight-700' }}">
                {{ __('app.job_runs') }}
            </a>
            <a href="{{ route('activity-log.index', ['filter' => 'check_run']) }}" 
               class="px-3 py-1.5 rounded-lg text-sm font-medium transition-colors {{ $filter === 'check_run' ? 'bg-accent-500 text-white' : 'bg-midnight-800 text-midnight-300 hover:bg-midnight-700' }}">
                {{ __('app.uptime_checks') }}
            </a>
        </div>
    </div>

    <!-- Activity Table -->
    <div class="card overflow-hidden">
        @if($activities->isEmpty())
            <div class="p-12 text-center">
                <svg class="w-16 h-16 text-midnight-600 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <h3 class="text-lg font-semibold text-midnight-100 mb-2">{{ __('app.no_activity_yet') }}</h3>
                <p class="text-midnight-400">{{ __('app.activity_will_appear') }}</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-midnight-800/50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-midnight-400 uppercase tracking-wider">{{ __('app.time') }}</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-midnight-400 uppercase tracking-wider">{{ __('app.type') }}</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-midnight-400 uppercase tracking-wider">{{ __('app.name') }}</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-midnight-400 uppercase tracking-wider">{{ __('app.method') }}</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-midnight-400 uppercase tracking-wider">{{ __('app.endpoint') }}</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-midnight-400 uppercase tracking-wider">{{ __('app.status') }}</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-midnight-400 uppercase tracking-wider">{{ __('app.duration') }}</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-midnight-400 uppercase tracking-wider">{{ __('app.result') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-midnight-800">
                        @foreach($activities as $activity)
                            <tr class="hover:bg-midnight-800/30 transition-colors">
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="text-sm text-midnight-100">
                                        {{ $activity['timestamp']->setTimezone(Auth::user()->timezone ?? 'UTC')->format('M d, H:i:s') }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    @if($activity['type'] === 'job_run')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-500/20 text-blue-300">
                                            <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ __('app.job') }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-purple-500/20 text-purple-300">
                                            <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ __('app.uptime') }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <span class="text-sm font-medium text-midnight-100">{{ $activity['name'] }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium
                                        @if($activity['method'] === 'GET') bg-emerald-500/20 text-emerald-300
                                        @elseif($activity['method'] === 'POST') bg-blue-500/20 text-blue-300
                                        @elseif($activity['method'] === 'PUT') bg-amber-500/20 text-amber-300
                                        @elseif($activity['method'] === 'DELETE') bg-red-500/20 text-red-300
                                        @else bg-midnight-700 text-midnight-300
                                        @endif">
                                        {{ $activity['method'] }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 max-w-xs">
                                    <span class="text-sm text-midnight-400 truncate block" title="{{ $activity['endpoint'] }}">
                                        {{ Str::limit($activity['endpoint'], 40) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    @if($activity['status_code'])
                                        <span class="text-sm font-mono
                                            @if($activity['status_code'] >= 200 && $activity['status_code'] < 300) text-emerald-400
                                            @elseif($activity['status_code'] >= 300 && $activity['status_code'] < 400) text-blue-400
                                            @elseif($activity['status_code'] >= 400 && $activity['status_code'] < 500) text-amber-400
                                            @else text-red-400
                                            @endif">
                                            {{ $activity['status_code'] }}
                                        </span>
                                    @else
                                        <span class="text-sm text-midnight-500">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    @if($activity['duration_ms'])
                                        <span class="text-sm text-midnight-300">{{ number_format($activity['duration_ms']) }}ms</span>
                                    @else
                                        <span class="text-sm text-midnight-500">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    @if($activity['success'])
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-emerald-500/20 text-emerald-300">
                                            <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            {{ __('app.success') }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-500/20 text-red-300" title="{{ $activity['error_message'] ?? '' }}">
                                            <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            {{ __('app.failed') }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
