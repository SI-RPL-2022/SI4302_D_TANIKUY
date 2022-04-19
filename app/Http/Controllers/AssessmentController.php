<?php

namespace App\Http\Controllers;
use App\Models\assessment;
use App\Models\jawabanuser;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function store(Request $request){
    	$data = new assessment();
    	$data->nama_ass = $request->nama_ass;
    	$data->deskripsi = $request->deskripsi;
        $data->soal = $request->soal;
    	$data->save();
    	return redirect('listsoal');
    }

    public function create(){
    	return view('buatsoal');
    }

    public function index(){
        $assessment = assessment::all();
        return view('listsoal',compact('assessment'));
    }
    
    public function index2($id){

        $assessment = assessment::find($id);
        return view('editsoal',compact('assessment'));

    }

    public function update(Request $request, $id)
    {
        $assessment2 = assessment::find($id);
        $assessment2->nama_ass = $request->nama_ass;
        $assessment2->deskripsi = $request->deskripsi;
        $assessment2->soal = $request->soal;
        $assessment2->save();
        $assessment = assessment::all();
        return view('listsoal',compact('assessment'));
    }
    
    public function delete($id) 
       {
          $assessment3 = assessment::where('id', $id)->firstorfail()->delete();
          return redirect("/listsoal");
       }

    public function indextugas(){
        $assessment = assessment::all();
        return view('tugas',compact('assessment'));
    }

    public function indexsoal($id){
        $assessment = assessment::find($id);
        return view('soal',compact('assessment'));
    }

    public function storejawaban(Request $request){
        $data = new jawabanuser();
        $data->assessments_id = $request->assessments_id;
        $data->soal = $request->soal;
        $data->jawaban = $request->jawaban;
        $data->save();
        return view('submit');
    }

    public function indexjawaban($id){
        $jawabanuser = jawabanuser::find($id);
        return view('jawabanuser',compact('jawabanuser'));
    }


}
