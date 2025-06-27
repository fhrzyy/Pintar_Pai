@extends('layouts.user')

@section('content')
<div class="relative max-w-3xl mx-auto px-4 py-8">

    {{-- 🔙 Tombol Kembali --}}
    <a href="{{ route('user.quran.index') }}" class="absolute -top-4 left-0 bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700 transition">
        ← Kembali
    </a>

    {{-- 🏷️ Judul Surah --}}
    <div class="text-center mb-6 mt-8">
        <h1 class="text-2xl font-semibold mb-2">{{ $surah['nama_latin'] }} ({{ $surah['nama'] }})</h1>
        <p class="text-gray-600">Jumlah Ayat: {{ $surah['jumlah_ayat'] }} | Tempat Turun: {{ $surah['tempat_turun'] }}</p>
    </div>

    {{-- 🎧 Audio --}}
    <div class="mb-6">
        <audio controls class="w-full">
            <source src="{{ $surah['audio'] }}" type="audio/mpeg">
            Browser tidak mendukung pemutar audio.
        </audio>
    </div>

    {{-- 🔀 Navigasi Prev/Next --}}
    <div class="mb-6 text-center">
        @php
            $current = $surah['nomor'];
            $prev = $current > 1 ? $current - 1 : null;
            $next = $current < 114 ? $current + 1 : null;
            $getSurahName = fn($nomor) => collect($allSurah)->firstWhere('nomor', $nomor)['nama_latin'] ?? null;
        @endphp

        @if($prev)
            <a href="{{ route('user.quran.show', $prev) }}" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded mr-4">
                ← {{ $getSurahName($prev) }}
            </a>
        @endif
        @if($next)
            <a href="{{ route('user.quran.show', $next) }}" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded">
                {{ $getSurahName($next) }} →
            </a>
        @endif
    </div>

    {{-- 📖 Ayat-Ayat --}}
    @foreach ($surah['ayat'] as $ayat)
        <div class="bg-white p-4 rounded shadow mb-4">
            <div class="text-sm text-gray-600 mb-1">Ayat {{ $ayat['nomor'] }}</div>
            <div class="text-2xl text-right font-arabic leading-relaxed">{{ $ayat['ar'] }}</div>
            <div class="text-sm italic text-gray-500 mt-2">{{ $ayat['idn'] }}</div>
        </div>
    @endforeach

</div>
@endsection
