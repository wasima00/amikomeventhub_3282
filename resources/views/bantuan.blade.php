<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan - Amikom Event Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-indigo-50/30 min-h-screen">
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
                    <a href="/bantuan" class="px-4 py-2 rounded-lg bg-indigo-600 text-white font-medium shadow-md shadow-indigo-100 transition duration-200">Bantuan</a>
                    <a href="/kontak" class="px-4 py-2 rounded-lg text-slate-600 hover:bg-slate-100 transition duration-200">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto py-16 px-4">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-extrabold text-slate-900 mb-4">Pusat Bantuan</h1>
            <p class="text-lg text-slate-600">Punya pertanyaan? Kami di sini untuk membantu Anda.</p>
        </div>

        <div class="space-y-6">
          
        </div>

        <div class="mt-16 bg-indigo-600 rounded-3xl p-10 text-center text-white shadow-xl shadow-indigo-200">
            <h2 class="text-2xl font-bold mb-4">Masih butuh bantuan?</h2>
            <p class="mb-8 text-indigo-100">Hubungi tim dukungan kami melalui halaman kontak untuk bantuan lebih lanjut.</p>
            <a href="/kontak" class="inline-block bg-white text-indigo-600 px-8 py-3 rounded-xl font-bold hover:bg-slate-50 transition duration-200">Hubungi Kami</a>
        </div>
    </main>

    <footer class="py-12 text-center text-slate-400 text-sm">
        &copy; 2026 Amikom Event Hub. All rights reserved.
    </footer>
</body>
</html>
