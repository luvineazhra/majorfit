@extends('layouts.admin')

@section('title', 'Dashboard Analitik')
@section('header_title', 'Dashboard Analitik PMB')
@section('header_subtitle', 'Ringkasan performa asesmen minat RIASEC, distribusi dimensi, dan prodi rekomendasi teratas')

@section('content')
<div class="space-y-8">

  <!-- ========================================== -->
  <!-- 1. Key Performance Metric Cards (4 Cards)  -->
  <!-- ========================================== -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

    <!-- Card 1: Total Calon Maba -->
    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 shadow-xl relative overflow-hidden group hover:border-slate-700 transition-all">
      <div class="absolute top-0 right-0 w-28 h-28 bg-blue-500/10 rounded-full blur-2xl group-hover:bg-blue-500/20 transition-all"></div>
      <div class="flex items-center justify-between">
        <div>
          <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Calon Maba</p>
          <h3 class="text-3xl font-extrabold text-white mt-1">{{ number_format($totalMaba) }}</h3>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-blue-500/15 border border-blue-500/30 text-blue-400 flex items-center justify-center">
          <span class="material-symbols-outlined text-2xl">groups</span>
        </div>
      </div>
      <div class="mt-4 flex items-center gap-2 text-xs text-slate-400">
        <span class="inline-flex items-center text-emerald-400 font-semibold gap-0.5">
          <span class="material-symbols-outlined text-sm">trending_up</span> Aktif
        </span>
        <span>Terdaftar di sistem PMB</span>
      </div>
    </div>

    <!-- Card 2: Asesmen Selesai -->
    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 shadow-xl relative overflow-hidden group hover:border-slate-700 transition-all">
      <div class="absolute top-0 right-0 w-28 h-28 bg-emerald-500/10 rounded-full blur-2xl group-hover:bg-emerald-500/20 transition-all"></div>
      <div class="flex items-center justify-between">
        <div>
          <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Asesmen Selesai</p>
          <h3 class="text-3xl font-extrabold text-white mt-1">{{ number_format($totalTests) }}</h3>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-400 flex items-center justify-center">
          <span class="material-symbols-outlined text-2xl">task_alt</span>
        </div>
      </div>
      <div class="mt-4 flex items-center gap-2 text-xs text-slate-400">
        <span class="inline-flex items-center text-emerald-400 font-semibold gap-0.5">
          <span class="material-symbols-outlined text-sm">done_all</span> 100%
        </span>
        <span>Kalkulasi rekomendasi tuntas</span>
      </div>
    </div>

    <!-- Card 3: Soal RIASEC Aktif -->
    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 shadow-xl relative overflow-hidden group hover:border-slate-700 transition-all">
      <div class="absolute top-0 right-0 w-28 h-28 bg-cyan-500/10 rounded-full blur-2xl group-hover:bg-cyan-500/20 transition-all"></div>
      <div class="flex items-center justify-between">
        <div>
          <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Bank Soal RIASEC</p>
          <h3 class="text-3xl font-extrabold text-white mt-1">{{ $activeQuestions }} <span class="text-sm font-semibold text-slate-500">/ {{ $totalQuestions }}</span></h3>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-cyan-500/15 border border-cyan-500/30 text-cyan-400 flex items-center justify-center">
          <span class="material-symbols-outlined text-2xl">quiz</span>
        </div>
      </div>
      <div class="mt-4 flex items-center gap-2 text-xs text-slate-400">
        <span class="inline-flex items-center text-cyan-400 font-semibold gap-0.5">
          <span class="material-symbols-outlined text-sm">tune</span> 6 Dimensi
        </span>
        <span>R, I, A, S, E, C lengkap</span>
      </div>
    </div>

    <!-- Card 4: Total Program Studi UBSI -->
    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 shadow-xl relative overflow-hidden group hover:border-slate-700 transition-all">
      <div class="absolute top-0 right-0 w-28 h-28 bg-amber-500/10 rounded-full blur-2xl group-hover:bg-amber-500/20 transition-all"></div>
      <div class="flex items-center justify-between">
        <div>
          <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Katalog Prodi UBSI</p>
          <h3 class="text-3xl font-extrabold text-white mt-1">{{ $totalMajors }} <span class="text-sm font-semibold text-slate-500">Prodi</span></h3>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-amber-500/15 border border-amber-500/30 text-amber-400 flex items-center justify-center">
          <span class="material-symbols-outlined text-2xl">account_balance</span>
        </div>
      </div>
      <div class="mt-4 flex items-center gap-2 text-xs text-slate-400">
        <span class="inline-flex items-center text-amber-400 font-semibold gap-0.5">
          <span class="material-symbols-outlined text-sm">domain</span> 3 Fakultas
        </span>
        <span>FTI, FEB, & FKB</span>
      </div>
    </div>

  </div>

  <!-- ========================================== -->
  <!-- 2. Interactive Charts Section (2 Columns)  -->
  <!-- ========================================== -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

    <!-- Chart 1: RIASEC Radar & Bar Distribution (7 Cols) -->
    <div class="lg:col-span-7 bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl flex flex-col justify-between">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-4 border-b border-slate-800">
        <div>
          <h3 class="text-base font-bold text-white flex items-center gap-2">
            <span class="material-symbols-outlined text-cyan-400">radar</span>
            Rerata Distribusi Dimensi Holland RIASEC
          </h3>
          <p class="text-xs text-slate-400 mt-0.5">Skor rata-rata kecenderungan minat mahasiswa baru pada 6 dimensi</p>
        </div>
        <span class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-cyan-950/80 text-cyan-300 border border-cyan-800/40">Skala 0 - 100</span>
      </div>

      <!-- Radar Canvas -->
      <div class="relative h-72 sm:h-80 w-full mt-4 flex items-center justify-center">
        <canvas id="riasecRadarChart"></canvas>
      </div>

      <!-- Dimension Badges Footer -->
      <div class="grid grid-cols-3 sm:grid-cols-6 gap-2 pt-4 mt-4 border-t border-slate-800 text-center text-xs">
        <div class="p-2 rounded-xl bg-red-950/30 border border-red-500/20">
          <p class="text-red-400 font-bold text-sm">{{ $avgScores['R'] }}%</p>
          <p class="text-[10px] text-slate-400">Realistic</p>
        </div>
        <div class="p-2 rounded-xl bg-blue-950/30 border border-blue-500/20">
          <p class="text-blue-400 font-bold text-sm">{{ $avgScores['I'] }}%</p>
          <p class="text-[10px] text-slate-400">Investigative</p>
        </div>
        <div class="p-2 rounded-xl bg-purple-950/30 border border-purple-500/20">
          <p class="text-purple-400 font-bold text-sm">{{ $avgScores['A'] }}%</p>
          <p class="text-[10px] text-slate-400">Artistic</p>
        </div>
        <div class="p-2 rounded-xl bg-emerald-950/30 border border-emerald-500/20">
          <p class="text-emerald-400 font-bold text-sm">{{ $avgScores['S'] }}%</p>
          <p class="text-[10px] text-slate-400">Social</p>
        </div>
        <div class="p-2 rounded-xl bg-amber-950/30 border border-amber-500/20">
          <p class="text-amber-400 font-bold text-sm">{{ $avgScores['E'] }}%</p>
          <p class="text-[10px] text-slate-400">Enterprising</p>
        </div>
        <div class="p-2 rounded-xl bg-cyan-950/30 border border-cyan-500/20">
          <p class="text-cyan-400 font-bold text-sm">{{ $avgScores['C'] }}%</p>
          <p class="text-[10px] text-slate-400">Conventional</p>
        </div>
      </div>
    </div>

    <!-- Chart 2: Top Recommended Majors (5 Cols) -->
    <div class="lg:col-span-5 bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl flex flex-col justify-between">
      <div class="flex items-center justify-between pb-4 border-b border-slate-800">
        <div>
          <h3 class="text-base font-bold text-white flex items-center gap-2">
            <span class="material-symbols-outlined text-amber-400">pie_chart</span>
            Top Program Studi Rekomendasi
          </h3>
          <p class="text-xs text-slate-400 mt-0.5">Jurusan UBSI yang paling sering menjadi Top Match #1</p>
        </div>
      </div>

      <!-- Doughnut Chart Canvas -->
      <div class="relative h-64 w-full mt-4 flex items-center justify-center">
        <canvas id="topMajorsChart"></canvas>
      </div>

      <!-- Top Majors List Legend -->
      <div class="space-y-2 pt-4 mt-4 border-t border-slate-800">
        @foreach($topMajorsData as $index => $majorData)
          <div class="flex items-center justify-between text-xs">
            <div class="flex items-center gap-2 min-w-0">
              <span class="w-2.5 h-2.5 rounded-full flex-shrink-0" style="background-color: {{ ['#3b82f6', '#06b6d4', '#10b981', '#f59e0b', '#a855f7'][$index % 5] }};"></span>
              <span class="text-slate-200 truncate font-medium">{{ $majorData['name'] }}</span>
            </div>
            <span class="font-bold text-slate-300 font-mono flex-shrink-0">{{ $majorData['count'] }} Maba</span>
          </div>
        @endforeach
      </div>
    </div>

  </div>

  <!-- ========================================== -->
  <!-- 3. Recent Test Submissions Table           -->
  <!-- ========================================== -->
  <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-5 border-b border-slate-800">
      <div>
        <h3 class="text-base font-bold text-white flex items-center gap-2">
          <span class="material-symbols-outlined text-cyan-400">history_edu</span>
          Aktivitas Asesmen Mahasiswa Terbaru
        </h3>
        <p class="text-xs text-slate-400 mt-0.5">Daftar calon mahasiswa yang baru saja menyelesaikan tes RIASEC</p>
      </div>
      <a href="{{ route('admin.results.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-cyan-300 hover:text-white text-xs font-semibold border border-slate-700 transition-colors">
        <span>Lihat Semua Hasil</span>
        <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
      </a>
    </div>

    <!-- Table Container -->
    <div class="overflow-x-auto mt-4">
      <table class="w-full text-left border-collapse text-xs">
        <thead>
          <tr class="border-b border-slate-800 text-slate-400 uppercase tracking-wider font-semibold">
            <th class="py-3 px-4">Nama Mahasiswa</th>
            <th class="py-3 px-4">Kode Holland</th>
            <th class="py-3 px-4">Top 1 Rekomendasi</th>
            <th class="py-3 px-4">Fakultas</th>
            <th class="py-3 px-4">Waktu Tes</th>
            <th class="py-3 px-4 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-800/60">
          @forelse($recentResults as $res)
            <tr class="hover:bg-slate-800/40 transition-colors">
              <td class="py-3 px-4">
                <div class="flex items-center gap-2.5">
                  <div class="w-7 h-7 rounded-lg bg-slate-800 border border-slate-700 flex items-center justify-center font-bold text-white text-xs">
                    {{ substr($res->nama_maba ?: 'M', 0, 1) }}
                  </div>
                  <div>
                    <p class="font-semibold text-slate-200">{{ $res->nama_maba ?: 'Maba #' . $res->id }}</p>
                    <p class="text-[11px] text-slate-400">{{ $res->email_maba ?: '-' }} @if($res->asal_sekolah) • {{ $res->asal_sekolah }} @endif</p>
                  </div>
                </div>
              </td>
              <td class="py-3 px-4">
                <span class="px-2.5 py-1 rounded-md bg-brand-900/60 text-cyan-300 font-mono font-bold border border-cyan-500/30">
                  {{ $res->getHollandCode(3) }}
                </span>
              </td>
              <td class="py-3 px-4">
                <div class="font-semibold text-white">
                  {{ $res->top1Major->major_name ?? '-' }}
                </div>
                <span class="text-[10px] text-cyan-400">Jenjang {{ $res->top1Major->degree ?? 'S1' }}</span>
              </td>
              <td class="py-3 px-4">
                <span class="text-slate-300">{{ $res->top1Major->faculty_name ?? '-' }}</span>
              </td>
              <td class="py-3 px-4 text-slate-400">
                {{ $res->completed_at ? $res->completed_at->format('d M Y, H:i') : $res->created_at->format('d M Y, H:i') }}
              </td>
              <td class="py-3 px-4 text-center">
                <a href="{{ route('admin.results.show', $res->id) }}" class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-lg bg-cyan-950/60 hover:bg-cyan-900 text-cyan-300 text-xs font-semibold border border-cyan-800/50 transition-colors">
                  <span class="material-symbols-outlined text-sm">visibility</span>
                  <span>Detail</span>
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="py-8 text-center text-slate-400">
                <span class="material-symbols-outlined text-4xl text-slate-600 block mb-2">assignment_late</span>
                Belum ada data asesmen yang masuk. Lakukan simulasi tes di portal mahasiswa.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- ========================================== -->
  <!-- 4. Fast Action Shortcuts                   -->
  <!-- ========================================== -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
    
    <a href="{{ route('admin.questions.index') }}" class="p-5 rounded-2xl bg-gradient-to-br from-slate-900 to-slate-900/90 border border-slate-800 hover:border-cyan-500/40 shadow-xl group transition-all">
      <div class="flex items-center gap-4">
        <div class="w-12 h-12 rounded-2xl bg-cyan-500/15 border border-cyan-500/30 text-cyan-400 flex items-center justify-center group-hover:scale-110 transition-transform">
          <span class="material-symbols-outlined text-2xl">add_circle</span>
        </div>
        <div>
          <h4 class="font-bold text-sm text-white group-hover:text-cyan-300 transition-colors">Kelola Butir Soal RIASEC</h4>
          <p class="text-xs text-slate-400 mt-0.5">Tambah pertanyaan baru atau sesuaikan dimensi</p>
        </div>
      </div>
    </a>

    <a href="{{ route('admin.majors.index') }}" class="p-5 rounded-2xl bg-gradient-to-br from-slate-900 to-slate-900/90 border border-slate-800 hover:border-blue-500/40 shadow-xl group transition-all">
      <div class="flex items-center gap-4">
        <div class="w-12 h-12 rounded-2xl bg-blue-500/15 border border-blue-500/30 text-blue-400 flex items-center justify-center group-hover:scale-110 transition-transform">
          <span class="material-symbols-outlined text-2xl">tune</span>
        </div>
        <div>
          <h4 class="font-bold text-sm text-white group-hover:text-blue-300 transition-colors">Kalibrasi Bobot Vektor Prodi</h4>
          <p class="text-xs text-slate-400 mt-0.5">Atur bobot 6-dimensi untuk 21 Program Studi UBSI</p>
        </div>
      </div>
    </a>

    <a href="{{ route('admin.results.index') }}" class="p-5 rounded-2xl bg-gradient-to-br from-slate-900 to-slate-900/90 border border-slate-800 hover:border-emerald-500/40 shadow-xl group transition-all">
      <div class="flex items-center gap-4">
        <div class="w-12 h-12 rounded-2xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-400 flex items-center justify-center group-hover:scale-110 transition-transform">
          <span class="material-symbols-outlined text-2xl">manage_accounts</span>
        </div>
        <div>
          <h4 class="font-bold text-sm text-white group-hover:text-emerald-300 transition-colors">Manajemen Hasil & Reset Status</h4>
          <p class="text-xs text-slate-400 mt-0.5">Izinkan maba mengulang tes atau ekspor data</p>
        </div>
      </div>
    </a>

  </div>

