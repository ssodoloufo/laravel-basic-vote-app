<?php

namespace App\Http\Controllers\Logic;

use App\Http\Controllers\Controller;
use App\Models\Nominee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller {
    // home view
    public function index() {
        return view('welcome');
    }

    // check if jury-vote exists and redirect to good place
    public function openSession(Request $request) {
        $currentJury = User::where('matricule', $request->code)->first();

        // dd($currentJury->name);
        
        Session::put('membreJuryCode', $request->code);
        Session::put('membreJuryName', $currentJury->name);
        
        if ($currentJury) {
            $data = Nominee::where('user_id', $currentJury->id)->get();

            if (count($data) > 0) {
                return redirect()->route('session.status');
            }

            return redirect()->route('candidats.index');
        }
        return redirect()->back();
    }
}
