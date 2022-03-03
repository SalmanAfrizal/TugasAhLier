<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Siswa;

class SiswaController extends Controller
{
    
    public function index()
    {
        $siswa = Siswa::all();
        return view('index', ['siswa' => $siswa]);
    }

    public function tambah()
    {
        return view('tambah_dalam');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'kelas' => 'required',
            'umur' => 'required'

        ]);

        siswa::create([
            'nama' => $request->nama,
            'kelas' =>$request ->kelas,
            'umur' => $request ->umur

        ]);

        return redirect('/siswa')->with('succes', 'kamu telalu gampang');
    }

    public function edit($id)
    {
        $siswa = siswa::find($id);
        return view('salman_edit', ['siswa' => $siswa]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'kelas' => 'required',
            'umur' => 'required'
        ]);

        $siswa = siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->umur = $request->umur;
        $siswa->save();
        return redirect('/siswa');
    }

    public function delete($id)
    {
        $siswa = siswa::find($id);
        $siswa->delete();
        return redirect('/siswa');
    }

 
    }