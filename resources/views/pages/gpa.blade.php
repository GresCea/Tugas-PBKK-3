@extends('layouts.app')

@section('title', 'Kalkulator IPK | ITS')

@section('content')
<section class="page-card agent-card">
    <a class="back-link" href="{{ route('home') }}">← Kembali ke beranda</a>
    <span class="eyebrow">Hitung-IPK</span>

    <h1>Kalkulator IPK</h1>
    <p class="lead">Rangkuman nilai indeks prestasi dari dua semester.</p>

    <x-status-banner message="Silakan masukkan IP dari semester yang ingin dihitung." />

    <section class="idea-box">
        <span class="eyebrow">INPUT NILAI</span>
        <h2>Hitung Rata-rata IP Semester</h2>

        <form class="gpa-form" method="GET" action="{{ route('gpa') }}">
            <label for="ip1">IP Semester 1</label>
            <input
                type="number"
                id="ip1"
                name="ip1"
                min="0"
                max="4"
                step="0.01"
                value="{{ $ip1 ?? '' }}"
                required
            >

            <label for="ip2">IP Semester 2</label>
            <input
                type="number"
                id="ip2"
                name="ip2"
                min="0"
                max="4"
                step="0.01"
                value="{{ $ip2 ?? '' }}"
                required
            >

            <button type="submit">Hitung IP</button>
        </form>
    </section>

    @isset($total)
        <section class="idea-box">
            <span class="eyebrow">HASIL PERHITUNGAN</span>
            <h2>Rangkuman IP</h2>

            <dl class="detail-list">
                <div>
                    <dt>Total IP</dt>
                    <dd>{{ number_format($total, 2) }}</dd>
                </div>

                <div>
                    <dt>Rata-rata IP</dt>
                    <dd>
                        <strong>{{ number_format($average, 2) }}</strong>
                    </dd>
                </div>
            </dl>
        </section>
    @endisset
</section>


@endsection