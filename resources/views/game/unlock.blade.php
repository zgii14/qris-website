@extends('layouts.app')

@section('title', 'Konfirmasi Pembayaran QRIS – QRIS Journey')

@section('content')
    <section class="section qr-payment-section">
        <h2 class="animate-on-scroll" style="text-align:center;">
            Konfirmasi Pembayaran QRIS
        </h2>

        <p style="text-align:center; color: var(--gray); margin-bottom: 1.5rem;">
            Kamu akan membuka
            <strong>Stage {{ $toStage }} – Level {{ $toLevel }}</strong><br>
            Biaya pembukaan: <strong>{{ $cost }} koin</strong><br>
            Koin kamu sekarang: <strong>{{ $coins }} koin</strong>
        </p>

        @if (session('status_msg'))
            <div class="alert alert-{{ session('status_type', 'info') }}"
                 style="max-width: 640px; margin: 0 auto 1.5rem;">
                {{ session('status_msg') }}
            </div>
        @endif

        <div class="qr-payment-wrapper">
            <div class="qr-card">
                <div class="qr-card-header">
                    <span class="qr-badge">QRIS Journey</span>
                    <span class="qr-amount">{{ $cost }} Koin</span>
                </div>

                <div class="qr-code">
                    {{-- kotak-kotak dekorasi ala QR --}}
                    <div class="qr-corner qr-corner-1"></div>
                    <div class="qr-corner qr-corner-2"></div>
                    <div class="qr-corner qr-corner-3"></div>

                    <div class="qr-pixels"></div>

                    {{-- garis scan animasi --}}
                    <div class="qr-scan-line"></div>
                </div>

                <p class="qr-instruction">
                    Arahkan “kamera” koin kamu ke QRIS ini.<br>
                    Saat garis biru selesai memindai, tekan tombol
                    <strong>Bayar &amp; Buka Level</strong>.
                </p>

                <form action="{{ route('game.unlock.process', [$fromStage, $fromLevel, $toStage, $toLevel]) }}"
                      method="POST">
                    @csrf
                    <button type="submit" class="submit-btn" style="width:100%; margin-top:0.5rem;">
                        Bayar &amp; Buka Level
                    </button>
                </form>

                <a href="{{ route('game.index') }}"
                   class="btn btn-secondary"
                   style="margin-top:0.75rem; width:100%; text-align:center;">
                    Batal &amp; Kembali ke Papan
                </a>
            </div>
        </div>
    </section>
@endsection
