<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .gradient-bg {
            background: linear-gradient(135deg, #312e81 0%, #4338ca 50%, #6366f1 100%);
        }
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .slide-up {
            animation: slideUp 0.6s ease-out;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-6 relative overflow-hidden">

    <!-- Decorative background elements -->
    <div class="absolute top-20 left-20 w-72 h-72 bg-white/5 rounded-full blur-3xl float-animation"></div>
    <div class="absolute bottom-20 right-20 w-96 h-96 bg-indigo-400/10 rounded-full blur-3xl float-animation" style="animation-delay: -3s;"></div>
    <div class="absolute top-1/2 left-1/3 w-48 h-48 bg-purple-400/10 rounded-full blur-2xl float-animation" style="animation-delay: -1.5s;"></div>

    <div class="max-w-md w-full slide-up relative z-10">
        <!-- Card -->
        <div class="bg-white/95 backdrop-blur-xl text-slate-900 rounded-[2rem] p-10 shadow-2xl shadow-indigo-950/30 border border-white/20">
            <!-- Header -->
            <div class="text-center mb-10">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl flex items-center justify-center text-white font-bold text-2xl mx-auto mb-5 shadow-lg shadow-indigo-300/50 rotate-3 hover:rotate-0 transition-transform duration-300">AH</div>
                <h1 class="text-3xl font-extrabold text-slate-800">Selamat Datang</h1>
                <p class="text-slate-400 mt-2 font-medium">Masuk ke dashboard AmikomEventHub</p>
            </div>

            <!-- Error Message -->
            @if(session('error'))
                <div class="bg-red-50 text-red-600 p-4 rounded-2xl mb-6 font-semibold text-sm text-center border border-red-100 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ session('error') }}
                </div>
            @endif

            <!-- Form Login -->
            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-500 mb-2 uppercase tracking-widest">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="admin@amikomeventhub.com"
                            class="w-full pl-12 pr-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all font-medium text-slate-700 placeholder:text-slate-300" required>
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-2 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 mb-2 uppercase tracking-widest">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input type="password" name="password" placeholder="••••••••"
                            class="w-full pl-12 pr-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all font-medium text-slate-700 placeholder:text-slate-300" required>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-2 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-2xl font-extrabold text-lg shadow-xl shadow-indigo-200 hover:shadow-2xl hover:shadow-indigo-300 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">
                    Masuk
                </button>
            </form>

            <!-- Link ke Register -->
            <div class="mt-8 text-center">
                <p class="text-slate-400 text-sm font-medium">
                    Belum punya akun?
                    <a href="{{ route('admin.register') }}" class="text-indigo-600 font-bold hover:text-indigo-700 hover:underline transition">Daftar di sini</a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <p class="text-center text-indigo-200/60 text-xs mt-6 font-medium">&copy; {{ date('Y') }} AmikomEventHub. All rights reserved.</p>
    </div>
</body>
</html>
