<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SearchController extends Controller
{
    // Show search form
    public function index()
    {
        return view('search.index');
    }

    // Search user by NID and show vaccination status
    public function search(Request $request)
    {
        $request->validate([
            'nid' => 'required|string',
        ]);

        $user = User::where('nid', $request->nid)->first();
        if (!$user) {
            return redirect('register')->with('error', 'This user not registered. Please Register First.');
        }
        $schedule = $user->schedule;
        $status = 'Not scheduled';

        if ($schedule) {
            $today = Carbon::today();
            if ($today->gt($schedule->vaccination_date)) {
                $status = 'Vaccinated';
            } elseif ($today->eq($schedule->vaccination_date)) {
                $status = 'Scheduled for today';
            } else {
                $status = 'Scheduled on ' . date('d M, Y', strtotime($schedule->vaccination_date));
            }
        }

        return view('search.status', compact('user', 'status'));
    }
}
