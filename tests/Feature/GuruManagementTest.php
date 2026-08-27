<?php

namespace Tests\Feature;

use App\Models\Guru;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GuruManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_displays_registered_teachers(): void
    {
        $guru = Guru::factory()->create(['nama' => 'Andi Pratama']);

        $this->get('/guru')
            ->assertOk()
            ->assertViewIs('guru.index')
            ->assertSee('Andi Pratama')
            ->assertSee($guru->nip);
    }

    public function test_store_creates_teacher_then_redirects_with_flash_message(): void
    {
        $response = $this->post('/guru', [
            'nama' => 'Budi Santoso',
            'nip' => '1987654321',
            'mapel' => 'Pemrograman',
            'email' => 'budi@example.test',
        ]);

        $response->assertRedirectToRoute('guru.index')
            ->assertSessionHas('success', 'Data guru Budi Santoso berhasil disimpan.');

        $this->assertDatabaseHas('gurus', [
            'nama' => 'Budi Santoso',
            'nip' => '1987654321',
            'mapel' => 'Pemrograman',
        ]);
    }

    public function test_store_redirects_back_with_errors_when_input_is_invalid(): void
    {
        $this->from('/guru/create')
            ->post('/guru', [])
            ->assertRedirect('/guru/create')
            ->assertInvalid(['nama', 'nip', 'mapel']);
    }

    public function test_show_and_edit_display_a_teacher_profile(): void
    {
        $guru = Guru::factory()->create(['nama' => 'Citra Lestari']);

        $this->get(route('guru.show', $guru))
            ->assertOk()
            ->assertViewIs('guru.show')
            ->assertSee('Citra Lestari');

        $this->get(route('guru.edit', $guru))
            ->assertOk()
            ->assertViewIs('guru.edit')
            ->assertSee('Edit Citra Lestari');
    }

    public function test_update_persists_teacher_changes_and_redirects(): void
    {
        $guru = Guru::factory()->create();

        $this->put(route('guru.update', $guru), [
            'nama' => 'Dewi Kurnia',
            'nip' => $guru->nip,
            'mapel' => 'Matematika',
            'email' => 'dewi@example.test',
        ])->assertRedirectToRoute('guru.index')
            ->assertSessionHas('success', 'Data guru Dewi Kurnia berhasil diperbarui.');

        $this->assertDatabaseHas('gurus', [
            'id' => $guru->id,
            'nama' => 'Dewi Kurnia',
            'mapel' => 'Matematika',
        ]);
    }

    public function test_destroy_removes_teacher_and_redirects_with_flash_message(): void
    {
        $guru = Guru::factory()->create(['nama' => 'Eka Putri']);

        $this->delete(route('guru.destroy', $guru))
            ->assertRedirectToRoute('guru.index')
            ->assertSessionHas('success', 'Data guru Eka Putri berhasil dihapus.');

        $this->assertModelMissing($guru);
    }

    public function test_api_returns_registered_teachers_as_json(): void
    {
        $guru = Guru::factory()->create(['nama' => 'Fajar Nugroho']);

        $this->getJson('/api/guru')
            ->assertOk()
            ->assertJsonPath('status', true)
            ->assertJsonPath('message', 'Berhasil')
            ->assertJsonPath('data.0.id', $guru->id)
            ->assertJsonPath('data.0.nama', 'Fajar Nugroho');
    }
}
