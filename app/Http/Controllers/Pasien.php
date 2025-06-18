<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Pasien extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8080/pasien');
        $pasien = $response->json();
        return view('pasien.index', compact('pasien'));
    }

    public function store(Request $request)
    {
        $response = Http::post('http://localhost:8080/pasien', [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        //  dd($response->status(), $response->body());

        if ($response->successful()) {
            return redirect()->route('pasien.index')->with('success', 'Pasien berhasil ditambahkan');
        } else {
            return redirect()->route('pasien.index')->with('error', 'Pasien gagal ditambahkan');
        }
    }

    public function update(Request $request, $id)
    {
        $response = Http::put("http://localhost:8080/pasien/{$id}", [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        if ($response->successful()) {
            return redirect()->route('pasien.index')->with('success', 'Pasien berhasil diupdate');
        } else {
            return redirect()->route('pasien.index')->with('error', 'Pasien gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $response = Http::delete('http://localhost:8080/pasien/' . $id);
        if ($response->successful()) {
            return redirect()->route('pasien.index')->with('success', 'Pasien berhasil dihapus');
        } else {
            return redirect()->route('pasien.index')->with('error', 'Pasien gagal dihapus');
        }
    }

    public function exportPdfPerData($id)
    {
        $response = Http::get("http://localhost:8080/pasien/$id");

        if (!$response->successful()) {
            abort(404, 'Data dosen tidak ditemukan');
        }

        $data = $response->json();

        $pasien = $data[0];

        // Ambil elemen pertama dari array
        // $dosen = $data[0] ?? null;

        // if (!$dosen) {
        //     abort(404, 'Data dosen kosong');
        // }

        $pdf = Pdf::loadView('pasien.export_single', compact('pasien'));
        return $pdf->download('pasien_' . $pasien['id'] . '.pdf');
    }
}
