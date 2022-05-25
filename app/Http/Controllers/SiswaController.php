<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\AksesCourse;
use Illuminate\Support\Facades\DB;
use Auth;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $progress_course_selesai = DB::table('akses_course')                        
                        ->join('course', 'course.id_course', '=', 'akses_course.id_course')                                
                        ->join('users', 'akses_course.id_user', '=', 'users.id')                               
                        ->where('akses_course.id_user', Auth::user()->id) 
                        ->where('akses_course.status_course', 'Selesai')
                        ->count();
        $progress_course_all = DB::table('akses_course')                        
                        ->join('course', 'course.id_course', '=', 'akses_course.id_course')                                
                        ->join('users', 'akses_course.id_user', '=', 'users.id')                               
                        ->where('akses_course.id_user', Auth::user()->id)                         
                        ->count();
        $persentase_course = 0;
        
        if($progress_course_selesai && $progress_course_all != NULL){
            $persentase_course = intval(($progress_course_selesai * 100) / $progress_course_all);
        }

        $riwayat_course = DB::table('akses_course')                        
                        ->select('course.nama_course', 'akses_course.akses_terakhir')
                        ->join('course', 'course.id_course', '=', 'akses_course.id_course')                                
                        ->join('users', 'akses_course.id_user', '=', 'users.id')                               
                        ->where('akses_course.id_user', Auth::user()->id) 
                        ->orderBy('akses_course.akses_terakhir', 'DESC')                        
                        ->limit(5)
                        ->get();
        
        $course_belum_selesai = DB::table('akses_course')                        
                            ->select('course.nama_course')
                            ->join('course', 'course.id_course', '=', 'akses_course.id_course')                                
                            ->join('users', 'akses_course.id_user', '=', 'users.id')                               
                            ->where('akses_course.id_user', Auth::user()->id) 
                            ->where('akses_course.status_course', 'Belum Selesai')
                            ->orderBy('akses_course.akses_terakhir', 'DESC')                                                    
                            ->get();

        return view('dashboard_siswa', compact('persentase_course', 'riwayat_course', 'course_belum_selesai'));
    }
}
