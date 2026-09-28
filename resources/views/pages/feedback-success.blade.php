@extends('layouts.app')

@section('title', 'Masukan Terkirim | ITS')

@section('content')
    <section class="page-card success-card">
        <span class="eyebrow">MASUKAN TERKIRIM</span>
        <h1>Terima kasih, {{ $studentName }}.</h1>
        <x-status-banner message="Masukan Anda sudah berhasil diterima." />
        <p class="lead">Tim mahasiswa ITS akan meninjau masukan yang Anda kirimkan.</p>
        <a class="action-link" href="{{ route('home') }}">Kembali ke beranda <span>→</span></a>
    </section>
@endsection