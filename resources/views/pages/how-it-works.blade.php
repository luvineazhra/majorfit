@extends('layouts.app')

@section('title', 'MajorFit UBSI - Cara Kerja & Metodologi Asesmen')

@section('content')
<div class="flex flex-col w-full">
  <!-- HERO SECTION -->
  <section class="relative w-full overflow-hidden bg-gradient-to-b from-primary-fixed/30 via-surface to-surface pb-space-xl pt-space-lg md:pt-space-xl">
    <div class="absolute inset-0 pointer-events-none opacity-40">
      <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[700px] h-[350px] bg-secondary-container/20 rounded-full blur-3xl"></div>
      <div class="absolute top-48 right-10 w-96 h-96 bg-primary-fixed/40 rounded-full blur-2xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-margin">
      <div class="flex flex-col items-center text-center max-w-4xl mx-auto space-y-space-md">
        <!-- Top Pill Badge -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-surface-container-lowest shadow-sm border border-slate-200/60">
          <span class="w-2.5 h-2.5 rounded-full bg-secondary animate-pulse"></span>
          <span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-semibold">
            Transparansi Metodologi Ilmiah &amp; Teknologi AI
          </span>
        </div>

        <!-- Main Headline -->
        <h1 class="font-headline-lg md:font-display text-headline-lg md:text-display text-on-surface leading-tight tracking-tight font-bold">
          Bagaimana MajorFit Membantu Menemukan <span class="text-primary relative inline-block">Jurusan UBSImu<span class="absolute -bottom-1.5 left-0 w-full h-1.5 bg-secondary-container/40 rounded-full"></span></span>?
        </h1>

        <!-- Subtitle -->
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
          Kombinasi metode ilmiah psikologi RIASEC dan teknologi AI untuk menghadirkan rekomendasi program studi yang terukur, akurat, dan personal bagi masa depan akademikmu.
        </p>

        <!-- Metric Trust Pills -->
        <div class="pt-space-sm flex flex-wrap items-center justify-center gap-3">
          <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-surface-container-high/70 text-on-surface text-label-md font-label-md shadow-xs">
            <span class="material-symbols-outlined text-primary text-[18px]">verified_user</span>
            <span>Validitas Psikometri 70+ Tahun</span>
          </div>
          <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-surface-container-high/70 text-on-surface text-label-md font-label-md shadow-xs">
            <span class="material-symbols-outlined text-secondary text-[18px]">calculate</span>
            <span>Algoritma Euclidean Matching Akurat</span>
          </div>
          <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-surface-container-high/70 text-on-surface text-label-md font-label-md shadow-xs">
            <span class="material-symbols-outlined text-tertiary text-[18px]">lock</span>
            <span>Privasi Data Terjamin 100%</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 1: 4-STEP PROCESS ROADMAP -->
  <section class="w-full py-space-xl bg-surface relative">
    <div class="max-w-7xl mx-auto px-margin">
      <!-- Section Header -->
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-space-xl gap-4">
        <div>
          <span class="font-label-md text-label-md text-secondary uppercase tracking-wider font-semibold">Alur Metodologi Terstruktur</span>
          <h2 class="font-headline-lg text-headline-lg text-on-surface mt-1 font-bold">Alur 4 Langkah Rekomendasi Program Studi</h2>
        </div>
        <p class="font-body-sm text-body-sm text-on-surface-variant max-w-md">
          Proses mulus dari pemetaan minat psikologis hingga penerbitan lembar analisis akademik siap unduh dalam hitungan menit.
        </p>
      </div>

      <!-- Steps Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter relative">
        <!-- Step 1 -->
        <div class="group flex flex-col bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm hover:shadow-lg transition-all duration-300 relative overflow-hidden border border-outline-variant/30">
          <div class="flex items-center justify-between mb-space-md">
            <span class="px-2.5 py-1 rounded-full bg-surface-container-low text-primary font-label-sm text-label-sm font-semibold">Tahap 01 • Input Minat</span>
            <span class="font-display text-headline-lg text-surface-container-high font-bold opacity-60">01</span>
          </div>
          <div class="w-12 h-12 rounded-xl bg-secondary-fixed/40 flex items-center justify-center text-primary mb-4 group-hover:scale-105 transition-transform">
            <span class="material-symbols-outlined text-[28px]">assignment_turned_in</span>
          </div>
          <div class="inline-flex items-center gap-1.5 text-secondary text-label-sm font-label-sm mb-2">
            <span class="material-symbols-outlined text-[16px]">schedule</span>
            <span>Estimasi 5–7 Menit</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2 font-semibold">Pengisian Kuesioner Minat RIASEC</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant flex-1 mb-space-md leading-relaxed">
            Calon mahasiswa menjawab butir pertanyaan sederhana berbasis skala Likert untuk memetakan preferensi naluriah pada 6 dimensi kecenderungan minat (Realistic, Investigative, Artistic, Social, Enterprising, Conventional).
          </p>

          <!-- Interactive preview: Likert Scale -->
          <div class="bg-surface-container-low rounded-xl p-3 space-y-2 mt-auto">
            <div class="flex justify-between text-[11px] text-on-surface-variant font-medium">
              <span>Sangat Tidak Suka</span>
              <span>Sangat Suka</span>
            </div>
            <div class="flex items-center justify-between gap-1 px-1">
              <span class="w-6 h-6 rounded-full bg-white flex items-center justify-center text-[10px] text-on-surface-variant shadow-xs">1</span>
              <span class="w-6 h-6 rounded-full bg-white flex items-center justify-center text-[10px] text-on-surface-variant shadow-xs">2</span>
              <span class="w-6 h-6 rounded-full bg-white flex items-center justify-center text-[10px] text-on-surface-variant shadow-xs">3</span>
              <span class="w-6 h-6 rounded-full bg-secondary text-white font-semibold flex items-center justify-center text-[10px] shadow-sm">4</span>
              <span class="w-6 h-6 rounded-full bg-white flex items-center justify-center text-[10px] text-on-surface-variant shadow-xs">5</span>
            </div>
            <div class="text-center font-label-sm text-label-sm text-secondary font-semibold">Skala 4: Tertarik &amp; Sesuai</div>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="group flex flex-col bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm hover:shadow-lg transition-all duration-300 relative overflow-hidden border border-outline-variant/30">
          <div class="flex items-center justify-between mb-space-md">
            <span class="px-2.5 py-1 rounded-full bg-surface-container-low text-primary font-label-sm text-label-sm font-semibold">Tahap 02 • Komputasi</span>
            <span class="font-display text-headline-lg text-surface-container-high font-bold opacity-60">02</span>
          </div>
          <div class="w-12 h-12 rounded-xl bg-primary-fixed/40 flex items-center justify-center text-primary mb-4 group-hover:scale-105 transition-transform">
            <span class="material-symbols-outlined text-[28px]">insights</span>
          </div>
          <div class="inline-flex items-center gap-1.5 text-secondary text-label-sm font-label-sm mb-2">
            <span class="material-symbols-outlined text-[16px]">square_foot</span>
            <span>Formula Euclidean Distance</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2 font-semibold">Kalkulasi Skor &amp; Algoritma Pencocokan</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant flex-1 mb-space-md leading-relaxed">
            Sistem mengolah skor akumulatif minatmu secara deterministik dan menghitung kedekatan matriks dengan bobot profil ideal 21 program studi unggulan di 5 Fakultas UBSI.
          </p>

          <!-- Interactive preview: Formula & Match pill -->
          <div class="bg-surface-container-low rounded-xl p-3 space-y-2 mt-auto font-mono text-[11px]">
            <div class="text-on-surface-variant truncate font-semibold">d(x,y) = √∑(xi - yi)²</div>
            <div class="flex items-center justify-between pt-1">
              <span class="text-on-surface-variant text-[11px] font-sans">Top Matching:</span>
              <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-tertiary-container/15 text-tertiary font-sans font-semibold text-label-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span> 94.8% Match
              </span>
            </div>
            <div class="w-full bg-surface-container-highest rounded-full h-1.5 overflow-hidden">
              <div class="bg-tertiary h-1.5 rounded-full w-[94.8%]"></div>
            </div>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="group flex flex-col bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm hover:shadow-lg transition-all duration-300 relative overflow-hidden border border-outline-variant/30">
          <div class="flex items-center justify-between mb-space-md">
            <span class="px-2.5 py-1 rounded-full bg-surface-container-low text-primary font-label-sm text-label-sm font-semibold">Tahap 03 • Natural Language</span>
            <span class="font-display text-headline-lg text-surface-container-high font-bold opacity-60">03</span>
          </div>
          <div class="w-12 h-12 rounded-xl bg-secondary-fixed/50 flex items-center justify-center text-secondary mb-4 group-hover:scale-105 transition-transform">
            <span class="material-symbols-outlined text-[28px]">psychology</span>
          </div>
          <div class="inline-flex items-center gap-1.5 text-secondary text-label-sm font-label-sm mb-2">
            <span class="material-symbols-outlined text-[16px]">auto_awesome</span>
            <span>LLM Reasoning Engine</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2 font-semibold">Generasi Penjelasan Personal AI</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant flex-1 mb-space-md leading-relaxed">
            Modul AI menerima hasil top 3 program studi teratasmu, kemudian menyusun narasi penjelasan yang ramah, menjabarkan analisis kesesuaian kurikulum UBSI, dan prospek karir relevan.
          </p>

          <!-- Interactive preview: AI Quote Snippet -->
          <div class="bg-surface-container-low rounded-xl p-3 space-y-1.5 mt-auto">
            <div class="flex items-center gap-1 text-[11px] text-primary font-semibold">
              <span class="material-symbols-outlined text-[14px]">smart_toy</span>
              <span>Sintesis AI MajorFit:</span>
            </div>
            <p class="font-body-sm text-[12px] leading-snug text-on-surface-variant italic line-clamp-2">
              "Berdasarkan profil Investigatif &amp; Konvensionalmu, S1 Sistem Informasi cocok karena fokus pemecahan masalah data analitis..."
            </p>
          </div>
        </div>

        <!-- Step 4 -->
        <div class="group flex flex-col bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm hover:shadow-lg transition-all duration-300 relative overflow-hidden border border-outline-variant/30">
          <div class="flex items-center justify-between mb-space-md">
            <span class="px-2.5 py-1 rounded-full bg-surface-container-low text-primary font-label-sm text-label-sm font-semibold">Tahap 04 • Hasil Lengkap</span>
            <span class="font-display text-headline-lg text-surface-container-high font-bold opacity-60">04</span>
          </div>
          <div class="w-12 h-12 rounded-xl bg-tertiary-fixed/40 flex items-center justify-center text-tertiary mb-4 group-hover:scale-105 transition-transform">
            <span class="material-symbols-outlined text-[28px]">dashboard_customize</span>
          </div>
          <div class="inline-flex items-center gap-1.5 text-secondary text-label-sm font-label-sm mb-2">
            <span class="material-symbols-outlined text-[16px]">pie_chart</span>
            <span>Interactive Radar + PDF</span>
          </div>
          <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2 font-semibold">Dashboard &amp; Laporan Rekomendasi</h3>
          <p class="font-body-sm text-body-sm text-on-surface-variant flex-1 mb-space-md leading-relaxed">
            Kamu langsung mendapatkan visualisasi grafik radar heksagon RIASEC, rincian peringkat kecocokan fakultas, serta laporan resmi rekomendasi yang dapat diunduh langsung untuk PMB.
          </p>

          <!-- Interactive preview: Radar & Download CTA -->
          <div class="bg-surface-container-low rounded-xl p-3 flex items-center justify-between gap-2 mt-auto">
            <div class="flex items-center gap-2">
              <span class="material-symbols-outlined text-primary text-[20px]">picture_as_pdf</span>
              <div class="flex flex-col">
                <span class="font-label-sm text-label-sm text-on-surface font-semibold">MajorFit_UBSI.pdf</span>
                <span class="text-[10px] text-on-surface-variant">Laporan Resmi 4 Halaman</span>
              </div>
            </div>
            <span class="p-1 rounded-lg bg-surface-container-lowest text-primary shadow-xs">
              <span class="material-symbols-outlined text-[18px]">download</span>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 2: FAQ ACCORDION -->
  <section class="w-full py-space-xl bg-surface" id="faq">
    <div class="max-w-4xl mx-auto px-margin">
      <!-- Section Header -->
      <div class="text-center mb-space-xl space-y-2">
        <span class="font-label-md text-label-md text-secondary uppercase tracking-wider font-semibold">Tanya Jawab</span>
        <h2 class="font-headline-lg text-headline-lg text-on-surface font-bold">Pertanyaan yang Sering Diajukan (FAQ)</h2>
        <p class="font-body-md text-body-md text-on-surface-variant">
          Segala hal yang perlu kamu ketahui seputar asesmen minat studi MajorFit UBSI.
        </p>
      </div>

      <!-- Accordion Items -->
      <div class="space-y-4" id="faq-container">
        <!-- FAQ 1 -->
        <div class="bg-surface-container-lowest rounded-2xl p-space-md md:p-space-lg shadow-sm border border-outline-variant/30 transition-all duration-200">
          <button aria-expanded="true" class="faq-toggle w-full flex items-center justify-between gap-4 text-left font-headline-sm text-headline-sm text-on-surface font-semibold" type="button">
            <span class="flex items-center gap-3">
              <span class="w-8 h-8 rounded-full bg-secondary-fixed/50 flex items-center justify-center text-primary text-label-md shrink-0 font-bold">1</span>
              <span>Apakah hasil rekomendasi ini menentukan jurusan yang pasti 100% benar?</span>
            </span>
            <span class="material-symbols-outlined text-primary text-[24px] transition-transform duration-300 rotate-180 faq-icon">expand_more</span>
          </button>
          <div class="faq-content mt-3 pt-3 pl-11 text-on-surface-variant font-body-md text-body-md leading-relaxed border-t border-outline-variant/20">
            MajorFit berfungsi sebagai instrumen navigasi dan alat bantu eksplorasi minat berbasis data ilmiah psikologi, bukan penentu mutlak masa depanmu. Rekomendasi ini membuka wawasan potensi diri dan kurikulum UBSI, namun keputusan akhir dan konsultasi karir tetap sepenuhnya berada di tanganmu!
          </div>
        </div>

        <!-- FAQ 2 -->
        <div class="bg-surface-container-lowest rounded-2xl p-space-md md:p-space-lg shadow-sm border border-outline-variant/30 transition-all duration-200">
          <button aria-expanded="false" class="faq-toggle w-full flex items-center justify-between gap-4 text-left font-headline-sm text-headline-sm text-on-surface font-semibold" type="button">
            <span class="flex items-center gap-3">
              <span class="w-8 h-8 rounded-full bg-secondary-fixed/50 flex items-center justify-center text-primary text-label-md shrink-0 font-bold">2</span>
              <span>Berapa lama waktu yang dibutuhkan untuk menyelesaikan tes?</span>
            </span>
            <span class="material-symbols-outlined text-primary text-[24px] transition-transform duration-300 faq-icon">expand_more</span>
          </button>
          <div class="faq-content hidden mt-3 pt-3 pl-11 text-on-surface-variant font-body-md text-body-md leading-relaxed border-t border-outline-variant/20">
            Hanya sekitar 5 hingga 7 menit. Kuesioner dirancang ringkas dengan 24 pertanyaan pilihan ganda yang intuitif tanpa perlu persiapan belajar khusus. Jawablah sesuai kecenderungan spontan dirimu.
          </div>
        </div>

        <!-- FAQ 3 -->
        <div class="bg-surface-container-lowest rounded-2xl p-space-md md:p-space-lg shadow-sm border border-outline-variant/30 transition-all duration-200">
          <button aria-expanded="false" class="faq-toggle w-full flex items-center justify-between gap-4 text-left font-headline-sm text-headline-sm text-on-surface font-semibold" type="button">
            <span class="flex items-center gap-3">
              <span class="w-8 h-8 rounded-full bg-secondary-fixed/50 flex items-center justify-center text-primary text-label-md shrink-0 font-bold">3</span>
              <span>Apakah tes ini gratis untuk calon mahasiswa UBSI?</span>
            </span>
            <span class="material-symbols-outlined text-primary text-[24px] transition-transform duration-300 faq-icon">expand_more</span>
          </button>
          <div class="faq-content hidden mt-3 pt-3 pl-11 text-on-surface-variant font-body-md text-body-md leading-relaxed border-t border-outline-variant/20">
            Ya, 100% gratis! Layanan MajorFit disediakan sebagai wujud komitmen Universitas Bina Sarana Informatika untuk membantu calon mahasiswa memilih program studi yang paling selaras dengan potensi dan minat mereka.
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA SECTION -->
  <section class="w-full py-space-xl bg-surface">
    <div class="max-w-7xl mx-auto px-margin">
      <div class="relative rounded-3xl bg-gradient-to-r from-primary to-secondary p-space-lg md:p-space-xl text-white overflow-hidden shadow-xl">
        <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
        <div class="absolute left-1/3 -top-24 w-80 h-80 bg-secondary-container/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-3xl space-y-space-md">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-sm text-white text-label-sm font-label-sm">
            <span class="material-symbols-outlined text-[16px]">school</span>
            <span>Penerimaan Mahasiswa Baru UBSI 2026</span>
          </div>

          <h2 class="font-headline-lg md:font-display text-headline-lg md:text-headline-lg text-white font-bold leading-tight">
            Siap Menemukan Program Studi UBSI yang Cocok Untukmu?
          </h2>

          <p class="font-body-lg text-body-lg text-white/90 max-w-2xl">
            Ikuti asesmen cepat 5-7 menit sekarang dan dapatkan wawasan kepribadian serta rekomendasi fakultas UBSI terlengkap.
          </p>

          <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            <a class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-white text-primary font-label-lg text-label-lg font-bold shadow-md hover:bg-surface-container-lowest hover:shadow-lg transition-all duration-200" 
               href="{{ route('start-test') }}">
              <span>Mulai Tes Minat Sekarang</span>
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </a>
            <a class="inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-xl bg-white/15 hover:bg-white/25 text-white font-label-lg text-label-lg backdrop-blur-sm transition-all duration-200" 
               href="https://wa.me/6281212345678" target="_blank" rel="noopener">
              <span class="material-symbols-outlined text-[20px]">support_agent</span>
              <span>Konsultasi dengan Konselor PMB UBSI</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@push('scripts')
<script>
  document.querySelectorAll('.faq-toggle').forEach(button => {
    button.addEventListener('click', () => {
      const content = button.nextElementSibling;
      const icon = button.querySelector('.faq-icon');
      const isExpanded = button.getAttribute('aria-expanded') === 'true';

      button.setAttribute('aria-expanded', !isExpanded);
      if (content) {
        content.classList.toggle('hidden');
      }
      if (icon) {
        icon.classList.toggle('rotate-180');
      }
    });
  });
</script>
@endpush
