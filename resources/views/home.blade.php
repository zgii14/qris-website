@extends('layouts.app')

@section('title', 'Beranda – QRIS Journey')

@section('hero')
    <section id="home" class="hero">
        <div class="hero-content">
            <h1>QRIS Journey Game</h1>
            <p>Belajar pembayaran digital QRIS lewat perjalanan Stage & Level yang interaktif.</p>

            <div class="hero-stats">
                <div class="stat">
                    <span class="stat-number" data-target="{{ $coins ?? 0 }}">0</span>
                    <span class="stat-label">Koin Kamu</span>
                </div>
                <div class="stat">
                    <span class="stat-number" data-target="3">0</span>
                    <span class="stat-label">Stage</span>
                </div>
                <div class="stat">
                    <span class="stat-number" data-target="9">0</span>
                    <span class="stat-label">Level</span>
                </div>
                <div class="stat">
                    <span class="stat-number" data-target="1">0</span>
                    <span class="stat-label">Topik: QRIS</span>
                </div>
            </div>

            <div class="cta-buttons">
                <a href="#about-qris" class="btn btn-primary">Lihat Materi QRIS</a>
                <a href="{{ route('game.index') }}" class="btn btn-secondary">Mulai Main</a>
            </div>
        </div>
    </section>
@endsection

