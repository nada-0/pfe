<?php

namespace App\Http\Controllers;

use App\Models\Meetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MeetupController extends Controller
{
    public function index(Request $request)
{
    $currentDate = Carbon::now();

    // Get year and month from request or use current year/month
    $year = (int)$request->input('year', $currentDate->year);
    $month = (int)$request->input('month', $currentDate->month);

    // Create Carbon instance for the requested month
    $currentDate = Carbon::createFromDate($year, $month, 1);

    // Calculate previous and next months
    $prevMonth = $currentDate->copy()->subMonth()->month;
    $prevYear = $currentDate->copy()->subMonth()->year;
    $nextMonth = $currentDate->copy()->addMonth()->month;
    $nextYear = $currentDate->copy()->addMonth()->year;

    $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    $startOfMonth = $currentDate->copy()->startOfMonth()->startOfWeek();
    $endOfMonth = $currentDate->copy()->endOfMonth()->endOfWeek();
    $weeks = [];

    for ($date = $startOfMonth->copy(); $date->lessThanOrEqualTo($endOfMonth); $date->addWeek()) {
        $week = [];
        for ($day = 0; $day < 7; $day++) {
            $week[] = $date->copy()->addDays($day);
        }
        $weeks[] = $week;
    }

    $meetups = Auth::user()->meetups;
    return view('meetups.index', compact('meetups', 'days', 'weeks', 'currentDate', 'prevYear', 'prevMonth', 'nextYear', 'nextMonth'));
}


    public function create()
    {
        $meetup = null;
        return view('meetups.create', compact('meetup'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'end_time' => 'required|date|after_or_equal:date',
            'location' => 'required',
            'type' => 'required',
        ]);

        Auth::user()->meetups()->create($request->all());

        return redirect()->route('meetups.index')->with('success', 'Meetup created successfully.');
    }

    public function show(Meetup $meetup)
    {
        return view('meetups.show', compact('meetup'));
    }

    public function edit(Meetup $meetup)
    {
        return view('meetups.edit', compact('meetup'));
    }

    public function update(Request $request, Meetup $meetup)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'end_time' => 'required|date|after_or_equal:date',
            'location' => 'required',
            'type' => 'required',
        ]);

        $meetup->update($request->all());

        return redirect()->route('meetups.index')->with('success', 'Meetup updated successfully.');
    }

    public function destroy(Meetup $meetup)
    {
        $meetup->delete();

        return redirect()->route('meetups.index')->with('success', 'Meetup deleted successfully.');
    }

    public function events()
    {
        $meetups = Auth::user()->meetups;
        $events = $meetups->map(function ($meetup) {
            return [
                'title' => $meetup->name,
                'start' => $meetup->date,
                'end' => $meetup->end_time,
                'description' => $meetup->type,
            ];
        });

        return response()->json($events);
    }
}
