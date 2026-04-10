<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Amikom Event Hub</title>
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
                    <a href="/profil" class="px-4 py-2 rounded-lg bg-indigo-600 text-white font-medium shadow-md shadow-indigo-100 transition duration-200">Profil</a>
                    <a href="/katalog" class="px-4 py-2 rounded-lg text-slate-600 hover:bg-slate-100 transition duration-200">Katalog</a>
                    <a href="/bantuan" class="px-4 py-2 rounded-lg text-slate-600 hover:bg-slate-100 transition duration-200">Bantuan</a>
                    <a href="/kontak" class="px-4 py-2 rounded-lg text-slate-600 hover:bg-slate-100 transition duration-200">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto py-12 px-4">
        <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/60 overflow-hidden border border-slate-100">
            <!-- Header/Cover -->
            <div class="h-32 bg-gradient-to-r from-indigo-500 to-purple-600"></div>
            
            <div class="px-8 pb-8">
                <div class="relative flex justify-between items-end -mt-12 mb-6">
                    <div class="p-1 bg-white rounded-2xl shadow-lg">
                        <img src="https://ui-avatars.com/api/?name=User+Profile&background=6366f1&color=fff&size=128" alt="Profile" class="w-24 h-24 rounded-xl object-cover">
                    </div>
                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-xl font-semibold transition-all duration-200 shadow-lg shadow-indigo-200">Edit Profil</button>
                </div>

                <div>
                    <h1 class="text-3xl font-bold text-slate-900">Wasima</h1>
                    <p class="text-indigo-600 font-medium lowercase">@wasima_amikom</p>
                    
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 text-center hover:scale-105 transition-transform duration-200">
                            <span class="block text-2xl font-bold text-slate-800">12</span>
                            <span class="text-sm text-slate-500 uppercase tracking-wider">Event Diikuti</span>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 text-center hover:scale-105 transition-transform duration-200">
                            <span class="block text-2xl font-bold text-slate-800">5</span>
                            <span class="text-sm text-slate-500 uppercase tracking-wider">Sertifikat</span>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 text-center hover:scale-105 transition-transform duration-200">
                            <span class="block text-2xl font-bold text-slate-800">3</span>
                            <span class="text-sm text-slate-500 uppercase tracking-wider">Wishlist</span>
                        </div>
                    </div>

                    <div class="mt-8 space-y-6">
                        <div>
                            <h2 class="text-xl font-semibold text-slate-800 mb-3">Biodata</h2>
                            <p class="text-slate-600 leading-relaxed">
                                Mahasiswa Teknik Informatika Universitas Amikom Yogyakarta yang antusias dengan pengembangan web dan manajemen acara. Sering berpartisipasi dalam event-event teknologi.
                            </p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <h3 class="font-semibold text-slate-700">Informasi Kontak</h3>
                                <ul class="space-y-2 text-slate-600">
                                    <li class="flex items-center space-x-3">
                                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                        <span>john.doe@students.amikom.ac.id</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                        <span>+62 812 3456 7890</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="py-12 text-center text-slate-400 text-sm">
        &copy; 2026 Amikom Event Hub. All rights reserved.
    </footer>
</body>
</html>
