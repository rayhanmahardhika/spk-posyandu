<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rule;
use App\RuleDetail;
use App\Category;
use App\Variable;


class RulesController extends Controller
{
    public function addRule(Request $request) {
        $rule = Rule::updateOrCreate([
            'name' => $request->name,
            'result_category' => $request->then
        ]);
        
        
        if($request->cat1 != null && $request->cat2 == null && $request->cat3 == null && $request->cat4 == null) {
            $cat1 = Category::where('variable_id', $request->var1)->where('id', $request->cat1)->first();
            RuleDetail::updateOrCreate([
                'rule_id' => $rule->id,
                'category_id' => $cat1->id
            ]);
        }else if($request->cat1 != null && $request->cat2 != null && $request->cat3 == null && $request->cat4 == null) {
            $cat1 = Category::where('variable_id', $request->var1)->where('id', $request->cat1)->first();
            RuleDetail::updateOrCreate([
                'rule_id' => $rule->id,
                'category_id' => $cat1->id
            ]);

            $cat2 = Category::where('variable_id', $request->var2)->where('id', $request->cat2)->first();
            RuleDetail::updateOrCreate([
                'rule_id' => $rule->id,
                'category_id' => $cat2->id
            ]);
        }else if($request->cat1 != null && $request->cat2 != null && $request->cat3 != null && $request->cat4 == null) {
            $cat1 = Category::where('variable_id', $request->var1)->where('id', $request->cat1)->first();
            RuleDetail::updateOrCreate([
                'rule_id' => $rule->id,
                'category_id' => $cat1->id
            ]);

            $cat2 = Category::where('variable_id', $request->var2)->where('id', $request->cat2)->first();
            RuleDetail::updateOrCreate([
                'rule_id' => $rule->id,
                'category_id' => $cat2->id
            ]);

            $cat3 = Category::where('variable_id', $request->var3)->where('id', $request->cat3)->first();
            RuleDetail::updateOrCreate([
                'rule_id' => $rule->id,
                'category_id' => $cat3->id
            ]);
        }else if($request->cat1 != null && $request->cat2 != null && $request->cat3 != null && $request->cat4 != null) {
            $cat1 = Category::where('variable_id', $request->var1)->where('id', $request->cat1)->first();
            RuleDetail::updateOrCreate([
                'rule_id' => $rule->id,
                'category_id' => $cat1->id
            ]);

            $cat2 = Category::where('variable_id', $request->var2)->where('id', $request->cat2)->first();
            RuleDetail::updateOrCreate([
                'rule_id' => $rule->id,
                'category_id' => $cat2->id
            ]);

            $cat3 = Category::where('variable_id', $request->var3)->where('id', $request->cat3)->first();
            RuleDetail::updateOrCreate([
                'rule_id' => $rule->id,
                'category_id' => $cat3->id
            ]);

            $cat4 = Category::where('variable_id', $request->var4)->where('id', $request->cat4)->first();
            RuleDetail::updateOrCreate([
                'rule_id' => $rule->id,
                'category_id' => $cat4->id
            ]);
        }

        return redirect()->back();
    }

    public function updateRule(Request $request, $id) {

    }

    public function deleteRule($id) {
        RuleDetail::where('rule_id', $id)->delete();  
        Rule::where('id', $id)->delete();  
        return redirect()->back();
    }

    public function readRule() {
        $rule = Rule::all();  
        return view('dashboarddok')->with('rule', $rule);
    }
}
