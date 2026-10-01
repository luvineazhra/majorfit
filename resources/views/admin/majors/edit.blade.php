@extends('layouts.admin')

@section('title', 'Edit Prodi ' . $major->major_name)
@section('header_title', 'Edit Program Studi & Bobot RIASEC')
@section('header_subtitle', 'Kalibrasi 6-vektor profil minat Holland dan informasi prospek karir untuk ' . $major->major_name)

@section('content')
<div class="space-y-6" x-data="majorEditor({{ json_encode($major) }})">

  <!-- Top Navigation & Action Header -->
  <div class="flex items-center justify-between">
    <a href="{{ route('admin.majors.index') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-white transition-colors">
      <span class="material-symbols-outlined text-lg">arrow_back</span>
      <span>Kembali ke Katalog Prodi</span>
    </a>
    <span class="px-3 py-1 rounded-full text-xs font-mono font-bold bg-slate-800 text-cyan-400 border border-slate-700">
      ID Prodi #{{ $major->id }}
    </span>
  </div>

  <!-- Main Edit Card -->
  <form action="{{ route('admin.majors.update', $major->id) }}" method="POST" class="space-y-8">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
      
      <!-- Left Column: Form Controls (7 Cols) -->
      <div class="lg:col-span-7 bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl space-y-6">
        
        <!-- Major Identification Header -->
        <div class="pb-5 border-b border-slate-800 flex items-start justify-between">
          <div>
            <div class="flex items-center gap-2 mb-1">
              <span class="px-2.5 py-0.5 rounded text-[10px] font-black uppercase tracking-wider {{ $major->degree === 'S1' ? 'bg-cyan-950 text-cyan-300 border border-cyan-800' : 'bg-amber-950 text-amber-300 border border-amber-800' }}">
                Jenjang {{ $major->degree }}
              </span>
              <span class="text-xs text-slate-400 font-medium">{{ $major->faculty_name }}</span>
            </div>
            <h3 class="text-xl font-black text-white">{{ $major->major_name }}</h3>
          </div>
          <div class="w-10 h-10 rounded-xl bg-brand-600/20 text-cyan-400 border border-brand-500/30 flex items-center justify-center flex-shrink-0">
            <span class="material-symbols-outlined text-xl">tune</span>
          </div>
        </div>

        <!-- 1. Deskripsi Program Studi -->
        <div>
          <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
            Deskripsi Program Studi <span class="text-red-400">*</span>
          </label>
          <textarea name="description" 
                    rows="4" 
                    required 
                    class="w-full bg-slate-800/80 border border-slate-700 rounded-xl px-4 py-3 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 leading-relaxed">{{ old('description', $major->description) }}</textarea>
          <p class="text-[11px] text-slate-500 mt-1">Jelaskan keunggulan, fokus kurikulum, dan profil kelulusan prodi ini.</p>
        </div>

        <!-- 2. Prospek Karir & Profesi -->
        <div>
          <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
            Prospek Karir & Profesi Lulusan
          </label>
          <input type="text" 
                 name="career_prospects" 
                 value="{{ old('career_prospects', $major->career_prospects) }}" 
                 placeholder="Contoh: Software Engineer, System Analyst, Fullstack Developer, DevOps" 
                 class="w-full bg-slate-800/80 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
          <p class="text-[11px] text-slate-500 mt-1">Pisahkan nama profesi atau karir dengan tanda koma.</p>
        </div>

        <!-- 3. Kalibrasi Vektor 6 Dimensi RIASEC (Sliders + Number Input) -->
        <div class="pt-4 border-t border-slate-800 space-y-5">
          <div class="flex items-center justify-between">
            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-300 flex items-center gap-2">
              <span class="material-symbols-outlined text-cyan-400 text-lg">equalizer</span>
              Kalibrasi Vektor Bobot Minat (0 - 100)
            </h4>
            <span class="text-[11px] text-slate-400 font-mono">Real-time Radar Sync</span>
          </div>

          <!-- Slider R - Realistic -->
          <div class="p-3.5 rounded-2xl bg-slate-950/60 border border-red-500/20 space-y-2">
            <div class="flex items-center justify-between text-xs font-medium">
              <span class="text-red-400 font-bold flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-red-500"></span> Realistic (R) - Teknik & Fisik
              </span>
              <span class="font-mono font-bold text-white text-sm" x-text="weights.R"></span>
            </div>
            <div class="flex items-center gap-4">
              <input type="range" name="weight_r" min="0" max="100" x-model.number="weights.R" @input="updateChart()" class="flex-1 accent-red-500 bg-slate-800 h-2 rounded-lg cursor-pointer">
              <input type="number" min="0" max="100" x-model.number="weights.R" @input="updateChart()" class="w-16 bg-slate-800 border border-slate-700 rounded-lg text-center text-xs text-white py-1 font-mono">
            </div>
          </div>

          <!-- Slider I - Investigative -->
          <div class="p-3.5 rounded-2xl bg-slate-950/60 border border-blue-500/20 space-y-2">
            <div class="flex items-center justify-between text-xs font-medium">
              <span class="text-blue-400 font-bold flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-blue-500"></span> Investigative (I) - Analitis & Riset
              </span>
              <span class="font-mono font-bold text-white text-sm" x-text="weights.I"></span>
            </div>
            <div class="flex items-center gap-4">
              <input type="range" name="weight_i" min="0" max="100" x-model.number="weights.I" @input="updateChart()" class="flex-1 accent-blue-500 bg-slate-800 h-2 rounded-lg cursor-pointer">
              <input type="number" min="0" max="100" x-model.number="weights.I" @input="updateChart()" class="w-16 bg-slate-800 border border-slate-700 rounded-lg text-center text-xs text-white py-1 font-mono">
            </div>
          </div>

          <!-- Slider A - Artistic -->
          <div class="p-3.5 rounded-2xl bg-slate-950/60 border border-purple-500/20 space-y-2">
            <div class="flex items-center justify-between text-xs font-medium">
              <span class="text-purple-400 font-bold flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-purple-500"></span> Artistic (A) - Desain & Seni
              </span>
              <span class="font-mono font-bold text-white text-sm" x-text="weights.A"></span>
            </div>
            <div class="flex items-center gap-4">
              <input type="range" name="weight_a" min="0" max="100" x-model.number="weights.A" @input="updateChart()" class="flex-1 accent-purple-500 bg-slate-800 h-2 rounded-lg cursor-pointer">
              <input type="number" min="0" max="100" x-model.number="weights.A" @input="updateChart()" class="w-16 bg-slate-800 border border-slate-700 rounded-lg text-center text-xs text-white py-1 font-mono">
            </div>
          </div>

          <!-- Slider S - Social -->
          <div class="p-3.5 rounded-2xl bg-slate-950/60 border border-emerald-500/20 space-y-2">
            <div class="flex items-center justify-between text-xs font-medium">
              <span class="text-emerald-400 font-bold flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Social (S) - Sosial & Edukasi
              </span>
              <span class="font-mono font-bold text-white text-sm" x-text="weights.S"></span>
            </div>
            <div class="flex items-center gap-4">
              <input type="range" name="weight_s" min="0" max="100" x-model.number="weights.S" @input="updateChart()" class="flex-1 accent-emerald-500 bg-slate-800 h-2 rounded-lg cursor-pointer">
              <input type="number" min="0" max="100" x-model.number="weights.S" @input="updateChart()" class="w-16 bg-slate-800 border border-slate-700 rounded-lg text-center text-xs text-white py-1 font-mono">
            </div>
          </div>

          <!-- Slider E - Enterprising -->
          <div class="p-3.5 rounded-2xl bg-slate-950/60 border border-amber-500/20 space-y-2">
            <div class="flex items-center justify-between text-xs font-medium">
              <span class="text-amber-400 font-bold flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-amber-500"></span> Enterprising (E) - Bisnis & Memimpin
              </span>
              <span class="font-mono font-bold text-white text-sm" x-text="weights.E"></span>
            </div>
            <div class="flex items-center gap-4">
              <input type="range" name="weight_e" min="0" max="100" x-model.number="weights.E" @input="updateChart()" class="flex-1 accent-amber-500 bg-slate-800 h-2 rounded-lg cursor-pointer">
              <input type="number" min="0" max="100" x-model.number="weights.E" @input="updateChart()" class="w-16 bg-slate-800 border border-slate-700 rounded-lg text-center text-xs text-white py-1 font-mono">
            </div>
          </div>

          <!-- Slider C - Conventional -->
          <div class="p-3.5 rounded-2xl bg-slate-950/60 border border-cyan-500/20 space-y-2">
            <div class="flex items-center justify-between text-xs font-medium">
              <span class="text-cyan-400 font-bold flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-cyan-500"></span> Conventional (C) - Data & Terstruktur
              </span>
              <span class="font-mono font-bold text-white text-sm" x-text="weights.C"></span>
            </div>
            <div class="flex items-center gap-4">
              <input type="range" name="weight_c" min="0" max="100" x-model.number="weights.C" @input="updateChart()" class="flex-1 accent-cyan-500 bg-slate-800 h-2 rounded-lg cursor-pointer">
              <input type="number" min="0" max="100" x-model.number="weights.C" @input="updateChart()" class="w-16 bg-slate-800 border border-slate-700 rounded-lg text-center text-xs text-white py-1 font-mono">
            </div>
          </div>

        </div>

        <!-- Form Submit Bar -->
        <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-800">
          <a href="{{ route('admin.majors.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition-colors">
            Batal
          </a>
          <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-gradient-to-r from-brand-600 to-cyan-500 hover:from-brand-500 hover:to-cyan-400 text-white text-xs font-bold shadow-lg shadow-brand-600/30 transition-all">
            <span class="material-symbols-outlined text-lg">save</span>
            <span>Simpan Perubahan</span>
          </button>
        </div>

      </div>

      <!-- Right Column: Realtime Radar Chart Preview (5 Cols) -->
      <div class="lg:col-span-5 bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl flex flex-col justify-between h-fit sticky top-24">
        
        <div class="pb-4 border-b border-slate-800 flex items-center justify-between">
          <div>
            <h4 class="text-sm font-bold text-white flex items-center gap-2">
              <span class="material-symbols-outlined text-cyan-400">radar</span>
              Visualisasi Vektor RIASEC
            </h4>
            <p class="text-xs text-slate-400 mt-0.5">Bentuk grafik spider match untuk {{ $major->major_name }}</p>
          </div>
          <span class="px-2 py-1 rounded text-[10px] font-mono font-bold bg-cyan-950 text-cyan-300 border border-cyan-800">
            Live Preview
          </span>
        </div>

        <!-- Radar Chart Container -->
        <div class="relative h-80 w-full my-6 flex items-center justify-center">
          <canvas id="majorRadarChart"></canvas>
        </div>

        <!-- Vector Dominance Summary -->
        <div class="p-4 rounded-2xl bg-slate-950/80 border border-slate-800 space-y-2">
          <p class="text-xs font-bold text-slate-300">Dimensi Dominan Program Studi:</p>
          <div class="flex flex-wrap gap-2 text-xs font-mono font-bold">
            <template x-for="dim in topDimensions" :key="dim.code">
              <span class="px-2.5 py-1 rounded-lg bg-slate-800 border text-slate-200" 
                    :class="{
                      'border-red-500/40 text-red-400': dim.code === 'R',
                      'border-blue-500/40 text-blue-400': dim.code === 'I',
                      'border-purple-500/40 text-purple-400': dim.code === 'A',
                      'border-emerald-500/40 text-emerald-400': dim.code === 'S',
                      'border-amber-500/40 text-amber-400': dim.code === 'E',
                      'border-cyan-500/40 text-cyan-400': dim.code === 'C'
                    }">
                <span x-text="dim.code"></span>: <span x-text="dim.score"></span>
              </span>
            </template>
          </div>
        </div>

      </div>

    </div>

  </form>

