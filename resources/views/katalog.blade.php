<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Event - Amikom Event Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-2xl font-bold text-indigo-600">EventHub</span>
                </div>
                <div class="hidden md:flex space-x-4">
                    <a href="/" class="px-4 py-2 rounded-lg text-slate-600 hover:bg-slate-100 transition duration-200">Home</a>
                    <a href="/profil" class="px-4 py-2 rounded-lg text-slate-600 hover:bg-slate-100 transition duration-200">Profil</a>
                    <a href="/katalog" class="px-4 py-2 rounded-lg bg-indigo-600 text-white font-medium shadow-md shadow-indigo-100 transition duration-200">Katalog</a>
                    <a href="/bantuan" class="px-4 py-2 rounded-lg text-slate-600 hover:bg-slate-100 transition duration-200">Bantuan</a>
                    <a href="/kontak" class="px-4 py-2 rounded-lg text-slate-600 hover:bg-slate-100 transition duration-200">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-white border-b">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Katalog Event</h1>
            <p class="mt-4 text-xl text-slate-500 max-w-3xl">Temukan berbagai event menarik di lingkungan kampus Amikom Yogyakarta.</p>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Event Card 1 -->
            <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden group hover:shadow-2xl transition-all duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1540575861501-7cf05a4b125a?auto=format&fit=crop&q=80&w=800" alt="Tech Talk" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 left-4">
                        <span class="bg-indigo-600 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider shadow-lg">Seminar</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-indigo-600 text-sm font-semibold mb-2">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        25 April 2026
                    </div>
                    <h2 class="text-xl font-bold text-slate-900 mb-2">Amikom Tech Talk 2026</h2>
                    <p class="text-slate-600 text-sm mb-4 line-clamp-2">Eksplorasi tren teknologi terbaru bersama para ahli industri ternama di Yogyakarta.</p>
                    <div class="flex items-center justify-between border-t pt-4">
                        <span class="text-indigo-600 font-bold">Gratis</span>
                        <a href="#" class="bg-slate-900 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 transition duration-200">Detail Event</a>
                    </div>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden group hover:shadow-2xl transition-all duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&q=80&w=800" alt="Workshop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 left-4">
                        <span class="bg-emerald-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider shadow-lg">Workshop</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-indigo-600 text-sm font-semibold mb-2">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        12 Mei 2026
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">UI/UX Design Masterclass</h3>
                    <p class="text-slate-600 text-sm mb-4 line-clamp-2">Belajar dasar-dasar desain antarmuka dan pengalaman pengguna untuk pemula.</p>
                    <div class="flex items-center justify-between border-t pt-4">
                        <span class="text-slate-900 font-bold">Rp 50.000</span>
                        <a href="#" class="bg-slate-900 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 transition duration-200">Detail Event</a>
                    </div>
                </div>
            </div>

            <!-- Event Card 3 -->
            <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden group hover:shadow-2xl transition-all duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&q=80&w=800" alt="Music" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 left-4">
                        <span class="bg-purple-600 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider shadow-lg">Konser</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-indigo-600 text-sm font-semibold mb-2">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        20 Juni 2026
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Amikom Music Festival</h3>
                    <p class="text-slate-600 text-sm mb-4 line-clamp-2">Perayaan musik akhir semester yang menampilkan bakat-bakat lokal Amikom.</p>
                    <div class="flex items-center justify-between border-t pt-4">
                        <span class="text-slate-900 font-bold">Rp 35.000</span>
                        <a href="#" class="bg-slate-900 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 transition duration-200">Detail Event</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="py-12 bg-white border-t text-center text-slate-400 text-sm">
        &copy; 2026 Amikom Event Hub. All rights reserved.
    </footer>
</body>
</html>
