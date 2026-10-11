<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $latestMessage = [
            'title' => 'Walking in the Word',
            'description' => '[Sample description — replace with the real sermon summary]',
            'speaker' => null,
            'date' => null,
            'category' => 'Sunday Service',
            'image' => null,
            'video_url' => null,
            'audio_url' => null,
        ];

        $palaceGuard = [
            'title' => 'Armor of the Word',
            'description' => null,
            'category' => 'Discipleship Teaching',
            'date' => null,
        ];

        $programs = [
            [
                'title' => 'Prayer & Impartation Night',
                'description' => '[Sample program description — replace with real event details]',
                'date' => '[Date]',
                'time' => '[Time]',
                'location' => '[Location]',
            ],
            [
                'title' => 'Sunday Worship Service',
                'description' => '[Sample program description — replace with real event details]',
                'date' => '[Date]',
                'time' => '[Time]',
                'location' => '[Location]',
            ],
            [
                'title' => 'Bible Study Fellowship',
                'description' => '[Sample program description — replace with real event details]',
                'date' => '[Date]',
                'time' => '[Time]',
                'location' => '[Location]',
            ],
        ];

        $news = [
            [
                'title' => '[Sample Announcement Title]',
                'excerpt' => '[Sample announcement summary — replace with real church news]',
                'category' => 'Announcement',
                'date' => '[Date]',
            ],
            [
                'title' => '[Sample Announcement Title]',
                'excerpt' => '[Sample announcement summary — replace with real church news]',
                'category' => 'Announcement',
                'date' => '[Date]',
            ],
            [
                'title' => '[Sample Announcement Title]',
                'excerpt' => '[Sample announcement summary — replace with real church news]',
                'category' => 'Announcement',
                'date' => '[Date]',
            ],
        ];

        $scripture = [
            'text' => 'He that dwelleth in the secret place of the most High shall abide under the shadow of the Almighty.',
            'reference' => 'Psalm 91:1 (KJV)',
        ];

        return view('home', compact('latestMessage', 'palaceGuard', 'programs', 'news', 'scripture'));
    }
}