@extends('layouts.app')

@section('title', 'MajorFit UBSI - Eksplorasi Fakultas & Program Studi')

@section('content')
<div class="flex flex-col w-full">
  <!-- Hero & Breadcrumb Section -->
  <section class="relative w-full bg-gradient-to-b from-surface-container-high/40 via-surface to-surface overflow-hidden py-space-xl">
    <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-secondary-fixed/50 blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -left-20 w-80 h-80 rounded-full bg-primary-fixed/40 blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-margin relative z-10">
      <!-- Breadcrumb -->
      <nav class="flex items-center gap-space-xs text-on-surface-variant font-label-md text-label-md mb-space-md">
        <a class="hover:text-primary transition-colors flex items-center gap-1" href="{{ route('home') }}">
          <span class="material-symbols-outlined text-[16px]">home</span>
          Beranda
        </a>
        <span class="material-symbols-outlined text-[14px] text-outline">chevron_right</span>
        <span>Eksplorasi Akademik</span>
        <span class="material-symbols-outlined text-[14px] text-outline">chevron_right</span>
        <span class="text-primary font-semibold">Katalog Fakultas &amp; Program Studi</span>
      </nav>

      <!-- Main Hero Content -->
      <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-xl">
        <div class="max-w-3xl space-y-space-md">
          <div class="inline-flex items-center gap-space-xs px-space-md py-space-xs rounded-full bg-surface-container-lowest shadow-sm text-secondary font-label-sm text-label-sm uppercase tracking-wider">
            <span class="w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
            Database PMB Terpadu 2026/2027
          </div>
          <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight font-bold">
            Eksplorasi Fakultas &amp; Program Studi <span class="text-primary">UBSI</span>
          </h1>
          <p class="font-body-lg text-body-lg text-on-surface-variant">
            Temukan informasi lengkap 5 fakultas unggulan dan seluruh program studi (D3, S1, S2) di Universitas Bina Sarana Informatika yang telah terintegrasi dengan kecocokan profil psikometri Holland RIASEC.
          </p>

          <!-- Quick Stats Pills -->
          <div class="flex flex-wrap gap-space-sm pt-space-xs">
            <div class="flex items-center gap-space-xs bg-surface-container-lowest px-space-md py-space-sm rounded-xl shadow-sm text-on-surface font-label-md text-label-md">
              <span class="material-symbols-outlined text-primary text-[18px]">domain</span>
              <span>5 Fakultas Unggulan</span>
            </div>
            <div class="flex items-center gap-space-xs bg-surface-container-lowest px-space-md py-space-sm rounded-xl shadow-sm text-on-surface font-label-md text-label-md">
              <span class="material-symbols-outlined text-secondary text-[18px]">school</span>
              <span>21 Program Studi</span>
            </div>
            <div class="flex items-center gap-space-xs bg-surface-container-lowest px-space-md py-space-sm rounded-xl shadow-sm text-on-surface font-label-md text-label-md">
              <span class="material-symbols-outlined text-tertiary text-[18px]">verified</span>
              <span>Terakreditasi Baik Sekali &amp; Unggul</span>
            </div>
            <div class="flex items-center gap-space-xs bg-surface-container-lowest px-space-md py-space-sm rounded-xl shadow-sm text-on-surface font-label-md text-label-md">
              <span class="material-symbols-outlined text-primary text-[18px]">work_history</span>
              <span>Kelas Reguler &amp; Karyawan</span>
            </div>
          </div>
        </div>

        <!-- Featured Spotlight Mini Card -->
        <div class="w-full lg:w-96 bg-surface-container-lowest p-space-lg rounded-2xl shadow-xl space-y-space-md relative overflow-hidden shrink-0">
          <div class="absolute -right-6 -bottom-6 opacity-10">
            <span class="material-symbols-outlined text-[130px] text-primary">psychology</span>
          </div>
          <div class="flex items-center justify-between">
            <span class="px-space-sm py-space-xs rounded-lg bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm uppercase font-semibold">Holland Metric</span>
            <span class="material-symbols-outlined text-tertiary text-[20px]">auto_awesome</span>
          </div>
          <div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Panduan Minat Karir</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Setiap prodi memiliki kode multidimensi RIASEC untuk memetakan kesesuaian natur kepribadian Anda.</p>
          </div>
          <div class="p-space-sm rounded-xl bg-surface-container-low flex items-center justify-between">
            <span class="font-label-sm text-label-sm text-on-surface-variant">Status Algoritma:</span>
            <span class="font-label-sm text-label-sm text-tertiary font-bold flex items-center gap-1">
              <span class="w-2 h-2 rounded-full bg-tertiary"></span> Akurat 96.8%
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Search & Interactive Filter Control Bar -->
  <section class="sticky top-20 z-40 bg-surface/90 backdrop-blur-xl shadow-sm py-space-md border-b border-outline-variant/20">
    <div class="max-w-7xl mx-auto px-margin space-y-space-md">
      <!-- Search input & Counter Row -->
      <div class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-space-md">
        <div class="relative flex-1">
          <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline text-[22px]">search</span>
          <input class="w-full pl-12 pr-10 py-3 rounded-xl bg-surface-container-lowest text-on-surface font-body-md text-body-md placeholder:text-outline shadow-sm focus:outline-none focus:ring-2 focus:ring-primary transition-all" 
                 id="search-input" 
                 oninput="searchMajors(this.value)" 
                 placeholder="Cari Program Studi di UBSI... (misal: Sistem Informasi, DKV, Akuntansi)" 
                 type="text">
          <button class="absolute right-3 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface" onclick="resetSearch()" title="Hapus pencarian">
            <span class="material-symbols-outlined text-[18px]">close</span>
          </button>
        </div>

        <div class="flex items-center justify-between md:justify-end gap-space-md">
          <span class="font-label-lg text-label-lg text-primary bg-primary-fixed/50 px-space-md py-space-sm rounded-xl font-semibold" id="major-counter">
            Menampilkan 21 Program Studi
          </span>
          <button class="inline-flex items-center gap-1 px-space-md py-space-sm rounded-xl bg-surface-container-lowest text-secondary font-label-md text-label-md shadow-sm hover:bg-surface-container transition-all" 
                  onclick="openMajorDetail('S1 Sistem Informasi', 'FTI', 'S1 Sarjana', 'Baik Sekali', 'I - C | Investigative - Conventional', 'Sistem Informasi memadukan ilmu komputasi dengan strategi manajemen bisnis untuk merancang arsitektur sistem informasi terintegrasi pada industri digital.', ['Systems Analyst', 'Data Engineer', 'IT Consultant', 'Database Administrator'], ['Analisis & Desain Sistem', 'Basis Data Terdistribusi', 'Kecerdasan Bisnis (BI)', 'Rekayasa Perangkat Lunak', 'Manajemen Proyek TI'])">
            <span class="material-symbols-outlined text-[18px]">info</span>
            <span>Lihat Contoh Detail</span>
          </button>
        </div>
      </div>

      <!-- Category Filter Tabs -->
      <div class="flex items-center gap-space-xs overflow-x-auto pb-1 scrollbar-none">
        <button class="faculty-tab-btn shrink-0 px-space-md py-space-xs rounded-xl font-label-md text-label-md transition-all bg-primary text-on-primary shadow-md font-semibold" onclick="switchTab('all', this)">
          Semua Fakultas (21)
        </button>
        <button class="faculty-tab-btn shrink-0 px-space-md py-space-xs rounded-xl font-label-md text-label-md transition-all bg-surface-container-lowest text-on-surface-variant hover:bg-surface-container font-semibold" onclick="switchTab('fti', this)">
          Teknik &amp; Informatika (8)
        </button>
        <button class="faculty-tab-btn shrink-0 px-space-md py-space-xs rounded-xl font-label-md text-label-md transition-all bg-surface-container-lowest text-on-surface-variant hover:bg-surface-container font-semibold" onclick="switchTab('fkb', this)">
          Komunikasi &amp; Bahasa (3)
        </button>
        <button class="faculty-tab-btn shrink-0 px-space-md py-space-xs rounded-xl font-label-md text-label-md transition-all bg-surface-container-lowest text-on-surface-variant hover:bg-surface-container font-semibold" onclick="switchTab('feb', this)">
          Ekonomi &amp; Bisnis (5)
        </button>
        <button class="faculty-tab-btn shrink-0 px-space-md py-space-xs rounded-xl font-label-md text-label-md transition-all bg-surface-container-lowest text-on-surface-variant hover:bg-surface-container font-semibold" onclick="switchTab('fh', this)">
          Hukum (3)
        </button>
        <button class="faculty-tab-btn shrink-0 px-space-md py-space-xs rounded-xl font-label-md text-label-md transition-all bg-surface-container-lowest text-on-surface-variant hover:bg-surface-container font-semibold" onclick="switchTab('fik', this)">
          Ilmu Kesehatan (2)
        </button>
      </div>

      <!-- Additional Filters: Degree & RIASEC -->
      <div class="flex flex-wrap items-center justify-between gap-space-sm pt-space-xs">
        <div class="flex items-center gap-space-xs flex-wrap">
          <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider mr-1">Jenjang:</span>
          <button class="degree-chip px-space-sm py-1 rounded-lg text-label-sm font-label-sm transition-all bg-primary-container text-on-primary-container font-semibold" onclick="filterDegree('all', this)">Semua</button>
          <button class="degree-chip px-space-sm py-1 rounded-lg text-label-sm font-label-sm transition-all bg-surface-container-lowest text-on-surface-variant hover:bg-surface-container" onclick="filterDegree('S1', this)">S1 Sarjana</button>
          <button class="degree-chip px-space-sm py-1 rounded-lg text-label-sm font-label-sm transition-all bg-surface-container-lowest text-on-surface-variant hover:bg-surface-container" onclick="filterDegree('D3', this)">D3 Vokasi</button>
          <button class="degree-chip px-space-sm py-1 rounded-lg text-label-sm font-label-sm transition-all bg-surface-container-lowest text-on-surface-variant hover:bg-surface-container" onclick="filterDegree('S2', this)">S2 Pascasarjana</button>
        </div>

        <div class="flex items-center gap-space-xs">
          <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider mr-1">Filter Dimensi:</span>
          <button onclick="filterRiasec('R')" class="riasec-btn px-2.5 py-1 rounded text-label-sm font-bold bg-surface-container text-on-surface-variant hover:bg-amber-100 hover:text-amber-800 transition-colors" title="Realistic">R</button>
          <button onclick="filterRiasec('I')" class="riasec-btn px-2.5 py-1 rounded text-label-sm font-bold bg-surface-container text-on-surface-variant hover:bg-sky-100 hover:text-sky-800 transition-colors" title="Investigative">I</button>
          <button onclick="filterRiasec('A')" class="riasec-btn px-2.5 py-1 rounded text-label-sm font-bold bg-surface-container text-on-surface-variant hover:bg-purple-100 hover:text-purple-800 transition-colors" title="Artistic">A</button>
          <button onclick="filterRiasec('S')" class="riasec-btn px-2.5 py-1 rounded text-label-sm font-bold bg-surface-container text-on-surface-variant hover:bg-emerald-100 hover:text-emerald-800 transition-colors" title="Social">S</button>
          <button onclick="filterRiasec('E')" class="riasec-btn px-2.5 py-1 rounded text-label-sm font-bold bg-surface-container text-on-surface-variant hover:bg-rose-100 hover:text-rose-800 transition-colors" title="Enterprising">E</button>
          <button onclick="filterRiasec('C')" class="riasec-btn px-2.5 py-1 rounded text-label-sm font-bold bg-surface-container text-on-surface-variant hover:bg-indigo-100 hover:text-indigo-800 transition-colors" title="Conventional">C</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Main Catalog Content Container -->
  <div class="max-w-7xl mx-auto px-margin py-space-xl space-y-space-xl w-full">
    <!-- SECTION 1: FTI UBSI -->
    <section class="faculty-section space-y-space-lg" data-faculty="fti" id="fti">
      <!-- Section Header -->
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm border border-outline-variant/30">
        <div class="flex items-center gap-space-md">
          <div class="w-14 h-14 rounded-2xl bg-secondary-fixed/50 flex items-center justify-center text-primary">
            <span class="material-symbols-outlined text-[32px]">terminal</span>
          </div>
          <div>
            <div class="flex items-center gap-space-xs">
              <span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-bold">Fakultas 01</span>
              <span class="text-outline">•</span>
              <span class="font-label-sm text-label-sm text-tertiary font-semibold">STEM &amp; Inovasi Teknologi Digital</span>
            </div>
            <h2 class="font-headline-md text-headline-md text-on-surface font-bold">Fakultas Teknik &amp; Informatika (FTI UBSI)</h2>
          </div>
        </div>
        <span class="self-start md:self-center font-label-md text-label-md px-space-md py-space-xs rounded-full bg-surface-container text-on-surface-variant font-semibold">8 Program Studi</span>
      </div>

      <!-- Major Cards Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
        <!-- Major 1: S2 TI -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="S2" data-riasec="I R">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm font-semibold">S2 Pascasarjana</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">S2 Teknologi Informasi</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Fokus pada arsitektur sistem cerdas, tata kelola TI perusahaan, keamanan siber lanjutan, dan riset komputasi terapan.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>I - R | Investigative - Realistic</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('S2 Teknologi Informasi', 'FTI', 'S2 Pascasarjana', 'Baik Sekali', 'I - R', 'Program Magister Teknologi Informasi mencetak pakar arsitektur sistem komputasi, kepemimpinan transformasi digital, dan keamanan siber lanjutan.', ['Chief Technology Officer', 'IT Enterprise Architect', 'Cybersecurity Director', 'Dosen / Peneliti TI'], ['Tata Kelola TI', 'Arsitektur Komputasi Awan', 'Kecerdasan Buatan Lanjut', 'Audit Keamanan Siber'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>

        <!-- Major 2: S1 RPL -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="S1" data-riasec="I R">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">S1 Sarjana</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">S1 Rekayasa Perangkat Lunak</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Mempelajari perancangan sistem piranti lunak berskala besar, DevOps, komputasi awan, dan metodologi Agile modern.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>I - R | Investigative - Realistic</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('S1 Rekayasa Perangkat Lunak', 'FTI', 'S1 Sarjana', 'Baik Sekali', 'I - R', 'Mendidik perekayasa software handal dalam membangun aplikasi skala enterprise, arsitektur microservices, dan sistem cloud modern.', ['Fullstack Software Engineer', 'DevOps Specialist', 'Software Quality Assurance', 'Mobile App Architect'], ['Pemrograman Berorientasi Objek', 'Cloud Architecture', 'DevOps & CI/CD', 'Rekayasa Kebutuhan Perangkat Lunak'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>

        <!-- Major 3: S1 Sistem Informasi -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="S1" data-riasec="I C">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">S1 Sarjana</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">S1 Sistem Informasi</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Kombinasi analisis bisnis dan teknologi data informasi untuk mendukung efisiensi operasional organisasi modern.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>I - C | Investigative - Conventional</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('S1 Sistem Informasi', 'FTI', 'S1 Sarjana', 'Baik Sekali', 'I - C', 'Sistem Informasi memadukan rekayasa teknologi dan strategi proses bisnis organisasi untuk merancang basis data dan sistem informasi terpadu.', ['Systems Analyst', 'Data Engineer', 'ERP Consultant', 'Database Administrator'], ['Analisis & Desain Sistem', 'Basis Data Relasional', 'Business Intelligence', 'Audit Sistem Informasi'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>

        <!-- Major 4: S1 Teknologi Informasi -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="S1" data-riasec="R I">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">S1 Sarjana</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">S1 Teknologi Informasi</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Mendalami infrastruktur jaringan komputer, keamanan siber, administrasi server jaringan, dan Internet of Things (IoT).
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>R - I | Realistic - Investigative</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('S1 Teknologi Informasi', 'FTI', 'S1 Sarjana', 'Baik Sekali', 'R - I', 'Fokus pada infrastruktur jaringan kabel/nirkabel, virtualisasi server, keamanan siber jaringan, dan ekosistem IoT.', ['Network Engineer', 'Cybersecurity Specialist', 'System Administrator', 'IoT Solutions Architect'], ['Jaringan Komputer Lanjut', 'Kriptografi & Keamanan Jaringan', 'Sistem Terdistribusi', 'Internet of Things'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>

        <!-- Major 5: S1 Teknik Industri -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="S1" data-riasec="R E">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">S1 Sarjana</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">S1 Teknik Industri</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Optimalisasi proses manufaktur, manajemen rantai pasok (supply chain), ergonomi industri, dan efisiensi mutu produksi.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>R - E | Realistic - Enterprising</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('S1 Teknik Industri', 'FTI', 'S1 Sarjana', 'Baik Sekali', 'R - E', 'Mendidik insinyur industri yang mengintegrasikan manusia, mesin, material, dan energi untuk efisiensi sistem produksi.', ['Supply Chain Analyst', 'Production Planning & Control', 'Quality Assurance Manager', 'Operations Consultant'], ['Pengendalian Mutu Statistik', 'Manajemen Rantai Pasok', 'Perancangan Tata Letak Pabrik', 'Ergonomi Industri'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>

        <!-- Major 6: S1 Teknik Elektro -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="S1" data-riasec="R I">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">S1 Sarjana</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">S1 Teknik Elektro</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Mempelajari sistem kelistrikan tenaga, robotika cerdas, elektronika telekomunikasi, dan otomatisasi kontrol sistem.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>R - I | Realistic - Investigative</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('S1 Teknik Elektro', 'FTI', 'S1 Sarjana', 'Baik Sekali', 'R - I', 'Fokus pada instrumentasi kendali elektronika, sistem pembangkit tenaga listrik, dan rekayasa robotika industri.', ['Electrical Engineer', 'Control & Automation Engineer', 'Robotics Specialist', 'Power Systems Consultant'], ['Rangkaian Elektrik Lanjut', 'Sistem Kendali Cerdas', 'Robotika Industri', 'Elektronika Daya'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>

        <!-- Major 7: D3 Sistem Informasi -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="D3" data-riasec="C I">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-surface-container-high text-on-surface font-label-sm text-label-sm font-semibold">D3 Vokasi</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Unggul</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">D3 Sistem Informasi</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Pendidikan kejuruan terapan dalam perancangan aplikasi basis data, web development praktis, dan pengelolaan sistem kantor.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>C - I | Conventional - Investigative</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('D3 Sistem Informasi', 'FTI', 'D3 Vokasi', 'Unggul', 'C - I', 'Vokasi aplikatif yang mencetak tenaga ahli madya pengembang sistem informasi bisnis, web programmer, dan database operator.', ['Junior Programmer', 'Database Operator', 'IT Technical Support', 'Web Developer'], ['Pemrograman Web Terapan', 'Administrasi Basis Data', 'Praktikum Desain Sistem', 'Aplikasi Perkantoran'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>

        <!-- Major 8: D3 Sistem Informasi Akuntansi -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="D3" data-riasec="C E">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-surface-container-high text-on-surface font-label-sm text-label-sm font-semibold">D3 Vokasi</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">D3 Sistem Informasi Akuntansi</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Integrasi pencatatan pembukuan keuangan akurat menggunakan software komputerisasi akuntansi dan pelaporan pajak.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>C - E | Conventional - Enterprising</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('D3 Sistem Informasi Akuntansi', 'FTI', 'D3 Vokasi', 'Baik Sekali', 'C - E', 'Mempersiapkan tenaga teknisi akuntansi komputer yang mahir mengoperasikan software audit, pelaporan keuangan, dan perpajakan digital.', ['Staff Akuntansi Komputer', 'Junior Auditor', 'Operator Sistem ERP', 'Tax Administration'], ['Komputerisasi Akuntansi', 'Sistem Informasi Perpajakan', 'Praktikum Akuntansi Keuangan', 'Audit Keuangan Digital'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>
      </div>
    </section>

    <!-- SECTION 2: FKB UBSI -->
    <section class="faculty-section space-y-space-lg" data-faculty="fkb" id="fkb">
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm border border-outline-variant/30">
        <div class="flex items-center gap-space-md">
          <div class="w-14 h-14 rounded-2xl bg-secondary-fixed/50 flex items-center justify-center text-secondary">
            <span class="material-symbols-outlined text-[32px]">campaign</span>
          </div>
          <div>
            <div class="flex items-center gap-space-xs">
              <span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-bold">Fakultas 02</span>
              <span class="text-outline">•</span>
              <span class="font-label-sm text-label-sm text-tertiary font-semibold">Media Kreatif &amp; Komunikasi Global</span>
            </div>
            <h2 class="font-headline-md text-headline-md text-on-surface font-bold">Fakultas Komunikasi &amp; Bahasa (FKB UBSI)</h2>
          </div>
        </div>
        <span class="self-start md:self-center font-label-md text-label-md px-space-md py-space-xs rounded-full bg-surface-container text-on-surface-variant font-semibold">3 Program Studi</span>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
        <!-- Major 1: S1 Ilkom -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="S1" data-riasec="A S">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">S1 Sarjana</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Unggul</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">S1 Ilmu Komunikasi</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Mempelajari strategi relasi publik, penyiaran televisi &amp; digital, jurnalistik modern, dan manajemen media sosial.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>A - S | Artistic - Social</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('S1 Ilmu Komunikasi', 'FKB', 'S1 Sarjana', 'Unggul', 'A - S', 'Mencetak profesional komunikasi yang mahir dalam penyiaran multimedia, manajemen citra reputasi lembaga, dan periklanan digital.', ['Public Relations Specialist', 'Media Content Creator', 'Broadcasting Producer', 'Corporate Communications'], ['Teori Komunikasi Kontemporer', 'Produksi Siaran Digital', 'Manajemen Reputasi PR', 'Jurnalistik Multimedia'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>

        <!-- Major 2: S1 Sastra Inggris -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="S1" data-riasec="A S">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">S1 Sarjana</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">S1 Sastra Inggris</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Penguasaan bahasa Inggris profesional, penerjemahan lisan &amp; teks (translating), linguistik korporat, dan diplomasi antarbudaya.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>A - S | Artistic - Social</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('S1 Sastra Inggris', 'FKB', 'S1 Sarjana', 'Baik Sekali', 'A - S', 'Mengembangkan kompetensi bahasa Inggris tingkat tinggi untuk keperluan diplomasi, penerjemahan dokumen legal, dan industri penerbitan global.', ['Professional Translator', 'Copywriter & Editor', 'Diplomatic Staff', 'International Media Relations'], ['Linguistik Terapan', 'Penerjemahan Teks & Simultan', 'English for Business Communication', 'Kajian Sastra & Budaya'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>

        <!-- Major 3: D3 Humas -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="D3" data-riasec="S E">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-surface-container-high text-on-surface font-label-sm text-label-sm font-semibold">D3 Vokasi</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">D3 Hubungan Masyarakat</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Keahlian praktis protokoler korporat, penulisan siaran pers media, event organizing, dan pelayanan customer care publik.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>S - E | Social - Enterprising</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('D3 Hubungan Masyarakat', 'FKB', 'D3 Vokasi', 'Baik Sekali', 'S - E', 'Vokasi aplikatif yang mendidik teknisi kehumasan, protokol kepresidenan/kantor, serta manajer acara publik.', ['PR Officer', 'Event Organizer Specialist', 'Corporate Protocol Staff', 'Media Liaison Officer'], ['Teknik Penulisan Naskah Humas', 'Manajemen Event & Protokoler', 'Customer Relationship', 'Fotografi & Video Humas'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>
      </div>
    </section>

    <!-- SECTION 3: FEB UBSI -->
    <section class="faculty-section space-y-space-lg" data-faculty="feb" id="feb">
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm border border-outline-variant/30">
        <div class="flex items-center gap-space-md">
          <div class="w-14 h-14 rounded-2xl bg-tertiary-fixed/60 text-tertiary flex items-center justify-center">
            <span class="material-symbols-outlined text-[32px]">monitoring</span>
          </div>
          <div>
            <div class="flex items-center gap-space-xs">
              <span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-bold">Fakultas 03</span>
              <span class="text-outline">•</span>
              <span class="font-label-sm text-label-sm text-tertiary font-semibold">Keuangan, Bisnis Digital &amp; Hospitaliti</span>
            </div>
            <h2 class="font-headline-md text-headline-md text-on-surface font-bold">Fakultas Ekonomi &amp; Bisnis (FEB UBSI)</h2>
          </div>
        </div>
        <span class="self-start md:self-center font-label-md text-label-md px-space-md py-space-xs rounded-full bg-surface-container text-on-surface-variant font-semibold">5 Program Studi</span>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
        <!-- Major 1: S1 Manajemen -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="S1" data-riasec="E C">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">S1 Sarjana</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Unggul</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">S1 Manajemen</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Membentuk manajer berdaya saing global, penguasa strategi pemasaran digital, operasional korporat, dan kepemimpinan SDM.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>E - C | Enterprising - Conventional</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('S1 Manajemen', 'FEB', 'S1 Sarjana', 'Unggul', 'E - C', 'Fokus pada strategi manajerial, kewirausahaan berbasis teknologi (technopreneurship), dan pemasaran omnichannel.', ['Business Development Manager', 'Marketing Strategist', 'Human Resource Specialist', 'Wirausahawan Digital'], ['Manajemen Strategik', 'Pemasaran Digital', 'Manajemen Keuangan Korporat', 'Kepemimpinan & Organisasi'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>

        <!-- Major 2: S1 Akuntansi -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="S1" data-riasec="C I">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">S1 Sarjana</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">S1 Akuntansi</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Mempersiapkan akuntan profesional dalam audit laporan keuangan, perpajakan korporasi, analisis investasi, dan forensic accounting.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>C - I | Conventional - Investigative</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('S1 Akuntansi', 'FEB', 'S1 Sarjana', 'Baik Sekali', 'C - I', 'Mendidik akuntan berintegritas tinggi dengan sertifikasi kompetensi auditor, konsultan pajak, dan analis data keuangan.', ['Auditor Publik (KAP)', 'Financial Analyst', 'Tax Consultant', 'Corporate Accountant'], ['Akuntansi Keuangan Lanjut', 'Pengauditan & Asurans', 'Manajemen Perpajakan', 'Analisis Laporan Keuangan'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>

        <!-- Major 3: S1 Pariwisata -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="S1" data-riasec="E S">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">S1 Sarjana</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">S1 Pariwisata</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Pengelolaan destinasi wisata berkelanjutan, industri perhotelan bintang lima, MICE, dan biro perjalanan wisata global.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>E - S | Enterprising - Social</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('S1 Pariwisata', 'FEB', 'S1 Sarjana', 'Baik Sekali', 'E - S', 'Mencetak manajer destinasi wisata modern, konsultan ecotourism, dan pengusaha biro perjalanan internasional.', ['Tourism Destination Manager', 'MICE Event Specialist', 'Hospitality Consultant', 'Travel Agency Director'], ['Manajemen Destinasi Pariwisata', 'Hospitality Management', 'Ecotourism & Keberlanjutan', 'Pemasaran Pariwisata Global'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>

        <!-- Major 4: D3 Perhotelan -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="D3" data-riasec="S E">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-surface-container-high text-on-surface font-label-sm text-label-sm font-semibold">D3 Vokasi</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Unggul</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">D3 Perhotelan</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Keahlian praktikal food &amp; beverage service, housekeeping management, front office hospitality, dan standar pelayanan hotel berbintang.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>S - E | Social - Enterprising</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('D3 Perhotelan', 'FEB', 'D3 Vokasi', 'Unggul', 'S - E', 'Program vokasi unggulan perhotelan dengan fasilitas lab modern berstandar internasional dan magang kerja di hotel bintang 5.', ['Front Office Supervisor', 'F&B Service Specialist', 'Executive Housekeeper', 'Hotel Sales Executive'], ['Operasional Kantor Depan', 'Tata Hidang & Kuliner', 'Tata Graha (Housekeeping)', 'Manajemen Pelayanan Tamu'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>

        <!-- Major 5: D3 Manajemen Perpajakan -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="D3" data-riasec="C E">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-surface-container-high text-on-surface font-label-sm text-label-sm font-semibold">D3 Vokasi</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">D3 Manajemen Perpajakan</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Spesialisasi penghitungan PPh, PPN, administrasi kepatuhan pajak kantor (e-Faktur, e-SPT), dan sengketa pajak bisnis.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>C - E | Conventional - Enterprising</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('D3 Manajemen Perpajakan', 'FEB', 'D3 Vokasi', 'Baik Sekali', 'C - E', 'Menghasilkan ahli madya perpajakan yang siap pakai untuk mengurus pelaporan pajak perusahaan swasta maupun instansi pemerintah.', ['Tax Officer Korporat', 'Staff Kantor Pelayanan Pajak', 'Asisten Konsultan Pajak', 'Payroll & Tax Specialist'], ['PPh Pemotongan & Pemungutan', 'PPN & PPnBM Terapan', 'Praktik e-Filing & e-SPT', 'Ketentuan Umum Perpajakan'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>
      </div>
    </section>

    <!-- SECTION 4: FH UBSI -->
    <section class="faculty-section space-y-space-lg" data-faculty="fh" id="fh">
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm border border-outline-variant/30">
        <div class="flex items-center gap-space-md">
          <div class="w-14 h-14 rounded-2xl bg-surface-container-high text-on-surface flex items-center justify-center">
            <span class="material-symbols-outlined text-[32px]">balance</span>
          </div>
          <div>
            <div class="flex items-center gap-space-xs">
              <span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-bold">Fakultas 04</span>
              <span class="text-outline">•</span>
              <span class="font-label-sm text-label-sm text-tertiary font-semibold">Kepastian Hukum &amp; Advokasi Siber</span>
            </div>
            <h2 class="font-headline-md text-headline-md text-on-surface font-bold">Fakultas Hukum (FH UBSI)</h2>
          </div>
        </div>
        <span class="self-start md:self-center font-label-md text-label-md px-space-md py-space-xs rounded-full bg-surface-container text-on-surface-variant font-semibold">3 Program Studi</span>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
        <!-- Major 1: S1 Ilmu Hukum -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="S1" data-riasec="I E">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">S1 Sarjana</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">S1 Ilmu Hukum</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Mempelajari hukum pidana, perdata, hukum acara peradilan, tata negara, dan advokasi perlindungan hak asasi.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>I - E | Investigative - Enterprising</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('S1 Ilmu Hukum', 'FH', 'S1 Sarjana', 'Baik Sekali', 'I - E', 'Mempersiapkan sarjana hukum berintegritas tinggi yang siap berkarir sebagai advokat, hakim, jaksa, atau konsultan hukum institusi.', ['Advokat / Pengacara', 'Hakim / Jaksa', 'Legal Officer Korporat', 'Konsultan Hukum Regulasi'], ['Hukum Acara Perdata & Pidana', 'Hukum Perjanjian Bisnis', 'Hukum Administrasi Negara', 'Teknik Perancangan Kontrak'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>

        <!-- Major 2: S1 Hukum Bisnis Digital -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="S1" data-riasec="E C">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">S1 Sarjana</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">S1 Hukum Bisnis Digital</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Fokus pada regulasi e-commerce, perlindungan data pribadi (PDP), kontrak elektronik, fintech, dan merger korporasi.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>E - C | Enterprising - Conventional</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('S1 Hukum Bisnis Digital', 'FH', 'S1 Sarjana', 'Baik Sekali', 'E - C', 'Spesialisasi hukum modern yang merespon ledakan ekosistem fintech, perlindungan kekayaan intelektual digital, dan kepatuhan regulasi transaksi online.', ['Fintech Legal Analyst', 'Compliance Officer Startup', 'IPR Specialist', 'Corporate Counsel'], ['Hukum Transaksi Elektronik', 'Regulasi Perlindungan Data Pribadi', 'Hukum Perbankan & Fintech', 'Legal Due Diligence'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>

        <!-- Major 3: S1 Hukum Siber & Teknologi -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="S1" data-riasec="I C">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">S1 Sarjana</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">S1 Hukum Siber &amp; Teknologi</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Mendalami regulasi kejahatan siber (cybercrime), bukti digital forensik hukum, hak kekayaan industri AI, dan etika algoritma.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>I - C | Investigative - Conventional</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('S1 Hukum Siber & Teknologi', 'FH', 'S1 Sarjana', 'Baik Sekali', 'I - C', 'Fokus pada hukum pembuktian forensik digital, penanganan kasus peretasan dan kebocoran data, serta regulasi kecerdasan buatan.', ['Cyber Law Specialist', 'Digital Forensics Legal Advisor', 'Government Cybersecurity Regulatory Staff', 'Legal Tech Consultant'], ['Hukum Kejahatan Siber (UU ITE)', 'Forensik Bukti Digital', 'Etika & Regulasi AI', 'Hukum Telekomunikasi'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>
      </div>
    </section>

    <!-- SECTION 5: FIK UBSI -->
    <section class="faculty-section space-y-space-lg" data-faculty="fik" id="fik">
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm border border-outline-variant/30">
        <div class="flex items-center gap-space-md">
          <div class="w-14 h-14 rounded-2xl bg-tertiary-fixed/40 text-tertiary flex items-center justify-center">
            <span class="material-symbols-outlined text-[32px]">health_and_safety</span>
          </div>
          <div>
            <div class="flex items-center gap-space-xs">
              <span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-bold">Fakultas 05</span>
              <span class="text-outline">•</span>
              <span class="font-label-sm text-label-sm text-tertiary font-semibold">Pelayanan Klinis &amp; Humaniora</span>
            </div>
            <h2 class="font-headline-md text-headline-md text-on-surface font-bold">Fakultas Ilmu Kesehatan (FIK UBSI)</h2>
          </div>
        </div>
        <span class="self-start md:self-center font-label-md text-label-md px-space-md py-space-xs rounded-full bg-surface-container text-on-surface-variant font-semibold">2 Program Studi</span>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
        <!-- Major 1: D3 Keperawatan -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="D3" data-riasec="S R">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-surface-container-high text-on-surface font-label-sm text-label-sm font-semibold">D3 Vokasi</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">D3 Keperawatan</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Mendidik perawat terampil berdedikasi tinggi dalam asuhan keperawatan medis bedah, gawat darurat, maternitas, dan komunitas.
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>S - R | Social - Realistic</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('D3 Keperawatan', 'FIK', 'D3 Vokasi', 'Baik Sekali', 'S - R', 'Pendidikan tenaga perawat vokasional yang dibekali keterampilan klinis komprehensif di rumah sakit mitra dan sertifikasi kompetensi STR.', ['Perawat Pelaksana Rumah Sakit', 'Perawat Gawat Darurat (ICU/UGD)', 'Perawat Komunitas & Puskesmas', 'Perawat Layanan Homecare'], ['Keperawatan Medikal Bedah', 'Asuhan Keperawatan Gawat Darurat', 'Farmakologi Keperawatan', 'Praktik Klinik Keperawatan'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>

        <!-- Major 2: D3 Kebidanan -->
        <article class="major-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all flex flex-col justify-between group border border-outline-variant/30" data-degree="D3" data-riasec="S R">
          <div class="space-y-space-sm">
            <div class="flex items-start justify-between gap-2">
              <span class="px-space-sm py-space-xs rounded-md bg-surface-container-high text-on-surface font-label-sm text-label-sm font-semibold">D3 Vokasi</span>
              <span class="px-space-sm py-space-xs rounded-md bg-tertiary-fixed/30 text-tertiary font-label-sm text-label-sm font-semibold">Baik Sekali</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold group-hover:text-primary transition-colors">D3 Kebidanan</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
              Pelayanan kesehatan ibu, kehamilan, persalinan fisiologis, perawatan bayi baru lahir, dan program keluarga berencana (KB).
            </p>
          </div>
          <div class="mt-space-lg pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg p-space-lg rounded-b-2xl flex items-center justify-between border-t border-outline-variant/20">
            <div class="flex items-center gap-1 font-label-sm text-label-sm text-secondary font-bold">
              <span class="material-symbols-outlined text-[16px]">psychology</span>
              <span>S - R | Social - Realistic</span>
            </div>
            <button class="text-primary hover:text-primary-container p-1 rounded-full transition-colors" onclick="openMajorDetail('D3 Kebidanan', 'FIK', 'D3 Vokasi', 'Baik Sekali', 'S - R', 'Mendidik bidan profesional yang memiliki keterampilan praktis dalam pertolongan persalinan normal, perawatan neonatus, dan penyuluhan kesehatan keluarga.', ['Bidan Pelaksana Rumah Sakit / Klinik', 'Bidan Praktik Mandiri (BPM)', 'Penyuluh Kesehatan Ibu & Anak', 'Konselor Keluarga Berencana'], ['Asuhan Kebidanan Kehamilan', 'Asuhan Persalinan Normal', 'Pelayanan KB & Kesehatan Reproduksi', 'Keterampilan Klinik Praktik Bidan'])">
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </button>
          </div>
        </article>
      </div>
    </section>
  </div>
</div>

<!-- ==========================================
     OFFCANVAS SLIDE-OVER DRAWER FOR PROGRAM DETAIL
     ========================================== -->
<div id="drawer-backdrop" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm transition-opacity opacity-0 pointer-events-none" onclick="closeMajorDetail()"></div>

<div id="major-drawer" class="fixed top-0 right-0 z-50 h-full w-full max-w-xl bg-surface-container-lowest shadow-2xl transition-transform duration-300 transform translate-x-full overflow-y-auto flex flex-col justify-between">
  <!-- Drawer Header -->
  <div class="p-6 border-b border-outline-variant/30 flex items-center justify-between bg-surface-container-low/50">
    <div class="flex items-center gap-2">
      <span class="px-2.5 py-1 rounded-md bg-primary-fixed text-primary font-label-sm text-label-sm font-semibold" id="drawer-degree">S1 Sarjana</span>
      <span class="px-2.5 py-1 rounded-md bg-tertiary-fixed text-tertiary font-label-sm text-label-sm font-semibold" id="drawer-accreditation">Baik Sekali</span>
    </div>
    <button onclick="closeMajorDetail()" class="p-2 rounded-xl text-on-surface-variant hover:bg-surface-container transition-colors" aria-label="Tutup Detail">
      <span class="material-symbols-outlined text-[22px]">close</span>
    </button>
  </div>

  <!-- Drawer Body -->
  <div class="p-6 space-y-6 flex-1">
    <div>
      <h2 class="font-headline-md text-headline-md font-bold text-on-surface" id="drawer-title">S1 Sistem Informasi</h2>
      <p class="font-label-md text-label-md text-secondary font-semibold mt-1" id="drawer-faculty">Fakultas Teknik &amp; Informatika (FTI UBSI)</p>
    </div>

    <!-- RIASEC Badge Match Box -->
    <div class="p-4 rounded-xl bg-surface-container-low border border-outline-variant/30 flex items-center justify-between">
      <div>
        <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider block">Kecocokan Holland Code</span>
        <span class="font-label-lg text-label-lg font-bold text-primary" id="drawer-riasec">I - C | Investigative - Conventional</span>
      </div>
      <span class="material-symbols-outlined text-primary text-[28px]">psychology</span>
    </div>

    <!-- Description -->
    <div>
      <h4 class="font-label-lg text-label-lg font-bold text-on-surface mb-2">Deskripsi Program Studi</h4>
      <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed" id="drawer-desc">
        Program studi ini menggabungkan sains komputer dengan strategi proses bisnis untuk mencetak lulusan yang mampu memimpin arsitektur sistem informasi enterprise.
      </p>
    </div>

    <!-- Career Prospects -->
    <div>
      <h4 class="font-label-lg text-label-lg font-bold text-on-surface mb-2">Profil Lulusan &amp; Peluang Karir</h4>
      <ul class="space-y-1.5 font-body-sm text-body-sm text-on-surface-variant" id="drawer-careers">
        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-tertiary text-[18px]">check_circle</span> Systems Analyst</li>
        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-tertiary text-[18px]">check_circle</span> Data Engineer</li>
        <li class="flex items-center gap-2"><span class="material-symbols-outlined text-tertiary text-[18px]">check_circle</span> IT Consultant</li>
      </ul>
    </div>

    <!-- Key Competencies -->
    <div>
      <h4 class="font-label-lg text-label-lg font-bold text-on-surface mb-2">Mata Kuliah &amp; Kompetensi Inti</h4>
      <div class="flex flex-wrap gap-1.5" id="drawer-curriculum">
        <span class="px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm">Analisis Sistem</span>
        <span class="px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm">Basis Data</span>
        <span class="px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm">Enterprise Architecture</span>
      </div>
    </div>
  </div>

  <!-- Drawer Footer Actions -->
  <div class="p-6 border-t border-outline-variant/30 bg-surface-container-low/50 space-y-3">
    <div class="flex items-center justify-between text-xs text-on-surface-variant">
      <span>Penerimaan Mahasiswa Baru UBSI</span>
      <span class="text-tertiary font-bold">Tersedia Kelas Pagi &amp; Malam</span>
    </div>
    <div class="flex items-center gap-3">
      <a href="https://pmbonline.bsi.ac.id" target="_blank" rel="noopener" class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-3 rounded-xl bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md font-bold transition-all shadow-md">
        <span>Daftar di PMB UBSI</span>
        <span class="material-symbols-outlined text-[18px]">north_east</span>
      </a>
      <a href="{{ route('start-test') }}" class="inline-flex items-center justify-center gap-1.5 px-4 py-3 rounded-xl bg-surface-container hover:bg-surface-container-high text-primary font-label-md text-label-md font-semibold transition-colors">
        <span>Cek Kecocokan</span>
      </a>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  function switchTab(facultyId, btnEl) {
    document.querySelectorAll('.faculty-tab-btn').forEach(b => {
      b.classList.remove('bg-primary', 'text-on-primary', 'shadow-md');
      b.classList.add('bg-surface-container-lowest', 'text-on-surface-variant');
    });
    btnEl.classList.remove('bg-surface-container-lowest', 'text-on-surface-variant');
    btnEl.classList.add('bg-primary', 'text-on-primary', 'shadow-md');

    const sections = document.querySelectorAll('.faculty-section');
    let visibleCount = 0;
    sections.forEach(sec => {
      if (facultyId === 'all' || sec.getAttribute('data-faculty') === facultyId) {
        sec.classList.remove('hidden');
        visibleCount += sec.querySelectorAll('.major-card:not(.hidden)').length;
      } else {
        sec.classList.add('hidden');
      }
    });
    document.getElementById('major-counter').textContent = `Menampilkan ${visibleCount} Program Studi`;
  }

  function filterDegree(degree, chip) {
    document.querySelectorAll('.degree-chip').forEach(c => {
      c.classList.remove('bg-primary-container', 'text-on-primary-container', 'font-semibold');
      c.classList.add('bg-surface-container-lowest', 'text-on-surface-variant');
    });
    chip.classList.remove('bg-surface-container-lowest', 'text-on-surface-variant');
    chip.classList.add('bg-primary-container', 'text-on-primary-container', 'font-semibold');

    let visibleTotal = 0;
    document.querySelectorAll('.major-card').forEach(card => {
      const matchesDegree = degree === 'all' || card.getAttribute('data-degree') === degree;
      if (matchesDegree) {
        card.classList.remove('hidden');
        visibleTotal++;
      } else {
        card.classList.add('hidden');
      }
    });
    document.getElementById('major-counter').textContent = `Menampilkan ${visibleTotal} Program Studi`;
  }

  function filterRiasec(letter) {
    document.querySelectorAll('.riasec-btn').forEach(b => {
      if (b.textContent.trim() === letter) {
        b.classList.toggle('ring-2');
        b.classList.toggle('ring-primary');
      }
    });

    let visibleTotal = 0;
    document.querySelectorAll('.major-card').forEach(card => {
      const riasec = card.getAttribute('data-riasec') || '';
      if (riasec.includes(letter)) {
        card.classList.remove('hidden');
        visibleTotal++;
      } else {
        card.classList.add('hidden');
      }
    });
    document.getElementById('major-counter').textContent = `Menampilkan ${visibleTotal} Program Studi`;
  }

  function searchMajors(val) {
    const q = val.toLowerCase().trim();
    let totalFound = 0;
    document.querySelectorAll('.major-card').forEach(card => {
      const text = card.textContent.toLowerCase();
      if (text.includes(q)) {
        card.classList.remove('hidden');
        totalFound++;
      } else {
        card.classList.add('hidden');
      }
    });
    document.getElementById('major-counter').textContent = `Menampilkan ${totalFound} Program Studi`;
  }

  function resetSearch() {
    const input = document.getElementById('search-input');
    input.value = '';
    searchMajors('');
  }

  function openMajorDetail(title, faculty, degree, accreditation, riasec, desc, careers, curriculum) {
    document.getElementById('drawer-title').textContent = title || 'S1 Sistem Informasi';
    document.getElementById('drawer-degree').textContent = degree || 'S1 Sarjana';
    document.getElementById('drawer-accreditation').textContent = accreditation || 'Baik Sekali';
    document.getElementById('drawer-riasec').textContent = riasec || 'I - C | Investigative - Conventional';
    document.getElementById('drawer-desc').textContent = desc || 'Program studi unggulan UBSI dengan kurikulum industri modern.';

    if (careers && Array.isArray(careers)) {
      const careerList = document.getElementById('drawer-careers');
      careerList.innerHTML = careers.map(c => `<li class="flex items-center gap-2"><span class="material-symbols-outlined text-tertiary text-[18px]">check_circle</span> ${c}</li>`).join('');
    }

    if (curriculum && Array.isArray(curriculum)) {
      const currList = document.getElementById('drawer-curriculum');
      currList.innerHTML = curriculum.map(c => `<span class="px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm">${c}</span>`).join('');
    }

    const drawer = document.getElementById('major-drawer');
    drawer.classList.remove('translate-x-full');
    document.getElementById('drawer-backdrop').classList.remove('opacity-0', 'pointer-events-none');
    document.body.style.overflow = 'hidden';
  }

  function closeMajorDetail() {
    const drawer = document.getElementById('major-drawer');
    drawer.classList.add('translate-x-full');
    document.getElementById('drawer-backdrop').classList.add('opacity-0', 'pointer-events-none');
    document.body.style.overflow = 'auto';
  }
</script>
@endpush
