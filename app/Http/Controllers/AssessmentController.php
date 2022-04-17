<?php

namespace App\Http\Controllers;
use App\Models\assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function store(Request $request){
    	$data = new assessment();
    	$data->nama_ass = $request->nama_ass;
    	$data->deskripsi = $request->deskripsi;
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
        $assessment2->save();
        $assessment = assessment::all();
        return view('listsoal',compact('assessment'));
    }
    
    public function delete($id) 
       {
          $assessment3 = assessment::where('id', $id)->firstorfail()->delete();
          return view('listsoal',compact('assessment'));
       }


}
