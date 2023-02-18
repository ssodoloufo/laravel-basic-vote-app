<?php

namespace App\Http\Controllers\Logic;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Models\Nominee;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CandidateController extends Controller {
    public function index() {
        $membreJuryName = Session::get('membreJuryName');
        
        $data = [
            'forDep_01' => Candidate::where('department', 'Accounting')->get(),
            'forDep_02' => Candidate::where('department', 'Engineering')->get(),
            'forDep_03' => Candidate::where('department', 'Human Resources')->get(),
            'forDep_04' => Candidate::where('department', 'Legal')->get(),
            'forDep_05' => Candidate::where('department', 'Marketing')->get(),
            'forDep_06' => Candidate::where('department', 'Product Management')->get(),
            'forDep_07' => Candidate::where('department', 'Research and Development')->get(),
            'forDep_08' => Candidate::where('department', 'Sales')->get(),
            'forDep_09' => Candidate::where('department', 'Support')->get(),
            'forDep_10' => Candidate::where('department', 'Training')->get(),
        ];
        return view('candidates', compact('data', 'membreJuryName'));
    }


    public function store(Candidate $candidate, Request $request) {
        $i=1;
        $membreJuryCode = Session::get('membreJuryCode');
        $currentJury = User::where('matricule', $membreJuryCode)->first();

        foreach ($request->choice as $key => $name) {
            // $data =[
            //     'user_id' => $currentJury->id,
            //     'candidate_id' => intval( $request->choice[$key] ),
            //     'order' => $i++,
            // ];

            // dump($data);
            
            $candidate->nominee()->create([
                'user_id' => $currentJury->id,
                'candidate_id' => intval( $request->choice[$key] ),
                'order' => $i++,
            ]);
        }

        // return back();
        return redirect()->route('nominees.index');
    }



    public function storeOriginal(Request $request) {
        $i=1;
        $membreJuryCode = Session::get('membreJuryCode');
        $membreJuryName = Session::get('membreJuryName');

        if( $request['choice'] ) {
            foreach($request->choice as $key=>$name) {
                $data =[
                    'code_jury' => $membreJuryCode,
                    'matricule' => $request->choice[$key],
                    'order' => $i++,
                ];
            }

            if( $data['order'] < 5 || $data['order'] > 5 ) {
                $errorMessage = $membreJuryName . ", vous devez faire exactement 5 choix. Vous en avez " . $data['order'] . " choix";
                return redirect()->back()->with('errorMessage', $errorMessage);
            }

            if( $data['order'] == 5 ) {
                foreach($request->choice as $key=>$name) {
                    $data =[
                        'code_jury' => $membreJuryCode,
                        'matricule' => $request->choice[$key],
                        'order' => $i++,
                    ];
        
                    Choice::create([
                        'code_jury' => $membreJuryCode,
                        'matricule' => $request->choice[$key],
                        'order' => $i++,
                    ]);
                }
        
                // insert complet data into Nominees table
                $insert = DB::select("SELECT choices.code_jury, choices.order, choices.matricule, candidats.nom, candidats.prenoms 
                        FROM choices 
                        INNER JOIN candidats ON choices.matricule = candidats.Matricule 
                        WHERE choices.code_jury = '$membreJuryCode'");
                
                foreach ($insert as $item) {
                    DB::table('nominees')->insert([
                        "code_jury" => $item->code_jury,
                        "matricule" => $item->matricule,
                        "nom" => $item->nom,
                        "prenom" => $item->prenoms,
                        "order" => $item->order,
                    ]);
                };
        
                return redirect()->route('nominees.index');
            }
        } else {
            $errorMessage = $membreJuryName . ", veuillez choisir exactement 5 candidats. Actuellement vous n'en avez choisi aucun";
            return redirect()->back()->with('errorMessage', $errorMessage);
        }
    }


    // remove all and back to home page
    public function destroy() {
        $membreJuryCode = Session::get('membreJuryCode');
        $choicesData = Choice::where('code_jury', $membreJuryCode)->get();
        foreach ($choicesData as $item) {
            Choice::find($item->id)->delete();
        }

        $nomineesData = Nominee::where('code_jury', $membreJuryCode)->get();
        foreach ($nomineesData as $item) {
            Nominee::find($item->id)->delete();
        }

        return redirect()->route('candidats.index');
    }
}
