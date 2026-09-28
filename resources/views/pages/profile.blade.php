@extends('layouts.app')

@section('title', 'Profil Mahasiswa | ITS')

@section('content')
    <section class="page-card">
        <a class="back-link" href="{{ route('home') }}">← Kembali ke beranda</a>
        <span class="eyebrow">PROFIL MAHASISWA</span>
        <h1>{{ $student['nama'] }}</h1>
        <p class="lead">Informasi akademik dan kontak mahasiswa.</p>

        <div class="profile-grid">
            <x-info-card label="NRP" :value="$student['nrp']" />
            <x-info-card label="Program studi" :value="$student['programStudi']" />
            <x-info-card label="Fakultas" :value="$student['fakultas']" />
            <x-info-card label="Kampus" :value="$student['kampus']" />
            <x-info-card label="Email" :value="$student['email']" />
        </div>
    </section>
@endsection