<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Course;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datap = paket::all();

        return view('editPaket', compact('datap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mod = Course::all();
        return view('tambahPaket', compact('mod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $nama_course = implode(',', $request->nama_course);
        
        $mod = new paket;
        $mod->nama_paket=$request->nama_paket;
        $mod->nama_course= $nama_course;
        $mod->harga_paket= $request->harga_paket;                

        $mod->save();
        return redirect('editPaket');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $mod = Paket::all();
        return view('paket', compact('mod'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_paket)
    {
        $mod = Course::all();
        $paket = Paket::find($id_paket);
        return view('updatePaket',compact('mod', 'paket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_paket)
    {
        $mod = Paket::find($id_paket);
        $mod->nama_paket=$request->nama_paket;
        if($request->nama_course == NULL){
            $mod->nama_course=$request->nama_course_old;
        }else{
            $mod->nama_course=implode(',', $request->nama_course);
        }        
        $mod->harga_paket=$request->harga_paket;
        $mod->save();
        return redirect('editPaket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_paket)
    {
        //
        $mod = paket::find($id_paket);
        $mod->delete();
        return redirect('editPaket');
    }
}
