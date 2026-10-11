<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\ContactMessage;
use App\Models\PrayerRequest;
use App\Models\Program;
use App\Models\Teaching;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $stats = [
            'total_teachings' => Teaching::count(),
            'published_teachings' => Teaching::where('status', 'published')->count(),
            'upcoming_programs' => Program::where('event_date', '>=', now()->toDateString())->count(),
            'announcements' => Announcement::count(),
            'new_prayer_requests' => PrayerRequest::where('status', 'new')->count(),
            'new_contact_messages' => ContactMessage::where('status', 'new')->count(),
        ];

        return view('dashboard.index', [
            'user' => $request->user(),
            'stats' => $stats,
        ]);
    }
}