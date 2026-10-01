<footer class="w-full bg-surface-container-lowest shadow-[0_-1px_8px_rgba(0,0,0,0.02)] border-t border-outline-variant/30">
  <div class="max-w-7xl mx-auto px-gutter py-space-xl">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-space-xl mb-space-xl">
      <!-- Col 1 & 2: Brand Profile -->
      <div class="lg:col-span-2 flex flex-col gap-space-md">
        <div class="flex items-center gap-space-sm">
          <img alt="MajorFit Logo" class="h-8 w-auto object-contain" src="{{ asset('images/logo.svg') }}">
          <span class="text-xs px-2 py-0.5 rounded-md bg-primary-fixed font-bold text-primary">UBSI</span>
        </div>
        <p class="font-body-sm text-body-sm text-on-surface-variant max-w-sm">
          Sistem Rekomendasi Program Studi Universitas Bina Sarana Informatika Berbasis AI &amp; Analisis Minat RIASEC.
        </p>
        <div class="flex items-center gap-space-sm mt-space-xs">
          <a aria-label="Komunitas Belajar" class="w-9 h-9 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant hover:bg-primary hover:text-on-primary transition-colors" href="#">
            <span class="material-symbols-outlined text-[18px]">groups</span>
          </a>
          <a aria-label="Pusat Informasi" class="w-9 h-9 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant hover:bg-primary hover:text-on-primary transition-colors" href="#">
            <span class="material-symbols-outlined text-[18px]">forum</span>
          </a>
          <a aria-label="Bantuan Konsultasi" class="w-9 h-9 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant hover:bg-primary hover:text-on-primary transition-colors" href="#">
            <span class="material-symbols-outlined text-[18px]">headset_mic</span>
          </a>
          <a aria-label="Pembaruan Platform" class="w-9 h-9 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant hover:bg-primary hover:text-on-primary transition-colors" href="#">
            <span class="material-symbols-outlined text-[18px]">campaign</span>
          </a>
        </div>
      </div>

      <!-- Col 3: Navigasi Cepat -->
      <div class="flex flex-col gap-space-sm">
        <h3 class="font-label-lg text-label-lg text-on-surface font-semibold uppercase tracking-wider">Navigasi Cepat</h3>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="{{ route('home') }}">Beranda</a>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="{{ route('about-riasec') }}">Tentang RIASEC</a>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="{{ route('faculties') }}">Fakultas UBSI</a>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="{{ route('how-it-works') }}">Cara Kerja</a>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="{{ route('start-test') }}">Mulai Asesmen</a>
      </div>

      <!-- Col 4: Fakultas UBSI -->
      <div class="flex flex-col gap-space-sm">
        <h3 class="font-label-lg text-label-lg text-on-surface font-semibold uppercase tracking-wider">Fakultas UBSI</h3>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="{{ route('faculties') }}#fti">Teknik &amp; Informatika</a>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="{{ route('faculties') }}#fkb">Komunikasi &amp; Bahasa</a>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="{{ route('faculties') }}#feb">Ekonomi &amp; Bisnis</a>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="{{ route('faculties') }}#fh">Hukum</a>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="{{ route('faculties') }}#fik">Ilmu Kesehatan</a>
      </div>

      <!-- Col 5: Tautan Kampus UBSI -->
      <div class="flex flex-col gap-space-sm">
        <h3 class="font-label-lg text-label-lg text-on-surface font-semibold uppercase tracking-wider">Tautan Kampus UBSI</h3>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="https://pmbonline.bsi.ac.id" target="_blank" rel="noopener">Portal PMB UBSI</a>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="https://bsi.ac.id" target="_blank" rel="noopener">Website Resmi UBSI</a>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="{{ route('login') }}">Login Admin PMB</a>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="#">Layanan Karir (BCC UBSI)</a>
      </div>

      <!-- Col 6: Legalitas -->
      <div class="flex flex-col gap-space-sm">
        <h3 class="font-label-lg text-label-lg text-on-surface font-semibold uppercase tracking-wider">Legalitas</h3>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="#">Kebijakan Privasi</a>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="#">Syarat Ketentuan</a>
        <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="{{ route('how-it-works') }}#faq">Bantuan &amp; FAQ</a>
      </div>
    </div>

    <!-- Bottom Copyright -->
    <div class="pt-space-lg border-t border-outline-variant/30 flex flex-col sm:flex-row items-center justify-between gap-space-md font-body-sm text-body-sm text-on-surface-variant">
      <p>© 2026 MajorFit - Universitas Bina Sarana Informatika (UBSI). Hak Cipta Dilindungi.</p>
      <div class="flex items-center gap-space-md">
        <span class="flex items-center gap-space-xs text-tertiary font-label-md text-label-md">
          <span class="material-symbols-outlined text-[16px]">verified</span>
          Standar Psikometri RIASEC Teruji
        </span>
      </div>
    </div>
  </div>
</footer>
