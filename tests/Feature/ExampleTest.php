<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_profile_route_accepts_only_the_registered_nrp(): void
    {
        $this->get('/dashboard/mahasiswa/5025241106')->assertOk();
        $this->get('/dashboard/mahasiswa/502524110')->assertNotFound();
        $this->get('/dashboard/mahasiswa/5025241107')
            ->assertNotFound()
            ->assertSee('Halaman tidak ditemukan.');
    }

    public function test_gpa_calculator_returns_total_and_average(): void
    {
        $this->get('/dashboard/hitung-ipk?ip1=3.50&ip2=3.75')
            ->assertOk()
            ->assertSee('7.25')
            ->assertSee('3.63');
    }

    public function test_gpa_calculator_page_can_open_without_inputs(): void
    {
        $this->get('/dashboard/hitung-ipk')
            ->assertOk()
            ->assertSee('IP Semester 1')
            ->assertSee('IP Semester 2');
    }

    public function test_unknown_route_uses_fallback_page(): void
    {
        $this->get('/alamat-tidak-tersedia')
            ->assertNotFound()
            ->assertSee('Halaman tidak ditemukan.');
    }

    public function test_required_pages_use_the_centralized_page_controller_views(): void
    {
        $this->get('/')->assertOk()->assertSee('BERANDA MAHASISWA');
        $this->get('/profil-mahasiswa')->assertOk()->assertSee('PROFIL MAHASISWA');
        $this->get('/ide-agent')->assertOk()->assertSee('IDE-RISET');
    }

    public function test_home_greeting_and_agent_theme_are_query_driven(): void
    {
        $this->get('/beranda?user=Joaquin')
            ->assertOk()
            ->assertSee('Selamat datang, Joaquin.');
        $this->get('/ide-agent?mode=dark')
            ->assertOk()
            ->assertSee('theme-toggle')
            ->assertSee('Hitung-IPK')
            ->assertDontSee('Mode gelap aktif untuk ruang riset.');
        $this->get('/hitung-ipk')
            ->assertOk()
            ->assertSee('Kalkulator IPK');
    }
}
