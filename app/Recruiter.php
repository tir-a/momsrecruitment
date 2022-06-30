<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    public $table ="recruiters";

    protected $fillable = ['user_id', 'branch_id', 'manager_id',];

   /* public function recruiters()
    {
        return $this->hasMany(Recruiter::class, 'manager_id');
    }
*/
    // recursive relationship
    public function childRecruiters()
    {
        return $this->hasMany(Recruiter::class, 'manager_id')->with('recruiters');
    }
}
