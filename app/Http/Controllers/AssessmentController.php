<?php

namespace App\Http\Controllers;
use App\Models\assessment;
use App\Models\Jawabans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class AssessmentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(){
        $assessment = assessment::all();
        return view('listsoal',compact('assessment'));
    }

    public function store(Request $request){
    	$data = new assessment();
    	$data->nama_ass = $request->nama_ass;
    	$data->deskripsi = $request->deskripsi;
        $data->soal = $request->soal;
    	$data->save();
    	return redirect('admin/listsoal');
    }

    public function create(){
    	return view('buatsoal');
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
          $assessment3 = assessment::where('id_assessments', $id)->firstorfail()->delete();
          return redirect("admin/listsoal");
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
        $data = new Jawabans();
        $data->id_user = $request->id_user;
        $data->id_assessments = $request->id_assessments;
        $data->deskripsi_jawaban = $request->deskripsi_jawaban;
        $data->status = "Menunggu Review";
        $data->nilai = 0;        
        $data->save();
        return redirect('siswa/tugas/jawaban');
    }

    public function showjawaban()
    {
        $assessment = DB::table('jawabans')
                    ->select('assessments.nama_ass', 'assessments.soal', 'jawabans.deskripsi_jawaban', 'jawabans.status',
                            'jawabans.nilai', 'jawabans.created_at')
                    ->join('assessments', 'assessments.id_assessments', '=', 'jawabans.id_assessments')
                    ->where('jawabans.id_user', Auth::user()->id)
                    ->orderBy('jawabans.created_at', 'DESC')
                    ->get();
        
        return view('nilaiAssessments', compact('assessment'));
    }

    public function nilaiAssessment()
    {
        $assessment = DB::table('jawabans')
                    ->select('assessments.nama_ass', 'users.name', 'jawabans.status',
                            'jawabans.nilai', 'jawabans.created_at', 'jawabans.id_jawaban', 'jawabans.deskripsi_jawaban')
                    ->join('assessments', 'assessments.id_assessments', '=', 'jawabans.id_assessments')                    
                    ->join('users', 'jawabans.id_user', '=', 'users.id')                           
                    ->orderBy('jawabans.created_at', 'DESC')
                    ->get();
        
        return view('reviewJawaban', compact('assessment'));
    }

    public function storeNilaiAssessment(Request $request, $id_jawaban)
    {
        $jawaban = Jawabans::find($id_jawaban);

        $jawaban->nilai = $request->nilai;
        $jawaban->status = "Selesai Review";
        $jawaban->save();

        return redirect('admin/assessments');
    }


}
