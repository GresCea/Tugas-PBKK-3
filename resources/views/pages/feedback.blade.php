@extends('layouts.app')

@section('title', 'Umpan Balik | Mahasiswa ITS')

@section('content')
<section class="page-card feedback-card">
    <a class="back-link" href="{{ route('home') }}">← Kembali ke beranda</a>
    <span class="eyebrow">UMPAN BALIK</span>

    <h1>Sampaikan Masukan untuk Kampus</h1>

    <p class="feedback-intro">
        Masukan Anda membantu meningkatkan pengalaman akademik dan kegiatan mahasiswa.
    </p>

    <form class="feedback-form" method="POST" action="{{ route('feedback.store') }}">
        @csrf

        <div class="form-field">
            <label for="student_name">Nama Mahasiswa</label>

            <input
                id="student_name"
                name="student_name"
                type="text"
                value="{{ old('student_name') }}"
                minlength="3"
                required
            >

            @error('student_name')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-field">
            <label for="email">Email ITS</label>

            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email') }}"
                placeholder="nama@student.its.ac.id"
                required
            >

            @error('email')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-field">
            <label for="category">Kategori Masukan</label>

            <select id="category" name="category" required>
                <option value="">Pilih kategori</option>

                @foreach (['Akademik', 'Sarana Prasarana', 'Kegiatan Mahasiswa'] as $category)
                    <option
                        value="{{ $category }}"
                        @selected(old('category') === $category)
                    >
                        {{ $category }}
                    </option>
                @endforeach
            </select>

            @error('category')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-field">
            <label for="message">Isi Pesan</label>

            <textarea
                id="message"
                name="message"
                minlength="15"
                required
            >{{ old('message') }}</textarea>

            @error('message')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-field captcha-field">
            <label for="captcha">
                Verifikasi: {{ $captchaQuestion }}
            </label>

            <input
                id="captcha"
                name="captcha"
                type="number"
                inputmode="numeric"
                required
            >

            @error('captcha')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">
            Kirim Masukan
        </button>
    </form>
</section>


@endsection