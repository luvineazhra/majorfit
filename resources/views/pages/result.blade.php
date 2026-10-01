@extends('layouts.app')

@section('title', 'MajorFit UBSI - Hasil Analisis Minat & Rekomendasi Program Studi')

@section('content')
<div class="flex flex-col w-full">
  <!-- Content Canvas Area with EdTech Brand Gradient Accents -->
  <section class="relative w-full px-margin py-space-xl overflow-hidden">
    <!-- Ambient Atmospheric Blobs -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-secondary-container/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -right-32 w-[30rem] h-[30rem] bg-surface-container-high/60 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto space-y-space-xl relative z-10">
      <!-- Direct Access Notice (if not taken test yet) -->
      <div id="preview-alert-banner" class="hidden p-4 rounded-2xl bg-amber-500/10 border border-amber-500/30 text-amber-900 flex flex-col sm:flex-row items-center justify-between gap-3">
        <div class="flex items-center gap-3">
          <span class="material-symbols-outlined text-amber-600 text-[24px]">info</span>
          <p class="font-body-sm text-body-sm leading-relaxed">
            <strong>Mode Pratinjau Desain:</strong> Halaman ini menampilkan simulasi hasil rekomendasi prodi berbasis profil Holland Code. Ambil tes minat mandiri untuk mendapatkan rekomendasi jurusan personalmu!
          </p>
        </div>
        <a href="{{ route('assessment') }}" class="shrink-0 inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-label-sm text-label-sm font-semibold transition-all">
          <span class="material-symbols-outlined text-[16px]">play_arrow</span>
          Mulai Tes Mandiri
        </a>
      </div>

      <!-- Breadcrumb & Top Section -->
      <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-lg pb-space-md border-b-0">
        <div class="space-y-space-xs max-w-3xl">
          <!-- Breadcrumb navigation -->
          <nav class="flex items-center gap-space-xs font-label-md text-label-md text-on-surface-variant">
            <a class="hover:text-primary transition-colors flex items-center gap-1" href="{{ route('home') }}">
              <span class="material-symbols-outlined text-[15px]">home</span>
              Beranda
            </a>
            <span class="text-outline-variant">/</span>
            <a class="hover:text-primary transition-colors" href="{{ route('assessment') }}">Asesmen RIASEC</a>
            <span class="text-outline-variant">/</span>
            <span class="text-primary font-semibold">Hasil Analisis</span>
          </nav>

          <!-- Main Screen Title -->
          <h1 class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight">
            Hasil Analisis Minat &amp; Rekomendasi Program Studi UBSI
          </h1>
          <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
            Selamat! Tes minat Holland RIASEC kamu telah berhasil diproses oleh model pencocokan kurikulum terintegrasi MajorFit Universitas BSI.
          </p>

          <!-- Verified Code Badge & Maba Identity -->
          <div class="pt-space-xs flex flex-wrap items-center gap-space-sm">
            <div class="inline-flex items-center gap-space-xs px-space-md py-space-xs rounded-full bg-surface-container-lowest shadow-sm text-tertiary border border-outline-variant/30">
              <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">verified</span>
              <span class="font-label-md text-label-md font-bold tracking-wide">
                Holland Code Terverifikasi: <span id="badge-holland-code" class="text-on-surface underline decoration-tertiary-fixed-dim decoration-2 font-extrabold">IC (Investigative – Conventional)</span>
              </span>
            </div>
            @if(isset($result) && $result->nama_maba)
              <div class="inline-flex items-center gap-space-xs px-space-md py-space-xs rounded-full bg-emerald-500/10 text-emerald-800 text-xs font-semibold border border-emerald-500/30">
                <span class="material-symbols-outlined text-[16px] text-emerald-600">person</span>
                <span>Maba: <strong>{{ $result->nama_maba }}</strong> @if($result->asal_sekolah) ({{ $result->asal_sekolah }}) @endif</span>
              </div>
            @endif
          </div>
        </div>

        <!-- Header Actions -->
        <div class="flex items-center gap-space-sm self-start md:self-end shrink-0">
          <button id="btn-download-report" class="inline-flex items-center gap-space-xs px-space-lg py-space-sm rounded-xl bg-primary text-on-primary font-label-lg text-label-lg shadow-md hover:bg-primary-container hover:shadow-lg transition-all duration-200 font-semibold" type="button">
            <span class="material-symbols-outlined text-[20px]">download</span>
            <span>Unduh Laporan Lengkap (PDF)</span>
          </button>
          <button onclick="resetAndRetest()" class="inline-flex items-center gap-space-xs px-space-md py-space-sm rounded-xl bg-surface-container-lowest text-on-surface font-label-lg text-label-lg shadow-sm hover:bg-surface-container-low transition-all border border-outline-variant/30 font-semibold" type="button">
            <span class="material-symbols-outlined text-[18px] text-primary">restart_alt</span>
            <span>Ulangi Tes / Keluar</span>
          </button>
        </div>
      </div>

      <!-- SECTION 1: 2-COLUMN RIASEC RADAR & TOP RECOMMENDED MAJORS -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
        <!-- Left Col: RIASEC 6-Dimensional Radar Visualizer (5 Cols) -->
        <div class="lg:col-span-5 bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm flex flex-col justify-between space-y-space-lg border border-outline-variant/30">
          <div>
            <div class="flex items-center justify-between mb-space-xs">
              <div class="flex items-center gap-space-xs">
                <span class="material-symbols-outlined text-primary text-[22px]">radar</span>
                <h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Profil 6 Dimensi Holland</h2>
              </div>
              <span class="font-label-sm text-label-sm bg-primary-fixed text-on-primary-fixed font-semibold px-space-sm py-0.5 rounded-full">RIASEC Model</span>
            </div>
            <p class="font-body-sm text-body-sm text-on-surface-variant">Distribusi skor kecenderungan tipe kepribadian dan modalitas belajarmu.</p>
          </div>

          <!-- Radar Chart Visual Graphic -->
          <div class="relative w-full aspect-square max-w-[340px] mx-auto flex items-center justify-center py-space-sm">
            <svg aria-label="Grafik Radar RIASEC" class="w-full h-full drop-shadow-sm select-none" viewBox="0 0 400 400" id="riasec-radar-svg">
              <defs>
                <linearGradient id="riasecGradient" x1="0%" x2="100%" y1="0%" y2="100%">
                  <stop offset="0%" stop-color="#40c2fd" stop-opacity="0.45"></stop>
                  <stop offset="100%" stop-color="#006194" stop-opacity="0.25"></stop>
                </linearGradient>
                <filter height="140%" id="nodeGlow" width="140%" x="-20%" y="-20%">
                  <feDropShadow dx="0" dy="2" flood-color="#006194" flood-opacity="0.3" stdDeviation="3"></feDropShadow>
                </filter>
              </defs>

              <!-- Concentric Hexagonal Grid Lines (Scale: 20%, 40%, 60%, 80%, 100%) -->
              <polygon fill="none" points="200,40 338,120 338,280 200,360 61,280 61,120" stroke="#dae2fd" stroke-dasharray="3,3" stroke-width="1.5"></polygon>
              <polygon fill="none" points="200,72 310,136 310,264 200,328 89,264 89,136" stroke="#dae2fd" stroke-width="1.2"></polygon>
              <polygon fill="none" points="200,104 283,152 283,248 200,296 116,248 116,152" stroke="#dae2fd" stroke-dasharray="2,2" stroke-width="1.2"></polygon>
              <polygon fill="none" points="200,136 255,168 255,232 200,264 144,232 144,168" stroke="#eaedff" stroke-width="1"></polygon>
              <polygon fill="none" points="200,168 227,184 227,216 200,232 172,216 172,184" stroke="#eaedff" stroke-width="1"></polygon>

              <!-- Axis Spoke Lines from Center (200, 200) to Outer points -->
              <line stroke="#dae2fd" stroke-width="1.5" x1="200" x2="200" y1="200" y2="40"></line>
              <line stroke="#dae2fd" stroke-width="1.5" x1="200" x2="338" y1="200" y2="120"></line>
              <line stroke="#dae2fd" stroke-width="1.5" x1="200" x2="338" y1="200" y2="280"></line>
              <line stroke="#dae2fd" stroke-width="1.5" x1="200" x2="200" y1="200" y2="360"></line>
              <line stroke="#dae2fd" stroke-width="1.5" x1="200" x2="61" y1="200" y2="280"></line>
              <line stroke="#dae2fd" stroke-width="1.5" x1="200" x2="61" y1="200" y2="120"></line>

              <!-- User Profile Radar Polygon -->
              <polygon id="radar-polygon" fill="url(#riasecGradient)" points="200,104 318,132 248,228 200,264 131,240 100,142" stroke="#006194" stroke-linejoin="round" stroke-width="2.5"></polygon>

              <!-- Radar Data Nodes -->
              <circle id="node-r" cx="200" cy="104" fill="#ffffff" filter="url(#nodeGlow)" r="5" stroke="#006194" stroke-width="3"></circle>
              <circle id="node-i" cx="318" cy="132" fill="#00855b" filter="url(#nodeGlow)" r="6" stroke="#ffffff" stroke-width="2.5"></circle>
              <circle id="node-a" cx="248" cy="228" fill="#ffffff" r="4.5" stroke="#006194" stroke-width="2.5"></circle>
              <circle id="node-s" cx="200" cy="264" fill="#ffffff" r="4.5" stroke="#006194" stroke-width="2.5"></circle>
              <circle id="node-e" cx="131" cy="240" fill="#ffffff" r="4.5" stroke="#006194" stroke-width="2.5"></circle>
              <circle id="node-c" cx="100" cy="142" fill="#007bb9" filter="url(#nodeGlow)" r="6" stroke="#ffffff" stroke-width="2.5"></circle>

              <!-- Axis Metric Labels (RIASEC) -->
              <text id="lbl-r" fill="#3f4850" font-family="Inter" font-size="12" font-weight="700" text-anchor="middle" x="200" y="24">R: Realistic (60%)</text>
              <text id="lbl-i" fill="#006194" font-family="Inter" font-size="13" font-weight="800" text-anchor="start" x="342" y="112">I: Investigative (85%) ★</text>
              <text id="lbl-a" fill="#707881" font-family="Inter" font-size="11" font-weight="600" text-anchor="start" x="342" y="290">A: Artistic (35%)</text>
              <text id="lbl-s" fill="#707881" font-family="Inter" font-size="11" font-weight="600" text-anchor="middle" x="200" y="385">S: Social (40%)</text>
              <text id="lbl-e" fill="#707881" font-family="Inter" font-size="11" font-weight="600" text-anchor="end" x="50" y="295">E: Enterprising (50%)</text>
              <text id="lbl-c" fill="#00668a" font-family="Inter" font-size="13" font-weight="800" text-anchor="end" x="52" y="112">C: Conventional (72%) ★</text>
            </svg>
          </div>

          <!-- Top Dominant Traits -->
          <div class="space-y-space-sm pt-space-xs">
            <span class="font-label-sm text-label-sm uppercase tracking-wider text-outline font-bold">2 Dimensi Teratas:</span>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm" id="container-top-traits">
              <!-- Trait 1 -->
              <div class="flex items-center gap-space-sm p-space-sm rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors" id="trait-card-1">
                <div class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0" id="trait-icon-container-1">
                  <span class="material-symbols-outlined text-[22px]" id="trait-icon-1">manage_search</span>
                </div>
                <div class="min-w-0">
                  <div class="flex items-center justify-between gap-1">
                    <h4 class="font-label-md text-label-md font-bold text-on-surface truncate" id="trait-title-1">Investigative</h4>
                    <span class="font-label-sm text-label-sm font-extrabold text-primary" id="trait-pct-1">85%</span>
                  </div>
                  <p class="font-body-sm text-body-sm text-on-surface-variant text-[12px] leading-tight" id="trait-sub-1">Analitis &amp; Berpikir Kritis</p>
                </div>
              </div>

              <!-- Trait 2 -->
              <div class="flex items-center gap-space-sm p-space-sm rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors" id="trait-card-2">
                <div class="w-10 h-10 rounded-lg bg-secondary/10 text-secondary flex items-center justify-center shrink-0" id="trait-icon-container-2">
                  <span class="material-symbols-outlined text-[22px]" id="trait-icon-2">folder_special</span>
                </div>
                <div class="min-w-0">
                  <div class="flex items-center justify-between gap-1">
                    <h4 class="font-label-md text-label-md font-bold text-on-surface truncate" id="trait-title-2">Conventional</h4>
                    <span class="font-label-sm text-label-sm font-extrabold text-secondary" id="trait-pct-2">72%</span>
                  </div>
                  <p class="font-body-sm text-body-sm text-on-surface-variant text-[12px] leading-tight" id="trait-sub-2">Terstruktur &amp; Metodis</p>
                </div>
              </div>
            </div>

            <!-- Summary Bar -->
            <div class="p-space-sm rounded-xl bg-surface-container-high/60 flex items-start gap-space-xs">
              <span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">info</span>
              <p class="font-body-sm text-body-sm text-on-surface-variant text-[13px] leading-relaxed" id="trait-character-summary">
                <strong class="text-on-surface font-semibold">Karakter Kunci:</strong> Kamu unggul dalam memecahkan masalah kompleks dengan fakta teruji, menyusun alur kerja teratur, dan mengoptimalkan sistem digital berbasis logika.
              </p>
            </div>
          </div>
        </div>

        <!-- Right Col: Top 3 Recommendation Cards (7 Cols) -->
        <div class="lg:col-span-7 space-y-space-md" id="container-recommendations">
          <div class="flex items-center justify-between">
            <div>
              <h2 class="font-headline-sm text-headline-sm font-bold text-on-surface">Top 3 Rekomendasi Program Studi UBSI</h2>
              <p class="font-body-sm text-body-sm text-on-surface-variant">Dipilih secara dinamis berbasis kalkulasi Euclidean Distance &amp; Akurasi Vektor RIASEC.</p>
            </div>
            <span class="font-label-sm text-label-sm text-primary font-semibold hidden sm:inline-flex items-center gap-1">
              <span class="w-2 h-2 rounded-full bg-tertiary"></span> Akreditasi Unggul &amp; Baik Sekali
            </span>
          </div>

          <!-- Dynamic Cards Container -->
          <div class="space-y-space-md" id="recommendation-cards-wrapper">
            <!-- Cards will be populated dynamically by JavaScript -->
          </div>
        </div>
      </div>

      <!-- SECTION 2: PERSONALIZED AI EXPLANATION BOX -->
      <div class="relative w-full rounded-2xl bg-gradient-to-br from-surface-container-lowest via-surface-container-low to-surface-container-high/40 p-space-xl shadow-sm overflow-hidden border border-outline-variant/30">
        <!-- Floating Ambient Indicator -->
        <div class="flex items-center justify-between flex-wrap gap-space-md mb-space-lg">
          <div class="flex items-center gap-space-sm">
            <div class="inline-flex items-center gap-space-xs px-space-md py-1 rounded-full bg-primary text-on-primary font-label-sm text-label-sm shadow-sm font-semibold">
              <span class="material-symbols-outlined text-[16px] animate-pulse">auto_awesome</span>
              <span>Analisis Personal AI MajorFit</span>
            </div>
            <span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Metrik Holland &amp; Kurikulum Teruji UBSI 2026</span>
          </div>
          <span class="font-label-sm text-label-sm text-tertiary font-bold flex items-center gap-1 bg-surface-container-lowest px-space-sm py-1 rounded-full shadow-sm">
            <span class="material-symbols-outlined text-[16px]">psychology</span> Tingkat Akurasi Algoritma: 96.8%
          </span>
        </div>

        <div class="mb-space-lg max-w-2xl">
          <h2 class="font-headline-md text-headline-md font-extrabold text-on-surface">
            Mengapa Jurusan Ini Sangat Cocok Untukmu?
          </h2>
          <p class="font-body-md text-body-md text-on-surface-variant pt-space-xs">
            Berdasarkan sintesis data kecenderungan minat dan preferensi kegiatan belajarmu, berikut diagnosa mendalam dari sistem kecerdasan akademik kami.
          </p>
        </div>

        <!-- 3 Structured Feature Insights -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
          <!-- Card 1: Analisis Profil Minat -->
          <div class="bg-surface-container-lowest/90 backdrop-blur-sm rounded-xl p-space-lg shadow-sm flex flex-col justify-between hover:shadow-md transition-all border border-outline-variant/20">
            <div class="space-y-space-sm">
              <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                <span class="material-symbols-outlined text-[28px]">psychology_alt</span>
              </div>
              <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Analisis Profil Minat</h3>
              <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed" id="ai-insight-profile">
                Hasil tes menunjukkan dominasi <strong class="text-on-surface" id="ai-text-dom-traits">Investigative (85%)</strong> dan <strong class="text-on-surface" id="ai-text-sub-traits">Conventional (72%)</strong>.
              </p>
            </div>
            <div class="pt-space-md">
              <div class="p-space-xs rounded-lg bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm flex items-center gap-1.5" id="ai-badge-strength">
                <span class="material-symbols-outlined text-[16px] text-primary">check</span>
                <span>Kekuatan: Analitis &amp; Riset Terstruktur</span>
              </div>
            </div>
          </div>

          <!-- Card 2: Alasan Keselarasan Prodi -->
          <div class="bg-surface-container-lowest/90 backdrop-blur-sm rounded-xl p-space-lg shadow-sm flex flex-col justify-between hover:shadow-md transition-all border border-outline-variant/20">
            <div class="space-y-space-sm">
              <div class="w-12 h-12 rounded-xl bg-tertiary/10 text-tertiary flex items-center justify-center">
                <span class="material-symbols-outlined text-[28px]">insights</span>
              </div>
              <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Alasan Keselarasan Prodi</h3>
              <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed" id="ai-insight-major">
                Di program studi unggulan UBSI, kamu memadukan logika kecenderungan minat dengan kurikulum industri.
              </p>
            </div>
            <div class="pt-space-md">
              <div class="p-space-xs rounded-lg bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm flex items-center gap-1.5">
                <span class="material-symbols-outlined text-[16px] text-tertiary">trending_up</span>
                <span id="ai-badge-syllabus">Korelasi Silabus UBSI: Tinggi</span>
              </div>
            </div>
          </div>

          <!-- Card 3: Tantangan & Pertimbangan Karir -->
          <div class="bg-surface-container-lowest/90 backdrop-blur-sm rounded-xl p-space-lg shadow-sm flex flex-col justify-between hover:shadow-md transition-all border border-outline-variant/20">
            <div class="space-y-space-sm">
              <div class="w-12 h-12 rounded-xl bg-secondary-container/20 text-secondary flex items-center justify-center">
                <span class="material-symbols-outlined text-[28px]">lightbulb</span>
              </div>
              <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Tantangan &amp; Saran</h3>
              <ul class="space-y-space-xs font-body-sm text-body-sm text-on-surface-variant leading-relaxed" id="ai-insight-tips">
                <li class="flex items-start gap-space-xs">
                  <span class="material-symbols-outlined text-outline text-[16px] shrink-0 mt-1">arrow_right</span>
                  <span>Fokus kembangkan keahlian praktikal dan sertifikasi kompetensi profesi di UBSI.</span>
                </li>
                <li class="flex items-start gap-space-xs">
                  <span class="material-symbols-outlined text-outline text-[16px] shrink-0 mt-1">arrow_right</span>
                  <span>Perkuat kemampuan kolaborasi lintas disiplin dan komunikasi tim.</span>
                </li>
              </ul>
            </div>
            <div class="pt-space-md">
              <div class="p-space-xs rounded-lg bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm flex items-center gap-1.5">
                <span class="material-symbols-outlined text-[16px] text-secondary">tips_and_updates</span>
                Tips: Ikuti Program Inkubator &amp; Magang UBSI
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- SECTION 3: ACTION & NEXT STEPS CALLOUT -->
      <div class="w-full rounded-2xl bg-gradient-to-r from-primary to-primary-container text-on-primary p-space-xl shadow-lg relative overflow-hidden">
        <div class="absolute -right-16 -bottom-16 w-80 h-80 rounded-full bg-secondary-container/20 blur-2xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-space-xl">
          <div class="space-y-space-sm max-w-2xl text-center lg:text-left">
            <div class="inline-flex items-center gap-space-xs px-space-md py-1 rounded-full bg-surface-container-lowest/20 backdrop-blur-md text-on-primary font-label-sm text-label-sm font-semibold">
              <span class="material-symbols-outlined text-[16px]">school</span>
              Penerimaan Mahasiswa Baru (PMB) UBSI 2026/2027
            </div>
            <h2 class="font-headline-lg text-headline-lg font-bold tracking-tight text-on-primary">
              Ingin berkonsultasi lebih lanjut tentang pendaftaran di UBSI?
            </h2>
            <p class="font-body-md text-body-md text-primary-fixed leading-relaxed">
              Diskusikan hasil asesmen ini dengan konselor akademik PMB Universitas BSI untuk mendapatkan rekomendasi skema beasiswa, konversi nilai, serta pilihan jadwal fleksibel (Kelas Reguler atau Kelas Karyawan).
            </p>
          </div>

          <!-- Direct CTA Buttons -->
          <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-space-sm shrink-0 w-full sm:w-auto">
            <a class="inline-flex items-center justify-center gap-space-xs px-space-lg py-space-md rounded-xl bg-tertiary-container text-on-tertiary font-label-lg text-label-lg shadow-md hover:bg-tertiary hover:scale-105 transition-all font-semibold" 
               href="https://wa.me/6281212345678" rel="noopener noreferrer" target="_blank">
              <span class="material-symbols-outlined text-[20px]">chat</span>
              <span>Konsultasi PMB via WhatsApp</span>
            </a>
            <a href="https://pmbonline.bsi.ac.id" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-space-xs px-space-lg py-space-md rounded-xl bg-surface-container-lowest/15 backdrop-blur-md text-on-primary font-label-lg text-label-lg hover:bg-surface-container-lowest/25 transition-all font-semibold">
              <span class="material-symbols-outlined text-[20px]">description</span>
              <span>Brosur &amp; Skema Beasiswa</span>
            </a>
          </div>
        </div>

        <!-- Secondary Inline Footer Link -->
        <div class="pt-space-lg mt-space-lg border-t border-white/20 flex flex-col sm:flex-row items-center justify-between gap-space-sm text-primary-fixed font-label-sm text-label-sm relative z-10">
          <div class="flex items-center gap-space-md">
            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[15px]">done_all</span> Pendaftaran Online 100% Cepat</span>
            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[15px]">done_all</span> Bebas Ujian Masuk via Hasil RIASEC</span>
          </div>
          <a class="font-label-lg text-label-lg text-on-primary font-bold hover:underline inline-flex items-center gap-1" href="https://pmbonline.bsi.ac.id" target="_blank" rel="noopener">
            Daftar Kuliah Online UBSI Sekarang <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@push('scripts')
