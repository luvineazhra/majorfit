<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-900">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Admin Panel') - MajorFit UBSI</title>

  <!-- Google Fonts: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Material Symbols Outlined -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          },
          colors: {
            brand: {
              50: '#eef8ff',
              100: '#d8eeff',
              200: '#b9e2ff',
              300: '#89d1ff',
              400: '#52b6ff',
              500: '#2a96fa',
              600: '#006194',
              700: '#0e62aa',
              800: '#11528b',
              900: '#144673',
              950: '#0d2c4c',
            },
            riasec: {
              r: '#ef4444', // Realistic - Red
              i: '#3b82f6', // Investigative - Blue
              a: '#a855f7', // Artistic - Purple
              s: '#10b981', // Social - Green
              e: '#f59e0b', // Enterprising - Amber
              c: '#06b6d4', // Conventional - Cyan
            }
          }
        }
      }
    }
  </script>

  <!-- jQuery & DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Alpine.js -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      vertical-align: middle;
    }
    .material-symbols-filled {
      font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      vertical-align: middle;
    }
    /* Custom DataTables Styling for Tailwind Integration */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
      font-size: 0.875rem;
      color: #64748b;
      margin-bottom: 0.75rem;
      margin-top: 0.75rem;
    }
    .dataTables_wrapper .dataTables_filter input {
      border: 1px solid #cbd5e1;
      border-radius: 0.5rem;
      padding: 0.375rem 0.75rem;
      margin-left: 0.5rem;
      outline: none;
    }
    .dataTables_wrapper .dataTables_filter input:focus {
      border-color: #006194;
      box-shadow: 0 0 0 2px rgba(0, 97, 148, 0.2);
    }
    .dataTables_wrapper .dataTables_length select {
      border: 1px solid #cbd5e1;
      border-radius: 0.5rem;
      padding: 0.375rem 2rem 0.375rem 0.75rem;
      margin-left: 0.25rem;
      margin-right: 0.25rem;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      border-radius: 0.375rem !important;
      padding: 0.25rem 0.75rem !important;
      border: 1px solid transparent !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      background: #006194 !important;
      color: white !important;
      border-color: #006194 !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current) {
      background: #f1f5f9 !important;
      color: #0f172a !important;
    }
    table.dataTable.no-footer {
      border-bottom: 1px solid #e2e8f0;
    }
    /* Custom Scrollbars */
    ::-webkit-scrollbar {
      width: 6px;
      height: 6px;
    }
    ::-webkit-scrollbar-track {
      background: #0f172a;
    }
    ::-webkit-scrollbar-thumb {
      background: #334155;
      border-radius: 9999px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #475569;
    }
  </style>
  @stack('styles')
