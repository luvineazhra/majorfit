<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-950">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Masuk - MajorFit UBSI</title>

  <!-- Google Fonts: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Material Symbols Outlined -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
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
              500: '#007bb9',
              600: '#006194',
              700: '#0e62aa',
            }
          }
        }
      }
    }
  </script>
</head>
<body class="h-full flex items-center justify-center p-4 sm:p-6 bg-[#070b14] text-slate-100 font-sans relative overflow-hidden">

  <!-- Decorative Glow Background Effects -->
  <div class="absolute -top-40 -left-40 w-96 h-96 bg-blue-600/15 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-cyan-500/15 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-4xl h-96 bg-brand-600/5 rounded-full blur-[120px] pointer-events-none"></div>

  <div class="w-full max-w-md relative z-10">

    <!-- Brand Header -->
    <div class="text-center mb-8">
      <a href="{{ route('home') }}" class="inline-flex items-center gap-3 group mb-4">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-brand-600 via-blue-500 to-cyan-400 p-0.5 shadow-xl shadow-cyan-500/20 flex items-center justify-center">
          <div class="w-full h-full bg-slate-900 rounded-[14px] flex items-center justify-center">
            <span class="material-symbols-outlined text-cyan-400 text-3xl group-hover:scale-110 transition-transform">insights</span>
          </div>
        </div>
        <div class="text-left">
          <span class="text-2xl font-black text-white tracking-tight">Major<span class="text-cyan-400">Fit</span></span>
          <p class="text-[11px] font-semibold text-slate-400 tracking-wider uppercase">Universitas Bina Sarana Informatika</p>
        </div>
      </a>
      <h2 class="text-xl font-bold text-white tracking-tight">Selamat Datang di Portal PMB</h2>
      <p class="text-xs text-slate-400 mt-1">Masuk untuk mengelola sistem rekomendasi minat atau melihat profil</p>
    </div>

    <!-- Login Card -->
    <div class="bg-slate-900/90 backdrop-blur-xl border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-2xl shadow-slate-950/60">

      <!-- Alerts -->
      @if(session('error'))
        <div class="mb-5 p-3.5 rounded-xl bg-red-950/80 border border-red-500/50 text-red-200 text-xs flex items-center gap-2.5">
          <span class="material-symbols-outlined text-lg text-red-400">error</span>
          <span>{{ session('error') }}</span>
        </div>
      @endif

      @if(session('info'))
        <div class="mb-5 p-3.5 rounded-xl bg-blue-950/80 border border-blue-500/50 text-blue-200 text-xs flex items-center gap-2.5">
          <span class="material-symbols-outlined text-lg text-blue-400">info</span>
          <span>{{ session('info') }}</span>
        </div>
      @endif

      @if($errors->any())
        <div class="mb-5 p-3.5 rounded-xl bg-amber-950/80 border border-amber-500/50 text-amber-200 text-xs flex items-center gap-2.5">
          <span class="material-symbols-outlined text-lg text-amber-400">warning</span>
          <span>{{ $errors->first() }}</span>
        </div>
      @endif

      <!-- Login Form -->
      <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Email Field -->
        <div>
          <label for="email" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Alamat Email</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
              <span class="material-symbols-outlined text-[20px]">mail</span>
            </span>
            <input type="email" 
                   name="email" 
                   id="email" 
                   value="{{ old('email', 'admin@bsi.ac.id') }}" 
                   required 
                   placeholder="nama@bsi.ac.id" 
                   class="w-full pl-10 pr-4 py-3 bg-slate-800/80 border border-slate-700/80 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-colors">
          </div>
        </div>

        <!-- Password Field -->
        <div>
          <div class="flex items-center justify-between mb-2">
            <label for="password" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Kata Sandi</label>
          </div>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
              <span class="material-symbols-outlined text-[20px]">lock</span>
            </span>
            <input type="password" 
                   name="password" 
                   id="password" 
                   value="password123" 
                   required 
                   placeholder="••••••••" 
                   class="w-full pl-10 pr-4 py-3 bg-slate-800/80 border border-slate-700/80 rounded-xl text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-colors">
          </div>
        </div>

        <!-- Remember Me Checkbox -->
        <div class="flex items-center justify-between pt-1">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="remember" value="1" checked class="w-4 h-4 rounded bg-slate-800 border-slate-700 text-brand-600 focus:ring-cyan-400 focus:ring-offset-slate-900">
            <span class="text-xs text-slate-300">Ingat sesi saya</span>
          </label>
          <a href="{{ route('home') }}" class="text-xs text-cyan-400 hover:text-cyan-300 transition-colors">Kembali ke Beranda</a>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full mt-2 py-3 px-4 rounded-xl bg-gradient-to-r from-brand-600 via-blue-600 to-cyan-500 hover:from-brand-500 hover:to-cyan-400 text-white font-semibold text-sm shadow-lg shadow-cyan-500/20 hover:shadow-cyan-500/30 flex items-center justify-center gap-2 transition-all">
          <span>Masuk ke Akun</span>
          <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
        </button>
      </form>

      <!-- Quick Demo Credentials Fill -->
      <div class="mt-6 pt-5 border-t border-slate-800">
        <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider text-center mb-3">Akun Uji Coba Cepat (1-Klik)</p>
        <div class="grid grid-cols-2 gap-2.5">
          <button type="button" onclick="fillCredentials('admin@bsi.ac.id', 'password123')" class="p-2.5 rounded-xl bg-slate-800/60 hover:bg-slate-800 border border-slate-700/60 text-left transition-colors group">
            <div class="flex items-center gap-1.5 text-xs font-semibold text-cyan-300 group-hover:text-cyan-200">
              <span class="w-2 h-2 rounded-full bg-cyan-400"></span>
              <span>Admin PMB</span>
            </div>
            <p class="text-[10px] text-slate-400 truncate mt-0.5">admin@bsi.ac.id</p>
          </button>
          <button type="button" onclick="fillCredentials('maba@gmail.com', 'password123')" class="p-2.5 rounded-xl bg-slate-800/60 hover:bg-slate-800 border border-slate-700/60 text-left transition-colors group">
            <div class="flex items-center gap-1.5 text-xs font-semibold text-emerald-300 group-hover:text-emerald-200">
              <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
              <span>Calon Maba</span>
            </div>
            <p class="text-[10px] text-slate-400 truncate mt-0.5">maba@gmail.com</p>
          </button>
        </div>
      </div>

    </div>

    <!-- Security & Copyright Footer -->
    <div class="mt-6 text-center text-xs text-slate-500 space-y-1">
      <p class="flex items-center justify-center gap-1">
        <span class="material-symbols-outlined text-sm text-slate-400">lock</span>
        <span>Akses terproteksi middleware otentikasi role-based</span>
      </p>
      <p>&copy; {{ date('Y') }} Universitas Bina Sarana Informatika</p>
    </div>

  </div>

  <script>
    function fillCredentials(email, pass) {
      document.getElementById('email').value = email;
      document.getElementById('password').value = pass;
    }
  </script>

</body>
</html>