</div>
@endsection

@push('scripts')
<script>
  let chartInstance = null;

  function majorEditor(major) {
    return {
      weights: {
        R: Number(major.weight_r || 0),
        I: Number(major.weight_i || 0),
        A: Number(major.weight_a || 0),
        S: Number(major.weight_s || 0),
        E: Number(major.weight_e || 0),
        C: Number(major.weight_c || 0),
      },
      get topDimensions() {
        const arr = [
          { code: 'R', score: this.weights.R },
          { code: 'I', score: this.weights.I },
          { code: 'A', score: this.weights.A },
          { code: 'S', score: this.weights.S },
          { code: 'E', score: this.weights.E },
          { code: 'C', score: this.weights.C },
        ];
        return arr.sort((a, b) => b.score - a.score).slice(0, 3);
      },
      init() {
        this.$nextTick(() => {
          this.initChart();
        });
      },
      initChart() {
        const ctx = document.getElementById('majorRadarChart');
        if (!ctx) return;

        chartInstance = new Chart(ctx, {
          type: 'radar',
          data: {
            labels: ['Realistic (R)', 'Investigative (I)', 'Artistic (A)', 'Social (S)', 'Enterprising (E)', 'Conventional (C)'],
            datasets: [{
              label: 'Vektor Bobot ' + major.major_name,
              data: [this.weights.R, this.weights.I, this.weights.A, this.weights.S, this.weights.E, this.weights.C],
              backgroundColor: 'rgba(42, 150, 250, 0.3)',
              borderColor: '#2a96fa',
              borderWidth: 2,
              pointBackgroundColor: '#2a96fa',
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
                  stepSize: 25,
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
      },
      updateChart() {
        if (chartInstance) {
          chartInstance.data.datasets[0].data = [
            this.weights.R,
            this.weights.I,
            this.weights.A,
            this.weights.S,
            this.weights.E,
            this.weights.C
          ];
          chartInstance.update();
        }
      }
    }
  }
</script>
@endpush
