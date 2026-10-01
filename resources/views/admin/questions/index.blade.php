@extends('layouts.admin')

@section('title', 'Bank Soal RIASEC')
@section('header_title', 'Bank Soal RIASEC')
@section('header_subtitle', 'Kelola butir instrumen tes minat Holland 6 dimensi (Realistic, Investigative, Artistic, Social, Enterprising, Conventional)')

@section('content')
<div class="space-y-6" x-data="questionsManager()">

  <!-- ========================================== -->
  <!-- 1. Stats Bar & Quick Summary Cards         -->
  <!-- ========================================== -->
  <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-3">
    <!-- Total Soal -->
    <div class="col-span-2 p-4 rounded-2xl bg-slate-900 border border-slate-800 shadow-md">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Total Soal</p>
          <p class="text-2xl font-black text-white mt-0.5">{{ $totalAll }}</p>
        </div>
        <div class="w-10 h-10 rounded-xl bg-brand-600/20 text-cyan-400 border border-brand-500/30 flex items-center justify-center">
          <span class="material-symbols-outlined">quiz</span>
        </div>
      </div>
      <p class="text-[11px] text-emerald-400 mt-2 font-medium flex items-center gap-1">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> {{ $totalActive }} Soal Aktif
      </p>
    </div>

    <!-- Dimension Pill Counts (R, I, A, S, E, C) -->
    @php
      $dimConfig = [
        'R' => ['name' => 'Realistic', 'color' => 'red', 'bg' => 'bg-red-500/15', 'text' => 'text-red-400', 'border' => 'border-red-500/30'],
        'I' => ['name' => 'Investigative', 'color' => 'blue', 'bg' => 'bg-blue-500/15', 'text' => 'text-blue-400', 'border' => 'border-blue-500/30'],
        'A' => ['name' => 'Artistic', 'color' => 'purple', 'bg' => 'bg-purple-500/15', 'text' => 'text-purple-400', 'border' => 'border-purple-500/30'],
        'S' => ['name' => 'Social', 'color' => 'emerald', 'bg' => 'bg-emerald-500/15', 'text' => 'text-emerald-400', 'border' => 'border-emerald-500/30'],
        'E' => ['name' => 'Enterprising', 'color' => 'amber', 'bg' => 'bg-amber-500/15', 'text' => 'text-amber-400', 'border' => 'border-amber-500/30'],
        'C' => ['name' => 'Conventional', 'color' => 'cyan', 'bg' => 'bg-cyan-500/15', 'text' => 'text-cyan-400', 'border' => 'border-cyan-500/30'],
      ];
    @endphp

    @foreach($dimConfig as $code => $cfg)
      <a href="{{ route('admin.questions.index', array_merge(request()->query(), ['dimension' => $dimension === $code ? null : $code])) }}"
         class="p-3 rounded-2xl border transition-all hover:scale-105 {{ $dimension === $code ? 'bg-slate-800 ' . $cfg['border'] . ' ring-2 ring-cyan-500/30 shadow-lg' : 'bg-slate-900/80 border-slate-800 hover:border-slate-700' }}">
        <div class="flex items-center justify-between">
          <span class="text-xs font-bold font-mono px-1.5 py-0.5 rounded {{ $cfg['bg'] }} {{ $cfg['text'] }}">{{ $code }}</span>
          <span class="text-xs text-slate-400 font-medium">{{ $dimensionCounts[$code] ?? 0 }}</span>
        </div>
        <p class="text-[11px] font-semibold text-slate-200 mt-2 truncate">{{ $cfg['name'] }}</p>
      </a>
    @endforeach
  </div>

  <!-- ========================================== -->
  <!-- 2. Main Content Card with Actions & Table  -->
  <!-- ========================================== -->
  <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl">
    
    <!-- Top Filter Toolbar -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 pb-6 border-b border-slate-800">
      
      <!-- Left: Dimension Tabs -->
      <div class="flex items-center gap-1.5 overflow-x-auto pb-2 lg:pb-0 scrollbar-none">
        <a href="{{ route('admin.questions.index') }}" 
           class="px-3.5 py-2 rounded-xl text-xs font-semibold transition-all whitespace-nowrap {{ !$dimension ? 'bg-brand-600 text-white shadow-md shadow-brand-600/30' : 'bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white' }}">
          Semua Dimensi
        </a>
        @foreach(['R' => 'Realistic', 'I' => 'Investigative', 'A' => 'Artistic', 'S' => 'Social', 'E' => 'Enterprising', 'C' => 'Conventional'] as $code => $label)
          <a href="{{ route('admin.questions.index', ['dimension' => $code]) }}" 
             class="px-3.5 py-2 rounded-xl text-xs font-semibold transition-all whitespace-nowrap flex items-center gap-1.5 {{ $dimension === $code ? 'bg-brand-600 text-white shadow-md shadow-brand-600/30' : 'bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white' }}">
            <span class="w-2 h-2 rounded-full font-mono text-[10px]" style="background-color: {{ ['R'=>'#ef4444','I'=>'#3b82f6','A'=>'#a855f7','S'=>'#10b981','E'=>'#f59e0b','C'=>'#06b6d4'][$code] }};"></span>
            <span>{{ $code }} - {{ $label }}</span>
          </a>
        @endforeach
      </div>

      <!-- Right: Search Form & Add Button -->
      <div class="flex items-center gap-3">
        <!-- Search Input -->
        <form method="GET" action="{{ route('admin.questions.index') }}" class="flex items-center gap-2 flex-1 lg:w-64">
          @if($dimension)
            <input type="hidden" name="dimension" value="{{ $dimension }}">
          @endif
          <div class="relative w-full">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-500 text-lg">search</span>
            <input type="text" 
                   name="search" 
                   value="{{ $search }}" 
                   placeholder="Cari butir pertanyaan..." 
                   class="w-full bg-slate-800/80 border border-slate-700 rounded-xl pl-9 pr-4 py-2 text-xs text-white placeholder-slate-400 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
          </div>
        </form>

        <!-- Button Tambah Soal -->
        <button @click="openCreateModal()" 
                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gradient-to-r from-brand-600 to-cyan-500 hover:from-brand-500 hover:to-cyan-400 text-white text-xs font-bold shadow-lg shadow-brand-600/25 transition-all flex-shrink-0">
          <span class="material-symbols-outlined text-lg">add_circle</span>
          <span>Tambah Soal</span>
        </button>
      </div>

    </div>

    <!-- Data Table -->
    <div class="overflow-x-auto mt-6">
      <table id="questionsTable" class="w-full text-left border-collapse text-xs">
        <thead>
          <tr class="border-b border-slate-800 text-slate-400 uppercase tracking-wider font-semibold">
            <th class="py-3.5 px-4 w-12 text-center">ID</th>
            <th class="py-3.5 px-4 w-28 text-center">Dimensi</th>
            <th class="py-3.5 px-4">Butir Pertanyaan Instrumen RIASEC</th>
            <th class="py-3.5 px-4 w-28 text-center">Status</th>
            <th class="py-3.5 px-4 w-36 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-800/60">
          @forelse($questions as $q)
            <tr class="hover:bg-slate-800/40 transition-colors">
              <!-- ID -->
              <td class="py-4 px-4 text-center font-mono font-semibold text-slate-400">
                #{{ $q->id }}
              </td>

              <!-- Dimensi Badge -->
              <td class="py-4 px-4 text-center">
                @php
                  $badgeColors = [
                    'R' => 'bg-red-950/80 text-red-300 border-red-500/40',
                    'I' => 'bg-blue-950/80 text-blue-300 border-blue-500/40',
                    'A' => 'bg-purple-950/80 text-purple-300 border-purple-500/40',
                    'S' => 'bg-emerald-950/80 text-emerald-300 border-emerald-500/40',
                    'E' => 'bg-amber-950/80 text-amber-300 border-amber-500/40',
                    'C' => 'bg-cyan-950/80 text-cyan-300 border-cyan-500/40',
                  ];
                @endphp
                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-lg text-xs font-bold font-mono border {{ $badgeColors[$q->dimension] ?? 'bg-slate-800 text-white' }}">
                  <span>{{ $q->dimension }}</span>
                </span>
              </td>

              <!-- Question Text -->
              <td class="py-4 px-4">
                <p class="text-slate-100 font-medium text-sm leading-relaxed">{{ $q->question_text }}</p>
                <p class="text-[11px] text-slate-500 mt-0.5">Skala Likert (1 - 5) • Minat Bakat PMB UBSI</p>
              </td>

              <!-- Active Status Toggle Form -->
              <td class="py-4 px-4 text-center">
                <form action="{{ route('admin.questions.toggle-status', $q->id) }}" method="POST" class="inline-block">
                  @csrf
                  @method('PATCH')
                  <button type="submit" 
                          title="Klik untuk mengubah status"
                          class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-semibold border transition-all hover:scale-105 {{ $q->is_active ? 'bg-emerald-950/60 text-emerald-300 border-emerald-500/40 hover:bg-emerald-900' : 'bg-slate-800 text-slate-400 border-slate-700 hover:bg-slate-700 hover:text-slate-200' }}">
                    <span class="w-2 h-2 rounded-full {{ $q->is_active ? 'bg-emerald-400 animate-pulse' : 'bg-slate-500' }}"></span>
                    <span>{{ $q->is_active ? 'Aktif' : 'Non-Aktif' }}</span>
                  </button>
                </form>
              </td>

              <!-- Action Buttons (Edit & Delete) -->
              <td class="py-4 px-4 text-center">
                <div class="flex items-center justify-center gap-2">
                  <!-- Edit Modal Trigger -->
                  <button @click="openEditModal({{ json_encode($q) }})" 
                          class="p-2 rounded-lg bg-slate-800 hover:bg-brand-600/30 text-slate-300 hover:text-cyan-300 border border-slate-700 hover:border-cyan-500/40 transition-colors" 
                          title="Edit Pertanyaan">
                    <span class="material-symbols-outlined text-[18px]">edit</span>
                  </button>

                  <!-- Delete Button -->
                  <form id="delete-q-form-{{ $q->id }}" action="{{ route('admin.questions.destroy', $q->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" 
                            onclick="confirmAction('Hapus Soal #{{ $q->id }}?', 'Butir pertanyaan ini akan dihapus permanen dari Bank Soal RIASEC.', 'Ya, Hapus', 'delete-q-form-{{ $q->id }}')" 
                            class="p-2 rounded-lg bg-slate-800 hover:bg-red-500/20 text-slate-300 hover:text-red-400 border border-slate-700 hover:border-red-500/40 transition-colors" 
                            title="Hapus Pertanyaan">
                      <span class="material-symbols-outlined text-[18px]">delete</span>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="py-12 text-center text-slate-400">
                <div class="flex flex-col items-center justify-center">
                  <span class="material-symbols-outlined text-5xl text-slate-600 mb-2">quiz</span>
                  <p class="font-bold text-slate-300 text-sm">Tidak Ada Pertanyaan Ditemukan</p>
                  <p class="text-xs text-slate-500 mt-1">Coba sesuaikan filter dimensi atau kata kunci pencarian Anda.</p>
                </div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>

  <!-- ========================================== -->
  <!-- 3. Modal: Tambah Soal RIASEC Baru          -->
  <!-- ========================================== -->
  <div x-show="createModalOpen" 
       x-transition:enter="transition ease-out duration-200"
       x-transition:enter-start="opacity-0 scale-95"
       x-transition:enter-end="opacity-100 scale-100"
       x-transition:leave="transition ease-in duration-150"
       x-transition:leave-start="opacity-100 scale-100"
       x-transition:leave-end="opacity-0 scale-95"
       class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm"
       style="display: none;">

    <div @click.outside="createModalOpen = false" class="bg-slate-900 border border-slate-800 rounded-3xl max-w-xl w-full p-6 shadow-2xl space-y-6">
      
      <!-- Modal Header -->
      <div class="flex items-center justify-between pb-4 border-b border-slate-800">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl bg-brand-600/20 text-cyan-400 border border-brand-500/30 flex items-center justify-center">
            <span class="material-symbols-outlined text-xl">post_add</span>
          </div>
          <div>
            <h3 class="text-base font-bold text-white">Tambah Soal RIASEC Baru</h3>
            <p class="text-xs text-slate-400">Masukkan teks pertanyaan instrumen asesmen minat</p>
          </div>
        </div>
        <button @click="createModalOpen = false" class="text-slate-400 hover:text-white p-1">
          <span class="material-symbols-outlined text-xl">close</span>
        </button>
      </div>

      <!-- Form Body -->
      <form action="{{ route('admin.questions.store') }}" method="POST" class="space-y-5">
        @csrf
        
        <!-- Select Dimensi -->
        <div>
          <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Dimensi RIASEC <span class="text-red-400">*</span></label>
          <select name="dimension" required class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
            <option value="">-- Pilih Dimensi Holland --</option>
            <option value="R">R - Realistic (Praktis, Fisik, Teknik, Mesin)</option>
            <option value="I">I - Investigative (Analitis, Riset, Logika, Sains)</option>
            <option value="A">A - Artistic (Kreatif, Desain, Seni, Imajinasi)</option>
            <option value="S">S - Social (Sosial, Komunikasi, Pelayanan, Edukasi)</option>
            <option value="E">E - Enterprising (Kepemimpinan, Bisnis, Persuasi)</option>
            <option value="C">C - Conventional (Terstruktur, Data, Manajerial, Rapi)</option>
          </select>
        </div>

        <!-- Teks Pertanyaan -->
        <div>
          <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Butir Pertanyaan <span class="text-red-400">*</span></label>
          <textarea name="question_text" rows="4" required placeholder="Contoh: Saya menyukai kegiatan merakit perangkat keras komputer dan jaringan IT..." class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 leading-relaxed"></textarea>
          <p class="text-[11px] text-slate-500 mt-1">Gunakan kalimat pernyataan yang netral dan mudah dipahami oleh calon mahasiswa baru.</p>
        </div>

        <!-- Toggle Active Status -->
        <div class="flex items-center gap-3 p-3 rounded-xl bg-slate-800/60 border border-slate-700/60">
          <input type="checkbox" name="is_active" id="create_is_active" value="1" checked class="w-4 h-4 rounded text-brand-600 bg-slate-900 border-slate-700 focus:ring-brand-500">
          <label for="create_is_active" class="text-xs text-slate-200 font-medium cursor-pointer">
            Langsung Aktifkan Pertanyaan dalam Asesmen Maba
          </label>
        </div>

        <!-- Form Buttons -->
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-800">
          <button type="button" @click="createModalOpen = false" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition-colors">
            Batal
          </button>
          <button type="submit" class="px-5 py-2 rounded-xl bg-gradient-to-r from-brand-600 to-cyan-500 hover:from-brand-500 hover:to-cyan-400 text-white text-xs font-bold shadow-lg shadow-brand-600/30 transition-all">
            Simpan Pertanyaan
          </button>
        </div>

      </form>

    </div>
  </div>

  <!-- ========================================== -->
  <!-- 4. Modal: Edit Soal RIASEC                 -->
  <!-- ========================================== -->
  <div x-show="editModalOpen" 
       x-transition:enter="transition ease-out duration-200"
       x-transition:enter-start="opacity-0 scale-95"
       x-transition:enter-end="opacity-100 scale-100"
       x-transition:leave="transition ease-in duration-150"
       x-transition:leave-start="opacity-100 scale-100"
       x-transition:leave-end="opacity-0 scale-95"
       class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm"
       style="display: none;">

    <div @click.outside="editModalOpen = false" class="bg-slate-900 border border-slate-800 rounded-3xl max-w-xl w-full p-6 shadow-2xl space-y-6">
      
      <!-- Modal Header -->
      <div class="flex items-center justify-between pb-4 border-b border-slate-800">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl bg-cyan-600/20 text-cyan-400 border border-cyan-500/30 flex items-center justify-center">
            <span class="material-symbols-outlined text-xl">edit_note</span>
          </div>
          <div>
            <h3 class="text-base font-bold text-white">Edit Pertanyaan #<span x-text="editForm.id"></span></h3>
            <p class="text-xs text-slate-400">Perbarui dimensi atau butir pernyataan instrumen</p>
          </div>
        </div>
        <button @click="editModalOpen = false" class="text-slate-400 hover:text-white p-1">
          <span class="material-symbols-outlined text-xl">close</span>
        </button>
      </div>

      <!-- Form Body -->
      <form :action="'{{ url('/admin/questions') }}/' + editForm.id" method="POST" class="space-y-5">
        @csrf
        @method('PUT')
        
        <!-- Select Dimensi -->
        <div>
          <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Dimensi RIASEC <span class="text-red-400">*</span></label>
          <select name="dimension" x-model="editForm.dimension" required class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
            <option value="R">R - Realistic</option>
            <option value="I">I - Investigative</option>
            <option value="A">A - Artistic</option>
            <option value="S">S - Social</option>
            <option value="E">E - Enterprising</option>
            <option value="C">C - Conventional</option>
          </select>
        </div>

        <!-- Teks Pertanyaan -->
        <div>
          <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Butir Pertanyaan <span class="text-red-400">*</span></label>
          <textarea name="question_text" x-model="editForm.question_text" rows="4" required class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-3 text-xs text-white focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 leading-relaxed"></textarea>
        </div>

        <!-- Toggle Active Status -->
        <div class="flex items-center gap-3 p-3 rounded-xl bg-slate-800/60 border border-slate-700/60">
          <input type="checkbox" name="is_active" value="1" :checked="editForm.is_active" id="edit_is_active" class="w-4 h-4 rounded text-brand-600 bg-slate-900 border-slate-700 focus:ring-brand-500">
          <label for="edit_is_active" class="text-xs text-slate-200 font-medium cursor-pointer">
            Status Pertanyaan Aktif dalam Tes
          </label>
        </div>

        <!-- Form Buttons -->
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-800">
          <button type="button" @click="editModalOpen = false" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition-colors">
            Batal
          </button>
          <button type="submit" class="px-5 py-2 rounded-xl bg-gradient-to-r from-brand-600 to-cyan-500 hover:from-brand-500 hover:to-cyan-400 text-white text-xs font-bold shadow-lg shadow-brand-600/30 transition-all">
            Perbarui Pertanyaan
          </button>
        </div>

      </form>

    </div>
  </div>

</div>
@endsection

@push('scripts')
<script>
  function questionsManager() {
    return {
      createModalOpen: false,
      editModalOpen: false,
      editForm: {
        id: null,
        dimension: 'R',
        question_text: '',
        is_active: true
      },
      openCreateModal() {
        this.createModalOpen = true;
      },
      openEditModal(question) {
        this.editForm.id = question.id;
        this.editForm.dimension = question.dimension;
        this.editForm.question_text = question.question_text;
        this.editForm.is_active = Boolean(question.is_active);
        this.editModalOpen = true;
      }
    }
  }

  $(document).ready(function() {
    $('#questionsTable').DataTable({
      paging: true,
      searching: false, // Handled via server-side search input
      info: true,
      ordering: true,
      lengthMenu: [10, 25, 50, 100],
      language: {
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ butir soal",
        lengthMenu: "Tampilkan _MENU_ soal",
        paginate: {
          previous: "«",
          next: "»"
        }
      }
    });
  });
</script>
@endpush
