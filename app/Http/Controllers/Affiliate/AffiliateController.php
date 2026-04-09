<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\Affiliate;
use App\Models\Withdrawal;
use App\Services\AffiliateService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class AffiliateController extends Controller
{
    public function __construct(
        protected AffiliateService $service
    ) {}

    public function index()
    {
        $affiliate = $this->service->getOrCreateAffiliate(Auth::id());
        
        return Inertia::render('Affiliate/Dashboard', [
            'affiliate' => $affiliate->load(['commissions', 'referrals.user']),
            'withdrawals' => Withdrawal::where('affiliate_id', $affiliate->id)->get(),
        ]);
    }

    public function withdraw(Request $request)
    {
        $affiliate = Affiliate::where('user_id', Auth::id())->firstOrFail();
        
        $validated = $request->validate([
            'amount' => 'required|numeric|min:10000|max:' . $affiliate->balance,
            'bank_info' => 'required|array',
            'bank_info.bank_name' => 'required|string',
            'bank_info.account_number' => 'required|string',
            'bank_info.account_name' => 'required|string',
        ]);

        Withdrawal::create([
            'affiliate_id' => $affiliate->id,
            'amount' => $validated['amount'],
            'bank_info' => $validated['bank_info'],
            'status' => 'pending',
        ]);

        // Deduct balance
        $affiliate->decrement('balance', $validated['amount']);

        return redirect()->back()->with('message', 'Withdrawal request submitted successfully.');
    }
}
