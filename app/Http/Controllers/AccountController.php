<?php

namespace App\Http\Controllers;

use App\Account;
use App\Rule;
use App\RuleDetail;
use App\Category;
use App\Variable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function Login(Request $req)
    {
        $username = $req->username;
        $password = $req->password;
        $akun =  Account::where('username', $username)->first();

        if($username == $akun->username)
        {
            if(Hash::check($password, $akun->password))
            {
                Session::put("login", true);
                if($akun->role == "kader")
                {
                    Session::put("role", "kader");

                    return redirect("/");
                }
                else if($akun->role == "dokter")
                {
                    Session::put("role", "dokter");
                    return redirect("/dokter");
                }
            }
            else
            {
                return redirect("/login");
            }
            return redirect("/login");
        }
    }

    public function Logout()
    {
        Session::flush();
        return redirect("/login");
    }

    public function Register(Request $req)
    {
        DB::table("accounts")->insert([
            "username" => $req->username,
            "password" => Hash::make($req->password),
            "role" => $req->role
        ]);

        return redirect('/');
    }

}
