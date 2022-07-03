<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    public $table ="vacancies";

    protected $fillable = ['position' , 'description', 'requirement' , 'qualification', 'add_detail', 'status', 'quantity', 'date_close','recruiter_id'];
} 
