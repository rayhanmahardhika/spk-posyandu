<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $table = 'rules';
    protected $fillable = ['name','result_category'];


    public function ruleDetail()
    {
        return $this->hasMany('App\RuleDetail');
    }

    public $timestamps = false;
}