</head>
<body class="h-full bg-slate-900 text-slate-100 antialiased font-sans" x-data="{ sidebarOpen: false, profileDropdown: false }">

  <div class="min-h-screen flex">

    <!-- Mobile Sidebar Backdrop -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition-opacity ease-linear duration-200" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100" 
         x-transition:leave="transition-opacity ease-linear duration-200" 
         x-transition:leave-start="opacity-100" 
         x-transition:leave-end="opacity-0" 
         @click="sidebarOpen = false" 
         class="fixed inset-0 z-40 bg-slate-950/80 backdrop-blur-sm lg:hidden" 
         style="display: none;"></div>

    <!-- ========================================== -->
    <!-- Dark/Slate Sidebar Navigation              -->
    <!-- ========================================== -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
           class="fixed inset-y-0 left-0 z-50 w-72 bg-[#0B1120] border-r border-slate-800/80 flex flex-col transition-transform duration-300 ease-in-out lg:static lg:translate-x-0">
      
      <!-- Brand Logo & Portal Header -->
      <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800/80 bg-[#080d1a]">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
          <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-600 via-blue-500 to-cyan-400 p-0.5 shadow-lg shadow-brand-600/30 flex items-center justify-center">
            <div class="w-full h-full bg-slate-900 rounded-[10px] flex items-center justify-center">
              <span class="material-symbols-outlined text-cyan-400 text-2xl group-hover:scale-110 transition-transform">insights</span>
            </div>
          </div>
          <div>
            <div class="flex items-center gap-1.5">
              <span class="font-black text-lg text-white tracking-tight">Major<span class="text-cyan-400">Fit</span></span>
              <span class="px-1.5 py-0.5 rounded text-[10px] font-extrabold uppercase bg-brand-600/30 text-cyan-300 border border-brand-500/40">Admin</span>
            </div>
            <p class="text-[11px] font-medium text-slate-400 tracking-wide">Universitas Bina Sarana Informatika</p>
          </div>
        </a>
        <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white p-1">
          <span class="material-symbols-outlined text-2xl">close</span>
        </button>
      </div>

      <!-- System Quick Status Banner -->
      <div class="mx-4 mt-4 p-3 rounded-xl bg-slate-800/50 border border-slate-700/50 flex items-center justify-between">
        <div class="flex items-center gap-2.5">
          <span class="relative flex h-2.5 w-2.5">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
          </span>
          <div class="text-xs">
            <p class="font-semibold text-slate-200">PMB 2026/2027</p>
            <p class="text-[10px] text-slate-400">Sistem RIASEC Online</p>
          </div>
        </div>
        <span class="text-[10px] font-semibold text-cyan-400 bg-cyan-950/60 px-2 py-0.5 rounded border border-cyan-800/40">v2.4</span>
      </div>

      <!-- Main Navigation Menu -->
      <div class="flex-1 overflow-y-auto px-4 py-6 space-y-7">
        
        <!-- Section: Manajemen Utama -->
        <div>
          <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2.5">Menu Utama</p>
          <nav class="space-y-1.5">
            <!-- 1. Dashboard -->
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-brand-600/30 to-cyan-500/10 text-cyan-300 border border-cyan-500/30 shadow-sm shadow-cyan-500/10 font-semibold' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }}">
              <span class="material-symbols-outlined text-[22px] {{ request()->routeIs('admin.dashboard') ? 'text-cyan-400 material-symbols-filled' : 'text-slate-400' }}">dashboard</span>
              <span>Dashboard Analitik</span>
            </a>

            <!-- 2. Bank Soal RIASEC -->
            <a href="{{ route('admin.questions.index') }}" 
               class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all duration-200 {{ request()->routeIs('admin.questions.*') ? 'bg-gradient-to-r from-brand-600/30 to-cyan-500/10 text-cyan-300 border border-cyan-500/30 shadow-sm shadow-cyan-500/10 font-semibold' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }}">
              <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-[22px] {{ request()->routeIs('admin.questions.*') ? 'text-cyan-400 material-symbols-filled' : 'text-slate-400' }}">quiz</span>
                <span>Bank Soal RIASEC</span>
              </div>
              <span class="px-2 py-0.5 text-[11px] font-bold rounded-md bg-slate-800 text-slate-300 border border-slate-700">24</span>
            </a>

            <!-- 3. Katalog Prodi UBSI -->
            <a href="{{ route('admin.majors.index') }}" 
               class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all duration-200 {{ request()->routeIs('admin.majors.*') ? 'bg-gradient-to-r from-brand-600/30 to-cyan-500/10 text-cyan-300 border border-cyan-500/30 shadow-sm shadow-cyan-500/10 font-semibold' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }}">
              <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-[22px] {{ request()->routeIs('admin.majors.*') ? 'text-cyan-400 material-symbols-filled' : 'text-slate-400' }}">school</span>
                <span>Katalog Prodi UBSI</span>
              </div>
              <span class="px-2 py-0.5 text-[11px] font-bold rounded-md bg-slate-800 text-slate-300 border border-slate-700">21</span>
            </a>

            <!-- 4. Hasil Tes Maba -->
            <a href="{{ route('admin.results.index') }}" 
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium text-sm transition-all duration-200 {{ request()->routeIs('admin.results.*') ? 'bg-gradient-to-r from-brand-600/30 to-cyan-500/10 text-cyan-300 border border-cyan-500/30 shadow-sm shadow-cyan-500/10 font-semibold' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }}">
              <span class="material-symbols-outlined text-[22px] {{ request()->routeIs('admin.results.*') ? 'text-cyan-400 material-symbols-filled' : 'text-slate-400' }}">assignment_turned_in</span>
              <span>Hasil Asesmen Maba</span>
            </a>
          </nav>
        </div>

        <!-- Section: Dimensi RIASEC Quick Legend -->
        <div>
          <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2.5">6 Dimensi Holland</p>
          <div class="grid grid-cols-2 gap-1.5 px-1 text-[11px]">
            <a href="{{ route('admin.questions.index', ['dimension' => 'R']) }}" class="flex items-center gap-2 p-2 rounded-lg bg-slate-800/40 hover:bg-slate-800 border border-slate-700/40 text-slate-300 hover:text-white transition-colors">
              <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>
              <span class="truncate font-medium">Realistic (R)</span>
            </a>
            <a href="{{ route('admin.questions.index', ['dimension' => 'I']) }}" class="flex items-center gap-2 p-2 rounded-lg bg-slate-800/40 hover:bg-slate-800 border border-slate-700/40 text-slate-300 hover:text-white transition-colors">
              <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
              <span class="truncate font-medium">Investigative (I)</span>
            </a>
            <a href="{{ route('admin.questions.index', ['dimension' => 'A']) }}" class="flex items-center gap-2 p-2 rounded-lg bg-slate-800/40 hover:bg-slate-800 border border-slate-700/40 text-slate-300 hover:text-white transition-colors">
              <span class="w-2.5 h-2.5 rounded-full bg-purple-500"></span>
              <span class="truncate font-medium">Artistic (A)</span>
            </a>
            <a href="{{ route('admin.questions.index', ['dimension' => 'S']) }}" class="flex items-center gap-2 p-2 rounded-lg bg-slate-800/40 hover:bg-slate-800 border border-slate-700/40 text-slate-300 hover:text-white transition-colors">
              <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
              <span class="truncate font-medium">Social (S)</span>
            </a>
            <a href="{{ route('admin.questions.index', ['dimension' => 'E']) }}" class="flex items-center gap-2 p-2 rounded-lg bg-slate-800/40 hover:bg-slate-800 border border-slate-700/40 text-slate-300 hover:text-white transition-colors">
              <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
              <span class="truncate font-medium">Enterprising (E)</span>
            </a>
            <a href="{{ route('admin.questions.index', ['dimension' => 'C']) }}" class="flex items-center gap-2 p-2 rounded-lg bg-slate-800/40 hover:bg-slate-800 border border-slate-700/40 text-slate-300 hover:text-white transition-colors">
              <span class="w-2.5 h-2.5 rounded-full bg-cyan-500"></span>
              <span class="truncate font-medium">Conventional (C)</span>
            </a>
          </div>
        </div>

        <!-- Section: Pintasan & Portal Publik -->
        <div>
          <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2.5">Pintasan Publik</p>
          <nav class="space-y-1">
            <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-between px-3.5 py-2 rounded-xl text-xs font-medium text-slate-400 hover:text-white hover:bg-slate-800/50 transition-colors">
              <div class="flex items-center gap-2.5">
                <span class="material-symbols-outlined text-[18px]">public</span>
                <span>Portal Calon Maba</span>
              </div>
              <span class="material-symbols-outlined text-[14px] text-slate-500">open_in_new</span>
            </a>
            <a href="{{ route('assessment') }}" target="_blank" class="flex items-center justify-between px-3.5 py-2 rounded-xl text-xs font-medium text-slate-400 hover:text-white hover:bg-slate-800/50 transition-colors">
              <div class="flex items-center gap-2.5">
                <span class="material-symbols-outlined text-[18px]">psychology</span>
                <span>Coba Simulasi Tes</span>
              </div>
              <span class="material-symbols-outlined text-[14px] text-slate-500">open_in_new</span>
            </a>
          </nav>
        </div>

      </div>

      <!-- Sidebar Footer (Admin User Info & Fast Logout) -->
      <div class="p-4 border-t border-slate-800/80 bg-[#080d1a]">
        <div class="flex items-center justify-between">
          <div class="flex items-center gap-3 min-w-0">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-brand-600 to-cyan-500 flex items-center justify-center font-bold text-white text-sm shadow">
              {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
            </div>
            <div class="min-w-0">
              <p class="text-xs font-semibold text-white truncate">{{ auth()->user()->name ?? 'Administrator' }}</p>
              <p class="text-[11px] text-cyan-400 truncate font-mono">Super Admin PMB</p>
            </div>
          </div>
          <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" title="Keluar dari Admin Portal" class="p-2 rounded-lg text-slate-400 hover:text-red-400 hover:bg-red-500/10 transition-colors">
              <span class="material-symbols-outlined text-[20px]">logout</span>
            </button>
          </form>
        </div>
      </div>
    </aside>

    <!-- ========================================== -->
    <!-- Content Wrapper & Top Header               -->
    <!-- ========================================== -->
    <div class="flex-1 flex flex-col min-w-0 bg-slate-950">

      <!-- Top Header Navbar -->
      <header class="h-20 bg-slate-900/80 backdrop-blur-md border-b border-slate-800 sticky top-0 z-30 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        
        <!-- Left: Mobile Toggle & Page Title -->
        <div class="flex items-center gap-4">
          <button @click="sidebarOpen = true" class="lg:hidden p-2 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 focus:outline-none">
            <span class="material-symbols-outlined text-2xl">menu</span>
          </button>
          <div>
            <h1 class="text-lg sm:text-xl font-bold text-white tracking-tight flex items-center gap-2">
              @yield('header_title', 'Dashboard')
            </h1>
            <p class="text-xs text-slate-400 hidden sm:block">@yield('header_subtitle', 'Panel Kontrol & Manajemen Rekomendasi Minat Bakat PMB UBSI')</p>
          </div>
        </div>

        <!-- Right: Actions, Live Clock, & User Dropdown -->
        <div class="flex items-center gap-3 sm:gap-4">
          
          <!-- Live Date & Clock Widget -->
          <div class="hidden md:flex items-center gap-2 px-3 py-1.5 rounded-xl bg-slate-800/60 border border-slate-700/60 text-xs text-slate-300 font-medium font-mono">
            <span class="material-symbols-outlined text-cyan-400 text-[18px]">calendar_today</span>
            <span id="liveClock">{{ date('d M Y') }}</span>
          </div>

          <!-- Notification Bell -->
          <div class="relative">
            <button class="p-2 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition-colors relative">
              <span class="material-symbols-outlined text-xl">notifications</span>
              <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-cyan-400"></span>
            </button>
          </div>

          <!-- User Profile Dropdown Menu -->
          <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" @click.outside="open = false" class="flex items-center gap-2.5 p-1.5 rounded-xl hover:bg-slate-800 transition-colors text-left focus:outline-none">
              <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-brand-600 to-cyan-500 flex items-center justify-center font-bold text-white text-xs shadow-md">
                {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
              </div>
              <div class="hidden sm:block">
                <p class="text-xs font-semibold text-slate-200">{{ auth()->user()->name ?? 'Administrator' }}</p>
                <p class="text-[10px] text-slate-400">{{ auth()->user()->email ?? 'admin@bsi.ac.id' }}</p>
              </div>
              <span class="material-symbols-outlined text-slate-400 text-sm">expand_more</span>
            </button>

            <!-- Dropdown Menu Box -->
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-100" 
                 x-transition:enter-start="transform opacity-0 scale-95" 
                 x-transition:enter-end="transform opacity-100 scale-100" 
                 x-transition:leave="transition ease-in duration-75" 
                 x-transition:leave-start="transform opacity-100 scale-100" 
                 x-transition:leave-end="transform opacity-0 scale-95" 
                 class="absolute right-0 mt-2 w-56 rounded-2xl bg-slate-900 border border-slate-800 shadow-2xl py-2 z-50 divide-y divide-slate-800" 
                 style="display: none;">
              
              <div class="px-4 py-3">
                <p class="text-xs font-semibold text-white">{{ auth()->user()->name ?? 'Administrator' }}</p>
                <p class="text-[11px] text-slate-400 truncate">{{ auth()->user()->email ?? 'admin@bsi.ac.id' }}</p>
                <span class="mt-1.5 inline-block px-2 py-0.5 text-[10px] font-semibold rounded bg-cyan-950 text-cyan-300 border border-cyan-800/50">Admin PMB</span>
              </div>

              <div class="py-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 px-4 py-2 text-xs text-slate-300 hover:bg-slate-800 hover:text-white">
                  <span class="material-symbols-outlined text-[18px]">space_dashboard</span>
                  Dashboard Analitik
                </a>
                <a href="{{ route('admin.questions.index') }}" class="flex items-center gap-2.5 px-4 py-2 text-xs text-slate-300 hover:bg-slate-800 hover:text-white">
                  <span class="material-symbols-outlined text-[18px]">quiz</span>
                  Bank Soal RIASEC
                </a>
                <a href="{{ route('admin.majors.index') }}" class="flex items-center gap-2.5 px-4 py-2 text-xs text-slate-300 hover:bg-slate-800 hover:text-white">
                  <span class="material-symbols-outlined text-[18px]">school</span>
                  Katalog Prodi UBSI
                </a>
              </div>

              <div class="py-1">
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="w-full text-left flex items-center gap-2.5 px-4 py-2 text-xs text-red-400 hover:bg-red-500/10 hover:text-red-300">
                    <span class="material-symbols-outlined text-[18px]">logout</span>
                    Keluar Sesi (Logout)
                  </button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </header>

      <!-- Main Content Container -->
      <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto">
        
        <!-- Flash Alert Messages -->
        @if(session('success'))
          <div x-data="{ show: true }" x-show="show" class="mb-6 p-4 rounded-2xl bg-emerald-950/70 border border-emerald-500/40 text-emerald-200 flex items-center justify-between shadow-lg shadow-emerald-950/30">
            <div class="flex items-center gap-3">
              <div class="w-9 h-9 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-2xl">check_circle</span>
              </div>
              <div>
                <p class="text-sm font-semibold text-emerald-100">Operasi Berhasil</p>
                <p class="text-xs text-emerald-300 mt-0.5">{{ session('success') }}</p>
              </div>
            </div>
            <button @click="show = false" class="text-emerald-400 hover:text-emerald-100 p-1">
              <span class="material-symbols-outlined text-lg">close</span>
            </button>
          </div>
        @endif

        @if(session('error'))
          <div x-data="{ show: true }" x-show="show" class="mb-6 p-4 rounded-2xl bg-red-950/70 border border-red-500/40 text-red-200 flex items-center justify-between shadow-lg shadow-red-950/30">
            <div class="flex items-center gap-3">
              <div class="w-9 h-9 rounded-xl bg-red-500/20 text-red-400 flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-2xl">error</span>
              </div>
              <div>
                <p class="text-sm font-semibold text-red-100">Terjadi Kesalahan</p>
                <p class="text-xs text-red-300 mt-0.5">{{ session('error') }}</p>
              </div>
            </div>
            <button @click="show = false" class="text-red-400 hover:text-red-100 p-1">
              <span class="material-symbols-outlined text-lg">close</span>
            </button>
          </div>
        @endif

        @if(session('info'))
          <div x-data="{ show: true }" x-show="show" class="mb-6 p-4 rounded-2xl bg-blue-950/70 border border-blue-500/40 text-blue-200 flex items-center justify-between shadow-lg shadow-blue-950/30">
            <div class="flex items-center gap-3">
              <div class="w-9 h-9 rounded-xl bg-blue-500/20 text-blue-400 flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-2xl">info</span>
              </div>
              <div>
                <p class="text-sm font-semibold text-blue-100">Informasi</p>
                <p class="text-xs text-blue-300 mt-0.5">{{ session('info') }}</p>
              </div>
            </div>
            <button @click="show = false" class="text-blue-400 hover:text-blue-100 p-1">
              <span class="material-symbols-outlined text-lg">close</span>
            </button>
          </div>
        @endif

        @if($errors->any())
          <div x-data="{ show: true }" x-show="show" class="mb-6 p-4 rounded-2xl bg-amber-950/70 border border-amber-500/40 text-amber-200 shadow-lg shadow-amber-950/30">
            <div class="flex items-start justify-between">
              <div class="flex items-start gap-3">
                <div class="w-9 h-9 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center flex-shrink-0">
                  <span class="material-symbols-outlined text-2xl">warning</span>
                </div>
                <div>
                  <p class="text-sm font-semibold text-amber-100">Periksa Kembali Isian Form</p>
                  <ul class="list-disc list-inside text-xs text-amber-300 mt-1 space-y-0.5">
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <button @click="show = false" class="text-amber-400 hover:text-amber-100 p-1">
                <span class="material-symbols-outlined text-lg">close</span>
              </button>
            </div>
          </div>
        @endif

        <!-- Page Main Yield Content -->
        @yield('content')

      </main>

      <!-- Footer Info -->
      <footer class="mt-auto border-t border-slate-800/80 bg-slate-900/60 py-4 px-6 text-center text-xs text-slate-500">
        <p>&copy; {{ date('Y') }} MajorFit UBSI — Sistem Penentuan Minat Program Studi Universitas Bina Sarana Informatika.</p>
      </footer>

    </div>

  </div>

  <!-- Global Confirm Delete Helper -->
  <script>
    function confirmAction(title, text, confirmButtonText, formId) {
      Swal.fire({
        title: title || 'Apakah Anda yakin?',
        text: text || 'Tindakan ini tidak dapat dibatalkan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#006194',
        cancelButtonColor: '#475569',
        confirmButtonText: confirmButtonText || 'Ya, Lanjutkan',
        cancelButtonText: 'Batal',
        background: '#0f172a',
        color: '#f8fafc',
        customClass: {
          popup: 'rounded-2xl border border-slate-700 shadow-2xl',
        }
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById(formId).submit();
        }
      });
    }
  </script>

  @stack('scripts')
</body>
</html>
