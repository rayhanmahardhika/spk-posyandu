<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rule;
use App\RuleDetail;
use App\Category;
use App\Variable;

class ViewController extends Controller
{
    public function RegisterPage()
    {
        return view("/register");
    }

    public function LoginPage()
    {
        return view("/login");
    }

    public function dashboardDok()
    {
        $ruleMain = Rule::all();
        $categories = Category::all();
        $variables = Variable::all();

        $rule = array();
        $contents = ['Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'];
        foreach($ruleMain as $r) {
            $detail = RuleDetail::where('rule_id', $r->id)->get();
            $i = 0;
            foreach($detail as $d) {
                $cat = Category::where('id', $d->category_id)->first();
                $var = Variable::where('id', $cat->variable_id)->first();
                $catvar = $var->name.' = '.$cat->name;
                $contents[$i] = $catvar;
                $i++;
            }
            $utama = array(
                'id' => $r->id,
                'name' => $r->name,
                'category1' => $contents[0],
                'category2' => $contents[1],
                'category3' => $contents[2],
                'category4' => $contents[3],
                'then' => $r->result_category,
            );
                array_push( $rule, $utama);
            $contents = ['Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'];

        }
        
        return view("dashboarddok")->with([
            'rules' => $ruleMain,
            'rule' => $rule,
            'categories' => $categories,
            'variables' => $variables
        ]);
    }
}
