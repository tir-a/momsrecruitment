<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    public $table ="experiences";

    protected $fillable = ['job' , 'job_level', 'specialization' , 'company', 'date_joined', 'working_year', 'detail', 'applicant_id'];
}
