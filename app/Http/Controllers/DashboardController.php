<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

class DashboardController
{
    public function __invoke(Request $request)
    {

        if ($request->user()->wallet === null) {
            $wallet = new Wallet;
            $request->user()->wallet()->save($wallet);
            $request->user()->refresh();
        }

        $transactions = $request->user()->wallet->transactions()->with('transfer')->orderByDesc('id')->get();
        $balance = $request->user()->wallet->balance;

        return view('dashboard', compact('transactions', 'balance'));
    }
}
