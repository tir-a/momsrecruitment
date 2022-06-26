<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Applicant extends Model
{

    public $table ="applicants";

    protected $fillable = ['gender', 'address', 'date_of_birth', 'phone_number', 'user_id'];

    public function routeNotificationForNexmo($notification)
    {
        return $this->phone_number;
    }

}
