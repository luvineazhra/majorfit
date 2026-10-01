@extends('layouts.app')

@section('title', 'MajorFit UBSI - Temukan Program Studi yang Paling Fit dengan Minatmu')

@section('content')
<div class="flex flex-col w-full">
  <!-- Subtle Ambient Glows -->
  <div class="relative w-full overflow-hidden">
    <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[720px] h-[360px] bg-secondary-fixed/40 rounded-full blur-3xl pointer-events-none -z-10"></div>
    <div class="absolute top-96 -right-24 w-80 h-80 bg-tertiary-fixed/30 rounded-full blur-3xl pointer-events-none -z-10"></div>

    <!-- ==========================================
         HERO SECTION: Asymmetrical Split & Showcase
         ========================================== -->
    <section class="max-w-7xl mx-auto px-gutter pt-space-lg pb-space-lg">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center">
        <!-- Left Column: Copy & Primary Actions -->
        <div class="lg:col-span-6 flex flex-col items-start">
          <!-- Time & Data Trust Tag / UBSI Tagline Badge -->
          <div class="inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-full bg-surface-container-high/70 border border-primary-fixed shadow-sm mb-space-md">
            <span class="relative flex h-2.5 w-2.5">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-tertiary opacity-75"></span>
              <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-tertiary"></span>
            </span>
            <span class="font-label-md text-label-md text-on-surface-variant font-medium">
              Sistem Rekomendasi Program Studi Universitas Bina Sarana Informatika
            </span>
          </div>

          <!-- Hero Headline -->
          <h1 class="font-headline-lg text-headline-lg font-bold tracking-tight text-on-surface mb-space-md">
            Temukan Program Studi UBSI yang 
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary-container">Paling Fit</span>
            dengan Minatmu
          </h1>

          <!-- Hero Sub-headline -->
          <p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl mb-space-lg">
            Gunakan analisis ilmiah RIASEC untuk mengeksplorasi pilihan jurusan di Universitas Bina Sarana Informatika secara personal.
          </p>

          <!-- Primary CTA Row -->
          <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-space-md w-full sm:w-auto mb-space-lg">
            <a class="inline-flex items-center justify-center gap-space-xs px-space-lg py-3 rounded-full bg-primary text-on-primary font-label-lg text-label-lg shadow-md hover:bg-primary-container hover:shadow-lg transition-all transform hover:-translate-y-0.5" 
               href="{{ route('start-test') }}">
              <span>Mulai Tes RIASEC Sekarang</span>
              <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </a>
            <a class="inline-flex items-center justify-center gap-space-xs px-space-lg py-3 rounded-full bg-surface-container-low text-primary font-label-lg text-label-lg hover:bg-surface-container hover:text-on-surface transition-colors" 
               href="{{ route('how-it-works') }}">
              <span class="material-symbols-outlined text-[18px]">play_circle</span>
              <span>Lihat Demo Hasil</span>
            </a>
          </div>

          <!-- Social Proof Banner -->
          <div class="flex items-center gap-space-md pt-space-xs">
            <div class="flex -space-x-2">
              <div class="w-8 h-8 rounded-full bg-primary-fixed flex items-center justify-center text-on-primary-fixed font-label-sm text-label-sm shadow-sm font-bold">AK</div>
              <div class="w-8 h-8 rounded-full bg-secondary-fixed flex items-center justify-center text-on-secondary-fixed font-label-sm text-label-sm shadow-sm font-bold">NS</div>
              <div class="w-8 h-8 rounded-full bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed font-label-sm text-label-sm shadow-sm font-bold">RR</div>
              <div class="w-8 h-8 rounded-full bg-surface-container-highest flex items-center justify-center text-primary font-label-sm text-label-sm shadow-sm font-bold">+12k</div>
            </div>
            <div class="flex flex-col">
              <div class="flex items-center gap-0.5 text-tertiary">
                <span class="material-symbols-outlined text-[16px] text-amber-500" style="font-variation-settings: 'FILL' 1;">star</span>
                <span class="material-symbols-outlined text-[16px] text-amber-500" style="font-variation-settings: 'FILL' 1;">star</span>
                <span class="material-symbols-outlined text-[16px] text-amber-500" style="font-variation-settings: 'FILL' 1;">star</span>
                <span class="material-symbols-outlined text-[16px] text-amber-500" style="font-variation-settings: 'FILL' 1;">star</span>
                <span class="material-symbols-outlined text-[16px] text-amber-500" style="font-variation-settings: 'FILL' 1;">star</span>
              </div>
              <p class="font-body-sm text-body-sm text-on-surface-variant font-medium">
                Telah membantu <strong class="text-on-surface font-semibold">500+ calon mahasiswa</strong> menemukan jurusan impian di kampus UBSI.
              </p>
            </div>
          </div>
        </div>

        <!-- Right Column: Interactive Major Matching Showcase -->
        <div class="lg:col-span-6 relative mt-space-md lg:mt-0">
          <!-- Glassmorphic Mockup Container -->
          <div class="relative bg-surface-container-lowest/90 backdrop-blur-xl rounded-2xl shadow-lg border border-outline-variant/30 p-space-md sm:p-space-lg flex flex-col gap-space-sm">
            <!-- Top AI Synthesis Badge -->
            <div class="flex items-center justify-between bg-primary-fixed/30 rounded-xl px-space-md py-space-sm">
              <div class="flex items-center gap-space-xs">
                <span class="material-symbols-outlined text-primary text-[20px]" style="font-variation-settings: 'FILL' 1;">psychology</span>
                <span class="font-label-md text-label-md text-on-primary-fixed font-bold uppercase tracking-wider">HASIL HOLLAND CODE • KAMPUS UBSI</span>
              </div>
              <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-full bg-primary text-on-primary font-semibold tracking-widest">I • A • S</span>
            </div>

            <!-- Dynamic Recommendation List -->
            <div class="flex flex-col gap-space-sm pt-space-xs">
              <!-- Card 1: Informatics -->
              <div class="group relative bg-surface-container-low hover:bg-surface-container transition-all duration-200 rounded-xl p-space-md shadow-sm hover:shadow-md flex items-center justify-between gap-space-sm">
                <div class="flex items-center gap-space-sm min-w-0">
                  <div class="w-11 h-11 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[24px]">terminal</span>
                  </div>
                  <div class="min-w-0">
                    <div class="flex items-center gap-space-xs">
                      <h2 class="font-headline-sm text-headline-sm font-semibold text-on-surface truncate">S1 Teknik Informatika</h2>
                      <span class="hidden sm:inline-flex items-center px-2 py-0.5 rounded-full text-label-sm font-label-sm bg-surface-container-highest text-on-surface-variant font-medium">STEM</span>
                    </div>
                    <p class="font-body-sm text-body-sm text-on-surface-variant truncate">Fakultas Teknik &amp; Informatika • RIASEC: Investigative • Realistic</p>
                  </div>
                </div>
                <div class="shrink-0 flex flex-col items-end">
                  <span class="inline-flex items-center gap-1 px-space-sm py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm font-bold">
                    <span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                    98% Cocok
                  </span>
                </div>
              </div>

              <!-- Card 2: DKV -->
              <div class="group relative bg-surface-container-low hover:bg-surface-container transition-all duration-200 rounded-xl p-space-md shadow-sm hover:shadow-md flex items-center justify-between gap-space-sm">
                <div class="flex items-center gap-space-sm min-w-0">
                  <div class="w-11 h-11 rounded-lg bg-secondary-container/20 text-secondary flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[24px]">palette</span>
                  </div>
                  <div class="min-w-0">
                    <div class="flex items-center gap-space-xs">
                      <h2 class="font-headline-sm text-headline-sm font-semibold text-on-surface truncate">S1 Desain Komunikasi Visual (DKV)</h2>
                      <span class="hidden sm:inline-flex items-center px-2 py-0.5 rounded-full text-label-sm font-label-sm bg-surface-container-highest text-on-surface-variant font-medium">Kreatif</span>
                    </div>
                    <p class="font-body-sm text-body-sm text-on-surface-variant truncate">Fakultas Komunikasi &amp; Bahasa • RIASEC: Artistic • Enterprising</p>
                  </div>
                </div>
                <div class="shrink-0 flex flex-col items-end">
                  <span class="inline-flex items-center gap-1 px-space-sm py-1 rounded-full bg-tertiary-fixed/80 text-on-tertiary-fixed font-label-sm text-label-sm font-bold">
                    <span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                    94% Cocok
                  </span>
                </div>
              </div>

              <!-- Card 3: Digital Business -->
              <div class="group relative bg-surface-container-low hover:bg-surface-container transition-all duration-200 rounded-xl p-space-md shadow-sm hover:shadow-md flex items-center justify-between gap-space-sm">
                <div class="flex items-center gap-space-sm min-w-0">
                  <div class="w-11 h-11 rounded-lg bg-surface-container-highest text-primary flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[24px]">query_stats</span>
                  </div>
                  <div class="min-w-0">
                    <div class="flex items-center gap-space-xs">
                      <h2 class="font-headline-sm text-headline-sm font-semibold text-on-surface truncate">S1 Manajemen Bisnis Digital</h2>
                      <span class="hidden sm:inline-flex items-center px-2 py-0.5 rounded-full text-label-sm font-label-sm bg-surface-container-highest text-on-surface-variant font-medium">Bisnis</span>
                    </div>
                    <p class="font-body-sm text-body-sm text-on-surface-variant truncate">Fakultas Ekonomi &amp; Bisnis • RIASEC: Enterprising • Conventional</p>
                  </div>
                </div>
                <div class="shrink-0 flex flex-col items-end">
                  <span class="inline-flex items-center gap-1 px-space-sm py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold">
                    91% Cocok
                  </span>
                </div>
              </div>

              <!-- Card 4: Ilmu Komunikasi -->
              <div class="group relative bg-surface-container-low hover:bg-surface-container transition-all duration-200 rounded-xl p-space-md shadow-sm hover:shadow-md flex items-center justify-between gap-space-sm">
                <div class="flex items-center gap-space-sm min-w-0">
                  <div class="w-11 h-11 rounded-lg bg-surface-container-highest text-tertiary flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[24px]">campaign</span>
                  </div>
                  <div class="min-w-0">
                    <div class="flex items-center gap-space-xs">
                      <h2 class="font-headline-sm text-headline-sm font-semibold text-on-surface truncate">S1 Ilmu Komunikasi</h2>
                    </div>
                    <p class="font-body-sm text-body-sm text-on-surface-variant truncate">Fakultas Komunikasi &amp; Bahasa • RIASEC: Social • Investigative</p>
                  </div>
                </div>
                <div class="shrink-0 flex flex-col items-end">
                  <span class="inline-flex items-center gap-1 px-space-sm py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold">
                    89% Cocok
                  </span>
                </div>
              </div>

              <!-- Card 5: Sistem Informasi -->
              <div class="hidden sm:flex group relative bg-surface-container-low hover:bg-surface-container transition-all duration-200 rounded-xl p-space-md shadow-sm hover:shadow-md items-center justify-between gap-space-sm">
                <div class="flex items-center gap-space-sm min-w-0">
                  <div class="w-11 h-11 rounded-lg bg-surface-container-highest text-on-surface-variant flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[24px]">developer_board</span>
                  </div>
                  <div class="min-w-0">
                    <h2 class="font-headline-sm text-headline-sm font-semibold text-on-surface truncate">S1 Sistem Informasi</h2>
                    <p class="font-body-sm text-body-sm text-on-surface-variant truncate">Fakultas Teknik &amp; Informatika • RIASEC: Enterprising • Conventional</p>
                  </div>
                </div>
                <div class="shrink-0 flex flex-col items-end">
                  <span class="inline-flex items-center gap-1 px-space-sm py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold">
                    86% Cocok
                  </span>
                </div>
              </div>
            </div>

            <!-- Floating AI Rationale Pill -->
            <div class="bg-surface-container-lowest shadow-md rounded-xl p-space-sm flex items-start gap-space-sm mt-space-xs">
              <span class="material-symbols-outlined text-primary text-[20px] shrink-0 mt-0.5">auto_awesome</span>
              <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                <strong class="text-on-surface font-semibold">Analisis Personal AI:</strong> "Logika analitis komputasi dan kreativitas visual Anda memiliki korelasi tinggi dengan kurikulum unggulan berbasis industri di UBSI."
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- ==========================================
       SECTION 1: FITUR UNGGULAN (KENAPA MAJORFIT UBSI?)
       ========================================== -->
  <section class="w-full bg-surface-container-low py-space-xl border-b border-outline-variant/30">
    <div class="max-w-7xl mx-auto px-gutter">
      <!-- Section Header -->
      <div class="text-center max-w-2xl mx-auto mb-space-xl">
        <span class="px-space-sm py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm uppercase tracking-wider font-bold">
          KEUNGGULAN SISTEM
        </span>
        <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface mt-space-xs mb-space-sm">MajorFit UBSI</h2>
        <p class="font-body-md text-body-md text-on-surface-variant">
          Kombinasi standar psikometri internasional Holland Code dan AI prediktif yang dikalibrasi langsung dengan capaian pembelajaran di Universitas Bina Sarana Informatika.
        </p>
      </div>

      <!-- Feature Grid -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg">
        <!-- Feature 1: RIASEC Test -->
        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-outline-variant/30 hover:shadow-md transition-all flex flex-col justify-between h-full">
          <div>
            <div class="w-12 h-12 rounded-xl bg-primary-fixed/50 text-primary flex items-center justify-center mb-space-md">
              <span class="material-symbols-outlined text-[28px]">quiz</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface mb-space-xs">
              Tes Minat Holland (RIASEC)
            </h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
              Uji 6 dimensi kepribadianmu: Realistic, Investigative, Artistic, Social, Enterprising, dan Conventional.
            </p>
            <div class="grid grid-cols-2 gap-1.5 mb-space-md">
              <div class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm">
                <span class="w-2 h-2 rounded-full bg-[#ef4444]"></span>
                <span>Realistic (R)</span>
              </div>
              <div class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm">
                <span class="w-2 h-2 rounded-full bg-[#0284c7]"></span>
                <span>Investigative (I)</span>
              </div>
              <div class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm">
                <span class="w-2 h-2 rounded-full bg-[#f59e0b]"></span>
                <span>Artistic (A)</span>
              </div>
              <div class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm">
                <span class="w-2 h-2 rounded-full bg-[#10b981]"></span>
                <span>Social (S)</span>
              </div>
              <div class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm">
                <span class="w-2 h-2 rounded-full bg-[#8b5cf6]"></span>
                <span>Enterprising (E)</span>
              </div>
              <div class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm">
                <span class="w-2 h-2 rounded-full bg-[#64748b]"></span>
                <span>Conventional (C)</span>
              </div>
            </div>
          </div>
          <div class="pt-space-sm flex items-center gap-space-xs text-primary font-label-md text-label-md font-semibold border-t border-outline-variant/30">
            <span>Standar asesmen terstandarisasi</span>
            <span class="material-symbols-outlined text-[16px]">verified</span>
          </div>
        </div>

        <!-- Feature 2: Accurate Algorithm -->
        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-outline-variant/30 hover:shadow-md transition-all flex flex-col justify-between h-full">
          <div>
            <div class="w-12 h-12 rounded-xl bg-tertiary-fixed/40 text-tertiary flex items-center justify-center mb-space-md">
              <span class="material-symbols-outlined text-[28px]">track_changes</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface mb-space-xs">
              Algoritma Matching Akurat
            </h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
              Sistem mengkalkulasi kecocokan profilmu dengan karakteristik seluruh program studi yang ada di UBSI.
            </p>
            <div class="bg-surface-container-low rounded-xl p-space-md flex flex-col gap-space-xs mb-space-md">
              <div class="flex justify-between items-center font-label-sm text-label-sm">
                <span class="text-on-surface font-medium">Tingkat Kompatibilitas Matriks</span>
                <span class="text-tertiary font-bold">96.8% Akurasi Kurikulum UBSI</span>
              </div>
              <div class="w-full h-2.5 bg-surface-container-highest rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-secondary to-tertiary rounded-full" style="width: 96.8%"></div>
              </div>
              <span class="font-label-sm text-label-sm text-on-surface-variant mt-1">Dikalibrasi dari data profil alumni &amp; kurikulum aktif UBSI</span>
            </div>
          </div>
          <div class="pt-space-sm flex items-center gap-space-xs text-tertiary font-label-md text-label-md font-semibold border-t border-outline-variant/30">
            <span>Metrik skor objektif teruji</span>
            <span class="material-symbols-outlined text-[16px]">insights</span>
          </div>
        </div>

        <!-- Feature 3: Personal AI Explanation -->
        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-outline-variant/30 hover:shadow-md transition-all flex flex-col justify-between h-full">
          <div>
            <div class="w-12 h-12 rounded-xl bg-secondary-fixed/50 text-secondary flex items-center justify-center mb-space-md">
              <span class="material-symbols-outlined text-[28px]">psychology_alt</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface mb-space-xs">
              Penjelasan Personal AI
            </h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
              Dapatkan analisis naratif dari AI yang menjelaskan alasan rekomendasi jurusan UBSI serta pertimbangannya.
            </p>
            <ul class="flex flex-col gap-2 font-body-sm text-body-sm text-on-surface mb-space-md">
              <li class="flex items-center gap-2">
                <span class="material-symbols-outlined text-tertiary text-[18px]">check_circle</span>
                <span>Analisis kekuatan minat</span>
              </li>
              <li class="flex items-center gap-2">
                <span class="material-symbols-outlined text-tertiary text-[18px]">check_circle</span>
                <span>Saran persiapan masuk kuliah UBSI</span>
              </li>
              <li class="flex items-center gap-2">
                <span class="material-symbols-outlined text-tertiary text-[18px]">check_circle</span>
                <span>Prospek karir alumni UBSI</span>
              </li>
            </ul>
          </div>
          <div class="pt-space-sm flex items-center gap-space-xs text-secondary font-label-md text-label-md font-semibold border-t border-outline-variant/30">
            <span>Diberdayakan AI edukasi adaptif</span>
            <span class="material-symbols-outlined text-[16px]">smart_toy</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==========================================
       SECTION 2: EKSPLORASI FAKULTAS & JURUSAN UBSI
       ========================================== -->
  <section class="max-w-7xl mx-auto px-gutter py-space-xl w-full">
    <!-- Section Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md mb-space-xl">
      <div>
        <span class="px-space-sm py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm uppercase tracking-wider font-bold">
          PROGRAM AKADEMIK UBSI
        </span>
        <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface mt-space-xs">
          Eksplorasi Fakultas &amp; Program Studi UBSI
        </h2>
        <p class="font-body-md text-body-md text-on-surface-variant mt-1 max-w-xl">
          Jelajahi fakultas dan program studi terakreditasi di Universitas Bina Sarana Informatika yang selaras dengan minat masa depanmu.
        </p>
      </div>
      <div class="shrink-0">
        <a class="inline-flex items-center gap-space-xs px-space-md py-space-sm rounded-full bg-surface-container text-on-surface hover:bg-surface-container-high transition-colors font-label-lg text-label-lg" 
           href="{{ route('faculties') }}">
          <span>Semua Fakultas</span>
          <span class="material-symbols-outlined text-[18px]">north_east</span>
        </a>
      </div>
    </div>

    <!-- 6 Faculty Bento Matrix -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-lg">
      <!-- Fakultas 1: FTI -->
      <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-outline-variant/30 hover:shadow-md transition-all flex flex-col justify-between h-full">
        <div>
          <div class="flex items-center justify-between mb-space-md">
            <div class="w-12 h-12 rounded-xl bg-primary-fixed/60 text-primary flex items-center justify-center">
              <span class="material-symbols-outlined text-[26px]">terminal</span>
            </div>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-semibold">
              STEM &amp; Digital
            </span>
          </div>
          <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface mb-1">
            Fakultas Teknik &amp; Informatika
          </h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
            Pusat keunggulan sains rekayasa data, kecerdasan buatan, keamanan siber, dan arsitektur perangkat lunak modern.
          </p>
          <div class="flex flex-wrap gap-1.5 mb-space-md">
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Sistem Informasi</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Teknologi Informasi</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Rekayasa Perangkat Lunak</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Ilmu Komputer</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Teknik Industri</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Teknik Elektro</span>
          </div>
        </div>
        <div class="pt-space-sm bg-surface-container-low rounded-xl p-space-sm flex items-center gap-space-xs text-primary font-label-sm text-label-sm mt-auto">
          <span class="material-symbols-outlined text-[18px]">verified</span>
          <span class="font-medium">Fakultas Terakreditasi • Pusat Inovasi Digital</span>
        </div>
      </div>

      <!-- Fakultas 2: FKB -->
      <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-outline-variant/30 hover:shadow-md transition-all flex flex-col justify-between h-full">
        <div>
          <div class="flex items-center justify-between mb-space-md">
            <div class="w-12 h-12 rounded-xl bg-secondary-fixed/60 text-secondary flex items-center justify-center">
              <span class="material-symbols-outlined text-[26px]">campaign</span>
            </div>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed font-semibold">
              Creative &amp; Media
            </span>
          </div>
          <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface mb-1">
            Fakultas Komunikasi &amp; Bahasa
          </h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
            Mencetak talenta kreatif andal dalam komunikasi massa, desain visual interaktif, periklanan, dan bahasa global.
          </p>
          <div class="flex flex-wrap gap-1.5 mb-space-md">
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Ilmu Komunikasi</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Hubungan Masyarakat</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Penyiaran (Broadcasting)</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Sastra Inggris</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Periklanan (Advertising)</span>
          </div>
        </div>
        <div class="pt-space-sm bg-surface-container-low rounded-xl p-space-sm flex items-center gap-space-xs text-secondary font-label-sm text-label-sm mt-auto">
          <span class="material-symbols-outlined text-[18px]">brush</span>
          <span class="font-medium">Kreativitas &amp; Media Digital Unggulan</span>
        </div>
      </div>

      <!-- Fakultas 3: FEB -->
      <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-outline-variant/30 hover:shadow-md transition-all flex flex-col justify-between h-full">
        <div>
          <div class="flex items-center justify-between mb-space-md">
            <div class="w-12 h-12 rounded-xl bg-tertiary-fixed/60 text-tertiary flex items-center justify-center">
              <span class="material-symbols-outlined text-[26px]">monitoring</span>
            </div>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-semibold">
              Business &amp; Commerce
            </span>
          </div>
          <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface mb-1">
            Fakultas Ekonomi &amp; Bisnis
          </h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
            Mengembangkan kompetensi manajerial, akuntansi presisi, dan kewirausahaan adaptif berbasis teknologi informasi.
          </p>
          <div class="flex flex-wrap gap-1.5 mb-space-md">
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Manajemen Bisnis</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Akuntansi</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Manajemen Pemasaran</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Pariwisata</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">D3 Perhotelan</span>
          </div>
        </div>
        <div class="pt-space-sm bg-surface-container-low rounded-xl p-space-sm flex items-center gap-space-xs text-tertiary font-label-sm text-label-sm mt-auto">
          <span class="material-symbols-outlined text-[18px]">trending_up</span>
          <span class="font-medium">Peluang Karir &amp; Bisnis Global</span>
        </div>
      </div>

      <!-- Fakultas 4: FH -->
      <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-outline-variant/30 hover:shadow-md transition-all flex flex-col justify-between h-full">
        <div>
          <div class="flex items-center justify-between mb-space-md">
            <div class="w-12 h-12 rounded-xl bg-surface-container-high text-on-surface flex items-center justify-center">
              <span class="material-symbols-outlined text-[26px]">balance</span>
            </div>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-full bg-surface-container-high text-on-surface font-semibold">
              Law &amp; Diplomacy
            </span>
          </div>
          <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface mb-1">
            Fakultas Hukum
          </h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
            Mempersiapkan sarjana hukum berintegritas tinggi dengan penguasaan hukum korporasi, hukum siber, dan diplomasi modern.
          </p>
          <div class="flex flex-wrap gap-1.5 mb-space-md">
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Ilmu Hukum</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Hukum Bisnis Digital</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Hukum Siber &amp; Teknologi</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Hubungan Internasional</span>
          </div>
        </div>
        <div class="pt-space-sm bg-surface-container-low rounded-xl p-space-sm flex items-center gap-space-xs text-on-surface font-label-sm text-label-sm mt-auto">
          <span class="material-symbols-outlined text-[18px]">gavel</span>
          <span class="font-medium">Advokasi &amp; Kepastian Regulasi</span>
        </div>
      </div>

      <!-- Fakultas 5: FIK -->
      <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-outline-variant/30 hover:shadow-md transition-all flex flex-col justify-between h-full">
        <div>
          <div class="flex items-center justify-between mb-space-md">
            <div class="w-12 h-12 rounded-xl bg-tertiary-fixed/40 text-tertiary flex items-center justify-center">
              <span class="material-symbols-outlined text-[26px]">health_and_safety</span>
            </div>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-semibold">
              Healthcare &amp; Well-being
            </span>
          </div>
          <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface mb-1">
            Fakultas Ilmu Kesehatan
          </h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
            Mendidik tenaga medis dan klinis berdedikasi tinggi, berwawasan kemanusiaan, serta tanggap pelayanan publik modern.
          </p>
          <div class="flex flex-wrap gap-1.5 mb-space-md">
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Psikologi Terapan</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">D3 Keperawatan</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Administrasi Rumah Sakit</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S1 Manajemen Informasi Medis</span>
          </div>
        </div>
        <div class="pt-space-sm bg-surface-container-low rounded-xl p-space-sm flex items-center gap-space-xs text-tertiary font-label-sm text-label-sm mt-auto">
          <span class="material-symbols-outlined text-[18px]">volunteer_activism</span>
          <span class="font-medium">Dedikasi Pelayanan &amp; Empati Sosial</span>
        </div>
      </div>

      <!-- Fakultas 6: Pascasarjana & Vokasi -->
      <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-outline-variant/30 hover:shadow-md transition-all flex flex-col justify-between h-full">
        <div>
          <div class="flex items-center justify-between mb-space-md">
            <div class="w-12 h-12 rounded-xl bg-primary-fixed/40 text-primary flex items-center justify-center">
              <span class="material-symbols-outlined text-[26px]">school</span>
            </div>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-semibold">
              Master &amp; Vokasi
            </span>
          </div>
          <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface mb-1">
            Pascasarjana &amp; Program Profesi
          </h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
            Jenjang lanjutan profesional dan magister spesialis untuk akselerasi kepemimpinan industri serta sertifikasi kompetensi.
          </p>
          <div class="flex flex-wrap gap-1.5 mb-space-md">
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S2 Magister Manajemen (MM)</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">S2 Ilmu Komputer (MTI)</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">Program Profesi Kejuruan</span>
            <span class="font-label-sm text-label-sm px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-medium">Sertifikasi Industri Digital</span>
          </div>
        </div>
        <div class="pt-space-sm bg-surface-container-low rounded-xl p-space-sm flex items-center gap-space-xs text-primary font-label-sm text-label-sm mt-auto">
          <span class="material-symbols-outlined text-[18px]">workspace_premium</span>
          <span class="font-medium">Gelar Magister &amp; Sertifikasi Global</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ==========================================
       SECTION 3: HOW IT WORKS STEPPER
       ========================================== -->
  <section class="max-w-7xl mx-auto px-gutter py-space-lg w-full">
    <div class="bg-surface-container rounded-2xl p-space-lg sm:p-space-xl">
      <div class="text-center max-w-xl mx-auto mb-space-xl">
        <span class="font-label-sm text-label-sm text-primary uppercase font-bold tracking-wider">Tahapan Mudah</span>
        <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface mt-1">3 Langkah Menemukan Arah Studimu</h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg">
        <!-- Step 1 -->
        <div class="flex flex-col items-start bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-outline-variant/30 h-full justify-between">
          <div>
            <div class="w-11 h-11 rounded-full bg-primary text-on-primary flex items-center justify-center font-headline-sm text-headline-sm font-bold mb-space-md shadow-sm">
              1
            </div>
            <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface mb-space-xs">Jawab 30 Pernyataan Minat</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
              Pilih aktivitas yang paling mencerminkan kepribadian harianmu. Tanpa rumus, murni intuisi &amp; kesukaan pribadimu.
            </p>
          </div>
          <div class="mt-space-md pt-space-xs text-primary font-label-sm text-label-sm font-semibold flex items-center gap-1">
            <span class="material-symbols-outlined text-[16px]">schedule</span>
            <span>Estimasi: 5-7 Menit</span>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="flex flex-col items-start bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-outline-variant/30 h-full justify-between">
          <div>
            <div class="w-11 h-11 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center font-headline-sm text-headline-sm font-bold mb-space-md shadow-sm">
              2
            </div>
            <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface mb-space-xs">Kalkulasi RIASEC &amp; AI</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
              Algoritma sistem memetakan 6 domain Holland Code secara instan dengan matriks puluhan program studi universitas.
            </p>
          </div>
          <div class="mt-space-md pt-space-xs text-secondary font-label-sm text-label-sm font-semibold flex items-center gap-1">
            <span class="material-symbols-outlined text-[16px]">bolt</span>
            <span>Pemrosesan Real-time</span>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="flex flex-col items-start bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-outline-variant/30 h-full justify-between">
          <div>
            <div class="w-11 h-11 rounded-full bg-tertiary-container text-on-tertiary-container flex items-center justify-center font-headline-sm text-headline-sm font-bold mb-space-md shadow-sm">
              3
            </div>
            <h3 class="font-headline-sm text-headline-sm font-semibold text-on-surface mb-space-xs">Dapatkan Laporan Rekomendasi</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
              Terima hasil breakdown persentase kecocokan, prospek karir, rekomendasi fakultas, dan panduan belajar yang bisa diunduh.
            </p>
          </div>
          <div class="mt-space-md pt-space-xs text-tertiary font-label-sm text-label-sm font-semibold flex items-center gap-1">
            <span class="material-symbols-outlined text-[16px]">download</span>
            <span>Laporan PDF Lengkap</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==========================================
       CALL TO ACTION BANNER (Pre-footer)
       ========================================== -->
  <section class="max-w-7xl mx-auto px-gutter w-full pt-space-lg pb-space-lg">
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-primary to-primary-container p-space-lg sm:p-space-xl text-on-primary shadow-xl border border-white/10">
      <!-- Decorative BG circle -->
      <div class="absolute -right-16 -bottom-16 w-80 h-80 rounded-full bg-white/10 blur-2xl pointer-events-none"></div>
      <div class="relative z-10 max-w-2xl flex flex-col items-start">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/20 backdrop-blur-md text-on-primary font-label-sm text-label-sm font-medium mb-space-sm">
          <span class="material-symbols-outlined text-[16px]">school</span>
          Penerimaan Mahasiswa Baru UBSI
        </span>
        <h2 class="font-headline-lg text-headline-lg font-bold tracking-tight mb-space-xs">
          Siap Menemukan Jurusan Terbaikmu di UBSI?
        </h2>
        <p class="font-body-lg text-body-lg text-primary-fixed mb-space-lg">
          Jangan biarkan keraguan menunda langkah pertamamu. Ikuti tes minat sekarang dan dapatkan rekomendasi program studi UBSI yang paling tepat.
        </p>
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-space-md w-full sm:w-auto">
          <a class="inline-flex items-center justify-center gap-space-xs px-space-xl py-3.5 rounded-full bg-on-primary text-primary font-label-lg text-label-lg font-bold shadow-lg hover:bg-surface-container-lowest transition-all transform hover:-translate-y-0.5" 
             href="{{ route('start-test') }}">
            <span>Mulai Tes RIASEC Sekarang (Gratis) →</span>
          </a>
          <div class="flex items-center justify-center gap-space-xs text-primary-fixed font-body-sm text-body-sm">
            <span class="material-symbols-outlined text-[18px]">verified_user</span>
            <span>Tanpa registrasi kartu kredit • Instan</span>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
