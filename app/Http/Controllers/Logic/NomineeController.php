<?php

namespace App\Http\Controllers\Logic;

use App\Http\Controllers\Controller;
use App\Models\Nominee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NomineeController extends Controller {
    public function index() {
        $membreJuryCode = Session::get('membreJuryCode');
        $currentJury = User::where('matricule', $membreJuryCode)->first();
        
        $data = Nominee::where('user_id', $currentJury->id)->orderBy('order','ASC')->get();

        return view('nominees')->with('data', $data);
    }
}
