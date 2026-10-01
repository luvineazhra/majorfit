@extends('layouts.app')

@section('title', 'Data Diri Calon Mahasiswa Baru - MajorFit UBSI')

@section('content')
<div class="py-space-lg md:py-space-xl bg-surface min-h-[calc(100vh-5rem)] flex items-center justify-center">
  <div class="max-w-2xl w-full mx-auto px-gutter-mobile sm:px-gutter">
    
    <!-- Header Title Card -->
    <div class="mb-6 text-center space-y-2">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-fixed/50 text-primary font-label-md text-label-md font-semibold mb-1 border border-primary-fixed">
        <span class="material-symbols-outlined text-[18px]">assignment_ind</span>
        <span>Langkah 1 dari 2 — Data Diri MABA</span>
      </div>
      <h1 class="font-headline-lg text-headline-lg-mobile md:text-headline-md text-on-surface font-extrabold tracking-tight">
        Form Data Diri
      </h1>
      <p class="font-body-md text-body-md text-on-surface-variant max-w-lg mx-auto">
        Lengkapi identitas calon mahasiswa baru di bawah ini sebelum memulai Tes Asesmen Minat Holland RIASEC UBSI.
      </p>
    </div>

    <!-- Main Card Container -->
    <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/30 p-6 sm:p-10 shadow-xl relative overflow-hidden">
      <!-- Background Ambient Accent -->
      <div class="absolute -right-20 -top-20 w-56 h-56 rounded-full bg-primary-fixed/20 blur-3xl pointer-events-none"></div>
      <div class="absolute -left-20 -bottom-20 w-56 h-56 rounded-full bg-secondary-fixed/20 blur-3xl pointer-events-none"></div>

      <!-- Flash Error Notification -->
      @if($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-error-container/60 border border-error/40 text-on-error-container space-y-1">
          <div class="flex items-center gap-2 font-semibold text-sm">
            <span class="material-symbols-outlined text-error text-[20px]">error</span>
            <span>Mohon periksa kembali form data diri Anda:</span>
          </div>
          <ul class="list-disc list-inside text-xs pl-6 space-y-0.5">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @if(session('info'))
        <div class="mb-6 p-4 rounded-xl bg-blue-500/10 border border-blue-500/30 text-blue-900 flex items-center gap-2.5 text-xs font-medium">
          <span class="material-symbols-outlined text-blue-600 text-[20px]">info</span>
          <span>{{ session('info') }}</span>
        </div>
      @endif

      <!-- Candidate Identity Form -->
      <form action="{{ route('start-test.submit') }}" method="POST" class="space-y-5 relative z-10" autocomplete="off">
        @csrf

        <!-- 1. Nama Lengkap -->
        <div>
          <label for="nama_maba" class="block font-label-md text-label-md text-on-surface font-semibold mb-1.5">
            Nama Lengkap <span class="text-error">*</span>
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-outline">
              <span class="material-symbols-outlined text-[20px]">person</span>
            </span>
            <input type="text" 
                   id="nama_maba" 
                   name="nama_maba" 
                   value="{{ old('nama_maba') }}" 
                   required 
                   autocomplete="off"
                   placeholder="Masukkan nama lengkap sesuai ijazah/KTP" 
                   class="w-full bg-surface-container-low border @error('nama_maba') border-error @else border-outline-variant/40 @enderror rounded-xl pl-11 pr-4 py-3 text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
          </div>
          @error('nama_maba')
            <p class="text-xs text-error font-medium mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- 2. Email -->
        <div>
          <label for="email_maba" class="block font-label-md text-label-md text-on-surface font-semibold mb-1.5">
            Email <span class="text-error">*</span>
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-outline">
              <span class="material-symbols-outlined text-[20px]">mail</span>
            </span>
            <input type="email" 
                   id="email_maba" 
                   name="email_maba" 
                   value="{{ old('email_maba') }}" 
                   required 
                   autocomplete="off"
                   placeholder="contoh: maba@gmail.com" 
                   class="w-full bg-surface-container-low border @error('email_maba') border-error @else border-outline-variant/40 @enderror rounded-xl pl-11 pr-4 py-3 text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
          </div>
          @error('email_maba')
            <p class="text-xs text-error font-medium mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- 3. Dual Column: No. HP/WhatsApp & Tahun Lulus -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <!-- No WhatsApp -->
          <div>
            <label for="no_wa" class="block font-label-md text-label-md text-on-surface font-semibold mb-1.5">
              Nomor WhatsApp / No. HP <span class="text-error">*</span>
            </label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-outline">
                <span class="material-symbols-outlined text-[20px]">call</span>
              </span>
              <input type="text" 
                     id="no_wa" 
                     name="no_wa" 
                     value="{{ old('no_wa') }}" 
                     required 
                     autocomplete="off"
                     placeholder="081234567890" 
                     class="w-full bg-surface-container-low border @error('no_wa') border-error @else border-outline-variant/40 @enderror rounded-xl pl-11 pr-4 py-3 text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
            </div>
            @error('no_wa')
              <p class="text-xs text-error font-medium mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Tahun Lulus -->
          <div>
            <label for="tahun_lulus" class="block font-label-md text-label-md text-on-surface font-semibold mb-1.5">
              Tahun Lulus <span class="text-error">*</span>
            </label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-outline">
                <span class="material-symbols-outlined text-[20px]">calendar_today</span>
              </span>
              <select id="tahun_lulus" 
                      name="tahun_lulus" 
                      required 
                      class="w-full bg-surface-container-low border @error('tahun_lulus') border-error @else border-outline-variant/40 @enderror rounded-xl pl-11 pr-4 py-3 text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all appearance-none cursor-pointer">
                <option value="" disabled {{ old('tahun_lulus') == '' ? 'selected' : '' }}>Pilih Tahun Lulus</option>
                @php
                  $currentYear = date('Y');
                  $selectedTahun = old('tahun_lulus');
                @endphp
                @for($y = $currentYear + 1; $y >= $currentYear - 10; $y--)
                  <option value="{{ $y }}" {{ $selectedTahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endfor
              </select>
              <span class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-outline">
                <span class="material-symbols-outlined text-[20px]">expand_more</span>
              </span>
            </div>
            @error('tahun_lulus')
              <p class="text-xs text-error font-medium mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <!-- 4. Asal Sekolah -->
        <div>
          <label for="asal_sekolah" class="block font-label-md text-label-md text-on-surface font-semibold mb-1.5">
            Asal Sekolah <span class="text-error">*</span>
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-outline">
              <span class="material-symbols-outlined text-[20px]">school</span>
            </span>
            <input type="text" 
                   id="asal_sekolah" 
                   name="asal_sekolah" 
                   value="{{ old('asal_sekolah') }}" 
                   required 
                   autocomplete="off"
                   placeholder="Contoh: SMAN 1 Jakarta / SMKN 2 Bandung" 
                   class="w-full bg-surface-container-low border @error('asal_sekolah') border-error @else border-outline-variant/40 @enderror rounded-xl pl-11 pr-4 py-3 text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
          </div>
          @error('asal_sekolah')
            <p class="text-xs text-error font-medium mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Privacy & System Info Note -->
        <div class="p-3.5 rounded-xl bg-surface-container-low border border-outline-variant/20 flex items-start gap-2.5 text-xs text-on-surface-variant">
          <span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">verified_user</span>
          <span>Data diri Anda akan disimpan dengan aman dan digunakan khusus untuk menghubungkan profil hasil asesmen RIASEC dengan rekomendasi program studi UBSI.</span>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
          <button type="submit" class="w-full py-4 rounded-xl bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg font-bold shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-2 transform active:scale-[0.99]">
            <span>Lanjutkan ke Asesmen</span>
            <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
          </button>
        </div>
      </form>
    </div>

  </div>
</div>
@endsection
