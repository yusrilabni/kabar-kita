<?php

namespace App\Services;

use App\Models\Affiliate;
use App\Models\Commission;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Str;

class AffiliateService
{
    public function getOrCreateAffiliate(int $userId): Affiliate
    {
        return Affiliate::firstOrCreate(
            ['user_id' => $userId],
            ['referral_code' => $this->generateUniqueCode()]
        );
    }

    public function generateUniqueCode(): string
    {
        do {
            $code = strtoupper(Str::random(8));
        } while (Affiliate::where('referral_code', $code)->exists());

        return $code;
    }

    public function trackClick(string $code): void
    {
        Affiliate::where('referral_code', $code)->increment('total_clicks');
    }

    public function processCommission(Transaction $transaction): void
    {
        $user = $transaction->user;
        
        if (!$user->affiliate_id) {
            return;
        }

        $affiliate = Affiliate::find($user->affiliate_id);
        if (!$affiliate) {
            return;
        }

        // Example: 20% commission
        $commissionAmount = $transaction->amount * 0.20;

        Commission::create([
            'affiliate_id' => $affiliate->id,
            'transaction_id' => $transaction->id,
            'amount' => $commissionAmount,
            'status' => 'pending',
        ]);
        
        // Note: Actual balance update usually happens after approval
    }
}
