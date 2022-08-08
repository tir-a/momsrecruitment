<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Recruiter extends Model
{
    public $table ="recruiters";

    protected $fillable = ['user_id', 'branch_id', 'manager_id',];

    // recursive relationship
    public function childRecruiters()
    {
        return $this->hasMany(Recruiter::class, 'manager_id')->with('recruiters');
    }

    public function manager(){
        return $this->belongsTo(Recruiter::class, 'manager_id');
    }
}
