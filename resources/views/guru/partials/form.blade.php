@csrf
<div class="space-y-4">
    <div>
        <label for="nama" class="mb-1 block text-xs font-medium text-zinc-400">Nama</label>
        <input id="nama" name="nama" type="text" value="{{ old('nama', $guru->nama ?? '') }}" required autocomplete="name" class="w-full rounded-lg border border-zinc-800 bg-zinc-900/90 px-3 py-2 text-sm text-zinc-100 placeholder:text-zinc-600 focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 transition @error('nama') border-red-500 @enderror">
        @error('nama')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="nip" class="mb-1 block text-xs font-medium text-zinc-400">NIP</label>
        <input id="nip" name="nip" type="text" value="{{ old('nip', $guru->nip ?? '') }}" required class="w-full rounded-lg border border-zinc-800 bg-zinc-900/90 px-3 py-2 font-mono text-sm text-zinc-100 placeholder:text-zinc-600 focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 transition @error('nip') border-red-500 @enderror">
        @error('nip')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="mapel" class="mb-1 block text-xs font-medium text-zinc-400">Mata Pelajaran</label>
        <input id="mapel" name="mapel" type="text" value="{{ old('mapel', $guru->mapel ?? '') }}" required class="w-full rounded-lg border border-zinc-800 bg-zinc-900/90 px-3 py-2 text-sm text-zinc-100 placeholder:text-zinc-600 focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 transition @error('mapel') border-red-500 @enderror">
        @error('mapel')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="email" class="mb-1 block text-xs font-medium text-zinc-400">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email', $guru->email ?? '') }}" autocomplete="email" class="w-full rounded-lg border border-zinc-800 bg-zinc-900/90 px-3 py-2 text-sm text-zinc-100 placeholder:text-zinc-600 focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 transition @error('email') border-red-500 @enderror">
        @error('email')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6 flex items-center gap-2 border-t border-zinc-800 pt-4">
    <button type="submit" class="inline-flex items-center rounded-lg bg-white px-3.5 py-1.5 text-xs font-semibold text-zinc-950 transition hover:bg-zinc-200 active:scale-[0.98]">
        {{ $submitLabel }}
    </button>
    <a href="{{ route('guru.index') }}" class="rounded-lg px-3 py-1.5 text-xs text-zinc-400 transition hover:text-zinc-200">
        Batal
    </a>
</div>