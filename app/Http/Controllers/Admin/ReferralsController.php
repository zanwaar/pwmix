<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class ReferralsController extends Controller
{
    // public function index()
    // {
    //     $referralCounts = User::all();

    //     return view('admin.referral.index', compact('referralCounts'));
    // }
    public function index()
    {
        $referralCounts = User::whereNotNull('invite_code')
            ->withCount('referrals as count')
            ->orderByDesc('count')
            ->simplePaginate(10);
        
        return view('admin.referral.index', compact('referralCounts'));
    }
    
    


}
