<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        // Get the current month from the request or use the current month
        $currentMonth = Carbon::now();
        if ($request->has('month')) {
            $currentMonth = Carbon::createFromFormat('Y-m', $request->get('month'));
        }

        // Calculate the previous and next month
        $prevMonth = $currentMonth->copy()->subMonth();
        $nextMonth = $currentMonth->copy()->addMonth();

        // Pass the variables to the view
        return view('admin.calendars.calendar', [
            'currentMonth' => $currentMonth, 
            'prevMonth' => $prevMonth, 
            'nextMonth' => $nextMonth
        ]);
    }

    public function clickDay($day)
    {
        $currentMonth = Carbon::now();  // Ensure this is the correct month you're working with
        $date = Carbon::now()->day($day);

        // Redirect back with the current month and a message
        return redirect()->route('calendar.index', ['month' => $currentMonth->format('Y-m')])
                         ->with('message', 'You clicked on ' . $date->format('l, F j, Y'));
    }

    // public function index(Request $request)
    // {
    //     return view('admin.calendars.calendar');
    // }

}
