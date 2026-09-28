<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class PageController extends Controller
{
    private const STUDENT = [
        'nama' => 'Joaquin Fairuz Nawfal Ismono',
        'nrp' => '5025241106',
        'programStudi' => 'Teknik Informatika',
        'fakultas' => 'Fakultas Teknologi Elektro dan Informatika Cerdas (FT-EIC)',
        'email' => 'joaquinnawfal@gmail.com',
        'kampus' => 'Institut Teknologi Sepuluh Nopember (ITS)',
    ];

    public function home(Request $request): View
    {
        $user = trim((string) $request->query('user', ''));

        return view('pages.home', [
            'student' => self::STUDENT,
            'user' => $user !== '' ? $user : self::STUDENT['nama'],
            'captchaQuestion' => session('feedback_captcha_question'),
        ]);
    }

    public function profile(): View
    {
        return view('pages.profile', ['student' => self::STUDENT]);
    }

    public function agent(Request $request): View
    {
        $isDark = $request->query('mode') === 'dark';

        return view('pages.agent', ['isDark' => $isDark]);
    }

    public function feedbackForm(): View
    {
        $firstNumber = random_int(1, 9);
        $secondNumber = random_int(1, 9);

        session([
            'feedback_captcha_question' => "Berapakah {$firstNumber} + {$secondNumber}?",
            'feedback_captcha_answer' => $firstNumber + $secondNumber,
        ]);

        return view('pages.feedback', [
            'captchaQuestion' => session('feedback_captcha_question'),
        ]);
    }

    public function feedback(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'student_name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'regex:/@student\.its\.ac\.id$/i'],
            'category' => ['required', 'in:Akademik,Sarana Prasarana,Kegiatan Mahasiswa'],
            'message' => ['required', 'string', 'min:15'],
            'captcha' => [
                'required',
                function (string $attribute, mixed $value, \Closure $fail): void {
                    if ((int) $value !== (int) session('feedback_captcha_answer')) {
                        $fail('Jawaban verifikasi matematika belum benar.');
                    }
                },
            ],
        ], [
            'student_name.required' => 'Nama mahasiswa wajib diisi.',
            'student_name.min' => 'Nama mahasiswa minimal terdiri dari 3 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Masukkan alamat email yang valid.',
            'email.regex' => 'Email harus menggunakan alamat @student.its.ac.id.',
            'category.required' => 'Kategori masukan wajib dipilih.',
            'category.in' => 'Pilih kategori masukan yang tersedia.',
            'message.required' => 'Isi pesan wajib diisi.',
            'message.min' => 'Isi pesan minimal terdiri dari 15 karakter.',
            'captcha.required' => 'Jawaban verifikasi wajib diisi.',
        ]);

        session()->forget(['feedback_captcha_question', 'feedback_captcha_answer']);

        return redirect()->route('feedback.success')->with('feedback_name', $data['student_name']);
    }

    public function feedbackSuccess(): View
    {
        return view('pages.feedback-success', [
            'studentName' => session('feedback_name', 'Mahasiswa'),
        ]);
    }

    public function fallback(): View|Response
    {
        return response()->view('pages.404', [], 404);
    }

    public function legacyProfile(string $nrp): View|Response
    {
        if ($nrp !== self::STUDENT['nrp']) {
            return response()->view('pages.404', [], 404);
        }

        return $this->profile();
    }

    public function gpaCalculator(Request $request): View
    {
        if (!$request->has(['ip1', 'ip2'])) {
            return view('pages.gpa');
        }

        $data = $request->validate([
            'ip1' => ['required', 'numeric', 'between:0,4'],
            'ip2' => ['required', 'numeric', 'between:0,4'],
        ]);

        $ip1 = (float) $data['ip1'];
        $ip2 = (float) $data['ip2'];
        $total = $ip1 + $ip2;
        $average = $total / 2;

        return view('pages.gpa', compact('ip1', 'ip2', 'total', 'average'));
    }
}