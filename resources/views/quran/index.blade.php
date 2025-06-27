@extends('layouts.user') 
@section('content')
<h1 class="text-2xl font-semibold mb-4">Daftar Surah</h1>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    @foreach ($surah as $item)
        <a href="{{ route('user.quran.show', $item['nomor']) }}" class="block p-4 bg-white rounded shadow hover:bg-indigo-50">
            <h2 class="text-lg font-bold">{{ $item['nama_latin'] }}</h2>
            <p class="text-sm text-gray-500">({{ $item['nama'] }}) - {{ $item['jumlah_ayat'] }} ayat</p>
        </a>
    @endforeach
</div>
@endsection
