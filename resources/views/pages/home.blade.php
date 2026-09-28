@extends('layouts.app')

@section('title', 'Beranda | Profil Mahasiswa ITS')

@section('content')
    <section class="page-card home-card">
        <span class="eyebrow">BERANDA MAHASISWA</span>
        <h1>Selamat datang, {{ $user }}.</h1>
        <p class="lead">Ruang singkat untuk mengenal profil mahasiswa dan gagasan riset Agentic AI.</p>

        <x-status-banner message="Selamat datang di halaman profil mahasiswa ITS." />

        <div class="profile-highlight">
            <x-info-card label="Nama" :value="$student['nama']" />
            <x-info-card label="NRP" :value="$student['nrp']" />
            <x-info-card label="Program studi" :value="$student['programStudi']" />
        </div>

        <nav class="link-grid" aria-label="Navigasi halaman">
            <a class="action-link" href="{{ route('profile') }}">Lihat profil lengkap <span>→</span></a>
            <a class="action-link" href="{{ route('agent') }}">Jelajahi ide riset <span>→</span></a>
            <a class="action-link" href="{{ route('gpa') }}">Hitung rata-rata IP <span>→</span></a>
        </nav>
    </section>
@endsection