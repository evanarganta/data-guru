@extends('layouts.app')

@section('title', 'Daftar Guru')

@section('content')
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-xl font-semibold tracking-tight text-white">
            Daftar Guru
            <span class="ml-2 text-xs font-normal text-zinc-500">({{ $gurus->count() }})</span>
        </h1>

        <div class="flex items-center gap-2">
            <form action="{{ route('guru.index') }}" method="GET" class="relative">
                <svg class="pointer-events-none absolute left-3 top-1/2 size-3.5 -translate-y-1/2 stroke-2 text-zinc-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                <input type="search" name="search" value="{{ $search }}" placeholder="Cari guru..." class="w-full rounded-lg border border-zinc-800 bg-zinc-900/90 py-1.5 pl-8 pr-7 text-xs text-zinc-100 placeholder:text-zinc-500 focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 transition sm:w-56">
                @if ($search)
                    <a href="{{ route('guru.index') }}" class="absolute right-2 top-1/2 -translate-y-1/2 text-xs text-zinc-500 hover:text-zinc-300" title="Hapus pencarian">✕</a>
                @endif
            </form>

            <a href="{{ route('guru.create') }}" class="inline-flex shrink-0 items-center gap-1.5 rounded-lg bg-white px-3 py-1.5 text-xs font-semibold text-zinc-950 transition hover:bg-zinc-200 active:scale-[0.98]">
                <svg class="size-3.5 stroke-2" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M12 5v14M5 12h14"/></svg>
                Tambah Guru
            </a>
        </div>
    </div>

    @if ($gurus->isEmpty())
        <section class="rounded-xl border border-dashed border-zinc-800 bg-zinc-900/30 px-6 py-12 text-center">
            @if ($search)
                <p class="text-sm text-zinc-300">Tidak ada hasil untuk "<span class="font-medium text-white">{{ $search }}</span>"</p>
                <div class="mt-4">
                    <a href="{{ route('guru.index') }}" class="inline-flex items-center rounded-lg border border-zinc-800 bg-zinc-900 px-3 py-1.5 text-xs font-medium text-zinc-400 hover:bg-zinc-800 hover:text-white transition">
                        Reset pencarian
                    </a>
                </div>
            @else
                <p class="text-sm text-zinc-400">Belum ada data guru.</p>
                <div class="mt-4">
                    <a href="{{ route('guru.create') }}" class="inline-flex items-center gap-1.5 rounded-lg bg-white px-3 py-1.5 text-xs font-semibold text-zinc-950 transition hover:bg-zinc-200 active:scale-[0.98]">
                        <svg class="size-3.5 stroke-2" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M12 5v14M5 12h14"/></svg>
                        Tambah data
                    </a>
                </div>
            @endif
        </section>
    @else
        <section class="overflow-hidden rounded-xl border border-zinc-800 bg-zinc-900/40">
            <div class="overflow-x-auto">
                <table class="w-full min-w-140 text-left text-sm">
                    <thead class="border-b border-zinc-800 bg-zinc-900/80 text-[11px] font-semibold uppercase tracking-wider text-zinc-500">
                        <tr>
                            <th scope="col" class="px-4 py-3">Nama</th>
                            <th scope="col" class="px-4 py-3">NIP</th>
                            <th scope="col" class="px-4 py-3">Mata Pelajaran</th>
                            <th scope="col" class="px-4 py-3">Email</th>
                            <th scope="col" class="px-4 py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800/60">
                        @foreach ($gurus as $guru)
                            <tr class="transition hover:bg-zinc-800/30">
                                <td class="px-4 py-3.5 font-medium text-zinc-200">
                                    {{ $guru->nama }}
                                </td>
                                <td class="px-4 py-3.5 font-mono text-xs text-zinc-400">
                                    {{ $guru->nip }}
                                </td>
                                <td class="px-4 py-3.5 text-xs text-zinc-300">
                                    {{ $guru->mapel }}
                                </td>
                                <td class="px-4 py-3.5 text-xs text-zinc-500">
                                    {{ $guru->email ?: '—' }}
                                </td>
                                <td class="px-4 py-3.5 text-right">
                                    <div class="flex items-center justify-end gap-1">
                                        <a href="{{ route('guru.show', $guru) }}" class="rounded px-2 py-1 text-xs text-zinc-400 hover:bg-zinc-800 hover:text-white transition">
                                            Detail
                                        </a>
                                        <a href="{{ route('guru.edit', $guru) }}" class="rounded px-2 py-1 text-xs text-zinc-400 hover:bg-zinc-800 hover:text-white transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('guru.destroy', $guru) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Hapus data guru ini?')" class="rounded px-2 py-1 text-xs text-red-400/80 hover:bg-red-950/40 hover:text-red-300 transition">
                                                Hapus<span class="sr-only"> {{ $guru->nama }}</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    @endif
@endsection