<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('pelanggan')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        return view('transaksi.create', compact('pelanggan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required|unique:transaksis,kode_transaksi',
            'tanggal'        => 'required|date',
            'pelanggan_id'   => 'required|exists:pelanggans,id',
            'total_harga'    => 'required|numeric',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $pelanggan = Pelanggan::all();
        return view('transaksi.edit', compact('transaksi', 'pelanggan'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'kode_transaksi' => 'required|unique:transaksis,kode_transaksi,' . $transaksi->id,
            'tanggal'        => 'required|date',
            'pelanggan_id'   => 'required|exists:pelanggans,id',
            'total_harga'    => 'required|numeric',
        ]);

        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }
}
