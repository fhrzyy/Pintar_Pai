<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class QuranController extends Controller
{
    public function index()
    {
        $surah = Http::get('https://equran.id/api/surat')->json();
        return view('quran.index', compact('surah'));
    }

    public function show($id)
    {
        $surah = Http::get("https://equran.id/api/surat/{$id}")->json();
        $allSurah = Http::get('https://equran.id/api/surat')->json();
        return view('quran.show', compact('surah', 'allSurah'));
    }
}

