<header class="sticky top-0 z-50 bg-white/85 backdrop-blur-md border-b border-outline-variant/30 shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
  <div class="h-20 max-w-7xl mx-auto px-gutter flex items-center justify-between gap-space-md">
    <!-- Left Section: UBSI Badge + Divider + Logo -->
    <div class="flex items-center">
      <div class="flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-primary-fixed/40 border border-primary-fixed text-primary">
        <span class="material-symbols-outlined text-[18px]">school</span>
        <span class="font-bold text-xs tracking-wide">UBSI</span>
      </div>
      <div class="w-[1px] h-5 bg-outline-variant mx-3 hidden sm:block"></div>
      <a class="flex items-center gap-2" href="{{ route('home') }}">
        <img alt="MajorFit Logo" class="h-8 w-auto object-contain" src="{{ asset('images/logo.svg') }}">
      </a>
    </div>

    <!-- Center Navigation Links (5 exact items from Stitch) -->
    <nav class="hidden md:flex items-center gap-1.5" data-active-classes="bg-primary-fixed/40 text-primary font-semibold">
      <!-- 1. Beranda -->
      <a href="{{ route('home') }}" 
         class="px-3 py-1.5 rounded-lg text-sm transition-colors font-medium flex items-center gap-1.5 {{ request()->routeIs('home') ? 'bg-primary-fixed/40 text-primary font-semibold' : 'text-on-surface-variant hover:text-primary' }}"
         @if(request()->routeIs('home')) aria-current="page" @endif>
        @if(request()->routeIs('home'))
          <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
        @endif
        <span>Beranda</span>
      </a>

      <!-- 2. Tentang RIASEC -->
      <a href="{{ route('about-riasec') }}" 
         class="px-3 py-1.5 rounded-lg text-sm transition-colors font-medium flex items-center gap-1.5 {{ request()->routeIs('about-riasec') ? 'bg-primary-fixed/40 text-primary font-semibold' : 'text-on-surface-variant hover:text-primary' }}"
         @if(request()->routeIs('about-riasec')) aria-current="page" @endif>
        @if(request()->routeIs('about-riasec'))
          <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
        @endif
        <span>Tentang RIASEC</span>
      </a>

      <!-- 3. Fakultas UBSI -->
      <a href="{{ route('faculties') }}" 
         class="px-3 py-1.5 rounded-lg text-sm transition-colors font-medium flex items-center gap-1.5 {{ request()->routeIs('faculties') ? 'bg-primary-fixed/40 text-primary font-semibold' : 'text-on-surface-variant hover:text-primary' }}"
         @if(request()->routeIs('faculties')) aria-current="page" @endif>
        @if(request()->routeIs('faculties'))
          <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
        @endif
        <span>Fakultas UBSI</span>
      </a>

      <!-- 4. Cara Kerja -->
      <a href="{{ route('how-it-works') }}" 
         class="px-3 py-1.5 rounded-lg text-sm transition-colors font-medium flex items-center gap-1.5 {{ request()->routeIs('how-it-works') ? 'bg-primary-fixed/40 text-primary font-semibold' : 'text-on-surface-variant hover:text-primary' }}"
         @if(request()->routeIs('how-it-works')) aria-current="page" @endif>
        @if(request()->routeIs('how-it-works'))
          <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
        @endif
        <span>Cara Kerja</span>
      </a>

      <!-- 5. Hasil Rekomendasi (Accessible only after taking test, follows Stitch) -->
      <a href="{{ route('result') }}" 
         class="nav-hasil-rekomendasi px-3 py-1.5 rounded-lg text-sm transition-colors font-medium flex items-center gap-1.5 {{ request()->routeIs('result') ? 'bg-primary-fixed/40 text-primary font-semibold' : 'text-on-surface-variant hover:text-primary' }}"
         @if(request()->routeIs('result')) aria-current="page" @endif>
        @if(request()->routeIs('result'))
          <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
        @endif
        <span>Hasil Rekomendasi</span>
        <span class="lock-indicator text-[14px] text-outline opacity-70">
          <span class="material-symbols-outlined text-[14px]">lock</span>
        </span>
      </a>
    </nav>

    <!-- Right Section: Primary CTA + Mobile hamburger -->
    <div class="flex items-center gap-3">
      <a class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-primary text-on-primary font-medium text-sm shadow-sm hover:bg-primary-container transition-all transform hover:-translate-y-0.5" 
         href="{{ route('start-test') }}">
        <span class="material-symbols-outlined text-[18px]">assignment</span>
        <span>Mulai Tes RIASEC</span>
      </a>
      <button type="button" 
              onclick="toggleMobileMenu()"
              aria-label="Menu Navigasi" 
              class="md:hidden w-9 h-9 rounded-xl bg-surface-container flex items-center justify-center text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-colors">
        <span class="material-symbols-outlined text-[20px]">menu</span>
      </button>
    </div>
  </div>

  <!-- Mobile Dropdown Navigation -->
  <div id="mobile-menu" class="hidden md:hidden border-t border-outline-variant/20 bg-white/95 px-gutter py-3 space-y-1 shadow-lg">
    <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('home') ? 'bg-primary-fixed/40 text-primary font-semibold' : 'text-on-surface-variant hover:bg-surface-container-low' }}">
      Beranda
    </a>
    <a href="{{ route('about-riasec') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('about-riasec') ? 'bg-primary-fixed/40 text-primary font-semibold' : 'text-on-surface-variant hover:bg-surface-container-low' }}">
      Tentang RIASEC
    </a>
    <a href="{{ route('faculties') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('faculties') ? 'bg-primary-fixed/40 text-primary font-semibold' : 'text-on-surface-variant hover:bg-surface-container-low' }}">
      Fakultas UBSI
    </a>
    <a href="{{ route('how-it-works') }}" class="block px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('how-it-works') ? 'bg-primary-fixed/40 text-primary font-semibold' : 'text-on-surface-variant hover:bg-surface-container-low' }}">
      Cara Kerja
    </a>
    <a href="{{ route('result') }}" class="nav-hasil-rekomendasi flex items-center justify-between px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('result') ? 'bg-primary-fixed/40 text-primary font-semibold' : 'text-on-surface-variant hover:bg-surface-container-low' }}">
      <span>Hasil Rekomendasi</span>
      <span class="lock-indicator text-[14px] text-outline opacity-70">
        <span class="material-symbols-outlined text-[14px]">lock</span>
      </span>
    </a>
  </div>
</header>

<script>
  function toggleMobileMenu() {
    const m = document.getElementById('mobile-menu');
    if (m) {
      m.classList.toggle('hidden');
    }
  }

  // Update lock icon visibility when test is completed
  document.addEventListener('DOMContentLoaded', () => {
    if (typeof hasCompletedRIASECTest === 'function' && hasCompletedRIASECTest()) {
      document.querySelectorAll('.lock-indicator').forEach(el => el.classList.add('hidden'));
    }
  });
</script>
