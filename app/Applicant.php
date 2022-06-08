<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    public $table ="applicants";

    protected $fillable = ['gender', 'address', 'date_of_birth', 'phone_number', 'user_id'];
}
