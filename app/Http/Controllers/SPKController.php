<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use DateTime;
use App\User;
use App\Rule;
use App\UserData;

class SPKController extends Controller
{
    public function index(Request $request)
    {
        if(Session::get("login") == true)
        {
            return view('index');
        }
        else
        {
            return redirect('/login');
        }
    }

    public function storeDataPasien(Request $request){
        $EZ = 0;
        // Pohon Keputusan
        $IMT = $request->berat_badan/(($request->tinggi_badan/100)*($request->tinggi_badan/100));

        if($request->MerokokRB == "Ya") {
            $result = "TINGGI";
        }else if($request->kolesterol > 250) {
            $result = "TINGGI";
        }else if($request->tekanan_sistolik > 129 && $request->tekanan_diastolik > 80) {
            $result = "TINGGI";
        }else if($IMT > 30) {
            $result = "TINGGI";
        }else if($request->gula_darah > 200 && $IMT > 30 && $request->OlahragaRB == "Jarang" && $request->umur > 45 && ($request->StressRB == "Sering" || $request->StressRB == "Selalu")) {
            $result = "TINGGI";
        }else if($request->AlkoholRB > "Ya") {
            $result = "TINGGI";
        }else if($request->StressRB == "Sering" || $request->StressRB == "Selalu") {
            $result = "TINGGI";
        }else if($request->OlahragaRB == "Jarang") {
            $result = "TINGGI";
        }

        // FIS
        else{
            // Alfa Predikat
            $rules = Rule::all();
            $i = 0;
            $alfa = array();
            $zed = array();

            // Rencana
            foreach($rules as $rule) {
                // Rn
                if($request->kelamin == "laki") {
                    $mu = 1;
                }else{
                    $mu = 0;
                }
                $alfa[$i] = $mu; // An
                $zed[$i] = $alfa[$i]*100; //Zn
                $i++;
            }

            // R1
            if($request->kelamin == "laki") {
                $mu1 = 1;
            }else{
                $mu1 = 0;
            }
            $a1 = $mu1; // A1
            $z1 = $a1*100; //Z1

            // R2
            if($request->umur <= 30) {
                $mu2 = 0;
            }else if ($request->umur <= 50) {
                $mu2 = ($request->umur-30)/(50-30);
            }else if ($request->umur > 50) {
                $mu2 = 1;
            }
            $a2 = $mu2; // A2
            $z2 = $a2*100; //Z2

            // R3
            if($IMT <= 24) {
                $mu3 = 0;
            }else if ($IMT <= 30) {
                $mu3 = ($IMT-24)/(30-24);
            }else if ($IMT > 30) {
                $mu3 = 1;
            }
            $a3 = $mu3; // A3
            $z3 = $a3*100; //Z3

            // R4
            if($request->kolesterol <= 100) {
                $mu4 = 0;
            }else if ($request->kolesterol <= 140) {
                $mu4 = ($request->kolesterol-100)/(140-100);
            }else if ($request->kolesterol > 140) {
                $mu4 = 1;
            }
            $a4 = $mu4; // A4
            $z4 = $a4*100; //Z4

            // R5
            if($request->BuahRB == "Jarang") {
                $mu5 = 1;
            }else if($request->BuahRB == "Kadang") {
                $mu5 = 0.75;
            }else if($request->BuahRB == "Sering") {
                $mu5 = 0.5;
            }else if($request->BuahRB == "Selalu") {
                $mu5 = 0.25;
            }

            if($request->olahraga <= 0) {
                $mu6 = 1;
            }else if ($request->olahraga <= 7) {
                $mu6 = (7-$request->olahraga)/(7-0);
            }else if ($request->olahraga > 7) {
                $mu6 = 0;
            }
            $a5 = min($mu5, $mu6); // A5
            $z5 = $a5*100; //Z5

            // R6
            if($request->olahraga <= 0) {
                $mu7 = 0;
            }else if ($request->olahraga <= 7) {
                $mu7 = ($request->olahraga-0)/(7-0);
            }else if ($request->olahraga > 7) {
                $mu7 = 1;
            }
            $a6 = $mu7; // A6
            $z6 = (1-$a6)*100; //Z6

            // R7
            if($IMT <= 24) {
                $mu8 = 1;
            }else if ($IMT <= 30) {
                $mu8 = (30-$IMT)/(30-24);
            }else if ($IMT > 30) {
                $mu8 = 0;
            }

            if($request->gula_darah <= 100) {
                $mu9 = 1;
            }else if ($request->gula_darah <= 200) {
                $mu9 = (200-$IMT)/(200-100);
            }else if ($request->gula_darah > 200) {
                $mu9 = 0;
            }

            if($request->kolesterol <= 100) {
                $mu10 = 1;
            }else if ($request->kolesterol <= 140) {
                $mu10 = (140-$request->kolesterol)/(140-100);
            }else if ($request->kolesterol > 140) {
                $mu10 = 0;
            }
            $a7 = min($mu8, $mu9, $mu10); // A7
            $z7 = (1-$a7)*100; //Z7

            // R8
            if($request->umur <= 30) {
                $mu11 = 1;
            }else if ($request->umur <= 50) {
                $mu11 = (50-$request->umur)/(50-30);
            }else if ($request->umur > 50) {
                $mu11 = 0;
            }

            if($request->BuahRB == "Jarang") {
                $mu12 = 0.25;
            }else if($request->BuahRB == "Kadang") {
                $mu12 = 0.5;
            }else if($request->BuahRB == "Sering") {
                $mu12 = 0.75;
            }else if($request->BuahRB == "Selalu") {
                $mu12 = 1;
            }
            $a8 = min($mu11, $mu12); // A7
            $z8 = (1-$a8)*100; //Z7

            // R9
            if($request->umur <= 30) {
                $mu1 = 1;
            }else if ($request->umur <= 50) {
                $mu1 = (50-$request->umur)/(50-30);
            }else if ($request->umur > 50) {
                $mu1 = 0;
            }

            if($IMT <= 24) {
                $mu2 = 1;
            }else if ($IMT <= 30) {
                $mu2 = (30-$IMT)/(30-24);
            }else if ($IMT > 30) {
                $mu2 = 0;
            }

            if($request->olahraga <= 0) {
                $mu3 = 0;
            }else if ($request->olahraga <= 7) {
                $mu3 = ($request->olahraga-0)/(7-0);
            }else if ($request->olahraga > 7) {
                $mu3 = 1;
            }
            $a9 = min($mu1, $mu2, $mu3); // A7
            $z9 = (1-$a9)*100; //Z7

            // R10
            if($request->BuahRB == "Jarang") {
                $mu1 = 0;
            }else if($request->BuahRB == "Kadang") {
                $mu1 = 0.5;
            }else if($request->BuahRB == "Sering") {
                $mu1 = 1;
            }
            $a10 = $mu1; // A7
            $z10 = $a10*100; //Z7

            // R11
            if($request->tekanan_sistolik >= 120 && $request->tekanan_sistolik <= 129 && $request->tekanan_diastolik == 80){
                $mu1 = 0; // normal
            }else if($request->tekanan_sistolik > 129 && $request->tekanan_diastolik >= 80) {
                $mu1 = 1; // tinggi
            }

            $a11 = $mu1; // A7
            $z11 = $a11*100; //Z7

            $EZ = ($a1*$z1+$a2*$z2+$a3*$z3+$a4*$z4+$a5*$z5+$a6*$z6+$a7*$z7+$a8*$z8+$a9*$z9+$a10*$z10+$a11*$z11)/($a1+$a2+$a3+$a4+$a5+$a6+$a7+$a8+$a9+$a10+$a11);
            if($EZ >= 50) {
                $result = "TINGGI";
            }else{
                $result = "RENDAH";
            }
        }

        User::create([
            'name' => $request->nama,
            'age' => $request->umur
        ]);

        $user = User::where('name', $request->nama)->first();

        if(!empty($EZ)) {
            UserData::create([
                'user_id' => $user->id,
                'check_code' => $this->token(),
                'result' => $EZ
            ]);
        } else {
            UserData::create([
                'user_id' => $user->id,
                'check_code' => $this->token(),
                'result' => 100
            ]);
        }

        return view('index')->with([
            'hasil' => $result,
            'nilai' => $EZ
            ]);
    }

    public function token()
    {
        $str = '0123456789';
        $length = 7;
        $code = substr(str_shuffle($str), 0, $length);
        return $code;
    }

    public function recordPage()
    {
        $users = UserData::all();

        foreach($users as $user){
            $user->name = User::where('id', $user->user_id)->first()->name;
            $user->age = User::where('id', $user->user_id)->first()->age;
        }

        return view('record')->with([
            'users' => $users
        ]);
    }
}
