@extends('layouts.app')

@section('title', 'MajorFit UBSI - Mengenal Kerangka Teori Minat RIASEC (Holland Code)')

@section('content')
<div class="flex flex-col w-full">
  <!-- Breadcrumb Navigation -->
  <div class="max-w-7xl w-full mx-auto px-margin pt-space-lg">
    <nav aria-label="Breadcrumb" class="flex items-center gap-space-xs text-on-surface-variant font-label-md text-label-md">
      <a class="hover:text-primary transition-colors flex items-center gap-1" href="{{ route('home') }}">
        <span class="material-symbols-outlined text-[16px]">home</span>
        Beranda
      </a>
      <span class="material-symbols-outlined text-[14px] text-outline-variant">chevron_right</span>
      <span class="hover:text-primary transition-colors cursor-pointer">Edukasi</span>
      <span class="material-symbols-outlined text-[14px] text-outline-variant">chevron_right</span>
      <span class="text-primary font-semibold">Teori RIASEC (Holland Code)</span>
    </nav>
  </div>

  <!-- Educational Header / Hero Area -->
  <section class="max-w-7xl w-full mx-auto px-margin pt-space-lg pb-space-xl">
    <div class="relative overflow-hidden bg-gradient-to-br from-surface-container-low via-surface to-secondary-fixed/30 rounded-3xl p-space-lg md:p-space-xl shadow-sm">
      <div class="absolute -right-16 -top-16 w-80 h-80 rounded-full bg-secondary-fixed/40 blur-3xl pointer-events-none"></div>
      <div class="absolute -left-12 -bottom-12 w-64 h-64 rounded-full bg-primary-fixed/50 blur-2xl pointer-events-none"></div>
      <div class="relative z-10 max-w-4xl space-y-space-md">
        <div class="inline-flex items-center gap-space-xs px-space-md py-space-xs rounded-full bg-surface-container-lowest/90 backdrop-blur-md shadow-sm">
          <span class="material-symbols-outlined text-[18px] text-tertiary">verified</span>
          <span class="font-label-md text-label-md text-on-surface font-semibold tracking-wide uppercase">Kerangka Teori Psikometri Holland</span>
        </div>
        <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight leading-tight">
          Mengenal Kerangka Teori Minat RIASEC <span class="text-primary">(Holland Code)</span>
        </h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-3xl leading-relaxed">
          Pahami 6 dimensi kepribadian dan bagaimana kecenderungan minatmu dihubungkan dengan program studi di Universitas Bina Sarana Informatika.
        </p>

        <!-- Proof Pillars / Key Statistics -->
        <div class="pt-space-md grid grid-cols-1 sm:grid-cols-3 gap-space-md">
          <div class="flex items-center gap-space-sm bg-surface-container-lowest/80 p-space-md rounded-2xl shadow-sm backdrop-blur-sm">
            <div class="w-10 h-10 rounded-xl bg-primary-fixed flex items-center justify-center text-primary flex-shrink-0">
              <span class="material-symbols-outlined text-[22px]">psychology</span>
            </div>
            <div>
              <p class="font-label-sm text-label-sm uppercase tracking-wider text-outline">Pencetus Model</p>
              <p class="font-headline-sm text-headline-sm text-on-surface font-semibold">Dr. John L. Holland</p>
            </div>
          </div>

          <div class="flex items-center gap-space-sm bg-surface-container-lowest/80 p-space-md rounded-2xl shadow-sm backdrop-blur-sm">
            <div class="w-10 h-10 rounded-xl bg-secondary-fixed flex items-center justify-center text-secondary flex-shrink-0">
              <span class="material-symbols-outlined text-[22px]">history_edu</span>
            </div>
            <div>
              <p class="font-label-sm text-label-sm uppercase tracking-wider text-outline">Rekam Jejak</p>
              <p class="font-headline-sm text-headline-sm text-on-surface font-semibold">Validitas 70+ Tahun</p>
            </div>
          </div>

          <div class="flex items-center gap-space-sm bg-surface-container-lowest/80 p-space-md rounded-2xl shadow-sm backdrop-blur-sm">
            <div class="w-10 h-10 rounded-xl bg-tertiary-fixed flex items-center justify-center text-tertiary flex-shrink-0">
              <span class="material-symbols-outlined text-[22px]">auto_awesome</span>
            </div>
            <div>
              <p class="font-label-sm text-label-sm uppercase tracking-wider text-outline">Relevansi Kampus</p>
              <p class="font-headline-sm text-headline-sm text-on-surface font-semibold">Kurikulum Resmi UBSI</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Interactive 6 Dimensions Bento Grid -->
  <section class="max-w-7xl w-full mx-auto px-margin py-space-lg">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-space-xl gap-space-sm">
      <div>
        <span class="font-label-md text-label-md uppercase tracking-wider text-primary font-semibold">Struktur Model RIASEC</span>
        <h2 class="font-headline-md text-headline-md text-on-surface mt-space-xs">Enam Dimensi Kepribadian &amp; Minat Holland</h2>
      </div>
      <p class="font-body-sm text-body-sm text-on-surface-variant max-w-md">
        Setiap individu memiliki spektrum preferensi unik yang merefleksikan cara berpikir, pemecahan masalah, dan lingkungan belajar ideal.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
      <!-- R: Realistic -->
      <div class="group bg-surface-container-lowest rounded-3xl p-space-lg shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between relative overflow-hidden">
        <div class="absolute top-0 right-0 w-28 h-28 bg-amber-500/10 rounded-bl-full pointer-events-none"></div>
        <div>
          <div class="flex items-center justify-between mb-space-md">
            <span class="w-12 h-12 rounded-2xl bg-amber-500/15 text-amber-600 flex items-center justify-center font-display text-headline-sm font-extrabold">R</span>
            <span class="px-space-sm py-1 rounded-full bg-amber-500/10 text-amber-700 font-label-md text-label-md font-semibold">The Doers</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">Realistic</h3>
          <p class="font-label-md text-label-md text-outline mb-space-sm">Praktikal, Teknik &amp; Fisik</p>
          <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
            Suka berinteraksi dengan alat, perangkat keras, teknologi mesin, dan pekerjaan praktis yang menghasilkan wujud nyata.
          </p>
          <div class="space-y-space-xs mb-space-md">
            <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Karakter Kunci:</span>
            <div class="flex flex-wrap gap-space-xs pt-1">
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Praktis</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Taktil</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Solutif</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Mekanikal</span>
            </div>
          </div>
        </div>
        <div class="bg-surface-container-low/70 rounded-2xl p-space-md mt-space-sm">
          <div class="flex items-center gap-1.5 mb-1.5 text-primary">
            <span class="material-symbols-outlined text-[16px]">school</span>
            <span class="font-label-sm text-label-sm font-semibold uppercase tracking-wide">Program Studi UBSI yang Cocok</span>
          </div>
          <ul class="space-y-1 font-body-sm text-body-sm text-on-surface">
            <li class="flex items-center gap-1.5">• Teknik Elektro (S1)</li>
            <li class="flex items-center gap-1.5">• Teknik Industri (S1)</li>
            <li class="flex items-center gap-1.5">• Teknologi Informasi (S1)</li>
            <li class="flex items-center gap-1.5">• Rekayasa Perangkat Lunak (S1)</li>
          </ul>
        </div>
      </div>

      <!-- I: Investigative -->
      <div class="group bg-surface-container-lowest rounded-3xl p-space-lg shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between relative overflow-hidden">
        <div class="absolute top-0 right-0 w-28 h-28 bg-primary/10 rounded-bl-full pointer-events-none"></div>
        <div>
          <div class="flex items-center justify-between mb-space-md">
            <span class="w-12 h-12 rounded-2xl bg-primary-fixed text-primary flex items-center justify-center font-display text-headline-sm font-extrabold">I</span>
            <span class="px-space-sm py-1 rounded-full bg-primary/10 text-primary font-label-md text-label-md font-semibold">The Thinkers</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">Investigative</h3>
          <p class="font-label-md text-label-md text-outline mb-space-sm">Analitis, Sains &amp; Pemecahan Masalah</p>
          <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
            Suka menganalisis data, memecahkan masalah logika abstrak, riset ilmiah, dan berpikir secara komputasional.
          </p>
          <div class="space-y-space-xs mb-space-md">
            <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Karakter Kunci:</span>
            <div class="flex flex-wrap gap-space-xs pt-1">
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Intelektual</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Kritis</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Eksploratif</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Data-Driven</span>
            </div>
          </div>
        </div>
        <div class="bg-surface-container-low/70 rounded-2xl p-space-md mt-space-sm">
          <div class="flex items-center gap-1.5 mb-1.5 text-primary">
            <span class="material-symbols-outlined text-[16px]">school</span>
            <span class="font-label-sm text-label-sm font-semibold uppercase tracking-wide">Program Studi UBSI yang Cocok</span>
          </div>
          <ul class="space-y-1 font-body-sm text-body-sm text-on-surface">
            <li class="flex items-center gap-1.5">• Ilmu Komputer (S1)</li>
            <li class="flex items-center gap-1.5">• Informatika (S1)</li>
            <li class="flex items-center gap-1.5">• Sistem Informasi (S1)</li>
            <li class="flex items-center gap-1.5">• Magister Teknologi Informasi (S2)</li>
          </ul>
        </div>
      </div>

      <!-- A: Artistic -->
      <div class="group bg-surface-container-lowest rounded-3xl p-space-lg shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between relative overflow-hidden">
        <div class="absolute top-0 right-0 w-28 h-28 bg-purple-500/10 rounded-bl-full pointer-events-none"></div>
        <div>
          <div class="flex items-center justify-between mb-space-md">
            <span class="w-12 h-12 rounded-2xl bg-purple-500/15 text-purple-600 flex items-center justify-center font-display text-headline-sm font-extrabold">A</span>
            <span class="px-space-sm py-1 rounded-full bg-purple-500/10 text-purple-700 font-label-md text-label-md font-semibold">The Creators</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">Artistic</h3>
          <p class="font-label-md text-label-md text-outline mb-space-sm">Kreatif, Desain &amp; Ekspresi</p>
          <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
            Suka kebebasan berkreasi, merancang visual, media penyiaran interaktif, dan mengekspresikan gagasan inovatif.
          </p>
          <div class="space-y-space-xs mb-space-md">
            <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Karakter Kunci:</span>
            <div class="flex flex-wrap gap-space-xs pt-1">
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Imajinatif</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Estetis</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Ekspresif</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Inovatif</span>
            </div>
          </div>
        </div>
        <div class="bg-surface-container-low/70 rounded-2xl p-space-md mt-space-sm">
          <div class="flex items-center gap-1.5 mb-1.5 text-primary">
            <span class="material-symbols-outlined text-[16px]">school</span>
            <span class="font-label-sm text-label-sm font-semibold uppercase tracking-wide">Program Studi UBSI yang Cocok</span>
          </div>
          <ul class="space-y-1 font-body-sm text-body-sm text-on-surface">
            <li class="flex items-center gap-1.5">• DKV / Desain Komunikasi Visual (S1)</li>
            <li class="flex items-center gap-1.5">• Sastra Inggris (S1)</li>
            <li class="flex items-center gap-1.5">• Ilmu Komunikasi (S1)</li>
          </ul>
        </div>
      </div>

      <!-- S: Social -->
      <div class="group bg-surface-container-lowest rounded-3xl p-space-lg shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between relative overflow-hidden">
        <div class="absolute top-0 right-0 w-28 h-28 bg-emerald-500/10 rounded-bl-full pointer-events-none"></div>
        <div>
          <div class="flex items-center justify-between mb-space-md">
            <span class="w-12 h-12 rounded-2xl bg-tertiary-fixed text-tertiary flex items-center justify-center font-display text-headline-sm font-extrabold">S</span>
            <span class="px-space-sm py-1 rounded-full bg-tertiary/10 text-tertiary font-label-md text-label-md font-semibold">The Helpers</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">Social</h3>
          <p class="font-label-md text-label-md text-outline mb-space-sm">Pelayanan, Empati &amp; Relasi Manusia</p>
          <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
            Suka membantu, merawat, membimbing, berkomunikasi publik, dan berkolaborasi dalam menyelesaikan persoalan sosial.
          </p>
          <div class="space-y-space-xs mb-space-md">
            <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Karakter Kunci:</span>
            <div class="flex flex-wrap gap-space-xs pt-1">
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Empatik</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Komunikatif</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Kolaboratif</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Persuasif</span>
            </div>
          </div>
        </div>
        <div class="bg-surface-container-low/70 rounded-2xl p-space-md mt-space-sm">
          <div class="flex items-center gap-1.5 mb-1.5 text-primary">
            <span class="material-symbols-outlined text-[16px]">school</span>
            <span class="font-label-sm text-label-sm font-semibold uppercase tracking-wide">Program Studi UBSI yang Cocok</span>
          </div>
          <ul class="space-y-1 font-body-sm text-body-sm text-on-surface">
            <li class="flex items-center gap-1.5">• Keperawatan (D3)</li>
            <li class="flex items-center gap-1.5">• Psikologi Terapan (S1)</li>
            <li class="flex items-center gap-1.5">• Pariwisata (S1)</li>
            <li class="flex items-center gap-1.5">• Hubungan Masyarakat (S1)</li>
          </ul>
        </div>
      </div>

      <!-- E: Enterprising -->
      <div class="group bg-surface-container-lowest rounded-3xl p-space-lg shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between relative overflow-hidden">
        <div class="absolute top-0 right-0 w-28 h-28 bg-rose-500/10 rounded-bl-full pointer-events-none"></div>
        <div>
          <div class="flex items-center justify-between mb-space-md">
            <span class="w-12 h-12 rounded-2xl bg-rose-500/15 text-rose-600 flex items-center justify-center font-display text-headline-sm font-extrabold">E</span>
            <span class="px-space-sm py-1 rounded-full bg-rose-500/10 text-rose-700 font-label-md text-label-md font-semibold">The Persuaders</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">Enterprising</h3>
          <p class="font-label-md text-label-md text-outline mb-space-sm">Kepemimpinan, Bisnis &amp; Persuasi</p>
          <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
            Suka memimpin tim, mengelola organisasi bisnis, bernegosiasi, mengambil keputusan berisiko, dan menangkap peluang.
          </p>
          <div class="space-y-space-xs mb-space-md">
            <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Karakter Kunci:</span>
            <div class="flex flex-wrap gap-space-xs pt-1">
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Ambisius</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Visioner</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Negosiatif</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Berani Risiko</span>
            </div>
          </div>
        </div>
        <div class="bg-surface-container-low/70 rounded-2xl p-space-md mt-space-sm">
          <div class="flex items-center gap-1.5 mb-1.5 text-primary">
            <span class="material-symbols-outlined text-[16px]">school</span>
            <span class="font-label-sm text-label-sm font-semibold uppercase tracking-wide">Program Studi UBSI yang Cocok</span>
          </div>
          <ul class="space-y-1 font-body-sm text-body-sm text-on-surface">
            <li class="flex items-center gap-1.5">• Manajemen Bisnis (S1)</li>
            <li class="flex items-center gap-1.5">• Manajemen Pemasaran (S1)</li>
            <li class="flex items-center gap-1.5">• Hukum Bisnis Digital (S1)</li>
            <li class="flex items-center gap-1.5">• Magister Manajemen (S2)</li>
          </ul>
        </div>
      </div>

      <!-- C: Conventional -->
      <div class="group bg-surface-container-lowest rounded-3xl p-space-lg shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between relative overflow-hidden">
        <div class="absolute top-0 right-0 w-28 h-28 bg-indigo-500/10 rounded-bl-full pointer-events-none"></div>
        <div>
          <div class="flex items-center justify-between mb-space-md">
            <span class="w-12 h-12 rounded-2xl bg-indigo-500/15 text-indigo-600 flex items-center justify-center font-display text-headline-sm font-extrabold">C</span>
            <span class="px-space-sm py-1 rounded-full bg-indigo-500/10 text-indigo-700 font-label-md text-label-md font-semibold">The Organizers</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">Conventional</h3>
          <p class="font-label-md text-label-md text-outline mb-space-sm">Terstruktur, Data &amp; Prosedural</p>
          <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
            Suka keteraturan tata kelola, dokumentasi presisi, kepatuhan regulasi/aturan, dan ketelitian tinggi dalam angka.
          </p>
          <div class="space-y-space-xs mb-space-md">
            <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Karakter Kunci:</span>
            <div class="flex flex-wrap gap-space-xs pt-1">
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Metodis</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Teliti</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Sistematis</span>
              <span class="px-space-sm py-0.5 rounded-lg bg-surface-container-low font-label-sm text-label-sm text-on-surface-variant">Taat Aturan</span>
            </div>
          </div>
        </div>
        <div class="bg-surface-container-low/70 rounded-2xl p-space-md mt-space-sm">
          <div class="flex items-center gap-1.5 mb-1.5 text-primary">
            <span class="material-symbols-outlined text-[16px]">school</span>
            <span class="font-label-sm text-label-sm font-semibold uppercase tracking-wide">Program Studi UBSI yang Cocok</span>
          </div>
          <ul class="space-y-1 font-body-sm text-body-sm text-on-surface">
            <li class="flex items-center gap-1.5">• Akuntansi (S1)</li>
            <li class="flex items-center gap-1.5">• Sistem Informasi Akuntansi (D3)</li>
            <li class="flex items-center gap-1.5">• Manajemen Perpajakan (D3)</li>
            <li class="flex items-center gap-1.5">• Ilmu Hukum (S1)</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Hexagon Model Concept Section -->
  <section class="max-w-7xl w-full mx-auto px-margin py-space-lg">
    <div class="bg-surface-container-low rounded-3xl p-space-lg md:p-space-xl flex flex-col lg:flex-row items-center gap-space-xl">
      <!-- Interactive SVG Hexagon Diagram -->
      <div class="w-full lg:w-1/2 flex justify-center">
        <div class="relative w-full max-w-sm aspect-square flex items-center justify-center">
          <svg class="w-full h-full drop-shadow-md select-none" viewBox="0 0 400 400">
            <!-- Hexagon perimeter base -->
            <polygon fill="#ffffff" points="200,40 338,120 338,280 200,360 62,280 62,120" stroke="#bfc7d2" stroke-dasharray="4 4" stroke-width="3"></polygon>
            <!-- Interior spokes -->
            <line stroke="#dae2fd" stroke-width="2" x1="200" x2="200" y1="200" y2="40"></line>
            <line stroke="#dae2fd" stroke-width="2" x1="200" x2="338" y1="200" y2="120"></line>
            <line stroke="#dae2fd" stroke-width="2" x1="200" x2="338" y1="200" y2="280"></line>
            <line stroke="#dae2fd" stroke-width="2" x1="200" x2="200" y1="200" y2="360"></line>
            <line stroke="#dae2fd" stroke-width="2" x1="200" x2="62" y1="200" y2="280"></line>
            <line stroke="#dae2fd" stroke-width="2" x1="200" x2="62" y1="200" y2="120"></line>
            <!-- Center Badge -->
            <circle cx="200" cy="200" fill="#e2e7ff" r="38"></circle>
            <text fill="#006194" font-size="12" font-weight="700" text-anchor="middle" x="200" y="196">HOLLAND</text>
            <text fill="#006194" font-size="11" font-weight="600" text-anchor="middle" x="200" y="212">HEXAGON</text>
            <!-- Dimension Nodes -->
            <!-- R: Top (200, 40) -->
            <g transform="translate(200,40)">
              <circle fill="#f59e0b" r="26"></circle>
              <text fill="#ffffff" font-size="18" font-weight="800" text-anchor="middle" y="6">R</text>
            </g>
            <!-- I: Top Right (338, 120) -->
            <g transform="translate(338,120)">
              <circle fill="#006194" r="26"></circle>
              <text fill="#ffffff" font-size="18" font-weight="800" text-anchor="middle" y="6">I</text>
            </g>
            <!-- A: Bottom Right (338, 280) -->
            <g transform="translate(338,280)">
              <circle fill="#9333ea" r="26"></circle>
              <text fill="#ffffff" font-size="18" font-weight="800" text-anchor="middle" y="6">A</text>
            </g>
            <!-- S: Bottom (200, 360) -->
            <g transform="translate(200,360)">
              <circle fill="#00855b" r="26"></circle>
              <text fill="#ffffff" font-size="18" font-weight="800" text-anchor="middle" y="6">S</text>
            </g>
            <!-- E: Bottom Left (62, 280) -->
            <g transform="translate(62,280)">
              <circle fill="#e11d48" r="26"></circle>
              <text fill="#ffffff" font-size="18" font-weight="800" text-anchor="middle" y="6">E</text>
            </g>
            <!-- C: Top Left (62, 120) -->
            <g transform="translate(62,120)">
              <circle fill="#4f46e5" r="26"></circle>
              <text fill="#ffffff" font-size="18" font-weight="800" text-anchor="middle" y="6">C</text>
            </g>
          </svg>
        </div>
      </div>

      <!-- Hexagon Explanatory Text -->
      <div class="w-full lg:w-1/2 space-y-space-md">
        <span class="inline-flex items-center gap-1 px-space-sm py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-md text-label-md font-semibold">
          <span class="material-symbols-outlined text-[16px]">polyline</span>
          Relasi Geometris Heksagonal
        </span>
        <h3 class="font-headline-md text-headline-md text-on-surface">Mengapa Disusun Berbentuk Heksagon?</h3>
        <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
          Dalam teori psikologi karir Dr. Holland, kedekatan posisi huruf pada bidang heksagonal menggambarkan keselarasan psikologis:
        </p>
        <div class="space-y-space-sm">
          <div class="flex items-start gap-space-sm bg-surface-container-lowest p-space-md rounded-2xl shadow-sm">
            <span class="material-symbols-outlined text-primary text-[22px] flex-shrink-0 mt-0.5">near_me</span>
            <div>
              <p class="font-label-lg text-label-lg text-on-surface font-semibold">Tipe Berdampingan (Adjacent)</p>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                Memiliki korelasi kepribadian yang erat. Contohnya <strong>I (Investigative)</strong> dan <strong>A (Artistic)</strong> yang sama-sama menyukai eksplorasi pemikiran orisinal.
              </p>
            </div>
          </div>
          <div class="flex items-start gap-space-sm bg-surface-container-lowest p-space-md rounded-2xl shadow-sm">
            <span class="material-symbols-outlined text-secondary text-[22px] flex-shrink-0 mt-0.5">swap_horiz</span>
            <div>
              <p class="font-label-lg text-label-lg text-on-surface font-semibold">Tipe Berseberangan (Opposite)</p>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                Mencerminkan karakteristik komplementer atau kontras, seperti <strong>Realistic</strong> (fokus benda teknis) dan <strong>Social</strong> (fokus interaksi antarmanusia).
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- How RIASEC Works in MajorFit: 4 Horizontal Steps -->
  <section class="max-w-7xl w-full mx-auto px-margin py-space-xl">
    <div class="text-center max-w-2xl mx-auto mb-space-xl space-y-space-xs">
      <span class="font-label-md text-label-md uppercase tracking-wider text-primary font-semibold">Alur Pemetaan Ilmiah</span>
      <h2 class="font-headline-md text-headline-md text-on-surface">Bagaimana RIASEC Bekerja di MajorFit?</h2>
      <p class="font-body-sm text-body-sm text-on-surface-variant">
        Proses empat tahap komputasi presisi untuk memastikan rekomendasi program studi memiliki reliabilitas data tinggi.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter relative">
      <!-- Step 1 -->
      <div class="bg-surface-container-lowest p-space-lg rounded-3xl shadow-sm relative flex flex-col justify-between hover:shadow-md transition-shadow">
        <div>
          <div class="flex items-center justify-between mb-space-md">
            <div class="w-12 h-12 rounded-2xl bg-secondary-fixed text-secondary flex items-center justify-center font-headline-sm text-headline-sm font-bold">
              01
            </div>
            <span class="material-symbols-outlined text-secondary text-[26px]">quiz</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs font-semibold">Tes Minat &amp; Kuesioner</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Menjawab 24–30 butir pernyataan aktivitas dan ketertarikan secara objektif sesuai preferensi naluriah tanpa beban penilaian benar/salah.
          </p>
        </div>
        <div class="pt-space-md mt-space-md flex items-center gap-1.5 text-secondary font-label-sm text-label-sm font-semibold border-t border-outline-variant/30">
          <span class="material-symbols-outlined text-[16px]">schedule</span>
          Durasi 5–7 menit
        </div>
      </div>

      <!-- Step 2 -->
      <div class="bg-surface-container-lowest p-space-lg rounded-3xl shadow-sm relative flex flex-col justify-between hover:shadow-md transition-shadow">
        <div>
          <div class="flex items-center justify-between mb-space-md">
            <div class="w-12 h-12 rounded-2xl bg-primary-fixed text-primary flex items-center justify-center font-headline-sm text-headline-sm font-bold">
              02
            </div>
            <span class="material-symbols-outlined text-primary text-[26px]">calculate</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs font-semibold">Kalkulasi Skor Matriks</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Mesin inferensi menghitung bobot nilai akumulatif pada masing-masing 6 dimensi untuk menghasilkan kombinasi dominan (Holland Code).
          </p>
        </div>
        <div class="pt-space-md mt-space-md flex items-center gap-1.5 text-primary font-label-sm text-label-sm font-semibold border-t border-outline-variant/30">
          <span class="material-symbols-outlined text-[16px]">insights</span>
          Top 3 Dominan Code
        </div>
      </div>

      <!-- Step 3 -->
      <div class="bg-surface-container-lowest p-space-lg rounded-3xl shadow-sm relative flex flex-col justify-between hover:shadow-md transition-shadow">
        <div>
          <div class="flex items-center justify-between mb-space-md">
            <div class="w-12 h-12 rounded-2xl bg-tertiary-fixed text-tertiary flex items-center justify-center font-headline-sm text-headline-sm font-bold">
              03
            </div>
            <span class="material-symbols-outlined text-tertiary text-[26px]">hub</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs font-semibold">Pencocokan Kurikulum UBSI</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Algoritma mencocokkan profil minat terhadap pemetaan kompetensi mata kuliah, profil lulusan, dan peluang karir di semua fakultas UBSI.
          </p>
        </div>
        <div class="pt-space-md mt-space-md flex items-center gap-1.5 text-tertiary font-label-sm text-label-sm font-semibold border-t border-outline-variant/30">
          <span class="material-symbols-outlined text-[16px]">done_all</span>
          Akurasi Database 100%
        </div>
      </div>

      <!-- Step 4 -->
      <div class="bg-surface-container-lowest p-space-lg rounded-3xl shadow-sm relative flex flex-col justify-between hover:shadow-md transition-shadow">
        <div>
          <div class="flex items-center justify-between mb-space-md">
            <div class="w-12 h-12 rounded-2xl bg-surface-container-high text-primary flex items-center justify-center font-headline-sm text-headline-sm font-bold">
              04
            </div>
            <span class="material-symbols-outlined text-primary text-[26px]">psychology_alt</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs font-semibold">Penjelasan Personal</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Sistem merangkai resume naratif komprehensif yang memaparkan alasan psikologis mengapa program studi terpilih adalah pilihan paling tepat.
          </p>
        </div>
        <div class="pt-space-md mt-space-md flex items-center gap-1.5 text-primary font-label-sm text-label-sm font-semibold border-t border-outline-variant/30">
          <span class="material-symbols-outlined text-[16px]">description</span>
          Laporan Rekomendasi PDF
        </div>
      </div>
    </div>
  </section>

  <!-- High-Impact CTA Banner -->
  <section class="max-w-7xl w-full mx-auto px-margin py-space-xl">
    <div class="relative overflow-hidden rounded-3xl bg-primary text-on-primary p-space-lg md:p-space-xl shadow-xl">
      <div class="absolute -right-16 -top-16 w-80 h-80 rounded-full bg-primary-container/60 blur-2xl pointer-events-none"></div>
      <div class="absolute -left-12 -bottom-12 w-64 h-64 rounded-full bg-secondary-container/20 blur-xl pointer-events-none"></div>
      <div class="relative z-10 max-w-3xl space-y-space-md">
        <div class="inline-flex items-center gap-1.5 px-space-md py-1 rounded-full bg-surface-container-lowest/15 backdrop-blur-md">
          <span class="material-symbols-outlined text-[16px] text-tertiary-fixed">bolt</span>
          <span class="font-label-sm text-label-sm font-semibold text-on-primary uppercase tracking-wider">Asesmen Minat Mandiri</span>
        </div>
        <h2 class="font-headline-lg text-headline-lg text-on-primary tracking-tight leading-tight font-bold">
          Ingin Tahu Dimensi RIASEC Mana yang Paling Dominan dalam Dirimu?
        </h2>
        <p class="font-body-lg text-body-lg text-inverse-on-surface max-w-2xl leading-relaxed">
          Cari tahu program studi sarjana atau vokasi Universitas Bina Sarana Informatika yang paling selaras dengan kepribadian alamiah dan potensi karier masa depanmu.
        </p>

        <!-- CTA Feature Checkpoints -->
        <div class="flex flex-wrap items-center gap-x-space-lg gap-y-space-sm pt-space-xs">
          <div class="flex items-center gap-1.5 text-inverse-on-surface font-body-sm text-body-sm">
            <span class="material-symbols-outlined text-tertiary-fixed text-[18px]">check_circle</span>
            <span>Hanya butuh 5-7 menit</span>
          </div>
          <div class="flex items-center gap-1.5 text-inverse-on-surface font-body-sm text-body-sm">
            <span class="material-symbols-outlined text-tertiary-fixed text-[18px]">check_circle</span>
            <span>100% Bebas Biaya</span>
          </div>
          <div class="flex items-center gap-1.5 text-inverse-on-surface font-body-sm text-body-sm">
            <span class="material-symbols-outlined text-tertiary-fixed text-[18px]">check_circle</span>
            <span>Rekomendasi Berbasis Data UBSI</span>
          </div>
        </div>

        <div class="pt-space-md flex flex-col sm:flex-row items-center gap-space-md">
          <a class="w-full sm:w-auto inline-flex items-center justify-center gap-space-xs px-space-lg py-3 rounded-2xl bg-surface-container-lowest text-primary font-label-lg text-label-lg font-bold shadow-md hover:bg-surface-container-low transition-all hover:scale-105 active:scale-100" 
             href="{{ route('start-test') }}">
            <span>Mulai Tes Minat RIASEC</span>
            <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
          </a>
          <a class="w-full sm:w-auto inline-flex items-center justify-center gap-space-xs px-space-lg py-3 rounded-2xl bg-primary-container text-on-primary font-label-lg text-label-lg hover:bg-secondary transition-all" 
             href="{{ route('faculties') }}">
            <span class="material-symbols-outlined text-[20px]">info</span>
            <span>Pelajari Program Studi UBSI</span>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
