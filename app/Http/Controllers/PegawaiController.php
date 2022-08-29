<?php

namespace App\Http\Controllers;

use App\Helpers\NipGenerator;
use App\Models\Unit;
use App\Models\Jabatan;
use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.pegawai.index', [
            'pegawai' => Pegawai::With('unit', 'jabatan')->orderBy('id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pegawai.create', [
            'jabatan'=> Jabatan::get(),
            'unit'=> Unit::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $nip = (new NipGenerator())->generate([
            'dob' => $request->dob
        ]);
        $formrequest = $request->merge([
            'nip'=>$nip
        ])->all();

        $validator = Validator::make($formrequest, [
            'nip' => 'required|unique:pegawai,nip',
            'nik' => 'required|unique:pegawai,nik|min:16|max:16',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|int',
            'jabatan_id' => 'required|exists:jabatan,id',
            'unit_id' => 'required|exists:unit,id',
        ])->validate();
        // dd($validator);
        Pegawai::create($validator);

        return redirect()
            ->route('pegawai.index')
            ->with('Success', 'Berhasil Input Pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {

        return view('pages.pegawai.edit', [
            'jabatan'=> Jabatan::get(),
            'unit'=> Unit::get(),
            'pegawai'=> $pegawai,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $validate = Validator::make($request->all(), [
            'nip' => 'required|unique:pegawai,nip,'.$pegawai->id,
            'nik' => 'required|min:16|max:16|unique:pegawai,nik,'.$pegawai->id,
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|int',
            'jabatan_id' => 'required|exists:jabatan,id',
            'unit_id' => 'required|exists:unit,id',
        ])->validate();
        // dd($validator);
        $pegawai->update($validate);

        return redirect()
            ->route('pegawai.index')
            ->with('Success', 'Berhasil Mengubah Data Pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect()
        ->route('pegawai.index')
        ->with('Success', 'Berhasil Menghapus Data Pegawai');
    }
}
