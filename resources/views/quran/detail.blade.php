<!-- resources/views/user/quran/detail.blade.php -->
@extends('layouts.user')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center mb-4">{{ $surah['nama_latin'] }} ({{ $surah['nama'] }})</h1>
    <div class="text-center text-sm text-gray-500 mb-6">
        Jumlah Ayat: {{ $surah['jumlah_ayat'] }} | Tempat Turun: {{ $surah['tempat_turun'] }}
    </div>

    <!-- <div class="mb-6">
    <a href="{{ route('user.quran.index') }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
        ← Kembali ke Daftar Surah
    </a>
</div> -->


    @if(isset($surah['audio']))
    <audio controls class="w-full mb-6">
        <source src="{{ $surah['audio'] }}" type="audio/mpeg">
        Browser tidak mendukung pemutar audio.
    </audio>
    @endif

    @foreach ($surah['ayat'] as $ayat)
    <div class="bg-white shadow rounded-lg p-4 mb-4">
        <div class="text-sm font-semibold mb-1">Ayat {{ $ayat['nomor'] }}</div>
        <div class="text-right font-arabic text-2xl mb-2">{{ $ayat['ar'] }}</div>
        <div class="text-sm italic text-gray-600">{{ $ayat['idn'] }}</div>
    </div>
    @endforeach

    <div class="flex justify-between items-center mt-10">
        @php
            $current = $surah['nomor'];
            $prev = $current > 1 ? $current - 1 : null;
            $next = $current < 114 ? $current + 1 : null;
            $getSurahName = function($nomor) use ($allSurah) {
                foreach ($allSurah as $s) {
                    if ($s['nomor'] == $nomor) return $s['nama_latin'];
                }
                return null;
            };
        @endphp

        @if($prev)
        <a href="{{ route('user.quran.show', $prev) }}" class="text-indigo-600 hover:underline">&larr; {{ $getSurahName($prev) }}</a>
        @else
        <span></span>
        @endif

        @if($next)
        <a href="{{ route('user.quran.show', $next) }}" class="text-indigo-600 hover:underline">{{ $getSurahName($next) }} &rarr;</a>
        @endif
    </div>
</div>
@endsection
