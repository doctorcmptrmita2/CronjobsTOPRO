<?php

namespace App\Http\Controllers;

use App\Models\CheckRun;
use App\Models\JobRun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityLogController extends Controller
{
    /**
     * Display the activity log dashboard
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $filter = $request->get('filter', 'all');

        // Get recent job runs
        $jobRuns = $user->jobRuns()
            ->with('job')
            ->orderByDesc('ran_at')
            ->limit(100)
            ->get()
            ->map(fn($run) => [
                'id' => $run->id,
                'type' => 'job_run',
                'type_label' => 'Job Run',
                'name' => $run->job->name ?? 'Unknown Job',
                'endpoint' => $run->job->url ?? '',
                'method' => $run->job->http_method ?? 'GET',
                'status_code' => $run->status_code,
                'duration_ms' => $run->duration_ms,
                'success' => $run->success,
                'error_message' => $run->error_message,
                'response_snippet' => $run->response_snippet ?? null,
                'timestamp' => $run->ran_at,
            ]);

        // Get recent check runs
        $checkRuns = $user->checks()
            ->with(['runs' => fn($q) => $q->orderByDesc('checked_at')->limit(100)])
            ->get()
            ->flatMap(fn($check) => $check->runs->map(fn($run) => [
                'id' => $run->id,
                'type' => 'check_run',
                'type_label' => 'Uptime Check',
                'name' => $check->name,
                'endpoint' => $check->url,
                'method' => 'GET',
                'status_code' => $run->status_code,
                'duration_ms' => $run->response_time_ms,
                'success' => $run->is_up,
                'error_message' => $run->error_message,
                'response_snippet' => null,
                'timestamp' => $run->checked_at,
            ]));

        // Combine and sort
        $activities = collect()
            ->merge($jobRuns)
            ->merge($checkRuns);

        // Apply filter
        if ($filter !== 'all') {
            $activities = $activities->filter(fn($a) => $a['type'] === $filter);
        }

        $activities = $activities
            ->sortByDesc('timestamp')
            ->take(100)
            ->values();

        // Stats
        $stats = [
            'total_requests' => $activities->count(),
            'successful' => $activities->where('success', true)->count(),
            'failed' => $activities->where('success', false)->count(),
            'avg_response_time' => (int) $activities->whereNotNull('duration_ms')->avg('duration_ms'),
        ];

        return view('activity-log.index', [
            'activities' => $activities,
            'filter' => $filter,
            'stats' => $stats,
        ]);
    }

    /**
     * Show activity detail
     */
    public function show(Request $request, int $id)
    {
        $user = Auth::user();
        $type = $request->get('type', 'job_run');

        $activity = match ($type) {
            'job_run' => JobRun::whereHas('job', fn($q) => $q->where('user_id', $user->id))
                ->with('job')
                ->findOrFail($id),
            'check_run' => CheckRun::whereHas('check', fn($q) => $q->where('user_id', $user->id))
                ->with('check')
                ->findOrFail($id),
            default => abort(404),
        };

        return view('activity-log.show', [
            'activity' => $activity,
            'type' => $type,
        ]);
    }
}
