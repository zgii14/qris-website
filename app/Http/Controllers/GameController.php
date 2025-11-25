<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Konfigurasi stage & level:
     * 3 stage, masing-masing 3 level.
     */
    private array $stages = [
        1 => [
            'name' => 'Dasar QRIS',
            'levels' => [
                1 => [
                    'type' => 'multiple_choice',
                    'title' => 'Pengertian QRIS',
                    'question' => 'Apa pengertian QRIS yang paling tepat?',
                    'options' => [
                        'A' => 'Standar nasional kode QR untuk pembayaran di Indonesia.',
                        'B' => 'Salah satu aplikasi dompet digital.',
                        'C' => 'Mesin EDC khusus pembayaran QR.',
                        'D' => 'Jenis kartu debit baru.',
                    ],
                    'correct' => 'A',
                    'points' => [1 => 100, 2 => 50],
                ],
                2 => [
                    'type' => 'true_false',
                    'title' => 'Manfaat QRIS',
                    'question' => 'Tentukan benar/salah pernyataan tentang manfaat QRIS bagi pembeli.',
                    'statements' => [
                        'A' => [
                            'text' => 'QRIS memudahkan pembayaran tanpa uang tunai.',
                            'answer' => true,
                        ],
                        'B' => [
                            'text' => 'QRIS hanya bisa digunakan di kota besar.',
                            'answer' => false,
                        ],
                    ],
                    'points' => [1 => 120, 2 => 60],
                ],
                3 => [
                    'type' => 'order',
                    'title' => 'Langkah Dasar Membayar QRIS',
                    'question' => 'Urutkan langkah membayar dengan QRIS.',
                    'steps' => [
                        1 => 'Buka aplikasi pembayaran di HP.',
                        2 => 'Scan kode QRIS di kasir.',
                        3 => 'Masukkan nominal belanja.',
                        4 => 'Cek nama merchant dan konfirmasi.',
                    ],
                    // jawaban benar: tiap baris diisi angka ini
                    'correct_order' => [
                        1 => 1,
                        2 => 2,
                        3 => 3,
                        4 => 4,
                    ],
                    'points' => [1 => 150, 2 => 75],
                ],
            ],
        ],
        2 => [
            'name' => 'Keamanan & Etika',
            'levels' => [
                1 => [
                    'type' => 'multiple_choice',
                    'title' => 'QRIS yang Aman',
                    'question' => 'Contoh penggunaan QRIS yang aman adalah...',
                    'options' => [
                        'A' => 'Scan QR yang dikirim orang asing via chat.',
                        'B' => 'Scan QRIS resmi yang ditempel di kasir dengan nama merchant jelas.',
                        'C' => 'Scan QR dari foto di status orang tanpa tahu sumbernya.',
                        'D' => 'Scan QR yang ditempel di tiang listrik tanpa identitas.',
                    ],
                    'correct' => 'B',
                    'points' => [1 => 160, 2 => 80],
                ],
                2 => [
                    'type' => 'true_false',
                    'title' => 'Kewaspadaan Pengguna',
                    'question' => 'Tentukan benar/salah sikap pengguna QRIS berikut.',
                    'statements' => [
                        'A' => [
                            'text' => 'Selalu cek nama merchant sebelum konfirmasi pembayaran.',
                            'answer' => true,
                        ],
                        'B' => [
                            'text' => 'Aman-aman saja scan QR dari broadcast tanpa cek sumber.',
                            'answer' => false,
                        ],
                    ],
                    'points' => [1 => 170, 2 => 85],
                ],
                3 => [
                    'type' => 'order',
                    'title' => 'Menghindari Penipuan',
                    'question' => 'Urutkan langkah saat menemukan QR yang mencurigakan.',
                    'steps' => [
                        1 => 'Jangan langsung scan dan bayar.',
                        2 => 'Tanya ke kasir/petugas apakah QR tersebut resmi.',
                        3 => 'Gunakan hanya QR yang dipastikan resmi oleh kasir.',
                    ],
                    'correct_order' => [
                        1 => 1,
                        2 => 2,
                        3 => 3,
                    ],
                    'points' => [1 => 180, 2 => 90],
                ],
            ],
        ],
        3 => [
            'name' => 'Penerapan Sehari-hari',
            'levels' => [
                1 => [
                    'type' => 'multiple_choice',
                    'title' => 'Studi Kasus Warung',
                    'question' => 'Bu Siti memasang QRIS di warungnya. Manfaat utamanya adalah...',
                    'options' => [
                        'A' => 'Harga barang otomatis jadi lebih mahal.',
                        'B' => 'Bisa menerima pembayaran non-tunai dari berbagai aplikasi.',
                        'C' => 'Hanya bisa melayani pelanggan luar kota.',
                        'D' => 'Tidak perlu lagi mencatat penjualan sama sekali.',
                    ],
                    'correct' => 'B',
                    'points' => [1 => 190, 2 => 95],
                ],
                2 => [
                    'type' => 'true_false',
                    'title' => 'Kebiasaan Baik Pengguna',
                    'question' => 'Tentukan benar/salah kebiasaan pengguna berikut.',
                    'statements' => [
                        'A' => [
                            'text' => 'Pengecekan ulang nominal sebelum bayar itu penting.',
                            'answer' => true,
                        ],
                        'B' => [
                            'text' => 'QRIS hanya bermanfaat untuk usaha besar.',
                            'answer' => false,
                        ],
                    ],
                    'points' => [1 => 200, 2 => 100],
                ],
                3 => [
                    'type' => 'order',
                    'title' => 'Simulasi Belanja QRIS',
                    'question' => 'Urutkan langkah saat kamu belanja di kantin dan membayar dengan QRIS.',
                    'steps' => [
                        1 => 'Hitung total belanja bersama penjual.',
                        2 => 'Buka aplikasi pembayaran di HP.',
                        3 => 'Scan QRIS di kantin.',
                        4 => 'Masukkan nominal yang sudah disepakati.',
                        5 => 'Cek nama kantin/merchant dan konfirmasi bayar.',
                    ],
                    'correct_order' => [
                        1 => 1,
                        2 => 2,
                        3 => 3,
                        4 => 4,
                        5 => 5,
                    ],
                    'points' => [1 => 210, 2 => 105],
                ],
            ],
        ],
    ];

    /* ========= HELPERS KOIN ========= */

    private function getCoins(): int
    {
        return session('coins', 0);
    }

    private function setCoins(int $coins): void
    {
        session(['coins' => $coins]);
    }

    private function addCoins(int $amount): int
    {
        $coins = $this->getCoins() + $amount;
        $this->setCoins($coins);
        return $coins;
    }

    /* ========= HELPERS LEVEL CODE / PROGRESS ========= */

    /** encode level jadi angka, misal stage1-level2 = 12, stage3-level3 = 33 */
    private function encodeLevel(int $stage, int $level): int
    {
        return $stage * 10 + $level;
    }

    private function getMaxUnlocked(): int
    {
        // default: hanya Stage1 Level1 yang kebuka -> 11
        return session('max_unlocked', 11);
    }

    private function setMaxUnlocked(int $code): void
    {
        session(['max_unlocked' => $code]);
    }

    private function unlockNext(int $stage, int $level): void
    {
        $current = $this->encodeLevel($stage, $level);
        $max     = $this->getMaxUnlocked();

        // kalau sudah lewat (user replay level lama), tidak usah unlock apa-apa
        if ($current < $max) {
            return;
        }

        // level terakhir: 3-3 -> 33 (tidak ada next)
        if ($stage === 3 && $level === 3) {
            return;
        }

        $next = $current + 1;
        if ($next > $max) {
            $this->setMaxUnlocked($next);
        }
    }

    private function ensureUnlockedOrAbort(int $stage, int $level): void
    {
        $code = $this->encodeLevel($stage, $level);
        if ($code > $this->getMaxUnlocked()) {
            abort(403, 'Level ini masih terkunci.');
        }
    }

    /* ========= HELPERS ATTEMPT ========= */

    private function keyAttempt(int $stage, int $level): string
    {
        return "{$stage}-{$level}";
    }

    private function getAttempts(int $stage, int $level): int
    {
        $attempts = session('attempts', []);
        return $attempts[$this->keyAttempt($stage, $level)] ?? 0;
    }

    private function incrementAttempts(int $stage, int $level): int
    {
        $attempts = session('attempts', []);
        $key = $this->keyAttempt($stage, $level);
        $attempts[$key] = ($attempts[$key] ?? 0) + 1;
        session(['attempts' => $attempts]);
        return $attempts[$key];
    }

    private function resetAttempts(int $stage, int $level): void
    {
        $attempts = session('attempts', []);
        unset($attempts[$this->keyAttempt($stage, $level)]);
        session(['attempts' => $attempts]);
    }

    /* ========= HELPERS LEVEL COMPLETED ========= */

    private function getCompletedLevels(): array
    {
        // format item: "stage-level", contoh: "1-2"
        return session('completed_levels', []);
    }

    private function isLevelCompleted(int $stage, int $level): bool
    {
        return in_array("{$stage}-{$level}", $this->getCompletedLevels(), true);
    }

    private function markLevelCompleted(int $stage, int $level): void
    {
        $completed = $this->getCompletedLevels();
        $key       = "{$stage}-{$level}";

        if (!in_array($key, $completed, true)) {
            $completed[] = $key;
            session(['completed_levels' => $completed]);
        }
    }

    /* ========= UTIL ========= */

    private function getLevelConfigOrFail(int $stage, int $level): array
    {
        if (!isset($this->stages[$stage]['levels'][$level])) {
            abort(404);
        }
        return $this->stages[$stage]['levels'][$level];
    }

    private function humanType(string $type): string
    {
        return match ($type) {
            'multiple_choice' => 'Pilihan ganda',
            'true_false'      => 'Benar / Salah',
            'order'           => 'Urutkan langkah',
            default           => ucfirst($type),
        };
    }

    /* ========= HALAMAN ========= */

    public function home()
    {
        return view('home', [
            'coins'  => $this->getCoins(),
            'stages' => $this->stages,
        ]);
    }

    public function index()
    {
        $maxUnlocked = $this->getMaxUnlocked();

        return view('game.index', [
            'coins'          => $this->getCoins(),
            'stages'         => $this->stages,
            'maxUnlocked'    => $maxUnlocked,
            'currentCode'    => $maxUnlocked,               // posisi pion
            'completedLevels'=> $this->getCompletedLevels(),// array "stage-level"
        ]);
    }

    public function showLevel(int $stage, int $level)
    {
        $this->ensureUnlockedOrAbort($stage, $level);

        return view('game.level', [
            'coins'   => $this->getCoins(),
            'stage'   => $stage,
            'level'   => $level,
            'config'  => $this->getLevelConfigOrFail($stage, $level),
            'attempt' => $this->getAttempts($stage, $level),
        ]);
    }

    public function submitLevel(Request $request, int $stage, int $level)
    {
        $this->ensureUnlockedOrAbort($stage, $level);

        $config  = $this->getLevelConfigOrFail($stage, $level);
        $attempt = $this->incrementAttempts($stage, $level);

        $statusType      = 'warning';
        $statusMsg       = 'Jawaban belum benar, coba lagi ya.';
        $showExplanation = false;
        $earned          = 0;

        // kalau sudah pernah selesai, skor hanya untuk info (tidak tambah koin lagi)
        $alreadyCompleted = $this->isLevelCompleted($stage, $level);

        /* ==== CEK JAWABAN ==== */
        switch ($config['type']) {
            case 'multiple_choice':
                $chosen  = $request->input('answer');
                $correct = $config['correct'];

                if ($chosen === $correct) {
                    $statusType      = 'success';
                    $statusMsg       = 'Jawaban benar! 🎉';
                    $showExplanation = true;
                }
                break;

            case 'true_false':
                $allCorrect = true;
                foreach ($config['statements'] as $key => $st) {
                    $userVal  = $request->input("statement_{$key}");
                    $expected = $st['answer'] ? 'true' : 'false';

                    if ($userVal !== $expected) {
                        $allCorrect = false;
                        break;
                    }
                }

                if ($allCorrect) {
                    $statusType      = 'success';
                    $statusMsg       = 'Semua pernyataan sudah kamu jawab dengan tepat! 🎯';
                    $showExplanation = true;
                }
                break;

            case 'order':
                $correctOrder = $config['correct_order'] ?? [];
                $allCorrect   = true;

                foreach ($config['steps'] as $idx => $_) {
                    $userVal    = (int) $request->input("step_{$idx}");
                    $expected   = (int) ($correctOrder[$idx] ?? 0);

                    if ($userVal !== $expected) {
                        $allCorrect = false;
                        break;
                    }
                }

                if ($allCorrect) {
                    $statusType      = 'success';
                    $statusMsg       = 'Urutan langkah kamu sudah tepat! ✅';
                    $showExplanation = true;
                }
                break;
        }

        /* ==== KALAU BENAR ==== */
        if ($statusType === 'success') {
            // hitung koin cuma kalau level belum pernah selesai
            if (!$alreadyCompleted) {
                $pointsMap = $config['points'] ?? [];
                $earned    = $pointsMap[$attempt] ?? ($pointsMap[2] ?? 0); // default pakai poin percobaan 2

                if ($earned > 0) {
                    $this->addCoins($earned);
                    $statusMsg .= " Kamu mendapat {$earned} koin. 🪙";
                }
            } else {
                $statusMsg .= ' (Level ini sudah pernah kamu selesaikan, jadi tidak menambah koin lagi.)';
            }

            // tandai selesai dan buka level berikutnya
            $this->markLevelCompleted($stage, $level);
            $this->unlockNext($stage, $level);

            // reset attempt untuk level ini
            $this->resetAttempts($stage, $level);
        }
        /* ==== KALAU MASIH SALAH ==== */
        else {
            if ($attempt >= 2) {
                // setelah 2x salah beruntun, reset attempt biar bisa start ulang
                $this->resetAttempts($stage, $level);
                $statusType = 'danger';
                $statusMsg  = 'Masih salah dan percobaan sudah 2x. Coba ulang level ini dari awal ya. 💪';
            }
        }

        return back()->with([
            'status_type'      => $statusType,
            'status_msg'       => $statusMsg,
            'show_explanation' => $showExplanation,
        ]);
    }
}
