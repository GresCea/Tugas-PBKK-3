<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

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
        ]);
    }

    public function profile(): View
    {
        return view('pages.profile', ['student' => self::STUDENT]);
    }

    public function agent(): View
    {
        return view('pages.agent');
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