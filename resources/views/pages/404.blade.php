@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan | ITS')

@section('content')
<main class="page-card">
<span class="eyebrow">ERROR 404</span>

    <h1>Halaman tidak ditemukan.</h1>

    <p class="lead">
        Alamat yang Anda buka tidak tersedia atau sudah dipindahkan.
    </p>

    <a class="action-link" href="{{ route('home') }}">
        Kembali ke beranda <span>→</span>
    </a>
</main>


@endsection