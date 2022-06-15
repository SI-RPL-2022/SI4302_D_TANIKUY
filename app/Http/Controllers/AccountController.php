<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAllAccount()
    {
        $mod = User::all()->where('is_admin', 0);

        return view('showAllAccount', compact('mod'));
    }

    public function deleteAccount($id)
    {
        $mod = User::find($id);
        $mod->delete();

        return redirect(url('admin/user-account'));
    }
}
