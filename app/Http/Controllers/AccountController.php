<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function showProfile()
    {
        return view('showProfile');
    }

    public function updateProfile(Request $request, $id)
    {
        $mod = User::find($id);                            

        $mod->name = $request->name;
        $mod->email = $request->email;        
        $mod->username = $request->username;        
        $mod->phone = $request->phone;        
        $mod->city = $request->city; 
        
        if($request->foto_profile_new == NULL){
            $mod->foto_profile = $request->foto_profile;
        }else{
            $profile = time().'.'.$request->foto_profile_new->extension();
            $request->foto_profile_new->move(public_path('image/profile'), $profile);
            $mod->foto_profile = $profile;
        }        
        $mod->save();
        
        return redirect(url('siswa/profile'))->with('success', 'Data Berhasil Diubah');
    }

    public function editProfile($id)
    {
        $mod = User::find($id);

        return view('updatePassword', compact('mod'));
    }

    public function updatePassword(Request $request, $id)
    {
        $mod = User::find($id);        

        $validate = $request->validate([
            'password_lama' => 'required|string|min:8',
            'password' => 'required|string|confirmed|min:8'                      
        ]);
            
        $password_lama = $request->password_lama;        
        
        if(Hash::check($password_lama, $mod->password)){
            if($password_lama != $request->password){
                $mod->password = Hash::make($request->password);
                $mod->save();

                return redirect()->back()->with('success', 'Password Berhasil Diubah');
            }                
            else{
                return redirect()->back()->with("error","Password Baru dan Password Lama Tidak Boleh Sama");
            }
        }else{
            return redirect()->back()->with("error","Password Lama yang Anda Masukkan Salah");
        }                        

    }
}
