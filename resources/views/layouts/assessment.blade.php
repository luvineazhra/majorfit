<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'MajorFit UBSI - Assessment Portal Minat RIASEC')</title>

  <!-- Google Fonts: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Material Symbols Outlined -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

  <!-- Tailwind CSS CDN with Official Plugins -->
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

  <!-- Stitch Tailwind Config -->
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "on-secondary": "#ffffff",
            "on-surface": "#131b2e",
            "on-tertiary": "#ffffff",
            "inverse-primary": "#93ccff",
            "background": "#faf8ff",
            "surface-container-highest": "#dae2fd",
            "on-primary-fixed": "#001d31",
            "on-primary": "#ffffff",
            "inverse-on-surface": "#eef0ff",
            "on-error-container": "#93000a",
            "tertiary": "#006947",
            "on-tertiary-fixed": "#002113",
            "on-tertiary-fixed-variant": "#005236",
            "surface-variant": "#dae2fd",
            "on-primary-fixed-variant": "#004b73",
            "on-secondary-fixed-variant": "#004c69",
            "surface-bright": "#faf8ff",
            "surface-tint": "#006398",
            "inverse-surface": "#283044",
            "on-tertiary-container": "#f5fff6",
            "primary-container": "#007bb9",
            "surface-dim": "#d2d9f4",
            "surface-container-high": "#e2e7ff",
            "on-secondary-fixed": "#001e2c",
            "primary-fixed-dim": "#93ccff",
            "primary": "#006194",
            "surface": "#faf8ff",
            "secondary-fixed": "#c4e7ff",
            "outline": "#707881",
            "surface-container-low": "#f2f3ff",
            "on-primary-container": "#fdfcff",
            "on-surface-variant": "#3f4850",
            "outline-variant": "#bfc7d2",
            "tertiary-fixed": "#6ffbbe",
            "error-container": "#ffdad6",
            "surface-container-lowest": "#ffffff",
            "tertiary-container": "#00855b",
            "secondary-container": "#40c2fd",
            "secondary-fixed-dim": "#7bd0ff",
            "secondary": "#00668a",
            "surface-container": "#eaedff",
            "primary-fixed": "#cce5ff",
            "on-background": "#131b2e",
            "tertiary-fixed-dim": "#4edea3",
            "on-error": "#ffffff",
            "on-secondary-container": "#004d6a",
            "error": "#ba1a1a"
          },
          borderRadius: {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "2xl": "1rem",
            "3xl": "1.5rem",
            "full": "9999px"
          },
          spacing: {
            "space-md": "1rem",
            "space-xs": "0.25rem",
            "gutter": "1.5rem",
            "margin": "2rem",
            "margin-mobile": "1rem",
            "space-lg": "1.5rem",
            "space-xl": "2.5rem",
            "space-sm": "0.5rem",
            "gutter-mobile": "1rem"
          },
          fontFamily: {
            "body-md": ["Inter", "sans-serif"],
            "body-sm": ["Inter", "sans-serif"],
            "display-mobile": ["Inter", "sans-serif"],
            "headline-sm": ["Inter", "sans-serif"],
            "label-lg": ["Inter", "sans-serif"],
            "headline-lg-mobile": ["Inter", "sans-serif"],
            "display": ["Inter", "sans-serif"],
            "body-lg": ["Inter", "sans-serif"],
            "label-sm": ["Inter", "sans-serif"],
            "headline-lg": ["Inter", "sans-serif"],
            "headline-md": ["Inter", "sans-serif"],
            "label-md": ["Inter", "sans-serif"]
          },
          fontSize: {
            "body-md": ["16px", { lineHeight: "24px", letterSpacing: "0em", fontWeight: "400" }],
            "body-sm": ["14px", { lineHeight: "20px", letterSpacing: "0em", fontWeight: "400" }],
            "display-mobile": ["36px", { lineHeight: "44px", letterSpacing: "-0.02em", fontWeight: "800" }],
            "headline-sm": ["20px", { lineHeight: "28px", letterSpacing: "-0.005em", fontWeight: "600" }],
            "label-lg": ["14px", { lineHeight: "20px", letterSpacing: "0.01em", fontWeight: "600" }],
            "headline-lg-mobile": ["28px", { lineHeight: "36px", letterSpacing: "-0.015em", fontWeight: "700" }],
            "display": ["56px", { lineHeight: "64px", letterSpacing: "-0.03em", fontWeight: "800" }],
            "body-lg": ["18px", { lineHeight: "28px", letterSpacing: "0em", fontWeight: "400" }],
            "label-sm": ["11px", { lineHeight: "14px", letterSpacing: "0.03em", fontWeight: "500" }],
            "headline-lg": ["40px", { lineHeight: "48px", letterSpacing: "-0.02em", fontWeight: "700" }],
            "headline-md": ["28px", { lineHeight: "36px", letterSpacing: "-0.01em", fontWeight: "600" }],
            "label-md": ["12px", { lineHeight: "16px", letterSpacing: "0.02em", fontWeight: "600" }]
          }
        }
      }
    };
  </script>

  <style>
    @layer base {
      html, body {
        margin: 0;
        padding: 0;
        font-family: 'Inter', sans-serif;
      }
    }
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      vertical-align: middle;
    } 
    .material-symbols-filled {
      font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      vertical-align: middle;
    }
  </style>

  @stack('styles')
