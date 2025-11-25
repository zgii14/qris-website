@extends('layouts.app')

@section('title', "Stage $stage – Level $level")

@section('content')
    <section class="section">
        {{-- JUDUL LEVEL --}}
        <h2 class="animate-on-scroll" style="text-align:center;">
            Stage {{ $stage }} – Level {{ $level }}: {{ $config['title'] }}
        </h2>

        {{-- INFO PERCOBAAN / STATUS --}}
        <p class="text-muted" style="text-align:center; margin-bottom: 1.5rem;">
            @if($isCompleted)
                Status: <strong>Sudah selesai ✅</strong>
            @else
                Percobaan ke: <strong>{{ $attempt + 1 }}</strong>
                (maksimal 2x percobaan per level)
            @endif
        </p>

        {{-- ALERT STATUS JAWABAN --}}
        @if (session('status_msg'))
            <div class="alert alert-{{ session('status_type', 'info') }}"
                 style="max-width: 700px; margin: 0 auto 1.5rem;">
                {{ session('status_msg') }}
            </div>
        @endif

        {{-- KOTAK SOAL / INFO --}}
        <div class="register-section animate-on-scroll" style="max-width: 720px; margin: 0 auto;">
            <div class="register-content">
                <h3 class="register-title" style="text-align:center;">
                    {{ $config['question'] }}
                </h3>

                {{-- Kalau level BELUM selesai → tampilkan form --}}
                @if(!$isCompleted)
                    <form action="{{ route('game.level.submit', [$stage, $level]) }}"
                          method="POST"
                          class="level-question-form">
                        @csrf

                        {{-- 1. PILIHAN GANDA --}}
                        @if ($config['type'] === 'multiple_choice')
                            @foreach ($config['options'] as $key => $text)
                                <label class="level-option-label">
                                    <input
                                        type="radio"
                                        name="answer"
                                        value="{{ $key }}"
                                        required
                                        {{ old('answer') === $key ? 'checked' : '' }}
                                    >
                                    <span>
                                        <strong>{{ $key }}.</strong> {{ $text }}
                                    </span>
                                </label>
                            @endforeach
                        @endif

                        {{-- 2. BENAR / SALAH --}}
                        @if ($config['type'] === 'true_false')
                            @foreach ($config['statements'] as $key => $st)
                                <div class="form-field level-tf-field">
                                    <p style="margin-bottom: 0.4rem;">
                                        <strong>Pernyataan {{ $key }}:</strong> {{ $st['text'] }}
                                    </p>
                                    <div style="display:flex; gap:1.5rem; flex-wrap:wrap;">
                                        <label>
                                            <input
                                                type="radio"
                                                name="statement_{{ $key }}"
                                                value="true"
                                                required
                                                {{ old("statement_$key") === 'true' ? 'checked' : '' }}
                                            >
                                            Benar
                                        </label>
                                        <label>
                                            <input
                                                type="radio"
                                                name="statement_{{ $key }}"
                                                value="false"
                                                required
                                                {{ old("statement_$key") === 'false' ? 'checked' : '' }}
                                            >
                                            Salah
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        {{-- 3. URUTAN LANGKAH --}}
                        @if ($config['type'] === 'order')
                            @foreach ($config['steps'] as $idx => $stepText)
                                <div class="form-field level-order-field">
                                    <input
                                        type="number"
                                        name="step_{{ $idx }}"
                                        min="1"
                                        max="{{ count($config['steps']) }}"
                                        required
                                        value="{{ old("step_$idx") }}"
                                    >
                                    <span>{{ $stepText }}</span>
                                </div>
                            @endforeach
                        @endif

                        <button type="submit" class="submit-btn level-submit-btn">
                            Kirim Jawaban
                        </button>
                    </form>
                @else
                    {{-- Kalau level SUDAH selesai → tampilkan info saja --}}
                    <p style="text-align:center; color: var(--gray); margin-top: 1rem;">
                        Kamu sudah menyelesaikan level ini 🎉<br>
                        Silakan kembali ke papan petualangan untuk lanjut ke level berikutnya.
                    </p>
                @endif

                {{-- PEMBAHASAN SINGKAT (setelah benar) --}}
                @if (session('show_explanation'))
                    <div class="form-message" style="margin-top:1.5rem; display:block;">
                        <strong>Pembahasan singkat:</strong><br>
                        Level ini membantu kamu memahami konsep QRIS sesuai tema stage ini
                        (pengertian, manfaat, keamanan, atau penerapan sehari-hari).
                    </div>
                @endif
            </div>
        </div>

        {{-- LINK KEMBALI --}}
        <div style="margin-top:1.5rem; text-align:center;">
            <a href="{{ route('game.index') }}" class="btn btn-secondary">
                &larr; Kembali ke daftar Stage
            </a>
        </div>
    </section>
@endsection
