<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\AksesCourse;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Review;

class CourseController extends Controller
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
        $datas = course::all();

        return view('editCourse', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new course;
        return view('addCourse', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new course;
        $model->nama_course=$request->nama_course;
        $model->harga_course= $request->harga_course;
        $model->perkiraan_waktu=$request->perkiraan_waktu;
        $model->deskripsi_course=$request->deskripsi_course;
        
        if($request->link_video == ""){
            $model->link_video="Tidak Ada";    
        }else{
            $model->link_video=$request->link_video;
        }                    

        $model->isi_course=$request->isi_course;
        $model->save();
        return redirect('admin/editCourse');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = course::find($id);
        return view('updateCourse',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_course)
    {
        $model = course::find($id_course);
        $model->nama_course=$request->nama_course;
        $model->harga_course= $request->harga_course;
        $model->perkiraan_waktu=$request->perkiraan_waktu;
        $model->deskripsi_course=$request->deskripsi_course;

        if($request->link_video == ""){
            $model->link_video="Tidak Ada";    
        }else{
            $model->link_video=$request->link_video;
        }  

        $model->isi_course=$request->isi_course;
        $model->save();
        return redirect('admin/editCourse');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = course::find($id);
        $model->delete();
        return redirect('admin/editCourse');
    }

    public function showMyCourse()
    {
        $mod = DB::table('akses_course')
                ->select('course.nama_course', 'akses_course.id_user', 'akses_course.id_course',
                        'akses_course.id_akses_course', 'course.created_at', 'course.perkiraan_waktu')
                ->join('course', 'course.id_course', '=', 'akses_course.id_course')                                
                ->join('users', 'akses_course.id_user', '=', 'users.id') 
                ->where('akses_course.id_user', Auth::user()->id)                               
                ->get();

        return view('myCourse', compact('mod'));
    }

    public function showDetailCourse($nama_course, $id_course, $id_user)
    {
        $show_review = DB::table('review')
                        ->select('review.id_review', 'review.isi_review', 'course.id_course',
                                'users.id', 'users.name', 'review.created_at')
                        ->join('course', 'course.id_course', '=', 'review.id_course')                                
                        ->join('users', 'review.id_user', '=', 'users.id') 
                        ->orderBy('review.created_at', 'DESC')
                        ->limit(6)
                        ->get();
        
        $show_all_review = DB::table('review')
                        ->select('review.id_review', 'review.isi_review', 'course.id_course',
                                'users.id', 'users.name', 'review.created_at')
                        ->join('course', 'course.id_course', '=', 'review.id_course')                                
                        ->join('users', 'review.id_user', '=', 'users.id') 
                        ->orderBy('review.created_at', 'DESC')                        
                        ->get();

        $check = DB::table('akses_course')
                    ->where('id_user', $id_user)
                    ->where('id_course', $id_course)
                    ->first();

        if($check === NULL){
            return redirect()->back()->with('alert', 'Anda tidak memilik hak untuk mengakses course ini!');
        }else{
            $mod = DB::table('course')
                    ->select('course.nama_course', 'course.isi_course', 'course.id_course', 'course.link_video')
                    ->where('course.nama_course', $nama_course)
                    ->first();
                    
            return view('detailCourse', compact('mod', 'show_review', 'show_all_review'));
        }
    }

    public function tambahReview(Request $request)
    {
        $model = new Review;

        $model->id_user=$request->id_user;
        $model->id_course=$request->id_course;        
        $model->isi_review=$request->isi_review;        
        $model->save();

        return redirect()->back();
    }

    public function editReview(Request $request, $id)
    {
        $model = Review::find($id);

        $model->id_user=$request->id_user;
        $model->id_course=$request->id_course;        
        $model->isi_review=$request->isi_review;
        $model->save();

        return redirect()->back();
    }

    public function hapusReview($id)
    {
        $model = Review::find($id);
        $model->delete();

        return redirect()->back();
    }
}

