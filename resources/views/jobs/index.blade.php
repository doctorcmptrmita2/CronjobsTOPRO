<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-midnight-50">{{ __('app.jobs') }}</h1>
                <p class="text-sm text-midnight-400 mt-1">{{ __('app.jobs_desc') }}</p>
            </div>
            <a href="{{ route('jobs.create') }}" class="btn-primary">
                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('app.new_job') }}
            </a>
        </div>
    </x-slot>

    <div class="card">
        @if($jobs->isEmpty())
        <div class="px-6 py-16 text-center">
            <div class="w-20 h-20 bg-midnight-800 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-midnight-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-midnight-100 mb-2">{{ __('app.no_jobs_yet') }}</h3>
            <p class="text-midnight-400 mb-6 max-w-md mx-auto">
                {{ __('app.create_first_job') }}
            </p>
            <a href="{{ route('jobs.create') }}" class="btn-primary">
                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('app.create_first_job_btn') }}
            </a>
        </div>
        @else
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('app.name') }}</th>
                        <th>{{ __('app.type') }}</th>
                        <th>{{ __('app.schedule') }}</th>
                        <th>{{ __('app.status') }}</th>
                        <th>{{ __('app.last_activity') }}</th>
                        <th class="text-right">{{ __('app.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $job)
                    <tr>
                        <td>
                            <a href="{{ route('jobs.show', $job) }}" class="text-midnight-100 hover:text-accent-400 transition-colors font-medium">
                                {{ $job->name }}
                            </a>
                            @if($job->isCron())
                            <p class="text-xs text-midnight-500 mt-0.5 font-mono truncate max-w-[200px]" title="{{ $job->url }}">
                                {{ $job->url }}
                            </p>
                            @else
                            <p class="text-xs text-emerald-500 mt-0.5">
                                {{ __('app.ping_every', ['interval' => $job->heartbeat_interval]) }}
                            </p>
                            @endif
                        </td>
                        <td>
                            @if($job->isHeartbeat())
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 text-xs font-medium bg-emerald-500/10 text-emerald-400 rounded-md">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                {{ __('app.heartbeat') }}
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 text-xs font-medium bg-blue-500/10 text-blue-400 rounded-md">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ __('app.cron') }}
                            </span>
                            @endif
                        </td>
                        <td>
                            <span class="badge-neutral font-mono">
                                {{ $job->schedule_summary }}
                            </span>
                        </td>
                        <td>
                            @if($job->isHeartbeat())
                                @php $hbStatus = $job->heartbeat_status; @endphp
                                @if($hbStatus === 'healthy')
                                <span class="badge-success">
                                    <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full mr-1.5 animate-pulse"></span>
                                    {{ __('app.healthy') }}
                                </span>
                                @elseif($hbStatus === 'warning')
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-amber-500/10 text-amber-400 rounded-md">
                                    <span class="w-1.5 h-1.5 bg-amber-400 rounded-full mr-1.5"></span>
                                    {{ __('app.late') }}
                                </span>
                                @elseif($hbStatus === 'critical')
                                <span class="badge-danger">
                                    <span class="w-1.5 h-1.5 bg-red-400 rounded-full mr-1.5"></span>
                                    {{ __('app.missed') }}
                                </span>
                                @elseif($hbStatus === 'waiting')
                                <span class="badge-neutral">
                                    <span class="w-1.5 h-1.5 bg-midnight-500 rounded-full mr-1.5"></span>
                                    {{ __('app.waiting') }}
                                </span>
                                @else
                                <span class="badge-neutral">
                                    <span class="w-1.5 h-1.5 bg-midnight-500 rounded-full mr-1.5"></span>
                                    {{ __('app.paused') }}
                                </span>
                                @endif
                            @else
                                @if($job->is_active)
                                <span class="badge-success">
                                    <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full mr-1.5 animate-pulse"></span>
                                    {{ __('app.active') }}
                                </span>
                                @else
                                <span class="badge-neutral">
                                    <span class="w-1.5 h-1.5 bg-midnight-500 rounded-full mr-1.5"></span>
                                    {{ __('app.paused') }}
                                </span>
                                @endif
                            @endif
                        </td>
                        <td>
                            @if($job->isHeartbeat())
                                @if($job->last_ping_at)
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 bg-emerald-400 rounded-full"></span>
                                    <span class="text-xs text-midnight-400 font-mono">
                                        {{ $job->last_ping_at->diffForHumans() }}
                                    </span>
                                </div>
                                @else
                                <span class="text-midnight-500 text-sm">{{ __('app.no_pings_yet') }}</span>
                                @endif
                            @else
                                @if($job->last_run_at)
                                <div class="flex items-center gap-2">
                                    @if($job->last_status_code >= 200 && $job->last_status_code < 300)
                                    <span class="w-2 h-2 bg-emerald-400 rounded-full"></span>
                                    @else
                                    <span class="w-2 h-2 bg-red-400 rounded-full"></span>
                                    @endif
                                    <span class="text-xs text-midnight-400 font-mono">
                                        {{ $job->last_run_at->diffForHumans() }}
                                    </span>
                                </div>
                                @else
                                <span class="text-midnight-500 text-sm">{{ __('app.never') }}</span>
                                @endif
                            @endif
                        </td>
                        <td>
                            <div class="flex items-center justify-end gap-2">
                                <form action="{{ route('jobs.toggle', $job) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="p-2 text-midnight-400 hover:text-midnight-100 hover:bg-midnight-800 rounded-lg transition-colors" title="{{ $job->is_active ? __('app.pause') : __('app.activate') }}">
                                        @if($job->is_active)
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
                                <a href="{{ route('jobs.edit', $job) }}" class="p-2 text-midnight-400 hover:text-midnight-100 hover:bg-midnight-800 rounded-lg transition-colors" title="{{ __('app.edit') }}">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                @if($job->isCron())
                                <form action="{{ route('jobs.run-now', $job) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="p-2 text-midnight-400 hover:text-accent-400 hover:bg-midnight-800 rounded-lg transition-colors" title="{{ __('app.run_now') }}">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($jobs->hasPages())
        <div class="px-6 py-4 border-t border-midnight-800">
            {{ $jobs->links() }}
        </div>
        @endif
        @endif
    </div>
</x-app-layout>
