@extends('layouts.app')

@section('title', "Stage $stage – Level $level")

@section('content')
    <section class="section">
        <h2 class="animate-on-scroll" style="text-align:center;">
            Stage {{ $stage }} – Level {{ $level }}: {{ $config['title'] }}
        </h2>

        <p class="text-muted" style="text-align:center; margin-bottom: 1.5rem;">
            Percobaan ke: <strong>{{ $attempt + 1 }}</strong>
            (maksimal 2x percobaan per level)
        </p>

        @if (session('status_msg'))
            <div class="alert alert-{{ session('status_type', 'info') }}" style="max-width: 700px; margin: 0 auto 1.5rem;">
                {{ session('status_msg') }}
            </div>
        @endif

        <div class="register-section animate-on-scroll" style="max-width: 720px; margin: 0 auto;">
            <div class="register-content">
                <h3 class="register-title" style="text-align:center;">
                    {{ $config['question'] }}
                </h3>

                <form action="{{ route('game.level.submit', [$stage, $level]) }}" method="POST"
                    class="level-question-form">
                    @csrf

                    {{-- Multiple choice --}}
                    @if ($config['type'] === 'multiple_choice')
                        @foreach ($config['options'] as $key => $text)
                            <label class="level-option-label">
                                <input type="radio" name="answer" value="{{ $key }}" required>
                                <span><strong>{{ $key }}.</strong> {{ $text }}</span>
                            </label>
                        @endforeach
                    @endif

                    {{-- True / False --}}
                    @if ($config['type'] === 'true_false')
                        @foreach ($config['statements'] as $key => $st)
                            <div class="form-field level-tf-field">
                                <p><strong>Pernyataan {{ $key }}:</strong> {{ $st['text'] }}</p>
                                <label>
                                    <input type="radio" name="statement_{{ $key }}" value="true" required>
                                    Benar
                                </label>
                                <label>
                                    <input type="radio" name="statement_{{ $key }}" value="false" required>
                                    Salah
                                </label>
                            </div>
                        @endforeach
                    @endif

                    {{-- Order (urutan langkah) --}}
                    @if ($config['type'] === 'order')
                        @foreach ($config['steps'] as $idx => $stepText)
                            <div class="form-field level-order-field">
                                <input type="number" name="step_{{ $idx }}" min="1"
                                    max="{{ count($config['steps']) }}" required>
                                <span>{{ $stepText }}</span>
                            </div>
                        @endforeach
                    @endif

                    <button type="submit" class="submit-btn level-submit-btn">
                        Kirim Jawaban
                    </button>
                </form>


                @if (session('show_explanation'))
                    <div class="form-message" style="margin-top:1.5rem; display:block;">
                        <strong>Pembahasan singkat:</strong><br>
                        Level ini membantu kamu memahami konsep QRIS sesuai tema stage ini
                        (pengertian, manfaat, keamanan, atau penerapan sehari-hari).
                    </div>
                @endif
            </div>
        </div>

        <div style="margin-top:1.5rem; text-align:center;">
            <a href="{{ route('game.index') }}" class="btn btn-secondary">
                &larr; Kembali ke daftar Stage
            </a>
        </div>
    </section>
@endsection
