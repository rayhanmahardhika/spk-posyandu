<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RuleDetail extends Model
{
    protected $table = 'rules_detail';
    protected $fillable = ['rule_id','category_id'];

    public function rule()
    {
        return $this->belongsTo('App\Rule');
    }

    public $timestamps = false;

}
