<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'MajorFit UBSI - Platform Rekomendasi Program Studi Berbasis RIASEC')</title>

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
      main > :first-child {
        margin-top: 0 !important;
      }
      main > :last-child {
        margin-bottom: 0 !important;
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
<body class="bg-surface font-body-md text-on-surface antialiased selection:bg-primary-fixed selection:text-on-primary-fixed min-h-screen flex flex-col">
  <!-- Global Navbar -->
  @include('components.navbar')

  <!-- Main Content -->
  <main class="w-full flex-1 bg-surface">
    @yield('content')
  </main>

  <!-- Global Footer -->
  @include('components.footer')

  <!-- Global Client-side Scripts -->
  <script>
    // Global helper for checking test completion
    function hasCompletedRIASECTest() {
      return localStorage.getItem('majorfit_test_completed') === 'true' || 
             new URLSearchParams(window.location.search).get('completed') === 'true';
    }

    // Initialize navbar test state on page load
    document.addEventListener('DOMContentLoaded', () => {
      const isCompleted = hasCompletedRIASECTest();
      const resultNavLinks = document.querySelectorAll('.nav-hasil-rekomendasi');

      resultNavLinks.forEach(link => {
        if (!isCompleted) {
          link.setAttribute('data-locked', 'true');
          link.title = 'Selesaikan tes RIASEC terlebih dahulu untuk membuka Hasil Rekomendasi';
          link.addEventListener('click', (e) => {
            if (link.getAttribute('data-locked') === 'true') {
              e.preventDefault();
              showTestRequiredModal();
            }
          });
        } else {
          link.removeAttribute('data-locked');
          link.classList.remove('opacity-60', 'cursor-not-allowed');
        }
      });
    });

    function showTestRequiredModal() {
      const existingModal = document.getElementById('test-required-modal');
      if (existingModal) {
        existingModal.classList.remove('hidden');
        return;
      }

      const modalHtml = `
        <div id="test-required-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm transition-opacity">
          <div class="relative w-full max-w-md bg-surface-container-lowest rounded-2xl p-6 shadow-2xl border border-outline-variant/30 text-center space-y-4">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center">
              <span class="material-symbols-outlined text-[32px]">lock</span>
            </div>
            <div>
              <h3 class="font-headline-sm text-headline-sm font-bold text-on-surface">Hasil Rekomendasi Terkunci</h3>
              <p class="font-body-sm text-body-sm text-on-surface-variant mt-2 leading-relaxed">
                Anda belum menyelesaikan Tes Minat Holland RIASEC. Selesaikan tes kuesioner singkat (5–7 menit) agar sistem dapat menghitung dan memetakan program studi UBSI yang paling cocok untuk Anda.
              </p>
            </div>
            <div class="flex flex-col sm:flex-row items-center gap-2 pt-2">
              <a href="{{ route('start-test') }}" class="w-full inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md font-semibold transition-all">
                <span class="material-symbols-outlined text-[18px]">play_arrow</span>
                Mulai Tes Sekarang
              </a>
              <button onclick="document.getElementById('test-required-modal').classList.add('hidden')" type="button" class="w-full inline-flex items-center justify-center px-4 py-2.5 rounded-xl bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md font-medium transition-colors">
                Nanti Saja
              </button>
            </div>
          </div>
        </div>
      `;
      document.body.insertAdjacentHTML('beforeend', modalHtml);
    }
  </script>

  @stack('scripts')
</body>
</html>
