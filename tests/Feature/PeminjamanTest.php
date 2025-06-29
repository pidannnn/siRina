<?php

namespace Tests\Feature;

use App\Models\Peminjaman;
use App\Models\Ruangan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PeminjamanTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_double_booking_ditolak()
    {
        $ruangan = Ruangan::factory()->create();
        Peminjaman::factory()->create([
            'ruangan_id' => $ruangan->id,
            'status' => 'disetujui',
            'start_time' => now()->addDay(),
            'end_time' => now()->addDays(2)
        ]);

        $response = $this->post('/peminjaman', [
            'ruangan_id' => $ruangan->id,
            'start_time' => now()->addDay(),
            'end_time' => now()->addDays(1)
        ]);

        $response->assertSessionHasErrors();
    }
}