@section('content')
    {{-- SECTION 1: PENGANTAR QRIS --}}
    <section id="about-qris" class="section">
        <h2 class="animate-on-scroll">Apa itu QRIS?</h2>
        <div class="about-content">
            <div class="about-text animate-on-scroll slide-left">
                <p>
                    <strong>QRIS (Quick Response Code Indonesian Standard)</strong> adalah
                    standar nasional kode QR untuk pembayaran yang ditetapkan oleh Bank Indonesia.
                    QRIS dikembangkan bersama industri sistem pembayaran agar transaksi dengan QR
                    menjadi <strong>cepat, mudah, murah, aman, dan andal (CEMUMUAH)</strong>.
                </p>
                <p>
                    Dengan satu kode QRIS, pengguna bisa membayar menggunakan berbagai aplikasi
                    pembayaran (mobile banking maupun dompet digital), sedangkan merchant cukup
                    memiliki satu QR untuk menerima pembayaran dari mana saja.
                </p>
                <p>
                    QRIS menjadi <em>game changer</em> pembayaran digital: mendorong inklusi keuangan,
                    mempermudah UMKM masuk ekosistem digital, dan membuka jalan konektivitas
                    pembayaran lintas negara.
                </p>
            </div>
            <div class="about-visual animate-on-scroll slide-right">
                <div class="blockchain-visual">
                    <div class="block">QRIS</div>
                    <div class="block">UMKM</div>
                    <div class="block">Cashless</div>
                    <div class="block">CEMUMUAH</div>
                    <div class="block">Keamanan</div>
                    <div class="block">Digital</div>
                    <div class="block">TUNTAS</div>
                    <div class="block">Antarnegara</div>
                    <div class="block">Inklusi</div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 2: PARA PIHAK & SUMBER DANA --}}
    <section class="section">
        <h2 class="animate-on-scroll">Siapa Saja dan Dana Apa yang Terlibat?</h2>
        <div class="speakers-grid">
            <div class="speaker-card animate-on-scroll scale-up stagger-animation" style="--stagger:1;">
                <h3 class="speaker-name">Para Pihak dalam QRIS</h3>
                <p class="speaker-bio">
                    Pemrosesan transaksi QRIS melibatkan:
                </p>
                <ul class="qris-list">
                    <li><strong>Penyedia Jasa Pembayaran (PJP)</strong> – penerbit & acquirer</li>
                    <li><strong>Lembaga Switching</strong> – penghubung transaksi</li>
                    <li><strong>Lembaga Standar</strong> – penyusun standar teknis</li>
                    <li><strong>National Merchant Repository</strong> – basis data merchant nasional</li>
                </ul>
                <p class="speaker-bio">
                    PJP dan Lembaga Switching yang memproses transaksi QRIS wajib mendapat
                    persetujuan & izin dari Bank Indonesia.
                </p>
            </div>

            <div class="speaker-card animate-on-scroll scale-up stagger-animation" style="--stagger:2;">
                <h3 class="speaker-name">Sumber Dana</h3>
                <p class="speaker-bio">
                    Transaksi QRIS dapat menggunakan:
                </p>
                <ul class="qris-list">
                    <li>Simpanan di bank</li>
                    <li>Kartu debet dan kartu kredit</li>
                    <li>Fasilitas kredit tertentu</li>
                    <li>Uang elektronik <em>server-based</em></li>
                </ul>
                <p class="speaker-bio">
                    Penggunaan instrumen ini diusulkan oleh lembaga standar dan disetujui Bank Indonesia.
                </p>
            </div>

            <div class="speaker-card animate-on-scroll scale-up stagger-animation" style="--stagger:3;">
                <h3 class="speaker-name">Limit Transaksi</h3>
                <p class="speaker-bio">
                    Nominal transaksi QRIS dibatasi paling banyak <strong>Rp10.000.000 per transaksi</strong>.
                    Selain itu, penerbit boleh menetapkan batas harian/bulanan berdasarkan
                    manajemen risiko (misalnya limit total per hari).
                </p>
                <p class="speaker-bio">
                    Ketentuan teknis QRIS diatur dalam berbagai Peraturan Anggota Dewan Gubernur (PADG)
                    terkait implementasi standar nasional QR Code untuk pembayaran.
                </p>
            </div>
        </div>
    </section>

    {{-- SECTION 3: PAKAI QRIS & MANFAAT --}}
    <section class="section">
        <h2 class="animate-on-scroll">Kenapa Harus Pakai QRIS?</h2>

        <div class="register-section animate-on-scroll">
            <div class="register-content">
                <h3 class="register-title">PAKAI QRIS</h3>
                <p class="register-subtitle">
                    QRIS dikampanyekan dengan slogan <strong>PAKAI</strong>:
                </p>
                <ul class="qris-list">
                    <li><strong>Praktis</strong> – cukup scan dan klik, tanpa repot uang tunai.</li>
                    <li><strong>Aman</strong> – PJP QRIS berizin dan diawasi Bank Indonesia.</li>
                    <li><strong>Kekinian</strong> – cocok untuk gaya hidup serba digital.</li>
                    <li><strong>Andal</strong> – bisa digunakan kapan saja, di banyak tempat.</li>
                    <li><strong>Inklusif</strong> – menjangkau berbagai lapisan masyarakat dan UMKM.</li>
                </ul>
            </div>
        </div>

        <div class="about-stats animate-on-scroll scale-up">
            <div class="about-stat">
                <span class="about-stat-number">Pengguna</span>
                <span class="about-stat-label">
                    Cepat, tanpa uang tunai, dan tidak perlu bingung QR siapa yang dipakai.
                </span>
            </div>
            <div class="about-stat">
                <span class="about-stat-number">Keamanan</span>
                <span class="about-stat-label">
                    PJP diawasi, transaksi tercatat, dan mengurangi risiko uang palsu.
                </span>
            </div>
            <div class="about-stat">
                <span class="about-stat-number">Merchant</span>
                <span class="about-stat-label">
                    Satu QRIS untuk semua aplikasi, memisahkan keuangan usaha & pribadi, dan
                    membantu membangun <em>credit profile</em>.
                </span>
            </div>
        </div>
    </section>

    {{-- SECTION 4: JENIS PEMBAYARAN QRIS --}}
    <section class="section qris-section-payments">
        <h2 class="animate-on-scroll">Jenis Pembayaran dengan QRIS</h2>
        <div class="speakers-grid">
            <div class="speaker-card animate-on-scroll scale-up stagger-animation" style="--stagger:1;">
                <h3 class="speaker-name">1. Merchant Presented Mode (MPM)</h3>
                <p class="speaker-bio">
                    Pada MPM, kode QR ditampilkan oleh merchant dan discan oleh pelanggan.
                </p>
                <ul class="qris-list">
                    <li>
                        <strong>MPM Statis</strong> – merchant cukup menempel satu stiker/print-out QRIS.
                        Cocok untuk usaha mikro dan kecil.
                    </li>
                    <li>
                        <strong>MPM Dinamis</strong> – QRIS muncul dari perangkat (EDC/smartphone),
                        nominal diisi dulu oleh merchant. Cocok untuk usaha menengah/besar atau
                        volume transaksi tinggi.
                    </li>
                </ul>
            </div>

            <div class="speaker-card animate-on-scroll scale-up stagger-animation" style="--stagger:2;">
                <h3 class="speaker-name">2. Customer Presented Mode (CPM)</h3>
                <p class="speaker-bio">
                    Pada CPM, pelanggan menampilkan QR di aplikasinya untuk di-scan oleh merchant.
                </p>
                <ul class="qris-list">
                    <li>
                        Mode ini cocok untuk kebutuhan transaksi yang butuh kecepatan tinggi,
                        misalnya transportasi, parkir, dan ritel modern.
                    </li>
                </ul>
            </div>
        </div>
    </section>

    {{-- SECTION 5: INOVASI QRIS (TTM, TUNTAS, ANTARNEGARA) --}}
    <section class="section">
        <h2 class="animate-on-scroll">Inovasi Lanjutan QRIS</h2>
        <div class="speakers-grid">
            <div class="speaker-card animate-on-scroll scale-up stagger-animation" style="--stagger:1;">
                <h3 class="speaker-name">QRIS Tanpa Tatap Muka (TTM)</h3>
                <p class="speaker-bio">
                    Memungkinkan transaksi jarak jauh tanpa harus bertemu langsung.
                    Merchant dapat mengirimkan gambar QRIS melalui katalog, pesan, atau invoice;
                    pelanggan tinggal scan, isi nominal, dan bayar. Cocok untuk belanja online
                    maupun donasi.
                </p>
            </div>

            <div class="speaker-card animate-on-scroll scale-up stagger-animation" style="--stagger:2;">
                <h3 class="speaker-name">QRIS TUNTAS</h3>
                <p class="speaker-bio">
                    <strong>TUNTAS</strong> = Tarik Tunai, Transfer, dan Setor Tunai.
                    Pengguna bisa transfer ke pengguna QRIS lain, serta tarik/setor tunai di ATM,
                    CDM, atau agen QRIS TUNTAS dengan cara scan QR melalui aplikasi pembayaran.
                </p>
                <p class="speaker-bio">
                    Fitur ini mendukung inklusi keuangan, terutama bagi masyarakat unbanked dan
                    underserved, serta menghubungkan bank dan lembaga non-bank secara
                    interkoneksi.
                </p>
            </div>

            <div class="speaker-card animate-on-scroll scale-up stagger-animation" style="--stagger:3;">
                <h3 class="speaker-name">QRIS Antarnegara</h3>
                <p class="speaker-bio">
                    QRIS Antarnegara memudahkan wisatawan Indonesia bertransaksi di luar negeri
                    menggunakan aplikasi domestik untuk scan QR negara mitra, dan sebaliknya
                    wisatawan mancanegara bisa membayar di merchant Indonesia dengan scan QRIS
                    menggunakan aplikasi dari negaranya.
                </p>
                <p class="speaker-bio">
                    Transaksi dilakukan dengan penggunaan mata uang lokal
                    (<em>local currency transaction</em>) untuk mendukung perdagangan,
                    pariwisata, UMKM, dan stabilitas makroekonomi. Saat ini QRIS Antarnegara
                    sudah bekerja sama dengan beberapa negara seperti Thailand, Malaysia,
                    dan Singapura.
                </p>
            </div>
        </div>
    </section>

    {{-- SECTION 6: CARA JADI MERCHANT & PENGGUNA --}}
    <section class="section">
        <h2 class="animate-on-scroll">Cara Menjadi Pengguna & Merchant QRIS</h2>
        <div class="contact-info-section animate-on-scroll">
            <div class="contact-container">
                <div class="contact-form-column">
                    <h3 class="contact-form-title">Sebagai Merchant</h3>
                    <ul class="qris-list">
                        <li>Daftar ke salah satu PJP QRIS (datang ke cabang atau daftar online).</li>
                        <li>Isi data usaha dan dokumen yang diminta.</li>
                        <li>Tunggu verifikasi, pembuatan Merchant ID, dan kode QRIS.</li>
                        <li>Terima QRIS (cetak atau softcopy) dan aplikasi/portal merchant.</li>
                        <li>Pelajari tata cara menerima dan mengelola pembayaran QRIS dari PJP.</li>
                    </ul>
                </div>
                <div class="contact-info-column">
                    <h3 class="contact-info-title">Sebagai Pengguna</h3>
                    <ul class="qris-list">
                        <li>Unduh aplikasi salah satu PJP QRIS dan lakukan registrasi.</li>
                        <li>Isi saldo atau pastikan sumber dana (rekening/kartu) aktif.</li>
                        <li>
                            Saat membayar: buka aplikasi → pilih menu scan → scan QRIS merchant →
                            masukkan nominal → konfirmasi tujuan → masukkan PIN → bayar.
                        </li>
                        <li>
                            Simpan atau cek notifikasi transaksi untuk bukti pembayaran.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
