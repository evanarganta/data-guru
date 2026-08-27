<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GuruController extends Controller
{
    public function index(): View
    {
        return view('guru.index', [
            'gurus' => Guru::query()->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('guru.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $guru = Guru::create($this->validatedGuru($request));

        return redirect()
            ->route('guru.index')
            ->with('success', "Data guru {$guru->nama} berhasil disimpan.");
    }

    public function show(Guru $guru): View
    {
        return view('guru.show', [
            'guru' => $guru,
        ]);
    }

    public function edit(Guru $guru): View
    {
        return view('guru.edit', [
            'guru' => $guru,
        ]);
    }

    public function update(Request $request, Guru $guru): RedirectResponse
    {
        $guru->update($this->validatedGuru($request, $guru));

        return redirect()
            ->route('guru.index')
            ->with('success', "Data guru {$guru->nama} berhasil diperbarui.");
    }

    public function destroy(Guru $guru): RedirectResponse
    {
        $nama = $guru->nama;
        $guru->delete();

        return redirect()
            ->route('guru.index')
            ->with('success', "Data guru {$nama} berhasil dihapus.");
    }

    public function api(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => 'Berhasil',
            'data' => Guru::query()->latest()->get(),
        ]);
    }

    private function validatedGuru(Request $request, ?Guru $guru = null): array
    {
        return $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:30', 'unique:gurus,nip'.($guru ? ','.$guru->id : '')],
            'mapel' => ['required', 'string', 'max:100'],
            'email' => ['nullable', 'email', 'max:255'],
        ]);
    }
}
