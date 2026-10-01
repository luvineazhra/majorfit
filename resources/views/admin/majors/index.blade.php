@extends('layouts.admin')

@section('title', 'Katalog Prodi UBSI')
@section('header_title', 'Katalog Program Studi UBSI')
@section('header_subtitle', 'Kelola 21 Program Studi Universitas Bina Sarana Informatika dan kalibrasi 6 vektor bobot RIASEC')

@section('content')
<div class="space-y-6" x-data="majorsManager()">

  <!-- ========================================== -->
  <!-- 1. Stats Bar & Faculty Overview Cards      -->
  <!-- ========================================== -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <!-- Card Total Prodi -->
    <div class="p-4 rounded-2xl bg-slate-900 border border-slate-800 shadow-md flex items-center justify-between">
      <div>
        <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Total Program Studi</p>
        <h3 class="text-2xl font-black text-white mt-0.5">{{ $totalMajors }} <span class="text-xs font-semibold text-slate-500">Prodi</span></h3>
        <p class="text-[11px] text-cyan-400 mt-1 font-medium">Jenjang S1 & D3 Terakreditasi</p>
      </div>
      <div class="w-12 h-12 rounded-2xl bg-brand-600/20 border border-brand-500/30 text-cyan-400 flex items-center justify-center">
        <span class="material-symbols-outlined text-2xl">school</span>
      </div>
    </div>

    <!-- Faculty Counts Pills -->
    @php
      $facIcons = [
        'Fakultas Teknik & Informatika' => ['icon' => 'terminal', 'color' => 'blue', 'badge' => 'FTI'],
        'Fakultas Ekonomi & Bisnis' => ['icon' => 'payments', 'color' => 'emerald', 'badge' => 'FEB'],
        'Fakultas Komunikasi & Bahasa' => ['icon' => 'record_voice_over', 'color' => 'purple', 'badge' => 'FKB'],
      ];
    @endphp

    @foreach($faculties as $facName)
      @php
        $info = $facIcons[$facName] ?? ['icon' => 'domain', 'color' => 'cyan', 'badge' => 'UBSI'];
        $count = $facultyCounts[$facName] ?? 0;
      @endphp
      <a href="{{ route('admin.majors.index', ['faculty' => $faculty === $facName ? null : $facName]) }}" 
         class="p-4 rounded-2xl border transition-all hover:scale-[1.02] flex items-center justify-between {{ $faculty === $facName ? 'bg-slate-800 border-cyan-500/40 ring-2 ring-cyan-500/20 shadow-lg' : 'bg-slate-900 border-slate-800 hover:border-slate-700' }}">
        <div class="min-w-0">
          <div class="flex items-center gap-1.5">
            <span class="px-1.5 py-0.5 rounded text-[10px] font-extrabold uppercase bg-slate-800 text-slate-300 border border-slate-700">{{ $info['badge'] }}</span>
            <span class="text-xs font-bold text-white truncate">{{ $facName }}</span>
          </div>
          <p class="text-lg font-black text-slate-200 mt-1">{{ $count }} <span class="text-xs font-normal text-slate-400">Prodi</span></p>
        </div>
        <div class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700 text-slate-300 flex items-center justify-center flex-shrink-0">
          <span class="material-symbols-outlined">{{ $info['icon'] }}</span>
        </div>
      </a>
    @endforeach
  </div>

  <!-- ========================================== -->
  <!-- 2. Main Content Box & Filter Toolbar       -->
  <!-- ========================================== -->
  <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl space-y-6">
    
    <!-- Filter Toolbar -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 pb-6 border-b border-slate-800">
      
      <!-- Left: Faculty Tabs -->
      <div class="flex items-center gap-2 overflow-x-auto pb-2 lg:pb-0 scrollbar-none">
        <a href="{{ route('admin.majors.index') }}" 
           class="px-4 py-2 rounded-xl text-xs font-semibold transition-all whitespace-nowrap {{ !$faculty ? 'bg-brand-600 text-white shadow-md shadow-brand-600/30' : 'bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white' }}">
          Semua Fakultas (21)
        </a>
        @foreach($faculties as $facName)
          <a href="{{ route('admin.majors.index', ['faculty' => $facName]) }}" 
             class="px-4 py-2 rounded-xl text-xs font-semibold transition-all whitespace-nowrap flex items-center gap-2 {{ $faculty === $facName ? 'bg-brand-600 text-white shadow-md shadow-brand-600/30' : 'bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white' }}">
            <span>{{ $facName }}</span>
            <span class="px-1.5 py-0.5 text-[10px] rounded-md bg-slate-950/60 font-mono">{{ $facultyCounts[$facName] ?? 0 }}</span>
          </a>
        @endforeach
      </div>

      <!-- Right: Search Form & Jenjang Filter -->
      <form method="GET" action="{{ route('admin.majors.index') }}" class="flex items-center gap-2">
        @if($faculty)
          <input type="hidden" name="faculty" value="{{ $faculty }}">
        @endif
        
        <select name="degree" onchange="this.form.submit()" class="bg-slate-800 border border-slate-700 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-brand-500">
          <option value="">Semua Jenjang</option>
          <option value="S1" {{ $degree === 'S1' ? 'selected' : '' }}>Jenjang S1</option>
          <option value="D3" {{ $degree === 'D3' ? 'selected' : '' }}>Jenjang D3</option>
        </select>

        <div class="relative w-full sm:w-64">
          <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-500 text-lg">search</span>
          <input type="text" 
                 name="search" 
                 value="{{ $search }}" 
                 placeholder="Cari prodi atau karir..." 
                 class="w-full bg-slate-800 border border-slate-700 rounded-xl pl-9 pr-4 py-2 text-xs text-white placeholder-slate-400 focus:outline-none focus:border-brand-500">
        </div>
      </form>

    </div>

    <!-- Grid List of Majors (2 Columns) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
      @forelse($majors as $m)
        <div class="p-5 rounded-2xl bg-slate-950/80 border border-slate-800/80 hover:border-cyan-500/40 shadow-lg transition-all flex flex-col justify-between group">
          
          <div>
            <!-- Major Header Info -->
            <div class="flex items-start justify-between gap-3">
              <div>
                <div class="flex items-center gap-2 mb-1">
                  <span class="px-2 py-0.5 rounded text-[10px] font-black tracking-wider uppercase {{ $m->degree === 'S1' ? 'bg-cyan-950 text-cyan-300 border border-cyan-800/60' : 'bg-amber-950 text-amber-300 border border-amber-800/60' }}">
                    {{ $m->degree }}
                  </span>
                  <span class="text-[11px] text-slate-400 font-medium">{{ $m->faculty_name }}</span>
                </div>
                <h4 class="text-base font-bold text-white group-hover:text-cyan-300 transition-colors">
                  {{ $m->major_name }}
                </h4>
              </div>

              <!-- Quick Edit Button -->
              <a href="{{ route('admin.majors.edit', $m->id) }}" 
                 class="p-2 rounded-xl bg-slate-800 hover:bg-brand-600 text-slate-300 hover:text-white border border-slate-700 transition-all flex-shrink-0"
                 title="Kalibrasi Bobot & Edit Deskripsi">
                <span class="material-symbols-outlined text-[18px]">tune</span>
              </a>
            </div>

            <!-- Major Description -->
            <p class="text-xs text-slate-300 mt-2.5 line-clamp-2 leading-relaxed">
              {{ $m->description }}
            </p>

            <!-- 6-Dimension Vector Bars -->
            <div class="mt-4 pt-3 border-t border-slate-800/80">
              <div class="flex items-center justify-between mb-2">
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Vektor Bobot RIASEC</span>
                <span class="text-[10px] font-mono text-cyan-400 font-semibold">Skala 0-100</span>
              </div>
              
              <div class="grid grid-cols-6 gap-2 text-center text-[10px] font-mono">
                <!-- R -->
                <div class="p-1.5 rounded-lg bg-red-950/40 border border-red-500/20">
                  <span class="text-red-400 font-bold block">R</span>
                  <span class="text-slate-200 font-bold text-xs">{{ $m->weight_r }}</span>
                </div>
                <!-- I -->
                <div class="p-1.5 rounded-lg bg-blue-950/40 border border-blue-500/20">
                  <span class="text-blue-400 font-bold block">I</span>
                  <span class="text-slate-200 font-bold text-xs">{{ $m->weight_i }}</span>
                </div>
                <!-- A -->
                <div class="p-1.5 rounded-lg bg-purple-950/40 border border-purple-500/20">
                  <span class="text-purple-400 font-bold block">A</span>
                  <span class="text-slate-200 font-bold text-xs">{{ $m->weight_a }}</span>
                </div>
                <!-- S -->
                <div class="p-1.5 rounded-lg bg-emerald-950/40 border border-emerald-500/20">
                  <span class="text-emerald-400 font-bold block">S</span>
                  <span class="text-slate-200 font-bold text-xs">{{ $m->weight_s }}</span>
                </div>
                <!-- E -->
                <div class="p-1.5 rounded-lg bg-amber-950/40 border border-amber-500/20">
                  <span class="text-amber-400 font-bold block">E</span>
                  <span class="text-slate-200 font-bold text-xs">{{ $m->weight_e }}</span>
                </div>
                <!-- C -->
                <div class="p-1.5 rounded-lg bg-cyan-950/40 border border-cyan-500/20">
                  <span class="text-cyan-400 font-bold block">C</span>
                  <span class="text-slate-200 font-bold text-xs">{{ $m->weight_c }}</span>
                </div>
              </div>
            </div>

            <!-- Career Prospects Badge Pills -->
            @if($m->career_prospects)
              <div class="mt-3 flex items-center gap-1.5 overflow-x-auto scrollbar-none py-1">
                <span class="material-symbols-outlined text-slate-500 text-sm">work</span>
                <span class="text-[11px] text-slate-400 truncate">{{ $m->career_prospects }}</span>
              </div>
            @endif

          </div>

          <!-- Card Footer Action -->
          <div class="mt-4 pt-3 border-t border-slate-800/80 flex items-center justify-between">
            <span class="text-[10px] text-slate-500">ID Prodi: #{{ $m->id }}</span>
            <a href="{{ route('admin.majors.edit', $m->id) }}" 
               class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-brand-600 text-cyan-300 hover:text-white text-xs font-semibold transition-colors">
              <span>Edit Bobot & Karir</span>
              <span class="material-symbols-outlined text-[16px]">edit</span>
            </a>
          </div>

        </div>
      @empty
        <div class="col-span-2 py-12 text-center text-slate-400 bg-slate-950/40 rounded-2xl border border-slate-800">
          <span class="material-symbols-outlined text-5xl text-slate-600 mb-2">school</span>
          <p class="font-bold text-slate-300 text-sm">Tidak Ada Program Studi Ditemukan</p>
          <p class="text-xs text-slate-500 mt-1">Ganti kata kunci pencarian atau reset filter fakultas.</p>
        </div>
      @endforelse
    </div>

  </div>

</div>
@endsection

@push('scripts')
<script>
  function majorsManager() {
    return {}
  }
</script>
@endpush
