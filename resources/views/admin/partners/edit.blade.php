@extends('layouts.admin')
@section('title', 'Edit Partner - Admin')
@section('page_title', 'Edit Partner')
@section('page_subtitle', 'Perbarui data partner yang sudah ada.')

@section('content')
<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm p-8">
    <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="font-bold text-slate-700">Nama Partner</label>
            <input type="text" name="name" value="{{ old('name', $partner->name) }}" class="w-full mt-2 rounded-3xl border border-slate-200 px-4 py-3 text-slate-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Masukkan nama partner">
            @error('name')
                <p class="text-rose-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

            <div>
                <label class="font-bold text-slate-700">Logo</label>
                <input type="url" name="logo_url" value="{{ old('logo_url', $partner->logo_url) }}" class="w-full mt-2 rounded-3xl border border-slate-200 px-4 py-3 text-slate-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="https://example.com/logo.png">
                @error('logo_url')
                    <p class="text-rose-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

        <div class="flex flex-wrap gap-3 mt-6">
            <button type="submit" class="px-8 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">Perbarui Partner</button>
            <a href="{{ route('admin.partners.index') }}" class="px-8 py-3 bg-slate-100 text-slate-700 rounded-2xl font-bold hover:bg-slate-200 transition">Batal</a>
        </div>
    </form>
</div>
@endsection