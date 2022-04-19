<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\TransaksiCourse;
use Illuminate\Support\Facades\DB;
use Auth;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCourse()
    {
        $datas = Course::all();
        return view('buy_course', compact ('datas'));
    }

    public function storeTransactionCourse(Request $request)
    {
        $model = new TransaksiCourse;
        $model->id_course=$request->id_course;
        $model->id_user= $request->id_user;     
        $model->save();
        return redirect('siswa/riwayatBeli');
    }

    public function riwayatBeli()
    {
        $data = DB::table('transaksi_course')
                ->select('transaksi_course.id_transaksi_course', 'course.nama_course', 'transaksi_course.created_at', 'transaksi_course.id_user',
                        'course.perkiraan_waktu', 'course.harga_course')
                ->join('course', 'course.id_course', '=', 'transaksi_course.id_course')
                ->where('transaksi_course.id_user', Auth::user()->id)
                ->orderBy('transaksi_course.created_at', 'DESC')
                ->get();
        return view('riwayatBeli', compact('data'));
    }
}
