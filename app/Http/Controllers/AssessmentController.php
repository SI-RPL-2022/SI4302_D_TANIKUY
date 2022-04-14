<?php

namespace App\Http\Controllers;
use App\Models\assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function store(Request $request){
    	$data = new assessment();
    	$data->nama_ass = $request->nama_ass;
    	$data->pertanyaan = $request->pertanyaan;
    	$data->save();
    	return redirect('buatsoal');
    }
    public function create(){
    	return view('buatsoal');
    }

}
