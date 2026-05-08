<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRevenue = Transaction::where('status', 'Success')->sum('total_price');
        $ticketsSold = Transaction::where('status', 'Success')->count();
        $activeEvents = Event::where('date', '>=', now())->count();
        $pendingOrders = Transaction::where('status', 'Pending')->count();

        $latestTransactions = Transaction::with('event')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalRevenue',
            'ticketsSold',
            'activeEvents',
            'pendingOrders',
            'latestTransactions'
        ));
    }
}


