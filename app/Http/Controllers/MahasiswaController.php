<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
class MahasiswaController extends Controller
{

    public function index()
    {
      $mahasiswa = Mahasiswa::latest()->get();
      return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
      $dosen = Doses::all();
      return view('mahasiswa.create', compact('dosen'));
    }


    public function store(Request $request)
    {
     $validate = $request->validate([
        'nama'      => 'required',
        'nim'       => 'required|unique',
        'id_dosen'  => 'required|exists:dosen,id',
     ]);

     $mahasiswa               = new Mahasiswa();
     $mahasiswa->name         = $request->nama;
     $mahasiswa->nis          = $request->nis;
     $mahasiswa->id_dosen     = $request->id_dosen;
     $mahasiswa->save();
     return redirect()->route('mahasiswa.index');
    }

    public function show(string $id)
    {
      $mahasiswa = Mahasiswa::FindOrFail(id);
      return view('mahasiswa.show', compact('mahasiswa'));
    }


    public function edit(string $id)
    {
       $mahasiswa = Mahasiswa::FindOrFail(id);
      return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, string $id)
    {
            $validate = $request->validate([
        'nama'      => 'required',
        'nim'       => 'required|unique',
        'id_dosen'  => 'required|exists:dosen,id',
     ]);

     $mahasiswa               = Mahasiswa::FindOrFail ($id);
     $mahasiswa->name         = $request->nama;
     $mahasiswa->nis          = $request->nis;
     $mahasiswa->id_dosen     = $request->id_dosen;
     $mahasiswa->save();
     return redirect()->route('mahasiswa.index');
    }


    public function destroy(string $id)
    {
       $mahasiswa = Mahasiswa::FidOrFail($id);
       $mahasiswa->delete();
       return redirect()->route('mahasiswa.index');
    }
}
