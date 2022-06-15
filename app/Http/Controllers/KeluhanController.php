<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluhan;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreateKeluhanMail;
use App\Mail\BalasanKeluhanMail;
use DB;
use Auth;

class KeluhanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mod = DB::table('keluhan')->where('id_user', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        return view('keluhan', compact('mod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createKeluhan()
    {
        return view('createKeluhan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeKeluhan(Request $request)
    {
        $x = new Keluhan;
        $x->id_user=$request->id_user;
        $x->email=$request->email;
        $x->isi_keluhan=$request->isi_keluhan;
        $x->save();

        \Mail::to($x->email)->send(new CreateKeluhanMail($x));

        return redirect(url('siswa/keluhan'))->with('success','Keluhan Berhasil Dikirim');
    }

    public function showAllKeluhan()
    {
        $mod = DB::table('keluhan')->orderBy('created_at', 'DESC')->get();

        return view('showDataKeluhan', compact('mod'));
    }

    public function balasMailKeluhan(Request $request, $id)
    {
        $mod = Keluhan::find($id);

        $mod->status = 'Sudah Diproses';
        $mod->save();

        \Mail::to($mod->email)->send(new BalasanKeluhanMail($mod));

        return redirect(url('admin/data-keluhan'))->with('success','Balasan Keluhan Berhasil Dikirim');
    }

    public function hapusKeluhan($id_keluhan)
    {
        $mod = Keluhan::find($id_keluhan);
        $mod->delete();

        return redirect(url('admin/data-keluhan'));
    }

}
