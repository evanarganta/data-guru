@extends('layouts.app')

@section('title', $guru->nama)

@section('content')
    <div class="mx-auto max-w-xl">
        <a href="{{ route('guru.index') }}" class="mb-4 inline-flex items-center gap-1.5 text-xs text-zinc-500 transition hover:text-zinc-300">
            <svg class="size-3.5 stroke-2" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="m15 18-6-6 6-6"/></svg>
            Kembali
        </a>

        <div class="rounded-xl border border-zinc-800 bg-zinc-900/40 p-6">
            <div class="flex items-start justify-between gap-4 border-b border-zinc-800 pb-5">
                <div>
                    <h1 class="text-xl font-semibold text-white">{{ $guru->nama }}</h1>
                    <p class="mt-1 text-xs text-zinc-400">{{ $guru->mapel }}</p>
                </div>
            </div>

            <dl class="grid gap-4 py-5 sm:grid-cols-2">
                <div>
                    <dt class="text-[11px] font-medium uppercase tracking-wider text-zinc-500">NIP</dt>
                    <dd class="mt-1 font-mono text-sm text-zinc-200">{{ $guru->nip }}</dd>
                </div>
                <div>
                    <dt class="text-[11px] font-medium uppercase tracking-wider text-zinc-500">Email</dt>
                    <dd class="mt-1 text-sm text-zinc-200">{{ $guru->email ?: '—' }}</dd>
                </div>
            </dl>

            <div class="flex items-center gap-2 border-t border-zinc-800 pt-4">
                <a href="{{ route('guru.edit', $guru) }}" class="inline-flex items-center rounded-lg bg-white px-3.5 py-1.5 text-xs font-semibold text-zinc-950 transition hover:bg-zinc-200 active:scale-[0.98]">
                    Edit
                </a>
                <form action="{{ route('guru.destroy', $guru) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus data guru ini?')" class="rounded-lg border border-red-900/40 bg-red-950/20 px-3.5 py-1.5 text-xs font-medium text-red-400 transition hover:bg-red-950/60 hover:text-red-300">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection