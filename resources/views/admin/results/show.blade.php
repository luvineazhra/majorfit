@extends('layouts.admin')

@section('title', 'Detail Hasil Asesmen Maba #' . $result->id)
@section('header_title', 'Detail Hasil Asesmen RIASEC')
@section('header_subtitle', 'Laporan lengkap analisis kecocokan profil minat calon mahasiswa dengan katalog prodi UBSI')

@section('content')
<div class="space-y-6">

  <!-- Top Action Header -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <a href="{{ route('admin.results.index') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-white transition-colors">
      <span class="material-symbols-outlined text-lg">arrow_back</span>
      <span>Kembali ke Daftar Hasil Asesmen</span>
    </a>

    <div class="flex items-center gap-3">
      <form id="delete-result-form-show" action="{{ route('admin.results.destroy', $result->id) }}" method="POST" class="inline">
        @csrf
        @method('DELETE')
        <button type="button" 
                onclick="confirmAction('Hapus Data Hasil #{{ $result->id }}?', 'Catatan hasil ini akan dihapus permanen dari database.', 'Ya, Hapus', 'delete-result-form-show')"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-red-950/70 hover:bg-red-900 text-red-300 text-xs font-bold border border-red-500/40 transition-colors shadow-lg">
          <span class="material-symbols-outlined text-lg">delete</span>
          <span>Hapus Record Maba</span>
        </button>
      </form>
    </div>
  </div>

  <!-- Student Overview Header Card -->
  <div class="p-6 rounded-3xl bg-slate-900 border border-slate-800 shadow-xl flex flex-col md:flex-row md:items-center justify-between gap-6">
    <div class="flex items-center gap-4">
      <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-brand-600 via-cyan-500 to-blue-400 text-white flex items-center justify-center font-black text-2xl shadow-xl shadow-brand-600/30">
        {{ substr($result->nama_maba ?: 'M', 0, 1) }}
      </div>
      <div>
        <div class="flex items-center gap-2">
          <h2 class="text-xl font-black text-white">{{ $result->nama_maba ?: 'Calon Mahasiswa Baru #' . $result->id }}</h2>
          <span class="px-2 py-0.5 rounded text-[10px] font-extrabold uppercase bg-cyan-950 text-cyan-300 border border-cyan-800/60">
            Calon Maba UBSI
          </span>
        </div>
        <p class="text-xs text-slate-300 font-mono mt-0.5">{{ $result->email_maba }} @if($result->no_wa) • WA: {{ $result->no_wa }} @endif</p>
        <p class="text-[11px] text-slate-400 mt-0.5">
          @if($result->asal_sekolah) Sekolah: <strong>{{ $result->asal_sekolah }}</strong> • @endif
          Waktu Selesai: {{ $result->completed_at ? $result->completed_at->format('d M Y, H:i WIB') : $result->created_at->format('d M Y, H:i WIB') }}
        </p>
      </div>
    </div>

    <!-- Holland Code Big Pill -->
    <div class="p-4 rounded-2xl bg-slate-950 border border-slate-800 flex items-center gap-4 text-center">
      <div>
        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Kode Minat Holland</p>
        <p class="text-3xl font-black text-cyan-400 font-mono tracking-widest mt-0.5">{{ $result->getHollandCode(3) }}</p>
      </div>
      <div class="w-12 h-12 rounded-xl bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 flex items-center justify-center">
        <span class="material-symbols-outlined text-2xl">psychology</span>
      </div>
    </div>
  </div>

  <!-- Content Grid (2 Columns) -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- Left Column: 6-Dimension Scores & Radar Chart (7 Cols) -->
    <div class="lg:col-span-7 bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl space-y-6">
      
      <div class="pb-4 border-b border-slate-800 flex items-center justify-between">
        <h3 class="text-base font-bold text-white flex items-center gap-2">
          <span class="material-symbols-outlined text-cyan-400">bar_chart</span>
          Rincian Skor 6 Dimensi Holland RIASEC
        </h3>
        <span class="text-xs text-slate-400 font-mono">Skala Persentase 0-100%</span>
      </div>

      <!-- Dimension Bars List -->
      @php
        $scores = [
          'R' => ['name' => 'Realistic (R)', 'score' => $result->score_r, 'color' => 'bg-red-500', 'text' => 'text-red-400'],
          'I' => ['name' => 'Investigative (I)', 'score' => $result->score_i, 'color' => 'bg-blue-500', 'text' => 'text-blue-400'],
          'A' => ['name' => 'Artistic (A)', 'score' => $result->score_a, 'color' => 'bg-purple-500', 'text' => 'text-purple-400'],
          'S' => ['name' => 'Social (S)', 'score' => $result->score_s, 'color' => 'bg-emerald-500', 'text' => 'text-emerald-400'],
          'E' => ['name' => 'Enterprising (E)', 'score' => $result->score_e, 'color' => 'bg-amber-500', 'text' => 'text-amber-400'],
          'C' => ['name' => 'Conventional (C)', 'score' => $result->score_c, 'color' => 'bg-cyan-500', 'text' => 'text-cyan-400'],
        ];
      @endphp

      <div class="space-y-4">
        @foreach($scores as $code => $item)
          <div class="space-y-1.5">
            <div class="flex items-center justify-between text-xs font-semibold">
              <span class="{{ $item['text'] }}">{{ $item['name'] }}</span>
              <span class="font-mono text-white text-sm">{{ number_format($item['score'], 1) }}%</span>
            </div>
            <div class="w-full bg-slate-800 rounded-full h-3 overflow-hidden p-0.5 border border-slate-700">
              <div class="h-full rounded-full {{ $item['color'] }} transition-all duration-500" style="width: {{ min(100, max(5, $item['score'])) }}%;"></div>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Radar Chart Canvas -->
      <div class="pt-6 border-t border-slate-800">
        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-4">Grafik Radar Spider Asesmen</h4>
        <div class="relative h-72 w-full flex items-center justify-center">
          <canvas id="studentRadarChart"></canvas>
        </div>
      </div>

    </div>

    <!-- Right Column: Top 3 Recommended Majors & AI Insights (5 Cols) -->
    <div class="lg:col-span-5 space-y-6">
      
      <!-- Top 3 Recommended Majors Box -->
      <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl space-y-5">
        
        <div class="pb-4 border-b border-slate-800 flex items-center justify-between">
          <h3 class="text-base font-bold text-white flex items-center gap-2">
            <span class="material-symbols-outlined text-amber-400">workspace_premium</span>
            Top 3 Rekomendasi Prodi UBSI
          </h3>
          <span class="px-2 py-0.5 text-[10px] font-bold rounded bg-amber-950 text-amber-300 border border-amber-800">Algoritma Matrik</span>
        </div>

        <!-- Major #1 -->
        @if($result->top1Major)
          <div class="p-4 rounded-2xl bg-gradient-to-r from-brand-950/70 to-slate-950 border border-brand-500/40 shadow-lg space-y-2">
            <div class="flex items-center justify-between">
              <span class="px-2 py-0.5 rounded text-[10px] font-extrabold uppercase bg-brand-600 text-white shadow">MATCH #1</span>
              <span class="text-xs font-mono font-bold text-cyan-300">{{ $result->top1Major->degree }}</span>
            </div>
            <h4 class="text-base font-bold text-white">{{ $result->top1Major->major_name }}</h4>
            <p class="text-xs text-slate-300 font-medium">{{ $result->top1Major->faculty_name }}</p>
            @if($result->top1Major->career_prospects)
              <p class="text-[11px] text-slate-400 mt-1"><span class="font-semibold text-slate-300">Karir:</span> {{ $result->top1Major->career_prospects }}</p>
            @endif
          </div>
        @endif

        <!-- Major #2 -->
        @if($result->top2Major)
          <div class="p-4 rounded-2xl bg-slate-950/80 border border-slate-800 space-y-1.5">
            <div class="flex items-center justify-between">
              <span class="px-2 py-0.5 rounded text-[10px] font-extrabold uppercase bg-slate-800 text-slate-300">MATCH #2</span>
              <span class="text-xs font-mono font-bold text-slate-400">{{ $result->top2Major->degree }}</span>
            </div>
            <h4 class="text-sm font-bold text-slate-200">{{ $result->top2Major->major_name }}</h4>
            <p class="text-[11px] text-slate-400">{{ $result->top2Major->faculty_name }}</p>
          </div>
        @endif

        <!-- Major #3 -->
        @if($result->top3Major)
          <div class="p-4 rounded-2xl bg-slate-950/80 border border-slate-800 space-y-1.5">
            <div class="flex items-center justify-between">
              <span class="px-2 py-0.5 rounded text-[10px] font-extrabold uppercase bg-slate-800 text-slate-300">MATCH #3</span>
              <span class="text-xs font-mono font-bold text-slate-400">{{ $result->top3Major->degree }}</span>
            </div>
            <h4 class="text-sm font-bold text-slate-200">{{ $result->top3Major->major_name }}</h4>
            <p class="text-[11px] text-slate-400">{{ $result->top3Major->faculty_name }}</p>
          </div>
        @endif

      </div>

      <!-- AI Explanation / Insights -->
      @if($result->ai_explanation)
        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl space-y-4">
          <h4 class="text-sm font-bold text-white flex items-center gap-2">
            <span class="material-symbols-outlined text-cyan-400">auto_awesome</span>
            Analisis & Rekomendasi Sistem
          </h4>
          <div class="p-4 rounded-2xl bg-slate-950/80 border border-slate-800 text-xs text-slate-300 leading-relaxed whitespace-pre-line">
            {{ $result->ai_explanation }}
          </div>
        </div>
      @endif

    </div>

  </div>

</div>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('studentRadarChart');
    if (ctx) {
      new Chart(ctx, {
        type: 'radar',
        data: {
          labels: ['Realistic (R)', 'Investigative (I)', 'Artistic (A)', 'Social (S)', 'Enterprising (E)', 'Conventional (C)'],
          datasets: [{
            label: 'Profil Minat {{ addslashes($result->nama_maba ?: "Calon Maba") }}',
            data: [
              {{ $result->score_r }},
              {{ $result->score_i }},
              {{ $result->score_a }},
              {{ $result->score_s }},
              {{ $result->score_e }},
              {{ $result->score_c }}
            ],
            backgroundColor: 'rgba(6, 182, 212, 0.3)',
            borderColor: '#06b6d4',
            borderWidth: 2,
            pointBackgroundColor: '#06b6d4',
            pointBorderColor: '#ffffff',
            pointRadius: 4,
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            r: {
              angleLines: { color: 'rgba(148, 163, 184, 0.15)' },
              grid: { color: 'rgba(148, 163, 184, 0.15)' },
              pointLabels: {
                color: '#94a3b8',
                font: { size: 10, family: 'Inter', weight: 600 }
              },
              ticks: {
                backdropColor: 'transparent',
                color: '#64748b',
                stepSize: 20,
                font: { size: 9 }
              },
              suggestedMin: 0,
              suggestedMax: 100
            }
          },
          plugins: {
            legend: { display: false }
          }
        }
      });
    }
  });
</script>
@endpush
