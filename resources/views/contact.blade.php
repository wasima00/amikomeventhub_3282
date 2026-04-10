<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Amikom Event Hub</title>
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
                    <a href="/katalog" class="px-4 py-2 rounded-lg text-slate-600 hover:bg-slate-100 transition duration-200">Katalog</a>
                    <a href="/bantuan" class="px-4 py-2 rounded-lg text-slate-600 hover:bg-slate-100 transition duration-200">Bantuan</a>
                    <a href="/kontak" class="px-4 py-2 rounded-lg bg-indigo-600 text-white font-medium shadow-md shadow-indigo-100 transition duration-200">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
        <div class="w-full max-w-lg bg-white p-10 rounded-3xl shadow-2xl shadow-slate-200 border border-slate-100 text-center">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-indigo-100 text-indigo-600 rounded-full mb-8">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            
            <h1 class="text-3xl font-bold text-slate-900 mb-2">Hubungi Kami</h1>
            <p class="text-slate-500 mb-8 text-lg">Ada pertanyaan atau butuh informasi? Kirimkan pesan kepada kami.</p>
            
            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100 mb-10 group hover:border-indigo-200 transition-colors duration-200">
                <p class="text-sm font-medium text-slate-400 uppercase tracking-widest mb-1">Email Dukungan</p>
                <a href="mailto:admin@amikomeventhub.com" class="text-xl font-bold text-slate-800 hover:text-indigo-600 transition duration-200">admin@amikomeventhub.com</a>
            </div>

            <div class="flex flex-col space-y-4">
                <a href="/" class="bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-indigo-700 transition duration-200 shadow-lg shadow-indigo-100">Kembali ke Beranda</a>
                <p class="text-slate-400 text-xs mt-4">Atau hubungi kami melalui media sosial Amikom Yogyakarta</p>
            </div>
        </div> 
    </main>

    <footer class="py-12 text-center text-slate-400 text-sm">
        &copy; 2026 Amikom Event Hub. All rights reserved.
    </footer>
</body>
</html>