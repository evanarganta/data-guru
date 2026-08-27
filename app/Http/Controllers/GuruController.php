<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GuruController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->query('search');

        $gurus = Guru::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhere('nip', 'like', "%{$search}%")
                        ->orWhere('mapel', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        return view('guru.index', [
            'gurus' => $gurus,
            'search' => $search,
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

    public function api(Request $request): JsonResponse
    {
        $search = $request->query('search');

        $gurus = Guru::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhere('nip', 'like', "%{$search}%")
                        ->orWhere('mapel', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil',
            'data' => $gurus,
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
