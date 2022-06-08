<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $table ="applications";

    protected $fillable = ['resume', 'date_apply', 'app_status', 'applicant_id', 'vacancy_id', 'recruiter_id'];
}
