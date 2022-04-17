<?php

namespace App\Http\Controllers;
use App\Models\assessment;
use Illuminate\Http\Request;

class JawabController extends Controller
{
    public function store(Request $request){
    	$data = new jawaban();
    	$data->user_id = $request->user_id;
    	$data->pertanyaan = $request->pertanyaan;
    	$data->jawaban = $request->jawaban;
    	$data->save();
    	return redirect('submit');
    }
   	


}
