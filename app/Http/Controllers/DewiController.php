<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dewi;

class DewiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dewis = Dewi::all();

        return view('dewis.index', compact('dewis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dewis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama'=>'required',
            'npm'=>'required'
        ]);
        $dewi = new Dewi([
            'nama' => $request->get('nama'),
            'npm' => $request->get('npm'),
            'kelas' => $request->get('kelas'),
            'alamat' => $request->get('alamat'),
            'nohp' => $request->get('nohp')
        ]);
        $dewi->save();
        return redirect('/dewis')->with('success', 'Dewi saved!');
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
    public function edit($id)
    {
        //
        $dewi = Dewi::find($id);
        return view('dewis.edit', compact('dewi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama'=>'required',
            'npm'=>'required'
        ]);
        $dewi = Dewi::find($id);
        $dewi->nama = $request->get('nama');
        $dewi->npm = $request->get('npm');
        $dewi->kelas = $request->get('kelas');
        $dewi->alamat = $request->get('alamat');
        $dewi->nohp = $request->get('nohp');
        $dewi->save();
        return redirect('/dewis')->with('success', 'Dewi updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $dewi = Dewi::find($id);
        $dewi->delete();

        return redirect('/dewis')->with('success', 'Dewi deleted!');
    }
}