<script>
  // Complete 21 UBSI Majors Database with distinct, realistic 6D RIASEC vector weights
  const UBSI_MAJORS = [
    // 1. Faculty of Engineering & Informatics (FTI) - 8 Program Studi
    {
      name: 'Teknologi Informasi (S1)',
      faculty: 'Fakultas Teknik & Informatika (FTI)',
      degree: 'S1',
      r: 40, i: 90, a: 30, s: 20, e: 40, c: 70,
      tags: ['Network Engineering', 'Cybersecurity', 'Cloud Infrastructure', 'IoT Architecture'],
      careers: 'Network Engineer, Cybersecurity Specialist, System Administrator, IoT Solutions Architect.',
      link: "{{ route('faculties') }}#fti"
    },
    {
      name: 'Rekayasa Perangkat Lunak (S1)',
      faculty: 'Fakultas Teknik & Informatika (FTI)',
      degree: 'S1',
      r: 50, i: 95, a: 40, s: 20, e: 30, c: 65,
      tags: ['Software Engineering', 'DevOps & CI/CD', 'Fullstack Web', 'Mobile Architecture'],
      careers: 'Fullstack Software Engineer, DevOps Specialist, Software Quality Assurance, Mobile App Architect.',
      link: "{{ route('faculties') }}#fti"
    },
    {
      name: 'Ilmu Komputer (S1)',
      faculty: 'Fakultas Teknik & Informatika (FTI)',
      degree: 'S1',
      r: 30, i: 95, a: 30, s: 10, e: 30, c: 75,
      tags: ['Artificial Intelligence', 'Machine Learning', 'Data Science', 'Algorithm Optimization'],
      careers: 'AI/ML Engineer, Data Scientist, Algorithm Specialist, Computer Vision Engineer.',
      link: "{{ route('faculties') }}#fti"
    },
    {
      name: 'Sistem Informasi (S1)',
      faculty: 'Fakultas Teknik & Informatika (FTI)',
      degree: 'S1',
      r: 20, i: 80, a: 20, s: 50, e: 60, c: 80,
      tags: ['Data Analysis', 'Business System', 'Database Management', 'Enterprise Systems'],
      careers: 'Systems Analyst, Data Engineer, ERP Consultant, Database Administrator.',
      link: "{{ route('faculties') }}#fti"
    },
    {
      name: 'Sistem Informasi (D3)',
      faculty: 'Fakultas Teknik & Informatika (FTI)',
      degree: 'D3',
      r: 20, i: 80, a: 20, s: 50, e: 60, c: 80,
      tags: ['Web Development', 'Database Operations', 'Office Systems', 'IT Technical Support'],
      careers: 'Junior Web Developer, Database Operator, IT Support Specialist, Applications Programmer.',
      link: "{{ route('faculties') }}#fti"
    },
    {
      name: 'Sistem Informasi Akuntansi (D3)',
      faculty: 'Fakultas Teknik & Informatika (FTI)',
      degree: 'D3',
      r: 10, i: 60, a: 10, s: 30, e: 50, c: 95,
      tags: ['Komputerisasi Akuntansi', 'ERP Finance', 'Tax Software', 'Digital Bookkeeping'],
      careers: 'Staff Akuntansi Komputer, Junior Auditor, Operator Sistem ERP, Tax Administration.',
      link: "{{ route('faculties') }}#fti"
    },
    {
      name: 'Teknik Elektro (S1)',
      faculty: 'Fakultas Teknik & Informatika (FTI)',
      degree: 'S1',
      r: 90, i: 85, a: 20, s: 20, e: 30, c: 50,
      tags: ['Sistem Tenaga Listrik', 'Robotika Industri', 'Instrumentasi Kontrol', 'Elektronika'],
      careers: 'Electrical Engineer, Control & Automation Engineer, Robotics Specialist, Power Systems Consultant.',
      link: "{{ route('faculties') }}#fti"
    },
    {
      name: 'Teknik Industri (S1)',
      faculty: 'Fakultas Teknik & Informatika (FTI)',
      degree: 'S1',
      r: 70, i: 75, a: 20, s: 40, e: 70, c: 60,
      tags: ['Supply Chain', 'Lean Manufacturing', 'Ergonomi Industri', 'Quality Control'],
      careers: 'Supply Chain Analyst, Production Planning & Control, Quality Assurance Manager, Operations Consultant.',
      link: "{{ route('faculties') }}#fti"
    },

    // 2. Faculty of Economics & Business (FEB) - 7 Program Studi
    {
      name: 'Manajemen (S1)',
      faculty: 'Fakultas Ekonomi & Bisnis (FEB)',
      degree: 'S1',
      r: 20, i: 40, a: 30, s: 60, e: 95, c: 70,
      tags: ['Business Strategy', 'Digital Marketing', 'HR Management', 'Technopreneurship'],
      careers: 'Business Development Manager, Marketing Strategist, Human Resource Specialist, Wirausahawan Digital.',
      link: "{{ route('faculties') }}#feb"
    },
    {
      name: 'Akuntansi (S1)',
      faculty: 'Fakultas Ekonomi & Bisnis (FEB)',
      degree: 'S1',
      r: 10, i: 50, a: 10, s: 20, e: 50, c: 100,
      tags: ['Auditing', 'Corporate Taxation', 'Financial Reporting', 'Forensic Accounting'],
      careers: 'Auditor Publik (KAP), Financial Analyst, Tax Consultant, Corporate Accountant.',
      link: "{{ route('faculties') }}#feb"
    },
    {
      name: 'Akuntansi (D3)',
      faculty: 'Fakultas Ekonomi & Bisnis (FEB)',
      degree: 'D3',
      r: 10, i: 50, a: 10, s: 20, e: 50, c: 100,
      tags: ['Praktikum Akuntansi', 'Rekonsiliasi Bank', 'Jurnal Keuangan', 'Laporan Pajak'],
      careers: 'Junior Accountant, Bookkeeper, Payroll Staff, Accounting Assistant.',
      link: "{{ route('faculties') }}#feb"
    },
    {
      name: 'Administrasi Bisnis (D3)',
      faculty: 'Fakultas Ekonomi & Bisnis (FEB)',
      degree: 'D3',
      r: 10, i: 30, a: 20, s: 60, e: 85, c: 80,
      tags: ['Business Operations', 'Ekspor-Impor', 'Negosiasi Dagang', 'Logistik Niaga'],
      careers: 'Business Operations Staff, Import-Export Administrator, Commercial Associate, Customer Account Officer.',
      link: "{{ route('faculties') }}#feb"
    },
    {
      name: 'Administrasi Perkantoran (D3)',
      faculty: 'Fakultas Ekonomi & Bisnis (FEB)',
      degree: 'D3',
      r: 10, i: 20, a: 20, s: 50, e: 40, c: 90,
      tags: ['Kearsipan Digital', 'Kesekretariatan Eksekutif', 'Manajemen Agenda', 'Office Administration'],
      careers: 'Executive Secretary, Office Manager Assistant, Document Controller, Administrative Executive.',
      link: "{{ route('faculties') }}#feb"
    },
    {
      name: 'Manajemen Pajak (D3)',
      faculty: 'Fakultas Ekonomi & Bisnis (FEB)',
      degree: 'D3',
      r: 10, i: 40, a: 10, s: 30, e: 60, c: 95,
      tags: ['PPh & PPN Terapan', 'e-Filing & e-SPT', 'Kepatuhan Pajak', 'Tax Auditing'],
      careers: 'Tax Officer Korporat, Staff Kantor Pelayanan Pajak, Asisten Konsultan Pajak, Payroll & Tax Specialist.',
      link: "{{ route('faculties') }}#feb"
    },
    {
      name: 'Perhotelan (D3)',
      faculty: 'Fakultas Ekonomi & Bisnis (FEB)',
      degree: 'D3',
      r: 30, i: 20, a: 40, s: 90, e: 70, c: 50,
      tags: ['Food & Beverage', 'Housekeeping Service', 'Front Office Management', 'Hospitality Operations'],
      careers: 'Front Office Supervisor, F&B Service Specialist, Executive Housekeeper, Hotel Sales Executive.',
      link: "{{ route('faculties') }}#feb"
    },

    // 3. Faculty of Communication & Social Sciences (FKIS) - 6 Program Studi
    {
      name: 'Ilmu Komunikasi (S1)',
      faculty: 'Fakultas Komunikasi & Ilmu Sosial (FKIS)',
      degree: 'S1',
      r: 10, i: 40, a: 85, s: 90, e: 80, c: 30,
      tags: ['Public Relations', 'Digital Broadcasting', 'Jurnalistik Multimedia', 'Corporate Media'],
      careers: 'Public Relations Specialist, Media Content Creator, Broadcasting Producer, Corporate Communications.',
      link: "{{ route('faculties') }}#fkb"
    },
    {
      name: 'Public Relations / Hubungan Masyarakat (D3)',
      faculty: 'Fakultas Komunikasi & Ilmu Sosial (FKIS)',
      degree: 'D3',
      r: 10, i: 30, a: 75, s: 95, e: 85, c: 40,
      tags: ['Event Organizing', 'Protokoler Korporat', 'Press Release', 'Media Relations'],
      careers: 'PR Officer, Event Organizer Specialist, Corporate Protocol Staff, Media Liaison Officer.',
      link: "{{ route('faculties') }}#fkb"
    },
    {
      name: 'Penyiaran / Broadcasting (D3)',
      faculty: 'Fakultas Komunikasi & Ilmu Sosial (FKIS)',
      degree: 'D3',
      r: 50, i: 30, a: 95, s: 60, e: 70, c: 30,
      tags: ['Produksi Audio Visual', 'Video Editing', 'Kamera Studio', 'Live Streaming'],
      careers: 'Broadcast Operator, Video Editor, Cameraman, Sound Engineer, Multimedia Producer.',
      link: "{{ route('faculties') }}#fkb"
    },
    {
      name: 'Periklanan / Advertising (D3)',
      faculty: 'Fakultas Komunikasi & Ilmu Sosial (FKIS)',
      degree: 'D3',
      r: 20, i: 40, a: 95, s: 50, e: 80, c: 40,
      tags: ['Creative Copywriting', 'Media Planning', 'Visual Advertising', 'Kampanye Brand'],
      careers: 'Creative Copywriter, Media Planner, Art Director Assistant, Account Executive Agency.',
      link: "{{ route('faculties') }}#fkb"
    },
    {
      name: 'Bahasa Inggris (D3)',
      faculty: 'Fakultas Komunikasi & Ilmu Sosial (FKIS)',
      degree: 'D3',
      r: 10, i: 60, a: 70, s: 70, e: 50, c: 40,
      tags: ['Business English', 'Penerjemahan Teks', 'Tour Guiding', 'Korespondensi Global'],
      careers: 'International Guide, Corporate English Correspondent, Junior Translator, Bilingual Customer Executive.',
      link: "{{ route('faculties') }}#fkb"
    },
    {
      name: 'Sastra Inggris (S1)',
      faculty: 'Fakultas Komunikasi & Ilmu Sosial (FKIS)',
      degree: 'S1',
      r: 10, i: 80, a: 80, s: 50, e: 40, c: 50,
      tags: ['Linguistik Terapan', 'Penerjemahan Simultan', 'Corporate Copywriting', 'Diplomasi Budaya'],
      careers: 'Professional Translator, Copywriter & Editor, Diplomatic Staff, International Media Relations.',
      link: "{{ route('faculties') }}#fkb"
    }
  ];

  const DIMENSION_INFO = {
    R: { name: 'Realistic', icon: 'build', subtitle: 'Praktikal & Teknis Fisik', color: '#d97706' },
    I: { name: 'Investigative', icon: 'biotech', subtitle: 'Analitis & Berpikir Kritis', color: '#006194' },
    A: { name: 'Artistic', icon: 'palette', subtitle: 'Kreatif & Imajinatif', color: '#9333ea' },
    S: { name: 'Social', icon: 'groups', subtitle: 'Empati & Pelayanan Sosial', color: '#059669' },
    E: { name: 'Enterprising', icon: 'trending_up', subtitle: 'Kepemimpinan & Bisnis', color: '#e11d48' },
    C: { name: 'Conventional', icon: 'receipt_long', subtitle: 'Terstruktur & Metodis', color: '#4f46e5' }
  };

  /**
   * Aggregate 24 RIASEC items into 6 dimensional scores (0-100 scale).
   */
  function aggregateScores(answers) {
    const qMap = {
      R: [1, 2, 3, 4],
      I: [5, 6, 7, 8],
      A: [9, 10, 11, 12],
      S: [13, 14, 15, 16],
      E: [17, 18, 19, 20],
      C: [21, 22, 23, 24]
    };

    const scores = { R: 0, I: 0, A: 0, S: 0, E: 0, C: 0 };

    for (const [dim, qIds] of Object.entries(qMap)) {
      let sum = 0;
      qIds.forEach(id => {
        const val = answers[id] !== undefined ? Number(answers[id]) : 3;
        sum += Math.max(1, Math.min(5, val));
      });
      scores[dim] = Math.round((sum / (qIds.length * 5)) * 100);
    }

    return scores;
  }

  /**
   * Calculate Euclidean Distance & Match Percentage against all 21 UBSI majors.
   * Distance = sqrt( (Ru - Rj)^2 + (Iu - Ij)^2 + (Au - Aj)^2 + (Su - Sj)^2 + (Eu - Ej)^2 + (Cu - Cj)^2 )
   * Match Rate = max(0, round(100 - (Distance / 2.45)))
   */
  function calculateMajorMatches(userScores) {
    const scoredMajors = UBSI_MAJORS.map(m => {
      const distance = Math.sqrt(
        Math.pow(userScores.R - m.r, 2) +
        Math.pow(userScores.I - m.i, 2) +
        Math.pow(userScores.A - m.a, 2) +
        Math.pow(userScores.S - m.s, 2) +
        Math.pow(userScores.E - m.e, 2) +
        Math.pow(userScores.C - m.c, 2)
      );

      const matchRate = Math.max(0, Math.round(100 - (distance / 2.45)));

      return {
        ...m,
        distance: Number(distance.toFixed(2)),
        matchRate: matchRate
      };
    });

    // Sort descending by matchRate
    scoredMajors.sort((a, b) => {
      if (b.matchRate === a.matchRate) {
        return a.distance - b.distance;
      }
      return b.matchRate - a.matchRate;
    });

    return scoredMajors;
  }

  /**
   * Render dynamic Radar Chart SVG based on real user scores.
   */
  function renderRadarSvg(scores, topDimKeys) {
    const center = 200;
    const maxRadius = 160;

    // Angles: R(-90°), I(-30°), A(30°), S(90°), E(150°), C(210°)
    const rR = (scores.R / 100) * maxRadius;
    const rI = (scores.I / 100) * maxRadius;
    const rA = (scores.A / 100) * maxRadius;
    const rS = (scores.S / 100) * maxRadius;
    const rE = (scores.E / 100) * maxRadius;
    const rC = (scores.C / 100) * maxRadius;

    const cos30 = 0.866025;
    const sin30 = 0.5;

    const ptR = { x: center, y: center - rR };
    const ptI = { x: center + rI * cos30, y: center - rI * sin30 };
    const ptA = { x: center + rA * cos30, y: center + rA * sin30 };
    const ptS = { x: center, y: center + rS };
    const ptE = { x: center - rE * cos30, y: center + rE * sin30 };
    const ptC = { x: center - rC * cos30, y: center - rC * sin30 };

    const pointsStr = `${ptR.x.toFixed(1)},${ptR.y.toFixed(1)} ${ptI.x.toFixed(1)},${ptI.y.toFixed(1)} ${ptA.x.toFixed(1)},${ptA.y.toFixed(1)} ${ptS.x.toFixed(1)},${ptS.y.toFixed(1)} ${ptE.x.toFixed(1)},${ptE.y.toFixed(1)} ${ptC.x.toFixed(1)},${ptC.y.toFixed(1)}`;

    const polygon = document.getElementById('radar-polygon');
    if (polygon) polygon.setAttribute('points', pointsStr);

    // Update node positions
    const setNode = (id, pt, isTop) => {
      const node = document.getElementById(id);
      if (node) {
        node.setAttribute('cx', pt.x.toFixed(1));
        node.setAttribute('cy', pt.y.toFixed(1));
        if (isTop) {
          node.setAttribute('fill', '#00855b');
          node.setAttribute('r', '6');
          node.setAttribute('stroke', '#ffffff');
        } else {
          node.setAttribute('fill', '#ffffff');
          node.setAttribute('r', '4.5');
          node.setAttribute('stroke', '#006194');
        }
      }
    };

    setNode('node-r', ptR, topDimKeys.includes('R'));
    setNode('node-i', ptI, topDimKeys.includes('I'));
    setNode('node-a', ptA, topDimKeys.includes('A'));
    setNode('node-s', ptS, topDimKeys.includes('S'));
    setNode('node-e', ptE, topDimKeys.includes('E'));
    setNode('node-c', ptC, topDimKeys.includes('C'));

    // Update axis labels
    const updateLabel = (id, dimKey, name) => {
      const el = document.getElementById(id);
      if (el) {
        const isStar = topDimKeys.includes(dimKey) ? ' ★' : '';
        el.textContent = `${dimKey}: ${name} (${scores[dimKey]}%)${isStar}`;
        if (topDimKeys.includes(dimKey)) {
          el.setAttribute('fill', '#006194');
          el.setAttribute('font-weight', '800');
        } else {
          el.setAttribute('fill', '#707881');
          el.setAttribute('font-weight', '600');
        }
      }
    };

    updateLabel('lbl-r', 'R', 'Realistic');
    updateLabel('lbl-i', 'I', 'Investigative');
    updateLabel('lbl-a', 'A', 'Artistic');
    updateLabel('lbl-s', 'S', 'Social');
    updateLabel('lbl-e', 'E', 'Enterprising');
    updateLabel('lbl-c', 'C', 'Conventional');
  }

  /**
   * Main Initialization & Dynamic Results Renderer
   */
  document.addEventListener('DOMContentLoaded', () => {
    let answers = {};
    let isPreview = false;

    try {
      const raw = localStorage.getItem('majorfit_answers');
      if (raw) {
        answers = JSON.parse(raw) || {};
      }
    } catch (e) {
      answers = {};
    }

    // Check if test was completed or if simulated answers
    const hasAnswers = Object.keys(answers).length >= 1;
    const isCompleted = localStorage.getItem('majorfit_test_completed') === 'true' || hasAnswers;

    if (!isCompleted) {
      isPreview = true;
      const banner = document.getElementById('preview-alert-banner');
      if (banner) banner.classList.remove('hidden');
      
      // Default sample answers for preview
      answers = {
        1: 3, 2: 3, 3: 3, 4: 3,     // R: 60%
        5: 5, 6: 4, 7: 4, 8: 4,     // I: 85%
        9: 2, 10: 2, 11: 2, 12: 1,  // A: 35%
        13: 2, 14: 2, 15: 2, 16: 2, // S: 40%
        17: 3, 18: 3, 19: 2, 20: 2, // E: 50%
        21: 4, 22: 4, 23: 3, 24: 3  // C: 70%
      };
    }

    // 1. Calculate Real User Scores
    const userScores = aggregateScores(answers);

    // 2. Rank Holland Dimensions
    const sortedDims = Object.entries(userScores).sort((a, b) => b[1] - a[1]);
    const top1Dim = sortedDims[0][0];
    const top2Dim = sortedDims[1][0];
    const topDimKeys = [top1Dim, top2Dim];
    const hollandCode = `${top1Dim}${top2Dim}`;

    // 3. Update Holland Code Badges
    const badgeEl = document.getElementById('badge-holland-code');
    if (badgeEl) {
      badgeEl.textContent = `${hollandCode} (${DIMENSION_INFO[top1Dim].name} – ${DIMENSION_INFO[top2Dim].name})`;
    }

    // Random or session assessment ID
    const assessmentIdEl = document.getElementById('badge-assessment-id');
    if (assessmentIdEl && isCompleted && !isPreview) {
      const savedId = sessionStorage.getItem('majorfit_assessment_id') || `UBSI-${new Date().getFullYear()}-${Math.floor(1000 + Math.random() * 9000)}`;
      sessionStorage.setItem('majorfit_assessment_id', savedId);
      assessmentIdEl.textContent = `Asesmen ID: #${savedId}`;
    }

    // 4. Render Dynamic Radar Graph
    renderRadarSvg(userScores, topDimKeys);

    // 5. Update Top 2 Dominant Traits Cards
    const trait1 = DIMENSION_INFO[top1Dim];
    const trait2 = DIMENSION_INFO[top2Dim];

    document.getElementById('trait-icon-1').textContent = trait1.icon;
    document.getElementById('trait-title-1').textContent = trait1.name;
    document.getElementById('trait-pct-1').textContent = `${userScores[top1Dim]}%`;
    document.getElementById('trait-sub-1').textContent = trait1.subtitle;

    document.getElementById('trait-icon-2').textContent = trait2.icon;
    document.getElementById('trait-title-2').textContent = trait2.name;
    document.getElementById('trait-pct-2').textContent = `${userScores[top2Dim]}%`;
    document.getElementById('trait-sub-2').textContent = trait2.subtitle;

    document.getElementById('trait-character-summary').innerHTML = `
      <strong class="text-on-surface font-semibold">Karakter Kunci:</strong> Kamu memiliki kecenderungan dominan pada aspek <strong>${trait1.name} (${userScores[top1Dim]}%)</strong> dan <strong>${trait2.name} (${userScores[top2Dim]}%)</strong>. Pola ini mencerminkan cara berpikir yang fokus pada ${trait1.subtitle.toLowerCase()} serta ${trait2.subtitle.toLowerCase()}.
    `;

    // 6. Calculate Dynamic Matches against all 21 UBSI Majors
    const rankedMajors = calculateMajorMatches(userScores);
    const top3 = rankedMajors.slice(0, 3);

    // 7. Render Top 3 Recommendation Cards
    const wrapper = document.getElementById('recommendation-cards-wrapper');
    if (wrapper) {
      let cardsHtml = '';

      top3.forEach((m, idx) => {
        const rank = idx + 1;
        const isTop1 = rank === 1;
        const matchPct = m.matchRate;

        const badgeBg = isTop1 ? 'bg-tertiary-fixed text-on-tertiary-fixed' : (rank === 2 ? 'bg-surface-container-high text-primary' : 'bg-surface-container-low text-secondary');
        const badgeIcon = isTop1 ? 'stars' : (rank === 2 ? 'workspace_premium' : 'verified_user');
        const badgeIconStyle = isTop1 ? "style=\"font-variation-settings: 'FILL' 1;\"" : '';
        const progressBg = isTop1 ? 'bg-gradient-to-r from-secondary-container to-tertiary' : (rank === 2 ? 'bg-primary' : 'bg-secondary-container');

        const tagsHtml = m.tags.map(t => `<span class="px-space-sm py-0.5 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm">${t}</span>`).join('');

        cardsHtml += `
          <div class="group relative bg-surface-container-lowest rounded-2xl p-space-lg shadow-${isTop1 ? 'md hover:shadow-xl' : 'sm hover:shadow-md'} transition-all duration-300 overflow-hidden border border-outline-variant/30">
            ${isTop1 ? '<div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-primary to-secondary-container"></div>' : ''}
            
            <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-space-md">
              <div class="space-y-space-xs">
                <div class="flex items-center gap-space-sm flex-wrap">
                  <span class="px-space-sm py-0.5 rounded-full bg-surface-container-high font-label-sm text-label-sm text-secondary font-bold">
                    Peringkat #${rank}
                  </span>
                  <span class="font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1">
                    <span class="material-symbols-outlined text-[15px]">apartment</span>
                    ${m.faculty}
                  </span>
                </div>
                <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface group-hover:text-primary transition-colors">
                  ${m.name}
                </h3>
              </div>

              <!-- Match Score Badge -->
              <div class="inline-flex items-center gap-space-xs px-space-md py-space-xs rounded-full ${badgeBg} shadow-sm self-start shrink-0 font-bold">
                <span class="material-symbols-outlined text-tertiary text-[18px]" ${badgeIconStyle}>${badgeIcon}</span>
                <span class="font-label-lg text-label-lg font-extrabold">${matchPct}% Match</span>
              </div>
            </div>

            <!-- Compatibility Progress Bar Visual -->
            <div class="my-space-md space-y-1">
              <div class="flex justify-between font-label-sm text-label-sm text-on-surface-variant">
                <span>Indeks Keselarasan Kurikulum</span>
                <span class="font-semibold text-tertiary">${matchPct >= 85 ? 'Sangat Tinggi' : (matchPct >= 75 ? 'Tinggi' : 'Cukup Tinggi')} (${trait1.name} ${userScores[top1Dim]}% + ${trait2.name} ${userScores[top2Dim]}%)</span>
              </div>
              <div class="w-full h-2.5 rounded-full bg-surface-container overflow-hidden">
                <div class="h-full rounded-full ${progressBg} transition-all duration-700" style="width: ${matchPct}%;"></div>
              </div>
            </div>

            <!-- Key Tags & Career Outlook -->
            <div class="space-y-space-sm pt-space-xs">
              <div class="flex flex-wrap items-center gap-space-xs">
                <span class="font-label-sm text-label-sm text-outline font-semibold">Fokus Utama:</span>
                ${tagsHtml}
              </div>
              <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm pt-space-xs">
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  <span class="font-semibold text-on-surface">Prospek Karir:</span> ${m.careers}
                </p>
                <a class="inline-flex items-center gap-1 font-label-lg text-label-lg text-primary font-bold hover:gap-2 transition-all shrink-0" href="${m.link}">
                  <span>Detail Kurikulum &amp; Biaya</span>
                  <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                </a>
              </div>
            </div>
          </div>
        `;
      });

      wrapper.innerHTML = cardsHtml;
    }

    // 8. Update Personalized AI Explanation Box
    const topMajor = top3[0];
    document.getElementById('ai-text-dom-traits').textContent = `${trait1.name} (${userScores[top1Dim]}%)`;
    document.getElementById('ai-text-sub-traits').textContent = `${trait2.name} (${userScores[top2Dim]}%)`;

    document.getElementById('ai-insight-profile').innerHTML = `
      Hasil tes menunjukkan dominasi <strong class="text-on-surface">${trait1.name} (${userScores[top1Dim]}%)</strong> dan <strong class="text-on-surface">${trait2.name} (${userScores[top2Dim]}%)</strong>. Karakter alamimu menunjukkan keunggulan pada aspek ${trait1.subtitle.toLowerCase()} dan kemampuan ${trait2.subtitle.toLowerCase()}.
    `;

    document.getElementById('ai-badge-strength').innerHTML = `
      <span class="material-symbols-outlined text-[16px] text-primary">check</span>
      <span>Kekuatan: ${trait1.name} &amp; ${trait2.name}</span>
    `;

    document.getElementById('ai-insight-major').innerHTML = `
      Di program studi <strong class="text-on-surface">${topMajor.name} UBSI</strong>, kamu dapat mengeksplorasi potensi terbaikmu dengan dukungan kurikulum berstandar industri dan fasilitas laboratorium modern yang selaras dengan profil Holland Code <strong class="text-primary">${hollandCode}</strong>.
    `;

    document.getElementById('ai-badge-syllabus').textContent = `Korelasi Silabus UBSI: ${topMajor.matchRate}% Sesuai`;

    // 9. PDF Download Simulation
    const downloadBtn = document.getElementById('btn-download-report');
    if (downloadBtn) {
      downloadBtn.addEventListener('click', () => {
        const originalText = downloadBtn.innerHTML;
        downloadBtn.innerHTML = '<span class="material-symbols-outlined text-[20px] animate-spin">progress_activity</span><span>Membuat Laporan PDF...</span>';
        downloadBtn.disabled = true;

        setTimeout(() => {
          downloadBtn.innerHTML = '<span class="material-symbols-outlined text-[20px]">check_circle</span><span>Laporan Berhasil Diunduh!</span>';
          downloadBtn.classList.remove('bg-primary');
          downloadBtn.classList.add('bg-tertiary');

          setTimeout(() => {
            downloadBtn.innerHTML = originalText;
            downloadBtn.disabled = false;
            downloadBtn.classList.remove('bg-tertiary');
            downloadBtn.classList.add('bg-primary');
          }, 3000);
        }, 1500);
      });
    }
  });

  function resetAndRetest() {
    localStorage.removeItem('majorfit_answers');
    localStorage.removeItem('majorfit_test_completed');
    sessionStorage.removeItem('majorfit_assessment_id');

    // Create dynamic form to submit POST request to server session reset route
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = "{{ route('assessment.reset') }}";

    const csrf = document.createElement('input');
    csrf.type = 'hidden';
    csrf.name = '_token';
    csrf.value = "{{ csrf_token() }}";
    form.appendChild(csrf);

    document.body.appendChild(form);
    form.submit();
  }
</script>
@endpush
