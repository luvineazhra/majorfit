@extends('layouts.assessment')

@section('title', 'MajorFit UBSI - Kuesioner Asesmen Minat RIASEC')

@section('content')
<div class="max-w-7xl mx-auto px-gutter-mobile lg:px-gutter py-space-md md:py-space-lg relative">
  <div class="flex flex-col w-full">

    <!-- MAIN ASSESSMENT CONTENT CONTAINER -->
    <div id="assessmentMainContent" class="block">
      
      <!-- Flash Notification Banner -->
      @if(session('error'))
        <div class="mb-space-md p-4 rounded-xl bg-amber-500/15 border border-amber-500/30 text-amber-900 flex items-center justify-between">
          <div class="flex items-center gap-2.5 text-xs font-medium">
            <span class="material-symbols-outlined text-amber-600 text-lg">info</span>
            <span>{{ session('error') }}</span>
          </div>
        </div>
      @endif

      @if(session('info'))
        <div class="mb-space-md p-4 rounded-xl bg-blue-500/15 border border-blue-500/30 text-blue-900 flex items-center justify-between">
          <div class="flex items-center gap-2.5 text-xs font-medium">
            <span class="material-symbols-outlined text-blue-600 text-lg">check_circle</span>
            <span>{{ session('info') }}</span>
          </div>
        </div>
      @endif

      <!-- Interactive Top Stepper & Progress Zone -->
      <div class="w-full bg-surface-container-lowest shadow-sm rounded-xl p-space-md mb-space-lg border border-outline-variant/30">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs mb-space-xs">
          <div class="flex items-center gap-space-xs">
            <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-primary-fixed text-primary font-label-md text-label-md font-bold" id="badge-question-num">
              01
            </span>
            <h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">
              Pertanyaan <span id="text-question-num">1</span> <span class="font-body-md text-body-md text-on-surface-variant font-normal">dari 24</span>
            </h2>
          </div>
          <div class="flex items-center gap-space-sm font-label-md text-label-md flex-wrap">
            <span class="font-label-sm text-label-sm text-on-surface-variant font-medium inline-flex items-center gap-1 bg-surface-container px-2.5 py-1 rounded-full border border-outline-variant/20">
              <span class="material-symbols-outlined text-[14px] text-primary">person</span>
              <span id="candidate-pill-name">{{ !empty($mabaData['nama_maba']) ? $mabaData['nama_maba'] : 'Calon Maba' }}</span>
            </span>
            <span class="inline-flex items-center gap-1.5 font-semibold text-primary">
              <span class="material-symbols-outlined text-[16px] animate-spin">sync</span>
              <span id="text-progress-pct">4.2%</span> Selesai
            </span>
            <span class="text-outline-variant">•</span>
            <span class="text-on-surface-variant inline-flex items-center gap-1">
              <span class="material-symbols-outlined text-[16px]">schedule</span>
              <span id="text-time-est">Estimasi: ~5 menit tersisa</span>
            </span>
          </div>
        </div>

        <!-- Progress Track & Fill -->
        <div class="w-full h-3 bg-surface-container rounded-full overflow-hidden relative">
          <div id="progress-bar-fill" class="h-full bg-gradient-to-r from-primary-container via-primary to-secondary-container rounded-full shadow-[0_0_12px_rgba(0,123,185,0.4)] transition-all duration-500 ease-out" style="width: 4.2%;">
            <div class="w-full h-full opacity-30 bg-[linear-gradient(45deg,rgba(255,255,255,0.25)_25%,transparent_25%,transparent_50%,rgba(255,255,255,0.25)_50%,rgba(255,255,255,0.25)_75%,transparent_75%,transparent)] bg-[length:1rem_1rem]"></div>
          </div>
        </div>
      </div>

      <!-- Primary Assessment Dual-Column Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-start">
        <!-- Dominant Left Column: Question & Likert Response Matrix -->
        <div class="lg:col-span-8 flex flex-col gap-space-md">
          <div class="bg-surface-container-lowest rounded-xl p-space-lg md:p-space-xl shadow-sm hover:shadow-md transition-shadow relative overflow-hidden border border-outline-variant/30">
            <!-- Subtle Ambient Background Accent -->
            <div class="absolute -right-20 -top-20 w-56 h-56 rounded-full bg-primary-fixed/25 blur-3xl pointer-events-none"></div>

            <!-- Dimensi Category Pill Badge -->
            <div class="flex items-center justify-between gap-space-xs flex-wrap mb-space-md">
              <span class="inline-flex items-center gap-1.5 px-space-md py-1 rounded-full bg-primary-fixed text-primary font-label-md text-label-md font-semibold" id="badge-dimension-label">
                <span class="material-symbols-outlined text-[16px]">build</span>
                Dimensi: Realistic (R)
              </span>
              <span class="inline-flex items-center gap-1 px-space-sm py-1 rounded-full bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm">
                <span class="material-symbols-outlined text-[14px] text-tertiary">check_circle</span>
                Sistem Skoring Teruji
              </span>
            </div>

            <!-- Question Prompt Area -->
            <div class="space-y-space-xs mb-space-lg">
              <h1 class="font-headline-lg text-headline-lg-mobile md:text-headline-md text-on-surface font-bold" id="prompt-question-text">
                “Saya suka merakit alat, memperbaiki perangkat keras komputer, atau bekerja dengan mesin teknologi fisik.”
              </h1>
              <p class="font-body-md text-body-md text-on-surface-variant">
                Pilih tingkat kesesuaian pernyataan di atas dengan kecenderungan alami, hobi, atau minat kegiatan yang kamu sukai sehari-hari.
              </p>
            </div>

            <!-- STEP 2: Interactive Likert Scale (1 - 5) - STRICT ZERO DEFAULT SELECTION NEUTRAL STATE -->
            <div class="space-y-space-xs mb-space-xl">
              <div class="flex items-center justify-between text-on-surface-variant font-label-sm text-label-sm px-1">
                <span>Kurang Sesuai</span>
                <span>Sangat Sesuai</span>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-5 gap-space-xs" id="likert-group">
                <!-- Option 1: Sangat Tidak Suka -->
                <label data-value="1" onclick="selectOption(1)" class="likert-option group relative flex flex-col items-center justify-between p-space-md rounded-xl bg-surface-container-low hover:bg-surface-container cursor-pointer transition-all duration-200 text-center border border-outline-variant/30">
                  <input class="sr-only" name="jawaban" type="radio" value="1" onchange="selectOption(this)">
                  <span class="opt-num w-8 h-8 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center font-label-md text-label-md mb-space-xs group-hover:scale-110 transition-transform font-bold">1</span>
                  <span class="opt-icon material-symbols-outlined text-[26px] text-outline mb-space-xs group-hover:text-error transition-colors">sentiment_very_dissatisfied</span>
                  <span class="opt-label font-label-md text-label-md text-on-surface leading-tight font-medium">Sangat Tidak Suka</span>
                  <span class="opt-score text-[10px] text-on-surface-variant mt-1">Skor: 1</span>
                </label>

                <!-- Option 2: Tidak Suka -->
                <label data-value="2" onclick="selectOption(2)" class="likert-option group relative flex flex-col items-center justify-between p-space-md rounded-xl bg-surface-container-low hover:bg-surface-container cursor-pointer transition-all duration-200 text-center border border-outline-variant/30">
                  <input class="sr-only" name="jawaban" type="radio" value="2" onchange="selectOption(this)">
                  <span class="opt-num w-8 h-8 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center font-label-md text-label-md mb-space-xs group-hover:scale-110 transition-transform font-bold">2</span>
                  <span class="opt-icon material-symbols-outlined text-[26px] text-outline mb-space-xs group-hover:text-on-surface transition-colors">sentiment_dissatisfied</span>
                  <span class="opt-label font-label-md text-label-md text-on-surface leading-tight font-medium">Tidak Suka</span>
                  <span class="opt-score text-[10px] text-on-surface-variant mt-1">Skor: 2</span>
                </label>

                <!-- Option 3: Netral / Ragu -->
                <label data-value="3" onclick="selectOption(3)" class="likert-option group relative flex flex-col items-center justify-between p-space-md rounded-xl bg-surface-container-low hover:bg-surface-container cursor-pointer transition-all duration-200 text-center border border-outline-variant/30">
                  <input class="sr-only" name="jawaban" type="radio" value="3" onchange="selectOption(this)">
                  <span class="opt-num w-8 h-8 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center font-label-md text-label-md mb-space-xs group-hover:scale-110 transition-transform font-bold">3</span>
                  <span class="opt-icon material-symbols-outlined text-[26px] text-outline mb-space-xs group-hover:text-primary transition-colors">sentiment_neutral</span>
                  <span class="opt-label font-label-md text-label-md text-on-surface leading-tight font-medium">Netral / Ragu</span>
                  <span class="opt-score text-[10px] text-on-surface-variant mt-1">Skor: 3</span>
                </label>

                <!-- Option 4: Suka -->
                <label data-value="4" onclick="selectOption(4)" class="likert-option group relative flex flex-col items-center justify-between p-space-md rounded-xl bg-surface-container-low hover:bg-surface-container cursor-pointer transition-all duration-200 text-center border border-outline-variant/30">
                  <input class="sr-only" name="jawaban" type="radio" value="4" onchange="selectOption(this)">
                  <span class="opt-num w-8 h-8 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center font-label-md text-label-md mb-space-xs group-hover:scale-110 transition-transform font-bold">4</span>
                  <span class="opt-icon material-symbols-outlined text-[26px] text-outline mb-space-xs group-hover:text-secondary transition-colors">sentiment_satisfied</span>
                  <span class="opt-label font-label-md text-label-md text-on-surface leading-tight font-medium">Suka</span>
                  <span class="opt-score text-[10px] text-on-surface-variant mt-1">Skor: 4</span>
                </label>

                <!-- Option 5: Sangat Suka -->
                <label data-value="5" onclick="selectOption(5)" class="likert-option group relative flex flex-col items-center justify-between p-space-md rounded-xl bg-surface-container-low hover:bg-surface-container cursor-pointer transition-all duration-200 text-center border border-outline-variant/30">
                  <input class="sr-only" name="jawaban" type="radio" value="5" onchange="selectOption(this)">
                  <span class="opt-num w-8 h-8 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center font-label-md text-label-md mb-space-xs group-hover:scale-110 transition-transform font-bold">5</span>
                  <span class="opt-icon material-symbols-outlined text-[26px] text-outline mb-space-xs group-hover:text-tertiary transition-colors">sentiment_very_satisfied</span>
                  <span class="opt-label font-label-md text-label-md text-on-surface leading-tight font-medium">Sangat Suka</span>
                  <span class="opt-score text-[10px] text-on-surface-variant mt-1">Skor: 5</span>
                </label>
              </div>
            </div>

            <!-- Navigation Action Deck -->
            <div class="pt-space-md bg-surface-container-low/40 -mx-space-lg -mb-space-lg md:-mx-space-xl md:-mb-space-xl px-space-lg md:px-space-xl pb-space-lg flex flex-col sm:flex-row items-center justify-between gap-space-md border-t border-outline-variant/20">
              <!-- Back Button -->
              <button onclick="prevQuestion()" id="btn-prev" class="w-full sm:w-auto inline-flex items-center justify-center gap-space-xs px-space-lg py-3 rounded-lg bg-surface-container-lowest hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-lg text-label-lg shadow-sm transition-all disabled:opacity-40 disabled:cursor-not-allowed border border-outline-variant/30" type="button" disabled>
                <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                <span>Sebelumnya</span>
              </button>

              <!-- Auto-save Sync Status -->
              <div class="flex items-center gap-space-xs font-label-sm text-label-sm text-on-surface-variant">
                <span class="material-symbols-outlined text-[16px] text-tertiary">check_circle</span>
                <span>Tersimpan otomatis</span>
              </div>

              <!-- Next Action Button (Disabled until option clicked) -->
              <button onclick="nextQuestion()" id="btn-next" class="w-full sm:w-auto inline-flex items-center justify-center gap-space-xs px-space-xl py-3 rounded-lg bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg shadow-md transition-all font-semibold opacity-40 cursor-not-allowed pointer-events-none" type="button" disabled>
                <span id="text-btn-next">Selanjutnya</span>
                <span class="material-symbols-outlined text-[18px]" id="icon-btn-next">arrow_forward</span>
              </button>
            </div>
          </div>

          <!-- Preview Hint Banner -->
          <div class="inline-flex items-center justify-between gap-space-xs px-space-md py-space-xs rounded-lg bg-surface-container text-on-surface-variant font-label-sm text-label-sm border border-outline-variant/20">
            <div class="flex items-center gap-space-xs">
              <span class="material-symbols-outlined text-[18px] text-primary">info</span>
              <span>Pertanyaan terakhir (ke-24) akan mengaktifkan tombol <strong>“Lihat Hasil Rekomendasi ✨”</strong></span>
            </div>
            <span class="hidden md:inline text-primary font-semibold" id="text-remaining-questions">23 Pertanyaan Lagi</span>
          </div>

          <!-- Contextual Illustration Strip -->
          <div class="relative rounded-xl overflow-hidden shadow-sm h-32 bg-surface-container-low flex items-center justify-between px-space-lg border border-outline-variant/30">
            <div class="relative z-10 max-w-md">
              <p class="font-label-md text-label-md text-primary font-semibold uppercase tracking-wider" id="fact-strip-title">Fakta Program Studi UBSI</p>
              <p class="font-body-sm text-body-sm text-on-surface" id="fact-strip-desc">
                Minat <em>Realistic</em> sangat cocok dengan prodi <strong>Teknik Elektro</strong>, <strong>Teknik Industri</strong>, dan <strong>Teknologi Informasi</strong>.
              </p>
            </div>
            <div class="relative z-10 hidden sm:flex items-center justify-center w-12 h-12 rounded-xl bg-surface-container-lowest text-primary shadow-sm">
              <span class="material-symbols-outlined text-[24px]" id="fact-strip-icon">terminal</span>
            </div>
          </div>
        </div>

        <!-- Supplementary Sidebar (4 Cols Desktop) -->
        <div class="lg:col-span-4 flex flex-col gap-space-md">
          <!-- Widget 1: Tips Menjawab -->
          <div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm border border-outline-variant/30">
            <div class="flex items-center gap-space-xs mb-space-sm">
              <div class="w-8 h-8 rounded-lg bg-surface-container text-primary flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined text-[20px]">lightbulb</span>
              </div>
              <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Tips Menjawab Asesmen</h3>
            </div>
            <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
              Jawablah setiap butir sesuai ketertarikan aslimu, bukan berdasarkan kemampuan teknis saat ini maupun harapan orang lain. <strong>Tidak ada jawaban yang salah atau dinilai jelek.</strong>
            </p>
          </div>

          <!-- Widget 2: Dimensi RIASEC Tracker -->
          <div class="bg-surface-container-lowest rounded-xl p-space-lg shadow-sm border border-outline-variant/30">
            <div class="flex items-center justify-between mb-space-md">
              <div class="flex items-center gap-space-xs">
                <span class="material-symbols-outlined text-primary text-[20px]">category</span>
                <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Dimensi RIASEC</h3>
              </div>
              <span class="font-label-sm text-label-sm text-primary font-semibold" id="tracker-dimension-summary">1 dari 6 Dimensi</span>
            </div>

            <div class="space-y-space-xs" id="riasec-tracker-list">
              <!-- R -->
              <div class="tracker-item flex items-center justify-between p-space-xs px-space-sm rounded-lg bg-surface-container font-label-md text-label-md" data-dim="R">
                <div class="flex items-center gap-space-xs min-w-0">
                  <span class="w-6 h-6 rounded-full bg-amber-500 text-white flex items-center justify-center font-bold text-[11px] shrink-0">R</span>
                  <span class="text-on-surface font-medium truncate">Realistic</span>
                </div>
                <div class="tracker-status flex items-center gap-1 font-label-sm text-label-sm text-primary font-semibold">
                  <span class="w-2 h-2 rounded-full bg-primary animate-ping"></span>
                  <span>Aktif</span>
                </div>
              </div>

              <!-- I -->
              <div class="tracker-item flex items-center justify-between p-space-xs px-space-sm rounded-lg bg-surface-container-lowest font-label-md text-label-md text-on-surface-variant opacity-75" data-dim="I">
                <div class="flex items-center gap-space-xs min-w-0">
                  <span class="w-6 h-6 rounded-full bg-surface-container text-on-surface-variant flex items-center justify-center font-bold text-[11px] shrink-0">I</span>
                  <span class="truncate">Investigative</span>
                </div>
                <span class="tracker-status font-label-sm text-label-sm text-outline">Menunggu</span>
              </div>

              <!-- A -->
              <div class="tracker-item flex items-center justify-between p-space-xs px-space-sm rounded-lg bg-surface-container-lowest font-label-md text-label-md text-on-surface-variant opacity-75" data-dim="A">
                <div class="flex items-center gap-space-xs min-w-0">
                  <span class="w-6 h-6 rounded-full bg-surface-container text-on-surface-variant flex items-center justify-center font-bold text-[11px] shrink-0">A</span>
                  <span class="truncate">Artistic</span>
                </div>
                <span class="tracker-status font-label-sm text-label-sm text-outline">Menunggu</span>
              </div>

              <!-- S -->
              <div class="tracker-item flex items-center justify-between p-space-xs px-space-sm rounded-lg bg-surface-container-lowest font-label-md text-label-md text-on-surface-variant opacity-75" data-dim="S">
                <div class="flex items-center gap-space-xs min-w-0">
                  <span class="w-6 h-6 rounded-full bg-surface-container text-on-surface-variant flex items-center justify-center font-bold text-[11px] shrink-0">S</span>
                  <span class="truncate">Social</span>
                </div>
                <span class="tracker-status font-label-sm text-label-sm text-outline">Menunggu</span>
              </div>

              <!-- E -->
              <div class="tracker-item flex items-center justify-between p-space-xs px-space-sm rounded-lg bg-surface-container-lowest font-label-md text-label-md text-on-surface-variant opacity-75" data-dim="E">
                <div class="flex items-center gap-space-xs min-w-0">
                  <span class="w-6 h-6 rounded-full bg-surface-container text-on-surface-variant flex items-center justify-center font-bold text-[11px] shrink-0">E</span>
                  <span class="truncate">Enterprising</span>
                </div>
                <span class="tracker-status font-label-sm text-label-sm text-outline">Menunggu</span>
              </div>

              <!-- C -->
              <div class="tracker-item flex items-center justify-between p-space-xs px-space-sm rounded-lg bg-surface-container-lowest font-label-md text-label-md text-on-surface-variant opacity-75" data-dim="C">
                <div class="flex items-center gap-space-xs min-w-0">
                  <span class="w-6 h-6 rounded-full bg-surface-container text-on-surface-variant flex items-center justify-center font-bold text-[11px] shrink-0">C</span>
                  <span class="truncate">Conventional</span>
                </div>
                <span class="tracker-status font-label-sm text-label-sm text-outline">Menunggu</span>
              </div>
            </div>

            <!-- Inline Visual Mini Radar / Breakdown Graphic -->
            <div class="mt-space-md pt-space-sm flex items-center justify-between bg-surface-container-low rounded-lg p-space-sm">
              <div class="flex items-center gap-space-xs">
                <svg class="w-8 h-8 -rotate-90" viewBox="0 0 36 36">
                  <path class="text-surface-container" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4"></path>
                  <path id="svg-ring-progress" class="text-primary transition-all duration-300" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="4.2, 100" stroke-linecap="round" stroke-width="4"></path>
                </svg>
                <div class="font-label-sm text-label-sm">
                  <span class="block text-on-surface font-semibold" id="tracker-ring-count">1 dari 24 Soal</span>
                  <span class="text-on-surface-variant">Holland RIASEC Code</span>
                </div>
              </div>
              <span class="font-label-md text-label-md text-primary font-bold" id="tracker-ring-pct">4.2%</span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  // STEP 1: AJAX Submit Candidate Info
  function submitCandidateInfo(e) {
    e.preventDefault();
    const namaMaba = document.getElementById('candidate_nama_maba').value.trim();
    const emailMaba = document.getElementById('candidate_email_maba').value.trim();
    const noWa = document.getElementById('candidate_no_wa').value.trim();
    const asalSekolah = document.getElementById('candidate_asal_sekolah').value.trim();
    const errorEl = document.getElementById('candidateErrorMsg');
    const btn = document.getElementById('btn-submit-candidate');

    if (!namaMaba || !emailMaba || !noWa || !asalSekolah) {
      errorEl.textContent = 'Mohon lengkapi seluruh data identitas (Nama, Email, No. WA, dan Asal Sekolah) terlebih dahulu.';
      errorEl.classList.remove('hidden');
      return;
    }

    btn.disabled = true;
    btn.innerHTML = '<span class="material-symbols-outlined animate-spin text-[18px]">sync</span> Menyimpan Data...';

    fetch("{{ route('assessment.candidate') }}", {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({
        nama_maba: namaMaba,
        email_maba: emailMaba,
        no_wa: noWa,
        asal_sekolah: asalSekolah
      })
    })
    .then(res => res.json())
    .then(data => {
      btn.disabled = false;
      btn.innerHTML = 'Simpan Data &amp; Mulai Tes RIASEC <span class="material-symbols-outlined text-[18px]">arrow_forward</span>';

      if (data.success) {
        document.getElementById('candidateModal').classList.add('hidden');
        document.getElementById('candidateModal').classList.remove('flex');
        
        const mainContainer = document.getElementById('assessmentMainContent');
        if (mainContainer) {
          mainContainer.classList.remove('hidden');
          mainContainer.classList.add('block');
        }

        const pill = document.getElementById('candidate-pill-name');
        if (pill) pill.textContent = namaMaba;

        renderQuestion(currentIndex);
      } else {
        errorEl.textContent = data.message || 'Terjadi kesalahan.';
        errorEl.classList.remove('hidden');
      }
    })
    .catch(err => {
      btn.disabled = false;
      btn.innerHTML = 'Simpan Data &amp; Mulai Tes RIASEC <span class="material-symbols-outlined text-[18px]">arrow_forward</span>';
      errorEl.textContent = 'Gagal menghubungkan server. Silakan coba lagi.';
      errorEl.classList.remove('hidden');
    });
  }

  // 24 Standardized RIASEC Holland Items
  const questions = [
    { id: 1, dim: 'R', dimName: 'Realistic (R)', icon: 'build', text: '“Saya suka merakit alat, memperbaiki perangkat keras komputer, atau bekerja dengan mesin teknologi fisik.”', fact: 'Minat Realistic sangat selaras dengan prodi Teknik Elektro, Teknik Industri, dan Teknologi Informasi UBSI.' },
    { id: 2, dim: 'R', dimName: 'Realistic (R)', icon: 'hardware', text: '“Saya lebih menyukai kegiatan praktek langsung di laboratorium/bengkel daripada hanya membaca teori di kelas.”', fact: 'UBSI menyediakan laboratorium perakitan komputer dan jaringan modern berstandar industri.' },
    { id: 3, dim: 'R', dimName: 'Realistic (R)', icon: 'memory', text: '“Saya tertarik mempelajari cara kerja sirkuit elektronik, mikrokontroler, atau perangkat Internet of Things (IoT).”', fact: 'Prodi Teknologi Informasi UBSI mengintegrasikan kurikulum IoT dan arsitektur hardware cerdas.' },
    { id: 4, dim: 'R', dimName: 'Realistic (R)', icon: 'precision_manufacturing', text: '“Saya senang melihat alur operasional perakitan barang, efisiensi kerja mesin, dan tata letak fasilitas pabrik.”', fact: 'Teknik Industri UBSI berfokus pada manajemen rantai pasok dan rekayasa ergonomi manufaktur.' },

    { id: 5, dim: 'I', dimName: 'Investigative (I)', icon: 'biotech', text: '“Saya suka menganalisis data, memecahkan masalah logika, dan mempelajari cara kerja sistem teknologi.”', fact: 'Minat Investigative berkorelasi tinggi dengan prodi Sistem Informasi, Informatika, dan Ilmu Komputer UBSI.' },
    { id: 6, dim: 'I', dimName: 'Investigative (I)', icon: 'code', text: '“Saya menikmati mencari akar permasalahan dari suatu kode program atau algoritma komputasi yang error.”', fact: 'Prodi Rekayasa Perangkat Lunak UBSI mengajarkan algoritma pemecahan masalah dan rekayasa piranti lunak enterprise.' },
    { id: 7, dim: 'I', dimName: 'Investigative (I)', icon: 'analytics', text: '“Saya tertarik meneliti tren angka, pola statistik, dan menarik kesimpulan berdasarkan data yang objektif.”', fact: 'Peminatan Data Science di FTI UBSI membekali mahasiswa dengan keahlian pengolahan big data modern.' },
    { id: 8, dim: 'I', dimName: 'Investigative (I)', icon: 'psychology', text: '“Saya gemar membaca artikel ilmiah, riset kecerdasan buatan (AI), atau teknologi baru yang belum banyak diketahui.”', fact: 'Magister Ilmu Komputer (MTI) UBSI berorientasi riset komputasi cerdas dan tata kelola teknologi.' },

    { id: 9, dim: 'A', dimName: 'Artistic (A)', icon: 'palette', text: '“Saya senang menuangkan ide dalam bentuk visual, ilustrasi grafis, animasi, atau desain antarmuka (UI/UX).”', fact: 'S1 Desain Komunikasi Visual (DKV) UBSI mencetak desainer kreatif, kreator animasi, dan UI/UX specialist.' },
    { id: 10, dim: 'A', dimName: 'Artistic (A)', icon: 'videocam', text: '“Saya tertarik pada proses pembuatan video kreatif, penulisan skrip cerita, podcast, dan konten media penyiaran.”', fact: 'Prodi Ilmu Komunikasi UBSI memiliki laboratorium broadcasting TV & radio profesional berstandar stasiun siaran.' },
    { id: 11, dim: 'A', dimName: 'Artistic (A)', icon: 'translate', text: '“Saya menyukai eksplorasi bahasa asing, sastra global, penerjemahan naskah, dan penulisan kreatif.”', fact: 'Sastra Inggris UBSI mengasah kemampuan alih bahasa korporat, diplomasi internasional, dan copy editing.' },
    { id: 12, dim: 'A', dimName: 'Artistic (A)', icon: 'brush', text: '“Saya lebih menikmati tugas kuliah yang memberikan kebebasan berekspresi tanpa aturan kaku yang membatasi ide.”', fact: 'Kurikulum kreatif di FKB UBSI mendorong inovasi portofolio orisinal mahasiswa sejak semester awal.' },

    { id: 13, dim: 'S', dimName: 'Social (S)', icon: 'groups', text: '“Saya senang mendengarkan cerita orang lain, memberikan bantuan konseling, atau membimbing teman memahami materi.”', fact: 'Psikologi Terapan dan Keperawatan di UBSI melatih empati klinis dan pemahaman perilaku manusia.' },
    { id: 14, dim: 'S', dimName: 'Social (S)', icon: 'medical_services', text: '“Saya tertarik pada profesi pelayanan kesehatan medis yang bersentuhan langsung dengan perawatan pasien.”', fact: 'FIK UBSI menjalin kemitraan rumah sakit rujukan nasional untuk praktik klinik mahasiswa.' },
    { id: 15, dim: 'S', dimName: 'Social (S)', icon: 'forum', text: '“Saya mudah bergaul dengan orang baru, senang memandu acara, dan menjaga hubungan baik antar kelompok.”', fact: 'Hubungan Masyarakat UBSI melatih teknik komunikasi publik, protokoler, dan manajemen hubungan komunitas.' },
    { id: 16, dim: 'S', dimName: 'Social (S)', icon: 'hotel', text: '“Saya menyukai dunia pelayanan keramahan (hospitality), menyambut tamu, dan memberikan pengalaman berkesan bagi orang lain.”', fact: 'D3 Perhotelan & S1 Pariwisata UBSI terakreditasi Unggul dengan jaringan hotel internasional.' },

    { id: 17, dim: 'E', dimName: 'Enterprising (E)', icon: 'trending_up', text: '“Saya bersemangat merancang ide bisnis, menjual produk, atau membangun startup digital mandiri.”', fact: 'FEB UBSI memiliki inkubator bisnis BSI Entrepreneur Center (BEC) untuk melatih wirausahawan muda.' },
    { id: 18, dim: 'E', dimName: 'Enterprising (E)', icon: 'campaign', text: '“Saya senang mempengaruhi atau meyakinkan orang lain tentang sebuah gagasan dan mengambil peran kepemimpinan dalam tim.”', fact: 'S1 Manajemen Bisnis UBSI melatih kepemimpinan strategis dan negosiasi pasar digital.' },
    { id: 19, dim: 'E', dimName: 'Enterprising (E)', icon: 'ads_click', text: '“Saya tertarik memahami strategi periklanan digital, tren perilaku konsumen, dan kampanye media sosial berbayar.”', fact: 'Konsentrasi Digital Marketing di UBSI mengajarkan funneling iklan digital, SEO, dan konversi pasar.' },
    { id: 20, dim: 'E', dimName: 'Enterprising (E)', icon: 'gavel', text: '“Saya berani berdebat, menganalisis kontrak kerjasama bisnis, dan menegosiasikan kesepakatan komersial.”', fact: 'S1 Hukum Bisnis Digital UBSI memadukan hukum korporasi dengan kepatuhan transaksi ekonomi digital.' },

    { id: 21, dim: 'C', dimName: 'Conventional (C)', icon: 'receipt_long', text: '“Saya sangat rapi dalam menyusun dokumen, mencatat pemasukan/pengeluaran uang, dan menyukai keteraturan data.”', fact: 'S1 Akuntansi UBSI mengasah ketelitian penyusunan laporan keuangan dan audit berbasis software akuntansi.' },
    { id: 22, dim: 'C', dimName: 'Conventional (C)', icon: 'table_view', text: '“Saya senang bekerja dengan tabel angka, spreadsheet Excel/Google Sheets, dan memverifikasi keakuratan kalkulasi.”', fact: 'D3 Sistem Informasi Akuntansi UBSI mencetak teknisi akuntansi komputer yang cekatan dan teliti.' },
    { id: 23, dim: 'C', dimName: 'Conventional (C)', icon: 'rule', text: '“Saya merasa nyaman mengikuti instruksi kerja, standar operasional prosedur (SOP), dan aturan yang terdefinisi jelas.”', fact: 'Tata kelola kepatuhan regulasi di UBSI mempersiapkan lulusan untuk standar profesi korporat.' },
    { id: 24, dim: 'C', dimName: 'Conventional (C)', icon: 'policy', text: '“Saya tertarik mempelajari regulasi hukum, pasal-pasal undang-undang, serta pengarsipan berkas legal perusahaan.”', fact: 'Fakultas Hukum UBSI membekali mahasiswa dengan keahlian perancangan kontrak hukum dan legal due diligence.' }
  ];

  let currentIndex = 0;
  let userAnswers = {};
  try {
    const raw = localStorage.getItem('majorfit_answers');
    if (raw) {
      userAnswers = JSON.parse(raw) || {};
    }
  } catch (e) {
    userAnswers = {};
  }

  function renderQuestion(index) {
    const q = questions[index];
    const qNum = index + 1;

    document.getElementById('badge-question-num').textContent = qNum < 10 ? '0' + qNum : qNum;
    document.getElementById('text-question-num').textContent = qNum;
    document.getElementById('prompt-question-text').textContent = q.text;
    document.getElementById('badge-dimension-label').innerHTML = `<span class="material-symbols-outlined text-[16px]">${q.icon}</span> Dimensi: ${q.dimName}`;
    document.getElementById('fact-strip-desc').textContent = q.fact;
    document.getElementById('fact-strip-icon').textContent = q.icon;

    const pct = ((qNum / questions.length) * 100).toFixed(1);
    document.getElementById('text-progress-pct').textContent = pct + '%';
    document.getElementById('progress-bar-fill').style.width = pct + '%';
    document.getElementById('tracker-ring-count').textContent = `${qNum} dari 24 Soal`;
    document.getElementById('tracker-ring-pct').textContent = pct + '%';
    document.getElementById('svg-ring-progress').setAttribute('stroke-dasharray', `${pct}, 100`);

    const remaining = questions.length - qNum;
    document.getElementById('text-remaining-questions').textContent = remaining > 0 ? `${remaining} Pertanyaan Lagi` : 'Pertanyaan Terakhir';
    document.getElementById('text-time-est').textContent = remaining > 0 ? `Estimasi: ~${Math.ceil(remaining * 0.25)} menit tersisa` : 'Siap Menampilkan Hasil';

    document.getElementById('btn-prev').disabled = index === 0;

    const currentScore = (userAnswers[q.id] !== undefined && userAnswers[q.id] !== null) ? Number(userAnswers[q.id]) : null;
    
    // STEP 2: Render Likert options in neutral unchecked state by default
    renderLikertSelection(currentScore);

    const nextBtn = document.getElementById('btn-next');
    const nextText = document.getElementById('text-btn-next');
    const nextIcon = document.getElementById('icon-btn-next');

    if (index === questions.length - 1) {
      nextText.textContent = 'Proses & Lihat Hasil ✨';
      nextIcon.textContent = 'stars';
      nextBtn.classList.remove('bg-primary');
      nextBtn.classList.add('bg-tertiary-container', 'hover:bg-tertiary');
    } else {
      nextText.textContent = 'Selanjutnya';
      nextIcon.textContent = 'arrow_forward';
      nextBtn.classList.remove('bg-tertiary-container', 'hover:bg-tertiary');
      nextBtn.classList.add('bg-primary');
    }

    // Disable Next Button if question is not answered yet
    if (currentScore === null) {
      nextBtn.disabled = true;
      nextBtn.classList.add('opacity-40', 'cursor-not-allowed', 'pointer-events-none');
    } else {
      nextBtn.disabled = false;
      nextBtn.classList.remove('opacity-40', 'cursor-not-allowed', 'pointer-events-none');
    }

    const warningEl = document.getElementById('likert-warning-msg');
    if (warningEl) warningEl.classList.add('hidden');

    updateTrackerSidebar(q.dim);
  }

  const likertConfig = {
    1: { icon: 'sentiment_very_dissatisfied', hoverClass: 'group-hover:text-error' },
    2: { icon: 'sentiment_dissatisfied', hoverClass: 'group-hover:text-on-surface' },
    3: { icon: 'sentiment_neutral', hoverClass: 'group-hover:text-primary' },
    4: { icon: 'sentiment_satisfied', hoverClass: 'group-hover:text-secondary' },
    5: { icon: 'sentiment_very_satisfied', hoverClass: 'group-hover:text-tertiary' }
  };

  // STEP 2: Option selection handler - Activates blue styling & enables Next button
  function selectOption(inputOrScore) {
    let score = null;
    if (typeof inputOrScore === 'object' && inputOrScore !== null && 'value' in inputOrScore) {
      score = parseInt(inputOrScore.value, 10);
    } else if (typeof inputOrScore === 'number' || typeof inputOrScore === 'string') {
      score = parseInt(inputOrScore, 10);
    }
    if (!score || isNaN(score)) return;

    const q = questions[currentIndex];
    userAnswers[q.id] = score;
    localStorage.setItem('majorfit_answers', JSON.stringify(userAnswers));
    renderLikertSelection(score);

    // Enable Next button dynamically
    const nextBtn = document.getElementById('btn-next');
    if (nextBtn) {
      nextBtn.disabled = false;
      nextBtn.classList.remove('opacity-40', 'cursor-not-allowed', 'pointer-events-none');
    }

    const warningEl = document.getElementById('likert-warning-msg');
    if (warningEl) warningEl.classList.add('hidden');
  }

  window.selectOption = selectOption;

  // STEP 2: Strict Neutral Render vs Active Selection Dynamic State
  function renderLikertSelection(selectedScore) {
    const cards = document.querySelectorAll('.likert-option');
    cards.forEach(card => {
      const radio = card.querySelector('input[type="radio"]');
      const val = parseInt(card.getAttribute('data-value') || (radio ? radio.value : 0), 10);
      const numSpan = card.querySelector('.opt-num');
      const iconSpan = card.querySelector('.opt-icon');
      const labelSpan = card.querySelector('.opt-label');
      const scoreSpan = card.querySelector('.opt-score');
      const config = likertConfig[val] || { icon: 'sentiment_neutral', hoverClass: 'group-hover:text-primary' };

      const isSelected = (selectedScore !== null && selectedScore !== undefined && val === selectedScore);

      if (radio) {
        radio.checked = isSelected;
      }

      if (isSelected) {
        // Active Selected State (Blue border, solid badge with checkmark)
        card.className = 'likert-option group relative flex flex-col items-center justify-between p-space-md rounded-xl bg-surface-container-lowest text-primary cursor-pointer transition-all duration-200 text-center shadow-md border-2 border-primary scale-[1.02]';
        if (numSpan) {
          numSpan.className = 'opt-num w-8 h-8 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-md text-label-md mb-space-xs shadow-sm font-bold';
          numSpan.innerHTML = '<span class="material-symbols-outlined text-[18px]">check_circle</span>';
        }
        if (iconSpan) {
          iconSpan.className = 'opt-icon material-symbols-outlined text-[26px] text-primary mb-space-xs';
          iconSpan.textContent = config.icon;
        }
        if (labelSpan) {
          labelSpan.className = 'opt-label font-label-md text-label-md text-primary font-bold leading-tight';
        }
        if (scoreSpan) {
          scoreSpan.className = 'opt-score text-[10px] text-primary font-semibold mt-1';
        }
      } else {
        // Unchecked Neutral State (No checkmark, neutral borders)
        card.className = 'likert-option group relative flex flex-col items-center justify-between p-space-md rounded-xl bg-surface-container-low hover:bg-surface-container cursor-pointer transition-all duration-200 text-center border border-outline-variant/30';
        if (numSpan) {
          numSpan.className = 'opt-num w-8 h-8 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center font-label-md text-label-md mb-space-xs group-hover:scale-110 transition-transform font-bold';
          numSpan.textContent = val;
        }
        if (iconSpan) {
          iconSpan.className = `opt-icon material-symbols-outlined text-[26px] text-outline mb-space-xs ${config.hoverClass} transition-colors`;
          iconSpan.textContent = config.icon;
        }
        if (labelSpan) {
          labelSpan.className = 'opt-label font-label-md text-label-md text-on-surface leading-tight font-medium';
        }
        if (scoreSpan) {
          scoreSpan.className = 'opt-score text-[10px] text-on-surface-variant mt-1';
        }
      }
    });
  }

  function updateTrackerSidebar(currentDim) {
    const dims = ['R', 'I', 'A', 'S', 'E', 'C'];
    const dimIdx = dims.indexOf(currentDim);
    document.getElementById('tracker-dimension-summary').textContent = `${dimIdx + 1} dari 6 Dimensi`;

    document.querySelectorAll('.tracker-item').forEach(item => {
      const d = item.getAttribute('data-dim');
      const dIndex = dims.indexOf(d);
      const statusContainer = item.querySelector('.tracker-status');

      if (dIndex < dimIdx) {
        item.className = 'tracker-item flex items-center justify-between p-space-xs px-space-sm rounded-lg bg-surface-container-low font-label-md text-label-md';
        statusContainer.className = 'tracker-status flex items-center gap-1 font-label-sm text-label-sm text-tertiary font-semibold';
        statusContainer.innerHTML = '<span class="material-symbols-outlined text-[16px]">check_circle</span><span>Selesai</span>';
      } else if (dIndex === dimIdx) {
        item.className = 'tracker-item flex items-center justify-between p-space-xs px-space-sm rounded-lg bg-surface-container font-label-md text-label-md shadow-sm border border-primary/20';
        statusContainer.className = 'tracker-status flex items-center gap-1 font-label-sm text-label-sm text-primary font-semibold';
        statusContainer.innerHTML = '<span class="w-2 h-2 rounded-full bg-primary animate-ping"></span><span>Aktif</span>';
      } else {
        item.className = 'tracker-item flex items-center justify-between p-space-xs px-space-sm rounded-lg bg-surface-container-lowest font-label-md text-label-md text-on-surface-variant opacity-75';
        statusContainer.className = 'tracker-status font-label-sm text-label-sm text-outline';
        statusContainer.textContent = 'Menunggu';
      }
    });
  }

  function nextQuestion() {
    const q = questions[currentIndex];
    if (userAnswers[q.id] === undefined || userAnswers[q.id] === null) {
      const likertGroup = document.getElementById('likert-group');
      if (likertGroup) {
        likertGroup.classList.add('ring-2', 'ring-error', 'rounded-xl');
        setTimeout(() => {
          likertGroup.classList.remove('ring-2', 'ring-error');
        }, 1500);

        let warningEl = document.getElementById('likert-warning-msg');
        if (!warningEl) {
          warningEl = document.createElement('div');
          warningEl.id = 'likert-warning-msg';
          warningEl.className = 'flex items-center gap-1.5 text-error font-label-md text-label-md mt-2';
          warningEl.innerHTML = '<span class="material-symbols-outlined text-[18px]">info</span><span>Silakan pilih salah satu jawaban terlebih dahulu sebelum melanjutkan.</span>';
          likertGroup.parentNode.appendChild(warningEl);
        } else {
          warningEl.classList.remove('hidden');
        }
      }
      return;
    }

    if (currentIndex < questions.length - 1) {
      currentIndex++;
      renderQuestion(currentIndex);
      window.scrollTo({ top: 120, behavior: 'smooth' });
    } else {
      // Completed 24th question! Send answers to server to calculate & record into DB
      const nextBtn = document.getElementById('btn-next');
      nextBtn.disabled = true;
      nextBtn.innerHTML = '<span class="material-symbols-outlined animate-spin text-[18px]">sync</span> Kalkulasi Rekomendasi...';

      fetch("{{ route('assessment.calculate') }}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ answers: userAnswers })
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          localStorage.setItem('majorfit_test_completed', 'true');
          window.location.href = data.redirect_url || "{{ route('result') }}";
        } else {
          nextBtn.disabled = false;
          nextBtn.innerHTML = 'Lihat Hasil Rekomendasi ✨ <span class="material-symbols-outlined text-[18px]">stars</span>';
          alert(data.message || 'Terjadi kesalahan saat menghitung hasil.');
        }
      })
      .catch(err => {
        console.error(err);
        window.location.href = "{{ route('result') }}";
      });
    }
  }

  function prevQuestion() {
    if (currentIndex > 0) {
      currentIndex--;
      renderQuestion(currentIndex);
      window.scrollTo({ top: 120, behavior: 'smooth' });
    }
  }

  window.resetAssessment = function() {
    localStorage.removeItem('majorfit_answers');
    localStorage.removeItem('majorfit_test_completed');
    userAnswers = {};
    currentIndex = 0;
    renderQuestion(0);
  };

  document.addEventListener('DOMContentLoaded', () => {
    // Force reset local answer cache on starting a new assessment session
    localStorage.removeItem('majorfit_answers');
    localStorage.removeItem('majorfit_test_completed');
    userAnswers = {};

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('reset') === 'true' || urlParams.get('new') === 'true') {
      window.resetAssessment();
    } else {
      renderQuestion(0);
    }
  });
</script>
@endpush
