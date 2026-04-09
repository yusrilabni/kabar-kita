<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'total_users' => User::count(),
                'premium_users' => User::where('plan_type', 'premium')->count(),
                'total_transactions' => Transaction::count(),
            ]
        ]);
    }

    public function users()
    {
        return Inertia::render('Admin/Users', [
            'users' => User::with('roles')->get()
        ]);
    }

    public function updatePlan(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'plan_type' => 'required|in:free,premium,special',
            'plan_expired_at' => 'nullable|date',
        ]);

        $user->update($validated);

        return redirect()->back()->with('message', "User {$user->name} plan updated to {$validated['plan_type']}.");
    }
}