</head>
<body class="bg-background font-body-md text-body-md text-on-surface min-h-screen flex flex-col selection:bg-primary-fixed selection:text-on-primary-fixed">
  <!-- Assessment Focused Header -->
  <header class="fixed top-0 inset-x-0 z-50 bg-surface-container-lowest/90 backdrop-blur-md shadow-[0_1px_8px_rgba(0,0,0,0.04)] border-b border-outline-variant/30">
    <div class="h-16 max-w-7xl mx-auto px-gutter-mobile lg:px-gutter flex items-center justify-between gap-space-md">
      <!-- Logo + Brand -->
      <div class="flex items-center gap-space-md min-w-0">
        <a href="{{ route('home') }}" class="flex items-center gap-2">
          <img src="{{ asset('images/logo.svg') }}" alt="MajorFit Logo" class="h-8 w-auto object-contain shrink-0">
        </a>
        <div class="flex items-center gap-space-xs">
          <span class="px-space-xs py-0.5 rounded bg-surface-container-high text-primary font-label-sm text-label-sm uppercase tracking-wider font-semibold">UBSI</span>
        </div>
      </div>

      <!-- Center Status -->
      <div class="hidden md:flex items-center justify-center flex-1 max-w-xl mx-space-md">
        <div class="inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-full bg-surface-container-low text-on-surface-variant font-label-md text-label-md shadow-sm">
          <span class="w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
          <span class="font-semibold text-on-surface truncate">Tes Minat Holland RIASEC</span>
          <span class="text-outline-variant font-normal">•</span>
          <span class="text-on-surface-variant font-normal truncate">Jalur PMB UBSI</span>
        </div>
      </div>

      <!-- Right Actions -->
      <div class="flex items-center gap-space-sm shrink-0">
        <button onclick="if(typeof resetAssessment==='function'){resetAssessment();}else{localStorage.clear();location.reload();}" type="button" class="inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-all" title="Mulai ulang semua jawaban">
          <span class="material-symbols-outlined text-[18px]">restart_alt</span>
          <span class="hidden sm:inline">Ulangi Tes</span>
        </button>
        <a href="{{ route('home') }}" class="inline-flex items-center gap-space-xs px-space-md py-1.5 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-all">
          <span class="material-symbols-outlined text-[18px]">logout</span>
          <span class="hidden xs:inline">Keluar</span>
        </a>
        <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center shrink-0 text-on-primary">
          <span class="material-symbols-outlined text-[18px]">person</span>
        </div>
      </div>
    </div>

    <!-- Mobile Subheader -->
    <div class="md:hidden flex items-center justify-center py-1.5 px-space-md bg-surface-container-low/70 border-t border-outline-variant/20">
      <div class="inline-flex items-center gap-space-xs text-on-surface-variant font-label-sm text-label-sm truncate">
        <span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
        <span class="font-medium text-on-surface truncate">Tes Minat RIASEC</span>
        <span class="text-outline-variant">•</span>
        <span class="truncate">PMB UBSI</span>
      </div>
    </div>
  </header>

  <!-- Assessment Main Content -->
  <main class="flex-1 w-full pt-16 bg-background">
    @yield('content')
  </main>

  <!-- Assessment Minimal Footer -->
  <footer class="w-full bg-surface-container-lowest/60 backdrop-blur-sm py-space-sm shadow-[0_-1px_6px_rgba(0,0,0,0.02)] border-t border-outline-variant/30">
    <div class="max-w-7xl mx-auto px-gutter-mobile lg:px-gutter flex flex-col sm:flex-row items-center justify-between gap-space-xs text-center sm:text-left">
      <p class="font-label-sm text-label-sm text-on-surface-variant">© 2026 MajorFit • Universitas Bina Sarana Informatika (UBSI). Mode Asesmen Terintegrasi.</p>
      <div class="flex items-center gap-space-md text-on-surface-variant font-label-sm text-label-sm">
        <span class="inline-flex items-center gap-1">
          <span class="material-symbols-outlined text-[14px] text-tertiary">verified_user</span>
          Koneksi Aman
        </span>
        <span class="hidden md:inline text-outline-variant">•</span>
        <span class="hidden md:inline">Pusat Bantuan Ujian: 0800-1-UBSI</span>
      </div>
    </div>
  </footer>

  @stack('scripts')
</body>
</html>
