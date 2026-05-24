@extends('layouts.admin')

@section('title', 'Manajemen Partner')
@section('subtitle', 'Kelola partner resmi yang terintegrasi dengan AmikomEventHub.')

@section('content')
    <!-- Alert Success / Error -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-2xl flex items-center gap-3 text-green-700 shadow-sm animate-fade-in">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <p class="font-bold text-sm">{{ session('success') }}</p>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-2xl flex items-center gap-3 text-red-700 shadow-sm animate-fade-in">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <p class="font-bold text-sm">{{ session('error') }}</p>
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-2xl text-red-700 shadow-sm">
            <div class="flex items-center gap-3 mb-2">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="font-bold text-sm">Terjadi kesalahan validasi:</p>
            </div>
            <ul class="list-disc list-inside text-xs pl-8 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Header & Search Controls -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <!-- Search Input (Soal 3) -->
        <form action="{{ route('admin.partners.index') }}" method="GET" class="w-full md:w-96 flex items-center gap-2">
            <div class="relative w-full">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari partner..." 
                    class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-2xl shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-sm font-semibold transition-all">
            </div>
            <button type="submit" class="px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-md shadow-indigo-100 hover:shadow-lg transition text-sm">
                Cari
            </button>
            @if(request('search'))
                <a href="{{ route('admin.partners.index') }}" class="px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-2xl transition text-sm">
                    Reset
                </a>
            @endif
        </form>

        <!-- Tambah Partner Button -->
        <button onclick="toggleModal('createPartnerModal')" class="flex items-center justify-center gap-2 px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl shadow-xl shadow-indigo-100 hover:scale-[1.02] active:scale-[0.98] transition text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Partner
        </button>
    </div>

    <!-- Table List -->
    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden mb-12">
        <div class="px-8 py-6 bg-slate-50/50 border-b flex justify-between items-center">
            <h3 class="font-black text-xl">Daftar Partner</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                    <tr>
                        <th class="px-8 py-4 w-16">No</th>
                        <th class="px-8 py-4 w-28 text-center">Logo</th>
                        <th class="px-8 py-4">Nama Partner</th>
                        <th class="px-8 py-4 text-center w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y border-t">
                    @forelse($partners as $index => $partner)
                    <tr class="hover:bg-slate-50/50 transition animate-fade-in">
                        <td class="px-8 py-6 font-bold text-slate-400">{{ $index + 1 }}</td>
                        <td class="px-8 py-4 text-center">
                            <div class="w-12 h-12 bg-slate-100 rounded-xl overflow-hidden flex items-center justify-center border mx-auto shadow-sm">
                                <img src="{{ asset('storage/' . $partner->logo_url) }}" alt="{{ $partner->name }}" 
                                    class="w-full h-full object-contain p-1"
                                    onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name={{ urlencode($partner->name) }}&background=f1f5f9&color=6366f1&size=64';">
                            </div>
                        </td>
                        <td class="px-8 py-6 font-black text-slate-800">{{ $partner->name }}</td>
                        <td class="px-8 py-6 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <!-- Edit Button -->
                                <button onclick="openEditPartnerModal('{{ $partner->id }}', '{{ addslashes($partner->name) }}', '{{ $partner->logo_url ? asset('storage/' . $partner->logo_url) : '' }}')"
                                    class="p-2 text-amber-600 hover:bg-amber-50 rounded-xl hover:scale-105 active:scale-95 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>

                                <!-- Delete Form -->
                                <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" 
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus partner ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-xl hover:scale-105 active:scale-95 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-8 py-12 text-center text-slate-400 font-medium">Belum ada partner yang sesuai pencarian.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Partner Modal -->
    <div id="createPartnerModal" class="fixed inset-0 z-50 hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-2xl w-full max-w-md overflow-hidden transform scale-95 transition-transform duration-300">
            <div class="px-8 py-6 bg-slate-50/50 border-b flex justify-between items-center">
                <h3 class="font-black text-xl text-slate-800">Tambah Partner</h3>
                <button onclick="toggleModal('createPartnerModal')" class="p-2 text-slate-400 hover:text-slate-600 rounded-xl transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf
                <!-- Name Field -->
                <div class="space-y-2">
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400">Nama Partner</label>
                    <input type="text" name="name" required placeholder="Masukkan nama partner..." 
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-500 focus:bg-white focus:ring-1 focus:ring-indigo-500 text-sm font-semibold transition-all">
                </div>
                <!-- Logo File Field -->
                <div class="space-y-2">
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400">Logo Partner</label>
                    <input type="file" name="logo" accept="image/*"
                        class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:uppercase file:tracking-wider file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100 border border-dashed border-slate-200 p-4 rounded-xl transition-all">
                    <p class="text-[10px] text-slate-400 font-medium">Format: JPG, PNG, SVG, WEBP. Maks 2MB.</p>
                </div>
                <!-- Buttons -->
                <div class="flex items-center gap-3 pt-4 border-t">
                    <button type="button" onclick="toggleModal('createPartnerModal')" 
                        class="w-1/2 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-xl transition text-sm">
                        Batal
                    </button>
                    <button type="submit" 
                        class="w-1/2 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-100 hover:shadow-xl transition text-sm">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Partner Modal -->
    <div id="editPartnerModal" class="fixed inset-0 z-50 hidden bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-2xl w-full max-w-md overflow-hidden transform scale-95 transition-transform duration-300">
            <div class="px-8 py-6 bg-slate-50/50 border-b flex justify-between items-center">
                <h3 class="font-black text-xl text-slate-800">Edit Partner</h3>
                <button onclick="toggleModal('editPartnerModal')" class="p-2 text-slate-400 hover:text-slate-600 rounded-xl transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form id="editPartnerForm" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf
                @method('PUT')
                <!-- Name Field -->
                <div class="space-y-2">
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400">Nama Partner</label>
                    <input type="text" id="editPartnerNameInput" name="name" required placeholder="Masukkan nama partner baru..." 
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-500 focus:bg-white focus:ring-1 focus:ring-indigo-500 text-sm font-semibold transition-all">
                </div>
                <!-- Logo File Field -->
                <div class="space-y-4">
                    <div class="space-y-2">
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400">Upload Logo Baru (Opsional)</label>
                        <input type="file" name="logo" accept="image/*"
                            class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:uppercase file:tracking-wider file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100 border border-dashed border-slate-200 p-4 rounded-xl transition-all">
                        <p class="text-[10px] text-slate-400 font-medium">Kosongkan jika tidak ingin mengubah logo.</p>
                    </div>
                    <!-- Current Logo Preview -->
                    <div id="logoPreviewContainer" class="hidden items-center gap-3 p-3 bg-slate-50 rounded-xl border border-slate-100">
                        <div class="w-10 h-10 bg-white rounded-lg overflow-hidden border flex items-center justify-center p-1 shadow-sm flex-shrink-0">
                            <img id="logoPreviewImage" src="" alt="Current logo" class="w-full h-full object-contain">
                        </div>
                        <div class="text-xs font-medium text-slate-500">Logo saat ini</div>
                    </div>
                </div>
                <!-- Buttons -->
                <div class="flex items-center gap-3 pt-4 border-t">
                    <button type="button" onclick="toggleModal('editPartnerModal')" 
                        class="w-1/2 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-xl transition text-sm">
                        Batal
                    </button>
                    <button type="submit" 
                        class="w-1/2 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-100 hover:shadow-xl transition text-sm">
                        Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script to toggle modals -->
    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            } else {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }
        }

        function openEditPartnerModal(id, name, logoUrl) {
            const form = document.getElementById('editPartnerForm');
            form.action = `/admin/partners/${id}`;
            document.getElementById('editPartnerNameInput').value = name;

            const previewContainer = document.getElementById('logoPreviewContainer');
            const previewImage = document.getElementById('logoPreviewImage');
            
            if (logoUrl) {
                previewImage.src = logoUrl;
                previewContainer.classList.remove('hidden');
                previewContainer.classList.add('flex');
            } else {
                previewContainer.classList.remove('flex');
                previewContainer.classList.add('hidden');
            }

            toggleModal('editPartnerModal');
        }
    </script>
@endsection
