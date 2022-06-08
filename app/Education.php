<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    public $table ="educations";

    protected $fillable = ['level' , 'certificate', 'institution' , 'grad_date', 'grade', 'field_study', 'applicant_id'];
}
