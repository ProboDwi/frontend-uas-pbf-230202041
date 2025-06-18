<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Obat extends Controller
{
    public function index() {
        $response = Http::get('http://localhost:8080/obat');
        $obat = $response->json();
        return view('obat.index', compact('obat'));
    }

     public function store(Request $request)
    {
        $response = Http::post('http://localhost:8080/obat', [
            'nama_obat' => $request->nama_obat,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        //  dd($response->status(), $response->body());

        if ($response->successful()) {
            return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan');
        } else {
            return redirect()->route('obat.index')->with('error', 'Obat gagal ditambahkan');
        }
    }

    public function update(Request $request, $id)
    {
        $response = Http::put("http://localhost:8080/obat/{$id}", [
            'nama_obat' => $request->nama_obat,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        if ($response->successful()) {
            return redirect()->route('obat.index')->with('success', 'obat berhasil diupdate');
        } else {
            return redirect()->route('obat.index')->with('error', 'obat gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $response = Http::delete('http://localhost:8080/obat/' . $id);
        if ($response->successful()) {
            return redirect()->route('obat.index')->with('success', 'obat berhasil dihapus');
        } else {
            return redirect()->route('obat.index')->with('error', 'obat gagal dihapus');
        }
    }

    public function exportPdfPerData($id)
    {
        $response = Http::get("http://localhost:8080/obat/$id");

        if (!$response->successful()) {
            abort(404, 'Data obat tidak ditemukan');
        }

        $data = $response->json();

        $obat = $data[0];

        // Ambil elemen pertama dari array
        // $dosen = $data[0] ?? null;

        // if (!$dosen) {
        //     abort(404, 'Data dosen kosong');
        // }

        $pdf = Pdf::loadView('obat.export_single', compact('obat'));
        return $pdf->download('obat_' . $obat['id'] . '.pdf');
    }
}
