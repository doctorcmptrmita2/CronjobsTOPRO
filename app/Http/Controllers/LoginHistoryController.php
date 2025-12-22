<?php

namespace App\Http\Controllers;

use App\Models\LoginHistory;
use Illuminate\Http\Request;

class LoginHistoryController extends Controller
{
    /**
     * Display a listing of the login history.
     */
    public function index(Request $request)
    {
        $loginHistories = $request->user()
            ->loginHistories()
            ->orderByDesc('logged_in_at')
            ->paginate(20);

        return view('settings.login-history', [
            'loginHistories' => $loginHistories,
        ]);
    }

    /**
     * Remove the specified login history record.
     */
    public function destroy(Request $request, LoginHistory $loginHistory)
    {
        // Ensure user owns this record
        if ($loginHistory->user_id !== $request->user()->id) {
            abort(403);
        }

        $loginHistory->delete();

        return back()->with('success', 'Login record deleted.');
    }
}
