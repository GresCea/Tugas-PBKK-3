@extends('layouts.app')

@section('title', 'Ide-Riset Agentic AI | ITS')

@section('content')
    <section class="page-card agent-card">
        <a class="back-link" href="{{ route('home') }}">← Kembali ke beranda</a>
        <span class="eyebrow">IDE-RISET</span>
        <h1>System Log Anomaly Detection Agent</h1>
        <p class="lead">Platform Agentic AI untuk memantau, menganalisis, dan mendeteksi anomali pada system log secara otomatis.</p>

        <section class="idea-box">
            <span class="eyebrow">ALUR KERJA</span>
            <h2>Collect Log → Analyze → Detect Anomaly → Recommend Action</h2>
            <p>Agent menghubungkan event yang berkaitan, menentukan tingkat keparahan, dan menyarankan langkah troubleshooting.</p>
        </section>

        <div class="feature-grid">
            <article><strong>Log Collector</strong><span>Mengambil atau mengimpor log.</span></article>
            <article><strong>Anomaly Detection</strong><span>Menemukan pola log yang tidak normal.</span></article>
            <article><strong>Root Cause Analysis</strong><span>Memperkirakan penyebab utama anomali.</span></article>
            <article><strong>Recommendation Agent</strong><span>Memberikan langkah troubleshooting.</span></article>
        </div>
    </section>
@endsection