</div>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {

    // ==========================================
    // 1. RIASEC Radar Chart Initialization
    // ==========================================
    const radarCtx = document.getElementById('riasecRadarChart');
    if (radarCtx) {
      new Chart(radarCtx, {
        type: 'radar',
        data: {
          labels: ['Realistic (R)', 'Investigative (I)', 'Artistic (A)', 'Social (S)', 'Enterprising (E)', 'Conventional (C)'],
          datasets: [{
            label: 'Rata-rata Skor Mahasiswa',
            data: [
              {{ $avgScores['R'] }},
              {{ $avgScores['I'] }},
              {{ $avgScores['A'] }},
              {{ $avgScores['S'] }},
              {{ $avgScores['E'] }},
              {{ $avgScores['C'] }}
            ],
            backgroundColor: 'rgba(6, 182, 212, 0.25)',
            borderColor: '#06b6d4',
            borderWidth: 2,
            pointBackgroundColor: '#06b6d4',
            pointBorderColor: '#ffffff',
            pointHoverBackgroundColor: '#ffffff',
            pointHoverBorderColor: '#06b6d4',
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
                font: { size: 11, family: 'Inter', weight: 600 }
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
            legend: {
              display: false
            },
            tooltip: {
              backgroundColor: '#0f172a',
              titleColor: '#f8fafc',
              bodyColor: '#38bdf8',
              borderColor: '#334155',
              borderWidth: 1,
              padding: 10,
              callbacks: {
                label: function(context) {
                  return ' Skor Rata-rata: ' + context.raw + '%';
                }
              }
            }
          }
        }
      });
    }

    // ==========================================
    // 2. Top Recommended Majors Doughnut Chart
    // ==========================================
    const doughnutCtx = document.getElementById('topMajorsChart');
    if (doughnutCtx) {
      const topLabels = {!! json_encode($topMajorsData->pluck('name')) !!};
      const topCounts = {!! json_encode($topMajorsData->pluck('count')) !!};

      new Chart(doughnutCtx, {
        type: 'doughnut',
        data: {
          labels: topLabels,
          datasets: [{
            data: topCounts,
            backgroundColor: [
              '#3b82f6', // Blue
              '#06b6d4', // Cyan
              '#10b981', // Emerald
              '#f59e0b', // Amber
              '#a855f7', // Purple
            ],
            borderColor: '#0f172a',
            borderWidth: 3,
            hoverOffset: 6
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          cutout: '70%',
          plugins: {
            legend: {
              display: false
            },
            tooltip: {
              backgroundColor: '#0f172a',
              titleColor: '#f8fafc',
              bodyColor: '#38bdf8',
              borderColor: '#334155',
              borderWidth: 1,
              padding: 10,
              callbacks: {
                label: function(context) {
                  return ' ' + context.label + ': ' + context.raw + ' Mahasiswa';
                }
              }
            }
          }
        }
      });
    }

  });
</script>
@endpush
