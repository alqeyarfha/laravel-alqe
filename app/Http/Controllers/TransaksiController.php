<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\models\produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('pelanggan', 'produks')->latest()->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $produk    =Produk::all();
        return view('transaksi.create', compact('pelanggan', 'produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan'   => 'required|unique:pelanggan,id',
            'id_produk'      => 'required|array',
            'id_produk'      => 'exists:produks,id',
            'jumlah'         => 'required|array',
            'jumlah'         => 'integer|min:1',
        ]);


        $kode                       = 'TRX-' . strtoupper(unique());
        $transaksi                  = new Transaksi();
        $transaksi->kode_transaksi  = $kode;
        $transaksi->id_pelanggan    =$request->id_pelanggan;
        $transaksi->tanggal         =now();
        $transaksi->totla_harga     =0;
        $transaksi->seve();
        
        $totalHarga = 0;
        $produkPivot = [];
 
        foreach ($request->id_produk as $index =>$produkid) {
            $produk     =Produk::findOrFail($produkid);
            $produk     = $request->jumlah[$index];
            $produk     =$produk->harga * $jumlah;

            $produkpivot[$produkid] = [
                'jumlah'    =>$jumlah,
                'sub_total' =>$subTotal,
            ];

            $produk-> stok -=$jumlah;
            $produk->save();

            $totalHarga +=$subtotal;
        }

        $transaksi->produk()->attach($produkPivot);

        $transaksi->update(['total_harga' => $totalHarga]);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan!');
    }

    public function show($id)
    {
        $transaksi = Transaksi::with(['pelanggan', 'produks'])->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit($id)
    {
        $transaksi = Transaksi::with('produk')->findOrFail($id);
        $pelanggan = Pelanggan::all();
        $produk    = Produk::all();

        return view('transaksi.edit', compact('transaksi', 'pelanggan' , 'produks'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'id_pelanggan'   => 'required|unique:pelanggan,id',
            'id_produk'      => 'required|array',
            'id_produk'      => 'exists:produks,id',
            'jumlah'         => 'required|array',
            'jumlah'         => 'integer|min:1',
        ]);

        $transaksi = Transaksi::with('produk')->findOrFail($id);

        foreach ($transaksi->produks as $olsProduk) {
            $p = Produk::find($oldProduk->id);
            if ($p) {
                $p->stok += $olsProduk->pivot->jumlah;
                $p->save();
            }
        }
        $transaksi->produks()->detach();

        $transaksi->id_pelanggan =$request->id_pelanggan;
        $transaksi->tanggal = now();
        $transaksi->totla_harga = 0;
        $transaksi->save();

        $totalJarga = 0;
        $produkPivot = [];

            foreach ($request->id_produk as $index =>$produkid) {
            $produk     =Produk::findOrFail($produkid);
            $produk     = $request->jumlah[$index];
            $produk     =$produk->harga * $jumlah;

            $produkpivot[$produkid] = [
                'jumlah'    =>$jumlah,
                'sub_total' =>$subTotal,
            ];

            $produk-> stok -=$jumlah;
            $produk->save();

            $totalHarga +=$subtotal;
        }

        $transaksi->produk()->attach($produkPivot);

        $transaksi->update(['total_harga' => $totalharga]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }


public function destroy($id)
    {
        $transaksi = Transaksi::with('produks')->findOrFail($id);

        // Kembalikan stok produk
        foreach ($transaksi->produks as $produk) {
            $p = Produk::find($produk->id);
            if ($p) {
                $p->stok += $produk->pivot->jumlah;
                $p->save();
            }
        }

        // Hapus relasi pivot
        $transaksi->produks()->detach();

        // Hapus transaksi utama
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus dan stok dikembalikan!');
    }

    public function search(Request $request)
    {
        $query     = $request->query('query');
        $transaksi = Transaksi::with('pelanggan')
            ->where('kode_transaksi', 'like', "%$query%")
            ->get();

        return response()->json($transaksi);
    }

}
