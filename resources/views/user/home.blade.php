@extends('layouts.user')

@section('title', 'Home')

@section('content')
    <div class="mb-4">
        <h2 class="text-center">Selamat Datang di Pintar-Pai!</h2>
        <p class="text-center text-muted">Akses materi dan soal untuk belajar dengan mudah.</p>
    </div>

    <div class="row">
        <!-- Card Jumlah Materi -->
        <div class="col-md-6 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-book-fill" style="font-size: 3rem; margin-right: 1rem;"></i>
                    <div>
                        <h5 class="card-title">Jumlah Materi</h5>
                        <h3 class="card-text">{{ $materialCount }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Jumlah Soal -->
        <div class="col-md-6 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-question-circle-fill" style="font-size: 3rem; margin-right: 1rem;"></i>
                    <div>
                        <h5 class="card-title">Jumlah Soal</h5>
                        <h3 class="card-text">{{ $questionCount }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection