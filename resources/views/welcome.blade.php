<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Amikom Event Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-white min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-200 mr-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <span class="text-2xl font-bold text-slate-900 tracking-tight">EventHub</span>
                </div>
                <div class="hidden md:flex items-center space-x-2">
                    <a href="/" class="px-5 py-2.5 rounded-xl bg-indigo-600 text-white font-semibold shadow-xl shadow-indigo-100 transition-all duration-300 transform hover:-translate-y-0.5">Home</a>
                    <a href="/profil" class="px-5 py-2.5 rounded-xl text-slate-600 font-medium hover:bg-slate-50 hover:text-indigo-600 transition-all duration-200">Profil</a>
                    <a href="/katalog" class="px-5 py-2.5 rounded-xl text-slate-600 font-medium hover:bg-slate-50 hover:text-indigo-600 transition-all duration-200">Katalog</a>
                    <a href="/bantuan" class="px-5 py-2.5 rounded-xl text-slate-600 font-medium hover:bg-slate-50 hover:text-indigo-600 transition-all duration-200">Bantuan</a>
                    <a href="/kontak" class="px-5 py-2.5 rounded-xl text-slate-600 font-medium hover:bg-slate-50 hover:text-indigo-600 transition-all duration-200">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <!-- Hero Section -->
        <section class="relative overflow-hidden pt-20 pb-20 lg:pt-32 lg:pb-40">
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-indigo-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <div class="text-center max-w-3xl mx-auto">
                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-semibold bg-indigo-50 text-indigo-700 mb-6 border border-indigo-100 uppercase tracking-wider">Platform Event Kampus #1</span>
                    <h1 class="text-5xl lg:text-7xl font-extrabold text-slate-900 leading-tight mb-8">
                        Temukan Inspirasi di <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Amikom Event Hub</span>
                    </h1>
                    <p class="text-xl text-slate-500 leading-relaxed mb-12">
                        Portal informasi event, seminar, workshop, dan festival terlengkap khusus untuk mahasiswa Universitas Amikom Yogyakarta. Tingkatkan skill dan jaringanmu sekarang!
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="/katalog" class="w-full sm:w-auto px-10 py-5 bg-slate-900 text-white rounded-2xl font-bold text-lg hover:bg-slate-800 transition-all duration-300 shadow-2xl shadow-slate-200 transform hover:-translate-y-1">Eksplorasi Event</a>
                        <a href="/bantuan" class="w-full sm:w-auto px-10 py-5 bg-white text-slate-900 border-2 border-slate-100 rounded-2xl font-bold text-lg hover:bg-slate-50 transition-all duration-300 transform hover:-translate-y-1">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-20 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="p-8 bg-white rounded-3xl shadow-sm border border-slate-100 text-center">
                        <span class="block text-4xl font-extrabold text-indigo-600 mb-2">500+</span>
                        <span class="text-slate-500 font-medium">Event Aktif</span>
                    </div>
                    <div class="p-8 bg-white rounded-3xl shadow-sm border border-slate-100 text-center">
                        <span class="block text-4xl font-extrabold text-indigo-600 mb-2">10k+</span>
                        <span class="text-slate-500 font-medium">Mahasiswa</span>
                    </div>
                    <div class="p-8 bg-white rounded-3xl shadow-sm border border-slate-100 text-center">
                        <span class="block text-4xl font-extrabold text-indigo-600 mb-2">50+</span>
                        <span class="text-slate-500 font-medium">UKM & Organisasi</span>
                    </div>
                    <div class="p-8 bg-white rounded-3xl shadow-sm border border-slate-100 text-center">
                        <span class="block text-4xl font-extrabold text-indigo-600 mb-2">100%</span>
                        <span class="text-slate-500 font-medium">Terpercaya</span>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="py-20 bg-white border-t">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center mb-8">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <span class="text-xl font-bold text-slate-900">EventHub</span>
            </div>
            <p class="text-slate-400">&copy; 2026 Universitas Amikom Yogyakarta. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
