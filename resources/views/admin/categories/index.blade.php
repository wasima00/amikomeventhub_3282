@extends('layouts.admin')

@section('title', 'Manajemen Kategori')
@section('subtitle', 'Kelola kategori event yang tersedia.')

@section('content')
    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="px-8 py-6 bg-slate-50/50 border-b flex justify-between items-center">
            <h3 class="font-black text-xl">Daftar Kategori</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                    <tr>
                        <th class="px-8 py-4 w-16">No</th>
                        <th class="px-8 py-4">Nama Kategori</th>
                        <th class="px-8 py-4">Slug</th>
                        <th class="px-8 py-4 text-center">Jumlah Event</th>
                    </tr>
                </thead>
                <tbody class="divide-y border-t">
                    @forelse($categories as $index => $category)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-8 py-6 font-bold text-slate-400">{{ $index + 1 }}</td>
                        <td class="px-8 py-6 font-black text-slate-800">{{ $category->name }}</td>
                        <td class="px-8 py-6 text-sm text-slate-500 font-mono">{{ $category->slug }}</td>
                        <td class="px-8 py-6 text-center">
                            <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg text-xs font-bold ring-1 ring-indigo-200">
                                {{ $category->events_count }} Event
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-8 py-6 text-center text-slate-500 font-medium">Belum ada kategori.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
