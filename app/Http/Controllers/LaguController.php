<?php

namespace App\Http\Controllers;

use App\Models\DaftarLagu;
use Illuminate\Http\Request;

class LaguController extends Controller
{
    // READ - Tampilkan semua lagu
    public function index(Request $request)
    {
    $search = $request->input('search');

    $daftarLagu = DaftarLagu::query()
        ->when($search, function ($query) use ($search) {
            $query->where('judul', 'like', "%{$search}%")
                  ->orWhere('artist', 'like', "%{$search}%")
                  ->orWhere('album', 'like', "%{$search}%")
                  ->orWhere('durasi_menit', 'like', "%{$search}%")
                  ->orWhere('tahun_rilis', 'like', "%{$search}%");
        })
        ->paginate(10);

        return view('route_daftar_lagu.index', [
            'daftarLagu' => $daftarLagu,
            'search' => $search
        ]);
    }

    // CREATE - Tampilkan form create
    public function create()
    {
        return view('route_daftar_lagu.create');
    }

    // CREATE - Simpan data ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|min:3|max:100',
            'artist' => 'required|min:3|max:100',
            'album' => 'required|min:3|max:100',
            'durasi_menit' => 'required|integer|min:1|max:60',
            'tahun_rilis' => 'required|min:3|max:100'
        ]);

        DaftarLagu::create($validated);
        
        return redirect()->route('route_daftar_lagu.index')
                       ->with('success', 'Lagu berhasil ditambahkan!');
    }

    // READ - Tampilkan detail 1 lagu
    public function show($id)
    {
        $daftarLagu = DaftarLagu::findOrFail($id);
        return view('route_daftar_lagu.show', compact('daftarLagu'));
    }

    // UPDATE - Tampilkan form edit
    public function edit($id)
    {
        $daftarLagu = DaftarLagu::findOrFail($id);
        return view('route_daftar_lagu.edit', compact('daftarLagu'));
    }

    // UPDATE - Update data di database
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|min:3|max:100',
            'artist' => 'required|min:3|max:100',
            'album' => 'required|min:3|max:100',
            'durasi_menit' => 'required|integer|min:1|max:60',
            'tahun_rilis' => 'required|min:3|max:100'
        ]);
        
        $daftarLagu = DaftarLagu::findOrFail($id);
        $daftarLagu->update($validated);
        
        return redirect()->route('route_daftar_lagu.index')
                       ->with('success', 'Lagu berhasil diupdate!');
    }

    // DELETE - Hapus data dari database
    public function destroy($id)
    {
        $daftarLagu = DaftarLagu::findOrFail($id);
        $daftarLagu->delete();
        
        return redirect()->route('route_daftar_lagu.index')
                       ->with('success', 'Lagu berhasil dihapus!');
    }
}