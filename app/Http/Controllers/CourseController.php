<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

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
        $model->tgl_dibuat=$request->tgl_dibuat;
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
        $model->tgl_dibuat=$request->tgl_dibuat;
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
}

