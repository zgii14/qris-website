@extends('layouts.app')

@section('title', 'Peta Stage & Level – QRIS Journey')

@section('hero')
    {{-- <section class="hero" style="height: 50vh;">
        <div class="hero-content">
            <h1>Petualangan QRIS</h1>
            <p>
                Jelajahi papan permainan, kumpulkan koin, lalu naik level untuk menaklukkan
                semua tantangan QRIS.
            </p>

            <div class="hero-stats">
                <div class="stat">
                    <span class="stat-number">{{ $coins ?? 0 }}</span>
                    <span class="stat-label">Koin Kamu</span>
                </div>
                <div class="stat">
                    <span class="stat-number">5</span>
                    <span class="stat-label">Total Level</span>
                </div>
            </div>
        </div>
    </section> --}}
@endsection

@section('content')
    @php
        // contoh progress (nanti bisa diganti dari database / session)
        $currentLevel = $currentLevel ?? 1;   // level yang sedang aktif
        $maxUnlocked  = $maxUnlocked  ?? 2;  // level tertinggi yang sudah kebuka

        // deskripsi tiap level (sesuai PDF)
        $levels = [
            1 => [
                'title' => 'Dasar QRIS',
                'type'  => 'Pilihan ganda',
                'points' => '100 / 50 poin',
            ],
            2 => [
                'title' => 'Benar atau Salah',
                'type'  => '3 pernyataan B/S',
                'points' => '120 / 60 poin',
            ],
            3 => [
                'title' => 'Urutan Langkah',
                'type'  => 'Drag & drop QRIS',
                'points' => '150 / 75 poin',
            ],
            4 => [
                'title' => 'QR Asli vs Palsu',
                'type'  => 'Identifikasi gambar',
                'points' => '180 / 90 poin',
            ],
            5 => [
                'title' => 'Studi Kasus QRIS',
                'type'  => 'Pilih solusi terbaik',
                'points' => '200 / 100 poin',
            ],
        ];
    @endphp

    <section class="section">
        <h2 class="animate-on-scroll">Papan Petualangan QRIS</h2>

        <div class="board-wrapper">
            {{-- papan ular-tangga --}}
            <div class="game-board">
                @foreach ($levels as $levelNumber => $info)
                    @php
                        $isUnlocked = $levelNumber <= $maxUnlocked;
                        $isCurrent  = $levelNumber === $currentLevel;
                    @endphp

                    <button
                        type="button"
                        class="board-cell
                            {{ $isUnlocked ? 'cell-unlocked' : 'cell-locked' }}
                            {{ $isCurrent ? 'cell-current' : '' }}"
                        @if($isUnlocked)
                            onclick="window.location='{{ route('game.level.show', ['stage' => 1, 'level' => $levelNumber]) }}'"
                        @endif
                    >
                        {{-- nomor petak --}}
                        <span class="cell-number">{{ $levelNumber }}</span>

                        {{-- token karakter jika ini level aktif --}}
                        @if($isCurrent)
                            <div class="player-token">
                                <span class="player-face">😀</span>
                            </div>
                        @endif

                        <span class="cell-title">{{ $info['title'] }}</span>
                        <span class="cell-type">{{ $info['type'] }}</span>
                        <span class="cell-points">{{ $info['points'] }}</span>

                        @if(!$isUnlocked)
                            <span class="cell-locked-label">Terkunci</span>
                        @endif
                    </button>
                @endforeach

                {{-- garis jalur seperti ular-tangga (hanya dekorasi) --}}
                <div class="board-path"></div>
            </div>

            {{-- legenda / penjelasan singkat --}}
            <div class="board-legend">
                <h3>Cara Main</h3>
                <ul>
                    <li>Ikon 😀 menunjukkan posisi level kamu sekarang.</li>
                    <li>Petak berwarna terang = level sudah terbuka, bisa diklik.</li>
                    <li>Petak abu = level terkunci, butuh koin / syarat tertentu.</li>
                    <li>Poin level mengikuti tabel (poin percobaan 1 & 2) dari desain game.</li>
                </ul>
            </div>
        </div>
    </section>
@endsection
