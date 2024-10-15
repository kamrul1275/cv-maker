<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewCVPosted;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   

    function Admindashboard(){
        return view('backend.layout.dashboard');
    }
    
    public function adminLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }//end method

}
