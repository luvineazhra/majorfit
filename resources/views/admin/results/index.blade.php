@extends('layouts.admin')

@section('title', 'Hasil Asesmen Maba')
@section('header_title', 'Hasil Asesmen Mahasiswa Baru')
@section('header_subtitle', 'Kelola data hasil tes minat RIASEC calon mahasiswa baru dan evaluasi rekomendasi jurusan UBSI')

@section('content')
<div class="space-y-6" x-data="resultsManager()">

  <!-- ========================================== -->
  <!-- 1. Key Metric Cards                        -->
  <!-- ========================================== -->
  <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
    
    <!-- Total Asesmen -->
    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 shadow-md flex items-center justify-between">
      <div>
        <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Total Asesmen Selesai</p>
        <h3 class="text-3xl font-black text-white mt-1">{{ number_format($totalResults) }}</h3>
        <p class="text-[11px] text-emerald-400 mt-1 font-medium">Terhitung seluruh submission Maba</p>
      </div>
      <div class="w-12 h-12 rounded-2xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-400 flex items-center justify-center">
        <span class="material-symbols-outlined text-2xl">assignment_turned_in</span>
      </div>
    </div>

    <!-- Maba Unik -->
    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 shadow-md flex items-center justify-between">
      <div>
        <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Mahasiswa Baru Unik</p>
        <h3 class="text-3xl font-black text-white mt-1">{{ number_format($uniqueUsersCount) }}</h3>
        <p class="text-[11px] text-cyan-400 mt-1 font-medium">Email Maba terdaftar di sistem</p>
      </div>
      <div class="w-12 h-12 rounded-2xl bg-cyan-500/15 border border-cyan-500/30 text-cyan-400 flex items-center justify-center">
        <span class="material-symbols-outlined text-2xl">person_check</span>
      </div>
    </div>

    <!-- Sistem Tanpa Login Maba -->
    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 shadow-md flex items-center justify-between">
      <div>
        <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Arsitektur Sesi Mandiri</p>
        <h3 class="text-lg font-bold text-white mt-1">Tanpa Login Maba</h3>
        <p class="text-[11px] text-slate-400 mt-1">Submission langsung tersimpan di DB & session ID</p>
      </div>
      <div class="w-12 h-12 rounded-2xl bg-amber-500/15 border border-amber-500/30 text-amber-400 flex items-center justify-center">
        <span class="material-symbols-outlined text-2xl">verified_user</span>
      </div>
    </div>

  </div>

  <!-- ========================================== -->
  <!-- 2. Main Data Table Card & Filters          -->
  <!-- ========================================== -->
  <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl space-y-6">
    
    <!-- Filter Toolbar -->
    <form method="GET" action="{{ route('admin.results.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-3 pb-6 border-b border-slate-800">
      
      <!-- Search Input (4 Cols) -->
      <div class="lg:col-span-4 relative">
        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-500 text-lg">search</span>
        <input type="text" 
               name="search" 
               value="{{ $search }}" 
               placeholder="Cari nama maba, email, WA, atau sekolah..." 
               class="w-full bg-slate-800/80 border border-slate-700 rounded-xl pl-9 pr-4 py-2.5 text-xs text-white placeholder-slate-400 focus:outline-none focus:border-brand-500">
      </div>

      <!-- Filter Top 1 Major (3 Cols) -->
      <div class="lg:col-span-3">
        <select name="major_id" onchange="this.form.submit()" class="w-full bg-slate-800/80 border border-slate-700 rounded-xl px-3 py-2.5 text-xs text-white focus:outline-none focus:border-brand-500">
          <option value="">Semua Top Match Prodi</option>
          @foreach($majors as $m)
            <option value="{{ $m->id }}" {{ $majorId == $m->id ? 'selected' : '' }}>
              {{ $m->major_name }} ({{ $m->degree }})
            </option>
          @endforeach
        </select>
      </div>

      <!-- Date Range (3 Cols) -->
      <div class="lg:col-span-3 flex items-center gap-2">
        <input type="date" name="date_from" value="{{ $dateFrom }}" class="w-full bg-slate-800/80 border border-slate-700 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-brand-500">
        <span class="text-slate-500 text-xs">-</span>
        <input type="date" name="date_to" value="{{ $dateTo }}" class="w-full bg-slate-800/80 border border-slate-700 rounded-xl px-3 py-2 text-xs text-white focus:outline-none focus:border-brand-500">
      </div>

      <!-- Submit & Reset Buttons (2 Cols) -->
      <div class="lg:col-span-2 flex items-center gap-2">
        <button type="submit" class="w-full py-2.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-bold text-xs transition-colors flex items-center justify-center gap-1">
          <span class="material-symbols-outlined text-sm">filter_alt</span>
          <span>Filter</span>
        </button>
        @if($search || $majorId || $dateFrom || $dateTo)
          <a href="{{ route('admin.results.index') }}" class="p-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white transition-colors" title="Reset Filter">
            <span class="material-symbols-outlined text-sm">restart_alt</span>
          </a>
        @endif
      </div>

    </form>

    <!-- Data Table -->
    <div class="overflow-x-auto">
      <table id="resultsTable" class="w-full text-left border-collapse text-xs">
        <thead>
          <tr class="border-b border-slate-800 text-slate-400 uppercase tracking-wider font-semibold">
            <th class="py-3.5 px-4">Calon Mahasiswa</th>
            <th class="py-3.5 px-4">Kontak &amp; Sekolah</th>
            <th class="py-3.5 px-4 text-center">Kode Holland</th>
            <th class="py-3.5 px-4">Rekomendasi Utama (Top 1)</th>
            <th class="py-3.5 px-4 text-center">Top 2 &amp; 3</th>
            <th class="py-3.5 px-4">Waktu Selesai</th>
            <th class="py-3.5 px-4 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-800/60">
          @forelse($results as $res)
            <tr class="hover:bg-slate-800/40 transition-colors">
              
              <!-- Student Name -->
              <td class="py-4 px-4">
                <div class="flex items-center gap-3">
                  <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-brand-600 to-cyan-500 text-white flex items-center justify-center font-bold text-sm shadow-md">
                    {{ substr($res->nama_maba ?: 'M', 0, 1) }}
                  </div>
                  <div>
                    <p class="font-bold text-white text-sm">{{ $res->nama_maba ?: 'Maba #' . $res->id }}</p>
                    <p class="text-[11px] text-slate-400 font-mono">ID: #{{ $res->id }}</p>
                  </div>
                </div>
              </td>

              <!-- Contact & School -->
              <td class="py-4 px-4">
                <p class="text-slate-200 font-medium">{{ $res->email_maba }}</p>
                <p class="text-[11px] text-slate-400 mt-0.5">
                  @if($res->no_wa) WA: {{ $res->no_wa }} @endif
                  @if($res->asal_sekolah) • {{ $res->asal_sekolah }} @endif
                </p>
              </td>

              <!-- Holland Code -->
              <td class="py-4 px-4 text-center">
                <span class="px-3 py-1 rounded-lg bg-brand-950/80 text-cyan-300 font-mono font-bold text-xs border border-cyan-500/40 shadow-sm">
                  {{ $res->getHollandCode(3) }}
                </span>
              </td>

              <!-- Top 1 Major -->
              <td class="py-4 px-4">
                @if($res->top1Major)
                  <div>
                    <span class="font-bold text-white text-sm block">{{ $res->top1Major->major_name }}</span>
                    <div class="flex items-center gap-2 mt-0.5">
                      <span class="px-1.5 py-0.2 rounded text-[10px] font-extrabold bg-cyan-950 text-cyan-300 border border-cyan-800/60">
                        {{ $res->top1Major->degree }}
                      </span>
                      <span class="text-[11px] text-slate-400">{{ $res->top1Major->faculty_name }}</span>
                    </div>
                  </div>
                @else
                  <span class="text-slate-500 italic">- Belum ditentukan -</span>
                @endif
              </td>

              <!-- Top 2 & 3 Majors -->
              <td class="py-4 px-4 text-center">
                <div class="space-y-1 text-[11px] text-slate-300">
                  <p><span class="text-slate-500 font-mono">#2:</span> {{ $res->top2Major->major_name ?? '-' }}</p>
                  <p><span class="text-slate-500 font-mono">#3:</span> {{ $res->top3Major->major_name ?? '-' }}</p>
                </div>
              </td>

              <!-- Date -->
              <td class="py-4 px-4 text-slate-400">
                <p class="font-medium text-slate-200">{{ $res->completed_at ? $res->completed_at->format('d M Y') : $res->created_at->format('d M Y') }}</p>
                <p class="text-[11px] text-slate-500 font-mono">{{ $res->completed_at ? $res->completed_at->format('H:i T') : $res->created_at->format('H:i T') }}</p>
              </td>

              <!-- Action Buttons -->
              <td class="py-4 px-4 text-center">
                <div class="flex items-center justify-center gap-2">
                  
                  <!-- Detail Button -->
                  <a href="{{ route('admin.results.show', $res->id) }}" 
                     class="p-2 rounded-xl bg-slate-800 hover:bg-cyan-950 text-slate-300 hover:text-cyan-300 border border-slate-700 hover:border-cyan-500/40 transition-colors"
                     title="Lihat Detail & Graf Hasil">
                    <span class="material-symbols-outlined text-[18px]">visibility</span>
                  </a>

                  <!-- Delete Result Record -->
                  <form id="delete-result-form-{{ $res->id }}" action="{{ route('admin.results.destroy', $res->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" 
                            onclick="confirmAction('Hapus Data Hasil #{{ $res->id }}?', 'Catatan hasil asesmen maba ini akan dihapus permanen dari database.', 'Ya, Hapus', 'delete-result-form-{{ $res->id }}')"
                            class="p-2 rounded-xl bg-slate-800 hover:bg-red-950 text-slate-300 hover:text-red-400 border border-slate-700 hover:border-red-500/40 transition-colors"
                            title="Hapus Record Hasil">
                      <span class="material-symbols-outlined text-[18px]">delete</span>
                    </button>
                  </form>

                </div>
              </td>

            </tr>
          @empty
            <tr>
              <td colspan="7" class="py-12 text-center text-slate-400">
                <div class="flex flex-col items-center justify-center">
                  <span class="material-symbols-outlined text-5xl text-slate-600 mb-2">assignment_late</span>
                  <p class="font-bold text-slate-300 text-sm">Tidak Ada Hasil Asesmen Ditemukan</p>
                  <p class="text-xs text-slate-500 mt-1">Ganti filter pencarian atau pastikan calon mahasiswa baru sudah melakukan submission tes.</p>
                </div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <!-- Pagination Links -->
    <div class="pt-4 border-t border-slate-800">
      {{ $results->links() }}
    </div>

  </div>

</div>
@endsection

@push('scripts')
<script>
  function resultsManager() {
    return {}
  }
</script>
@endpush
