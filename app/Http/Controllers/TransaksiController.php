<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Paket;
use App\Models\TransaksiCourse;
use App\Models\AksesCourse;
use App\Models\TransaksiPaket;
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
        $check = DB::table('transaksi_course')
                    ->where('id_user', $request->id_user)
                    ->where('id_course', $request->id_course)
                    ->first();

        if($check === NULL){
            $model = new TransaksiCourse;
            $model->id_course=$request->id_course;
            $model->id_user= $request->id_user;     
            $model->save();            
            
            return redirect('siswa/riwayatBeli');
        }else{
            return redirect()->back() ->with('alert', 'Anda sudah membeli course ini!');
        }        
    }

    public function riwayatBeli()
    {
        $data = DB::table('transaksi_course')
                ->select('transaksi_course.id_transaksi_course', 'course.nama_course', 'transaksi_course.created_at', 'transaksi_course.id_user',
                        'course.perkiraan_waktu', 'course.harga_course', 'transaksi_course.status_pembayaran',
                        'transaksi_course.bukti_transfer')
                ->join('course', 'course.id_course', '=', 'transaksi_course.id_course')
                ->where('transaksi_course.id_user', Auth::user()->id)
                ->orderBy('transaksi_course.created_at', 'DESC')
                ->get();
        return view('riwayatBeli', compact('data'));
    }

    public function confirmTransactionCourse(Request $request, $id)
    {
        $model = TransaksiCourse::find($id);

        $bukti_transfer = time().'.'.$request->bukti_transfer->extension();
        $request->bukti_transfer->move(public_path('image/bukti-transfer'), $bukti_transfer);

        $model->status_pembayaran="Sedang Diproses";
        $model->bukti_transfer=$bukti_transfer;        
        $model->save();
        return redirect(route('siswa.riwayat.transaction.course'));
    }

    public function riwayatBeliPaket()
    {
        $data = DB::table('transaksi_paket')
                ->select('transaksi_paket.id_transaksi_paket', 'paket.nama_paket', 'transaksi_paket.created_at', 'transaksi_paket.id_user',
                        'paket.harga_paket', 'transaksi_paket.status_pembayaran',
                        'transaksi_paket.bukti_transfer')
                ->join('paket', 'paket.id_paket', '=', 'transaksi_paket.id_paket')
                ->where('transaksi_paket.id_user', Auth::user()->id)
                ->orderBy('transaksi_paket.created_at', 'DESC')
                ->get();
        return view('riwayatBeliPaket', compact('data'));
    }

    public function showPaket()
    {
        $datas = Paket::all();
        return view('buy_paket', compact ('datas'));
    }

    public function storeTransactionPaket(Request $request)
    {
        $check = DB::table('transaksi_paket')
                    ->where('id_user', $request->id_user)
                    ->where('id_paket', $request->id_paket)
                    ->first();

        if($check === NULL){
            $model = new TransaksiPaket;
            $model->id_paket=$request->id_paket;
            $model->id_user= $request->id_user;     
            $model->save();            
            
            return redirect(route('siswa.riwayat.transaction.paket'));
        }else{
            return redirect()->back() ->with('alert', 'Anda sudah membeli paket ini!');
        } 
    }

    public function confirmTransactionpaket(Request $request, $id)
    {
        $model = TransaksiPaket::find($id);

        $bukti_transfer = time().'.'.$request->bukti_transfer->extension();
        $request->bukti_transfer->move(public_path('image/bukti-transfer'), $bukti_transfer);

        $model->status_pembayaran="Sedang Diproses";
        $model->bukti_transfer=$bukti_transfer;        
        $model->save();
        return redirect(url('siswa/riwayatBeliPaket'));
    }

    public function showKonfirmasiCourse()
    {
        $mod = DB::table('transaksi_course')
                ->select('transaksi_course.id_transaksi_course', 'course.nama_course', 'transaksi_course.created_at', 'transaksi_course.id_user',
                        'course.harga_course', 'transaksi_course.status_pembayaran',
                        'transaksi_course.bukti_transfer', 'users.name', 'transaksi_course.id_course')
                ->join('course', 'course.id_course', '=', 'transaksi_course.id_course')                
                ->join('users', 'transaksi_course.id_user', '=', 'users.id')     
                ->where('transaksi_course.status_pembayaran', '!=', 'Belum Lunas')          
                ->orderBy('transaksi_course.created_at', 'DESC')
                ->get();

        return view('konfirmasiTransaksiCourse', compact('mod'));
    }

    public function konfirmasiTerimaTransCourse(Request $request, $id)
    {
        $model = TransaksiCourse::find($id);            

        $model->status_pembayaran="Lunas";                
        $model->save();

        $akses_course = New AksesCourse;
        $akses_course->id_user = $request->id_user;
        $akses_course->id_course = $request->id_course;
        $akses_course->save();

        return redirect(url('admin/konfirmasi-transaksi/course'));
    }

    public function konfirmasiTolakTransCourse(Request $request, $id)
    {
        $model = TransaksiCourse::find($id);            

        $model->status_pembayaran="Belum Lunas";                
        $model->save();

        return redirect(url('admin/konfirmasi-transaksi/course'));
    }

    public function hapusTransCourse($id)
    {
        $mod = TransaksiCourse::find($id);
        $mod->delete();
        return redirect(url('admin/konfirmasi-transaksi/course'));
    }

    public function showKonfirmasiPaket()
    {
        $mod = DB::table('transaksi_paket')
                ->select('transaksi_paket.id_transaksi_paket', 'paket.nama_paket', 'transaksi_paket.created_at', 'transaksi_paket.id_user',
                        'paket.harga_paket', 'transaksi_paket.status_pembayaran', 'paket.nama_course',
                        'transaksi_paket.bukti_transfer', 'users.name', 'transaksi_paket.id_paket')
                ->join('paket', 'paket.id_paket', '=', 'transaksi_paket.id_paket')                
                ->join('users', 'transaksi_paket.id_user', '=', 'users.id')     
                ->where('transaksi_paket.status_pembayaran', '!=', 'Belum Lunas')          
                ->orderBy('transaksi_paket.created_at', 'DESC')
                ->get();

        return view('konfirmasiTransaksiPaket', compact('mod'));
    }

    public function konfirmasiTerimaTransPaket(Request $request, $id)
    {
        $model = TransaksiPaket::find($id);            

        $model->status_pembayaran="Lunas";                
        $model->save();        

        return redirect(url('admin/konfirmasi-transaksi/paket'));
    }

    public function konfirmasiTolakTransPaket(Request $request, $id)
    {
        $model = TransaksiPaket::find($id);            

        $model->status_pembayaran="Belum Lunas";                
        $model->save();

        return redirect(url('admin/konfirmasi-transaksi/paket'));
    }

    public function hapusTransPaket($id)
    {
        $mod = TransaksiPaket::find($id);
        $mod->delete();
        return redirect(url('admin/konfirmasi-transaksi/paket'));
    }
}
