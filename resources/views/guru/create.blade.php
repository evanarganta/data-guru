@extends('layouts.app')

@section('title', 'Tambah Guru')

@section('content')
    <div class="mx-auto max-w-xl">
        <a href="{{ route('guru.index') }}" class="mb-4 inline-flex items-center gap-1.5 text-xs text-zinc-500 transition hover:text-zinc-300">
            <svg class="size-3.5 stroke-2" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="m15 18-6-6 6-6"/></svg>
            Kembali
        </a>

        <div class="rounded-xl border border-zinc-800 bg-zinc-900/40 p-6">
            <h1 class="mb-5 border-b border-zinc-800 pb-4 text-base font-semibold text-white">Tambah Guru</h1>

            <form action="{{ route('guru.store') }}" method="POST">
                @include('guru.partials.form', ['submitLabel' => 'Simpan'])
            </form>
        </div>
    </div>
@endsection